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
namespace OCA\Files_Sharing;

use OCP\ISession;
use OCP\ILogger;
use OCA\Files_Sharing\Exceptions\InvalidTokenException;
use OCA\Files_Sharing\Exceptions\IncompleteTokenException;
use OCA\Files_Sharing\Exceptions\LinkItemException;
use OCA\Files_Sharing\Exceptions\ItemTypeException;
use OCA\Files_Sharing\Exceptions\AuthenticationException;
use OCA\Files_Sharing\Exceptions\InvalidUserException;

class Helper2 {

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

		if ($relativePath !== null && \OC\Files\Filesystem::isReadable($basePath . $relativePath)) {
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

}
