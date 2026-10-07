<?php
/**
 * @author Jesús Macias <jmacias@solidgear.es>
 * @author Juan Pablo Villafáñez <jvillafanez@solidgear.es>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCA\Files_External\Controller;

use OCP\AppFramework\Controller;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\Files\External\Auth\AuthMechanism;
use OCP\Files\External\Backend\Backend;
use OCP\Files\External\InsufficientDataForMeaningfulAnswerException;
use OCP\Files\External\IStorageConfig;
use OCP\Files\External\NotFoundException;
use OCP\Files\External\Service\IStoragesService;
use OCP\Files\StorageNotAvailableException;
use OCP\IConfig;
use OCP\IL10N;
use OCP\ILogger;
use OCP\IRequest;

/**
 * Base class for storages controllers
 */
abstract class StoragesController extends Controller {
	/**
	 * L10N service
	 *
	 * @var IL10N
	 */
	protected $l10n;

	/**
	 * Storages service
	 *
	 * @var IStoragesService
	 */
	protected $service;

	/**
	 * @var ILogger
	 */
	protected $logger;

	/**
	 * @var IConfig
	 */
	protected $config;

	/**
	 * Creates a new storages controller.
	 *
	 * @param string $AppName application name
	 * @param IRequest $request request object
	 * @param IL10N $l10n l10n service
	 * @param IStoragesService $storagesService storage service
	 * @param ILogger $logger
	 * @param IConfig $config
	 */
	public function __construct(
		$AppName,
		IRequest $request,
		IL10N $l10n,
		IStoragesService $storagesService,
		ILogger $logger,
		IConfig $config = null
	) {
		parent::__construct($AppName, $request);
		$this->l10n = $l10n;
		$this->service = $storagesService;
		$this->logger = $logger;
		$this->config = $config ?? \OC::$server->getConfig();
	}

	/**
	 * Create a storage from its parameters
	 *
	 * @param string $mountPoint storage mount point
	 * @param string $backend backend identifier
	 * @param string $authMechanism authentication mechanism identifier
	 * @param array $backendOptions backend-specific options
	 * @param array|null $mountOptions mount-specific options
	 * @param array|null $applicableUsers users for which to mount the storage
	 * @param array|null $applicableGroups groups for which to mount the storage
	 * @param int|null $priority priority
	 *
	 * @return IStorageConfig|DataResponse
	 */
	protected function createStorage(
		$mountPoint,
		$backend,
		$authMechanism,
		$backendOptions,
		$mountOptions = null,
		$applicableUsers = null,
		$applicableGroups = null,
		$priority = null
	) {
		try {
			return $this->service->createStorage(
				$mountPoint,
				$backend,
				$authMechanism,
				$backendOptions,
				$mountOptions,
				$applicableUsers,
				$applicableGroups,
				$priority
			);
		} catch (\InvalidArgumentException $e) {
			$this->logger->logException($e);
			return new DataResponse(
				[
					'message' => (string)$this->l10n->t('Invalid backend or authentication mechanism class')
				],
				Http::STATUS_UNPROCESSABLE_ENTITY
			);
		}
	}

	/**
	 * Validate storage config
	 *
	 * @param IStorageConfig $storage storage config
	 *1
	 * @return DataResponse|null returns response in case of validation error
	 */
	protected function validate(IStorageConfig $storage) {
		$mountPoint = $storage->getMountPoint();
		if ($mountPoint === '' || $mountPoint === '/') {
			return new DataResponse(
				[
					'message' => (string)$this->l10n->t('Invalid mount point')
				],
				Http::STATUS_UNPROCESSABLE_ENTITY
			);
		}

		if ($storage->getBackendOption('objectstore')) {
			// objectstore must not be sent from client side
			return new DataResponse(
				[
					'message' => (string)$this->l10n->t('Objectstore forbidden')
				],
				Http::STATUS_UNPROCESSABLE_ENTITY
			);
		}

		/** @var Backend */
		$backend = $storage->getBackend();
		/** @var AuthMechanism */
		$authMechanism = $storage->getAuthMechanism();
		if ($backend->checkDependencies()) {
			// invalid backend
			return new DataResponse(
				[
					'message' => (string)$this->l10n->t('Invalid storage backend "%s"', [
						$backend->getIdentifier()
					])
				],
				Http::STATUS_UNPROCESSABLE_ENTITY
			);
		}

		if (!$backend->isVisibleFor($this->service->getVisibilityType())) {
			// not permitted to use backend
			return new DataResponse(
				[
					'message' => (string)$this->l10n->t('Not permitted to use backend "%s"', [
						$backend->getIdentifier()
					])
				],
				Http::STATUS_FORBIDDEN
			);
		}
		if (!$authMechanism->isVisibleFor($this->service->getVisibilityType())) {
			// not permitted to use auth mechanism
			return new DataResponse(
				[
					'message' => (string)$this->l10n->t('Not permitted to use authentication mechanism "%s"', [
						$authMechanism->getIdentifier()
					])
				],
				Http::STATUS_FORBIDDEN
			);
		}

		if (!$backend->validateStorage($storage)) {
			// unsatisfied parameters
			return new DataResponse(
				[
					'message' => (string)$this->l10n->t('Unsatisfied backend parameters')
				],
				Http::STATUS_UNPROCESSABLE_ENTITY
			);
		}
		if (!$authMechanism->validateStorage($storage)) {
			// unsatisfied parameters
			return new DataResponse(
				[
					'message' => (string)$this->l10n->t('Unsatisfied authentication mechanism parameters')
				],
				Http::STATUS_UNPROCESSABLE_ENTITY
			);
		}

		$hostValidation = $this->validateHostOption($storage);
		if ($hostValidation !== null) {
			return $hostValidation;
		}

		return null;
	}

	/**
	 * Validate the host backend option against SSRF (Server-Side Request Forgery).
	 *
	 * Rejects private/reserved/loopback/link-local addresses unless the admin
	 * has explicitly allowed them via the 'files_external_allow_private_address'
	 * system config key.
	 *
	 * @param IStorageConfig $storage storage config
	 * @return DataResponse|null returns a 403 response when the host is blocked,
	 *                           null when the host is acceptable
	 */
	protected function validateHostOption(IStorageConfig $storage) {
		// Admins may explicitly allow private-network targets (e.g. internal NAS)
		if ($this->config->getSystemValue('files_external_allow_private_address', false)) {
			return null;
		}

		$host = $storage->getBackendOption('host');
		if ($host === null || $host === '') {
			return null;
		}

		// Strip a trailing path component and an explicit scheme so that
		// parse_url() can reliably extract just the hostname / IP.
		// Handles all of these forms:
		//   192.168.1.1
		//   192.168.1.1:445
		//   https://192.168.1.1/path
		//   169.254.169.254/latest/meta-data/
		$normalised = (string)$host;
		if (!\preg_match('#^[a-zA-Z][a-zA-Z0-9+\-.]*://#', $normalised)) {
			// Prepend a dummy scheme so parse_url works on bare host[:port][/path]
			$normalised = 'dummy://' . $normalised;
		}
		$parsed = \parse_url($normalised);
		$hostname = isset($parsed['host']) ? \trim($parsed['host'], '[]') : '';

		if ($hostname === '') {
			// Cannot parse host — reject to be safe
			return new DataResponse(
				[
					'message' => (string)$this->l10n->t('Invalid host')
				],
				Http::STATUS_UNPROCESSABLE_ENTITY
			);
		}

		// Resolve hostname to an IP address for range checks.
		// gethostbyname() returns the original string on failure, which is fine
		// because filter_var() will then just validate it as-is.
		$ip = \filter_var($hostname, FILTER_VALIDATE_IP)
			? $hostname
			: \gethostbyname($hostname);

		if ($this->isBlockedAddress($ip, $hostname)) {
			return new DataResponse(
				[
					'message' => (string)$this->l10n->t(
						'Host "%s" is not allowed (private/reserved address)',
						[$host]
					)
				],
				Http::STATUS_FORBIDDEN
			);
		}

		return null;
	}

	/**
	 * Returns true when the given IP (or unresolvable hostname) targets a
	 * private, loopback, link-local, or otherwise reserved address.
	 *
	 * @param string $ip   The resolved IPv4 / IPv6 address (or original hostname
	 *                     when DNS resolution failed).
	 * @param string $hostname  The original hostname before resolution.
	 * @return bool
	 */
	private function isBlockedAddress($ip, $hostname) {
		// Explicit loopback hostnames
		if (\in_array(\strtolower($hostname), ['localhost', 'localhost.localdomain'], true)) {
			return true;
		}

		// If the value is not a valid IP at all we cannot perform range checks —
		// allow it (the backend will fail with a connection error anyway).
		if (\filter_var($ip, FILTER_VALIDATE_IP) === false) {
			return false;
		}

		// Block loopback (127.0.0.0/8, ::1)
		if (\filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_RES_RANGE) === false) {
			return true;
		}

		// Block RFC-1918 / ULA private ranges
		if (\filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE) === false) {
			return true;
		}

		// Block IPv4 link-local (169.254.0.0/16) — not covered by FILTER_FLAG_NO_PRIV_RANGE
		if (\filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false) {
			$long = \ip2long($ip);
			// 169.254.0.0 = 0xA9FE0000, mask /16 = 0xFFFF0000
			if (($long & 0xFFFF0000) === 0xA9FE0000) {
				return true;
			}
		}

		// Block IPv6 link-local (fe80::/10)
		if (\filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== false) {
			// fe80:: through febf::
			if (\stripos($ip, 'fe80:') === 0 ||
				\stripos($ip, 'fe81:') === 0 ||
				\preg_match('/^fe[89ab][0-9a-f]:/i', $ip) === 1) {
				return true;
			}
		}

		return false;
	}

	protected function manipulateStorageConfig(IStorageConfig $storage) {
		/** @var AuthMechanism */
		$authMechanism = $storage->getAuthMechanism();
		$authMechanism->manipulateStorageConfig($storage);
		/** @var Backend */
		$backend = $storage->getBackend();
		$backend->manipulateStorageConfig($storage);
	}

	/**
	 * Check whether the given storage is available / valid.
	 *
	 * Note that this operation can be time consuming depending
	 * on whether the remote storage is available or not.
	 *
	 * @param IStorageConfig $storage storage configuration
	 * @param bool $testOnly whether to storage should only test the connection or do more things
	 */
	protected function updateStorageStatus(IStorageConfig &$storage, $testOnly = true) {
		try {
			$this->manipulateStorageConfig($storage);

			/** @var Backend */
			$backend = $storage->getBackend();
			// update status (can be time-consuming)
			$storage->setStatus(
				\OC_Mount_Config::getBackendStatus(
					$backend->getStorageClass(),
					$storage->getBackendOptions(),
					false,
					$testOnly
				)
			);
		} catch (InsufficientDataForMeaningfulAnswerException $e) {
			$status = $e->getCode() ? $e->getCode() : StorageNotAvailableException::STATUS_INDETERMINATE;
			$storage->setStatus(
				$status,
				$this->l10n->t('Insufficient data: %s', [$e->getMessage()])
			);
		} catch (StorageNotAvailableException $e) {
			$storage->setStatus(
				$e->getCode(),
				$this->l10n->t('%s', [$e->getMessage()])
			);
		} catch (\Exception $e) {
			// FIXME: convert storage exceptions to StorageNotAvailableException
			// Log the full exception server-side but do NOT expose the message to the
			// client: exception messages from e.g. Guzzle contain resolved IP addresses,
			// ports and cURL error details which can be used for internal network
			// reconnaissance (information-disclosure / SSRF oracle).
			$this->logger->logException($e, ['app' => 'files_external']);
			$storage->setStatus(
				StorageNotAvailableException::STATUS_ERROR,
				$this->l10n->t('Storage connection error. See server log for details.')
			);
		}
	}

	/**
	 * Get all storage entries
	 *
	 * @return DataResponse
	 */
	public function index() {
		$storages = $this->service->getStorages();

		\array_map(function ($storage) {
			$this->replacePasswords($storage);
			return $storage;
		}, $storages);

		return new DataResponse(
			$storages,
			Http::STATUS_OK
		);
	}

	/**
	 * Get an external storage entry.
	 *
	 * @param int $id storage id
	 * @param bool $testOnly whether to storage should only test the connection or do more things
	 *
	 * @return DataResponse
	 */
	public function show($id, $testOnly = true) {
		try {
			$storage = $this->service->getStorage($id);

			$this->updateStorageStatus($storage, $testOnly);
		} catch (NotFoundException $e) {
			return new DataResponse(
				[
					'message' => (string)$this->l10n->t('Storage with id "%d" not found', [$id])
				],
				Http::STATUS_NOT_FOUND
			);
		}

		$this->replacePasswords($storage);

		return new DataResponse(
			$storage,
			Http::STATUS_OK
		);
	}

	/**
	 * Deletes the storage with the given id.
	 *
	 * @param int $id storage id
	 *
	 * @return DataResponse
	 */
	public function destroy($id) {
		try {
			$this->service->removeStorage($id);
		} catch (NotFoundException $e) {
			return new DataResponse(
				[
					'message' => (string)$this->l10n->t('Storage with id "%d" not found', [$id])
				],
				Http::STATUS_NOT_FOUND
			);
		}

		return new DataResponse([], Http::STATUS_NO_CONTENT);
	}

	/**
	 * Replace the passwords found with a custom string in order to avoid leaking
	 * the password
	 */
	protected function replacePasswords(IStorageConfig $storage) {
		$opts = $storage->getBackendOptions();
		foreach ($opts as $key => $value) {
			if (
				(\strpos($key, 'password') !== false && \is_string($value) && $value !== '') ||  // key contains "password"
				($key === 'secret')  // key is "secret"
			) {
				$opts[$key] = IStoragesService::REDACTED_PASSWORD;
			}
		}
		$storage->setBackendOptions($opts);
	}
}
