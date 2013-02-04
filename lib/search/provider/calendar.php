<?php

/**
 * Returns calendar event search results
 */
class OC_Search_Provider_Calendar extends OC_Search_Provider {

    /**
     * Search all contacts by 'fullname'
     * @param string $query
     * @return array \OC_Search_Result_Contact
     */
    function search($query) {
	// check if app is enabled
	if (!OCP\App::isEnabled('calendar')) {
	    return array();
	}
	// get all calendars
	$calendars = OC_Calendar_Calendar::allCalendars(OCP\USER::getUser(), true);
	if (count($calendars) == 0) {
	    return array();
	}
	// find events
	$results = array();
	foreach ($calendars as $calendar) {
	    $objects = OC_Calendar_Object::all($calendar['id']);
	    foreach ($objects as $object) {
		// skip VEVENTS(?)
		if ($object['objecttype'] != 'VEVENT') {
		    continue;
		}
		// format data
		if (substr_count(strtolower($object['summary']), strtolower($query)) > 0) {
		    // create result
		    $result = new OC_Search_Result_Event($object['id'], '', '', '');
		    // fill result
		    $result->fill($object);
		    // add to results
		    $results[] = $result;
		}
	    }
	}
	return $results;
    }
}