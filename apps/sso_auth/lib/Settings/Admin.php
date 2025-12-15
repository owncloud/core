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
        $tmpl = new Template('sso_auth', 'admin');
        $tmpl->assign('sso_url', $this->config->getAppValue('sso_auth', 'sso_url', ''));
        $tmpl->assign('realm', $this->config->getAppValue('sso_auth', 'realm', ''));
        $tmpl->assign('client_id', $this->config->getAppValue('sso_auth', 'client_id', ''));
        $tmpl->assign('client_secret', $this->config->getAppValue('sso_auth', 'client_secret', ''));

        return $tmpl;
    }

    public function getSectionID(): string {
        return 'sso_auth';
    }

    public function getPriority(): int {
        return 50;
    }

}