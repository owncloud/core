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

use OCP\Files\Storage\IStorage;
use OCP\IAvatarManager;
use OCP\ILogger;
use OCP\IUserManager;
use OCP\IL10N;

/**
 * This class implements methods to access Avatar functionality
 */
class AvatarManager implements IAvatarManager {

	/** @var  IUserManager */
	private $userManager;

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
	 * @param IStorage $storage
	 * @param IL10N $l
	 * @param ILogger $logger
	 */
	public function __construct(
			IUserManager $userManager,
			IStorage $storage,
			IL10N $l,
			ILogger $logger) {
		$this->userManager = $userManager;
		$this->storage = $storage;
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
	 */
	public function getAvatar($userId) {
		$user = $this->userManager->get($userId);
		if ($user === null) {
			throw new \Exception('user does not exist');
		}

		return new Avatar($this->storage, $this->l, $user, $this->logger);
	}

	/**
	 * Returns the avatar storage for the given user
	 *
	 * @return \OCP\Files\Storage\IStorage
	 *
	 */
	public function getAvatarStorage() {
		return $this->storage;
	}
}
