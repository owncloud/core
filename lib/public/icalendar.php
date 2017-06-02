<?php
/**
 * ownCloud
 *
 * @author Thomas Müller
 * @copyright 2014 Thomas Müller thomas.mueller@tmit.eu
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace OCP {

	interface ICalendar {

		/**
		 * @param string $pattern which should match within the $searchProperties
		 * @param array $searchProperties defines the properties within the query pattern should match
		 * @param array $options
		 * 		'from' 	: defines the starting point in time for the query
		 * 		'to'	: defines the end
		 *
		 * @return array of events/journals/tasks which are arrays of key-value-pairs
		 */
		public function search($pattern, $searchProperties, $options);

		/**
		 * @return string defining the technical unique key
		 */
		public function getKey();

		/**
		 * In comparison to getKey() this function returns a human readable (maybe translated) name
		 * @return string
		 */
		public function getDisplayName();

		/**
		 * @param array $properties this array if key-value-pairs defines a event/task
		 * @return array an array representing the event/task just created or updated
		 */
		public function createOrUpdate($properties);

		/**
		 * @return mixed
		 */
		public function getPermissions();

		/**
		 * @param object $id the unique identifier to an event/task
		 * @return bool successful or not
		 */
		public function delete($id);
	}
}
