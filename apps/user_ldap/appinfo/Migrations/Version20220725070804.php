<?php
namespace OCA\User_LDAP\Migrations;

use OCP\Migration\ISimpleMigration;
use OCP\Migration\IOutput;
use OCP\IConfig;
use OCA\User_LDAP\Helper;

class Version20220725070804 implements ISimpleMigration {
	/** @var IConfig */
	private $config;
	/** @var $helper */
	private $helper;

	/**
	 * @param IConfig $config
	 */
	public function __construct(IConfig $config, Helper $helper) {
		$this->config = $config;
		$this->helper = $helper;
	}
	/**
	 * @param IOutput $out
	 */
	public function run(IOutput $out) {
		$prefixes = $this->helper->getServerConfigurationPrefixes();
		foreach ($prefixes as $prefix) {
			$groupnameValue = $this->config->getAppValue('user_ldap', "{$prefix}ldap_expert_groupname_attr", null);
			if ($groupnameValue === null) {
				$groupDisplaynameValue = $this->config->getAppValue('user_ldap', "{$prefix}ldap_group_display_name", null);
				if ($groupDisplaynameValue !== null) {
					$this->config->setAppValue('user_ldap', "{$prefix}ldap_expert_groupname_attr", $groupDisplaynameValue);
				}
			}
		}
	}
}
