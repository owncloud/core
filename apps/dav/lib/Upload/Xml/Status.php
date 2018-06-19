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
namespace OCA\DAV\Upload\Xml;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class Status implements XmlSerializable {
	const NS_OWNCLOUD = 'http://owncloud.org/ns';
	private $etag;
	private $fileId;
	private $progress;

	public function __construct($progress, $fileId, $etag) {
		$this->progress = $progress;
		$this->fileId = $fileId;
		$this->etag = $etag;
	}

	public function xmlSerialize(Writer $writer) {
		switch ($this->progress) {
			case 0:
				$writer->writeElement('{' . self::NS_OWNCLOUD . '}progress', 'started');
				break;
			case 1:
				$writer->writeElement('{' . self::NS_OWNCLOUD . '}progress', 'finished');
				break;
			default:
				$writer->writeElement('{' . self::NS_OWNCLOUD . '}progress', 'not-started');
				break;
		}
		if ($this->fileId !== null) {
			$writer->writeElement('{' . self::NS_OWNCLOUD . '}fileId', $this->fileId);
		}
		if ($this->etag !== null) {
			$writer->writeElement('{' . self::NS_OWNCLOUD . '}ETag', $this->etag);
		}
	}
}
