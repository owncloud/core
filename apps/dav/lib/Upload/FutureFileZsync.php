<?php
/**
 * @author Ahmed Ammar <ahmed.a.ammar@gmail.com>
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
namespace OCA\DAV\Upload;

use OCA\DAV\Connector\Sabre\Directory;
use Sabre\DAV\Exception\Forbidden;
use Sabre\DAV\IFile;

/**
 * Class FutureFileZsync
 *
 * The FutureFileZsync is a SabreDav IFile which connects the chunked upload directory
 * with the AssemblyStreamZsync, who does the final assembly job
 *
 * @package OCA\DAV\Upload
 */
class FutureFileZsync extends FutureFile {

	/** @var IFile */
	private $backingFile = null;
	/** @var string */
	private $fileLength = 0;

	static public function getFutureFileName() {
		return '.file.zsync';
	}

	static public function isFutureFile() {
		$davUploadsTarget = '/dav/uploads';

		// Check if pathinfo starts with dav uploads target and basename is future file basename
		if (isset($_SERVER['PATH_INFO'])
			&& pathinfo($_SERVER['PATH_INFO'], PATHINFO_BASENAME) === FutureFileZsync::getFutureFileName()
			&& (strpos($_SERVER['PATH_INFO'], $davUploadsTarget) === 0)) {
			return true;
		}

		return false;
	}

	/**
	 * @inheritdoc
	 */
	function get() {
		$nodes = $this->root->getChildren();
		return $this->root->childExists('.zsync') && $this->backingFile && $this->fileLength ?
			AssemblyStreamZsync::wrap($nodes, $this->backingFile, $this->fileLength) :
			AssemblyStream::wrap($nodes);
	}

	/**
	 * @param IFile $file
	 */
	function setBackingFile(IFile $file) {
		$this->backingFile = $file;
	}

	/**
	 * @param string $fileLength
	 */
	function setFileLength($fileLength) {
		$this->fileLength = $fileLength;
	}
}
