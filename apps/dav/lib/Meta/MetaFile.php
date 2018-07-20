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

namespace OCA\DAV\Meta;

use OC\Files\Meta\MetaFileVersionNode;
use OCA\DAV\Files\ICopySource;
use OCA\DAV\Files\IProvidesAdditionalHeaders;
use OCA\DAV\Files\IFileNode;
use OCP\Files\Node;
use Sabre\DAV\File;

/**
 * Class MetaFile
 * This is a Sabre based implementation of a file living in the /meta resource.
 *
 * @package OCA\DAV\Meta
 */
class MetaFile extends File implements ICopySource, IFileNode, IProvidesAdditionalHeaders {

	/** @var \OCP\Files\File */
	private $file;

	/**
	 * MetaFolder constructor.
	 *
	 * @param \OCP\Files\File $file
	 */
	public function __construct(\OCP\Files\File $file) {
		$this->file = $file;
	}

	/**
	 * @inheritdoc
	 */
	public function getName() {
		return $this->file->getName();
	}

	/**
	 * @inheritdoc
	 */
	public function getSize() {
		return $this->file->getSize();
	}

	/**
	 * @inheritdoc
	 */
	public function get() {
		return $this->file->fopen('r');
	}

	/**
	 * @inheritdoc
	 */
	public function getContentType() {
		return $this->file->getMimeType();
	}

	/**
	 * @inheritdoc
	 */
	public function getLastModified() {
		return $this->file->getMTime();
	}

	/**
	 * @inheritdoc
	 */
	public function getETag() {
		return $this->file->getEtag();
	}

	/**
	 * @inheritdoc
	 */
	public function copy($path) {
		if ($this->file instanceof MetaFileVersionNode) {
			return $this->file->copy($path);
		}
		return false;
	}

	/**
	 * @return array
	 */
	public function getHeaders() {
		if ($this->file instanceof \OCP\Files\IProvidesAdditionalHeaders) {
			return $this->file->getHeaders();
		}
		return [];
	}

	/**
	 * @return string
	 */
	public function getContentDispositionFileName() {
		if ($this->file instanceof \OCP\Files\IProvidesAdditionalHeaders) {
			return $this->file->getContentDispositionFileName();
		}
		return $this->getName();
	}

	/**
	 * @return Node
	 */
	public function getNode() {
		return $this->file;
	}
}
