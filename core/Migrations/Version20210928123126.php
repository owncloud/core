<?php
namespace OC\Migrations;

use OCP\Migration\ISimpleMigration;
use OCP\Migration\IOutput;

/**
 * Set allow_user_to_change_mail_address equal to allow_user_to_change_display_name
 * so the behaviour does not change.
 */
class Version20210928123126 implements ISimpleMigration {

	/**
	 * @param IOutput $out
	 */
	public function run(IOutput $out) {
		$value = \OC::$server->getSystemConfig()->getValue('allow_user_to_change_display_name');
		if ($value !== null) {
			\OC::$server->getSystemConfig()->setValue('allow_user_to_change_mail_address', $value);
		}
	}
}
