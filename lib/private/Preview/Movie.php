<?php
/**
 * @author Georg Ehrke <georg@owncloud.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Olivier Paroz <github@oparoz.com>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 * @author Lorenzo Perone <lorenzo.perone@yellowspace.net>
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

class Movie implements IProvider2 {
	public static $avconvBinary;
	public static $ffmpegBinary;
	public static $atomicParsleyBinary;

	/**
	 * Keep track of movies without artwork to avoid retries in same request
	 * @var array
	 */
	private $noArtworkIndex = [];

	/**
	 * {@inheritDoc}
	 */
	public function getMimeType() {
		return '/video\/.*/';
	}

	/**
	 * {@inheritDoc}
	 */
	public function getThumbnail(File $file, $maxX, $maxY, $scalingUp) {
		// TODO: use proc_open() and stream the source file ?

		$useFileDirectly = (!$file->isEncrypted() && !$file->isMounted());
		if ($useFileDirectly) {
			$absPath = $file->getStorage()->getLocalFile($file->getInternalPath());
		} else {
			$absPath = \OC::$server->getTempManager()->getTemporaryFile();

			$handle = $file->fopen('rb');

			// we better use 5MB (1024 * 1024 * 5 = 5242880) instead of 1MB.
			// in some cases 1MB was no enough to generate thumbnail
			$firstmb = \stream_get_contents($handle, 5242880);
			\file_put_contents($absPath, $firstmb);
			\fclose($handle);
		}

		$result = $this->generateThumbNail($maxX, $maxY, $absPath, 5);
		if ($result === false) {
			$result = $this->generateThumbNail($maxX, $maxY, $absPath, 1);
			if ($result === false) {
				$result = $this->generateThumbNail($maxX, $maxY, $absPath, 0);
			}
		}

		if (!$useFileDirectly) {
			\unlink($absPath);
		}

		return $result;
	}

	/**
	 * @param $absPath
	 * @return bool|string
	 */
	private function extractMp4CoverArtwork($absPath) {
		if (isset($this->noArtworkIndex[$absPath])) {
			return false;
		}

		if (self::$atomicParsleyBinary) {
			$suffix = \substr($absPath, -4);
			if (\strtolower($suffix) === '.mp4') {
				$tmpFolder = \OC::$server->getTempManager()->getTemporaryFolder();
				$tmpBase = $tmpFolder.'/Cover';
				$cmd = self::$atomicParsleyBinary . ' ' .
					\escapeshellarg($absPath).
					' --extractPixToPath ' . \escapeshellarg($tmpBase) .
					' > /dev/null 2>&1';

				\exec($cmd, $output, $returnCode);

				if ($returnCode === 0) {
					$endings = ['.jpg', '.png'];
					foreach ($endings as $ending) {
						$extractedFile = $tmpBase.'_artwork_1'.$ending;
						if (\is_file($extractedFile) &&
							\filesize($extractedFile) > 0) {
							return $extractedFile;
						}
					}
				}
			}
		}
		$this->noArtworkIndex[$absPath] = true;
		return false;
	}

	/**
	 * @param $absPath
	 * @param $second
	 * @return bool|string
	 */
	private function generateFromMovie($absPath, $second) {
		$tmpPath = \OC::$server->getTempManager()->getTemporaryFile();

		if (self::$avconvBinary) {
			$cmd = self::$avconvBinary . ' -y -ss ' . \escapeshellarg($second) .
				' -i ' . \escapeshellarg($absPath) .
				' -an -f mjpeg -vframes 1 -vsync 1 ' . \escapeshellarg($tmpPath) .
				' > /dev/null 2>&1';
		} else {
			$cmd = self::$ffmpegBinary . ' -y -ss ' . \escapeshellarg($second) .
				' -i ' . \escapeshellarg($absPath) .
				' -f mjpeg -vframes 1' .
				' ' . \escapeshellarg($tmpPath) .
				' > /dev/null 2>&1';
		}

		\exec($cmd, $output, $returnCode);

		if ($returnCode === 0) {
			return $tmpPath;
		}

		return false;
	}

	/**
	 * @param int $maxX
	 * @param int $maxY
	 * @param string $absPath
	 * @param int $second
	 * @return bool|\OCP\IImage
	 */
	private function generateThumbNail($maxX, $maxY, $absPath, $second) {
		$extractedCover = $this->extractMp4CoverArtwork($absPath);
		if ($extractedCover !== false) {
			$tmpPath = $extractedCover;
		} else {
			$tmpPath = $this->generateFromMovie($absPath, $second);
		}

		if (\is_string($tmpPath) && \is_file($tmpPath)) {
			$image = new \OC_Image();
			$image->loadFromFile($tmpPath);
			\unlink($tmpPath);
			if ($image->valid()) {
				$image->scaleDownToFit($maxX, $maxY);
				return $image;
			}
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
