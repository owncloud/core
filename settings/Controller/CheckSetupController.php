<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OC\Settings\Controller;

use GuzzleHttp\Exception\ClientException;
use OC\IntegrityCheck\Checker;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataDisplayResponse;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Http\RedirectResponse;
use OCP\Http\Client\IClientService;
use OCP\IConfig;
use OCP\IL10N;
use OCP\IRequest;
use OCP\IURLGenerator;

/**
 * @package OC\Settings\Controller
 */
class CheckSetupController extends Controller {
	/** @var IConfig */
	private $config;
	/** @var IClientService */
	private $clientService;
	/** @var IURLGenerator */
	private $urlGenerator;
	/** @var IL10N */
	private $l10n;
	/** @var Checker */
	private $checker;

	/**
	 * @param string $AppName
	 */
	public function __construct(
		$AppName,
		IRequest $request,
		IConfig $config,
		IClientService $clientService,
		IURLGenerator $urlGenerator,
		IL10N $l10n,
		Checker $checker
	) {
		parent::__construct($AppName, $request);
		$this->config = $config;
		$this->clientService = $clientService;
		$this->urlGenerator = $urlGenerator;
		$this->l10n = $l10n;
		$this->checker = $checker;
	}

	/**
	 * Checks if the ownCloud server can connect to the internet using HTTPS and HTTP
	 */
	private function isInternetConnectionWorking(): bool {
		if ($this->config->getSystemValue('has_internet_connection', true) === false) {
			return false;
		}

		try {
			$client = $this->clientService->newClient();
			$client->get('https://www.owncloud.com/');
			$client->get('http://www.owncloud.com/');
			return true;
		} catch (\Exception $e) {
			return false;
		}
	}

	/**
	 * Checks whether a local memcache is installed or not
	 */
	private function isMemcacheConfigured(): bool {
		return $this->config->getSystemValue('memcache.local', null) !== null;
	}

	/**
	 * Whether /dev/urandom is available to the PHP controller
	 */
	private function isUrandomAvailable(): bool {
		if (@\file_exists('/dev/urandom')) {
			$file = \fopen('/dev/urandom', 'rb');
			if ($file) {
				\fclose($file);
				return true;
			}
		}

		return false;
	}

	/**
	 * Public for the sake of unit-testing
	 */
	protected function getCurlVersion(): array {
		return \curl_version();
	}

	/**
	 * Check if the used  SSL lib is outdated. Older OpenSSL and NSS versions do
	 * have multiple bugs which likely lead to problems in combination with
	 * functionality required by ownCloud such as SNI.
	 *
	 * @link https://github.com/owncloud/core/issues/17446#issuecomment-122877546
	 * @link https://bugzilla.redhat.com/show_bug.cgi?id=1241172
	 * @return string
	 * @throws \Exception
	 */
	private function isUsedTlsLibOutdated(): string {
		// Don't run check when:
		// 1. Server has `has_internet_connection` set to false
		// 2. App Store AND S2S is disabled
		if (!$this->config->getSystemValue('has_internet_connection', true)) {
			return '';
		}
		if ($this->config->getAppValue('files_sharing', 'outgoing_server2server_share_enabled', 'yes') === 'no'
			&& $this->config->getAppValue('files_sharing', 'incoming_server2server_share_enabled', 'yes') === 'no') {
			return '';
		}
		$versionString = $this->getCurlVersion();
		if (isset($versionString['ssl_version'])) {
			$versionString = $versionString['ssl_version'];
		} else {
			return '';
		}

		$features = (string)$this->l10n->t('installing and updating apps via the market or Federated Cloud Sharing');

		// Check if at least OpenSSL after 1.01d or 1.0.2b
		if (\strpos($versionString, 'OpenSSL/') === 0) {
			$majorVersion = \substr($versionString, 8, 5);
			$patchRelease = \substr($versionString, 13, 6);

			if (($majorVersion === '1.0.1' && \ord($patchRelease) < \ord('d')) ||
				($majorVersion === '1.0.2' && \ord($patchRelease) < \ord('b'))) {
				return (string) $this->l10n->t('cURL is using an outdated %s version (%s). Please update your operating system or features such as %s will not work reliably.', ['OpenSSL', $versionString, $features]);
			}
		}

		// Check if NSS and perform heuristic check
		if (\strpos($versionString, 'NSS/') === 0) {
			try {
				$firstClient = $this->clientService->newClient();
				$firstClient->get('https://www.owncloud.com/');

				$secondClient = $this->clientService->newClient();
				$secondClient->get('https://owncloud.com/');
			} catch (ClientException $e) {
				if ($e->getResponse()->getStatusCode() === 400) {
					return (string) $this->l10n->t('cURL is using an outdated %s version (%s). Please update your operating system or features such as %s will not work reliably.', ['NSS', $versionString, $features]);
				}
			}
		}

		return '';
	}

	/**
	 * Whether the php version is still supported (at time of release)
	 * according to: https://secure.php.net/supported-versions.php
	 */
	private function isPhpSupported(): array {
		$eol = $this->isEndOfLive();

		return ['eol' => $eol, 'version' => PHP_VERSION];
	}

	/**
	 * Check if the reverse proxy configuration is working as expected
	 *
	 * @return bool
	 */
	private function forwardedForHeadersWorking(): bool {
		$trustedProxies = $this->config->getSystemValue('trusted_proxies', []);
		$remoteAddress = $this->request->getRemoteAddress();

		if (\is_array($trustedProxies) && \in_array($remoteAddress, $trustedProxies, true)) {
			return false;
		}

		// either not enabled or working correctly
		return true;
	}

	/**
	 * Checks if the correct memcache module for PHP is installed. Only
	 * fails if memcached is configured and the working module is not installed.
	 */
	private function isCorrectMemcachedPHPModuleInstalled(): bool {
		if ($this->config->getSystemValue('memcache.distributed', null) !== '\OC\Memcache\Memcached') {
			return true;
		}

		// there are two different memcached modules for PHP
		// we only support memcached and not memcache
		// https://code.google.com/p/memcached/wiki/PHPClientComparison
		return !(!\extension_loaded('memcached') && \extension_loaded('memcache'));
	}

	/**
	 * @return RedirectResponse
	 */
	public function rescanFailedIntegrityCheck(): RedirectResponse {
		$this->checker->runInstanceVerification();
		return new RedirectResponse(
			$this->urlGenerator->linkToRoute('settings.SettingsPage.getAdmin')
		);
	}

	/**
	 * @NoCSRFRequired
	 */
	public function getFailedIntegrityCheckFiles(): DataDisplayResponse {
		if (!$this->checker->isCodeCheckEnforced()) {
			return new DataDisplayResponse('Integrity checker has been disabled. Integrity cannot be verified.');
		}

		$completeResults = $this->checker->getResults();

		if (!empty($completeResults)) {
			$formattedTextResponse = 'Technical information
=====================
The following list covers which files have failed the integrity check. Please read
the previous linked documentation to learn more about the errors and how to fix
them.

Results
=======
';
			foreach ($completeResults as $context => $contextResult) {
				$formattedTextResponse .= "- $context\n";

				foreach ($contextResult as $category => $result) {
					$formattedTextResponse .= "\t- $category\n";
					if ($category !== 'EXCEPTION') {
						foreach ($result as $key => $results) {
							$formattedTextResponse .= "\t\t- $key\n";
						}
					} else {
						foreach ($result as $results) {
							$formattedTextResponse .= "\t\t- $results\n";
						}
					}
				}
			}

			$formattedTextResponse .= '
Raw output
==========
';
			$formattedTextResponse .= \print_r($completeResults, true);
		} else {
			$formattedTextResponse = 'No errors have been found.';
		}

		return new DataDisplayResponse(
			$formattedTextResponse,
			Http::STATUS_OK,
			[
				'Content-Type' => 'text/plain',
			]
		);
	}

	/**
	 * @throws \Exception
	 */
	public function check(): DataResponse {
		return new DataResponse(
			[
				'serverHasInternetConnection' => $this->isInternetConnectionWorking(),
				'isMemcacheConfigured' => $this->isMemcacheConfigured(),
				'memcacheDocs' => $this->urlGenerator->linkToDocs('admin-performance'),
				'isUrandomAvailable' => $this->isUrandomAvailable(),
				'securityDocs' => $this->urlGenerator->linkToDocs('admin-security'),
				'isUsedTlsLibOutdated' => $this->isUsedTlsLibOutdated(),
				'phpSupported' => $this->isPhpSupported(),
				'forwardedForHeadersWorking' => $this->forwardedForHeadersWorking(),
				'reverseProxyDocs' => $this->urlGenerator->linkToDocs('admin-reverse-proxy'),
				'isCorrectMemcachedPHPModuleInstalled' => $this->isCorrectMemcachedPHPModuleInstalled(),
				'hasPassedCodeIntegrityCheck' => $this->checker->hasPassedCheck(),
				'codeIntegrityCheckerDocumentation' => $this->urlGenerator->linkToDocs('admin-code-integrity'),
				'hasDebugMode' => $this->config->getSystemValue('debug', false),
			]
		);
	}

	protected function isEndOfLive(): bool {
		// PHP 5.4 is EOL on 14 Sep 2015
		// PHP 5.5 is EOL on 21 Jul 2016
		# PHP 7.4 is EOL as well - but we support it via distributions
		return \version_compare(PHP_VERSION, '7.3.0') === -1;
	}
}
