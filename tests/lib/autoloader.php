<?php
/**
 * Copyright (c) 2013 Thomas Müller <thomas.mueller@tmit.eu>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test;

class AutoLoader extends \PHPUnit_Framework_TestCase {
	/**
	 * @var \OC\Autoloader $loader
	 */
	private $loader;

	public function setUp() {
		$this->loader = new \OC\AutoLoader();
	}

	public function testLeadingSlashOnClassName() {
		$this->assertEquals(\OC::$SERVERROOT.'/lib/files/storage/local.php', $this->loader->findClass('\OC\Files\Storage\Local'));
	}

	public function testNoLeadingSlashOnClassName() {
		$this->assertEquals(\OC::$SERVERROOT.'/lib/files/storage/local.php', $this->loader->findClass('OC\Files\Storage\Local'));
	}

	public function testLegacyPath() {
		$this->assertEquals(\OC::$SERVERROOT.'/lib/legacy/config.php', $this->loader->findClass('OC_Config'));
	}

	public function testClassPath() {
		// can't find it without registerClass
		$this->assertFalse($this->loader->findClass('Patchwork\Utf8'));
		$this->loader->registerClass('Patchwork\Utf8', 'Patchwork/Utf8.php');
		$this->assertEquals(\OC::$SERVERROOT.'/3rdparty/Patchwork/Utf8.php', $this->loader->findClass('Patchwork\Utf8'));
	}

	public function testPrefixNamespace() {
		$this->assertFalse($this->loader->findClass('Patchwork\Utf8'));
		$this->loader->registerPrefix('Patchwork', '3rdparty');
		$this->assertEquals(\OC::$SERVERROOT.'/3rdparty/Patchwork/Utf8.php', $this->loader->findClass('Patchwork\Utf8'));
	}

	public function testPrefix() {
		$this->loader->registerPrefix('Sabre_', '3rdparty');
		$this->assertEquals(\OC::$SERVERROOT.'/3rdparty/Sabre/DAV/Node.php', $this->loader->findClass('Sabre_DAV_Node'));
	}

	public function testLoadTestNamespace() {
		$this->assertEquals(__FILE__, $this->loader->findClass('Test\AutoLoader'));
	}

	public function testLoadTest() {
		$this->assertEquals(__FILE__, $this->loader->findClass('Test_Autoloader'));
	}

	public function testLoadCoreNamespace() {
		$this->assertEquals(\OC::$SERVERROOT.'/lib/files/storage/local.php', $this->loader->findClass('OC\Files\Storage\Local'));
	}

	public function testLoadCore() {
		$this->assertEquals(\OC::$SERVERROOT.'/lib/files/storage/local.php', $this->loader->findClass('OC_Files_Storage_Local'));
	}

	public function testLoadPublicNamespace() {
		$this->assertEquals(\OC::$SERVERROOT.'/lib/public/db.php', $this->loader->findClass('OCP\DB'));
	}

	public function testLoadAppNamespace() {
		$this->assertStringEndsWith('apps/files/settings.php', $this->loader->findClass('OCA\Files\Settings'));
		$this->assertStringEndsWith('apps/files/lib/helper.php', $this->loader->findClass('OCA\Files\Helper'));
	}
}
