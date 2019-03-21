<?php
/**
 * Copyright (c) 2013 Bart Visscher <bartv@thisnet.nl>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Template;

use OC\App\AppManager;
use OC\Template\ResourceNotFoundException;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamWrapper;

class ResourceLocatorTest extends \Test\TestCase {
	/** @var \PHPUnit\Framework\MockObject\MockObject */
	protected $logger;
	protected $root;
	
	protected $filenames = [
		'test1.js',
		'test2.js'
	];
	
	protected function setUp() {
		parent::setUp();
		$this->logger = $this->createMock('OCP\ILogger');
		
		vfsStreamWrapper::register();
		$root = vfsStream::newDirectory('resources');
		vfsStreamWrapper::setRoot($root);
		
		$file = vfsStream::newFile($this->filenames[0]);
		$root->addChild($file);
		
		$file = vfsStream::newFile($this->filenames[1]);
		$root->addChild($file);
	}

	/**
	 * @param string $theme
	 * @param array $core_map
	 * @param array $appsRoots
	 * @return \PHPUnit\Framework\MockObject\MockObject
	 */
	public function getResourceLocator($theme, $core_map, $appsRoots) {
		$themeInstance = $this->createMock('OC\Theme\Theme');
		$themeInstance->method('getName')->willReturn($theme);

		$appManagerInstance = $this->createMock(AppManager::class);

		return $this->getMockForAbstractClass('OC\Template\ResourceLocator',
			[$themeInstance, $appManagerInstance, $this->logger, $core_map, $appsRoots],
			'', true, true, true, []);
	}

	public function testConstructor() {
		$locator = $this->getResourceLocator('theme', ['core'=>'map'], ['foo'=>'bar']);
		$this->assertAttributeInstanceOf('OC\Theme\Theme', 'theme', $locator);
		$this->assertAttributeEquals('core', 'serverroot', $locator);
		$this->assertAttributeEquals(['core'=>'map'], 'mapping', $locator);
		$this->assertAttributeEquals('map', 'webroot', $locator);
		$this->assertAttributeEquals([], 'resources', $locator);
	}

	public function testFind() {
		$locator = $this->getResourceLocator('theme',
			['core' => 'map'], ['foo' => 'bar']);
		$locator->expects($this->once())
			->method('doFind')
			->with('foo');
		$locator->expects($this->once())
			->method('doFindTheme')
			->with('foo');
		/** @var \OC\Template\ResourceLocator $locator */
		$locator->find(['foo']);
	}

	public function testFindNotFound() {
		$locator = $this->getResourceLocator('theme', ['core'=>'map'], ['foo'=>'bar']);
		$locator->expects($this->once())
			->method('doFind')
			->with('foo')
			->will($this->throwException(new ResourceNotFoundException('foo', 'map')));
		$locator->expects($this->once())
			->method('doFindTheme')
			->with('foo')
			->will($this->throwException(new ResourceNotFoundException('foo', 'map')));
		$this->logger->expects($this->exactly(2))
			->method('error')
			->with($this->stringContains('map/foo'));
		/** @var \OC\Template\ResourceLocator $locator */
		$locator->find(['foo']);
	}

	public function testAppendOnceIfExist() {
		
		/** @var \OC\Template\ResourceLocator $locator */
		$locator = $this->getResourceLocator('theme', [__DIR__=>'map'], ['foo'=>'bar']);
		
		$method = new \ReflectionMethod($locator, 'appendOnceIfExist');
		$method->setAccessible(true);

		$method->invoke($locator, __DIR__, \basename(__FILE__), 'webroot');
		$resource1 = [__DIR__, 'webroot', \basename(__FILE__)];
		$this->assertEquals([__FILE__ => $resource1], $locator->getResources());

		$method->invoke($locator, __DIR__, \basename(__FILE__));
		$this->assertEquals([__FILE__ => $resource1], $locator->getResources());

		$method->invoke($locator, __DIR__, 'does-not-exist');
		$this->assertEquals([__FILE__ => $resource1], $locator->getResources());
	}
}
