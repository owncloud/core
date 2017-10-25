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


use OCP\Files\Folder;
use Sabre\DAV\Collection;
use Sabre\DAV\File;

class MetaFile extends File {

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
	function getName() {
		return $this->file->getName();
	}

	/**
	 * @inheritdoc
	 */
	function getSize() {
		return $this->file->getSize();
	}

	public function get() {
		// FIXME: use fopen and return the stream
		return $this->file->getContent();
	}
}
