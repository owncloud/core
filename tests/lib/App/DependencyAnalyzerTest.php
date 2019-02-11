<?php

/**
 * @author Thomas Müller
 * @copyright Copyright (c) 2014 Thomas Müller deepdiver@owncloud.com
 * later.
 * See the COPYING-README file.
 */

namespace Test\App;

use OC\App\DependencyAnalyzer;
use OC\App\Platform;
use OCP\IL10N;
use Test\TestCase;

class DependencyAnalyzerTest extends TestCase {

	/** @var Platform */
	private $platformMock;

	/** @var IL10N */
	private $l10nMock;

	/** @var DependencyAnalyzer */
	private $analyser;

	private $ocRequirements = [
		'@attributes' => [ 'min-version' => '11.0', 'max-version' => '100.0.0' ]
	];

	public function setUp() {
		$this->platformMock = $this->getMockBuilder(Platform::class)
			->disableOriginalConstructor()
			->getMock();
		$this->platformMock
			->method('getPhpVersion')
			->will($this->returnValue('5.4.3'));
		$this->platformMock
			->method('getIntSize')
			->will($this->returnValue('4'));
		$this->platformMock
			->method('getDatabase')
			->will($this->returnValue('mysql'));
		$this->platformMock
			->method('getOS')
			->will($this->returnValue('Linux'));
		$this->platformMock
			->method('isCommandKnown')
			->will($this->returnCallback(function ($command) {
				return ($command === 'grep');
			}));
		$this->platformMock
			->method('getLibraryVersion')
			->will($this->returnCallback(function ($lib) {
				if ($lib === 'curl') {
					return '2.3.4';
				}
				return null;
			}));

		$this->platformMock
			->method('getOcChannel')
			->will($this->returnValue('production'));

		$this->l10nMock = $this->getMockBuilder(IL10N::class)
			->disableOriginalConstructor()
			->getMock();
		$this->l10nMock
			->method('t')
			->will($this->returnCallback(function ($text, $parameters = []) {
				return \vsprintf($text, $parameters);
			}));

		$this->analyser = new DependencyAnalyzer($this->platformMock, $this->l10nMock);
	}

	/**
	 * @dataProvider providesPhpVersion
	 *
	 * @param string $expectedMissing
	 * @param string $minVersion
	 * @param string $maxVersion
	 * @param string $intSize
	 */
	public function testPhpVersion($expectedMissing, $minVersion, $maxVersion, $intSize): void {
		$app = [
			'dependencies' => [
				'php' => [],
				'owncloud' => $this->ocRequirements
			]
		];
		if ($minVersion !== null) {
			$app['dependencies']['php']['@attributes']['min-version'] = $minVersion;
		}
		if ($maxVersion !== null) {
			$app['dependencies']['php']['@attributes']['max-version'] = $maxVersion;
		}
		if ($intSize !== null) {
			$app['dependencies']['php']['@attributes']['min-int-size'] = $intSize;
		}
		$this->platformMock->method('getOcVersion')->willReturn('11.0.0.0');
		$missing = $this->analyser->analyze($app);

		$this->assertInternalType('array', $missing);
		$this->assertEquals($expectedMissing, $missing);
	}

	/**
	 * @dataProvider providesDatabases
	 * @param $expectedMissing
	 * @param $databases
	 */
	public function testDatabases($expectedMissing, $databases): void {
		$app = [
			'dependencies' => [
				'owncloud' => $this->ocRequirements
			]
		];
		if ($databases !== null) {
			$app['dependencies']['database'] = $databases;
		}
		$this->platformMock->method('getOcVersion')->willReturn('11.0.0.0');
		$missing = $this->analyser->analyze($app);

		$this->assertInternalType('array', $missing);
		$this->assertEquals($expectedMissing, $missing);
	}

	/**
	 * @dataProvider providesCommands
	 *
	 * @param string $expectedMissing
	 * @param string|null $commands
	 */
	public function testCommand($expectedMissing, $commands): void {
		$app = [
			'dependencies' => [
				'owncloud' => $this->ocRequirements
			]
		];
		if ($commands !== null) {
			$app['dependencies']['command'] = $commands;
		}
		$this->platformMock->method('getOcVersion')->willReturn('11.0.0.0');
		$missing = $this->analyser->analyze($app);

		$this->assertInternalType('array', $missing);
		$this->assertEquals($expectedMissing, $missing);
	}

	/**
	 * @dataProvider providesLibs
	 * @param $expectedMissing
	 * @param $libs
	 */
	public function testLibs($expectedMissing, $libs): void {
		$app = [
			'dependencies' => [
				'owncloud' => $this->ocRequirements
			]
		];
		if ($libs !== null) {
			$app['dependencies']['lib'] = $libs;
		}

		$this->platformMock->method('getOcVersion')->willReturn('11.0.0.0');
		$missing = $this->analyser->analyze($app);

		$this->assertInternalType('array', $missing);
		$this->assertEquals($expectedMissing, $missing);
	}

	/**
	 * @dataProvider providesOS
	 * @param $expectedMissing
	 * @param $oss
	 */
	public function testOS($expectedMissing, $oss): void {
		$app = [
			'dependencies' => [
				'owncloud' => $this->ocRequirements
			]
		];
		if ($oss !== null) {
			$app['dependencies']['os'] = $oss;
		}
		$this->platformMock->method('getOcVersion')->willReturn('11.0.0.0');
		$missing = $this->analyser->analyze($app);

		$this->assertInternalType('array', $missing);
		$this->assertEquals($expectedMissing, $missing);
	}

	/**
	 * @dataProvider providesOC
	 * @param $expectedMissing
	 * @param $oc
	 */
	public function testOC($expectedMissing, $oc): void {
		$app = [
			'dependencies' => []
		];
		if ($oc !== null) {
			$app['dependencies']['owncloud'] = $oc;
		}

		$this->platformMock
			->method('getOcVersion')
			->will($this->returnValue('8.0.2'));
		$missing = $this->analyser->analyze($app);

		$this->assertInternalType('array', $missing);
		$this->assertEquals($expectedMissing, $missing);
	}

	/**
	 * @return array
	 */
	public function providesOC(): array {
		return [
			// no version -> no missing dependency
			[['No minimum ownCloud version is defined in appinfo/info.xml.', 'No maximum ownCloud version is defined in appinfo/info.xml.'], null],
			[[], ['@attributes' => ['min-version' => '8', 'max-version' => '8']]],
			[[], ['@attributes' => ['min-version' => '8.0', 'max-version' => '8.0']]],
			[[], ['@attributes' => ['min-version' => '8.0.2', 'max-version' => '8.0.2']]],
			[['ownCloud 8.0.3 or higher is required.', 'No maximum ownCloud version is defined in appinfo/info.xml.'], ['@attributes' => ['min-version' => '8.0.3']]],
			[['ownCloud 9 or higher is required.', 'No maximum ownCloud version is defined in appinfo/info.xml.'], ['@attributes' => ['min-version' => '9']]],
			[['No minimum ownCloud version is defined in appinfo/info.xml.', 'ownCloud 8.0.1 or lower is required.'], ['@attributes' => ['max-version' => '8.0.1']]],
		];
	}

	/**
	 * @return array
	 */
	public function providesOS(): array {
		return [
			[[], null],
			[[], []],
			[['Following platforms are supported: ANDROID'], 'ANDROID'],
			[['Following platforms are supported: WINNT'], ['WINNT']]
		];
	}

	/**
	 * @return array
	 */
	public function providesLibs(): array {
		return [
			// we expect curl to exist
			[[], 'curl'],
			// we expect abcde to exist
			[['The library abcde is not available.'], ['abcde']],
			// curl in version 100.0 does not exist
			[['Library curl with a version higher than 100.0 is required - available version 2.3.4.'],
				[['@attributes' => ['min-version' => '100.0'], '@value' => 'curl']]],
			// curl in version 100.0 does not exist
			[['Library curl with a version lower than 1.0.0 is required - available version 2.3.4.'],
				[['@attributes' => ['max-version' => '1.0.0'], '@value' => 'curl']]],
			[['Library curl with a version lower than 2.3.3 is required - available version 2.3.4.'],
				[['@attributes' => ['max-version' => '2.3.3'], '@value' => 'curl']]],
			[['Library curl with a version higher than 2.3.5 is required - available version 2.3.4.'],
				[['@attributes' => ['min-version' => '2.3.5'], '@value' => 'curl']]],
			[[],
				[['@attributes' => ['min-version' => '2.3.4', 'max-version' => '2.3.4'], '@value' => 'curl']]],
			[[],
				[['@attributes' => ['min-version' => '2.3', 'max-version' => '2.3'], '@value' => 'curl']]],
			[[],
				[['@attributes' => ['min-version' => '2', 'max-version' => '2'], '@value' => 'curl']]],
			[[],
				['@attributes' => ['min-version' => '2', 'max-version' => '2'], '@value' => 'curl']],
		];
	}

	/**
	 * @return array
	 */
	public function providesCommands(): array {
		return [
			[[], null],
			// grep is known on linux
			[[], [['@attributes' => ['os' => 'Linux'], '@value' => 'grep']]],
			// grepp is not known on linux
			[['The command line tool grepp could not be found'], [['@attributes' => ['os' => 'Linux'], '@value' => 'grepp']]],
			// we don't care about tools on Windows - we are on Linux
			[[], [['@attributes' => ['os' => 'Windows'], '@value' => 'grepp']]],
			// grep is known on all systems
			[[], 'grep'],
			[[], ['@attributes' => ['os' => 'Linux'], '@value' => 'grep']],
		];
	}

	/**
	 * @return array
	 */
	public function providesDatabases(): array {
		return [
			// non BC - in case on databases are defined -> all are supported
			[[], null],
			[[], []],
			[['Following databases are supported: mongodb'], 'mongodb'],
			[['Following databases are supported: sqlite, postgres'], ['sqlite', ['@value' => 'postgres']]],
		];
	}

	/**
	 * @return array
	 */
	public function providesPhpVersion(): array {
		return [
			[[], null, null, null],
			[[], '5.4', null, null],
			[[], null, '5.5', null],
			[[], '5.4', '5.5', null],
			[['PHP 5.4.4 or higher is required.'], '5.4.4', null, null],
			[['PHP with a version lower than 5.4.2 is required.'], null, '5.4.2', null],
			[['64bit or higher PHP required.'], null, null, 64],
			[[], '5.4', '5.4', null],
		];
	}
}
