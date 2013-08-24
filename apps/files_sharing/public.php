<?php
/**
 * ownCloud
 *
 * @author Michael Gapczynski
 * @copyright 2011-2013 Michael Gapczynski mtgap@owncloud.com
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

// Load other apps for file previews
OC_App::loadApps();
if (isset($_GET['t']) && OCP\Config::getAppValue('core', 'shareapi_allow_links', 'yes') === 'yes') {
	$token = $_GET['t'];
	$shareManager = OCP\Share::getShareManager();
	if ($shareManager) {
		$filter = array(
			'shareTypeId' => 'link',
			'token' => $token,
		);
		$share = $shareManager->getShares('file', $filter, 1);
		if (empty($share)) {
			// Try folder item type instead
			$share = $shareManager->getShares('folder', $filter, 1);
		}
		if (!empty($share)) {
			$share = reset($share);
			$password = $share->getPassword();
			if (isset($password)) {
				$url = OCP\Util::linkToPublic('files').'&t='.$token;
				if (isset($_GET['file'])) {
					$url .= '&file='.urlencode($_GET['file']);
				} else {
					if (isset($_GET['dir'])) {
						$url .= '&dir='.urlencode($_GET['dir']);
					}
				}
				if (isset($_POST['password'])) {
					$forcePortable = (CRYPT_BLOWFISH != 1);
					$hasher = new PasswordHash(8, $forcePortable);
					$salt = OCP\Config::getSystemValue('passwordsalt', '');
					if (!$hasher->CheckPassword($_POST['password'].$salt, $password)) {
						// Prompt for password again
						$tmpl = new OCP\Template('files_sharing', 'authenticate', 'guest');
						$tmpl->assign('URL', $url);
						$tmpl->assign('wrongpw', true);
						$tmpl->printPage();
						exit();
					} else {
						// Save share id in session for future requests
						OC::$session->set('public_link_authenticated', $share->getId());
					}
				// Check if share id is set in session
				} else if (!OC::$session->exists('public_link_authenticated')
					|| OC::$session->get('public_link_authenticated') !== $share->getId()
				) {
					// Prompt for password
					$tmpl = new OCP\Template('files_sharing', 'authenticate', 'guest');
					$tmpl->assign('URL', $url);
					$tmpl->printPage();
					exit();
				}
			}
			OC_Util::tearDownFS();
			OC_Util::setupFS($share->getItemOwner());
			$path = \OC\Files\Filesystem::getPath($share->getItemSource());
			if (isset($_GET['path']) && \OC\Files\Filesystem::isReadable($path.$_GET['path'])) {
				$getPath = \OC\Files\Filesystem::normalizePath($_GET['path']);
				$path .= $getPath;
			} else {
				$getPath = '';
			}
			$dir = dirname($path);
			$file = basename($path);
			if (isset($_GET['download'])) {
				if (isset($_GET['files'])) {
					$files = urldecode($_GET['files']);
					$filesList = json_decode($files);
					// in case we get only a single file
					if ($filesList === NULL ) {
						$filesList = array($files);
					}
					OC_Files::get($path, $filesList, $_SERVER['REQUEST_METHOD'] === 'HEAD');
				} else {
					OC_Files::get($dir, $file, $_SERVER['REQUEST_METHOD'] === 'HEAD');
				}
				exit();
			} else {
				// Display the file or folder
				OCP\Util::addScript('files', 'file-upload');
				OCP\Util::addStyle('files_sharing', 'public');
				OCP\Util::addScript('files_sharing', 'public');
				OCP\Util::addScript('files', 'fileactions');
				OCP\Util::addScript('files', 'jquery.iframe-transport');
				OCP\Util::addScript('files', 'jquery.fileupload');
				$maxUploadFilesize = OCP\Util::maxUploadFilesize($path);
				$tmpl = new OCP\Template('files_sharing', 'public', 'base');
				$tmpl->assign('uidOwner', $share->getShareOwner());
				$tmpl->assign('displayName', $share->getShareOwnerDisplayName());
				$tmpl->assign('filename', $file);
				$tmpl->assign('directory_path', $share->getItemTarget());
				$tmpl->assign('mimetype', \OC\Files\Filesystem::getMimeType($path));
				$tmpl->assign('fileTarget', $share->getItemTarget());
				$tmpl->assign('dirToken', $token);
				$allowPublicUploadEnabled = $share->isCreatable();
				if (\OCP\App::isEnabled('files_encryption')
					|| OCP\Config::getAppValue('core', 'shareapi_allow_public_upload', 'yes')
						=== 'no' || $share->getItemType() !== 'folder'
				) {
					$allowPublicUploadEnabled = false;
				}
				$tmpl->assign('allowPublicUploadEnabled', $allowPublicUploadEnabled);
				$tmpl->assign('uploadMaxFilesize', $maxUploadFilesize);
				$tmpl->assign('uploadMaxHumanFilesize',
					OCP\Util::humanFileSize($maxUploadFilesize)
				);
				$urlLinkIdentifiers = (isset($token)?'&t='.$token:'')
									.(isset($_GET['dir'])?'&dir='.$_GET['dir']:'')
									.(isset($_GET['file'])?'&file='.$_GET['file']:'');
				// Show file list
				if (\OC\Files\Filesystem::is_dir($path)) {
					$tmpl->assign('dir', $getPath);
					OCP\Util::addStyle('files', 'files');
					OCP\Util::addScript('files', 'files');
					OCP\Util::addScript('files', 'filelist');
					OCP\Util::addscript('files', 'keyboardshortcuts');
					$files = array();
					$totalSize = 0;
					foreach (\OC\Files\Filesystem::getDirectoryContent($path) as $i) {
						$totalSize += $i['size'];
						$i['date'] = OCP\Util::formatDate($i['mtime']);
						if ($i['type'] == 'file') {
							$fileinfo = pathinfo($i['name']);
							$i['basename'] = $fileinfo['filename'];
							if (!empty($fileinfo['extension'])) {
								$i['extension'] = '.' . $fileinfo['extension'];
							} else {
								$i['extension'] = '';
							}
						}
						$i['directory'] = $getPath;
						$i['permissions'] = $share->getPermissions();
						$files[] = $i;
					}
					usort($files, 'fileCmp');
					// Make breadcrumb
					$breadcrumb = array();
					$pathtohere = '';
					foreach (explode('/', $getPath) as $i) {
						if ($i != '') {
							$pathtohere .= '/' . $i;
							$breadcrumb[] = array('dir' => $pathtohere, 'name' => $i);
						}
					}
					$list = new OCP\Template('files', 'part.list', '');
					$list->assign('files', $files);
					$list->assign('disableSharing', true);
					$list->assign('baseURL',
						OCP\Util::linkToPublic('files').$urlLinkIdentifiers.'&path='
					);
					$list->assign('downloadURL',
						OCP\Util::linkToPublic('files').$urlLinkIdentifiers.'&download&path='
					);
					$breadcrumbNav = new OCP\Template('files', 'part.breadcrumb', '');
					$breadcrumbNav->assign('breadcrumb', $breadcrumb);
					$breadcrumbNav->assign('baseURL',
						OCP\Util::linkToPublic('files').$urlLinkIdentifiers.'&path='
					);
					$maxUploadFilesize = OCP\Util::maxUploadFilesize($path);
					$folder = new OCP\Template('files', 'index', '');
					$folder->assign('fileList', $list->fetchPage());
					$folder->assign('breadcrumb', $breadcrumbNav->fetchPage());
					$folder->assign('dir', $getPath);
					$folder->assign('isCreatable', false);
					$folder->assign('permissions', OCP\PERMISSION_READ);
					$folder->assign('isPublic',true);
					$folder->assign('publicUploadEnabled', 'no');
					$folder->assign('files', $files);
					$folder->assign('uploadMaxFilesize', $maxUploadFilesize);
					$folder->assign('uploadMaxHumanFilesize',
						OCP\Util::humanFileSize($maxUploadFilesize)
					);
					$folder->assign('allowZipDownload',
						intval(OCP\Config::getSystemValue('allowZipDownload', true))
					);
					$folder->assign('usedSpacePercent', 0);
					$folder->assign('encryptedFiles', \OCP\Util::encryptedFiles());
					$tmpl->assign('folder', $folder->fetchPage());
					if (OCP\Config::getSystemValue('allowZipDownload', true)
						&& $totalSize <= OCP\Config::getSystemValue('maxZipInputSize',
							OCP\Util::computerFileSize('800 MB')) 
					) {
						$allowZip = true;
					} else {
						$allowZip = false;
					}
					$tmpl->assign('allowZipDownload', intval($allowZip));
					$tmpl->assign('downloadURL',
						OCP\Util::linkToPublic('files').$urlLinkIdentifiers.'&download&path='.
							urlencode($getPath)
						);
				} else {
					$tmpl->assign('dir', $dir);
					// Show file preview if viewer is available
					if ($share->getItemType() === 'file') {
						$tmpl->assign('downloadURL',
							OCP\Util::linkToPublic('files').$urlLinkIdentifiers.'&download'
						);
					} else {
						$tmpl->assign('downloadURL', 
							OCP\Util::linkToPublic('files').$urlLinkIdentifiers.'&download&path='.
								urlencode($getPath)
						);
					}
				}
				$tmpl->printPage();
			}
			exit();
		}
	}
}
$errorTemplate = new OCP\Template('files_sharing', 'part.404', '');
$errorContent = $errorTemplate->fetchPage();
header('HTTP/1.0 404 Not Found');
OCP\Util::addStyle('files_sharing', '404');
$tmpl = new OCP\Template('', '404', 'guest');
$tmpl->assign('content', $errorContent);
$tmpl->printPage();

function fileCmp($a, $b) {
	if ($a['type'] == 'dir' and $b['type'] != 'dir') {
		return -1;
	} elseif ($a['type'] != 'dir' and $b['type'] == 'dir') {
		return 1;
	} else {
		return strnatcasecmp($a['name'], $b['name']);
	}
}