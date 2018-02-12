<?php

/**
 * @author Thomas Müller
 * @copyright Copyright (c) 2014 Thomas Müller deepdiver@owncloud.com
 * later.
 * See the COPYING-README file.
 */

namespace Test\App;

use OC;
use OC\App\InfoParser;
use Test\TestCase;

class InfoParserTest extends TestCase {

	/** @var InfoParser */
	private $parser;

	public function setUp() {
		$this->parser = new InfoParser();
	}

	public function testParsingValidXml() {
		$expectedData = json_decode(
			file_get_contents(OC::$SERVERROOT . "/tests/data/app/expected-info.json"),
			true
		);
		$data = $this->parser->parse(OC::$SERVERROOT. "/tests/data/app/valid-info.xml");
		$this->assertEquals($expectedData, $data);
	}

	/**
	 * @expectedException \OCP\App\AppNotFoundException
	 */
	public function testParsingMissingXml() {
		$this->parser->parse('none');
	}

	/**
	 * @dataProvider invalidXmlProvider
	 * @expectedException \InvalidArgumentException
	 */
	public function testParsingInvalidXml($xmlFile) {
		$this->parser->parse(OC::$SERVERROOT. '/tests/data/app/' . $xmlFile);
	}

	public function invalidXmlProvider() {
		return [
			['invalid-info.xml'],
			['invalid-info2.xml']
		];
	}
}
