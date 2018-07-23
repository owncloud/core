<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Vincent Petry <pvince81@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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

namespace OC;

use OCP\Files\Folder;
use OCP\Files\NotFoundException;
use OCP\IAvatarManager;
use OCP\ILogger;
use OCP\IUserManager;
use OCP\Files\IRootFolder;
use OCP\IL10N;
use OCP\IUser;

/**
 * This class implements methods to access Avatar functionality
 */
class AvatarManager implements IAvatarManager {

	/** @var  IUserManager */
	private $userManager;

	/** @var  IRootFolder */
	private $rootFolder;

	/** @var IL10N */
	private $l;

	/** @var ILogger  */
	private $logger;

	/**
	 * AvatarManager constructor.
	 *
	 * @param IUserManager $userManager
	 * @param IRootFolder $rootFolder
	 * @param IL10N $l
	 * @param ILogger $logger
	 */
	public function __construct(
			IUserManager $userManager,
			IRootFolder $rootFolder,
			IL10N $l,
			ILogger $logger) {
		$this->userManager = $userManager;
		$this->rootFolder = $rootFolder;
		$this->l = $l;
		$this->logger = $logger;
	}

	/**
	 * return a user specific instance of \OCP\IAvatar
	 * @see \OCP\IAvatar
	 * @param string $userId the ownCloud user id
	 * @return \OCP\IAvatar
	 * @throws \Exception In case the username is potentially dangerous
	 * @throws NotFoundException In case there is no user folder yet
	 */
	public function getAvatar($userId) {
		$user = $this->userManager->get($userId);
		if ($user === null) {
			throw new \Exception('user does not exist');
		}

		$avatarsFolder = $this->getAvatarFolder($user);
		return new Avatar($avatarsFolder, $this->l, $user, $this->logger);
	}

	private function getFolder(Folder $folder, $path) {
		try {
			return $folder->get($path);
		} catch (NotFoundException $e) {
			return $folder->newFolder($path);
		}
	}

	private function buildAvatarPath($userId) {
		$avatar = \substr_replace(\substr_replace(\md5($userId), '/', 4, 0), '/', 2, 0);
		return \explode('/', $avatar);
	}

	/**
	 * Returns the avatar folder for the given user
	 *
	 * @param IUser $user user
	 * @return Folder|\OCP\Files\Node
	 *
	 * @internal
	 */
	public function getAvatarFolder(IUser $user) {
		$avatarsFolder = $this->getFolder($this->rootFolder, 'avatars');
		$parts = $this->buildAvatarPath($user->getUID());
		foreach ($parts as $part) {
			$avatarsFolder = $this->getFolder($avatarsFolder, $part);
		}
		return $avatarsFolder;
	}
}
