<?php

/**
 * A found calendar event
 */
class OC_Search_Result_Event extends OC_Search_Result {
    /**
     * Type name; translated in templates
     * @var string 
     */

    const TITLE = 'Events';

    /**
     * Default columns to display in list view
     * @var string
     */
    public $default_columns = array('name', 'start_time', 'end_time', 'location', 'actions');

    /**
     * Start time
     * @var string
     */
    public $start_time;

    /**
     * End time
     * @var string
     */
    public $end_time;

    /**
     * Location
     * @var string
     */
    public $location;

    /**
     * Return a filled result from the given ID
     * @param string $id path to file
     */
    public static function fillFromId($id) {
	$data = OC_Calendar_Object::find($id);
	if ($data === null) {
	    return null;
	}
	// create search result
	$result = new OC_Search_Result_Event($id, '', '', '');
	// fill from file data
	$result->fill($data);
	// return
	return $result;
    }

    /**
     * Fill the current result with the given data
     * @param string $id
     */
    public function fill(array $data) {
	$this->id = $data['id'];
	$this->name = $data['summary'];
	$this->link = OCP\Util::linkTo('calendar', 'index.php') . '?showevent=' . urlencode($data['id']);
	$this->actions = self::format_actions($data);
	$vobject = OC_VObject::parse($data['calendardata']);
	$this->start_time = self::get_start_time($vobject);
	$this->end_time = self::get_end_time($vobject);
	$this->location = self::get_location($vobject);
    }

    /**
     * Format select fields to HTML
     */
    public function formatToHtml() {
	
    }

    /**
     * Create actions HTML
     * @param array $data
     * @return string
     */
    function format_actions($data) {
	$output_html = '<ul class="search_actions">';
	return $output_html . '</ul>';
    }
    
    /**
     * Parse out start time
     * @param OC_VObject $object
     * @return string
     */
    function get_start_time(OC_VObject $object){
	$dtstart = $object->DTSTART;
	$start_dt = $dtstart->getDateTime();
	$timezone = new DateTimeZone(OC_Calendar_App::getTimezone());
	$start_dt->setTimezone($timezone);
	return $start_dt->format('d-m-Y H:i');
    }
    
    /**
     * Parse out end time
     * @param OC_VObject $object
     * @return string
     */
    function get_end_time(OC_VObject $object){
	$dtend = OC_Calendar_Object::getDTEndFromVEvent($object);
	$end_dt = $dtend->getDateTime();
	$timezone = new DateTimeZone(OC_Calendar_App::getTimezone());
	$end_dt->setTimezone($timezone);
	return $end_dt->format('d-m-Y H:i');
    }
    
    /**
     * Parse out location
     * @TODO
     * @param OC_VObject $object
     * @return string
     */
    function get_location(OC_VObject $object){
	return '';
    }

    /**
     * Formats date into an HTML span; adds color and makes it human-readable
     * @param int $time
     * @return string
     */
    function format_date($time) {
	$color = self::get_date_color($time);
	OC::autoload('OCP\Template');
	return '<span style="color: ' . $color . '">' . OCP\relative_modified_date($time) . '</span>';
    }

    /**
     * Determines the color to draw a file modified time; lightens the color the earlier the modified time
     * @param int $size in bytes
     * @return string CSS color string
     */
    function get_date_color($mtime) {
	$days_modified_ago = intval(abs($mtime - time()) / 86400);
	$color = $days_modified_ago * 14;
	$color = min(200, $color);
	return "rgb($color, $color, $color)";
    }

}