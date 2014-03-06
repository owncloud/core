<?php
/**
 * Copyright (c) 2013 Frank Karlitschek frank@owncloud.org
 * Copyright (c) 2013 Georg Ehrke georg@ownCloud.com
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */
namespace OC\Preview;

class Image extends Provider {

	public function getMimeType() {
		return '/image\/.*/';
	}

	public function getThumbnail($path, $maxX, $maxY, $scalingup, $fileview) {
		//get fileinfo
		$fileInfo = $fileview->getFileInfo($path);
		if(!$fileInfo) {
			return false;
		}

		$stream = $fileview->fopen($path, 'r');
		$image = new \OC_Image();
		$image->loadFromFileHandle($stream);

		if ($image->valid() === false && extension_loaded('imagick')) {
			rewind($stream);

			$imagick = new \Imagick();
			$mimeType = $fileInfo->getMimeType();

			if(strpos($mimeType, '/')) {
				list($part, $type) = explode('/', $mimeType);
				if(count($imagick->queryFormats(strtoupper($type))) === 1) {
					$imagick->readImageFile($stream);
					$imagick->setImageFormat('png32');

					$image->loadFromData($imagick);
				}
			}
		}

		fclose($stream);

		return $image->valid() ? $image : false;
	}
}

\OC\Preview::registerProvider('OC\Preview\Image');