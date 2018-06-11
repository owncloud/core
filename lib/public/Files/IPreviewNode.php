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

namespace OCP\Files;

use OCP\IImage;

/**
 * Interface IPreviewNode - a node which can generate a preview will implement
 * this interface.
 *
 * @package OCP\Files
 * @since 10.0.9
 */
interface IPreviewNode {

	/**
	 * Generates a preview image of the node
	 *
	 * @param array $options
	 * @return IImage
	 * @since 10.0.9
	 */
	public function getThumbnail($options);
}
