<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
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

use Imagick;
use OC\Image\ImagickFactory;
use OC\Preview;
use OCP\Files\File;
use OCP\Files\FileInfo;
use OCP\Preview\IProvider2;
use OCP\Util;

/**
 * Creates a PNG preview using ImageMagick via the PECL extension
 *
 * @package OC\Preview
 */
abstract class Bitmap implements IProvider2 {
	/**
	 * {@inheritDoc}
	 */
	public function getThumbnail(File $file, $maxX, $maxY, $scalingUp) {
		if (Preview::isImageFileSizeTooBig($file)) {
			return false;
		}
		$stream = $file->fopen('r');

		// Creates \Imagick object from bitmap or vector file
		try {
			$bp = $this->getResizedPreview($stream, $maxX, $maxY);
		} catch (\Exception $e) {
			Util::writeLog('core', 'ImageMagick says: ' . $e->getmessage(), Util::ERROR);
			return false;
		}

		\fclose($stream);

		//new bitmap image object
		$image = new \OC_Image();
		$image->loadFromData((string)$bp);
		//check if image object is valid
		return $image->valid() ? $image : false;
	}

	/**
	 * @inheritdoc
	 */
	public function isAvailable(FileInfo $file) {
		return true;
	}

	/**
	 * Returns a preview of maxX times maxY dimensions in PNG format
	 *
	 *    * The default resolution is already 72dpi, no need to change it for a bitmap output
	 *    * It's possible to have proper colour conversion using profileimage().
	 *    ICC profiles are here: http://www.color.org/srgbprofiles.xalter
	 *    * It's possible to Gamma-correct an image via gammaImage()
	 *
	 * @param resource $stream the handle of the file to convert
	 * @param int $maxX
	 * @param int $maxY
	 *
	 * @return Imagick
	 */
	private function getResizedPreview($stream, int $maxX, int $maxY): Imagick {
		$content = \stream_get_contents($stream);

		if ($this->isDangerousToDecode($content)) {
			throw new \RuntimeException('Refusing to decode text-based content for a bitmap preview');
		}

		$bp = ImagickFactory::create();

		# setIteratorIndex(0) will make previews to be generated from the first page
		$bp->readImageBlob($content);
		$bp->setIteratorIndex(0);

		$bp = $this->resize($bp, $maxX, $maxY);

		$bp->setImageFormat('png');

		return $bp;
	}

	/**
	 * Bitmap providers must never hand text-based content (SVG, XML, or any other
	 * text/* type, e.g. a raw MVG script) to Imagick::readImageBlob() - ImageMagick's
	 * text/vector coders can be abused to read and write arbitrary files.
	 */
	private function isDangerousToDecode(string $content): bool {
		$mimeType = \OC::$server->getMimeTypeDetector()->detectString($content);
		$mimeType = \strtolower(\trim(\explode(';', $mimeType, 2)[0]));

		// libmagic reports "image/svg" without the "+xml" suffix on some PHP/OS builds
		if (\strpos($mimeType, 'text/') === 0 || \strpos($mimeType, 'image/svg') === 0) {
			return true;
		}

		return \in_array($mimeType, ['application/xml', 'image/x-mvg'], true);
	}

	/**
	 * Returns a resized \Imagick object
	 *
	 * If you want to know more on the various methods available to resize an
	 * image, check out this link : @link https://stackoverflow.com/questions/8517304/what-the-difference-of-sample-resample-scale-resize-adaptive-resize-thumbnail-im
	 *
	 * @param \Imagick $bp
	 * @param int $maxX
	 * @param int $maxY
	 *
	 * @return \Imagick
	 */
	private function resize($bp, $maxX, $maxY) {
		list($previewWidth, $previewHeight) = \array_values($bp->getImageGeometry());

		// We only need to resize a preview which doesn't fit in the maximum dimensions
		if ($previewWidth > $maxX || $previewHeight > $maxY) {
			// TODO: LANCZOS is the default filter, CATROM could bring similar results faster
			$bp->resizeImage($maxX, $maxY, imagick::FILTER_LANCZOS, 1, true);
		}

		return $bp;
	}
}
