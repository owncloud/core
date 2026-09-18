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

use OC\Image\ImagickFactory;
use OCP\Files\File;
use OCP\Files\FileInfo;
use OCP\Preview\IProvider2;
use Rhukster\DomSanitizer\DOMSanitizer;

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
			$imagick = ImagickFactory::create();
			$imagick->setBackgroundColor(new \ImagickPixel('transparent'));

			$stream = $file->fopen('r');
			$content = \stream_get_contents($stream);
			if (\strpos($content, '<?xml') !== 0) {
				$content = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>' . $content;
			}
			\fclose($stream);

			# sanitize SVG content
			$output = self::sanitizeSVGContent($content);
			if ($output === null) {
				return false;
			}

			# Pin the coder so Imagick's own content-sniffing cannot pick a different one
			# than the svg:sanitize/embed/decode options set by ImagickFactory assume.
			# Guarded, unlike Bitmap.php: a build that registers no SVG coder cannot be
			# pinned to it and cannot decode SVG at all either way, and $output here is
			# already DOMSanitizer's serialized output rather than the raw file bytes.
			if (\count(\Imagick::queryFormats('SVG')) > 0) {
				$imagick->setFormat('SVG');
			}
			$imagick->readImageBlob($output);

			# setFormat() above pins the wand's *output* format as well as the input
			# coder, so both have to be set - setImageFormat() alone would leave
			# getImageBlob() below re-encoding back to SVG instead of PNG.
			$imagick->setImageFormat('png32');
			$imagick->setFormat('png32');
		} catch (\Exception $e) {
			\OCP\Util::writeLog('core', $e->getmessage(), \OCP\Util::ERROR);
			return false;
		}

		//new image object
		$image = new \OC_Image();
		$image->loadFromData($imagick->getImageBlob());
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

	public static function sanitizeSVGContent(string $content): ?string {
		$sanitizer = new DOMSanitizer(DOMSanitizer::SVG);
		$sanitizer->addDisallowedTags(['image']);
		$sanitizer->addDisallowedAttributes(['xlink:href']);
		$sanitized_content = $sanitizer->sanitize($content);

		// XML errors are expected here if the SVG is malformed
		\libxml_clear_errors();

		if (!\is_string($sanitized_content)) {
			return null;
		}

		return $sanitized_content;
	}
}
