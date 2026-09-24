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
			if (!\is_resource($stream)) {
				// stream_get_contents() below cannot report this: on PHP 7.4 it warns and
				// hands on false, which the prefix check then turns into a bare XML
				// declaration and Imagick rejects, so the failure is only ever visible as a
				// warning plus a decoder error about content that was never read. (On PHP 8
				// the same call raises a TypeError, an \Error that escapes the handler
				// underneath rather than degrading to no preview.) Not a === false check:
				// View::fopen() returns null for a path isForbiddenFileOrDir() rejects and
				// for one Filesystem::resolvePath() finds no storage for, and that reaches
				// stream_get_contents() just as badly.
				\OCP\Util::writeLog('core', 'Could not open ' . $file->getPath() . ' for a preview', \OCP\Util::ERROR);
				return false;
			}

			try {
				$content = \stream_get_contents($stream);
			} finally {
				// the read itself can throw from the wrapper stack - the encryption module
				// does, on a corrupt or missing key - and that is caught below, so without
				// this the descriptor and the view's shared lock would both be held on
				\fclose($stream);
			}

			if (\strpos($content, '<?xml') !== 0) {
				$content = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>' . $content;
			}

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
			# coder, so both have to be set - setImageFormat() alone would leave the
			# loadFromData($imagick) below, which stringifies the wand through
			# getImageBlob(), re-encoding back to SVG instead of PNG.
			$imagick->setImageFormat('png32');
			$imagick->setFormat('png32');
		} catch (\Exception $e) {
			\OCP\Util::writeLog('core', $e->getmessage(), \OCP\Util::ERROR);
			return false;
		}

		//new image object
		$image = new \OC_Image();
		$image->loadFromData($imagick);
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
