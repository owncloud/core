<?php
/**
 * @author Thomas Citharel <tcit@tcit.fr>
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
namespace OCA\DAV\Tests\unit\CalDAV\Publishing;

use OCA\DAV\CalDAV\Publishing\Xml\Publisher;
use Sabre\Xml\Writer;
use PHPUnit\Framework\TestCase;

class PublisherTest extends TestCase {
	const NS_CALENDARSERVER = 'http://calendarserver.org/ns/';

	public function testSerializePublished() {
		$publish = new Publisher('urltopublish', true);

		$xml = $this->write([
			'{' . self::NS_CALENDARSERVER . '}publish-url' => $publish,
		]);

		$this->assertEquals('urltopublish', $publish->getValue());

		$this->assertXmlStringEqualsXmlString(
			'<?xml version="1.0"?>
			<x1:publish-url xmlns:d="DAV:" xmlns:x1="' . self::NS_CALENDARSERVER . '">
			<d:href>urltopublish</d:href>
			</x1:publish-url>', $xml);
	}

	public function testSerializeNotPublished() {
		$publish = new Publisher('urltopublish', false);

		$xml = $this->write([
			'{' . self::NS_CALENDARSERVER . '}pre-publish-url' => $publish,
		]);

		$this->assertEquals('urltopublish', $publish->getValue());

		$this->assertXmlStringEqualsXmlString(
			'<?xml version="1.0"?>
			<x1:pre-publish-url xmlns:d="DAV:" xmlns:x1="' . self::NS_CALENDARSERVER . '">urltopublish</x1:pre-publish-url>', $xml);
	}

	protected $elementMap = [];
	protected $namespaceMap = ['DAV:' => 'd'];
	protected $contextUri = '/';

	private function write($input) {
		$writer = new Writer();
		$writer->contextUri = $this->contextUri;
		$writer->namespaceMap = $this->namespaceMap;
		$writer->openMemory();
		$writer->setIndent(true);
		$writer->write($input);
		return $writer->outputMemory();
	}
}
