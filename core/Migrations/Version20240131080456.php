<?php
namespace OC\Migrations;

use OCP\Migration\ISimpleMigration;
use OCP\Migration\IOutput;

class Version20240131080456 implements ISimpleMigration {
	/**
	 * @param IOutput $out
	 */
	public function run(IOutput $out) {
		if (!\OC::$server->getSystemConfig()->getValue('installed', false)) {
			// Do nothing if ownCloud isn't installed yet (initial installation)
			return;
		}

		$appManager = \OC::$server->getAppManager();
		$apps_to_disable = ['templateeditor'];
		foreach ($apps_to_disable as $app) {
			if ($appManager->isInstalled($app)) {
				$appManager->disableApp($app);
				$out->warning("The $app app is deprecated and obsolete. It has been disabled.");
			}
		}
	}
}
