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

namespace OCA\DAV\Files\PublicFiles;

use OCP\Constants;
use OCP\Files\Folder;
use OCP\Files\InvalidPathException;
use OCP\Files\NotFoundException;
use OCP\Files\NotPermittedException;
use OCP\Share\IShare;
use Sabre\DAV\Collection;
use Sabre\DAV\Exception\Forbidden;
use Sabre\DAVACL\IACL;

/**
 * Class SharedFolder - represents a folder living in a public shared folder
 *
 * @package OCA\DAV\Files\PublicFiles
 */
class SharedFolder extends Collection implements IACL, IPublicSharedNode {
	use SharedNodeTrait, NodeFactoryTrait;

	/** @var Folder */
	private $folder;

	/**
	 * SharedFolder constructor.
	 *
	 * @param Folder $folder
	 * @param IShare $share
	 */
	public function __construct(Folder $folder, IShare $share) {
		$this->folder = $folder;
		$this->node = $folder;
		$this->share = $share;
	}

	/**
	 * @inheritdoc
	 */
	public function getChildren() {
		$nodes = $this->folder->getDirectoryListing();
		return \array_map(function ($node) {
			return $this->nodeFactory($node, $this->share);
		}, $nodes);
	}

	public function createDirectory($name) {
		try {
			$this->folder->newFolder($name);
		} catch (NotPermittedException $ex) {
			throw new Forbidden('Permission denied to create directory');
		}
	}

	public function createFile($name, $data = null) {
		try {
			$file = $this->folder->newFile($name);
			$file->putContent($data);
			return '"' . $file->getEtag() . '"';
		} catch (NotPermittedException $ex) {
			throw new Forbidden('Permission denied to create file');
		} catch (InvalidPathException $ex) {
			throw new Forbidden('Permission denied to create file');
		} catch (NotFoundException $ex) {
			throw new Forbidden('Permission denied to create file');
		}
	}

	public function getACL() {
		$acl = [
			[
				'privilege' => '{DAV:}all',
				'principal' => '{DAV:}owner',
				'protected' => true,
			],
			[
				'privilege' => '{DAV:}read',
				'principal' => 'principals/system/public',
				'protected' => true,
			]
		];

		if ($this->checkSharePermissions(Constants::PERMISSION_DELETE)) {
			$acl[] =
				[
					'privilege' => '{DAV:}unbind',
					'principal' => 'principals/system/public',
					'protected' => true,
				];
		}
		if ($this->checkSharePermissions(Constants::PERMISSION_CREATE)) {
			$acl[] =
				[
					'privilege' => '{DAV:}bind',
					'principal' => 'principals/system/public',
					'protected' => true,
				];
		}

		return $acl;
	}
}
