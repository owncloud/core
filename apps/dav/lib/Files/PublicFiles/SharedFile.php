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

use OCA\DAV\Files\IFileNode;
use OCP\Files\NotPermittedException;
use OCP\Share\IShare;
use Sabre\DAV\Exception\Forbidden;
use Sabre\DAV\File;
use Sabre\DAVACL\IACL;

/**
 * Class SharedFile - represents a file living in a public shared folder
 *
 * @package OCA\DAV\Files\PublicFiles
 */
class SharedFile extends File implements IACL, IFileNode, IPublicSharedNode {
	use SharedNodeTrait;

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
		$this->node = $file;
		$this->share = $share;
	}

	public function get() {
		try {
			return $this->file->fopen('r');
		} catch (NotPermittedException $ex) {
			throw new Forbidden('Permission denied to read this file');
		}
	}

	public function getContentType() {
		return $this->file->getMimeType();
	}

	public function put($data) {
		try {
			$this->file->putContent($data);
			return $this->file->getEtag();
		} catch (NotPermittedException $ex) {
			throw new Forbidden('Permission denied to change data');
		}
	}

	public function getSize() {
		return $this->file->getSize();
	}
}
