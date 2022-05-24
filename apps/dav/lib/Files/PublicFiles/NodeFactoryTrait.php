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

use OCP\Files\File;
use OCP\Files\Folder;
use OCP\Files\Node;
use OCP\Share\IShare;

/**
 * Trait NodeFactoryTrait
 *
 * @package OCA\DAV\Files\PublicFiles
 */
trait NodeFactoryTrait {
	private function nodeFactory(Node $node, IShare $share) {
		if ($node instanceof Folder) {
			return new SharedFolder($node, $share);
		}
		if ($node instanceof File) {
			return new SharedFile($node, $share);
		}
		throw new \InvalidArgumentException();
	}
}
