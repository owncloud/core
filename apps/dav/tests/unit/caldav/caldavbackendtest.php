<?php
/**
 * @author Lukas Reschke <lukas@owncloud.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */
namespace Tests\Connector\Sabre;

use OCA\DAV\CalDAV\CalDavBackend;
use Sabre\DAV\PropPatch;
use Test\TestCase;

/**
 * Class CalDavBackendTest
 *
 * @group DB
 *
 * @package Tests\Connector\Sabre
 */
class CalDavBackendTest extends TestCase {

	/** @var CalDavBackend */
	private $backend;

	const UNIT_TEST_USER = 'caldav-unit-test';


	public function setUp() {
		parent::setUp();

		$db = \OC::$server->getDatabaseConnection();
		$this->backend = new CalDavBackend($db);

		$this->tearDown();
	}

	public function tearDown() {
		parent::tearDown();

		if (is_null($this->backend)) {
			return;
		}
		$books = $this->backend->getCalendarsForUser(self::UNIT_TEST_USER);
		foreach ($books as $book) {
			$this->backend->deleteCalendar($book['id']);
		}
	}

	public function testCalendarOperations() {

		// create a new address book
		$this->backend->createCalendar(self::UNIT_TEST_USER, 'Example', []);

		$books = $this->backend->getCalendarsForUser(self::UNIT_TEST_USER);
		$this->assertEquals(1, count($books));

		// update it's display name
		$patch = new PropPatch([
			'{DAV:}displayname' => 'Unit test',
			'{urn:ietf:params:xml:ns:caldav}calendar-description' => 'Calendar used for unit testing'
		]);
		$this->backend->updateCalendar($books[0]['id'], $patch);
		$patch->commit();
		$books = $this->backend->getCalendarsForUser(self::UNIT_TEST_USER);
		$this->assertEquals(1, count($books));
		$this->assertEquals('Unit test', $books[0]['{DAV:}displayname']);
		$this->assertEquals('Calendar used for unit testing', $books[0]['{urn:ietf:params:xml:ns:caldav}calendar-description']);

		// delete the address book
		$this->backend->deleteCalendar($books[0]['id']);
		$books = $this->backend->getCalendarsForUser(self::UNIT_TEST_USER);
		$this->assertEquals(0, count($books));
	}

	public function testCardOperations() {
		// create a new address book
		$this->backend->createCalendar(self::UNIT_TEST_USER, 'Example', []);
		$calendars = $this->backend->getCalendarsForUser(self::UNIT_TEST_USER);
		$this->assertEquals(1, count($calendars));
		$calId = $calendars[0]['id'];

		// create a card
		$uri = $this->getUniqueID('calobj');
		$calData = <<<'EOD'
BEGIN:VCALENDAR
VERSION:2.0
PRODID:ownCloud Calendar
BEGIN:VEVENT
CREATED;VALUE=DATE-TIME:20130910T125139Z
UID:47d15e3ec8
LAST-MODIFIED;VALUE=DATE-TIME:20130910T125139Z
DTSTAMP;VALUE=DATE-TIME:20130910T125139Z
SUMMARY:Test Event
DTSTART;VALUE=DATE-TIME:20130912T130000Z
DTEND;VALUE=DATE-TIME:20130912T140000Z
CLASS:PUBLIC
END:VEVENT
END:VCALENDAR
EOD;

		$this->backend->createCalendarObject($calId, $uri, $calData);

		// get all the cards
		$calendarObjects = $this->backend->getCalendarObjects($calId);
		$this->assertEquals(1, count($calendarObjects));
		$this->assertEquals($calId, $calendarObjects[0]['calendarid']);

		// get the cards
		$calendarObject = $this->backend->getCalendarObject($calId, $uri);
		$this->assertNotNull($calendarObject);
		$this->assertArrayHasKey('id', $calendarObject);
		$this->assertArrayHasKey('uri', $calendarObject);
		$this->assertArrayHasKey('lastmodified', $calendarObject);
		$this->assertArrayHasKey('etag', $calendarObject);
		$this->assertArrayHasKey('size', $calendarObject);
		$this->assertEquals($calData, $calendarObject['calendardata']);

		// update the card
		$calData = <<<'EOD'
BEGIN:VCALENDAR
VERSION:2.0
PRODID:ownCloud Calendar
BEGIN:VEVENT
CREATED;VALUE=DATE-TIME:20130910T125139Z
UID:47d15e3ec8
LAST-MODIFIED;VALUE=DATE-TIME:20130910T125139Z
DTSTAMP;VALUE=DATE-TIME:20130910T125139Z
SUMMARY:Test Event
DTSTART;VALUE=DATE-TIME:20130912T130000Z
DTEND;VALUE=DATE-TIME:20130912T140000Z
END:VEVENT
END:VCALENDAR
EOD;
		$this->backend->updateCalendarObject($calId, $uri, $calData);
		$calendarObject = $this->backend->getCalendarObject($calId, $uri);
		$this->assertEquals($calData, $calendarObject['calendardata']);

		// delete the card
		$this->backend->deleteCalendarObject($calId, $uri);
		$calendarObjects = $this->backend->getCalendarObjects($calId);
		$this->assertEquals(0, count($calendarObjects));
	}

	public function testMultiCalendarObjects() {
		// create a new address book
		$this->backend->createCalendar(self::UNIT_TEST_USER, 'Example', []);
		$calendars = $this->backend->getCalendarsForUser(self::UNIT_TEST_USER);
		$this->assertEquals(1, count($calendars));
		$calendarId = $calendars[0]['id'];

		// create a card
		$calData = <<<'EOD'
BEGIN:VCALENDAR
VERSION:2.0
PRODID:ownCloud Calendar
BEGIN:VEVENT
CREATED;VALUE=DATE-TIME:20130910T125139Z
UID:47d15e3ec8
LAST-MODIFIED;VALUE=DATE-TIME:20130910T125139Z
DTSTAMP;VALUE=DATE-TIME:20130910T125139Z
SUMMARY:Test Event
DTSTART;VALUE=DATE-TIME:20130912T130000Z
DTEND;VALUE=DATE-TIME:20130912T140000Z
CLASS:PUBLIC
END:VEVENT
END:VCALENDAR
EOD;
		$uri0 = $this->getUniqueID('card');
		$this->backend->createCalendarObject($calendarId, $uri0, $calData);
		$uri1 = $this->getUniqueID('card');
		$this->backend->createCalendarObject($calendarId, $uri1, $calData);
		$uri2 = $this->getUniqueID('card');
		$this->backend->createCalendarObject($calendarId, $uri2, $calData);

		// get all the cards
		$calendarObjects = $this->backend->getCalendarObjects($calendarId);
		$this->assertEquals(3, count($calendarObjects));

		// get the cards
		$calendarObjects = $this->backend->getMultipleCalendarObjects($calendarId, [$uri1, $uri2]);
		$this->assertEquals(2, count($calendarObjects));
		foreach($calendarObjects as $card) {
			$this->assertArrayHasKey('id', $card);
			$this->assertArrayHasKey('uri', $card);
			$this->assertArrayHasKey('lastmodified', $card);
			$this->assertArrayHasKey('etag', $card);
			$this->assertArrayHasKey('size', $card);
			$this->assertEquals($calData, $card['calendardata']);
		}

		// delete the card
		$this->backend->deleteCalendarObject($calendarId, $uri0);
		$this->backend->deleteCalendarObject($calendarId, $uri1);
		$this->backend->deleteCalendarObject($calendarId, $uri2);
		$calendarObjects = $this->backend->getCalendarObjects($calendarId);
		$this->assertEquals(0, count($calendarObjects));
	}

}
