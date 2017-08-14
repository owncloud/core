<?php
namespace OCA\Files_External\Migrations;

use OC\Files\External\Service\GlobalStoragesService;
use OC\Files\External\Service\LegacyStoragesService;
use OCP\Migration\ISimpleMigration;
use OCP\Migration\IOutput;

/**
 * migrate mount.json mounts into the database
 */
class Version20170814051424 implements ISimpleMigration {

    /**
     * @param IOutput $out
     */
    public function run(IOutput $out) {

		/** @var GlobalStoragesService $globalStoragesService */
    	$globalStoragesService = \OC::$server->query('GlobalStoragesService');
    	$legacyStoragesService = new LegacyStoragesService(\OC::$server->getStoragesBackendService());

    	$legacyStorages = $legacyStoragesService->getAllStorages();

		foreach ($legacyStorages as $legacyStorage) {
			try {
				$mountOptions = $legacyStorage->getMountOptions();
				if (!empty($mountOptions) && !isset($mountOptions['enable_sharing'])) {
					// existing mounts must have sharing enabled by default to avoid surprises
					$mountOptions['enable_sharing'] = true;
					$legacyStorage->setMountOptions($mountOptions);
				}
				$globalStoragesService->addStorage($legacyStorage);
			} catch (\Exception $exception) {
				$out->warning(
					'There has been an error migrating an external storage from mount.json to the database. The affected mount point is "' .
					$legacyStorage->getMountPoint() . '" and the type is "' . $legacyStorage->getBackend()->getIdentifier() . '"'
				);
			}
		}
    }
}
