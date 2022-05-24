<?php
namespace OC\Migrations;

use OCP\Migration\ISimpleMigration;
use OCP\Migration\IOutput;

/**
 * Split shareapi_enforce_links_password config key into 3 different keys for read-only,
 * read & write and write-only links
 */
class Version20180123131835 implements ISimpleMigration {

	/**
	 * @param IOutput $out
	 */
	public function run(IOutput $out) {
		$config = \OC::$server->getConfig();
		$enforceLinks = $config->getAppValue('core', 'shareapi_enforce_links_password', null);
		if ($enforceLinks !== null) {
			$config->setAppValue('core', 'shareapi_enforce_links_password_read_only', $enforceLinks);
			$config->setAppValue('core', 'shareapi_enforce_links_password_read_write', $enforceLinks);
			$config->setAppValue('core', 'shareapi_enforce_links_password_write_only', $enforceLinks);
		}
		$config->deleteAppValue('core', 'shareapi_enforce_links_password');
	}
}
