<?php


namespace OCA\SsoAuth\AppInfo;

use OCA\SsoAuth\Controller\ConfigController;
use OCP\AppFramework\App;

class Application extends App {
    public function __construct(array $params = []) {
        parent::__construct('sso_auth', $params);

        $container = $this->getContainer();
        $container->registerService("ConfigController", function($c) {
            return new ConfigController(
                'sso_auth',
                $c->query('Request'),
                $c->query('AllConfig')
            );
        });
    }
}