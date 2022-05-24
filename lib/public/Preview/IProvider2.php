<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
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
namespace OCP\Preview;

use OCP\Files\File;
use OCP\Files\FileInfo;

/**
 * Interface IProvider2
 *
 * @package OCP\Preview
 * @since 10.0.9
 */
interface IProvider2 {
	/**
	 * @return string Regex with the mimetypes that are supported by this provider
	 * @since 10.0.9
	 */
	public function getMimeType();

	/**
	 * Check if a preview can be generated for $path
	 *
	 * @param FileInfo $file
	 * @return bool
	 * @since 10.0.9
	 */
	public function isAvailable(FileInfo $file);

	/**
	 * get thumbnail for file at path $path
	 *
	 * @param File $file Path of file
	 * @param int $maxX The maximum X size of the thumbnail. It can be smaller depending on the shape of the image
	 * @param int $maxY The maximum Y size of the thumbnail. It can be smaller depending on the shape of the image
	 * @param bool $scalingUp Disable/Enable upscaling of previews
	 * @return bool|\OCP\IImage false if no preview was generated
	 * @since 10.0.9
	 */
	public function getThumbnail(File $file, $maxX, $maxY, $scalingUp);
}
