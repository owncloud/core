<?php
namespace OC\Migrations;

use OCP\Migration\ISimpleMigration;
use OCP\Migration\IOutput;

/**
 * Split the shareapi_only_share_with_group_member key to distinguish users and groups.
 * The behaviour will be similar as well as the values, so we'll copy the value from one key to
 * another to keep the same behaviour between versions
 */
class Version20171026130750 implements ISimpleMigration {

	/**
	 * @param IOutput $out
	 */
	public function run(IOutput $out) {
		$config = \OC::$server->getConfig();
		$shareWithGroupMemberStatus = $config->getAppValue('core', 'shareapi_only_share_with_group_members', null);

		if ($shareWithGroupMemberStatus !== null) {
			$config->setAppValue('core', 'shareapi_only_share_with_membership_groups', $shareWithGroupMemberStatus);
		}
	}
}
