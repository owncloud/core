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
		if ($stream === false) {
			// stream_get_contents() below would raise a TypeError, which is an \Error and
			// so would escape the handler underneath rather than degrade to no preview
			Util::writeLog('core', 'Could not open ' . $file->getPath() . ' for a preview', Util::ERROR);
			return false;
		}

		// Creates \Imagick object from bitmap or vector file
		try {
			$bp = $this->getResizedPreview($stream, $maxX, $maxY, $file->getMimeType());
		} catch (\Exception $e) {
			Util::writeLog('core', 'ImageMagick says: ' . $e->getmessage(), Util::ERROR);
			return false;
		} finally {
			// also on the failure path: any content ImageMagick has no coder for lands
			// here, so leaking the handle would be routine rather than exceptional
			\fclose($stream);
		}

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
	 * @param string $mimeType the file's own detected mime type, used to pin the
	 *   Imagick coder so it cannot be redirected by the file's actual content
	 *
	 * @return Imagick
	 */
	private function getResizedPreview($stream, int $maxX, int $maxY, string $mimeType): Imagick {
		$content = \stream_get_contents($stream);

		if ($this->isDangerousToDecode($content)) {
			throw new \RuntimeException('Refusing to decode text-based content for a bitmap preview');
		}

		$bp = ImagickFactory::create();

		# Pin the coder instead of letting Imagick's own content-sniffing pick one:
		# reading with no format set re-derives the format from a ~130-entry magic
		# table independently of isDangerousToDecode()'s check above, so content that
		# looks like PostScript/PDF (which that check must allow through for the
		# Postscript/PDF providers) would otherwise reach the Ghostscript delegate via
		# any Bitmap provider, not just those two.
		#
		# Deliberately not guarded by queryFormats(): if this build does not register
		# the coder, throwing here is correct - the only alternative is falling back to
		# the content-sniffing this pin exists to prevent.
		$bp->setFormat($this->getImagickFormat($mimeType));
		$bp->readImageBlob($content);

		# setIteratorIndex(0) will make previews to be generated from the first page
		$bp->setIteratorIndex(0);

		$bp = $this->resize($bp, $maxX, $maxY);

		# setFormat() above pins the wand's *output* format as well as the input coder,
		# so both have to be set here. setImageFormat() alone would leave getThumbnail()'s
		# (string) cast re-encoding back to the pinned input format instead of PNG.
		$bp->setImageFormat('png');
		$bp->setFormat('png');

		return $bp;
	}

	/**
	 * Maps this provider's own detected mime type(s) to the Imagick coder name that
	 * must decode them - the format pinned in getResizedPreview() above.
	 *
	 * $mimeType comes from $file->getMimeType(), deliberately not from the type that
	 * selected this provider (OC\Preview::$mimeType). Those two can differ, because
	 * callers may override the selection type via getThumbnail(['mimeType' => ...]) -
	 * apps/files_trashbin/ajax/preview.php does, and apps/dav passes the request's query
	 * parameters straight through. The file's own type cannot be steered by a request,
	 * which is the property the pin depends on.
	 *
	 * The consequence is that an implementation must cope with a mime type it does not
	 * serve: a trashed file reports application/octet-stream, because the .d<timestamp>
	 * suffix defeats extension-based detection. Returning a constant handles that
	 * correctly. Do NOT "fix" the divergence by rejecting a $mimeType that fails this
	 * provider's own getMimeType() regex - that rejects every trashbin preview.
	 */
	abstract protected function getImagickFormat(string $mimeType): string;

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
