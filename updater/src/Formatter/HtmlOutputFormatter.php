<?php

/**
 * @author Victor Dubiniuk <dubiniuk@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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

namespace Owncloud\Updater\Formatter;

use Symfony\Component\Console\Formatter\OutputFormatterInterface;
use Symfony\Component\Console\Formatter\OutputFormatterStyleInterface;

/**
 * Class HtmlOutputFormatter
 *
 * @package Owncloud\Updater\Formatter
 */
class HtmlOutputFormatter implements OutputFormatterInterface {
	public const PATTERN = "/\[(([\d+];?)*)m(.*?)\[(([\d+];?)*)m/i";

	private static $styles = [
		'30' => 'color:rgba(0,0,0,1)',
		'31' => 'color:rgba(230,50,50,1)',
		'32' => 'color:rgba(50,230,50,1)',
		'33' => 'color:rgba(230,230,50,1)',
		'34' => 'color:rgba(50,50,230,1)',
		'35' => 'color:rgba(230,50,150,1)',
		'36' => 'color:rgba(50,230,230,1)',
		'37' => 'color:rgba(250,250,250,1)',
		'40' => 'color:rgba(0,0,0,1)',
		'41' => 'background-color:rgba(230,50,50,1)',
		'42' => 'background-color:rgba(50,230,50,1)',
		'43' => 'background-color:rgba(230,230,50,1)',
		'44' => 'background-color:rgba(50,50,230,1)',
		'45' => 'background-color:rgba(230,50,150,1)',
		'46' => 'background-color:rgba(50,230,230,1)',
		'47' => 'background-color:rgba(250,250,250,1)',
		'1' => 'font-weight:bold',
		'4' => 'text-decoration:underline',
		'8' => 'visibility:hidden',
	];
	private $formatter;

	/**
	 * HtmlOutputFormatter constructor.
	 *
	 * @param $formatter
	 */
	public function __construct($formatter) {
		$this->formatter = $formatter;
	}

	/**
	 * @param bool $decorated
	 * @return mixed
	 */
	public function setDecorated($decorated) {
		return $this->formatter->setDecorated($decorated);
	}

	/**
	 * @return mixed
	 */
	public function isDecorated() {
		return $this->formatter->isDecorated();
	}

	/**
	 * @param string $name
	 * @param OutputFormatterStyleInterface $style
	 * @return mixed
	 */
	public function setStyle($name, OutputFormatterStyleInterface $style) {
		return $this->formatter->setStyle($name, $style);
	}

	/**
	 * @param string $name
	 * @return mixed
	 */
	public function hasStyle($name) {
		return $this->formatter->hasStyle($name);
	}

	/**
	 * @param string $name
	 * @return mixed
	 */
	public function getStyle($name) {
		return $this->formatter->getStyle($name);
	}

	/**
	 * @param string $message
	 * @return mixed
	 */
	public function format($message) {
		$formatted = $this->formatter->format($message);
		$escaped = \htmlspecialchars($formatted, ENT_QUOTES, 'UTF-8');
		$converted = \preg_replace_callback(self::PATTERN, [$this, 'replaceFormat'], $escaped);

		return $converted;
	}

	/**
	 * @param $matches
	 * @return string
	 */
	protected function replaceFormat($matches) {
		$text = $matches[3];
		$styles = \explode(';', $matches[1]);
		$css = [];

		foreach ($styles as $style) {
			if (isset(self::$styles[$style])) {
				/* @phan-suppress-next-line PhanTypeMismatchDimFetch */
				$css[] = self::$styles[$style];
			}
		}

		return \sprintf('<span style="%s">%s</span>', \implode(';', $css), $text);
	}
}
