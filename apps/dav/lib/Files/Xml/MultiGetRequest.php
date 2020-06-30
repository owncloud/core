<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCA\DAV\Files\Xml;

use Sabre\Uri;
use Sabre\Xml\LibXMLException;
use Sabre\Xml\ParseException;
use Sabre\Xml\Reader;
use Sabre\Xml\XmlDeserializable;

class MultiGetRequest implements XmlDeserializable {

	/**
	 * An array with requested resources.
	 *
	 * @var array
	 */
	public $resources;

	/**
	 *
	 * @param Reader $reader
	 * @return mixed
	 * @throws LibXMLException
	 * @throws ParseException
	 * @throws Uri\InvalidUriException
	 */
	public static function xmlDeserialize(Reader $reader) {
		$elements = (array)$reader->parseInnerTree([]);

		$resources = [];

		if (!\is_array($elements)) {
			$elements = [];
		}

		foreach ($elements as $elem) {
			if ($elem['name'] !== '{DAV:}href') {
				continue;
			}

			$resources[] = Uri\resolve($reader->contextUri, $elem['value']);
		}

		$obj = new self();
		$obj->resources = $resources;
		return $obj;
	}
}
