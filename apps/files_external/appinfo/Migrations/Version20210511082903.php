<?php
namespace OCA\files_external\Migrations;

use OC\NeedsUpdateException;
use OCP\Migration\ISimpleMigration;
use OCP\Migration\IOutput;
use OCP\Files\External\Service\IGlobalStoragesService;
use OCP\Files\External\DefinitionParameter;
use OCP\Security\ICrypto;

/**
 * Auto-generated migration step: Please modify to your needs!
 */
class Version20210511082903 implements ISimpleMigration {
	/** @var IGlobalStoragesService */
	private $storageService;
	/** @var ICrypto */
	private $crypto;

	public function __construct(IGlobalStoragesService $storageService, ICrypto $crypto) {
		$this->storageService = $storageService;
		$this->crypto = $crypto;
	}

	public function run(IOutput $out) {
		$this->loadFSApps();
		\OC_Util::setupFS();  // this should load additional backends and auth mechanisms
		$storageConfigs = $this->storageService->getStorageForAllUsers();
		foreach ($storageConfigs as $storageConfig) {
			$backendOptions = $storageConfig->getBackendOptions();
			$configId = $storageConfig->getId();
			$changedOptions = [];
			foreach ($backendOptions as $key => $value) {
				$realValue = $value;
				if ($key === 'password') {
					try {
						$realValue = $this->crypto->decrypt($value);
					} catch (\Exception $ex) {
						$out->warning("Failed to migrate storage configuration with id = {$configId}: Cannot decrypt value {$value}");
					}
				}

				if ($this->shouldBeEncrypted($storageConfig, $key)) {
					$changedOptions[$key] = $realValue;
				}
			}
			if ($changedOptions) {
				// need to force a fake password change to update the password later
				foreach ($changedOptions as $key => $value) {
					$storageConfig->setBackendOption($key, "{$value}0");
				}
				$this->storageService->updateStorage($storageConfig);
				// re-insert the old password so it will be encrypted now
				foreach ($changedOptions as $key => $value) {
					$storageConfig->setBackendOption($key, $value);
				}
				$this->storageService->updateStorage($storageConfig);
				$out->info("Storage configuration with id = {$configId} updated correctly");
			}
		}
	}

	private function shouldBeEncrypted($storageConfig, $key) {
		$backend = $storageConfig->getBackend();
		$backendParameters = $backend->getParameters();

		$auth = $storageConfig->getAuthMechanism();
		$authParameters = $auth->getParameters();

		if (isset($backendParameters[$key]) && $backendParameters[$key]->getType() === DefinitionParameter::VALUE_PASSWORD) {
			return true;
		}

		if (isset($authParameters[$key]) && $authParameters[$key]->getType() === DefinitionParameter::VALUE_PASSWORD) {
			return true;
		}
		return false;
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
					\OC_App::updateApp($enabledApp);
					\OC_App::loadApp($enabledApp);
				}
			}
		}
	}
}
