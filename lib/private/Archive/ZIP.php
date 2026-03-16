<?php
/**
 * @author Bart Visscher <bartv@thisnet.nl>
 * @author Christopher Schäpers <kondou@ts.unde.re>
 * @author Felix Moeller <mail@felixmoeller.de>
 * @author Joas Schilling <coding@schilljs.com>
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Roeland Jago Douma <rullzer@owncloud.com>
 * @author Stefan Weil <sw@weilnetz.de>
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

class ZIP extends Archive {
	/**
	 * @var \ZipArchive zip
	 */
	private $zip;

	/**
	 * @param string $source
	 */
	public function __construct($source) {
		$this->zip = new \ZipArchive();
		if ($this->zip->open($source, \ZipArchive::CREATE) !== true) {
			\OCP\Util::writeLog('files_archive', 'Error while opening archive '.$source, \OCP\Util::WARN);
		}
	}

	/**
	 * extract the archive
	 * @param string $dest
	 * @return bool
	 */
	public function extract($dest) {
		return $this->zip->extractTo($dest);
	}
}
