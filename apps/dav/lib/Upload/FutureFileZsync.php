<?php
/*
 * Copyright (C) by Ahmed Ammar <ahmed.a.ammar@gmail.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
 * documentation files (the "Software"), to deal in the Software without restriction, including without limitation the
 * rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the
 * Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE
 * WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR
 * OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
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
