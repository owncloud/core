<?php

namespace Test;

class ContactsManagerTest extends \Test\TestCase {
	/** @var \OC\ContactsManager */
	private $cm;

	protected function setUp(): void {
		parent::setUp();
		$this->cm = new \OC\ContactsManager();
	}

	public function searchProvider() {
		$search1 = [
			0 => [
				'N' => [0 => '', 1 => 'Jan', 2 => 'Jansen', 3 => '', 4 => '',],
				'UID' => '04ada7f5-01f9-4309-9c82-6b555b2170ed',
				'FN' => 'Jan Jansen',
				'id' => '1',
				'addressbook-key' => 'simple:1',
			],
			0 => [
				'N' => [0 => '', 1 => 'Tom', 2 => 'Peeters', 3 => '', 4 => '',],
				'UID' => '04ada7f5-01f9-4309-9c82-2345-2345--6b555b2170ed',
				'FN' => 'Tom Peeters',
				'id' => '2',
				'addressbook-key' => 'simple:1',
			],
		];

		$search2 = [
			0 => [
				'N' => [0 => '', 1 => 'fg', 2 => '', 3 => '', 4 => '',],
				'UID' => '04ada234h5jh357f5-01f9-4309-9c82-6b555b2170ed',
				'FN' => 'Jan Rompuy',
				'id' => '1',
				'addressbook-key' => 'simple:2',
			],
			0 => [
				'N' => [0 => '', 1 => 'fg', 2 => '', 3 => '', 4 => '',],
				'UID' => '04ada7f5-01f9-4309-345kj345j9c82-2345-2345--6b555b2170ed',
				'FN' => 'Tim Peeters',
				'id' => '2',
				'addressbook-key' => 'simple:2',
			],
		];

		$expectedResult =  \array_merge($search1, $search2);
		return [
			[
				$search1,
				$search2,
				$expectedResult
			]
		];
	}

	/**
	 * @dataProvider searchProvider
	 */
	public function testSearch($search1, $search2, $expectedResult) {
		$addressbook1 = $this->getMockBuilder('\OCP\IAddressBook')
			->disableOriginalConstructor()
			->getMock();

		$addressbook1->expects($this->once())
			->method('search')
			->willReturn($search1);

		$addressbook1->expects($this->any())
			->method('getKey')
			->willReturn('simple:1');

		$addressbook2 = $this->getMockBuilder('\OCP\IAddressBook')
			->disableOriginalConstructor()
			->getMock();

		$addressbook2->expects($this->once())
			->method('search')
			->willReturn($search2);

		$addressbook2->expects($this->any())
			->method('getKey')
			->willReturn('simple:2');

		$this->cm->registerAddressBook($addressbook1);
		$this->cm->registerAddressBook($addressbook2);
		$result =  $this->cm->search('');
		$this->assertEquals($expectedResult, $result);
	}

	public function testDeleteHavePermission() {
		$addressbook = $this->getMockBuilder('\OCP\IAddressBook')
			->disableOriginalConstructor()
			->getMock();

		$addressbook->expects($this->any())
			->method('getPermissions')
			->willReturn(\OCP\Constants::PERMISSION_ALL);

		$addressbook->expects($this->once())
			->method('delete')
			->willReturn('returnMe');

		$this->cm->registerAddressBook($addressbook);
		$result = $this->cm->delete(1, $addressbook->getKey());
		$this->assertEquals($result, 'returnMe');
	}

	public function testDeleteNoPermission() {
		$addressbook = $this->getMockBuilder('\OCP\IAddressBook')
			->disableOriginalConstructor()
			->getMock();

		$addressbook->expects($this->any())
			->method('getPermissions')
			->willReturn(\OCP\Constants::PERMISSION_READ);

		$addressbook->expects($this->never())
			->method('delete');

		$this->cm->registerAddressBook($addressbook);
		$result = $this->cm->delete(1, $addressbook->getKey());
		$this->assertNull($result);
	}

	public function testDeleteNoAddressbook() {
		$addressbook = $this->getMockBuilder('\OCP\IAddressBook')
			->disableOriginalConstructor()
			->getMock();

		$addressbook->expects($this->never())
			->method('delete');

		$this->cm->registerAddressBook($addressbook);
		$result = $this->cm->delete(1, 'noaddressbook');
		$this->assertNull($result);
	}

	public function testCreateOrUpdateHavePermission() {
		$addressbook = $this->getMockBuilder('\OCP\IAddressBook')
			->disableOriginalConstructor()
			->getMock();

		$addressbook->expects($this->any())
			->method('getPermissions')
			->willReturn(\OCP\Constants::PERMISSION_ALL);

		$addressbook->expects($this->once())
			->method('createOrUpdate')
			->willReturn('returnMe');

		$this->cm->registerAddressBook($addressbook);
		$result = $this->cm->createOrUpdate([], $addressbook->getKey());
		$this->assertEquals($result, 'returnMe');
	}

	public function testCreateOrUpdateNoPermission() {
		$addressbook = $this->getMockBuilder('\OCP\IAddressBook')
			->disableOriginalConstructor()
			->getMock();

		$addressbook->expects($this->any())
			->method('getPermissions')
			->willReturn(\OCP\Constants::PERMISSION_READ);

		$addressbook->expects($this->never())
			->method('createOrUpdate');

		$this->cm->registerAddressBook($addressbook);
		$result = $this->cm->createOrUpdate([], $addressbook->getKey());
		$this->assertNull($result);
	}

	public function testCreateOrUpdateNOAddressbook() {
		$addressbook = $this->getMockBuilder('\OCP\IAddressBook')
			->disableOriginalConstructor()
			->getMock();

		$addressbook->expects($this->never())
			->method('createOrUpdate');

		$this->cm->registerAddressBook($addressbook);
		$result = $this->cm->createOrUpdate([], 'noaddressbook');
		$this->assertNull($result);
	}

	public function testIsEnabledIfNot() {
		$result = $this->cm->isEnabled();
		$this->assertFalse($result);
	}

	public function testIsEnabledIfSo() {
		$addressbook = $this->getMockBuilder('\OCP\IAddressBook')
			->disableOriginalConstructor()
			->getMock();

		$this->cm->registerAddressBook($addressbook);
		$result = $this->cm->isEnabled();
		$this->assertTrue($result);
	}
}
