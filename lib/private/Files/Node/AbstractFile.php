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

namespace OC\Files\Node;

use OCP\Files\FileInfo;
use OCP\Files\NotPermittedException;

class AbstractFile extends AbstractNode implements \OCP\Files\File {

	/**
	 * @inheritdoc
	 */
	public function getContent() {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function putContent($data) {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function fopen($mode) {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function hash($type, $raw = false) {
		throw new NotPermittedException();
	}

	/**
	 * @inheritdoc
	 */
	public function getMimetype() {
		return 'application/octet-stream';
	}

	/**
	 * @inheritdoc
	 */
	public function getType() {
		return FileInfo::TYPE_FILE;
	}
}
