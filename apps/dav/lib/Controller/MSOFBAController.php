<?php

namespace OCA\DAV\Controller;

use OC\User\Session;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\Response;
use OCP\IRequest;
use OCP\IURLGenerator;
use OCP\IUserSession;

class MSOFBAController extends Controller {

	/**
	 * @NoCSRFRequired
	 * @NoAdminRequired
	 */
	public function success(): Response {
		$resp = new Response();
		$resp->setStatus(200);
		return $resp;
	}
}
