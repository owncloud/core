<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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


use OCP\Share\IShare;
use Sabre\DAV\File;
use Sabre\DAVACL\ACLTrait;
use Sabre\DAVACL\IACL;

/**
 * Class MetaFile
 * This is a Sabre based implementation of a file living in the /meta resource.
 *
 * @package OCA\DAV\Meta
 */
class SharedFile extends File implements IACL {

	use ACLTrait;

	/** @var \OCP\Files\File */
	private $file;

	/**
	 * MetaFolder constructor.
	 *
	 * @param \OCP\Files\File $file
	 * @param IShare $share
	 */
	public function __construct(\OCP\Files\File $file, IShare $share) {
		$this->file = $file;
	}

	/**
	 * @inheritdoc
	 */
	function getName() {
		return $this->file->getName();
	}

	public function getSize() {
		return $this->file->getSize();
	}

	public function getContentType() {
		return $this->file->getMimeType();
	}

	public function getETag() {
		return $this->file->getETag();
	}

	function getLastModified() {
		return $this->file->getMTime();
	}

	function delete() {
		// TODO: check permissions - via ACL?
		$this->file->delete();
	}

//	function setName($name) {
//		$this->file->setName($name);
//	}

	function getOwner() {
		return '';
	}

	function getACL() {
		return [
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
	}
}
