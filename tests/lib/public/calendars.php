<?php
/**
 * ownCloud
 *
 * @author Thomas Müller
 * @copyright 2014 Thomas Müller thomas.mueller@tmit.eu
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

class Test_Calendars extends \Test\TestCase {

	protected function setUp() {
		parent::setUp();
	}

	public function testDisabledIfEmpty() {
		$calendarManager = new \OC\CalendarManager();
		// pretty simple
		$this->assertFalse($calendarManager->isEnabled());
	}

	public function testEnabledAfterRegister() {
		// create mock for the calendar
		$stub = $this->getMockForAbstractClass("OCP\ICalendar", array('getKey'));

		// we expect getKey to be called twice:
		// first time on register
		// second time on un-register
		$stub->expects($this->exactly(2))
			->method('getKey');

		$calendarManager = new \OC\CalendarManager();

		// not enabled before register
		$this->assertFalse($calendarManager->isEnabled());

		// register the address book
		$calendarManager->registerCalendar($stub);

		// contacts api shall be enabled
		$this->assertTrue($calendarManager->isEnabled());

		// unregister the address book
		$calendarManager->unregisterCalendar($stub);

		// not enabled after register
		$this->assertFalse($calendarManager->isEnabled());
	}

	public function testCalendarEnumeration() {
		// create mock for the calendar
		$stub = $this->getMockForAbstractClass("OCP\ICalendar", array('getKey', 'getDisplayName'));

		// setup return for method calls
		$stub->expects($this->any())
			->method('getKey')
			->will($this->returnValue('SIMPLE_CALENDAR'));
		$stub->expects($this->any())
			->method('getDisplayName')
			->will($this->returnValue('A very simple calendar'));

		$calendarManager = new \OC\CalendarManager();

		// register the calendar
		$calendarManager->registerCalendar($stub);
		$all_books = $calendarManager->getCalendars();

		$this->assertEquals(1, count($all_books));
		$this->assertEquals('A very simple calendar', $all_books['SIMPLE_CALENDAR']);
	}

	public function testSearchInAddressBook() {
		// create mock for the addressbook
		$stub1 = $this->getMockForAbstractClass("OCP\ICalendar", array('getKey', 'getDisplayName', 'search'));
		$stub2 = $this->getMockForAbstractClass("OCP\ICalendar", array('getKey', 'getDisplayName', 'search'));

		$searchResult1 = array(
			array('id' => 0, 'SUMMARY' => 'Meeting 1'),
			array('id' => 5, 'SUMMARY' => 'Meeting 2'),
		);
		$searchResult2 = array(
			array('id' => 0, 'SUMMARY' => 'Hack-Week Berlin'),
			array('id' => 5, 'SUMMARY' => 'Hack-Week Stuttgart'),
		);

		// setup return for method calls for $stub1
		$stub1->expects($this->any())->method('getKey')->will($this->returnValue('SIMPLE_CALENDAR1'));
		$stub1->expects($this->any())->method('getDisplayName')->will($this->returnValue('Calendar of ownCloud Inc'));
		$stub1->expects($this->any())->method('search')->will($this->returnValue($searchResult1));

		// setup return for method calls for $stub2
		$stub2->expects($this->any())->method('getKey')->will($this->returnValue('SIMPLE_CALENDAR2'));
		$stub2->expects($this->any())->method('getDisplayName')->will($this->returnValue('Calendar of ownCloud Community'));
		$stub2->expects($this->any())->method('search')->will($this->returnValue($searchResult2));

		// register the calendars
		$calendarManager = new \OC\CalendarManager();
		$calendarManager->registerCalendar($stub1);
		$calendarManager->registerCalendar($stub2);
		$allCals = $calendarManager->getCalendars();

		// assert the count - doesn't hurt
		$this->assertEquals(2, count($allCals));

		// perform the search
		$result = $calendarManager->search('x', array());

		// we expect 4 hits
		$this->assertEquals(4, count($result));

	}
}
