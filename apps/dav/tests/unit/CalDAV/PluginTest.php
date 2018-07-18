<?php

namespace OCA\DAV\Tests\unit\CalDAV;

use OCA\DAV\CalDAV\BirthdayService;
use OCA\DAV\CalDAV\Calendar;
use OCA\DAV\CalDAV\Plugin;
use Sabre\DAV\PropFind;
use Sabre\DAV\Xml\Property\ShareAccess;
use Test\TestCase;

class PluginTest extends TestCase {

	/** @var Plugin */
	private $plugin;

	protected function setUp() {
		parent::setUp();

		$this->plugin = new Plugin();
	}

	public function testPropFind() {
		$propFind = new PropFind('/calendar/user/birthday_calendar', [
			'{DAV:}share-access'
		]);
		$node = $this->createMock(Calendar::class);
		$node->method('getName')->willReturn(BirthdayService::BIRTHDAY_CALENDAR_URI);
		$this->plugin->propFind($propFind, $node);

		$this->assertEquals(200, $propFind->getStatus('{DAV:}share-access'));
		$this->assertInstanceOf(ShareAccess::class, $propFind->get('{DAV:}share-access'));
		$this->assertEquals(\Sabre\DAV\Sharing\Plugin::ACCESS_NOACCESS, $propFind->get('{DAV:}share-access')->getValue());
	}

	public function testGetCalendarHomeForPrincipal() {
		$calendarHome = $this->plugin->getCalendarHomeForPrincipal('principals/users/alice');
		$this->assertEquals('calendars/alice', $calendarHome);
	}
}
