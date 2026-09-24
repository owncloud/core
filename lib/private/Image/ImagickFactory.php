<?php

namespace OC\Image;

use Imagick;
use ImagickException;

class ImagickFactory {
	/**
	 * Returns an Imagick instance with the hardened SVG options already applied.
	 *
	 * @param string|null $file path of an image to read, optionally prefixed with an
	 *   explicit "FORMAT:" to pin the input coder. Left null, nothing is read and the
	 *   caller decodes itself.
	 * @return Imagick
	 * @throws ImagickException
	 */
	public static function create(?string $file = null): Imagick {
		// Deliberately not "new Imagick($file)": the constructor reads immediately, so the
		// options below would only be applied to an already decoded image. That is exactly
		// what the path-taking form used to do, leaving it the one unhardened way in.
		$imagick = new Imagick();
		$imagick->setOption('svg:sanitize', 'true');
		$imagick->setOption('svg:embed', 'false');
		$imagick->setOption('svg:decode', 'true');

		if ($file !== null) {
			// A "FORMAT:path" argument pins the input coder here just as it does in the
			// constructor, and - unlike setFormat() - it does not pin the wand's output
			// format as well, so callers still only need setImageFormat(). Verified
			// against Office's "PDF:<path>[0]": identical geometry and bytes to the
			// constructor form, and a foreign image pinned to PDF is still rejected.
			$imagick->readImage($file);
		}

		return $imagick;
	}

}
