<?php
/**
 * @author Georg Ehrke <georg@owncloud.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Olivier Paroz <github@oparoz.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

class SVG implements IProvider2 {
	/**
	 * {@inheritDoc}
	 */
	public function getMimeType() {
		return '/image\/svg\+xml/';
	}

	/**
	 * {@inheritDoc}
	 */
	public function getThumbnail(File $file, $maxX, $maxY, $scalingUp) {
		try {
			$svg = new \Imagick();
			$svg->setBackgroundColor(new \ImagickPixel('transparent'));

			$stream = $file->fopen('r');
			$content = \stream_get_contents($stream);
			if (\substr($content, 0, 5) !== '<?xml') {
				$content = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>' . $content;
			}
			\fclose($stream);

			// Do not parse SVG files with references
			if (\stripos($content, 'xlink:href') !== false) {
				return false;
			}

			$svg->readImageBlob($content);
			$svg->setImageFormat('png32');
		} catch (\Exception $e) {
			\OCP\Util::writeLog('core', $e->getmessage(), \OCP\Util::ERROR);
			return false;
		}

		//new image object
		$image = new \OC_Image();
		$image->loadFromData($svg);
		//check if image object is valid
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
}
