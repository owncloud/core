<?php
/**
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Christopher Schäpers <kondou@ts.unde.re>
 * @author Felix Moeller <mail@felixmoeller.de>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Lukas Reschke <lukas@statuscode.ch>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
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

abstract class Archive {
	/**
	 * Open any of the supported archive types
	 *
	 * @param string $path
	 * @return Archive|void
	 */
	public static function open($path) {
		$mime = \OC::$server->getMimeTypeDetector()->detect($path);

		switch ($mime) {
			case 'application/zip':
				return new ZIP($path);
			case 'application/gzip':
			case 'application/x-bzip2':
			case 'application/x-gzip':
				return new TAR($path);
		}
	}

	/**
	 * @param $source
	 */
	abstract public function __construct($source);

	/**
	 * extract the archive
	 * @param string $dest
	 * @return bool
	 */
	abstract public function extract($dest);
}
