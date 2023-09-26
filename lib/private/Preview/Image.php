<?php
/**
 * @author Georg Ehrke <georg@owncloud.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author josh4trunks <joshruehlig@gmail.com>
 * @author Olivier Paroz <github@oparoz.com>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Thomas Tanghus <thomas@tanghus.net>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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
namespace OC\Preview;

use OCP\Files\File;
use OCP\Files\FileInfo;
use OCP\Preview\IProvider2;

abstract class Image implements IProvider2 {
	/**
	 * {@inheritDoc}
	 */
	public function getThumbnail(File $file, $maxX, $maxY, $scalingUp) {
		$maxSizeForImages = \OC::$server->getConfig()->getSystemValue('preview_max_filesize_image', 50);
		$size = $file->getSize();

		if ($maxSizeForImages !== -1 && $size > ($maxSizeForImages * 1024 * 1024)) {
			return false;
		}

		$image = new \OC_Image();
		$handle = $file->fopen('r');
		$image->loadFromFileHandle($handle);
		$image->fixOrientation();
		if (!$this->validateImageDimensions($image)) {
			return false;
		}

		if (\is_resource($handle)) {
			\fclose($handle);
		}

		if ($image->valid()) {
			$image->scaleDownToFit($maxX, $maxY);

			return $image;
		}
		return false;
	}

	/**
	 * @inheritdoc
	 */
	public function isAvailable(FileInfo $file) {
		return true;
	}

	private function validateImageDimensions(\OC_Image $image): bool {
		[$width, $height] = $this->getMaxDimensions();
		return !($image->width() > $width || $image->height() > $height);
	}

	private function getMaxDimensions(): array {
		// 24 MP - 6016 x 4000
		$maxDimension = \OC::$server->getConfig()->getSystemValue('preview_max_dimensions', '6016x4000');
		$exploded = explode('x', strtolower($maxDimension));
		if ($exploded === false || \count($exploded) !== 2) {
			return [6016, 4000];
		}
		[$w, $h] = $exploded;
		if (is_numeric($w) && is_numeric($h)) {
			return [(int)$w, (int)$h];
		}

		return [6016, 4000];
	}
}
