<?php

namespace OCA\SsoAuth\Controller;

use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\IRequest;
use OCP\IConfig;

class ConfigController extends Controller {

    private $config;


    public function __construct($appName, IRequest $request, IConfig $config) {
        parent::__construct($appName, $request);
        $this->config = $config;

    }

    /**
     * @NoCSRFRequired
     */
    public function index() {
        $templateName = 'admin';
        $parameters = [
            'sso_url' => $this->config->getAppValue('sso_auth', 'sso_url', ''),
            'realm' => $this->config->getAppValue('sso_auth', 'realm', ''),
            'client_id' => $this->config->getAppValue('sso_auth', 'client_id', ''),
            'client_secret' => $this->config->getAppValue('sso_auth', 'client_secret', '')
        ];
        return new TemplateResponse($this->appName, $templateName, $parameters);
    }

    /**
     * @AdminRequired
     */
    public function save(string $ssoUrl, string $realm, string $clientId, string $clientSecret): DataResponse {
        $this->config->setAppValue('sso_auth', 'ssoUrl', $ssoUrl);
        $this->config->setAppValue('sso_auth', 'realm', $realm);
        $this->config->setAppValue('sso_auth', 'clientId', $clientId);
        $this->config->setAppValue('sso_auth', 'clientSecret', $clientSecret);

        return new DataResponse(['status' => 'success']);
    }
}