<?php
/**
 * @author Juan Pablo Villafañez <jvillafanez@solidgear.es>
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

namespace OCA\DAV\Files\Xml;

use Sabre\Xml\Element\Base;
use Sabre\Xml\Element\KeyValue;
use Sabre\Xml\Reader;
use Sabre\Xml\XmlDeserializable;

class SearchRequest implements XmlDeserializable {
	/**
	 * An array with requested properties.
	 *
	 * @var array
	 */
	public $properties;

	/**
	 * @var array
	 */
	public $searchInfo;

	public static function xmlDeserialize(Reader $reader) {
		$newProps = [
			'properties' => [],
			'searchInfo' => null,
		];

		$elems = (array)$reader->parseInnerTree([
			'{DAV:}prop' => KeyValue::class,
			'{http://owncloud.org/ns}search' => KeyValue::class,
		]);

		if (!\is_array($elems)) {
			$elems = [];
		}

		foreach ($elems as $elem) {
			switch ($elem['name']) {
				case '{DAV:}prop':
					$newProps['properties'] = \array_keys($elem['value']);
					break;
				case '{http://owncloud.org/ns}search':
					$value = $elem['value'];
					if (isset($value['{http://owncloud.org/ns}pattern'])) {
						$newProps['searchInfo']['pattern'] = $value['{http://owncloud.org/ns}pattern'];
					}
					if (isset($value['{http://owncloud.org/ns}limit'])) {
						$newProps['searchInfo']['limit'] = (int)$value['{http://owncloud.org/ns}limit'];
					}
					break;
			}
		}

		$obj = new self();
		foreach ($newProps as $key => $value) {
			$obj->$key = $value;
		}

		return $obj;
	}
}
