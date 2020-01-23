<?php
/**
 *
 * @copyright Copyright (c) 2020, ownCloud GmbH
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
namespace OC\License;

class BasicLicense implements ILicense {
	private $org;
	private $date;
	private $rawCodes;
	private $codes;
	private $checksum;

	public function __construct(string $licenseKey) {
		$parts = \explode('-', $licenseKey);

		$this->org = $parts[0];
		$this->date = \strtotime(\substr($parts[1], 0, 4) . '-' . \substr($parts[1], 4, 2) . '-' . \substr($parts[1], 6));
		$this->rawCodes = $parts[2];
		$this->codes = \str_split(\strtoupper($this->rawCodes), 8);
		$this->checksum = $parts[3];
	}

	public function isValid() {
		$dateString = \date('Ymd', $this->date);

		$checksum = \sprintf('%x', \crc32(\strtolower($this->org) . 'zz' . \strtolower($this->rawCodes) . 'zz' . $dateString));
		$dateCode = \strtoupper(\hash("crc32b", $dateString));

		return $checksum === $this->checksum && \in_array($dateCode, $this->codes);
	}

	public function getExpirationTime() {
		return $this->date;
	}

	public function getType() {
		$hash = \strtoupper(\hash("crc32b", 'demo'));
		if (\in_array($hash, $this->codes)) {
			return ILicense::LICENSE_TYPE_DEMO;
		} else {
			return ILicense::LICENSE_TYPE_NORMAL;
		}
	}
}