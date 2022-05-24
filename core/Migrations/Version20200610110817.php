<?php
namespace OC\Migrations;

use OCP\Migration\ISimpleMigration;
use OCP\Migration\IOutput;

/**
 * Disable enterprise_key app during the upgrade to 10.5.0
 */
class Version20200610110817 implements ISimpleMigration {

	/**
	 * @param IOutput $out
	 */
	public function run(IOutput $out) {
		if (!\OC::$server->getSystemConfig()->getValue('installed', false)) {
			// Do nothing if ownCloud isn't installed yet (initial installation)
			return;
		}

		$appManager = \OC::$server->getAppManager();
		if ($appManager->isInstalled('enterprise_key')) {
			$appManager->disableApp('enterprise_key');
			$out->warning('The enterprise_key app is deprecated and obsolete. It has been disabled.');
		}
	}
}
