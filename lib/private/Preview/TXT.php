<?php
/**
 * @author Georg Ehrke <georg@owncloud.com>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Nmz <nemesiz@nmz.lt>
 * @author Robin Appelman <icewind@owncloud.com>
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

class TXT implements IProvider2 {
	/**
	 * {@inheritDoc}
	 */
	public function getMimeType() {
		return '/text\/plain/';
	}

	/**
	 * {@inheritDoc}
	 */
	public function getThumbnail(File $file, $maxX, $maxY, $scalingUp) {
		$stream = $file->fopen('r');
		$content = \stream_get_contents($stream, 3000);
		\fclose($stream);

		//don't create previews of empty text files
		if (\trim($content) === '') {
			return false;
		}

		$lines = \preg_split("/\r\n|\n|\r/", $content);

		$fontSize = ($maxX) ? (int) ((5 / 32) * $maxX) : 5; //5px
		$lineSize = \ceil($fontSize * 1.25);

		$image = \imagecreate($maxX, $maxY);
		\imagecolorallocate($image, 255, 255, 255);
		$textColor = \imagecolorallocate($image, 0, 0, 0);

		/**
		 * We cut the string to 10 chars, to process font detection faster
		 */
		$fontFile = $this->getFontFile(\mb_substr($content, 0, 10));

		$canUseTTF = \function_exists('imagettftext');

		foreach ($lines as $index => $line) {
			$index = $index + 1;

			$x = (int) 1;
			$y = (int) ($index * $lineSize);

			if ($canUseTTF === true) {
				\imagettftext($image, $fontSize, 0, $x, $y, $textColor, $fontFile, $line);
			} else {
				$y -= $fontSize;
				\imagestring($image, 1, $x, $y, $line, $textColor);
			}

			if (($index * $lineSize) >= $maxY) {
				break;
			}
		}

		$image = new \OC_Image($image);

		return $image->valid() ? $image : false;
	}

	/**
	 * @inheritdoc
	 */
	public function isAvailable(FileInfo $file) {
		return $file->getSize() > 0;
	}

	/**
	 * Determine which font will be used
	 *
	 * @param string $text
	 * @return string
	 */
	public function getFontFile(string $text): string {
		$fontFileDir  = __DIR__;
		$fontFileDir .= '/../../../core/fonts/';

		/**
		 * Note: Since chinese and japanese share letters it might be possible
		 * that the language will be mistaken.
		 *
		 * While using different charsets, the preview might not be rendered
		 * correctly
		 */

		if ($this->isChinese($text)) {
			return $fontFileDir.'NotoSansCJKsc/NotoSansMonoCJKsc-Regular.otf';
		}

		if ($this->isJapanese($text)) {
			return $fontFileDir.'NotoSansCJKjp/NotoSansMonoCJKjp-Regular.otf';
		}

		if ($this->isKorean($text)) {
			return $fontFileDir.'NotoSansCJKkr/NotoSansMonoCJKkr-Regular.otf';
		}

		if ($this->isDevanagari($text)) {
			return $fontFileDir.'NotoSansDevanagari/NotoSansDevanagari-Regular.ttf';
		}

		if ($this->isArabic($text)) {
			return $fontFileDir.'NotoSansArabic/NotoSansArabic-Regular.ttf';
		}

		return $fontFileDir.'NotoSans/NotoSans-Regular.ttf';
	}

	/**
	 * Detect whether string contains Chinese letters
	 *
	 * @param string $text
	 * @return bool
	 */
	public function isChinese(string $text): bool {
		return preg_match("/\p{Han}+/u", $text);
	}

	/**
	 * Detect whether string contains Japanese letters
	 *
	 * https://jrgraphix.net/r/Unicode/3040-309F is Hiragana characters
	 * https://jrgraphix.net/r/Unicode/30A0-30FF is Katakana characters
	 * https://jrgraphix.net/r/Unicode/4E00-9FFF has CJK Unified Ideographs
	 *
	 * @param string $text
	 * @return bool
	 */
	public function isJapanese(string $text): bool {
		return preg_match('/[\x{4E00}-\x{9FBF}\x{3040}-\x{309F}\x{30A0}-\x{30FF}]/u', $text);
	}

	/**
	 * Detect whether string contains Korean letters
	 *
	 * https://jrgraphix.net/r/Unicode/3130-318F is Hangul Compatibility Jamo
	 * https://jrgraphix.net/r/Unicode/AC00-D7AF is Hangul Syllables
	 *
	 * @param string $text
	 * @return bool
	 */
	public function isKorean(string $text): bool {
		return preg_match('/[\x{3130}-\x{318F}\x{AC00}-\x{D7AF}]/u', $text);
	}

	/**
	 * Detect whether string contains Devanagari letters (Hindi, Nepali and similar)
	 *
	 * https://jrgraphix.net/r/Unicode/0900-097F is the Devanagari characters
	 *
	 * @param string $text
	 * @return bool
	 */
	public function isDevanagari(string $text): bool {
		return preg_match('/[\x{0900}-\x{097F}]/u', $text);
	}

	/**
	 * Detect whether string contains Arabic letters
	 *
	 * https://jrgraphix.net/r/Unicode/0600-06FF is Arabic
	 *
	 * @param string $text
	 * @return bool
	 */
	public function isArabic($subject) {
		return (preg_match('/[\x{0600}-\x{06FF}]/u', $subject) > 0);
	}
}
