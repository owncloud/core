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
use OC\Utf8Analyzer;

class TXT implements IProvider2 {
	private $utf8Analyzer;

	public function __construct() {
		$this->utf8Analyzer = new Utf8Analyzer();
	}
	/**
	 * {@inheritDoc}
	 */
	public function getMimeType() {
		return '/text\/plain/';
	}

	/**
	 * {@inheritDoc}
	 *
	 * Note that the thumbnail might show "squared characters" if multiple scripts (Arabic,
	 * Japanese, etc) are present in the text that will be shown in the preview.
	 */
	public function getThumbnail(File $file, $maxX, $maxY, $scalingUp) {
		$stream = $file->fopen('r');
		$content = \stream_get_contents($stream, 2048);
		\fclose($stream);

		//don't create previews of empty text files
		if (\trim($content) === '') {
			return false;
		}

		$analyzerOpts = ['count', 'lines'];
		$info = $this->utf8Analyzer->analyzeString($content, $analyzerOpts);

		$fontSizePixels = ($maxX) ? (int) ((4 / 32) * $maxX) : 4;  //4px
		$fontSizePoints = $fontSizePixels * 0.75;  // 3pt = 4px
		$lineSize = \ceil($fontSizePixels * 1.25);

		$image = \imagecreate($maxX, $maxY);
		\imagecolorallocate($image, 255, 255, 255);
		$textColor = \imagecolorallocate($image, 0, 0, 0);

		$canUseTTF = \function_exists('imagettftext');
		if ($canUseTTF) {
			// FIXME: We'll only use a font based on the characters detected. In case the characters
			// contain multiple scripts (Arabic, Japanese, etc), not all characters will be shown
			// in the preview.
			$fontFile = $this->getFontFile($info);
		}

		foreach ($info['lines']['lines'] as $index => $line) {
			$index = $index + 1;

			$x = (int) 1;
			$y = (int) ($index * $lineSize);

			if ($canUseTTF === true) {
				$charsInLine = \count($line);
				$initialNChars = ceil($maxX / $fontSizePixels);  // initial estimation for the number of chars we want to draw
				$nChars = 0;
				do {
					$nChars += $initialNChars;
					$printLine = \implode('', \array_slice($line, 0, $nChars));
					// check the bounding box, it might be smaller than the initial estimation, so it
					// might be possible to fit more chars in the image
					$bbox = \imagettfbbox($fontSizePoints, 0, $fontFile, $printLine);
					$bboxWidth = $bbox[2] - $bbox[0];
				} while ($bboxWidth < $maxX && $nChars < $charsInLine);
				\imagettftext($image, $fontSizePoints, 0, $x, $y, $textColor, $fontFile, $printLine);
			} else {
				$y -= $fontSizePixels;
				$printLine = \implode('', \array_slice($line, 0, $nChars));
				\imagestring($image, 1, $x, $y, $printLine, $textColor);
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
	 * @param array $info the information coming from the utf8Analyzer. Information of the
	 * "count" processor of the utf8Analyzer is required.
	 * @return string the chosen font file
	 */
	private function getFontFile(array $info): string {
		$fontFileDir  = __DIR__;
		$fontFileDir .= '/../../../core/fonts/';

		$fontSet = [
			'Han' => 'NotoSansCJKsc/NotoSansMonoCJKsc-Regular.otf',  // chinese
			'Hiragana' => 'NotoSansCJKjp/NotoSansMonoCJKjp-Regular.otf',  // japanese
			'Katakana' => 'NotoSansCJKjp/NotoSansMonoCJKjp-Regular.otf',  // japanese
			'Hangul' => 'NotoSansCJKkr/NotoSansMonoCJKkr-Regular.otf',  // korean
			'Devanagari' => 'NotoSansDevanagari/NotoSansDevanagari-Regular.ttf',  // devanagari
			'Arabic' => 'NotoSansArabic/NotoSansArabic-Regular.ttf',  // arabic
			'Latin' => 'NotoSans/NotoSans-Regular.ttf',  // latin
		];

		$countInfo = $info['count'];
		\uasort($countInfo, function ($a, $b) {
			if ($a === $b) {
				return 0;
			}
			return ($a < $b) ? 1 : -1;
		});
		// Information is ordered by counted chars, from highest number of counted chars to lowest.
		foreach ($countInfo as $key => $value) {
			if (!isset($fontSet[$key])) {
				continue;  // we don't have a specific font for it, so check the next
			}

			if ($key === 'Han') {
				if (isset($countInfo['Hiragana']) || isset($countInfo['Katakana'])) {
					// if there are Hiragana or Katakana chars, prioritize japanese instead of chinese
					// (font is the same for Hiragana and Katakana)
					$font = $fontSet['Hiragana'];
				} else {
					$font = $fontSet['Han'];
				}
			} else {
				$font = $fontSet[$key];
			}

			break;  // we're only interested in the most used script. Once we've chosen a font, we're done
		}

		// we might not have chosen a font yet (latin or greek text, for example), so use a
		// default one
		$finalFont = $font ?? 'NotoSans/NotoSans-Regular.ttf';
		return "{$fontFileDir}{$finalFont}";
	}
}
