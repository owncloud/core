<?php

namespace OC\Image;

use Imagick;
use ImagickException;

class ImagickFactory {
	/**
	 * @param mixed $files <p>
	 * The path to an image to load or an array of paths. Paths can include
	 * wildcards for file names, or can be URLs.
	 * </p>
	 * @return Imagick
	 * @throws ImagickException
	 */
	public static function create($files = null): Imagick {
		$imagick = new Imagick($files);
		$imagick->setOption('svg:sanitize', 'true');
		$imagick->setOption('svg:embed', 'false');
		$imagick->setOption('svg:decode', 'true');
		return $imagick;
	}

}
