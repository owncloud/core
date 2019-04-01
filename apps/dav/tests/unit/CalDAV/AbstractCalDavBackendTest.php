<?php
/**
 * @author Thomas Citharel <tcit@tcit.fr>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
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

namespace OCA\DAV\Tests\unit\CalDAV;

use OCA\DAV\CalDAV\CalDavBackend;
use OCA\DAV\Connector\Sabre\Principal;
use OCA\DAV\DAV\GroupPrincipalBackend;
use OCP\IConfig;
use OCP\Security\ISecureRandom;
use Sabre\CalDAV\Xml\Property\ScheduleCalendarTransp;
use Sabre\CalDAV\Xml\Property\SupportedCalendarComponentSet;
use Test\TestCase;

/**
 * Class CalDavBackendTest
 *
 * @group DB
 *
 * @package OCA\DAV\Tests\unit\CalDAV
 */
abstract class AbstractCalDavBackendTest extends TestCase {

	/** @var CalDavBackend */
	protected $backend;

	/** @var Principal | \PHPUnit\Framework\MockObject\MockObject */
	protected $principal;

	/** @var GroupPrincipalBackend | \PHPUnit\Framework\MockObject\MockObject */
	protected $groupPrincipal;

	/** @var IConfig */
	protected $config;

	const UNIT_TEST_USER = 'principals/users/caldav-unit-test';
	const UNIT_TEST_USER1 = 'principals/users/caldav-unit-test1';
	const UNIT_TEST_GROUP = 'principals/groups/caldav-unit-test-group';

	/** @var ISecureRandom */
	private $random;

	public function setUp() {
		parent::setUp();

		$this->principal = $this->getMockBuilder(Principal::class)
			->disableOriginalConstructor()
			->setMethods(['getPrincipalByPath', 'getGroupMembership'])
			->getMock();
		$this->principal->expects($this->any())->method('getPrincipalByPath')
			->willReturn([
				'uri' => 'principals/best-friend'
			]);
		$this->principal->expects($this->any())->method('getGroupMembership')
			->withAnyParameters()
			->willReturn([self::UNIT_TEST_GROUP]);

		$this->groupPrincipal = $this->createMock(GroupPrincipalBackend::class);
		$db = \OC::$server->getDatabaseConnection();
		$this->config = \OC::$server->getConfig();
		$this->random = \OC::$server->getSecureRandom();
		$this->backend = new CalDavBackend($db, $this->principal, $this->groupPrincipal, $this->random);

		$this->tearDown();
	}

	public function tearDown() {
		parent::tearDown();

		if ($this->backend === null) {
			return;
		}
		$books = $this->backend->getCalendarsForUser(self::UNIT_TEST_USER);
		foreach ($books as $book) {
			$this->backend->deleteCalendar($book['id']);
		}
		$subscriptions = $this->backend->getSubscriptionsForUser(self::UNIT_TEST_USER);
		foreach ($subscriptions as $subscription) {
			$this->backend->deleteSubscription($subscription['id']);
		}
	}

	/**
	 * @return int
	 * @throws \Sabre\DAV\Exception
	 */
	protected function createTestCalendar() {
		$this->backend->createCalendar(self::UNIT_TEST_USER, 'Example', [
			'{http://apple.com/ns/ical/}calendar-color' => '#1C4587FF',
			'{urn:ietf:params:xml:ns:caldav}schedule-calendar-transp'  => new ScheduleCalendarTransp('opaque')
		]);
		$calendars = $this->backend->getCalendarsForUser(self::UNIT_TEST_USER);
		$this->assertCount(1, $calendars);
		$this->assertEquals(self::UNIT_TEST_USER, $calendars[0]['principaluri']);
		/** @var SupportedCalendarComponentSet $components */
		$components = $calendars[0]['{urn:ietf:params:xml:ns:caldav}supported-calendar-component-set'];
		$this->assertEquals(['VEVENT','VTODO'], $components->getValue());
		$color = $calendars[0]['{http://apple.com/ns/ical/}calendar-color'];
		$this->assertEquals('#1C4587FF', $color);
		$transparent = $calendars[0]['{urn:ietf:params:xml:ns:caldav}schedule-calendar-transp'];
		self::assertEquals(new ScheduleCalendarTransp('opaque'), $transparent);
		$this->assertEquals('Example', $calendars[0]['uri']);
		$this->assertEquals('Example', $calendars[0]['{DAV:}displayname']);
		return $calendars[0]['id'];
	}

	protected function createEvent($calendarId, $start = '20130912T130000Z', $end = '20130912T140000Z') {
		$calData = <<<EOD
BEGIN:VCALENDAR
VERSION:2.0
PRODID:ownCloud Calendar
BEGIN:VEVENT
CREATED;VALUE=DATE-TIME:20130910T125139Z
UID:47d15e3ec8
LAST-MODIFIED;VALUE=DATE-TIME:20130910T125139Z
DTSTAMP;VALUE=DATE-TIME:20130910T125139Z
SUMMARY:Test Event
DTSTART;VALUE=DATE-TIME:$start
DTEND;VALUE=DATE-TIME:$end
CLASS:PUBLIC
END:VEVENT
END:VCALENDAR
EOD;
		$uri0 = static::getUniqueID('event');
		$this->backend->createCalendarObject($calendarId, $uri0, $calData);

		return $uri0;
	}

	protected function assertAcl($principal, $privilege, $acl) {
		foreach ($acl as $a) {
			if ($a['principal'] === $principal && $a['privilege'] === $privilege) {
				$this->assertTrue(true);
				return;
			}
		}
		$this->fail("ACL does not contain $principal / $privilege");
	}

	protected function assertNotAcl($principal, $privilege, $acl) {
		foreach ($acl as $a) {
			if ($a['principal'] === $principal && $a['privilege'] === $privilege) {
				$this->fail("ACL contains $principal / $privilege");
				return;
			}
		}
		$this->assertTrue(true);
	}

	protected function assertAccess($shouldHaveAcl, $principal, $privilege, $acl) {
		if ($shouldHaveAcl) {
			$this->assertAcl($principal, $privilege, $acl);
		} else {
			$this->assertNotAcl($principal, $privilege, $acl);
		}
	}
}
