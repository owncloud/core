<?php
/**
 * Copyright (c) 2014 Bjoern Schiessle <schiessle@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace Test;
use OC\Helper\EnvironmentHelper;
use OC\URLGenerator;
use OCP\ICacheFactory;
use OCP\IConfig;
use OCP\IURLGenerator;
use OCP\Route\IRouter;

/**
 * Class UrlGeneratorTest
 */
class UrlGeneratorTest extends TestCase {

	/** @var IURLGenerator */
	private $urlGenerator;
	/** @var IRouter | \PHPUnit_Framework_MockObject_MockObject */
	private $router;

	/** @var EnvironmentHelper | \PHPUnit_Framework_MockObject_MockObject */
	private $environmentHelper;

	public function setUp() {
		parent::setUp();
		$config = $this->createMock(IConfig::class);
		$cacheFactory = $this->createMock(ICacheFactory::class);
		$this->router = $this->createMock(IRouter::class);
		$this->environmentHelper = $this->createMock(EnvironmentHelper::class);
		$this->urlGenerator = new URLGenerator(
			$config,
			$cacheFactory,
			$this->router,
			$this->environmentHelper
		);
	}

	/**
	 * @small
	 * test linkTo URL construction
	 * @dataProvider provideDocRootAppUrlParts
	 */
	public function testLinkToDocRoot($app, $file, $args, $expectedResult) {
		$this->environmentHelper->expects($this->any())
			->method('getWebRoot')
			->willReturn('');

		$result = $this->urlGenerator->linkTo($app, $file, $args);
		$this->assertEquals($expectedResult, $result);
	}

	/**
	 * @small
	 * test linkTo URL construction in sub directory
	 * @dataProvider provideSubDirAppUrlParts
	 */
	public function testLinkToSubDir($app, $file, $args, $expectedResult) {
		$this->environmentHelper->expects($this->any())
			->method('getWebRoot')
			->willReturn('/owncloud');

		$result = $this->urlGenerator->linkTo($app, $file, $args);
		$this->assertEquals($expectedResult, $result);
	}

	public function testLinkToRouteAbsolute() {
		$route = 'files_ajax_list';
		$this->environmentHelper->expects($this->any())
			->method('getWebRoot')
			->willReturn('/owncloud');
		$this->router->expects($this->once())->method('generate')
			->with($route)->willReturn('index.php/apps/files/ajax/list.php');

		$result = $this->urlGenerator->linkToRouteAbsolute($route);
		$this->assertEquals('http://localhost/owncloud/index.php/apps/files/ajax/list.php', $result);
	}

	public function provideDocRootAppUrlParts() {
		return [
			['files', 'ajax/list.php', [], '/index.php/apps/files/ajax/list.php'],
			['files', 'ajax/list.php', ['trut' => 'trat', 'dut' => 'dat'], '/index.php/apps/files/ajax/list.php?trut=trat&dut=dat'],
			['', 'index.php', ['trut' => 'trat', 'dut' => 'dat'], '/index.php?trut=trat&dut=dat'],
		];
	}

	public function provideSubDirAppUrlParts() {
		return [
			['files', 'ajax/list.php', [], '/owncloud/index.php/apps/files/ajax/list.php'],
			['files', 'ajax/list.php', ['trut' => 'trat', 'dut' => 'dat'], '/owncloud/index.php/apps/files/ajax/list.php?trut=trat&dut=dat'],
			['', 'index.php', ['trut' => 'trat', 'dut' => 'dat'], '/owncloud/index.php?trut=trat&dut=dat'],
		];
	}

	/**
	 * @small
	 * test absolute URL construction
	 * @dataProvider provideDocRootURLs
	 */
	public function testGetAbsoluteURLDocRoot($url, $expectedResult) {
		$this->environmentHelper->expects($this->any())
			->method('getWebRoot')
			->willReturn('');

		$result = $this->urlGenerator->getAbsoluteURL($url);
		$this->assertEquals($expectedResult, $result);
	}

	/**
	 * @small
	 * test absolute URL construction
	 * @dataProvider provideSubDirURLs
	 */
	public function testGetAbsoluteURLSubDir($url, $expectedResult) {
		$this->environmentHelper->expects($this->any())
			->method('getWebRoot')
			->willReturn('/owncloud');

		$result = $this->urlGenerator->getAbsoluteURL($url);
		$this->assertEquals($expectedResult, $result);
	}

	public function provideDocRootURLs() {
		return [
			["index.php", "http://localhost/index.php"],
			["/index.php", "http://localhost/index.php"],
			["/apps/index.php", "http://localhost/apps/index.php"],
			["apps/index.php", "http://localhost/apps/index.php"],
		];
	}

	public function provideSubDirURLs() {
		return [
			["index.php", "http://localhost/owncloud/index.php"],
			["/index.php", "http://localhost/owncloud/index.php"],
			["/apps/index.php", "http://localhost/owncloud/apps/index.php"],
			["apps/index.php", "http://localhost/owncloud/apps/index.php"],
		];
	}
}
