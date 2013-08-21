<?php
/**
 * ownCloud
 *
 * @author Jakob Sack
 * @author Michael Gapczynski
 * @copyright 2011 Jakob Sack kde@jakobsack.de
 * @copyright 2013 Michael Gapczynski mtgap@owncloud.com
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

class OC_Connector_Sabre_File extends OC_Connector_Sabre_Node implements Sabre_DAV_IFile {

	/**
	 * Updates the data
	 *
	 * @param resource $data
	 * @throws Sabre_DAV_Exception_Forbidden
	 * @see Sabre_DAV_IFile->put
	 * @return string|null
	 */
	public function put($data) {
		if (\OC\Files\Filesystem::file_exists($this->path)
			&& !\OC\Files\Filesystem::isUpdatable($this->path)
		) {
			throw new \Sabre_DAV_Exception_Forbidden();
		}
		if (isset($_SERVER['HTTP_OC_CHUNKED'])) {
			$info = OC_FileChunking::decodeName(basename($this->path));
			if (empty($info)) {
				throw new Sabre_DAV_Exception_NotImplemented();
			}
			$chunkHandler = new OC_FileChunking($info);
			$chunkHandler->store($info['index'], $data);
			if ($chunkHandler->isComplete()) {
				$chunkHandler->file_assemble($this->path);
			}
		} else {
			// mark file as partial while uploading (ignored by the scanner)
			$partpath = $this->path . '.part';
			\OC\Files\Filesystem::file_put_contents($partpath, $data);
			//detect aborted upload
			if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'PUT') {
				if (isset($_SERVER['CONTENT_LENGTH'])) {
					$expected = (int)$_SERVER['CONTENT_LENGTH'];
					$actual = \OC\Files\Filesystem::filesize($partpath);
					if ($actual !== $expected) {
						\OC\Files\Filesystem::unlink($partpath);
						throw new Sabre_DAV_Exception_BadRequest(
							'expected filesize ' . $expected . ' got ' . $actual
						);
					}
		
		// mark file as partial while uploading (ignored by the scanner)
		$partpath = $this->path . '.part';

		\OC\Files\Filesystem::file_put_contents($partpath, $data);

		//detect aborted upload
		if (isset ($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'PUT') {
			if (isset($_SERVER['CONTENT_LENGTH'])) {
				$expected = $_SERVER['CONTENT_LENGTH'];
				$actual = \OC\Files\Filesystem::filesize($partpath);
				if ($actual != $expected) {
					\OC\Files\Filesystem::unlink($partpath);
					throw new Sabre_DAV_Exception_BadRequest(
						'expected filesize ' . $expected . ' got ' . $actual);
				}
			}
			// rename to correct path
			\OC\Files\Filesystem::rename($partpath, $this->path);
		}
		// allow sync clients to send the mtime along in a header
		$mtime = OC_Request::hasModificationTime();
		if ($mtime !== false) {
			if ($this->touch($mtime)) {
				header('X-OC-MTime: accepted');
			}
		}
		return $this->getETag();
	}

	/**
	 * Returns the data
	 *
	 * @return stream
	 */
	public function get() {
		return \OC\Files\Filesystem::fopen($this->path, 'rb');
	}

	/**
	 * Delete the current file
	 *
	 * @return void
	 * @throws Sabre_DAV_Exception_Forbidden
	 */
	public function delete() {
		if (!\OC\Files\Filesystem::isDeletable($this->path)) {
			throw new \Sabre_DAV_Exception_Forbidden();
		}
		\OC\Files\Filesystem::unlink($this->path);
		$this->clearProperties();
	}

	/**
	 * Returns the size of the node, in bytes
	 *
	 * @return int
	 */
	public function getSize() {
		$fileInfo = $this->getFileInfo();
		if (isset($fileInfo['size']) && $fileInfo['size'] > -1) {
			return $fileInfo['size'];
		}
		return null;
	}

	/**
	 * Returns the ETag for a file
	 *
	 * An ETag is a unique identifier representing the current version of the
	 * file. If the file changes, the ETag MUST change.  The ETag is an
	 * arbritrary string, but MUST be surrounded by double-quotes.
	 *
	 * Return null if the ETag can not effectively be determined
	 *
	 * @return string|null
	 */
	public function getETag() {
		$fileInfo = $this->getFileInfo();
		if (isset($fileInfo['etag'])) {
			return '"'.$fileInfo['etag'].'"';
		}
		return null;
	}

	/**
	 * Returns the mime-type for a file
	 *
	 * If null is returned, we'll assume application/octet-stream
	 *
	 * @return string|null
	 */
	public function getContentType() {
		$fileInfo = $this->getFileInfo();
		if (isset($fileInfo['mimteype'])) {
			return $fileInfo['mimteype'];
		}
		return null;
	}

}
