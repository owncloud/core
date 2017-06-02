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

namespace OC {

	class CalendarManager implements \OCP\Calendar\IManager {

		/**
		 * @var \OCP\ICalendar[]
		 */
		private $calendars = [];

		/**
		 * @var \Closure[] to call to load/register calendars
		 */
		private $calendarLoaders = [];

		public function search($pattern, $searchProperties = array(), $options = array()) {
			$this->loadCalendars();
			$result = array();
			foreach($this->calendars as $cal) {
				$r = $cal->search($pattern, $searchProperties, $options);
				$contacts = array();
				foreach($r as $c){
					$c['calendar-key'] = $cal->getKey();
					$contacts[] = $c;
				}
				$result = array_merge($result, $contacts);
			}

			return $result;
		}

		/**
		 * This function can be used to delete the contact identified by the given id
		 *
		 * @param object $id the unique identifier to an event/task
		 * @param string $calendarKey identifier of the calendar in which the task/event shall be deleted
		 * @return bool successful or not
		 */
		public function delete($id, $calendarKey) {
			$cal = $this->getCalendar($calendarKey);
			if (!$cal) {
				return null;
			}

			if ($cal->getPermissions() & \OCP\Constants::PERMISSION_DELETE) {
				return $cal->delete($id);
			}

			return null;
		}

		/**
		 * @param array $properties this array if key-value-pairs defines a task/event
		 * @param string $calendarKey identifier of the calendar in which the task/event shall be created or updated
		 * @return array an array representing the task/event just created or updated
		 */
		public function createOrUpdate($properties, $calendarKey) {
			$cal = $this->getCalendar($calendarKey);
			if (!$cal) {
				return null;
			}

			if ($cal->getPermissions() & \OCP\Constants::PERMISSION_CREATE) {
				return $cal->createOrUpdate($properties);
			}

			return null;
		}

		/**
		 * @return bool true if enabled, false if not
		 */
		public function isEnabled() {
			return !empty($this->calendars) || !empty($this->calendarLoaders);
		}

		/**
		 * @param \OCP\ICalendar $calendar
		 */
		public function registerCalendar(\OCP\ICalendar $calendar) {
			$this->calendars[$calendar->getKey()] = $calendar;
		}

		/**
		 * @param \OCP\ICalendar $calendar
		 */
		public function unregisterCalendar(\OCP\ICalendar $calendar) {
			unset($this->calendars[$calendar->getKey()]);
		}

		/**
		 * @return \OCP\ICalendar[]
		 */
		public function getCalendars() {
			$this->loadCalendars();
			$result = array();
			foreach($this->calendars as $cal) {
				$result[$cal->getKey()] = $cal->getDisplayName();
			}

			return $result;
		}

		public function clear() {
			$this->calendars = array();
			$this->calendarLoaders = array();
		}

		/**
		 * @param \Closure $callable
		 */
		public function register(\Closure $callable)
		{
			$this->calendarLoaders[] = $callable;
		}

		/**
		 * @param string $calendarKey
		 * @return \OCP\ICalendar
		 */
		protected function getCalendar($calendarKey)
		{
			$this->loadCalendars();
			if (!array_key_exists($calendarKey, $this->calendars)) {
				return null;
			}

			return $this->calendars[$calendarKey];
		}

		protected function loadCalendars()
		{
			foreach($this->calendarLoaders as $callable) {
				$callable($this);
			}
			$this->calendarLoaders = array();
		}

	}
}
