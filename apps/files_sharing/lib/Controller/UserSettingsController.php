<?php
/**
 * Created by PhpStorm.
 * User: kucuk
 * Date: 16.02.2019
 * Time: 13:10
 */

namespace OCA\Files_Sharing\Controller;


use OCP\AppFramework\Controller;
use OCP\IRequest;

class UserSettingsController extends Controller {


    public function __construct(string $appName, IRequest $request) {
        parent::__construct($appName, $request);
    }

    /**
     * @NoCSRFRequired
     * @return string
     */
    public function getUserShareFolder() {
        return \OC::$server->getConfig()->getUserValue(\OC::$server->getUserSession()->getUser()->getUID(), 'files_sharing', 'userSharedFilePath');
    }

    /**
     * @NoCSRFRequired
     * @param $filePath
     * @throws \OCP\PreConditionNotMetException
     */
    public function setUserShareFolder($filePath) {
        \OC::$server->getConfig()->setUserValue(\OC::$server->getUserSession()->getUser()->getUID(),'files_sharing', 'userSharedFilePath', $filePath);
    }
}