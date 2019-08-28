<?php
/**
 * @author Juan Pablo Villafáñez <jvillafanez@solidgear.es>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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

namespace OCA\DAV\Connector\Sabre;

use Sabre\Xml\Element;
use Sabre\Xml\Reader;
use Sabre\Xml\Writer;
use OCA\DAV\Connector\Sabre\ShareTypeListParent;

class ShareTypeListParentList implements Element {
	const NS_OWNCLOUD = 'http://owncloud.org/ns';

	/** @var ShareTypeListParent[] */
	private $parents;

	/**
	 * @param ShareTypeListParent[]
	 */
	public function __construct(array $parents) {
		$this->parents = $parents;
	}

	public function getParents() {
		return $this->parents;
	}

	public static function xmlDeserialize(Reader $reader) {
		$parents = [];

		$tree = $reader->parseInnerTree();
		if ($tree === null) {
			return null;
		}
		foreach ($tree as $elem) {
			if ($elem['name'] === '{' . self::NS_OWNCLOUD . '}parent') {
				$parents[] = $elem['value'];
			}
		}
		return new self($parents);
	}

	public function xmlSerialize(Writer $writer) {
		$writer->startElement('{' . self::NS_OWNCLOUD . '}parents');
		foreach ($this->parents as $parent) {
			$parent->xmlSerialize($writer);
		}
		$writer->endElement();
	}
}
