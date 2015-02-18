<?php

/**
 * @author Thomas Müller
 * @copyright 2014 Thomas Müller deepdiver@owncloud.com
 * later.
 * See the COPYING-README file.
 */

namespace Test\App;

use OC;

class InfoParser extends \Test\TestCase {

	/**
	 * @var \OC\App\InfoParser
	 */
	private $parser;

	public function setUp() {
		$config = $this->getMockBuilder('\OCP\IConfig')
			->disableOriginalConstructor()->getMock();
		$certificateManager = $this->getMock('\OCP\ICertificateManager');
		$httpHelper = $this->getMockBuilder('\OC\HTTPHelper')
			->setConstructorArgs(array($config, $certificateManager))
			->setMethods(array('getHeaders'))
			->getMock();
		$urlGenerator = $this->getMockBuilder('\OCP\IURLGenerator')
			->disableOriginalConstructor()
			->getMock();

		//linkToDocs
		$urlGenerator->expects($this->any())
			->method('linkToDocs')
			->will($this->returnCallback(function ($url) {
				return "https://docs.example.com/server/go.php?to=$url";
			}));

		$this->parser = new \OC\App\InfoParser($httpHelper, $urlGenerator);
	}

	/**
	 * @dataProvider providesInfoXml
	 */
	public function testParsingValidXml($expectedJson, $xmlFile) {
		$expectedData = null;
		if (!is_null($expectedJson)) {
			$expectedData = json_decode(file_get_contents(OC::$SERVERROOT . "/tests/data/app/$expectedJson"), true);
		}
		$data = $this->parser->parse(OC::$SERVERROOT. "/tests/data/app/$xmlFile");

		$this->assertEquals($expectedData, $data);
	}

	function providesInfoXml() {
		return array(
			array('expected-info.json', 'valid-info.xml'),
			array(null, 'invalid-info.xml'),
		);
	}

	/**
	 * Providers for the app data values
	 */
	function appDescriptionProvider() {
		return [
			[
				['description' => " \t  This is a multiline \n test with \n \t \n \n some new lines   "],
				['description' => "This is a multiline test with\n\nsome new lines"]
			],
			[
				['description' => " \t  This is a multiline \n test with \n \t   some new lines   "],
				['description' => "This is a multiline test with some new lines"]
			],
			[
				['not-a-description' => " \t  This is a multiline \n test with \n \t   some new lines   "],
				['not-a-description' => " \t  This is a multiline \n test with \n \t   some new lines   "]
			],
		];
	}

	/**
	 * Test app info parser
	 *
	 * @dataProvider appDescriptionProvider
	 */
	public function testFormatDescription($data, $expected) {
		$this->assertEquals($expected, $this->parser->formatDescription($data));
	}
}
