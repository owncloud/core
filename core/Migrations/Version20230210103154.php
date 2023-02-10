<?php
namespace OC\Migrations;

use OCP\Migration\ISimpleMigration;
use OCP\Migration\IOutput;

/**
 * Auto-generated migration step: Please modify to your needs!
 */
class Version20230210103154 implements ISimpleMigration {
	/**
	 * @param IOutput $out
	 */
	public function run(IOutput $out) {
		$oldValue = \OC::$server->getSystemConfig()->getValue('file_storage.save_version_author', null);
		if ($oldValue !== null) {
			\OC::$server->getSystemConfig()->setValue('file_storage.save_version_metadata', $oldValue);
		}
		\OC::$server->getSystemConfig()->deleteValue('file_storage.save_version_author');
	}
}
