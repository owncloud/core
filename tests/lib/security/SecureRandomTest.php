<?php
/**
 * @author Lukas Reschke <lukas@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
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

class SecureRandomTest extends \Test\TestCase {
	/** @var \OC\Security\SecureRandom */
	private $secureRandom;
	/** @var \RandomLib\Factory */
	private $factory;
	/** @var \OC\Security\SecureRandom */
	protected $unmockedRng;

	public function setUp() {
		parent::setUp();
		$this->factory = $this->getMockBuilder('\RandomLib\Factory')
			->disableOriginalConstructor()->getMock();
		$this->secureRandom = new \OC\Security\SecureRandom($this->factory);
		$this->unmockedRng = new \OC\Security\SecureRandom(new \RandomLib\Factory);
	}

	public function testGetLowStrengthGenerator() {
		$this->factory
			->expects($this->once())
			->method('getLowStrengthGenerator');

		$this->assertSame($this->secureRandom, $this->secureRandom->getLowStrengthGenerator());
	}

	public function testGetMediumStrengthGenerator() {
		$generator = $this->getMockBuilder('\RandomLib\Generator')
			->disableOriginalConstructor()->getMock();
		$this->factory
			->expects($this->once())
			->method('getMediumStrengthGenerator')
			->will($this->returnValue($generator));
		$generator
			->expects($this->once())
			->method('addSource')
			->with(new \OC\Security\RandomNumberGenerator\OpenSSL());

		$this->assertSame($this->secureRandom, $this->secureRandom->getMediumStrengthGenerator());
	}

	/**
	 * @expectedException Exception
	 * @expectedExceptionMessage Generator is not initialized.
	 */
	public function testGenerateWithoutActiveGenerator() {
		$this->assertSame($this->secureRandom, $this->secureRandom->generate(12));
	}

	public function testGenerateWithGenerator() {
		$generator = $this->getMockBuilder('\RandomLib\Generator')
			->disableOriginalConstructor()->getMock();
		$this->factory
			->expects($this->once())
			->method('getMediumStrengthGenerator')
			->will($this->returnValue($generator));
		$generator
			->expects($this->once())
			->method('addSource')
			->with(new \OC\Security\RandomNumberGenerator\OpenSSL());
		$generator
			->expects($this->once())
			->method('generateString')
			->with(12, '')
			->will($this->returnValue('MyGeneratedRandomString'));

		$this->assertSame($this->secureRandom, $this->secureRandom->getMediumStrengthGenerator());
		$this->assertSame('MyGeneratedRandomString', $this->secureRandom->generate(12));
	}

	public function stringGenerationProvider() {
		return array(
			array(0, 0),
			array(1, 1),
			array(128, 128),
			array(256, 256),
			array(1024, 1024),
			array(2048, 2048),
			array(64000, 64000),
		);
	}

	public static function charCombinations() {
		return array(
			array('CHAR_LOWER', '[a-z]'),
			array('CHAR_UPPER', '[A-Z]'),
			array('CHAR_DIGITS', '[0-9]'),
		);
	}

	/**
	 * @dataProvider stringGenerationProvider
	 */
	function testGetLowStrengthGeneratorLength($length, $expectedLength) {
		$generator = $this->unmockedRng->getLowStrengthGenerator();

		$this->assertEquals($expectedLength, strlen($generator->generate($length)));
	}

	/**
	 * @dataProvider stringGenerationProvider
	 */
	function testMediumLowStrengthGeneratorLength($length, $expectedLength) {
		$generator = $this->unmockedRng->getMediumStrengthGenerator();

		$this->assertEquals($expectedLength, strlen($generator->generate($length)));
	}

	/**
	 * @expectedException \Exception
	 * @expectedExceptionMessage Generator is not initialized
	 */
	function testUninitializedGenerate() {
		$this->unmockedRng->generate(30);
	}

	/**
	 * @dataProvider charCombinations
	 */
	public function testScheme($charName, $chars) {
		$generator = $this->unmockedRng->getMediumStrengthGenerator();
		$scheme = constant('OCP\Security\ISecureRandom::' . $charName);
		$randomString = $generator->generate(100, $scheme);
		$matchesRegex = preg_match('/^'.$chars.'+$/', $randomString);
		$this->assertSame(1, $matchesRegex);
	}

}
