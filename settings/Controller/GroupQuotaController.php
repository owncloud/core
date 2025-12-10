<?php
namespace OC\Settings\Controller;

use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\JSONResponse;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Http;
use OCP\IRequest;
use OCP\IUserSession;
use OCP\IDBConnection;
use \OC_User;

class GroupQuotaController extends Controller {
    private $db;
    private $userSession;

    public function __construct($AppName, IRequest $request, IDBConnection $db, IUserSession $userSession) {
        parent::__construct($AppName, $request);
        $this->db = $db;
        $this->userSession = $userSession;
    }

    /**
    :q!

     * @AdminRequired  // ensure only admin can access this route
     * CSRF is checked by default for POST (no @NoCSRFRequired here)
     */
	public static function updateQuota(IRequest $request, IDBConnection $db, IUserSession $userSession): JSONResponse {

    $user = $userSession->getUser();
    if (!$user || !OC_User::isAdminUser($user->getUID()) ) {
       return new JSONResponse(['success' => false, 'message' => 'Permission denied'], 403);
    }

    $gid = $request->getParam('gid');
    $quota = $request->getParam('quota');

    if (!$gid || !$quota) {
           return new JSONResponse(['success' => false, 'message' => 'Missing parameters'], 400);
    }

    try {
        $stmt = $db->prepare('UPDATE `*PREFIX*groups` SET `quota` = ? WHERE `gid` = ?');
        $stmt->execute([$quota, $gid]);

        return new JSONResponse(['success' => true, 'message' => 'Quota updated']);
    } catch (\Exception $e) {

        return new JSONResponse(['success' => false, 'message' => 'Error: ' . $e->getMessage()], 500);
    }
  }
}