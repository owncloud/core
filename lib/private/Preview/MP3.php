<?php
/**
 * @author Georg Ehrke <georg@owncloud.com>
 * @author Hendrik Leppelsack <hendrik@leppelsack.de>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Olivier Paroz <github@oparoz.com>
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

use ID3Parser\ID3Parser;
use OCP\Files\File;
use OCP\Files\FileInfo;
use OCP\Preview\IProvider2;

class MP3 implements IProvider2 {
	/**
	 * {@inheritDoc}
	 */
	public function getMimeType() {
		return '/audio\/mpeg/';
	}

	/**
	 * {@inheritDoc}
	 */
	public function getThumbnail(File $file, $maxX, $maxY, $scalingUp) {
		$useFileDirectly = (!$file->isEncrypted() && !$file->isMounted());
		if ($useFileDirectly) {
			$absPath = $file->getStorage()->getLocalFile($file->getInternalPath());
		} else {
			$absPath = \OC::$server->getTempManager()->getTemporaryFile();

			$handle = $file->fopen('rb');
			\file_put_contents($absPath, $handle);
			\fclose($handle);
		}

		$getID3 = new ID3Parser();
		$tags = $getID3->analyze($absPath);

		$picture = isset($tags['id3v2']['APIC'][0]['data']) ? $tags['id3v2']['APIC'][0]['data'] : null;
		if ($picture === null && isset($tags['id3v2']['PIC'][0]['data'])) {
			$picture = $tags['id3v2']['PIC'][0]['data'];
		}

		if ($picture !== null) {
			$image = new \OC_Image();
			$image->loadFromData($picture);

			if ($image->valid()) {
				$image->scaleDownToFit($maxX, $maxY);

				return $image;
			}
		}

		return $this->getNoCoverThumbnail();
	}

	/**
	 * Generates a default image when the file has no cover
	 *
	 * @return bool|\OCP\IImage false if the default image is missing or invalid
	 */
	private function getNoCoverThumbnail() {
		$icon = \OC::$SERVERROOT . '/core/img/filetypes/audio.svg';

		if (!\file_exists($icon)) {
			return false;
		}

		$image = new \OC_Image();
		$image->loadFromFile($icon);
		return $image->valid() ? $image : false;
	}

	/**
	 * @inheritdoc
	 */
	public function isAvailable(FileInfo $file) {
		return true;
	}
}
