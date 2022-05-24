<?php
/**
 * @author David Christofas <dchristofas@owncloud.com>
 *
 * @copyright Copyright (c) 2021, ownCloud GmbH
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

namespace OCA\DAV\Files\PublicFiles;

class PublicShareSigner {
	private $token;
	private $fileName;
	private $validUntil;
	private $signingKey;

	public function __construct(String $token, String $fileName, \DateTime $validUntil, String $signingKey) {
		$this->token = $token;
		$this->fileName = $fileName;
		$this->validUntil = $validUntil->format(\DateTime::ATOM);
		$this->signingKey = $signingKey;
	}

	public function getSignature() {
		return \hash_hmac('sha512/256', \implode('|', [$this->token, $this->fileName, $this->validUntil]), $this->signingKey, false);
	}
}
