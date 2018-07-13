<?php
/**
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
namespace OC\Files\Storage\Wrapper;

use function GuzzleHttp\Psr7\stream_for;

class Compatibility extends Wrapper {
	public function fopen($path, $mode) {
		throw new \BadMethodCallException('fopen is no longer allowed to be called');
	}
	public function file_get_contents($path) {
		$stream = $this->readFile($path);
		if ($stream === null) {
			return '';
		}

		// expensive !!!
		return $stream->getContents();
	}
	public function file_put_contents($path, $data) {
		return $this->writeFile($path, stream_for($data)) >= 0;
	}
}
