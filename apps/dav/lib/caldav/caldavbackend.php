<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
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

namespace OCA\DAV\CalDAV;

use Sabre\CalDAV\Backend\AbstractBackend;
use Sabre\CalDAV\Backend\SchedulingSupport;
use Sabre\CalDAV\Backend\SubscriptionSupport;
use Sabre\CalDAV\Backend\SyncSupport;
use Sabre\CalDAV\Plugin;
use Sabre\CalDAV\Property\ScheduleCalendarTransp;
use Sabre\CalDAV\Property\SupportedCalendarComponentSet;
use Sabre\DAV;
use Sabre\VObject\DateTimeParser;
use Sabre\VObject\Reader;
use Sabre\VObject\RecurrenceIterator;

/**
 * Class CalDavBackend
 *
 * Code is heavily inspired by https://github.com/fruux/sabre-dav/blob/master/lib/CalDAV/Backend/PDO.php
 *
 * @package OCA\DAV\CalDAV
 */
class CalDavBackend extends AbstractBackend implements SyncSupport, SubscriptionSupport, SchedulingSupport {

	/**
	 * We need to specify a max date, because we need to stop *somewhere*
	 *
	 * On 32 bit system the maximum for a signed integer is 2147483647, so
	 * MAX_DATE cannot be higher than date('Y-m-d', 2147483647) which results
	 * in 2038-01-19 to avoid problems when the date is converted
	 * to a unix timestamp.
	 */
	const MAX_DATE = '2038-01-01';

	/**
	 * List of CalDAV properties, and how they map to database fieldnames
	 * Add your own properties by simply adding on to this array.
	 *
	 * Note that only string-based properties are supported here.
	 *
	 * @var array
	 */
	public $propertyMap = [
		'{DAV:}displayname'                          => 'displayname',
		'{urn:ietf:params:xml:ns:caldav}calendar-description' => 'description',
		'{urn:ietf:params:xml:ns:caldav}calendar-timezone'    => 'timezone',
		'{http://apple.com/ns/ical/}calendar-order'  => 'calendarorder',
		'{http://apple.com/ns/ical/}calendar-color'  => 'calendarcolor',
	];

	public function __construct(\OCP\IDBConnection $db) {
		$this->db = $db;
	}

	/**
	 * Returns a list of calendars for a principal.
	 *
	 * Every project is an array with the following keys:
	 *  * id, a unique id that will be used by other functions to modify the
	 *    calendar. This can be the same as the uri or a database key.
	 *  * uri, which the basename of the uri with which the calendar is
	 *    accessed.
	 *  * principaluri. The owner of the calendar. Almost always the same as
	 *    principalUri passed to this method.
	 *
	 * Furthermore it can contain webdav properties in clark notation. A very
	 * common one is '{DAV:}displayname'.
	 *
	 * Many clients also require:
	 * {urn:ietf:params:xml:ns:caldav}supported-calendar-component-set
	 * For this property, you can just return an instance of
	 * Sabre\CalDAV\Property\SupportedCalendarComponentSet.
	 *
	 * If you return {http://sabredav.org/ns}read-only and set the value to 1,
	 * ACL will automatically be put in read-only mode.
	 *
	 * @param string $principalUri
	 * @return array
	 */
	function getCalendarsForUser($principalUri) {
		$fields = array_values($this->propertyMap);
		$fields[] = 'id';
		$fields[] = 'uri';
		$fields[] = 'synctoken';
		$fields[] = 'components';
		$fields[] = 'principaluri';
		$fields[] = 'transparent';

		// Making fields a comma-delimited list
		$query = $this->db->getQueryBuilder();
		$query->select($fields)->from('calendars')
				->where($query->expr()->eq('principaluri', $query->createNamedParameter($principalUri)))
				->orderBy('calendarorder', 'ASC');
		$stmt = $query->execute();

		$calendars = [];
		while($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {

			$components = [];
			if ($row['components']) {
				$components = explode(',',$row['components']);
			}

			$calendar = [
				'id' => $row['id'],
				'uri' => $row['uri'],
				'principaluri' => $row['principaluri'],
				'{' . Plugin::NS_CALENDARSERVER . '}getctag' => 'http://sabre.io/ns/sync/' . ($row['synctoken']?$row['synctoken']:'0'),
				'{http://sabredav.org/ns}sync-token' => $row['synctoken']?$row['synctoken']:'0',
				'{' . Plugin::NS_CALDAV . '}supported-calendar-component-set' => new SupportedCalendarComponentSet($components),
				'{' . Plugin::NS_CALDAV . '}schedule-calendar-transp' => new ScheduleCalendarTransp($row['transparent']?'transparent':'opaque'),
			];

			foreach($this->propertyMap as $xmlName=>$dbName) {
				$calendar[$xmlName] = $row[$dbName];
			}

			$calendars[] = $calendar;
		}

		return $calendars;
	}

	/**
	 * Creates a new calendar for a principal.
	 *
	 * If the creation was a success, an id must be returned that can be used to reference
	 * this calendar in other methods, such as updateCalendar.
	 *
	 * @param string $principalUri
	 * @param string $calendarUri
	 * @param array $properties
	 * @return void
	 */
	function createCalendar($principalUri, $calendarUri, array $properties) {
		$fieldNames = [
			'principaluri',
			'uri',
			'synctoken',
			'transparent',
			'components'
		];
		$values = [
			'principaluri' => $principalUri,
			'uri'          => $calendarUri,
			'synctoken'    => 1,
			'transparent'  => 0,
			'components'   => 'VEVENT,VTODO'
		];

		// Default value
		$sccs = '{urn:ietf:params:xml:ns:caldav}supported-calendar-component-set';
		if (isset($properties[$sccs])) {
			if (!($properties[$sccs] instanceof SupportedCalendarComponentSet)) {
				throw new DAV\Exception('The ' . $sccs . ' property must be of type: \Sabre\CalDAV\Property\SupportedCalendarComponentSet');
			}
			$values['components'] = implode(',',$properties[$sccs]->getValue());
		}
		$transp = '{' . Plugin::NS_CALDAV . '}schedule-calendar-transp';
		if (isset($properties[$transp])) {
			$values['transparent'] = $properties[$transp]->getValue()==='transparent';
		}

		foreach($this->propertyMap as $xmlName=>$dbName) {
			if (isset($properties[$xmlName])) {

				$values[$dbName] = $properties[$xmlName];
				$fieldNames[] = $dbName;
			}
		}

		$query = $this->db->getQueryBuilder();
		$query->insert('calendars')
				->values([
						'principaluri' => $query->createNamedParameter($values['principaluri']),
						'uri' => $query->createNamedParameter($values['principaluri']),
						'synctoken' => $query->createNamedParameter($values['principaluri']),
						'transparent' => $query->createNamedParameter($values['principaluri']),
				])
				->execute();
	}

	/**
	 * Updates properties for a calendar.
	 *
	 * The list of mutations is stored in a Sabre\DAV\PropPatch object.
	 * To do the actual updates, you must tell this object which properties
	 * you're going to process with the handle() method.
	 *
	 * Calling the handle method is like telling the PropPatch object "I
	 * promise I can handle updating this property".
	 *
	 * Read the PropPatch documentation for more info and examples.
	 *
	 * @param string $path
	 * @param \Sabre\DAV\PropPatch $propPatch
	 * @return void
	 */
	function updateCalendar($calendarId, \Sabre\DAV\PropPatch $propPatch) {
		$supportedProperties = array_keys($this->propertyMap);
		$supportedProperties[] = '{' . Plugin::NS_CALDAV . '}schedule-calendar-transp';

		$propPatch->handle($supportedProperties, function($mutations) use ($calendarId) {
			$newValues = [];
			foreach ($mutations as $propertyName => $propertyValue) {

				switch ($propertyName) {
					case '{' . Plugin::NS_CALDAV . '}schedule-calendar-transp' :
						$fieldName = 'transparent';
						$newValues[$fieldName] = $propertyValue->getValue() === 'transparent';
						break;
					default :
						$fieldName = $this->propertyMap[$propertyName];
						$newValues[$fieldName] = $propertyValue;
						break;
				}

			}
			$query = $this->db->getQueryBuilder();
			$query->update('calendars');
			foreach ($newValues as $fieldName => $value) {
				$query->set($fieldName, $query->createNamedParameter($value));
			}
			$query->where($query->expr()->eq('id', $query->createNamedParameter($calendarId)));
			$query->execute();

			$this->addChange($calendarId, "", 2);

			return true;
		});
	}

	/**
	 * Delete a calendar and all it's objects
	 *
	 * @param mixed $calendarId
	 * @return void
	 */
	function deleteCalendar($calendarId) {
		$stmt = $this->db->prepare('DELETE FROM `*PREFIX*calendarobjects` WHERE `calendarid` = ?');
		$stmt->execute([$calendarId]);

		$stmt = $this->db->prepare('DELETE FROM `*PREFIX*calendars` WHERE `id` = ?');
		$stmt->execute([$calendarId]);

		$stmt = $this->db->prepare('DELETE FROM `*PREFIX*calendarchanges` WHERE `calendarid` = ?');
		$stmt->execute([$calendarId]);
	}

	/**
	 * Returns all calendar objects within a calendar.
	 *
	 * Every item contains an array with the following keys:
	 *   * calendardata - The iCalendar-compatible calendar data
	 *   * uri - a unique key which will be used to construct the uri. This can
	 *     be any arbitrary string, but making sure it ends with '.ics' is a
	 *     good idea. This is only the basename, or filename, not the full
	 *     path.
	 *   * lastmodified - a timestamp of the last modification time
	 *   * etag - An arbitrary string, surrounded by double-quotes. (e.g.:
	 *   '"abcdef"')
	 *   * size - The size of the calendar objects, in bytes.
	 *   * component - optional, a string containing the type of object, such
	 *     as 'vevent' or 'vtodo'. If specified, this will be used to populate
	 *     the Content-Type header.
	 *
	 * Note that the etag is optional, but it's highly encouraged to return for
	 * speed reasons.
	 *
	 * The calendardata is also optional. If it's not returned
	 * 'getCalendarObject' will be called later, which *is* expected to return
	 * calendardata.
	 *
	 * If neither etag or size are specified, the calendardata will be
	 * used/fetched to determine these numbers. If both are specified the
	 * amount of times this is needed is reduced by a great degree.
	 *
	 * @param mixed $calendarId
	 * @return array
	 */
	function getCalendarObjects($calendarId) {
		$query = $this->db->getQueryBuilder();
		$query->select(['id', 'uri', 'lastmodified', 'etag', 'calendarid', 'size', 'componenttype'])
			->from('calendarobjects')
			->where($query->expr()->eq('calendarid', $query->createNamedParameter($calendarId)));
		$stmt = $query->execute();

		$result = [];
		foreach($stmt->fetchAll(\PDO::FETCH_ASSOC) as $row) {
			$result[] = [
					'id'           => $row['id'],
					'uri'          => $row['uri'],
					'lastmodified' => $row['lastmodified'],
					'etag'         => '"' . $row['etag'] . '"',
					'calendarid'   => $row['calendarid'],
					'size'         => (int)$row['size'],
					'component'    => strtolower($row['componenttype']),
			];
		}

		return $result;
	}

	/**
	 * Returns information from a single calendar object, based on it's object
	 * uri.
	 *
	 * The object uri is only the basename, or filename and not a full path.
	 *
	 * The returned array must have the same keys as getCalendarObjects. The
	 * 'calendardata' object is required here though, while it's not required
	 * for getCalendarObjects.
	 *
	 * This method must return null if the object did not exist.
	 *
	 * @param mixed $calendarId
	 * @param string $objectUri
	 * @return array|null
	 */
	function getCalendarObject($calendarId, $objectUri) {

		$query = $this->db->getQueryBuilder();
		$query->select(['id', 'uri', 'lastmodified', 'etag', 'calendarid', 'size', 'calendardata', 'componenttype'])
				->from('calendarobjects')
				->where($query->expr()->eq('calendarid', $query->createNamedParameter($calendarId)))
				->andWhere($query->expr()->eq('uri', $query->createNamedParameter($objectUri)));
		$stmt = $query->execute();
		$row = $stmt->fetch(\PDO::FETCH_ASSOC);

		if(!$row) return null;

		return [
				'id'            => $row['id'],
				'uri'           => $row['uri'],
				'lastmodified'  => $row['lastmodified'],
				'etag'          => '"' . $row['etag'] . '"',
				'calendarid'    => $row['calendarid'],
				'size'          => (int)$row['size'],
				'calendardata'  => $row['calendardata'],
				'component'     => strtolower($row['componenttype']),
		];
	}

	/**
	 * Returns a list of calendar objects.
	 *
	 * This method should work identical to getCalendarObject, but instead
	 * return all the calendar objects in the list as an array.
	 *
	 * If the backend supports this, it may allow for some speed-ups.
	 *
	 * @param mixed $calendarId
	 * @param array $uris
	 * @return array
	 */
	function getMultipleCalendarObjects($calendarId, array $uris) {
		$query = $this->db->getQueryBuilder();
		$query->select(['id', 'uri', 'lastmodified', 'etag', 'calendarid', 'size', 'calendardata', 'componenttype'])
				->from('calendarobjects')
				->where($query->expr()->eq('calendarid', $query->createNamedParameter($calendarId)))
				->andWhere($query->expr()->in('uri', $query->createParameter('uri')))
				->setParameter('uri', $uris, \Doctrine\DBAL\Connection::PARAM_STR_ARRAY);

		$stmt = $query->execute();

		$result = [];
		while($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {

			$result[] = [
					'id'           => $row['id'],
					'uri'          => $row['uri'],
					'lastmodified' => $row['lastmodified'],
					'etag'         => '"' . $row['etag'] . '"',
					'calendarid'   => $row['calendarid'],
					'size'         => (int)$row['size'],
					'calendardata' => $row['calendardata'],
					'component'    => strtolower($row['componenttype']),
			];

		}
		return $result;
	}

	/**
	 * Creates a new calendar object.
	 *
	 * The object uri is only the basename, or filename and not a full path.
	 *
	 * It is possible return an etag from this function, which will be used in
	 * the response to this PUT request. Note that the ETag must be surrounded
	 * by double-quotes.
	 *
	 * However, you should only really return this ETag if you don't mangle the
	 * calendar-data. If the result of a subsequent GET to this object is not
	 * the exact same as this request body, you should omit the ETag.
	 *
	 * @param mixed $calendarId
	 * @param string $objectUri
	 * @param string $calendarData
	 * @return string|null
	 */
	function createCalendarObject($calendarId, $objectUri, $calendarData) {
		$extraData = $this->getDenormalizedData($calendarData);

		$query = $this->db->getQueryBuilder();
		$query->insert('calendarobjects')
			->values([
				'calendarid' => $query->createNamedParameter($calendarId),
				'uri' => $query->createNamedParameter($objectUri),
				'calendardata' => $query->createNamedParameter($calendarData),
				'lastmodified' => $query->createNamedParameter(time()),
					'etag' => $query->createNamedParameter($extraData['etag']),
					'size' => $query->createNamedParameter($extraData['size']),
					'componentType' => $query->createNamedParameter($extraData['componentType']),
					'firstOccurence' => $query->createNamedParameter($extraData['firstOccurence']),
					'lastOccurence' => $query->createNamedParameter($extraData['lastOccurence']),
					'uid' => $query->createNamedParameter($extraData['uid']),
			])
			->execute();

		$this->addChange($calendarId, $objectUri, 1);

		return '"' . $extraData['etag'] . '"';
	}

	/**
	 * Updates an existing calendarobject, based on it's uri.
	 *
	 * The object uri is only the basename, or filename and not a full path.
	 *
	 * It is possible return an etag from this function, which will be used in
	 * the response to this PUT request. Note that the ETag must be surrounded
	 * by double-quotes.
	 *
	 * However, you should only really return this ETag if you don't mangle the
	 * calendar-data. If the result of a subsequent GET to this object is not
	 * the exact same as this request body, you should omit the ETag.
	 *
	 * @param mixed $calendarId
	 * @param string $objectUri
	 * @param string $calendarData
	 * @return string|null
	 */
	function updateCalendarObject($calendarId, $objectUri, $calendarData) {
		$extraData = $this->getDenormalizedData($calendarData);

		$query = $this->db->getQueryBuilder();
		$query->update('calendarobjects')
				->set('calendardata', $query->createNamedParameter($calendarData))
				->set('lastmodified', $query->createNamedParameter(time()))
				->set('etag', $query->createNamedParameter($extraData['etag']))
				->set('size', $query->createNamedParameter($extraData['size']))
				->set('componenttype', $query->createNamedParameter($extraData['componentType']))
				->set('firstoccurence', $query->createNamedParameter($extraData['firstOccurence']))
				->set('lastoccurence', $query->createNamedParameter($extraData['lastOccurence']))
				->set('uid', $query->createNamedParameter($extraData['uid']))
			->where($query->expr()->eq('calendarid', $query->createNamedParameter($calendarId)))
			->andWhere($query->expr()->eq('uri', $query->createNamedParameter($objectUri)))
			->execute();

		$this->addChange($calendarId, $objectUri, 2);

		return '"' . $extraData['etag'] . '"';
	}

	/**
	 * Deletes an existing calendar object.
	 *
	 * The object uri is only the basename, or filename and not a full path.
	 *
	 * @param mixed $calendarId
	 * @param string $objectUri
	 * @return void
	 */
	function deleteCalendarObject($calendarId, $objectUri) {
		$stmt = $this->db->prepare('DELETE FROM `*PREFIX*calendarobjects` WHERE `calendarid` = ? AND `uri` = ?');
		$stmt->execute([$calendarId, $objectUri]);

		$this->addChange($calendarId, $objectUri, 3);
	}

	/**
	 * Performs a calendar-query on the contents of this calendar.
	 *
	 * The calendar-query is defined in RFC4791 : CalDAV. Using the
	 * calendar-query it is possible for a client to request a specific set of
	 * object, based on contents of iCalendar properties, date-ranges and
	 * iCalendar component types (VTODO, VEVENT).
	 *
	 * This method should just return a list of (relative) urls that match this
	 * query.
	 *
	 * The list of filters are specified as an array. The exact array is
	 * documented by Sabre\CalDAV\CalendarQueryParser.
	 *
	 * Note that it is extremely likely that getCalendarObject for every path
	 * returned from this method will be called almost immediately after. You
	 * may want to anticipate this to speed up these requests.
	 *
	 * This method provides a default implementation, which parses *all* the
	 * iCalendar objects in the specified calendar.
	 *
	 * This default may well be good enough for personal use, and calendars
	 * that aren't very large. But if you anticipate high usage, big calendars
	 * or high loads, you are strongly adviced to optimize certain paths.
	 *
	 * The best way to do so is override this method and to optimize
	 * specifically for 'common filters'.
	 *
	 * Requests that are extremely common are:
	 *   * requests for just VEVENTS
	 *   * requests for just VTODO
	 *   * requests with a time-range-filter on either VEVENT or VTODO.
	 *
	 * ..and combinations of these requests. It may not be worth it to try to
	 * handle every possible situation and just rely on the (relatively
	 * easy to use) CalendarQueryValidator to handle the rest.
	 *
	 * Note that especially time-range-filters may be difficult to parse. A
	 * time-range filter specified on a VEVENT must for instance also handle
	 * recurrence rules correctly.
	 * A good example of how to interprete all these filters can also simply
	 * be found in Sabre\CalDAV\CalendarQueryFilter. This class is as correct
	 * as possible, so it gives you a good idea on what type of stuff you need
	 * to think of.
	 *
	 * @param mixed $calendarId
	 * @param array $filters
	 * @return array
	 */
	function calendarQuery($calendarId, array $filters) {
		// TODO: Implement calendarQuery() method.
	}

	/**
	 * Searches through all of a users calendars and calendar objects to find
	 * an object with a specific UID.
	 *
	 * This method should return the path to this object, relative to the
	 * calendar home, so this path usually only contains two parts:
	 *
	 * calendarpath/objectpath.ics
	 *
	 * If the uid is not found, return null.
	 *
	 * This method should only consider * objects that the principal owns, so
	 * any calendars owned by other principals that also appear in this
	 * collection should be ignored.
	 *
	 * @param string $principalUri
	 * @param string $uid
	 * @return string|null
	 */
	function getCalendarObjectByUID($principalUri, $uid) {
		// TODO: Implement getCalendarObjectByUID() method.
	}

	/**
	 * The getChanges method returns all the changes that have happened, since
	 * the specified syncToken in the specified calendar.
	 *
	 * This function should return an array, such as the following:
	 *
	 * [
	 *   'syncToken' => 'The current synctoken',
	 *   'added'   => [
	 *      'new.txt',
	 *   ],
	 *   'modified'   => [
	 *      'modified.txt',
	 *   ],
	 *   'deleted' => [
	 *      'foo.php.bak',
	 *      'old.txt'
	 *   ]
	 * );
	 *
	 * The returned syncToken property should reflect the *current* syncToken
	 * of the calendar, as reported in the {http://sabredav.org/ns}sync-token
	 * property This is * needed here too, to ensure the operation is atomic.
	 *
	 * If the $syncToken argument is specified as null, this is an initial
	 * sync, and all members should be reported.
	 *
	 * The modified property is an array of nodenames that have changed since
	 * the last token.
	 *
	 * The deleted property is an array with nodenames, that have been deleted
	 * from collection.
	 *
	 * The $syncLevel argument is basically the 'depth' of the report. If it's
	 * 1, you only have to report changes that happened only directly in
	 * immediate descendants. If it's 2, it should also include changes from
	 * the nodes below the child collections. (grandchildren)
	 *
	 * The $limit argument allows a client to specify how many results should
	 * be returned at most. If the limit is not specified, it should be treated
	 * as infinite.
	 *
	 * If the limit (infinite or not) is higher than you're willing to return,
	 * you should throw a Sabre\DAV\Exception\TooMuchMatches() exception.
	 *
	 * If the syncToken is expired (due to data cleanup) or unknown, you must
	 * return null.
	 *
	 * The limit is 'suggestive'. You are free to ignore it.
	 *
	 * @param string $calendarId
	 * @param string $syncToken
	 * @param int $syncLevel
	 * @param int $limit
	 * @return array
	 */
	function getChangesForCalendar($calendarId, $syncToken, $syncLevel, $limit = null) {
		// TODO: Implement getChangesForCalendar() method.
	}

	/**
	 * Returns a list of subscriptions for a principal.
	 *
	 * Every subscription is an array with the following keys:
	 *  * id, a unique id that will be used by other functions to modify the
	 *    subscription. This can be the same as the uri or a database key.
	 *  * uri. This is just the 'base uri' or 'filename' of the subscription.
	 *  * principaluri. The owner of the subscription. Almost always the same as
	 *    principalUri passed to this method.
	 *
	 * Furthermore, all the subscription info must be returned too:
	 *
	 * 1. {DAV:}displayname
	 * 2. {http://apple.com/ns/ical/}refreshrate
	 * 3. {http://calendarserver.org/ns/}subscribed-strip-todos (omit if todos
	 *    should not be stripped).
	 * 4. {http://calendarserver.org/ns/}subscribed-strip-alarms (omit if alarms
	 *    should not be stripped).
	 * 5. {http://calendarserver.org/ns/}subscribed-strip-attachments (omit if
	 *    attachments should not be stripped).
	 * 6. {http://calendarserver.org/ns/}source (Must be a
	 *     Sabre\DAV\Property\Href).
	 * 7. {http://apple.com/ns/ical/}calendar-color
	 * 8. {http://apple.com/ns/ical/}calendar-order
	 * 9. {urn:ietf:params:xml:ns:caldav}supported-calendar-component-set
	 *    (should just be an instance of
	 *    Sabre\CalDAV\Property\SupportedCalendarComponentSet, with a bunch of
	 *    default components).
	 *
	 * @param string $principalUri
	 * @return array
	 */
	function getSubscriptionsForUser($principalUri) {
		// TODO: Implement getSubscriptionsForUser() method.
	}

	/**
	 * Creates a new subscription for a principal.
	 *
	 * If the creation was a success, an id must be returned that can be used to reference
	 * this subscription in other methods, such as updateSubscription.
	 *
	 * @param string $principalUri
	 * @param string $uri
	 * @param array $properties
	 * @return mixed
	 */
	function createSubscription($principalUri, $uri, array $properties) {
		// TODO: Implement createSubscription() method.
	}

	/**
	 * Updates a subscription
	 *
	 * The list of mutations is stored in a Sabre\DAV\PropPatch object.
	 * To do the actual updates, you must tell this object which properties
	 * you're going to process with the handle() method.
	 *
	 * Calling the handle method is like telling the PropPatch object "I
	 * promise I can handle updating this property".
	 *
	 * Read the PropPatch documenation for more info and examples.
	 *
	 * @param mixed $subscriptionId
	 * @param \Sabre\DAV\PropPatch $propPatch
	 * @return void
	 */
	function updateSubscription($subscriptionId, DAV\PropPatch $propPatch) {
		// TODO: Implement updateSubscription() method.
	}

	/**
	 * Deletes a subscription.
	 *
	 * @param mixed $subscriptionId
	 * @return void
	 */
	function deleteSubscription($subscriptionId) {
		// TODO: Implement deleteSubscription() method.
	}

	/**
	 * Returns a single scheduling object for the inbox collection.
	 *
	 * The returned array should contain the following elements:
	 *   * uri - A unique basename for the object. This will be used to
	 *           construct a full uri.
	 *   * calendardata - The iCalendar object
	 *   * lastmodified - The last modification date. Can be an int for a unix
	 *                    timestamp, or a PHP DateTime object.
	 *   * etag - A unique token that must change if the object changed.
	 *   * size - The size of the object, in bytes.
	 *
	 * @param string $principalUri
	 * @param string $objectUri
	 * @return array
	 */
	function getSchedulingObject($principalUri, $objectUri) {
		// TODO: Implement getSchedulingObject() method.
	}

	/**
	 * Returns all scheduling objects for the inbox collection.
	 *
	 * These objects should be returned as an array. Every item in the array
	 * should follow the same structure as returned from getSchedulingObject.
	 *
	 * The main difference is that 'calendardata' is optional.
	 *
	 * @param string $principalUri
	 * @return array
	 */
	function getSchedulingObjects($principalUri) {
		// TODO: Implement getSchedulingObjects() method.
	}

	/**
	 * Deletes a scheduling object from the inbox collection.
	 *
	 * @param string $principalUri
	 * @param string $objectUri
	 * @return void
	 */
	function deleteSchedulingObject($principalUri, $objectUri) {
		// TODO: Implement deleteSchedulingObject() method.
	}

	/**
	 * Creates a new scheduling object. This should land in a users' inbox.
	 *
	 * @param string $principalUri
	 * @param string $objectUri
	 * @param string $objectData
	 * @return void
	 */
	function createSchedulingObject($principalUri, $objectUri, $objectData) {
		// TODO: Implement createSchedulingObject() method.
	}

	/**
	 * Adds a change record to the calendarchanges table.
	 *
	 * @param mixed $calendarId
	 * @param string $objectUri
	 * @param int $operation 1 = add, 2 = modify, 3 = delete.
	 * @return void
	 */
	protected function addChange($calendarId, $objectUri, $operation) {

		$stmt = $this->db->prepare('INSERT INTO `*PREFIX*calendarchanges` (`uri`, `synctoken`, `calendarid`, `operation`) SELECT ?, `synctoken`, ?, ? FROM `*PREFIX*calendars` WHERE `id` = ?');
		$stmt->execute([
			$objectUri,
			$calendarId,
			$operation,
			$calendarId
		]);
		$stmt = $this->db->prepare('UPDATE `*PREFIX*calendars` SET `synctoken` = `synctoken` + 1 WHERE `id` = ?');
		$stmt->execute([
			$calendarId
		]);

	}

	/**
	 * Parses some information from calendar objects, used for optimized
	 * calendar-queries.
	 *
	 * Returns an array with the following keys:
	 *   * etag - An md5 checksum of the object without the quotes.
	 *   * size - Size of the object in bytes
	 *   * componentType - VEVENT, VTODO or VJOURNAL
	 *   * firstOccurence
	 *   * lastOccurence
	 *   * uid - value of the UID property
	 *
	 * @param string $calendarData
	 * @return array
	 */
	protected function getDenormalizedData($calendarData) {

		$vObject = Reader::read($calendarData);
		$componentType = null;
		$component = null;
		$firstOccurence = null;
		$lastOccurence = null;
		$uid = null;
		foreach($vObject->getComponents() as $component) {
			if ($component->name!=='VTIMEZONE') {
				$componentType = $component->name;
				$uid = (string)$component->UID;
				break;
			}
		}
		if (!$componentType) {
			throw new \Sabre\DAV\Exception\BadRequest('Calendar objects must have a VJOURNAL, VEVENT or VTODO component');
		}
		if ($componentType === 'VEVENT') {
			$firstOccurence = $component->DTSTART->getDateTime()->getTimeStamp();
			// Finding the last occurence is a bit harder
			if (!isset($component->RRULE)) {
				if (isset($component->DTEND)) {
					$lastOccurence = $component->DTEND->getDateTime()->getTimeStamp();
				} elseif (isset($component->DURATION)) {
					$endDate = clone $component->DTSTART->getDateTime();
					$endDate->add(DateTimeParser::parse($component->DURATION->getValue()));
					$lastOccurence = $endDate->getTimeStamp();
				} elseif (!$component->DTSTART->hasTime()) {
					$endDate = clone $component->DTSTART->getDateTime();
					$endDate->modify('+1 day');
					$lastOccurence = $endDate->getTimeStamp();
				} else {
					$lastOccurence = $firstOccurence;
				}
			} else {
				$it = new RecurrenceIterator($vObject, (string)$component->UID);
				$maxDate = new \DateTime(self::MAX_DATE);
				if ($it->isInfinite()) {
					$lastOccurence = $maxDate->getTimeStamp();
				} else {
					$end = $it->getDtEnd();
					while($it->valid() && $end < $maxDate) {
						$end = $it->getDtEnd();
						$it->next();

					}
					$lastOccurence = $end->getTimeStamp();
				}

			}
		}

		return [
				'etag' => md5($calendarData),
				'size' => strlen($calendarData),
				'componentType' => $componentType,
				'firstOccurence' => $firstOccurence,
				'lastOccurence'  => $lastOccurence,
				'uid' => $uid,
		];

	}
}
