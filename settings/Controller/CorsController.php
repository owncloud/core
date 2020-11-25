<?php
/**
 * @author Noveen Sachdeva "noveen.sachdeva@research.iiit.ac.in"
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
 */

namespace OC\Settings\Controller;

use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\RedirectResponse;
use OCP\AppFramework\Http\JSONResponse;
use OCP\IL10N;
use OCP\ILogger;
use OCP\IRequest;
use OCP\IURLGenerator;
use OCP\IConfig;
use OCP\IUserSession;

/**
 * This controller is responsible for managing white-listed domains for CORS
 *
 * @package OC\Settings\Controller
 */
class CorsController extends Controller {

	/** @var ILogger */
	private $logger;

	/** @var IURLGenerator */
	private $urlGenerator;

	/** @var string */
	private $userId;

	/** @var IConfig */
	private $config;

	/** @var string  */
	private $AppName;

	/** @var IL10N */
	private $l10n;

	/**
	 * CorsController constructor.
	 *
	 * @param string $AppName The app's name.
	 * @param IRequest $request The request.
	 * @param IUserSession $userSession Logged in user's session
	 * @param ILogger $logger The logger.
	 * @param IURLGenerator $urlGenerator Use for url generation
	 * @param IConfig $config
	 */
	public function __construct($AppName, IRequest $request,
								IUserSession $userSession,
								ILogger $logger,
								IURLGenerator $urlGenerator,
								IConfig $config,
								IL10N $l10n) {
		parent::__construct($AppName, $request);

		$this->AppName = $AppName;
		$this->config = $config;
		$this->userId = $userSession->getUser()->getUID();
		$this->logger = $logger;
		$this->urlGenerator = $urlGenerator;
		$this->l10n = $l10n;
	}

	/**
	 * Gets all White-listed domains
	 *
	 * @NoAdminRequired
	 * @NoSubadminRequired
	 *
	 * @return JSONResponse All the White-listed domains
	 */
	public function getDomains() {
		$userId = $this->userId;
		$domains = \json_decode($this->config->getUserValue($userId, 'core', 'domains', '[]'), true);
		return new JSONResponse($domains);
	}

	/**
	 * WhiteLists a domain for CORS
	 *
	 * @NoAdminRequired
	 * @NoSubadminRequired
	 *
	 * @param string $domain The domain to whitelist
	 * @return JSONResponse
	 */
	public function addDomain($domain) {
		if ($this->isValidUrl($domain)) {
			$userId = $this->userId;
			$domains = \json_decode($this->config->getUserValue($userId, 'core', 'domains', '[]'), true);
			$domains = \array_filter($domains);
			\array_push($domains, $domain);

			// In case same domain is added
			$domains = \array_unique($domains);

			// Store as comma separated string
			$domainsString = \json_encode($domains);

			$this->config->setUserValue($userId, 'core', 'domains', $domainsString);
			$this->logger->debug("The domain {$domain} has been white-listed.", ['app' => $this->appName]);
			return new JSONResponse([ 'domains' => $domains]);
		} else {
			$errorMsg = $this->l10n->t("Invalid url '%s'. Urls should be set up like 'http://www.example.com' or 'https://www.example.com'", \strip_tags($domain));
			return new JSONResponse([ 'message' => $errorMsg ]);
		}
	}

	/**
	 * Removes a WhiteListed Domain
	 *
	 * @NoAdminRequired
	 * @NoSubadminRequired
	 *
	 * @param string $domain Domain to remove
	 * @return JSONResponse Redirection to the settings page.
	 */
	public function removeDomain($domain) {
		$userId = $this->userId;
		$decodedDomain = \urldecode($domain);
		$domains = \json_decode($this->config->getUserValue($userId, 'core', 'domains', '[]'), true);
		if (($key = \array_search($decodedDomain, $domains)) !== false) {
			unset($domains[$key]);
			if (\count($domains)) {
				$this->config->setUserValue($userId, 'core', 'domains', \json_encode($domains));
			} else {
				$this->config->deleteUserValue($userId, 'core', 'domains');
			}
		}
		return new JSONResponse([ 'domains' => $domains ]);
	}

	/**
	 * Checks whether a URL is valid
	 * @param  string  $url URL to check
	 * @return boolean      whether URL is valid
	 */
	private function isValidUrl(string $url) {
		$parsedUrl = \parse_url($url);

		if (!\filter_var($url, FILTER_VALIDATE_URL) || !$parsedUrl) {
			return  false;
		}

		// Check if uri protocol is http or https
		$notAllowedUrlComponents = ['user', 'pass', 'path', 'query', 'fragment'];
		if (!isset($parsedUrl['scheme']) || ($parsedUrl['scheme'] !== 'http' && $parsedUrl['scheme'] !== 'https')) {
			return false;
		}

		// Check if uri contains not allowed component
		foreach ($notAllowedUrlComponents as $fragment) {
			if (isset($parsedUrl[$fragment])) {
				return false;
			}
		}

		return true;
	}
}
