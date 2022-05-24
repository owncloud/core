<?php
namespace OCA\files_external\Migrations;

use OC\NeedsUpdateException;
use OCA\Files_External\Lib\Backend\SFTP;
use OCA\Files_External\Lib\Auth\PublicKey\RSA;
use OCA\Files_External\Lib\RSAStore;
use OCP\Migration\ISimpleMigration;
use OCP\Migration\IOutput;
use OCP\Files\External\Service\IGlobalStoragesService;
use OCP\Files\External\IStorageConfig;
use OCP\ILogger;
use OCP\IConfig;
use phpseclib3\Crypt\RSA as RSACrypt;
use phpseclib3\Crypt\RSA\PrivateKey;

class Version20220329110116 implements ISimpleMigration {
	/** @var IGlobalStoragesService */
	private $storageService;
	/** @var ILogger */
	private $logger;
	/** @var IConfig */
	private $config;

	public function __construct(IGlobalStoragesService $storageService, ILogger $logger, IConfig $config) {
		$this->storageService = $storageService;
		$this->logger = $logger;
		$this->config = $config;
	}
	/**
	 * @param IOutput $out
	 */
	public function run(IOutput $out) {
		if (!$this->config->getSystemValue('installed', false)) {
			// Skip the migration for new installations -> nothing to migrate
			return;
		}

		$this->loadFSApps();
		\OC_Util::setupFS();  // this should load additional backends and auth mechanisms
		$storageConfigs = $this->storageService->getStorageForAllUsers();
		$pass = $this->config->getSystemValue('secret', '');

		$rsaStore = RSAStore::getGlobalInstance();
		foreach ($storageConfigs as $storageConfig) {
			if ($storageConfig->getBackend() instanceof SFTP && $storageConfig->getAuthMechanism() instanceof RSA) {
				$encPubKey = $storageConfig->getBackendOption('public_key');
				$encPrivKey = $storageConfig->getBackendOption('private_key');

				$pubKey = \base64_decode($encPubKey, true);
				$privKey = \base64_decode($encPrivKey, true);

				$configId = $storageConfig->getId();
				if ($pubKey === false || $privKey === false) {
					$out->warning("Storage configuration with id = {$configId}: Cannot decode either public or private key, skipping");
					continue;
				}

				try {
					$rsaKey = RSACrypt::load($privKey, $pass)->withHash('sha1');
				} catch (\phpseclib3\Exception\NoKeyLoadedException $e) {
					$out->warning("Storage configuration with id = {$configId}: Cannot load private key, skipping");
					continue;
				}

				$targetUserId = '';
				if ($storageConfig->getType() === IStorageConfig::MOUNT_TYPE_PERSONAl) {
					$applicableUsers = $storageConfig->getApplicableUsers();
					$targetUserId = $applicableUsers[0];  // it must have one user.
				}

				$token = $rsaStore->storeData($rsaKey, $targetUserId);
				$storageConfig->setBackendOption('public_key', $pubKey);
				$storageConfig->setBackendOption('private_key', $token);

				$this->storageService->updateStorage($storageConfig);
				$out->info("Storage configuration with id = {$configId}: keys migrated successfully");
			}
		}
	}

	/**
	 * Load the FS apps. This is required because the FS apps might not be loaded during the
	 * migration.
	 */
	private function loadFSApps() {
		$enabledApps = \OC_App::getEnabledApps();
		foreach ($enabledApps as $enabledApp) {
			if ($enabledApp !== 'files_external' && \OC_App::isType($enabledApp, ['filesystem'])) {
				try {
					\OC_App::loadApp($enabledApp);
				} catch (NeedsUpdateException $ex) {
					if (\OC_App::updateApp($enabledApp)) {
						// update successful.
						// We can load the app without checking if the should upgrade or not.
						\OC_App::loadApp($enabledApp, false);
					} else {
						$this->logger->error("Error during files_external migration. $enabledApp couldn't be loaded nor updated.", ['app' => 'files_external']);
						$this->logger->logException($ex, ['app' => 'files_external']);
						$this->logger->error("Mount points using $enabledApp might not be migrated properly. You might need to re-enter the passwords for those mount points", ['app' => 'files_external']);
					}
				}
			}
		}
	}
}
