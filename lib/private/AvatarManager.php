<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
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

use OCP\Files\NotFoundException;
use OCP\Files\Storage\IStorage;
use OCP\IAvatarManager;
use OCP\ILogger;
use OCP\IUserManager;
use OCP\Files\IRootFolder;
use OCP\IL10N;

/**
 * This class implements methods to access Avatar functionality
 */
class AvatarManager implements IAvatarManager {

	/** @var  IUserManager */
	private $userManager;

	/** @var  IRootFolder */
	private $rootFolder;

	/** @var IStorage */
	private $storage;

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
	 *
	 * @param string $userId the ownCloud user id
	 *
	 * @return \OCP\IAvatar
	 *
	 * @throws \Exception In case the username is potentially dangerous
	 * @throws NotFoundException In case there is no user folder yet
	 */
	public function getAvatar($userId) {
		$user = $this->userManager->get($userId);
		if ($user === null) {
			throw new \Exception('user does not exist');
		}

		$avatarsStorage = $this->getAvatarStorage();
		return new Avatar($avatarsStorage, $this->l, $user, $this->logger);
	}

	/**
	 * Returns the avatar storage for the given user
	 *
	 * @return \OCP\Files\Storage\IStorage
	 *
	 * @throws NotFoundException
	 * @throws \OCP\Files\NotPermittedException
	 */
	public function getAvatarStorage() {
		if (!$this->storage) {
			try {
				$this->storage = $this->rootFolder->get('avatars')->getStorage();
			} catch (NotFoundException $e) {
				$this->storage = $this->rootFolder->newFolder('avatars')->getStorage();
			}
		}
		return $this->storage;
	}
}
