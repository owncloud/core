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
    public function save(string $sso_url, string $realm, string $client_id, string $client_secret): DataResponse {
        $this->config->setAppValue('sso_auth', 'sso_url', $sso_url);
        $this->config->setAppValue('sso_auth', 'realm', $realm);
        $this->config->setAppValue('sso_auth', 'client_id', $client_id);
        $this->config->setAppValue('sso_auth', 'client_secret', $client_secret);

        return new DataResponse(['status' => 'success']);
    }
}