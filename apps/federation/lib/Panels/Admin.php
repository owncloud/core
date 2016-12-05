<?php

namespace OCA\Federation\Panels;

use OCP\Settings\ISettings;
use OCP\Template;

class Admin implements ISettings {

	public function getPriority() {
		return 98;
	}

	public function getSectionID() {
		return 'sharing';
	}

	public function getPanel() {
		$template = new Template('federation', 'settings-admin');
		$dbHandler = new \OCA\Federation\DbHandler(
			\OC::$server->getDatabaseConnection(),
			\OC::$server->getL10N('federation')
		);
		$trustedServers = new \OCA\Federation\TrustedServers(
			$dbHandler,
			\OC::$server->getHTTPClientService(),
			\OC::$server->getLogger(),
			\OC::$server->getJobList(),
			\OC::$server->getSecureRandom(),
			\OC::$server->getConfig(),
			\OC::$server->getEventDispatcher()
		);
		$template->assign('trustedServers', $trustedServers->getServers());
		$template->assign('autoAddServers', $trustedServers->getAutoAddServers());
		return $template;
	}

}
