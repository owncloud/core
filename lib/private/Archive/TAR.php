<?php
/**
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Christopher Schäpers <kondou@ts.unde.re>
 * @author Felix Moeller <mail@felixmoeller.de>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Remco Brenninkmeijer <requist1@starmail.nl>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Robin McCorkell <robin@mccorkell.me.uk>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
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

namespace OC\Archive;

class TAR extends Archive {
	public const PLAIN = 0;
	public const GZIP = 1;
	public const BZIP = 2;

	/**
	 * @var \Archive_Tar tar
	 */
	private $tar ;

	/**
	 * @param string $source
	 */
	public function __construct($source) {
		$types = [null, 'gz', 'bz2'];
		$this->tar = new \Archive_Tar($source, $types[self::getTarType($source)]);
	}

	/**
	 * try to detect the type of tar compression
	 *
	 * @param string $file
	 * @return integer
	 */
	public static function getTarType($file) {
		if (\strpos($file, '.')) {
			$extension = \substr($file, \strrpos($file, '.'));
			switch ($extension) {
				case '.gz':
				case '.tgz':
					return self::GZIP;
				case '.bz':
				case '.bz2':
					return self::BZIP;
				case '.tar':
					return self::PLAIN;
				default:
					return self::PLAIN;
			}
		} else {
			return self::PLAIN;
		}
	}

	/**
	 * extract the archive
	 *
	 * @param string $dest
	 * @return bool
	 */
	public function extract($dest) {
		return $this->tar->extract($dest);
	}
}
