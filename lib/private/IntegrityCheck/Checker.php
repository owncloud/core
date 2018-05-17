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
use OC\IntegrityCheck\Helpers\AppLocator;
use OC\IntegrityCheck\Helpers\EnvironmentHelper;
use OC\IntegrityCheck\Helpers\FileAccessHelper;
use OC\IntegrityCheck\Iterator\ExcludeFileByNameFilterIterator;
use OC\IntegrityCheck\Iterator\ExcludeFoldersByPathFilterIterator;
use OCP\App\IAppManager;
use OCP\ICache;
use OCP\ICacheFactory;
use OCP\IConfig;
use OCP\ITempManager;
use phpseclib\Crypt\RSA;
use phpseclib\File\X509;

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
class Checker {
	const CACHE_KEY = 'oc.integritycheck.checker';
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

	/**
	 * @param EnvironmentHelper $environmentHelper
	 * @param FileAccessHelper $fileAccessHelper
	 * @param AppLocator $appLocator
	 * @param IConfig $config
	 * @param ICacheFactory $cacheFactory
	 * @param IAppManager $appManager
	 * @param ITempManager $tempManager
	 */
	public function __construct(EnvironmentHelper $environmentHelper,
								FileAccessHelper $fileAccessHelper,
								AppLocator $appLocator,
								IConfig $config = null,
								ICacheFactory $cacheFactory,
								IAppManager $appManager = null,
								ITempManager $tempManager) {
		$this->environmentHelper = $environmentHelper;
		$this->fileAccessHelper = $fileAccessHelper;
		$this->appLocator = $appLocator;
		$this->config = $config;
		$this->cache = $cacheFactory->create(self::CACHE_KEY);
		$this->appManager = $appManager;
		$this->tempManager = $tempManager;
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
	private function generateHashes(\RecursiveIteratorIterator $iterator,
									$path) {
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
	 * @param X509 $certificate
	 * @param RSA $privateKey
	 * @return array
	 */
	private function createSignatureData(array $hashes,
										 X509 $certificate,
										 RSA $privateKey) {
		\ksort($hashes);

		$privateKey->setSignatureMode(RSA::SIGNATURE_PSS);
		$privateKey->setMGFHash('sha512');
		$privateKey->setSaltLength(0);
		$signature = $privateKey->sign(\json_encode($hashes));

		return [
				'hashes' => $hashes,
				'signature' => \base64_encode($signature),
				'certificate' => $certificate->saveX509($certificate->currentCert),
			];
	}

	/**
	 * Write the signature of the app in the specified folder
	 *
	 * @param string $path
	 * @param X509 $certificate
	 * @param RSA $privateKey
	 * @throws \Exception
	 */
	public function writeAppSignature($path,
									  X509 $certificate,
									  RSA $privateKey) {
		$appInfoDir = $path . '/appinfo';
		$this->fileAccessHelper->assertDirectoryExists($path);
		$this->fileAccessHelper->assertDirectoryExists($appInfoDir);

		$iterator = $this->getFolderIterator($path);
		$hashes = $this->generateHashes($iterator, $path);
		$signature = $this->createSignatureData($hashes, $certificate, $privateKey);
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
	 * @param X509 $certificate
	 * @param RSA $rsa
	 * @param string $path
	 * @throws \Exception
	 */
	public function writeCoreSignature(X509 $certificate,
									   RSA $rsa,
									   $path) {
		$coreDir = $path . '/core';
		$this->fileAccessHelper->assertDirectoryExists($path);
		$this->fileAccessHelper->assertDirectoryExists($coreDir);

		$iterator = $this->getFolderIterator($path, $path);
		$hashes = $this->generateHashes($iterator, $path);
		$signatureData = $this->createSignatureData($hashes, $certificate, $rsa);
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
	 * Verifies the signature for the specified path.
	 *
	 * @param string $signaturePath
	 * @param string $basePath
	 * @param string $certificateCN
	 * @param boolean $force
	 * @return array
	 * @throws InvalidSignatureException
	 * @throws MissingSignatureException
	 * @throws \Exception
	 */
	private function verify($signaturePath, $basePath, $certificateCN, $force = false) {
		if (!$force && !$this->isCodeCheckEnforced()) {
			return [];
		}

		$signatureData = \json_decode($this->fileAccessHelper->file_get_contents($signaturePath), true);
		if (!\is_array($signatureData)) {
			throw new MissingSignatureException('Signature data not found.');
		}

		$expectedHashes = $signatureData['hashes'];
		\ksort($expectedHashes);
		$signature = \base64_decode($signatureData['signature']);
		$certificate = $signatureData['certificate'];

		// Check if certificate is signed by ownCloud Root Authority
		$x509 = new \phpseclib\File\X509();
		$rootCertificatePublicKey = $this->fileAccessHelper->file_get_contents($this->environmentHelper->getServerRoot().'/resources/codesigning/root.crt');
		$x509->loadCA($rootCertificatePublicKey);
		$loadedCertificate = $x509->loadX509($certificate);
		if (!$x509->validateSignature()) {
			throw new InvalidSignatureException('App Certificate is not valid.');
		}

		// Check if the certificate has been revoked
		$crlFileContent = $this->fileAccessHelper->file_get_contents($this->environmentHelper->getServerRoot().'/resources/codesigning/intermediate.crl.pem');
		if ($crlFileContent && \strlen($crlFileContent) > 0) {
			$crl = new \phpseclib\File\X509();
			$crl->loadCA($rootCertificatePublicKey);
			$crl->loadCRL($crlFileContent);
			if (!$crl->validateSignature()) {
				throw new InvalidSignatureException('Certificate Revocation List is not valid.');
			}
			// Get the certificate's serial number.
			$csn = $loadedCertificate['tbsCertificate']['serialNumber']->toString();

			// Check certificate revocation status.
			$revoked = $crl->getRevoked($csn);
			if ($revoked) {
				throw new InvalidSignatureException('Certificate has been revoked.');
			}
		}

		// Verify if certificate has proper CN. "core" CN is always trusted.
		if ($x509->getDN(X509::DN_OPENSSL)['CN'] !== $certificateCN && $x509->getDN(X509::DN_OPENSSL)['CN'] !== 'core') {
			$cn = $x509->getDN(true)['CN'];
			throw new InvalidSignatureException(
					"Certificate is not valid for required scope. (Requested: $certificateCN, current: CN=$cn)");
		}

		// Check if the signature of the files is valid
		$rsa = new \phpseclib\Crypt\RSA();
		$rsa->loadKey($x509->currentCert['tbsCertificate']['subjectPublicKeyInfo']['subjectPublicKey']);
		$rsa->setSignatureMode(RSA::SIGNATURE_PSS);
		$rsa->setSaltLength(0);
		$rsa->setMGFHash('sha512');
		if (!$rsa->verify(\json_encode($expectedHashes), $signature)) {
			throw new InvalidSignatureException('Signature could not get verified.');
		}

		//Exclude files which shouldn't fall for comparison
		$excludeFiles = $this->getSystemValue('integrity.excluded.files', []);

		// Compare the list of files which are not identical
		$currentInstanceHashes = $this->generateHashes($this->getFolderIterator($basePath), $basePath);
		$differencesA = \array_diff($expectedHashes, $currentInstanceHashes);
		$differencesB = \array_diff($currentInstanceHashes, $expectedHashes);
		$differences = \array_unique(\array_merge($differencesA, $differencesB));
		$differenceArray = [];
		foreach ($differences as $filename => $hash) {
			//If filename in exclude files list, then ignore it
			if (\in_array($filename, $excludeFiles, true)) {
				continue;
			}
			// Check if file should not exist in the new signature table
			if (!\array_key_exists($filename, $expectedHashes)) {
				$differenceArray['EXTRA_FILE'][$filename]['expected'] = '';
				$differenceArray['EXTRA_FILE'][$filename]['current'] = $hash;
				continue;
			}

			// Check if file is missing
			if (!\array_key_exists($filename, $currentInstanceHashes)) {
				$differenceArray['FILE_MISSING'][$filename]['expected'] = $expectedHashes[$filename];
				$differenceArray['FILE_MISSING'][$filename]['current'] = '';
				continue;
			}

			// Check if hash does mismatch
			if ($expectedHashes[$filename] !== $currentInstanceHashes[$filename]) {
				$differenceArray['INVALID_HASH'][$filename]['expected'] = $expectedHashes[$filename];
				$differenceArray['INVALID_HASH'][$filename]['current'] = $currentInstanceHashes[$filename];
				continue;
			}

			// Should never happen.
			throw new \Exception('Invalid behaviour in file hash comparison experienced. Please report this error to the developers.');
		}

		return $differenceArray;
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

		return false;
	}

	/**
	 * @return array
	 */
	public function getResults() {
		$cachedResults = $this->cache->get(self::CACHE_KEY);
		if ($cachedResults !== null) {
			return \json_decode($cachedResults, true);
		}

		return \json_decode($this->getAppValue(self::CACHE_KEY, '{}'), true);
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
			} else {
				$result = [];
			}
		} catch (\Exception $e) {
			$result = [
					'EXCEPTION' => [
							'class' => \get_class($e),
							'message' => $e->getMessage(),
					],
			];
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
		} catch (\Exception $e) {
			$result = [
					'EXCEPTION' => [
							'class' => \get_class($e),
							'message' => $e->getMessage(),
					],
			];
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
