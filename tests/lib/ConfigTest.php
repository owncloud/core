<?php
/**
 * Copyright (c) 2013 Bart Visscher <bartv@thisnet.nl>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test;

use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Class ConfigTest
 *
 * @group DB
 * @package Test
 */
class ConfigTest extends TestCase {
	const TESTCONTENT = '<?php $CONFIG=array("foo"=>"bar", "beers" => array("Appenzeller", "Guinness", "Kölsch"), "alcohol_free" => false);';

	/** @var array */
	private $initialConfig = ['foo' => 'bar', 'beers' => ['Appenzeller', 'Guinness', 'Kölsch'], 'alcohol_free' => false];
	/** @var string */
	private $configFile;
	/** @var \OC\Config */
	private $config;
	/** @var string */
	private $randomTmpDir;

	protected function setUp(): void {
		parent::setUp();

		$this->randomTmpDir = \OC::$server->getTempManager()->getTemporaryFolder();
		$this->configFile = $this->randomTmpDir.'testconfig.php';
		\file_put_contents($this->configFile, self::TESTCONTENT);
		$this->config = new \OC\Config($this->randomTmpDir, 'testconfig.php');
	}

	protected function tearDown(): void {
		\unlink($this->configFile);
		parent::tearDown();
	}

	public function testGetKeys() {
		$expectedConfig = ['foo', 'beers', 'alcohol_free'];
		$this->assertSame($expectedConfig, $this->config->getKeys());
	}

	public function testGetValue() {
		$this->assertSame('bar', $this->config->getValue('foo'));
		$this->assertNull($this->config->getValue('bar'));
		$this->assertSame('moo', $this->config->getValue('bar', 'moo'));
		$this->assertFalse($this->config->getValue('alcohol_free', 'someBogusValue'));
		$this->assertSame(['Appenzeller', 'Guinness', 'Kölsch'], $this->config->getValue('beers', 'someBogusValue'));
		$this->assertSame(['Appenzeller', 'Guinness', 'Kölsch'], $this->config->getValue('beers'));
	}

	public function testGetValueReturnsEnvironmentValueIfSet() {
		$this->assertEquals('bar', $this->config->getValue('foo'));
		\putenv('OC_foo=baz');
		$this->assertEquals('baz', $this->config->getValue('foo'));
	}

	public function testSetValue() {
		$this->config->setValue('foo', 'moo');
		$expectedConfig = $this->initialConfig;
		$expectedConfig['foo'] = 'moo';
		$this->assertAttributeEquals($expectedConfig, 'cache', $this->config);

		$expected = "<?php\n\$CONFIG = array (\n  'foo' => 'moo',\n  'beers' => \n  array (\n    0 => 'Appenzeller',\n  " .
			"  1 => 'Guinness',\n    2 => 'Kölsch',\n  ),\n  'alcohol_free' => false,\n);\n";
		$this->assertStringEqualsFile($this->configFile, $expected);

		$calledBeforeSetValue = [];
		$calledAfterSetValue = [];
		\OC::$server->getEventDispatcher()->addListener('config.beforesetvalue',
			function (GenericEvent $event) use (&$calledBeforeSetValue) {
				$calledBeforeSetValue[] = 'config.beforesetvalue';
				$calledBeforeSetValue[] = $event;
			});
		\OC::$server->getEventDispatcher()->addListener('config.aftersetvalue',
			function (GenericEvent $event) use (&$calledAfterSetValue) {
				$calledAfterSetValue[] = 'config.aftersetvalue';
				$calledAfterSetValue[] = $event;
			});

		$this->config->setValue('bar', 'red');
		$this->config->setValue('apps', ['files', 'gallery']);
		$expectedConfig['bar'] = 'red';
		$expectedConfig['apps'] = ['files', 'gallery'];
		$this->assertAttributeEquals($expectedConfig, 'cache', $this->config);
		$this->assertInstanceOf(GenericEvent::class, $calledBeforeSetValue[1]);
		$this->assertInstanceOf(GenericEvent::class, $calledAfterSetValue[1]);
		$this->assertEquals('config.beforesetvalue', $calledBeforeSetValue[0]);
		$this->assertEquals('config.aftersetvalue', $calledAfterSetValue[0]);
		$this->assertArrayHasKey('key', $calledBeforeSetValue[1]);
		$this->assertArrayHasKey('value', $calledBeforeSetValue[1]);
		$this->assertArrayHasKey('key', $calledAfterSetValue[1]);
		$this->assertArrayHasKey('value', $calledAfterSetValue[1]);
		$this->assertArrayHasKey('update', $calledAfterSetValue[1]);
		$this->assertArrayHasKey('oldvalue', $calledAfterSetValue[1]);

		$expected = "<?php\n\$CONFIG = array (\n  'foo' => 'moo',\n  'beers' => \n  array (\n    0 => 'Appenzeller',\n  " .
			"  1 => 'Guinness',\n    2 => 'Kölsch',\n  ),\n  'alcohol_free' => false,\n  'bar' => 'red',\n  'apps' => \n " .
			" array (\n    0 => 'files',\n    1 => 'gallery',\n  ),\n);\n";
		$this->assertStringEqualsFile($this->configFile, $expected);
	}

	public function testSetValues() {
		$this->assertStringEqualsFile($this->configFile, self::TESTCONTENT);

		// Changing configs to existing values and deleting non-existing once
		// should not rewrite the config.php
		$this->config->setValues([
			'foo'			=> 'bar',
			'not_exists'	=> null,
		]);

		$this->assertAttributeEquals($this->initialConfig, 'cache', $this->config);
		$this->assertStringEqualsFile($this->configFile, self::TESTCONTENT);

		$calledBeforeUpdate = [];
		\OC::$server->getEventDispatcher()->addListener('config.beforesetvalue',
			function (GenericEvent $event) use (&$calledBeforeUpdate) {
				$calledBeforeUpdate[] = 'config.beforesetvalue';
				$calledBeforeUpdate[] = $event;
			});
		$calledAfterUpdate = [];
		\OC::$server->getEventDispatcher()->addListener('config.aftersetvalue',
			function (GenericEvent $event) use (&$calledAfterUpdate) {
				$calledAfterUpdate[] = 'config.aftersetvalue';
				$calledAfterUpdate[] = $event;
			});
		$this->config->setValues([
			'foo'			=> 'moo',
			'alcohol_free'	=> null,
		]);
		$expectedConfig = $this->initialConfig;
		$expectedConfig['foo'] = 'moo';
		unset($expectedConfig['alcohol_free']);
		$this->assertAttributeEquals($expectedConfig, 'cache', $this->config);
		$this->assertInstanceOf(GenericEvent::class, $calledBeforeUpdate[1]);
		$this->assertInstanceOf(GenericEvent::class, $calledAfterUpdate[1]);
		$this->assertEquals('config.beforesetvalue', $calledBeforeUpdate[0]);
		$this->assertEquals('config.aftersetvalue', $calledAfterUpdate[0]);
		$this->assertArrayHasKey('key', $calledBeforeUpdate[1]);
		$this->assertEquals('foo', $calledBeforeUpdate[1]->getArgument('key'));
		$this->assertArrayHasKey('value', $calledBeforeUpdate[1]);
		$this->assertEquals('moo', $calledBeforeUpdate[1]->getArgument('value'));
		$this->assertArrayHasKey('key', $calledAfterUpdate[1]);
		$this->assertEquals('foo', $calledAfterUpdate[1]->getArgument('key'));
		$this->assertArrayHasKey('value', $calledAfterUpdate[1]);
		$this->assertEquals('moo', $calledAfterUpdate[1]->getArgument('value'));
		$this->assertArrayHasKey('update', $calledAfterUpdate[1]);
		$this->assertTrue($calledAfterUpdate[1]->getArgument('update'));
		$this->assertArrayHasKey('oldvalue', $calledAfterUpdate[1]);
		$this->assertEquals('bar', $calledAfterUpdate[1]->getArgument('oldvalue'));

		$expected = "<?php\n\$CONFIG = array (\n  'foo' => 'moo',\n  'beers' => \n  array (\n    0 => 'Appenzeller',\n  " .
			"  1 => 'Guinness',\n    2 => 'Kölsch',\n  ),\n);\n";
		$this->assertStringEqualsFile($this->configFile, $expected);

		$calledBeforeDelete = [];
		\OC::$server->getEventDispatcher()->addListener('config.beforedeletevalue',
			function (GenericEvent $event) use (&$calledBeforeDelete) {
				$calledBeforeDelete[] = 'config.beforedeletevalue';
				$calledBeforeDelete[] = $event;
			});
		$calledAfterDelete = [];
		\OC::$server->getEventDispatcher()->addListener('config.afterdeletevalue',
			function (GenericEvent $event) use (&$calledAfterDelete) {
				$calledAfterDelete[] = 'config.afterdeletevalue';
				$calledAfterDelete[] = $event;
			});

		$this->config->setValues([
			'foo' => null
		]);
		$this->assertInstanceOf(GenericEvent::class, $calledBeforeDelete[1]);
		$this->assertInstanceOf(GenericEvent::class, $calledAfterDelete[1]);
		$this->assertEquals('config.beforedeletevalue', $calledBeforeDelete[0]);
		$this->assertEquals('config.afterdeletevalue', $calledAfterDelete[0]);
		$this->assertArrayHasKey('key', $calledBeforeDelete[1]);
		$this->assertEquals('foo', $calledBeforeDelete[1]->getArgument('key'));
		$this->assertArrayHasKey('value', $calledBeforeDelete[1]);
		$this->assertNull($calledBeforeDelete[1]->getArgument('value'));
		$this->assertArrayHasKey('key', $calledAfterDelete[1]);
		$this->assertEquals('foo', $calledAfterDelete[1]->getArgument('key'));
		$this->assertArrayHasKey('value', $calledAfterDelete[1]);
		$this->assertEquals('moo', $calledAfterDelete[1]->getArgument('value'));
	}

	public function testDeleteKey() {
		$calledBeforeDeleteValue = [];
		$calledAfterDeleteValue = [];
		\OC::$server->getEventDispatcher()->addListener('config.beforedeletevalue',
			function (GenericEvent $event) use (&$calledBeforeDeleteValue) {
				$calledBeforeDeleteValue[] = 'config.beforedeletevalue';
				$calledBeforeDeleteValue[] = $event;
			});
		\OC::$server->getEventDispatcher()->addListener('config.afterdeletevalue',
			function (GenericEvent $event) use (&$calledAfterDeleteValue) {
				$calledAfterDeleteValue[] = 'config.afterdeletevalue';
				$calledAfterDeleteValue[] = $event;
			});
		$this->config->deleteKey('foo');
		$expectedConfig = $this->initialConfig;
		unset($expectedConfig['foo']);
		$this->assertAttributeEquals($expectedConfig, 'cache', $this->config);

		$this->assertInstanceOf(GenericEvent::class, $calledBeforeDeleteValue[1]);
		$this->assertInstanceOf(GenericEvent::class, $calledBeforeDeleteValue[1]);
		$this->assertEquals('config.beforedeletevalue', $calledBeforeDeleteValue[0]);
		$this->assertEquals('config.afterdeletevalue', $calledAfterDeleteValue[0]);
		$this->assertArrayHasKey('key', $calledBeforeDeleteValue[1]);
		$this->assertArrayHasKey('key', $calledAfterDeleteValue[1]);

		$expected = "<?php\n\$CONFIG = array (\n  'beers' => \n  array (\n    0 => 'Appenzeller',\n  " .
			"  1 => 'Guinness',\n    2 => 'Kölsch',\n  ),\n  'alcohol_free' => false,\n);\n";
		$this->assertStringEqualsFile($this->configFile, $expected);
	}

	public function testConfigMerge() {
		// Create additional config
		$additionalConfig = '<?php $CONFIG=array("php53"=>"totallyOutdated");';
		$additionalConfigPath = $this->randomTmpDir.'additionalConfig.testconfig.php';
		\file_put_contents($additionalConfigPath, $additionalConfig);

		// Reinstantiate the config to force a read-in of the additional configs
		$this->config = new \OC\Config($this->randomTmpDir, 'testconfig.php');

		// Ensure that the config value can be read and the config has not been modified
		$this->assertSame('totallyOutdated', $this->config->getValue('php53', 'bogusValue'));
		$this->assertStringEqualsFile($this->configFile, self::TESTCONTENT);

		// Write a new value to the config
		$this->config->setValue('CoolWebsites', ['demo.owncloud.org', 'owncloud.org', 'owncloud.com']);
		$expected = "<?php\n\$CONFIG = array (\n  'foo' => 'bar',\n  'beers' => \n  array (\n    0 => 'Appenzeller',\n  " .
			"  1 => 'Guinness',\n    2 => 'Kölsch',\n  ),\n  'alcohol_free' => false,\n  'php53' => 'totallyOutdated',\n  'CoolWebsites' => \n  array (\n  " .
			"  0 => 'demo.owncloud.org',\n    1 => 'owncloud.org',\n    2 => 'owncloud.com',\n  ),\n);\n";
		$this->assertStringEqualsFile($this->configFile, $expected);

		// Cleanup
		\unlink($additionalConfigPath);
	}
}
