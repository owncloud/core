<?php
/**
 * @author Tom Needham <tom@owncloud.com>
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

namespace OCA\Files\Service\TransferOwnership;

use OC\Encryption\Manager;
use OC\Files\Filesystem;
use OC\Files\View;
use OC\Share20\ProviderFactory;
use OCP\Files\FileInfo;
use OCP\Files\NotFoundException;
use OCP\IConfig;
use OCP\ILogger;
use OCP\IUser;
use OCP\IUserManager;
use OCP\Share\IManager;
use OCP\Share\IShare;

class TransferOwnershipService {

	/** @var bool */
	private $filesExist = false;
	/** @var bool */
	private $foldersExist = false;
	/** @var FileInfo[] */
	private $encryptedFiles = [];
	/** @var IShare[] */
	private $shares = [];
	/** @var string */
	private $sourceUser;
	/** @var string */
	private $destinationUser;
	/** @var string */
	private $inputPath;
	/** @var string */
	private $finalTarget;

	/** @var Manager  */
	protected $encryptionManager;
	/** @var IUserManager  */
	protected $userManager;
	/** @var ILogger */
	protected $logger;
	/** @var IConfig  */
	protected $config;
	/** @var ProviderFactory  */
	private $shareProviderFactory;
	/** @var IManager */
	protected $shareManager;

	public function __construct(
		Manager $encryptionManager,
		IUserManager $userManager,
		ILogger $logger,
		IConfig $config,
		ProviderFactory $shareProviderFactory,
		IManager $shareManager
	) {
		$this->encryptionManager = $encryptionManager;
		$this->userManager = $userManager;
		$this->loggger = $logger;
		$this->config = $config;
		$this->shareProviderFactory = $shareProviderFactory;
		$this->shareManager = $shareManager;
	}

	public function transfer(IUser $sourceUser, IUser $destinationUser, $sourcePath = '/') {

		$this->inputPath = $sourcePath;
		$this->destinationUser = $destinationUser->getUID();
		$this->sourceUser = $sourceUser->getUID();

		// target user has to be ready
		if (!$this->encryptionManager->isReadyForUser($this->destinationUser)) {
			throw new \Exception('The target user is not ready to accept files. The user has at least to be logged in once.');
		}

		// use a date format compatible across client OS
		$date = \date('Ymd_his');
		$this->finalTarget = "$this->destinationUser/files/transferred from $this->sourceUser on $date";

		// setup filesystem
		Filesystem::initMountPoints($this->sourceUser);
		Filesystem::initMountPoints($this->destinationUser);

		if (\strlen($this->inputPath) >= 1) {
			$view = new View();
			$unknownDir = $this->inputPath;
			$this->inputPath = $this->sourceUser . "/files/" . $this->inputPath;
			if (!$view->is_dir($this->inputPath)) {
				throw new NotFoundException("$unknownDir not found");
			}
		}

		// analyse source folder
		$this->analyse();

		if (!$this->filesExist and !$this->foldersExist) {
			throw new NotFoundException("No files/folders found for transfer");
		}

		// collect all the shares
		$this->collectUsersShares();

		// transfer the files
		$this->doTransfer();

		// restore the shares
		$status = $this->restoreShares();

		if ($status !== 0) {
			throw new \Exception('Failed to complete transfer');
		}

		return true;
	}

	private function walkFiles(View $view, $path, \Closure $callBack) {
		foreach ($view->getDirectoryContent($path) as $fileInfo) {
			if (!$callBack($fileInfo)) {
				return;
			}
			if ($fileInfo->getType() === FileInfo::TYPE_FOLDER) {
				$this->walkFiles($view, $fileInfo->getPath(), $callBack);
			}
		}
	}

	/**
	 * @throws \Exception
	 */
	protected function analyse() {
		$view = new View();
		$walkPath = "$this->sourceUser/files";
		if (\strlen($this->inputPath) > 0) {
			if ($this->inputPath !== "$this->sourceUser/files") {
				$walkPath = $this->inputPath;
				$this->foldersExist = true;
			}
		}

		$this->walkFiles($view, $walkPath,
			function (FileInfo $fileInfo) {
				if ($fileInfo->getType() === FileInfo::TYPE_FOLDER) {
					// only analyze into folders from main storage,
					// sub-storages have an empty internal path
					if ($fileInfo->getInternalPath() === '' && $fileInfo->getPath() !== '') {
						return false;
					}

					$this->foldersExist = true;
					return true;
				}
				$this->filesExist = true;
				if ($fileInfo->isEncrypted()) {
					if ($this->config->getAppValue('encryption', 'useMasterKey', 0) !== 0) {
						/**
						 * We are not going to add this to encryptedFiles array.
						 * Because its encrypted with masterKey and hence it doesn't
						 * require user's specific password.
						 */
						return true;
					}
					$this->encryptedFiles[] = $fileInfo;
				}
				return true;
			});

		// no file is allowed to be encrypted
		if (!empty($this->encryptedFiles)) {
			throw new \Exception('Encrypted files found - decrypt them first');
		}
	}

	/**
	 */
	private function collectUsersShares() {
		foreach ([\OCP\Share::SHARE_TYPE_GROUP, \OCP\Share::SHARE_TYPE_USER, \OCP\Share::SHARE_TYPE_LINK, \OCP\Share::SHARE_TYPE_REMOTE] as $shareType) {
			$offset = 0;
			while (true) {
				$sharePage = $this->shareManager->getSharesBy($this->sourceUser, $shareType, null, true, 50, $offset);
				if (empty($sharePage)) {
					break;
				}

				$this->shares = \array_merge($this->shares, $sharePage);
				$offset += 50;
			}
		}

	}

	/**
	 */
	protected function doTransfer() {
		$view = new View();
		$sourcePath = (\strlen($this->inputPath) > 0) ? $this->inputPath : "$this->sourceUser/files";
		// This change will help user to transfer the folder specified using --path option.
		// Else only the content inside folder is transferred which is not correct.
		if (\strlen($this->inputPath) > 0) {
			if ($this->inputPath !== \ltrim("$this->sourceUser/files", '/')) {
				$view->mkdir($this->finalTarget);
				$this->finalTarget = $this->finalTarget . '/' . \basename($sourcePath);
			}
		}

		$view->rename($sourcePath, $this->finalTarget);

		if (!\is_dir("$this->sourceUser/files")) {
			// because the files folder is moved away we need to recreate it
			$view->mkdir("$this->sourceUser/files");
		}
	}

	/**
	 */
	private function restoreShares() {
		$status = 0;

		$childShares = [];
		foreach ($this->shares as $share) {
			try {
				/**
				 * Do not process children which are already processed.
				 * This piece of code populates the childShare array
				 * with the child shares which will be processed. And
				 * hence will avoid further processing of same share
				 * again.
				 */
				if ($share->getSharedWith() === $this->destinationUser) {
					$provider = $this->shareProviderFactory->getProviderForType($share->getShareType());
					foreach ($provider->getChildren($share) as $child) {
						$childShares[] = $child->getId();
					}
				} else {
					/**
					 * Before doing handover to transferShare, check if the share
					 * id is present in the childShares. If so then just ignore
					 * this share and continue. If not ignored, the child shares
					 * would be processed again, if their parent share was shared
					 * with destination user. And hence we can safely avoid the
					 * duplicate processing of shares here.
					 */
					if (\in_array($share->getId(), $childShares, true)) {
						continue;
					}
				}
				$this->shareManager->transferShare($share, $this->sourceUser, $this->destinationUser, $this->finalTarget);
			} catch (\OCP\Files\NotFoundException $e) {
				$this->logger->error('Share with id ' . $share->getId() . ' points at deleted file, skipping');
			} catch (\Exception $e) {
				$this->logger->error('Could not restore share with id ' . $share->getId() . ':' . $e->getTraceAsString() . '</error>');
				$status = 1;
			}
		}
		return $status;
	}

}