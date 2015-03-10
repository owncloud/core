<?php
/**
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Björn Schießle <schiessle@owncloud.com>
 * @author Joas Schilling <nickvergessen@owncloud.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Lukas Reschke <lukas@owncloud.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Roeland Jago Douma <roeland@famdouma.nl>
 * @author Vincent Petry <pvince81@owncloud.com>
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
namespace OCA\Files_Sharing;

use OCP\ISession;
use OCP\ILogger;
use OCA\Files_Sharing\Exceptions\InvalidTokenException;
use OCA\Files_Sharing\Exceptions\IncompleteTokenException;
use OCA\Files_Sharing\Exceptions\LinkItemException;
use OCA\Files_Sharing\Exceptions\ItemTypeException;
use OCA\Files_Sharing\Exceptions\AuthenticationException;
use OCA\Files_Sharing\Exceptions\InvalidUserException;
use OCA\Files_Sharing\Exceptions\DirNotAvailableException;

class Helper {

	/** @var ISession */
	protected $session;
	/** @var ILogger */
	protected $logger;

	/**
	 * @param ISession $session
	 * @param ILogger $logger
	 */
	public function __construct(ISession $session,
							    ILogger $logger) {
		$this->session = $session;
		$this->logger = $logger;
	}

	/**
	 * Sets up the filesystem and user for public sharing
	 * @param string $token string share token
	 * @param string $relativePath optional path relative to the share
	 *
	 * @throws InvalidTokenException
	 * @throws InvalidUserException
	 * @throws IncompleteTokenException
	 * @throws LinkItemException
	 * @throws ItemTypeException
	 * @throws AuthenticationException
	 *
	 * @return array
	 */
	public function setupFromToken($token, $relativePath = null) {
		\OC_User::setIncognitoMode(true);

		$linkItem = \OCP\Share::getShareByToken($token, false);
		if($linkItem === false || ($linkItem['item_type'] !== 'file' && $linkItem['item_type'] !== 'folder')) {
			$this->logger->debug('Passed token parameter is not valid',
			                     ['app' => 'core-preview']);
			throw new InvalidTokenException();
		}

		if(!isset($linkItem['uid_owner']) || !isset($linkItem['file_source'])) {
			$this->logger->debug('Passed token seems to be valid, but it does not contain all necessary information . ("' . $token . '")',
			                     ['app' => 'core-preview']);
			throw new IncompleteTokenException();
		}

		$rootLinkItem = \OCP\Share::resolveReShare($linkItem);
		$path = null;
		if (isset($rootLinkItem['uid_owner'])) {
			if (!\OCP\User::userExists($rootLinkItem['uid_owner'])) {
				throw new InvalidUserException;
			}
			\OC_Util::tearDownFS();
			\OC_Util::setupFS($rootLinkItem['uid_owner']);
			$path = \OC\Files\Filesystem::getPath($linkItem['file_source']);
		}

		if ($path === null) {
			$this->logger->debug('could not resolve linkItem', 
								 ['app' => 'files_sharing']);
			throw new LinkItemException();
		}

		if (!isset($linkItem['item_type'])) {
			$this->logger->debug('No item type set for share id: ' . $linkItem['id'], 
								 ['app' => 'files_sharing']);
			throw new ItemTypeException();
		}

		if (isset($linkItem['share_with']) && (int)$linkItem['share_type'] === \OCP\Share::SHARE_TYPE_LINK) {
			if (!$this->authenticate($linkItem)) {
				throw new AuthenticationException();
			}
		}

		$basePath = $path;

		if ($relativePath !== null) {
			if (!\OC\Files\Filesystem::is_dir($basePath . $relativePath) ||
			    !\OC\Files\Filesystem::isReadable($basePath . $relativePath)) {
				throw new DirNotAvailableException();
			}
			$path .= \OC\Files\Filesystem::normalizePath($relativePath);
		}

		return array(
			'linkItem' => $linkItem,
			'basePath' => $basePath,
			'realPath' => $path
		);
	}

	/**
	 * Authenticate link item with the session
	 * @param array $linkItem link item array
	 *
	 * @return boolean true if authorized, false otherwise
	 */
	public function authenticate($linkItem) {
		if ( ! $this->session->exists('public_link_authenticated')
			|| $this->session->get('public_link_authenticated') !== $linkItem['id']) {
			return false;
		}
		return true;
	}

	public static function registerHooks() {
		\OCP\Util::connectHook('OC_Filesystem', 'setup', '\OC\Files\Storage\Shared', 'setup');
		\OCP\Util::connectHook('OC_Filesystem', 'setup', '\OCA\Files_Sharing\External\Manager', 'setup');
		\OCP\Util::connectHook('OC_Filesystem', 'post_write', '\OC\Files\Cache\Shared_Updater', 'writeHook');
		\OCP\Util::connectHook('OC_Filesystem', 'post_delete', '\OC\Files\Cache\Shared_Updater', 'postDeleteHook');
		\OCP\Util::connectHook('OC_Filesystem', 'delete', '\OC\Files\Cache\Shared_Updater', 'deleteHook');
		\OCP\Util::connectHook('OC_Filesystem', 'post_rename', '\OC\Files\Cache\Shared_Updater', 'renameHook');
		\OCP\Util::connectHook('OC_Filesystem', 'post_delete', '\OCA\Files_Sharing\Hooks', 'unshareChildren');
		\OCP\Util::connectHook('OC_Appconfig', 'post_set_value', '\OCA\Files\Share\Maintainer', 'configChangeHook');

		\OCP\Util::connectHook('OCP\Share', 'post_shared', '\OC\Files\Cache\Shared_Updater', 'postShareHook');
		\OCP\Util::connectHook('OCP\Share', 'post_unshare', '\OC\Files\Cache\Shared_Updater', 'postUnshareHook');
		\OCP\Util::connectHook('OCP\Share', 'post_unshareFromSelf', '\OC\Files\Cache\Shared_Updater', 'postUnshareFromSelfHook');

		\OCP\Util::connectHook('OC_User', 'post_deleteUser', '\OCA\Files_Sharing\Hooks', 'deleteUser');
	}

}
