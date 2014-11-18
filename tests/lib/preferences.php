<?php
/**
 * Copyright (c) 2013 Christopher Schäpers <christopher@schaepers.it>
 * Copyright (c) 2013 Bart Visscher <bartv@thisnet.nl>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

class Test_Preferences_Object extends PHPUnit_Framework_TestCase {
	public function testGetUsers()
	{
		$statementMock = $this->getMock('\Doctrine\DBAL\Statement', array(), array(), '', false);
		$statementMock->expects($this->exactly(2))
			->method('fetchColumn')
			->will($this->onConsecutiveCalls('foo', false));
		$connectionMock = $this->getMock('\OC\DB\Connection', array(), array(), '', false);
		$connectionMock->expects($this->once())
			->method('executeQuery')
			->with($this->equalTo('SELECT DISTINCT `userid` FROM `*PREFIX*preferences`'))
			->will($this->returnValue($statementMock));

		$preferences = new OC\Preferences($connectionMock);
		$apps = $preferences->getUsers();
		$this->assertEquals(array('foo'), $apps);
	}

	public function testSetValue()
	{
		$connectionMock = $this->getMock('\OC\DB\Connection', array(), array(), '', false);
		$connectionMock->expects($this->exactly(2))
			->method('fetchColumn')
			->with($this->equalTo('SELECT `configvalue` FROM `*PREFIX*preferences`'
				.' WHERE `userid` = ? AND `appid` = ? AND `configkey` = ?'),
				$this->equalTo(array('grg', 'bar', 'foo')))
			->will($this->onConsecutiveCalls(false, 'v1'));
		$connectionMock->expects($this->once())
			->method('insert')
			->with($this->equalTo('*PREFIX*preferences'),
				$this->equalTo(
					array(
						'userid' => 'grg',
						'appid' => 'bar',
						'configkey' => 'foo',
						'configvalue' => 'v1',
					)
				));
		$connectionMock->expects($this->once())
			->method('executeUpdate')
			->with($this->equalTo("UPDATE `*PREFIX*preferences` SET `configvalue` = ?"
						. " WHERE `userid` = ? AND `appid` = ? AND `configkey` = ?"),
				$this->equalTo(array('v2', 'grg', 'bar', 'foo'))
				);

		$preferences = new OC\Preferences($connectionMock);
		$preferences->setValue('grg', 'bar', 'foo', 'v1');
		$preferences->setValue('grg', 'bar', 'foo', 'v2');
	}

	public function testSetValueUnchanged() {
		$connectionMock = $this->getMock('\OC\DB\Connection', array(), array(), '', false);
		$connectionMock->expects($this->exactly(3))
			->method('fetchColumn')
			->with($this->equalTo('SELECT `configvalue` FROM `*PREFIX*preferences`'
				.' WHERE `userid` = ? AND `appid` = ? AND `configkey` = ?'),
				$this->equalTo(array('grg', 'bar', 'foo')))
			->will($this->onConsecutiveCalls(false, 'v1', 'v1'));
		$connectionMock->expects($this->once())
			->method('insert')
			->with($this->equalTo('*PREFIX*preferences'),
				$this->equalTo(
					array(
						'userid' => 'grg',
						'appid' => 'bar',
						'configkey' => 'foo',
						'configvalue' => 'v1',
					)
				));
		$connectionMock->expects($this->never())
			->method('executeUpdate');

		$preferences = new OC\Preferences($connectionMock);
		$preferences->setValue('grg', 'bar', 'foo', 'v1');
		$preferences->setValue('grg', 'bar', 'foo', 'v1');
		$preferences->setValue('grg', 'bar', 'foo', 'v1');
	}

	public function testSetValueUnchanged2() {
		$connectionMock = $this->getMock('\OC\DB\Connection', array(), array(), '', false);
		$connectionMock->expects($this->exactly(3))
			->method('fetchColumn')
			->with($this->equalTo('SELECT `configvalue` FROM `*PREFIX*preferences`'
				.' WHERE `userid` = ? AND `appid` = ? AND `configkey` = ?'),
				$this->equalTo(array('grg', 'bar', 'foo')))
			->will($this->onConsecutiveCalls(false, 'v1', 'v2'));
		$connectionMock->expects($this->once())
			->method('insert')
			->with($this->equalTo('*PREFIX*preferences'),
				$this->equalTo(
					array(
						'userid' => 'grg',
						'appid' => 'bar',
						'configkey' => 'foo',
						'configvalue' => 'v1',
					)
				));
		$connectionMock->expects($this->once())
			->method('executeUpdate')
			->with($this->equalTo("UPDATE `*PREFIX*preferences` SET `configvalue` = ?"
						. " WHERE `userid` = ? AND `appid` = ? AND `configkey` = ?"),
				$this->equalTo(array('v2', 'grg', 'bar', 'foo'))
				);

		$preferences = new OC\Preferences($connectionMock);
		$preferences->setValue('grg', 'bar', 'foo', 'v1');
		$preferences->setValue('grg', 'bar', 'foo', 'v2');
		$preferences->setValue('grg', 'bar', 'foo', 'v2');
	}

	protected function assertUserValues($values) {
		$this->assertEquals(2, sizeof($values));

		$this->assertArrayHasKey('SomeUser', $values);
		$this->assertEquals('somevalue', $values['SomeUser']);

		$this->assertArrayHasKey('AnotherUser', $values);
		$this->assertEquals('someothervalue', $values['AnotherUser']);
	}

	public function testDeleteKey()
	{
		$connectionMock = $this->getMock('\OC\DB\Connection', array(), array(), '', false);
		$connectionMock->expects($this->once())
			->method('delete')
			->with($this->equalTo('*PREFIX*preferences'),
				$this->equalTo(
					array(
						'userid' => 'grg',
						'appid' => 'bar',
						'configkey' => 'foo',
					)
				));

		$preferences = new OC\Preferences($connectionMock);
		$preferences->deleteKey('grg', 'bar', 'foo');
	}

	public function testDeleteApp()
	{
		$connectionMock = $this->getMock('\OC\DB\Connection', array(), array(), '', false);
		$connectionMock->expects($this->once())
			->method('delete')
			->with($this->equalTo('*PREFIX*preferences'),
				$this->equalTo(
					array(
						'userid' => 'grg',
						'appid' => 'bar',
					)
				));

		$preferences = new OC\Preferences($connectionMock);
		$preferences->deleteApp('grg', 'bar');
	}

	public function testDeleteUser()
	{
		$connectionMock = $this->getMock('\OC\DB\Connection', array(), array(), '', false);
		$connectionMock->expects($this->once())
			->method('delete')
			->with($this->equalTo('*PREFIX*preferences'),
				$this->equalTo(
					array(
						'userid' => 'grg',
					)
				));

		$preferences = new OC\Preferences($connectionMock);
		$preferences->deleteUser('grg');
	}
}
