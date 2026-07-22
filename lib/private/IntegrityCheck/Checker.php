<?php
/**
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 * @author Vincent Petry <pvince81@owncloud.com>
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

namespace OC\IntegrityCheck;

use OC\IntegrityCheck\Exceptions\InvalidSignatureException;
use OC\IntegrityCheck\Exceptions\MissingSignatureException;
use OC\IntegrityCheck\Exceptions\ReasonCodeException;
use OC\IntegrityCheck\Helpers\AppLocator;
use OC\IntegrityCheck\Helpers\EnvironmentHelper;
use OC\IntegrityCheck\Helpers\FileAccessHelper;
use OC\IntegrityCheck\Iterator\ExcludeFileByNameFilterIterator;
use OC\IntegrityCheck\Iterator\ExcludeFoldersByPathFilterIterator;
use OC\IntegrityCheck\Verifier\Verifier;
use OC\IntegrityCheck\Verifier\OnDiskHasher;
use OCP\App\IAppManager;
use OCP\ICache;
use OCP\ICacheFactory;
use OCP\IConfig;
use OCP\ITempManager;
use OCP\Http\Client\IClientService;
use OCP\ILogger;
use phpseclib3\Crypt\RSA;
use phpseclib3\Crypt\RSA\PrivateKey;
use phpseclib3\File\X509;

/**
 * Class Checker handles the code signing using X.509 and RSA. ownCloud ships with
 * a public root certificate certificate that allows to issue new certificates that
 * will be trusted for signing code. The CN will be used to verify that a certificate
 * given to a third-party developer may not be used for other applications. For
 * example the author of the application "calendar" would only receive a certificate
 * only valid for this application.
 *
 * @package OC\IntegrityCheck
 */
class Checker implements OnDiskHasher {
	public const CACHE_KEY = 'oc.integritycheck.checker';
	/** @var EnvironmentHelper */
	private $environmentHelper;
	/** @var AppLocator */
	private $appLocator;
	/** @var FileAccessHelper */
	private $fileAccessHelper;
	/** @var IConfig */
	private $config;
	/** @var ICache */
	private $cache;
	/** @var IAppManager */
	private $appManager;
	/** @var ITempManager */
	private $tempManager;
	/** @var Verifier|null */
	private $verifier;
	/** @var IClientService|null */
	private $clientService;
	/** @var ILogger|null */
	private $logger;

	/**
	 * @param EnvironmentHelper $environmentHelper
	 * @param FileAccessHelper $fileAccessHelper
	 * @param AppLocator $appLocator
	 * @param IConfig $config
	 * @param ICacheFactory $cacheFactory
	 * @param IAppManager $appManager
	 * @param ITempManager $tempManager
	 * @param Verifier|null $verifier Injected Verifier for delegation. If null, built lazily.
	 * @param IClientService|null $clientService HTTP client service for CRL fetching. Required if verifier is null.
	 * @param ILogger|null $logger Logger for diagnosing CRL fetch failures on the lazily-built verifier.
	 */
	public function __construct(
		EnvironmentHelper $environmentHelper,
		FileAccessHelper $fileAccessHelper,
		AppLocator $appLocator,
		IConfig $config = null,
		ICacheFactory $cacheFactory = null,
		IAppManager $appManager = null,
		ITempManager $tempManager = null,
		Verifier $verifier = null,
		IClientService $clientService = null,
		ILogger $logger = null
	) {
		$this->environmentHelper = $environmentHelper;
		$this->fileAccessHelper = $fileAccessHelper;
		$this->appLocator = $appLocator;
		$this->config = $config;
		$this->cache = $cacheFactory ? $cacheFactory->create(self::CACHE_KEY) : new \OC\Memcache\NullCache();
		$this->appManager = $appManager;
		$this->tempManager = $tempManager;
		$this->verifier = $verifier;
		$this->clientService = $clientService;
		$this->logger = $logger;
	}

	/**
	 * Get the Verifier instance, building it lazily if not injected.
	 *
	 * Lazy building is a fallback for tests and early initialization; in normal
	 * operation the Verifier is injected directly via the constructor.
	 *
	 * @return Verifier
	 */
	private function getVerifier(): Verifier {
		if ($this->verifier !== null) {
			return $this->verifier;
		}

		// Lazy build: construct all collaborators from existing pieces
		$trustStore = new \OC\IntegrityCheck\Verifier\TrustStore(
			$this->fileAccessHelper,
			$this->environmentHelper
		);

		$chainValidator = new \OC\IntegrityCheck\Verifier\ChainValidator($trustStore);
		$algorithmAllowlist = new \OC\IntegrityCheck\Verifier\AlgorithmAllowlist();
		$manifestVerifier = new \OC\IntegrityCheck\Verifier\ManifestVerifier();

		// CrlFetcher needs IClientService; if not provided, it can't fetch from network
		$crlFetcher = new \OC\IntegrityCheck\Verifier\CrlFetcher($this->clientService, $this->logger);
		$crlValidator = new \OC\IntegrityCheck\Verifier\CrlValidator($trustStore);
		$crlProvider = new \OC\IntegrityCheck\Verifier\CrlProvider(
			$crlFetcher,
			$crlValidator,
			$trustStore,
			$this->fileAccessHelper,
			$this->environmentHelper
		);

		$appIdResolver = new \OC\IntegrityCheck\Verifier\AppIdResolver($this->fileAccessHelper);
		$integrityDiffer = new \OC\IntegrityCheck\Verifier\IntegrityDiffer();

		$this->verifier = new Verifier(
			$chainValidator,
			$algorithmAllowlist,
			$manifestVerifier,
			$crlProvider,
			$appIdResolver,
			$integrityDiffer,
			$this,
			$this->fileAccessHelper
		);

		return $this->verifier;
	}

	/**
	 * Whether code signing is enforced or not.
	 *
	 * @return bool
	 */
	public function isCodeCheckEnforced() {
		$notSignedChannels = [ '', 'git'];
		if (\in_array($this->environmentHelper->getChannel(), $notSignedChannels, true)) {
			return false;
		}

		/**
		 * This config option is undocumented and supposed to be so, it's only
		 * applicable for very specific scenarios and we should not advertise it
		 * too prominent. So please do not add it to config.sample.php.
		 */
		$isIntegrityCheckDisabled = $this->getSystemValue('integrity.check.disabled', false);
		if ($isIntegrityCheckDisabled === true) {
			return false;
		}

		return true;
	}

	/**
	 * Compute hashes for the directory tree (OnDiskHasher interface).
	 *
	 * @param string $basePath The root directory to hash
	 * @return array Mapping of relative paths to SHA-512 hex hashes
	 */
	public function computeHashes(string $basePath): array {
		return $this->generateHashes($this->getFolderIterator($basePath), $basePath);
	}

	/**
	 * Enumerates all files belonging to the folder. Sensible defaults are excluded.
	 *
	 * @param string $folderToIterate
	 * @param string $root
	 * @return \RecursiveIteratorIterator
	 * @throws \Exception
	 */
	private function getFolderIterator($folderToIterate, $root = '') {
		$dirItr = new \RecursiveDirectoryIterator(
			$folderToIterate,
			\RecursiveDirectoryIterator::SKIP_DOTS
		);
		if ($root === '') {
			$root = \OC::$SERVERROOT;
		}
		$root = \rtrim($root, '/');

		$excludeGenericFilesIterator = new ExcludeFileByNameFilterIterator($dirItr);
		$excludeFoldersIterator = new ExcludeFoldersByPathFilterIterator($excludeGenericFilesIterator, $root);

		return new \RecursiveIteratorIterator(
			$excludeFoldersIterator,
			\RecursiveIteratorIterator::SELF_FIRST
		);
	}

	/**
	 * Returns an array of ['filename' => 'SHA512-hash-of-file'] for all files found
	 * in the iterator.
	 *
	 * @param \RecursiveIteratorIterator $iterator
	 * @param string $path
	 * @return array Array of hashes.
	 */
	private function generateHashes(
		\RecursiveIteratorIterator $iterator,
		$path
	) {
		$hashes = [];
		$copiedWebserverSettingFiles = false;
		$tmpFolder = '';

		$baseDirectoryLength = \strlen($path);
		foreach ($iterator as $filename => $data) {
			/** @var \DirectoryIterator $data */
			if ($data->isDir()) {
				continue;
			}

			$relativeFileName = \substr($filename, $baseDirectoryLength);
			$relativeFileName = \ltrim($relativeFileName, '/');

			// Exclude signature.json files in the appinfo and root folder
			if ($relativeFileName === 'appinfo/signature.json') {
				continue;
			}
			// Exclude signature.json files in the appinfo and core folder
			if ($relativeFileName === 'core/signature.json') {
				continue;
			}

			// The .user.ini and the .htaccess file of ownCloud can contain some
			// custom modifications such as for example the maximum upload size
			// to ensure that this will not lead to false positives this will
			// copy the file to a temporary folder and reset it to the default
			// values.
			if ($filename === $this->environmentHelper->getServerRoot() . '/.htaccess'
				|| $filename === $this->environmentHelper->getServerRoot() . '/.user.ini') {
				if (!$copiedWebserverSettingFiles) {
					$tmpFolder = \rtrim($this->tempManager->getTemporaryFolder(), '/');
					\copy($this->environmentHelper->getServerRoot() . '/.htaccess', $tmpFolder . '/.htaccess');
					\copy($this->environmentHelper->getServerRoot() . '/.user.ini', $tmpFolder . '/.user.ini');
				}
			}

			// The .user.ini file can contain custom modifications to the file size
			// as well.
			if ($filename === $this->environmentHelper->getServerRoot() . '/.user.ini') {
				$fileContent = \file_get_contents($tmpFolder . '/.user.ini');
				$hashes[$relativeFileName] = \hash('sha512', $fileContent);
				continue;
			}

			// The .htaccess file in the root folder of ownCloud can contain
			// custom content after the installation due to the fact that dynamic
			// content is written into it at installation time as well. This
			// includes for example the 404 and 403 instructions.
			// Thus we ignore everything below the first occurrence of
			// "#### DO NOT CHANGE ANYTHING ABOVE THIS LINE ####" and have the
			// hash generated based on this.
			if ($filename === $this->environmentHelper->getServerRoot() . '/.htaccess') {
				$fileContent = \file_get_contents($tmpFolder . '/.htaccess');
				$explodedArray = \explode('#### DO NOT CHANGE ANYTHING ABOVE THIS LINE ####', $fileContent);
				if (\count($explodedArray) === 2) {
					$hashes[$relativeFileName] = \hash('sha512', $explodedArray[0]);
					continue;
				}
			}

			$hashes[$relativeFileName] = \hash_file('sha512', $filename);
		}

		return $hashes;
	}

	/**
	 * Creates the signature data
	 *
	 * @param array $hashes
	 * @param array $certificate
	 * @param RSA $privateKey
	 * @param X509 $x509,
	 * @return array
	 */
	private function createSignatureData(
		array $hashes,
		array $certificate,
		RSA $privateKey,
		X509 $x509
	) {
		\ksort($hashes);

		$privateKey = $privateKey
			->withMGFHash('sha512')
			->withSaltLength(0)
			->withPadding(RSA::SIGNATURE_PSS);

		$signature = $privateKey->sign(\json_encode($hashes));

		return [
				'hashes' => $hashes,
				'signature' => \base64_encode($signature),
				'certificate' => $x509->saveX509($certificate),
			];
	}

	/**
	 * Write the signature of the app in the specified folder
	 *
	 * @param string $path
	 * @param array $certificate
	 * @param X509 $x509
	 * @param RSA $privateKey
	 * @throws \Exception
	 */
	public function writeAppSignature(
		string $path,
		array $certificate,
		X509 $x509,
		RSA $privateKey
	) {
		$appInfoDir = $path . '/appinfo';
		$this->fileAccessHelper->assertDirectoryExists($path);
		$this->fileAccessHelper->assertDirectoryExists($appInfoDir);

		$iterator = $this->getFolderIterator($path);
		$hashes = $this->generateHashes($iterator, $path);
		$signature = $this->createSignatureData($hashes, $certificate, $privateKey, $x509);
		try {
			$this->fileAccessHelper->file_put_contents(
				$appInfoDir . '/signature.json',
				\json_encode($signature, JSON_PRETTY_PRINT)
			);
		} catch (\Exception $e) {
			if (!$this->fileAccessHelper->is_writeable($appInfoDir)) {
				throw new \Exception($appInfoDir . ' is not writable');
			}
			throw $e;
		}
	}

	/**
	 * Write the signature of core
	 *
	 * @param string $path
	 * @param array $certificate
	 * @param X509 $x509
	 * @param RSA $privateKey
	 * @throws \Exception
	 */
	public function writeCoreSignature(
		string $path,
		array $certificate,
		X509 $x509,
		RSA $privateKey
	) {
		$coreDir = $path . '/core';
		$this->fileAccessHelper->assertDirectoryExists($path);
		$this->fileAccessHelper->assertDirectoryExists($coreDir);

		$iterator = $this->getFolderIterator($path, $path);
		$hashes = $this->generateHashes($iterator, $path);
		$signatureData = $this->createSignatureData($hashes, $certificate, $privateKey, $x509);
		try {
			$this->fileAccessHelper->file_put_contents(
				$coreDir . '/signature.json',
				\json_encode($signatureData, JSON_PRETTY_PRINT)
			);
		} catch (\Exception $e) {
			if (!$this->fileAccessHelper->is_writeable($coreDir)) {
				throw new \Exception($coreDir . ' is not writable');
			}
			throw $e;
		}
	}

	/**
	 * Verifies the signature for the specified path, delegating to the Verifier.
	 *
	 * @param string $signaturePath
	 * @param string $basePath
	 * @param string $certificateCN
	 * @param boolean $force
	 * @return array
	 * @throws InvalidSignatureException
	 * @throws MissingSignatureException
	 * @throws \OC\IntegrityCheck\Exceptions\BadChainException
	 * @throws \OC\IntegrityCheck\Exceptions\BadAlgorithmException
	 * @throws \OC\IntegrityCheck\Exceptions\BadSignatureException
	 * @throws \OC\IntegrityCheck\Exceptions\RevokedException
	 * @throws \OC\IntegrityCheck\Exceptions\CrlUnavailableException
	 * @throws \OC\IntegrityCheck\Exceptions\CnMismatchException
	 */
	private function verify($signaturePath, $basePath, $certificateCN, $force = false) {
		if (!$force && !$this->isCodeCheckEnforced()) {
			return [];
		}

		$excluded = $this->getSystemValue('integrity.excluded.files', []);
		$coreMode = ($certificateCN === 'core');

		$result = $this->getVerifier()->verify(
			$signaturePath,
			$basePath,
			$certificateCN,
			$coreMode,
			null,
			$excluded
		);

		return $result->toLegacyResultArray();
	}

	/**
	 * Whether the code integrity check has passed successful or not
	 *
	 * @return bool
	 */
	public function hasPassedCheck() {
		$results = $this->getResults();
		if (empty($results)) {
			return true;
		}

		// Check each result scope
		foreach ($results as $scope => $result) {
			if (!\is_array($result) || empty($result)) {
				// Empty result for this scope; continue
				continue;
			}

			// If the result contains only LEGACY_ACCEPTED_WARN, treat as passed
			if (\array_key_exists('LEGACY_ACCEPTED_WARN', $result) && \count($result) === 1) {
				// This scope has only the warn marker; continue checking others
				continue;
			}

			// Any other result (EXCEPTION, FILE_MISSING, EXTRA_FILE, INVALID_HASH, etc.) is a failure
			return false;
		}

		// All scopes either have no result or only the warn marker
		return true;
	}

	/**
	 * @return array
	 */
	public function getResults() {
		$cachedResults = $this->cache->get(self::CACHE_KEY);
		if ($cachedResults !== null) {
			return \json_decode($cachedResults, true);
		}

		$v = $this->getAppValue(self::CACHE_KEY, '{}') ?? '{}';
		return \json_decode($v, true);
	}

	/**
	 * Stores the results in the app config as well as cache
	 *
	 * @param string $scope
	 * @param array $result
	 */
	private function storeResults($scope, array $result) {
		$resultArray = $this->getResults();
		unset($resultArray[$scope]);
		if (!empty($result)) {
			$resultArray[$scope] = $result;
		}

		$this->setAppValue(self::CACHE_KEY, \json_encode($resultArray));
		//Set cache for each app
		$this->cache->set($scope, \json_encode($resultArray));
		$this->cache->set(self::CACHE_KEY, \json_encode($resultArray));
	}

	/**
	 *
	 * Clean previous results for a proper rescanning. Otherwise
	 */
	private function cleanResults() {
		$this->deleteAppValue(self::CACHE_KEY);
		$this->cache->remove(self::CACHE_KEY);
	}

	/**
	 * Sanity wrapper for getSystemValue
	 * @param string $key
	 * @param string $default
	 * @return string
	 */
	private function getSystemValue($key, $default = '') {
		if ($this->config !== null) {
			return $this->config->getSystemValue($key, $default);
		}
		return $default;
	}

	/**
	 * Get a list of apps that are allowed to have no signature.json
	 * @return string[]
	 */
	private function getIgnoredUnsignedApps() {
		$ignoredUnsignedApps = $this->getSystemValue(
			'integrity.ignore.missing.app.signature',
			[]
		);
		if (\is_array($ignoredUnsignedApps)===false) {
			$ignoredUnsignedApps = [];
		}
		return $ignoredUnsignedApps;
	}

	/**
	 * Sanity wrapper for getAppValue
	 * @param string $key
	 * @param string $default
	 * @return string
	 */
	private function getAppValue($key, $default = '') {
		if ($this->config !== null) {
			return $this->config->getAppValue('core', $key, $default);
		}
		return $default;
	}

	/**
	 * Sanity wrapper for setAppValue
	 * @param string $key
	 * @param string $value
	 */
	private function setAppValue($key, $value) {
		if ($this->config !== null) {
			$this->config->setAppValue('core', $key, $value);
		}
	}

	/**
	 * Sanity wrapper for deleteAppValue
	 * @param string $key
	 */
	private function deleteAppValue($key) {
		if ($this->config !== null) {
			$this->config->deleteAppValue('core', $key);
		}
	}

	/**
	 * Get the verified apps from the cache, if the result is cached.
	 * If the app result is not cached, then verification result will get cached
	 * and then returned.
	 *
	 * The reason for introducing this method:
	 * verifyAppSignature() internally calls verify() which does call phpseclib
	 * routines like validateSignature(). validateSignature is taking lot of memory.
	 * Hence its better to cache the results to avoid huge memory consumption.
	 *
	 * @param string $appId
	 * @param string $path Optional path. If none is given it will be guessed.
	 * @param bool $force force check even if disabled
	 * @return array
	 */
	public function getVerifiedAppsFromCache($appId, $path = '', $force = false) {
		$cacheVal = $this->cache->get($appId);
		if ($cacheVal !== null) {
			return $cacheVal;
		}
		return $this->verifyAppSignature($appId, $path, $force);
	}

	/**
	 * Verify the signature of $appId. Returns an array with the following content:
	 * [
	 * 	'FILE_MISSING' =>
	 * 	[
	 * 		'filename' => [
	 * 			'expected' => 'expectedSHA512',
	 * 			'current' => 'currentSHA512',
	 * 		],
	 * 	],
	 * 	'EXTRA_FILE' =>
	 * 	[
	 * 		'filename' => [
	 * 			'expected' => 'expectedSHA512',
	 * 			'current' => 'currentSHA512',
	 * 		],
	 * 	],
	 * 	'INVALID_HASH' =>
	 * 	[
	 * 		'filename' => [
	 * 			'expected' => 'expectedSHA512',
	 * 			'current' => 'currentSHA512',
	 * 		],
	 * 	],
	 * ]
	 *
	 * Array may be empty in case no problems have been found.
	 *
	 * @param string $appId
	 * @param string $path Optional path. If none is given it will be guessed.
	 * @param boolean $force force check even if disabled
	 * @return array
	 */
	public function verifyAppSignature($appId, $path = '', $force = false) {
		try {
			if ($path === '') {
				$path = $this->appLocator->getAppPath($appId);
			}

			$result = $this->verify(
				$path . '/appinfo/signature.json',
				$path,
				$appId,
				$force
			);
		} catch (MissingSignatureException $e) {
			if (!\in_array($appId, $this->getIgnoredUnsignedApps())) {
				$result = [
					'EXCEPTION' => [
						'class' => \get_class($e),
						'message' => $e->getMessage(),
					],
				];
				if (\method_exists($e, 'getReasonCode')) {
					$result['REASON'] = $e->getReasonCode();
				}
			} else {
				$result = [];
			}
		} catch (\Throwable $e) {
			$result = [
					'EXCEPTION' => [
							'class' => \get_class($e),
							'message' => $e->getMessage(),
					],
			];
			if ($e instanceof ReasonCodeException) {
				$result['REASON'] = $e->getReasonCode();
			}
		}
		$this->storeResults($appId, $result);

		return $result;
	}

	/**
	 * Verify the signature of core. Returns an array with the following content:
	 * [
	 * 	'FILE_MISSING' =>
	 * 	[
	 * 		'filename' => [
	 * 			'expected' => 'expectedSHA512',
	 * 			'current' => 'currentSHA512',
	 * 		],
	 * 	],
	 * 	'EXTRA_FILE' =>
	 * 	[
	 * 		'filename' => [
	 * 			'expected' => 'expectedSHA512',
	 * 			'current' => 'currentSHA512',
	 * 		],
	 * 	],
	 * 	'INVALID_HASH' =>
	 * 	[
	 * 		'filename' => [
	 * 			'expected' => 'expectedSHA512',
	 * 			'current' => 'currentSHA512',
	 * 		],
	 * 	],
	 * ]
	 *
	 * Array may be empty in case no problems have been found.
	 *
	 * @return array
	 */
	public function verifyCoreSignature() {
		try {
			$result = $this->verify(
				$this->environmentHelper->getServerRoot() . '/core/signature.json',
				$this->environmentHelper->getServerRoot(),
				'core'
			);
		} catch (\Throwable $e) {
			$result = [
					'EXCEPTION' => [
							'class' => \get_class($e),
							'message' => $e->getMessage(),
					],
			];
			if ($e instanceof ReasonCodeException) {
				$result['REASON'] = $e->getReasonCode();
			}
		}
		$this->storeResults('core', $result);

		return $result;
	}

	/**
	 * Verify the core code of the instance as well as all applicable applications
	 * and store the results.
	 */
	public function runInstanceVerification() {
		$this->cleanResults();
		$this->verifyCoreSignature();

		// FIXME: appManager === null means ownCloud is not installed. We check all apps in this case
		$forceCheckAllApps = $this->appManager === null;
		$appIds = $this->appLocator->getAllApps();
		foreach ($appIds as $appId) {
			// If an application is shipped a valid signature is required
			$isShipped = $forceCheckAllApps || $this->appManager->isShipped($appId);
			$appNeedsToBeChecked = false;
			if ($isShipped) {
				$appNeedsToBeChecked = true;
			} elseif ($this->fileAccessHelper->file_exists($this->appLocator->getAppPath($appId) . '/appinfo/signature.json')) {
				// Otherwise only if the application explicitly ships a signature.json file
				$appNeedsToBeChecked = true;
			}

			if ($appNeedsToBeChecked) {
				$this->verifyAppSignature($appId);
			}
		}
	}
}
