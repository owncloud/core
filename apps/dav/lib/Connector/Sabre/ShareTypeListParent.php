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
use Sabre\DAV\Xml\Property\Href;
use OCA\DAV\Connector\Sabre\ShareTypeList;

class ShareTypeListParent implements Element {
	const NS_OWNCLOUD = 'http://owncloud.org/ns';

	/** @var Href */
	private $href;
	/** @var ShareTypeList */
	private $shareTypeList;

	public function __construct(Href $href, ShareTypeList $shareTypeList) {
		$this->href = $href;
		$this->shareTypeList = $shareTypeList;
	}

	/**
	 * @return Href
	 */
	public function getHref() {
		return $this->href;
	}

	/**
	 * @return ShareTypeList
	 */
	public function getShareTypeList() {
		return $this->shareTypeList;
	}

	/**
	 * The deserialize method is called during xml parsing.
	 *
	 * @param Reader $reader
	 * @return mixed
	 */
	public static function xmlDeserialize(Reader $reader) {
		$shareTypes = [];

		$tree = $reader->parseInnerTree();
		if ($tree === null) {
			return null;
		}

		foreach ($tree as $elem) {
			if ($elem['name'] === '{DAV:}href') {
				$href = $elem['value'];
			}
			if ($elem['name'] === '{' . self::NS_OWNCLOUD . '}share-type') {
				$shareTypeList = $elem['value'];
			}
		}
		return new self($href, $shareTypeList);
	}

	public function xmlSerialize(Writer $writer) {
		$writer->startElement('{' . self::NS_OWNCLOUD . '}parent');
		$this->href->xmlSerialize($writer);
		$this->shareTypeList->xmlSerialize($writer);
		$writer->endElement();
	}
}
