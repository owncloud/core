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

namespace OCP\Calendar {

	/**
	 * This class provides access to any calendar source within ownCloud.
	 * Use this class exclusively if you want to access tasks/events.
	 *
	 */
	interface IManager {

		/**
		 * @param string $pattern which should match within the $searchProperties
		 * @param array $searchProperties defines the properties within the query pattern should match
		 * @param array $options
		 * 		'from' 	: defines the starting point in time for the query
		 * 		'to'	: defines the end
		 *
		 * @return array of events/tasks which are arrays of key-value-pairs
		 */
		public function search($pattern, $searchProperties, $options);


		/**
		 * This function can be used to delete the task/event identified by the given id
		 *
		 * @param object $id the unique identifier to an event/task
		 * @param string $calendarKey identifier of the calendar in which the task/event shall be deleted
		 * @return bool successful or not
		 */
		function delete($id, $calendarKey);

		/**
		 * This function is used to create a new task/event if 'id' is not given or not present.
		 * Otherwise the task/event will be updated by replacing the entire data set.
		 *
		 * @param array $properties this array if key-value-pairs defines a task/event
		 * @param string $calendarKey identifier of the calendar in which the task/event shall be created or updated
		 * @return array an array representing the task/event just created or updated
		 */
		function createOrUpdate($properties, $calendarKey);

		/**
		 * Check if task/events are available (e.g. task/events app enabled)
		 *
		 * @return bool true if enabled, false if not
		 */
		function isEnabled();

		/**
		 * Registers a calendar
		 *
		 * @param \OCP\ICalendar $calendar
		 * @return void
		 */
		function registerCalendar(\OCP\ICalendar $calendar);

		/**
		 * Unregisters an calendar
		 *
		 * @param \OCP\ICalendar $calendar
		 * @return void
		 */
		function unregisterCalendar(\OCP\ICalendar $calendar);

		/**
		 * In order to improve lazy loading a closure can be registered which will be called in case
		 * calendars are actually requested
		 *
		 * @param \Closure $callable
		 * @return void
		 */
		function register(\Closure $callable);

		/**
		 * @return \OCP\ICalendar[]
		 */
		function getCalendars();

		/**
		 * removes all registered calendars
		 * @return void
		 */
		function clear();
	}
}
