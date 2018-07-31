<?php
/**
 * Copyright (c) 2013 Thomas Müller <thomas.mueller@tmit.eu>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test;

use OC\AutoLoader;

class AutoLoaderTest extends TestCase {
	/**
	 * @var Autoloader $loader
	 */
	private $loader;

	protected function setUp() {
		parent::setUp();
		$this->loader = new AutoLoader();
	}

	public function testLoadPublicNamespace(): void {
		$this->assertEquals([], $this->loader->findClass('OCP\Foo\Bar'));
	}

	public function testLoadAppNamespace(): void {
		$result = $this->loader->findClass('OCA\Files\Foobar');
		$this->assertCount(2, $result);
		$this->assertStringEndsWith('apps/files/foobar.php', $result[0]);
		$this->assertStringEndsWith('apps/files/lib/foobar.php', $result[1]);
	}

	public function testLoadCoreNamespaceCore(): void {
		$this->assertEquals([], $this->loader->findClass('OC\Core\Foo\Bar'));
	}

	public function testLoadCoreNamespaceSettings(): void {
		$this->assertEquals([], $this->loader->findClass('OC\Settings\Foo\Bar'));
	}
}
