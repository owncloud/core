<?php
/**
* ownCloud
*
* @author Michael Gapczynski
* @copyright 2012 Michael Gapczynski mtgap@owncloud.com
*
* This library is free software; you can redistribute it and/or
* modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
* License as published by the Free Software Foundation; either
* version 3 of the License, or any later version.
*
* This library is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU AFFERO GENERAL PUBLIC LICENSE for more details.
*
* You should have received a copy of the GNU Affero General Public
* License along with this library.  If not, see <http://www.gnu.org/licenses/>.
*/

OC_JSON::checkLoggedIn();
OCP\JSON::callCheck();
OC_App::loadApps();

$shareManager = OCP\Share::getShareManager();
if (isset($_POST['action']) && isset($_POST['itemType']) && isset($_POST['itemSource'])) {
	switch ($_POST['action']) {
		case 'share':
			if (isset($_POST['shareType']) && isset($_POST['shareWith']) && isset($_POST['permissions'])) {
				try {
					$share = new \OC\Share\Share();
					$shareType = $_POST['shareType'];
					settype($shareType, 'int');
					if ($shareType === \OCP\Share::SHARE_TYPE_USER) {
						$share->setShareTypeId('user');
					} else if ($shareType === \OCP\Share::SHARE_TYPE_GROUP) {
						$share->setShareTypeId('group');
					} else if ($shareType === \OCP\Share::SHARE_TYPE_LINK) {
						$share->setShareTypeId('link');
					}
					$shareWith = $_POST['shareWith'];
					if ($shareType === \OCP\Share::SHARE_TYPE_LINK && $shareWith === '') {
						$shareWith = null;
					}
					$share->setShareOwner(\OCP\User::getUser());
					$share->setShareWith($shareWith);
					$share->setItemType($_POST['itemType']);
					$share->setItemSource($_POST['itemSource']);
					$share->setPermissions((int)$_POST['permissions']);
					$share = $shareManager->share($share);
					$token = $share->getToken();
					if (isset($token)) {
						OC_JSON::success(array('data' => array('token' => $token)));
					} else {
						OC_JSON::success();
					}
				} catch (Exception $exception) {
					OC_JSON::error(array('data' => array('message' => $exception->getMessage())));
				}
			}
			break;
		case 'unshare':
			if (isset($_POST['shareType']) && isset($_POST['shareWith'])) {
				$shareType = $_POST['shareType'];
				settype($shareType, 'int');
				if ($shareType === \OCP\Share::SHARE_TYPE_USER) {
					$shareType = 'user';
				} else if ($shareType === \OCP\Share::SHARE_TYPE_GROUP) {
					$shareType ='group';
				} else if ($shareType === \OCP\Share::SHARE_TYPE_LINK) {
					$shareType = 'link';
				}
				$filter = array(
					'shareOwner' => \OCP\User::getUser(),
					'shareWith' => $_POST['shareWith'],
					'shareTypeId' => $shareType,
					'itemSource' => $_POST['itemSource'],
				);
				try {
					$share = $shareManager->getShares($_POST['itemType'], $filter, 1);
					if (!empty($share)) {
						$share = reset($share);
						$shareManager->unshare($share);
					}
				} catch (Exception $exception) {
					OC_JSON::error();
				}
				OC_JSON::success();
			}
			break;
		case 'setPermissions':
			if (isset($_POST['shareType']) && isset($_POST['shareWith']) && isset($_POST['permissions'])) {
				$shareType = $_POST['shareType'];
				settype($shareType, 'int');
				if ($shareType === \OCP\Share::SHARE_TYPE_USER) {
					$shareType = 'user';
				} else if ($shareType === \OCP\Share::SHARE_TYPE_GROUP) {
					$shareType ='group';
				} else if ($shareType === \OCP\Share::SHARE_TYPE_LINK) {
					$shareType = 'link';
				}
				$filter = array(
					'shareOwner' => \OCP\User::getUser(),
					'shareWith' => $_POST['shareWith'],
					'shareTypeId' => $shareType,
					'itemSource' => $_POST['itemSource'],
				);
				try {
					$share = $shareManager->getShares($_POST['itemType'], $filter, 1);
					if (!empty($share)) {
						$share = reset($share);
						$share->setPermissions((int)$_POST['permissions']);
						$shareManager->update($share);
					}
				} catch (Exception $exception) {
					OC_JSON::error();
				}
				OC_JSON::success();
			}
			break;
		case 'setExpirationDate':
			if (isset($_POST['date'])) {
				if ($_POST['date'] === '') {
					$time = null;
				} else {
					$date = new \DateTime($_POST['date']);
					$time = $date->getTimeStamp();
				}
				$filter = array(
					'shareOwner' => \OCP\User::getUser(),
					'itemSource' => $_POST['itemSource'],
				);
				try {
					$shares = $shareManager->getShares($_POST['itemType'], $filter);
					foreach ($shares as $share) {
						$share->setExpirationTime($time);
						$shareManager->update($share);
					}
				} catch (Exception $exception) {
					OC_JSON::error();
				}
				OC_JSON::success();
			}
			break;
		case 'email':
			// read post variables
			$user = OCP\USER::getUser();
			$displayName = OCP\User::getDisplayName();
			$type = $_POST['itemType'];
			$link = $_POST['link'];
			$file = $_POST['file'];
			$to_address = $_POST['toaddress'];

			// enable l10n support
			$l = OC_L10N::get('core');

			// setup the email
			$subject = (string)$l->t('%s shared »%s« with you', array($displayName, $file));

			$content = new OC_Template("core", "mail", "");
			$content->assign ('link', $link);
			$content->assign ('type', $type);
			$content->assign ('user_displayname', $displayName);
			$content->assign ('filename', $file);
			$text = $content->fetchPage();

			$content = new OC_Template("core", "altmail", "");
			$content->assign ('link', $link);
			$content->assign ('type', $type);
			$content->assign ('user_displayname', $displayName);
			$content->assign ('filename', $file);
			$alttext = $content->fetchPage();

			$default_from = OCP\Util::getDefaultEmailAddress('sharing-noreply');
			$from_address = OCP\Config::getUserValue($user, 'settings', 'email', $default_from );

			// send it out now
			try {
				OCP\Util::sendMail($to_address, $to_address, $subject, $text, $from_address, $displayName, 1, $alttext);
				OCP\JSON::success();
			} catch (Exception $exception) {
				OCP\JSON::error(array('data' => array('message' => OC_Util::sanitizeHTML($exception->getMessage()))));
			}
			break;
	}
} else if (isset($_GET['fetch'])) {
	switch ($_GET['fetch']) {
		case 'getItemsSharedStatuses':
			if (isset($_GET['itemType'])) {
				$statuses = array();
				$filter = array(
					'shareOwner' => \OCP\User::getUser(),
				);
				try {
					$shares = $shareManager->getShares($_GET['itemType'], $filter);
					foreach ($shares as $share) {
						if ($share->getShareTypeId() === 'link') {
							$statuses[$share->getItemSource()]['link'] = true;
						} else if (!isset($statuses[$share->getItemSource()])) {
							$statuses[$share->getItemSource()]['link'] = false;
						}
						$itemType = $share->getItemType();
						if ($itemType === 'file' || $itemType == 'folder') {
							$mounts = \OC\Files\Filesystem::getMountByNumericId($share->getStorage());
							$view = \OC\Files\Filesystem::getView();
							foreach ($mounts as $mount) {
								$fullPath = $mount->getMountPoint().$share->getPath();
								if (!is_null($path = $view->getRelativePath($fullPath))) {
									$statuses[$share->getItemSource()]['path'] = $path;
									break;
								}
							}
						}
					}
				} catch (Exception $exception) {
					OC_JSON::error(array('data' => array('message' => OC_Util::sanitizeHTML($exception->getMessage()))));
				}
				OC_JSON::success(array('data' => $statuses));
			}
			break;
		case 'getItem':
			if (isset($_GET['itemType'])
				&& isset($_GET['itemSource'])
				&& isset($_GET['checkReshare'])
				&& isset($_GET['checkShares'])) {
				if ($_GET['checkReshare'] == 'true') {
					$reshare = array();
					$filter = array(
						'shareWith' => \OCP\User::getUser(),
						'isShareWithUser' => true,
						'itemSource' => $_GET['itemSource'],
					);
					$result = $shareManager->getShares($_GET['itemType'], $filter);
					$shares = array();
					foreach ($result as $share) {
						$shareTypeId = $share->getShareTypeId();
						if ($shareTypeId === 'user') {
							$shareTypeId = \OCP\Share::SHARE_TYPE_USER;
						} else if ($shareTypeId === 'group') {
							$shareTypeId = OCP\Share::SHARE_TYPE_GROUP;
						} else if ($shareTypeId === 'link') {
							$shareTypeId = OCP\Share::SHARE_TYPE_LINK;
						}
						$expiration = $share->getExpirationTime();
						if (isset($expiration)) {
							$expiration = date('d-m-Y', $share->getExpirationTime());
						}
						$reshare[$share->getId()] = array(
							'share_type' => $shareTypeId,
							'uid_owner' => $share->getShareOwner(),
							'share_with' => $share->getShareWith(),
							'permissions' => $share->getPermissions(),
							'share_with_displayname' => $share->getShareWithDisplayName(),
							'displayname_owner' => $share->getShareOwnerDisplayName(),
							'expiration' => $expiration,
						);
					}
				} else {
					$reshare = array();
				}
				if ($_GET['checkShares'] == 'true') {
					$filter = array(
						'shareOwner' => \OCP\User::getUser(),
						'itemSource' => $_GET['itemSource'],
					);
					$result = $shareManager->getShares($_GET['itemType'], $filter);
					$shares = array();
					foreach ($result as $share) {
						$shareTypeId = $share->getShareTypeId();
						if ($shareTypeId === 'user') {
							$shareTypeId = \OCP\Share::SHARE_TYPE_USER;
						} else if ($shareTypeId === 'group') {
							$shareTypeId = OCP\Share::SHARE_TYPE_GROUP;
						} else if ($shareTypeId === 'link') {
							$shareTypeId = OCP\Share::SHARE_TYPE_LINK;
						}
						$expiration = $share->getExpirationTime();
						if (isset($expiration)) {
							$expiration = date('d-m-Y', $share->getExpirationTime());
						}
						$shares[$share->getId()] = array(
							'share_type' => $shareTypeId,
							'uid_owner' => $share->getShareOwner(),
							'share_with' => $share->getShareWith(),
							'permissions' => $share->getPermissions(),
							'share_with_displayname' => $share->getShareWithDisplayName(),
							'displayname_owner' => $share->getShareOwnerDisplayName(),
							'expiration' => $expiration,
						);
					}
				} else {
					$shares = array();
				}
				OC_JSON::success(array('data' => array('reshare' => $reshare, 'shares' => $shares)));
			}
			break;
		case 'getShareWith':
			if (isset($_GET['search'])) {
				$shareWiths = array();
				$shareOwner = \OCP\User::getUser();
				$shareBackend = $shareManager->getShareBackend('file');
				$shareTypes = $shareBackend->getShareTypes();
				foreach ($shareTypes as $shareType) {
					$shareTypeId = $shareType->getId();
					if ($shareTypeId === 'user') {
						$shareTypeId = \OCP\Share::SHARE_TYPE_USER;
					} else if ($shareTypeId === 'group') {
						$shareTypeId = OCP\Share::SHARE_TYPE_GROUP;
					}
					$result = $shareType->searchForPotentialShareWiths($shareOwner, $_GET['search'], 10, null);
					foreach ($result as $shareWith) {
						$shareWiths[] = array(
							'label' => $shareWith['shareWithDisplayName'],
							'value' => array(
								'shareType' => $shareTypeId,
								'shareWith' => $shareWith['shareWith'],
							),
						);
						if (isset($limit)) {
							$limit--;
							if ($limit === 0) {
								break 2;
							}
						}
						if (isset($offset) && $offset > 0) {
							$offset--;
						}
					}
				}
				OC_JSON::success(array('data' => $shareWiths));
			}
			break;
	}
}
