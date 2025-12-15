<?php

namespace OCA\SsoAuth\Settings;

use OCP\Settings\ISettings;
use OCP\Template;
use OCP\IConfig;
use OCP\ILogger;

class Admin implements ISettings {

    /** @var IConfig */
    private $config;
    private ILogger $logger;

    public function __construct(IConfig $config, ILogger $logger) {
        $this->config = $config;
        $this->logger = $logger;
    }



    public function getPanel(): Template {
        // $data = [
        //     'sso_url' => $this->config->getAppValue('sso_auth', 'sso_url', ''),
        //     'realm' => $this->config->getAppValue('sso_auth', 'realm', ''),
        //     'client_id' => $this->config->getAppValue('sso_auth', 'client_id', ''),
        //     'client_secret' => $this->config->getAppValue('sso_auth', 'client_secret', '')
        // ];

        // \OC::$server->getLogger()->warning("SSSSSSS " . json_encode($data));
        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //     $this->logger->error("POST DATA: " . json_encode($_POST));

        //     $this->config->setAppValue('sso_auth', 'sso_url', $_POST['sso_url'] ?? '');
        // }
        $tmpl = new Template('sso_auth', 'admin');
        // $ssoUrl  = $this->config->getAppValue(
		// 	'sso_auth',
		// 	'sso_url',
        //     ''
		// );
        // $this->logger->error('SSSSSSS (' . $ssoUrl . ')');
        return $tmpl;
    }

    public function getSectionID(): string {
        return 'sso_auth';
    }

    public function getPriority(): int {
        return 50;
    }

}