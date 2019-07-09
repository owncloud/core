<?php
/**
 * @author Viktar Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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
namespace OC\Repair;

use OC\Files\Node\File;
use OC\NotSquareException;
use OC\User\NoUserException;
use OCP\Files\Folder;
use OCP\Files\IRootFolder;
use OCP\Files\Storage\IStorage;
use OCP\Files\StorageNotAvailableException;
use OCP\IDBConnection;
use OCP\IL10N;
use OCP\ILogger;
use OCP\IUserManager;
use OCP\Migration\IOutput;
use OCP\Migration\IRepairStep;
use OCP\IUser;
use OC\Avatar;
use OCP\IConfig;
use OCP\IAvatarManager;
use OCP\Files\NotFoundException;

/**
 * OC 10.2.0 spreads avatars into multiple subdirectories of data dir
 * This repair step puts them under data/avatars/
 *
 * @package OC\Repair
 */
class MoveAvatarIntoSubFolder implements IRepairStep {
	/** @var \OCP\IConfig */
	protected $config;

	/** @var IDBConnection */
	private $connection;

	/** @var IUserManager */
	private $userManager;

	/** @var IAvatarManager */
	private $avatarManager;

	/** @var IRootFolder */
	private $rootFolder;

	/** @var \OCP\ILogger */
	private $logger;

	/** @var \OCP\IL10N */
	private $l;

	/**
	 * @param IConfig $config config
	 * @param IDBConnection $connection database connection
	 * @param IUserManager $userManager user manager
	 * @param IAvatarManager $avatarManager
	 * @param IRootFolder $rootFolder
	 * @param IL10N $l10n
	 * @param ILogger $logger
	 */
	public function __construct(
		IConfig $config,
		IDBConnection $connection,
		IUserManager $userManager,
		IAvatarManager $avatarManager,
		IRootFolder $rootFolder,
		IL10N $l10n,
		ILogger $logger
	) {
		$this->config = $config;
		$this->connection = $connection;
		$this->userManager = $userManager;
		$this->avatarManager = $avatarManager;
		$this->rootFolder = $rootFolder;
		$this->l = $l10n;
		$this->logger = $logger;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return 'Fix user avatars location';
	}

	/**
	 * Move avatars outside of their homes
	 *
	 * @param IOutput $out
	 * @param IUser $user
	 */
	private function moveAvatars(IOutput $out, IUser $user) {
		$userId = $user->getUID();

		try {
			\OC\Files\Filesystem::initMountPoints($userId);

			$brokenPath = \substr_replace(
				\substr_replace(\md5($userId), '/', 4, 0),
				'/',
				2,
				0
			);
			if ($this->brokenAvatarExists($brokenPath)) {
				$newAvatarStorage = $this->rootFolder->get('/avatars/')->getStorage();
				$avatar = new Avatar($newAvatarStorage, $this->l, $user, $this->logger);
				// Overwrite pre 10.2 avatar if any as they were reuploaded
				try {
					$oldAvatarFile = $this->rootFolder->get("{$brokenPath}/avatar.jpg");
				} catch (NotFoundException $e) {
					$oldAvatarFile = $this->rootFolder->get("{$brokenPath}/avatar.png");
				}
				$avatar->set($oldAvatarFile->getContent());

				// Delete old avatars path only if it does not contain any other items
				// as it might collide with a real user directory
				// e.g. data/de/ad/3b7a931377ad4ab5ad6a9cd718aa could be used by a real user de
				// so we need to keep de if it has any other child except ad
				$oldAvatarDir = $this->rootFolder->get($brokenPath);
				$oldAvatarDir->delete();
				$brokenParent = $oldAvatarDir->getParent();
				$brokenRoot = $brokenParent->getParent();
				foreach ([$brokenParent, $brokenRoot] as $dir) {
					/** @var \OCP\Files\Folder $dir */
					if ($dir->isDeletable() === false
						|| \count($dir->getDirectoryListing()) > 0
					) {
						break;
					}
					$dir->delete();
				}
			}
		} catch (NoUserException $e) {
			$this->logger->warning("Skipping avatar move for $userId: User does not exist.", ['app' => __METHOD__]);
		} catch (NotFoundException $e) {
			// not all users have a home, ignore
			$this->logger->debug("Skipping avatar move for $userId: User has no home or avatar folder.", ['app' => __METHOD__]);
		} catch (NotSquareException $e) {
			$this->logger->warning("Skipping avatar move for $userId: avatar image {$oldAvatarFile->getPath()} for user $userId is not square.", ['app' => __METHOD__]);
		} catch (\Exception $e) {
			$this->logger->logException($e, ['app' => __METHOD__, 'message' => "Skipping avatar move for $userId"]);
		}

		\OC_Util::tearDownFS();
	}

	/**
	 * @param string $basePath
	 * @return bool
	 * @throws NotFoundException
	 */
	private function brokenAvatarExists($basePath) {
		try {
			$storage = $this->rootFolder->get('/')->getStorage();
			return $storage->file_exists("{$basePath}/avatar.jpg")
				|| $storage->file_exists("{$basePath}/avatar.png");
		} catch (StorageNotAvailableException $e) {
			return false;
		}
	}

	/**
	 * @param IOutput $output
	 */
	public function run(IOutput $output) {
		$ocVersionFromBeforeUpdate = $this->config->getSystemValue('version', '0.0.0');
		if (\version_compare($ocVersionFromBeforeUpdate, '10.2.0.5', '=')) {
			$function = function (IUser $user) use ($output) {
				$this->moveAvatars($output, $user);
				$output->advance();
			};

			$output->startProgress($this->userManager->countSeenUsers());

			$this->userManager->callForSeenUsers($function);

			$output->finishProgress();
		} else {
			$output->info("No action required");
		}
	}
}
