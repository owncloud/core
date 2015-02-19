<?php
/**
 * Copyright (c) 2014 Lukas Reschke <lukas@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC;

class UpdaterTest extends \Test\TestCase {

	public function versionCompatibilityTestData() {
		return array(
			array('1.0.0.0', '2.2.0', true),
			array('1.1.1.1', '2.0.0', true),
			array('5.0.3', '4.0.3', false),
			array('12.0.3', '13.4.5', true),
			array('1', '2', true),
			array('2', '2', true),
			array('6.0.5', '6.0.6', true),
			array('5.0.6', '7.0.4', false)
		);
	}

	/**
	 * @dataProvider versionCompatibilityTestData
	 */
	public function testIsUpgradePossible($oldVersion, $newVersion, $result) {
		$updater = new Updater(\OC::$server->getHTTPHelper(), \OC::$server->getAppConfig(), \OC::$server->getAppManager());
		$this->assertSame($result, $updater->isUpgradePossible($oldVersion, $newVersion));
	}

	public function testBrokenXmlResponse(){
		$invalidUpdater = $this->getUpdaterMock('OMG!');
		$invalidResult = $invalidUpdater->check();
		$this->assertEmpty($invalidResult);
	}

	public function testEmptyResponse(){
		$emptyUpdater = $this->getUpdaterMock('');
		$emptyResult = $emptyUpdater->check();
		$this->assertEmpty($emptyResult);

		// Error while fetching new contents e.g. too many redirects
		$falseUpdater = $this->getUpdaterMock(false);
		$falseResult = $falseUpdater->check();
		$this->assertEmpty($falseResult);
	}

	public function testValidEmptyXmlResponse(){
		$updater = $this->getUpdaterMock(
				'<?xml version="1.0"?><owncloud><version></version><versionstring></versionstring><url></url><web></web></owncloud>'
		);
		$result = array_map('strval', $updater->check());

		$this->assertArrayHasKey('version', $result);
		$this->assertArrayHasKey('versionstring', $result);
		$this->assertArrayHasKey('url', $result);
		$this->assertArrayHasKey('web', $result);
		$this->assertEmpty($result['version']);
		$this->assertEmpty($result['versionstring']);
		$this->assertEmpty($result['url']);
		$this->assertEmpty($result['web']);
	}

	public function testValidUpdateResponse(){
		$newUpdater = $this->getUpdaterMock(
				'<?xml version="1.0"?>
<owncloud>
  <version>7.0.3.4</version>
  <versionstring>ownCloud 7.0.3</versionstring>
  <url>http://download.owncloud.org/community/owncloud-7.0.3.zip</url>
  <web>http://owncloud.org/</web>
</owncloud>'
		);
		$newResult = array_map('strval', $newUpdater->check());

		$this->assertArrayHasKey('version', $newResult);
		$this->assertArrayHasKey('versionstring', $newResult);
		$this->assertArrayHasKey('url', $newResult);
		$this->assertArrayHasKey('web', $newResult);
		$this->assertEquals('7.0.3.4', $newResult['version']);
		$this->assertEquals('ownCloud 7.0.3', $newResult['versionstring']);
		$this->assertEquals('http://download.owncloud.org/community/owncloud-7.0.3.zip', $newResult['url']);
		$this->assertEquals('http://owncloud.org/', $newResult['web']);
	}

	protected function getUpdaterMock($content){
		// Invalidate cache
		$mockedAppConfig = $this->getMockBuilder('\OC\AppConfig')
				->disableOriginalConstructor()
				->getMock()
		;

		$certificateManager = $this->getMock('\OCP\ICertificateManager');
		$mockedHTTPHelper = $this->getMockBuilder('\OC\HTTPHelper')
				->setConstructorArgs(array(\OC::$server->getConfig(), $certificateManager))
				->getMock()
		;

		$mockedHTTPHelper->expects($this->once())->method('getUrlContent')->will($this->returnValue($content));

		$mockedAppManager = $this->getMockBuilder('\OC\App\AppManager')
			->disableOriginalConstructor()
			->getMock();

		return new Updater($mockedHTTPHelper, $mockedAppConfig, $mockedAppManager);
	}

	public function testSortAppsByType() {
		$mockedAppManager = $this->getMockBuilder('\OC\App\AppManager')
			->disableOriginalConstructor()
			->getMock();

		$mockedAppManager->expects($this->exactly(3))
			->method('getEnabledAppsOfType')
			->will($this->returnCallback(function($type) {
				if($type === 'authentication') {
					return array('phonebookauth', 'pawauth');
				}
				if($type === 'filesystem') {
					return array('spacefs', 'undergroundfs', 'hyperfs');
				}
				if($type === 'logging') {
					return array('nulllog');
				}
				return array();
			}));

		$mockedAppManager->expects($this->once())
			->method('getEnabledAppsOfNoPriority')
			->will($this->returnValue(
				array('catpictures', 'soundnotifications', 'comics', 'calc.exe'))
			);

		$updater = new Updater(
			\OC::$server->getHTTPHelper(),
			\OC::$server->getAppConfig(),
			$mockedAppManager);

		$stacks = $updater->sortAppsByType();
		$this->assertSame(count($stacks), 4);
		$this->assertTrue(is_array($stacks['authentication']));
		$this->assertTrue(is_array($stacks['filesystem']));
		$this->assertTrue(is_array($stacks['logging']));
		$this->assertTrue(is_array($stacks['other']));
		$this->assertSame(count($stacks['authentication']), 2);
		$this->assertSame(count($stacks['filesystem']), 3);
		$this->assertSame(count($stacks['logging']), 1);
		$this->assertSame(count($stacks['other']), 4);

		//test stack order
		$categories = array('authentication', 'filesystem', 'logging', 'other');
		foreach($stacks as $category => $apps) {
			$this->assertSame($category, array_shift($categories));
		}

	}

}
