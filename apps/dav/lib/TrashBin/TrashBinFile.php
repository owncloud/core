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

use OCP\Files\FileInfo;
use Sabre\DAV\Exception\Forbidden;
use Sabre\DAV\IFile;

class TrashBinFile extends AbstractTrashBinNode implements IFile {

	public function __construct(FileInfo $fileInfo, TrashBinManager $trashBinManager) {
		parent::__construct($fileInfo, $trashBinManager);
	}

	public function put($data) {
		throw new Forbidden('Permission denied to write this file');
	}

	public function get() {
		throw new Forbidden('Permission denied to read this file');
	}

	public function delete() {
		throw new Forbidden('Permission denied to delete this file');
	}

	public function setName($name) {
		throw new Forbidden('Permission denied to rename this file');
	}
}
