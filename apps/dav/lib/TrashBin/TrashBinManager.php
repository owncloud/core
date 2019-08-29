<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCA\DAV\TrashBin;

use OC\Files\FileInfo;
use OC\Files\View;
use OCA\Files_Trashbin\Trashbin;
use OCP\Files\ForbiddenException;
use OCP\Files\NotFoundException;
use OCP\Files\StorageNotAvailableException;
use OCP\Lock\LockedException;
use Sabre\DAV\Exception\InvalidResourceType;
use Sabre\DAV\Exception\NotFound;

/**
 * Class TrashBinManager
 *
 * @package OCA\DAV\TrashBin
 * @codeCoverageIgnore
 */
class TrashBinManager {
	public function getChild(string $user, string $id) {
		try {
			$view = new View('/' . $user . '/files_trashbin/files');
			$path = $view->getPath($id);
			$fileInfo = $view->getFileInfo($path);
			return $this->nodeFactory($user, $fileInfo);
		} catch (NotFoundException $ex) {
			throw new NotFound();
		}
	}

	public function getChildren(string $user, string $fileId = null) {
		try {
			$view = new View('/' . $user . '/files_trashbin/files');
			$path = '/';
			if ($fileId) {
				$path = $view->getPath($fileId);
			}
			$fileInfo = $view->getFileInfo($path);
			if ($fileInfo === false) {
				throw new NotFound();
			}
			if ($fileInfo->getMimetype() !== 'httpd/unix-directory') {
				throw new InvalidResourceType();
			}
			$files = $view->getDirectoryContent($path);
			return \array_map(function ($fileInfo) use ($user) {
				return $this->nodeFactory($user, $fileInfo);
			}, $files);
		} catch (\Exception $exception) {
			return [];
		}
	}

	private function nodeFactory(string $user, FileInfo $fileInfo) {
		if ($fileInfo->getMimetype() === 'httpd/unix-directory') {
			return new TrashBinFolder($user, $fileInfo, $this);
		}
		return new TrashBinFile($user, $fileInfo, $this);
	}

	/**
	 * @param string $user
	 * @param AbstractTrashBinNode $trashItem
	 * @param $targetLocation
	 * @return bool
	 * @throws ForbiddenException
	 * @throws LockedException
	 * @throws StorageNotAvailableException
	 */
	public function restore(string $user, AbstractTrashBinNode $trashItem, $targetLocation) : bool {
		$path = $trashItem->getPathInTrash();
		$path = \implode('/', $path);
		return Trashbin::restore($path,
			$trashItem->getOriginalFileName(), $trashItem->getDeleteTimestamp(), $targetLocation);
	}

	/**
	 * @param string $user
	 * @param AbstractTrashBinNode $trashItem
	 * @throws ForbiddenException
	 * @throws LockedException
	 * @throws StorageNotAvailableException
	 */
	public function delete(string $user, AbstractTrashBinNode $trashItem) {
		$path = $trashItem->getPathInTrash();
		$path = \implode('/', $path);
		Trashbin::delete($path, $user);
	}

	public function deleteAll() {
		return Trashbin::deleteAll();
	}

	public function getLocation(string $user, $filename, int $timestamp) {
		return Trashbin::getLocation($user, $filename, $timestamp);
	}
}
