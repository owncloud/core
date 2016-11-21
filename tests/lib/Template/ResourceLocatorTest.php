<?php
/**
 * Copyright (c) 2013 Bart Visscher <bartv@thisnet.nl>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test\Template;

use OC\Template\ResourceNotFoundException;

class ResourceLocatorTest extends \Test\TestCase {
	/** @var \PHPUnit_Framework_MockObject_MockObject */
	protected $logger;
	protected static $jsResourcePath;

	public static function setUpBeforeClass()
	{
		self::$jsResourcePath = __DIR__ . '/jsresource.js';
		$jsResource = fopen(self::$jsResourcePath, 'w');
		fclose($jsResource);
	}
	
	public static function tearDownAfterClass()
	{
		unlink(self::$jsResourcePath);
	}
	
	protected function setUp() {
		parent::setUp();
		$this->logger = $this->createMock('OCP\ILogger');
		
	}
	
	protected function tearDown() {
		parent::tearDown();
		
	}

	/**
	 * @param string $theme
	 * @param array $core_map
	 * @param array $party_map
	 * @param array $appsRoots
	 * @return \PHPUnit_Framework_MockObject_MockObject
	 */
	public function getResourceLocator($theme, $core_map, $party_map, $appsRoots) {
		return $this->getMockForAbstractClass('OC\Template\ResourceLocator',
			[$this->logger, $theme, $core_map, $party_map, $appsRoots],
			'', true, true, true, []);
	}

	public function testConstructor() {
		$locator = $this->getResourceLocator('theme',
			['core'=>'map'], ['3rd'=>'party'], ['foo'=>'bar']);
		$this->assertAttributeEquals('theme', 'theme', $locator);
		$this->assertAttributeEquals('core', 'serverroot', $locator);
		$this->assertAttributeEquals(['core'=>'map','3rd'=>'party'], 'mapping', $locator);
		$this->assertAttributeEquals('3rd', 'thirdpartyroot', $locator);
		$this->assertAttributeEquals('map', 'webroot', $locator);
		$this->assertAttributeEquals([], 'resources', $locator);
	}

	public function testFind() {
		$locator = $this->getResourceLocator('theme',
			['core' => 'map'], ['3rd' => 'party'], ['foo' => 'bar']);
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
		$locator = $this->getResourceLocator('theme',
			['core'=>'map'], ['3rd'=>'party'], ['foo'=>'bar']);
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
		$locator = $this->getResourceLocator('theme',
			[__DIR__=>'map'], ['3rd'=>'party'], ['foo'=>'bar']);
		/** @var \OC\Template\ResourceLocator $locator */
		$method = new \ReflectionMethod($locator, 'appendOnceIfExist');
		$method->setAccessible(true);

		$method->invoke($locator, __DIR__, basename(__FILE__), 'webroot');
		$resource1 = [__DIR__, 'webroot', basename(__FILE__)];
		$this->assertEquals([__FILE__ => $resource1], $locator->getResources());

		$method->invoke($locator, __DIR__, basename(__FILE__));
		$this->assertEquals([__FILE__ => $resource1], $locator->getResources());

		$method->invoke($locator, __DIR__, 'does-not-exist');
		$this->assertEquals([__FILE__ => $resource1], $locator->getResources());
		
		$method->invoke($locator, __DIR__, 'jsresource.js');
		$resource2 = [__DIR__, 'map', 'jsresource.js'];
		$this->assertEquals([__FILE__ => $resource1, self::$jsResourcePath => $resource2], $locator->getResources());
	}
}
