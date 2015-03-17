<?php
/**
 * @author Roeland Jago Douma <roeland@famdouma.nl>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */
namespace OCA\Files_Sharing\Controllers;

use OC;
use OCP;
use OCP\AppFramework\OCSController;
use OCP\IRequest;
use OCP\ILogger;
use OCP\IDBConnection;
use OCP\IConfig;

/**
 * Class OCSApiController
 *
 * @package OCA\Files_Sharing\Controllers
 */
class OCSApiController extends OCSController {

	/** @var \OCP\ILogger */
	protected $logger;
	/** @var IDBConnection */
	protected $dbconnection;
	/** @var IConfig */
	protected $config;

	/**
	 * @param string $appName
	 * @param IRequest $request
	 * @param ILogger $logger
	 * @param IDBConnection $dbconnection
	 * @param IConfig $config
	 */
	public function __construct($appName,
								IRequest $request,
								ILogger $logger,
								IDBConnection $dbconnection,
								IConfig $config) {
		parent::__construct($appName, $request);

		$this->logger = $logger;
		$this->dbconnection = $dbconnection;
		$this->config = $config;
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 *
	 * Get share information for a given share
	 *
	 * @param int $shareId
	 * @return array
	 */
	public function getShare($shareId) {
		$share = $this->getShareFromId($shareId);
		return $this->collectShares($shareId, $share['file_source'], $share['item_type'], true, null, null);
	}

	/**
	 * get some information from a given share
	 * @param int $shareId
	 * @return array|null with: item_source, share_type, share_with, item_type, permissions
	 */
	private function getShareFromId($shareId) {

		/*
		 * TODO: Querby builder
		$qb = $this->dbconnection->createQueryBuilder();

		$qb->select('file_source')
		   ->addSelect('share_type')
		   ->addSelect('share_with')
		   ->addSelect('item_type')
		   ->addSelect('permissions')
		   ->addSelect('stime')
		   ->from('*PREFIX*share')
		   ->where($qb->expr()->eq('id', $shareId));
	
		$result = $qb->execute();
		*/

		$sql = 'SELECT `file_source`, `item_source`, `share_type`, `share_with`, `item_type`, `permissions`, `stime` FROM `*PREFIX*share` WHERE `id` = ?';
		$args = [$shareId];
		$query = \OCP\DB::prepare($sql);    
		$result = $query->execute($args);

		if (\OCP\DB::isError($result)) {
			$this->logger->error(\OC_DB::getErrorMessage($result), ['app' => 'files_sharing']);
			return null;
		}

		if ($share = $result->fetchRow()) {
			return $share;
		}

		return null;
	}

	/**
	 * collect all share information, either of a specific share or all
	 *        shares for a given path
	 *
	 * @param int $shareId
	 * @param int $itemSource
	 * @param string $itemType
	 * @param bool $getSpecificShare
	 * @param string $path
	 * @param bool $reshares
	 * @return array
	 */
	private function collectShares($shareId, $itemSource, $itemType, $getSpecificShare, $path, $reshares) {

		if ($itemSource) {
			$shares = \OCP\Share::getItemShared($itemType, $itemSource);
			$receivedFrom = \OCP\Share::getItemSharedWithBySource($itemType, $itemSource);

			if ($getSpecificShare) {
				foreach ($shares as $share) {
					if ($share['id'] === $shareId) {
						$shares = ['element' => $share];
						break;
					}
				}
			} else {
				foreach ($shares as $key => $share) {
					$shares[$key]['path'] = $path;
				}
			}

			// include also reshares in the lists. This means that the result
			// will contain every user with access to the file.
			if ($reshares === true) {
				$shares = $this->addReshares($shares, $itemSource);
			}

			if ($receivedFrom) {
				foreach ($shares as $key => $share) {
					$shares[$key]['received_from'] = $receivedFrom['uid_owner'];
					$shares[$key]['received_from_displayname'] = \OCP\User::getDisplayName($receivedFrom['uid_owner']);
				}
			}
		} else {
			$shares = null;
		}

		if ($shares === null || empty($shares)) {
			return ['statuscode' => 404,
				'message' => 'share doesn\'t exists'
			];
		} else {
			return ['data' => $shares];
		}
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 *
	 * get all shares
	 *
	 * @param string $path limit the result to a specific file/folder
	 * @param bool $reshares return now only share from current user but all shares for a given file
	 * @param bool $subfiles returns all shares within a folder ($path has to be a folder)
	 *
	 * @return array
	 */
	public function getAllShares($path, $reshares, $subfiles) {
		if (isset($path)) {
			$itemSource = self::getFileId($path);
			$itemType = self::getItemType($path);

			if (isset($subfiles) && $subfiles) {
				return $this->getSharesFromFolder($path);
			}
			return $this->collectShares(null, $itemSource, $itemType, false, $path, $reshares);
		}

		$shares = \OCP\Share::getItemShared('file', null);

		if ($shares === false) {
			return [
				'statuscode' => 404,
				'message' => 'could not get shares'
			];
		} else {
			foreach ($shares as &$share) {
				if ($share['item_type'] === 'file' && isset($share['path'])) {
					$share['mimetype'] = \OC_Helper::getFileNameMimeType($share['path']);
					if (\OC::$server->getPreviewManager()->isMimeSupported($share['mimetype'])) {
						$share['isPreviewAvailable'] = true;
					}
				}
			}
			return [
				'data' => $shares
			];
		}

	}

	/**
	 * add reshares to a array of shares
	 * @param array $shares array of shares
	 * @param int $itemSource item source ID
	 * @return array new shares array which includes reshares
	 */
	private function addReshares($shares, $itemSource) {

		// if there are no shares than there are also no reshares
		$firstShare = reset($shares);
		if ($firstShare) {
			$path = $firstShare['path'];
		} else {
			return $shares;
		}

		$select = '`*PREFIX*share`.`id`, `item_type`, `*PREFIX*share`.`parent`, `share_type`, `share_with`, `file_source`, `path` , `*PREFIX*share`.`permissions`, `stime`, `expiration`, `token`, `storage`, `mail_send`, `mail_send`';
		$getReshares = \OC_DB::prepare('SELECT ' . $select . ' FROM `*PREFIX*share` INNER JOIN `*PREFIX*filecache` ON `file_source` = `*PREFIX*filecache`.`fileid` WHERE `*PREFIX*share`.`file_source` = ? AND `*PREFIX*share`.`item_type` IN (\'file\', \'folder\') AND `uid_owner` != ?');
		$reshares = $getReshares->execute(array($itemSource, \OCP\User::getUser()))->fetchAll();

		foreach ($reshares as $key => $reshare) {
			if (isset($reshare['share_with']) && $reshare['share_with'] !== '') {
				$reshares[$key]['share_with_displayname'] = \OCP\User::getDisplayName($reshare['share_with']);
			}
			// add correct path to the result
			$reshares[$key]['path'] = $path;
		}

		return array_merge($shares, $reshares);
	}

	/**
	 * get share from all files in a given folder (non-recursive)
	 * @param string $path
	 * @return array
	 */
	private function getSharesFromFolder($path) {
		$view = new \OC\Files\View('/'.\OCP\User::getUser().'/files');

		if(!$view->is_dir($path)) {
			return [
				'statuscode' => 400, 
				'message' => 'not a directory'
			];
		}

		$content = $view->getDirectoryContent($path);

		$result = array();
		foreach ($content as $file) {
			// workaround because folders are named 'dir' in this context
			$itemType = $file['type'] === 'file' ? 'file' : 'folder';
			$share = \OCP\Share::getItemShared($itemType, $file['fileid']);
			if($share) {
				$receivedFrom =  \OCP\Share::getItemSharedWithBySource($itemType, $file['fileid']);
				reset($share);
				$key = key($share);
				if ($receivedFrom) {
					$share[$key]['received_from'] = $receivedFrom['uid_owner'];
					$share[$key]['received_from_displayname'] = \OCP\User::getDisplayName($receivedFrom['uid_owner']);
				}
				$result = array_merge($result, $share);
			}
		}

		return [
			'data' => $result
		];
	}

	/**
	 * get files shared with the user
	 * @return \OC_OCS_Result
	 */
	private static function getFilesSharedWithMe() {
		try	{
			$shares = \OCP\Share::getItemsSharedWith('file');
			foreach ($shares as &$share) {
				if ($share['item_type'] === 'file') {
					$share['mimetype'] = \OC_Helper::getFileNameMimeType($share['file_target']);
					if (\OC::$server->getPreviewManager()->isMimeSupported($share['mimetype'])) {
						$share['isPreviewAvailable'] = true;
					}
				}
			}
			$result = new \OC_OCS_Result($shares);
		} catch (\Exception $e) {
			$result = new \OC_OCS_Result(null, 403, $e->getMessage());
		}

		return $result;

	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 *
	 * create a new share
	 *
	 * @param string $path
	 * @param int $shareType
	 * @param string $shareWith
	 * @param bool $publicUpload
	 * @param string $password
	 * @param int $permissions
	 * @return array
	 */
	public function createShare($path, $shareType, $shareWith,
	                            $publicUpload, $password, $permissions) {
		if($path === null) {
			return [
				'statuscode' => 400,
				'message' => 'please specify a file or folder path'
			];
		}
		$itemSource = self::getFileId($path);
		$itemType = self::getItemType($path);

		if($itemSource === null) {
			return [
				'statuscode' => 404,
				'message' => 'wrong path, file/folder doesn\'t exist.'
			];
		}

		if (is_null($shareType)) {
			return [
				'statuscode' => 400, 
				'message' => 'shareType has to be provided'
			];
		}

		switch($shareType) {
			case \OCP\Share::SHARE_TYPE_USER:
				$permissions = !is_null($permissions) ? $permissions : 31;
				break;
			case \OCP\Share::SHARE_TYPE_GROUP:
				$permissions = !is_null($permissions) ? $permissions : 31;
				break;
			case \OCP\Share::SHARE_TYPE_LINK:
				//allow password protection
				$shareWith = $password;
				//check public link share
				$publicUploadEnabled = $this->config->getAppValue('core', 'shareapi_allow_public_upload', 'yes');
				if ($publicUpload && $publicUploadEnabled !== 'yes') {
					return [
						'statuscode' => 403,
						'message' => 'public upload disabled by the administrator'
					];
				}
				$publicUpload = is_null($publicUpload) ? false : $publicUpload;
				// read, create, update (7) if public upload is enabled or
				// read (1) if public upload is disabled
				$permissions = $publicUpload === 'true' ? 7 : 1;
				break;
			default:
				return [
					'statuscode' => 400, 
					'message' => 'unknown share type'
				];
		}

		if (($permissions & \OCP\Constants::PERMISSION_READ) === 0) {
			return [
				'statuscode' => 400,
				'message' => 'invalid permissions'
			];
		}

		try	{
			$token = \OCP\Share::shareItem(
					$itemType,
					$itemSource,
					$shareType,
					$shareWith,
					$permissions
					);
		} catch (\Exception $e) {
			return [
				'statuscode' => 403,
				'message' => $e->getMessage()
			];
		}

		if ($token) {
			$data = array();
			$data['id'] = 'unknown';
			$shares = \OCP\Share::getItemShared($itemType, $itemSource);
			if(is_string($token)) { //public link share
				foreach ($shares as $share) {
					if ($share['token'] === $token) {
						$data['id'] = $share['id'];
						break;
					}
				}
				$url = \OCP\Util::linkToPublic('files&t='.$token);
				$data['url'] = $url; // '&' gets encoded to $amp;
				$data['token'] = $token;

			} else {
				foreach ($shares as $share) {
					if ($share['share_with'] === $shareWith && $share['share_type'] === $shareType) {
						$data['id'] = $share['id'];
						break;
					}
				}
			}
			return [
				'data' => $data
			];
		} else {
			return [
				'statuscode' => 404,
				'message' => 'couldn\'t share file'
			];
		}
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 *
	 * @param int $shareId
	 * @param int $permissions
	 * @param string $password
	 * @param bool $publicUpload
	 * @param string $expireDate
	 *
	 * @return array
	 */
	public function updateShare($shareId, $permissions, $password, $publicUpload, $expireDate) {

		$share = $this->getShareFromId($shareId);

		if(!isset($share['file_source'])) {
			return [
				'statuscode' => 404, 
				'message' => 'wrong share Id, share doesn\'t exist.'
			];
		}

		try {
			if(!is_null($permissions)) {
				return $this->updatePermissions($share, $permissions);
			} elseif (!is_null($password)) {
				return $this->updatePassword($share, $password);
			} elseif (!is_null($publicUpload)) {
				return $this->updatePublicUpload($share, $publicUpload);
			} elseif (!is_null($expireDate)) {
				return $this->updateExpireDate($share, $expireDate);
			}
		} catch (\Exception $e) {
			return [
				'statuscode' => 400, 
				'message' => $e->getMessage()
			];
		}

		return [
			'statuscode' => 400,
			'message' => 'Wrong or no update parameter given'
		];
	}

	/**
	 * update permissions for a share
	 * @param array $share information about the share
	 * @param int $permissions
	 * @return array
	 */
	private function updatePermissions($share, $permissions) {

		$itemSource = $share['item_source'];
		$itemType = $share['item_type'];
		$shareWith = $share['share_with'];
		$shareType = $share['share_type'];

		$publicUploadStatus = $this->config->getAppValue('core', 'shareapi_allow_public_upload', 'yes');
		$publicUploadEnabled = ($publicUploadStatus === 'yes') ? true : false;


		// only change permissions for public shares if public upload is enabled
		// and we want to set permissions to 1 (read only) or 7 (allow upload)
		if ( (int)$shareType === \OCP\Share::SHARE_TYPE_LINK ) {
			if ($publicUploadEnabled === false || ($permissions !== 7 && $permissions !== 1)) {
				return [
					'statuscode' => 400, 
					'message' => 'can\'t change permission for public link share'
				];
			}
		}

		if (($permissions & \OCP\Constants::PERMISSION_READ) === 0) {
			return [
				'statuscode' => 400, 
				'message' => 'invalid permissions'
			];
		}

		try {
			$return = \OCP\Share::setPermissions(
					$itemType,
					$itemSource,
					$shareType,
					$shareWith,
					$permissions
					);
		} catch (\Exception $e) {
			return [
				'statuscode' => 404, 
				'message' => $e->getMessage()
			];
		}

		if ($return) {
			return [];
		} else {
			return [
				'statuscode' => 404, 
				'message' => 'couldn\'t set permissions'
			];
		}
	}

	/**
	 * enable/disable public upload
	 * @param array $share information about the share
	 * @param boolean $publicUpload
	 * @return array
	 */
	private function updatePublicUpload($share, $publicUpload) {

		$publicUploadEnabled = $this->config->getAppValue('core', 'shareapi_allow_public_upload', 'yes');
		if($publicUploadEnabled !== 'yes') {
			return [
				'statuscode' => 403, 
				'message' => 'public upload disabled by the administrator'
			];
		}

		if ($share['item_type'] !== 'folder' ||
				(int)$share['share_type'] !== \OCP\Share::SHARE_TYPE_LINK ) {
			return [
				'statuscode' => 400, 
				'message' => 'public upload is only possible for public shared folders'
			];
		}

		// read, create, update (7) if public upload is enabled or
		// read (1) if public upload is disabled
		$permissions = $publicUpload ? 7 : 1;

		return $this->updatePermissions($share, $permissions);
	}

	/**
	 * set expire date for public link share
	 * @param array $share information about the share
	 * @param string $expireDate which needs to be a well formated date string, e.g DD-MM-YYYY
	 * @return array
	 */
	private function updateExpireDate($share, $expireDate) {
		// only public links can have a expire date
		if ((int)$share['share_type'] !== \OCP\Share::SHARE_TYPE_LINK ) {
			return [
				'statuscode' => 400, 
				'message' => 'expire date only exists for public link shares'
			];
		}

		try {
			$expireDateSet = \OCP\Share::setExpirationDate($share['item_type'], $share['item_source'], $expireDate, (int)$share['stime']);
			$result = ($expireDateSet) ? [] : ['statuscode' => 404, 'message' => 'couldn\'t set expire date'];
		} catch (\Exception $e) {
			$result = ['statuscode' => 404, 'message' => $e->getMessage()];
		}

		return $result;

	}

	/**
	 * update password for public link share
	 * @param array $share information about the share
	 * @param string $password
	 * @return array
	 */
	private function updatePassword($share, $password) {
		$itemSource = $share['item_source'];
		$itemType = $share['item_type'];

		if( (int)$share['share_type'] !== \OCP\Share::SHARE_TYPE_LINK) {
			return [
				'statuscode' => 400, 
				'message' => 'password protection is only supported for public shares'
			];
		}

		$shareWith = $password;

		if($shareWith === '') {
			$shareWith = null;
		}

		$items = \OCP\Share::getItemShared($itemType, $itemSource);

		$checkExists = false;
		foreach ($items as $item) {
			if($item['share_type'] === \OCP\Share::SHARE_TYPE_LINK) {
				$checkExists = true;
				$permissions = $item['permissions'];
			}
		}

		if (!$checkExists) {
			return [
				'statuscode' => 404, 
				'message' => 'share doesn\'t exists, can\'t change password'
			];
		}

		try {
			$result = \OCP\Share::shareItem(
					$itemType,
					$itemSource,
					\OCP\Share::SHARE_TYPE_LINK,
					$shareWith,
					$permissions
					);
		} catch (\Exception $e) {
			return [
				'statuscode' => 403,
				'message' => $e->getMessage()
			];
		}

		if($result) {
			return [];
		}

		return [
			'statuscode' => 404, 
			'message' => 'couldn\'t set password'
		];
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 *
	 * unshare a file/folder
	 *
	 * @param int $shareId id of the share that is to be deleted
	 * @return array
	 */
	public function deleteShare($shareId) {
		$share = $this->getShareFromId($shareId);
		$fileSource = isset($share['file_source']) ? $share['file_source'] : null;
		$itemType = isset($share['item_type']) ? $share['item_type'] : null;;

		if($fileSource === null) {
			return [
				'statuscode' => 404,
				'message' => 'wrong share ID, share doesn\'t exist.'
			];
		}

		$shareWith = isset($share['share_with']) ? $share['share_with'] : null;
		$shareType = isset($share['share_type']) ? (int)$share['share_type'] : null;

		if( $shareType === \OCP\Share::SHARE_TYPE_LINK) {
			$shareWith = null;
		}

		try {
			$return = \OCP\Share::unshare(
					$itemType,
					$fileSource,
					$shareType,
					$shareWith);
		} catch (\Exception $e) {
			return [
				'statuscode' => 404,
				'message' => $e->getMessage(),
			];
		}

		if ($return) {
			return [];
		} else {
			return [
				'statuscode' => 404,
				'message' => 'Unshare Failed'
			];
		}
	}

	/**
	 * get file ID from a given path
	 * @param string $path
	 * @return string fileID or null
	 */
	private static function getFileId($path) {

		$view = new \OC\Files\View('/'.\OCP\User::getUser().'/files');
		$fileId = null;
		$fileInfo = $view->getFileInfo($path);
		if ($fileInfo) {
			$fileId = $fileInfo['fileid'];
		}

		return $fileId;
	}

	/**
	 * get itemType
	 * @param string $path
	 * @return string type 'file', 'folder' or null of file/folder doesn't exists
	 */
	private static function getItemType($path) {
		$view = new \OC\Files\View('/'.\OCP\User::getUser().'/files');
		$itemType = null;

		if ($view->is_dir($path)) {
			$itemType = "folder";
		} elseif ($view->is_file($path)) {
			$itemType = "file";
		}

		return $itemType;
	}

}
