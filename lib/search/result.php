<?php

/**
 * The generic result of a search
 */
abstract class OC_Search_Result {
    /**
     * Type name; translated in templates; override in descendants
     */

    const TITLE = '[Unknown Results]';

    /**
     * Default columns to display in list view; override in descendants
     * @var array
     */
    public $default_columns = array('name', 'actions');

    /**
     * A unique identifier for the result; construct this string with the format
     * '[app_name]/[item_identifier_in_app]' in lower-case.
     * @var string
     */
    public $id;

    /**
     * The name of the item returned; this will be displayed in the search
     * results.
     * @var string
     */
    public $name;

    /**
     * URL to the application item
     * @var string
     */
    public $link;

    /**
     * HTML list of the actions available to this result
     * @var string
     */
    public $actions;

    /**
     * Create a new search result
     * @param string $id unique identifier from application: '[app_name]/[item_identifier_in_app]'
     * @param string $name displayed text of result
     * @param string $link URL to the result within its app
     * @param string $actions HTML list of the actions available for this result
     */
    public function __construct($id = null, $name = null, $link = null, $actions = null) {
        $this->id = $id;
        $this->name = $name;
        $this->link = $link;
        $this->actions = $actions;
    }

    /**
     * Fill and return a search result from an object ID.
     * @param mixed $id ID of object to return
     * @return OC_Search_Result
     */
    public static function fillFromId($id) {
        // code in descendant classes; this function body is necessary or
        // PHP will complain that a static method is declared abstract
    }

    /**
     * Fill this search result given an array of data
     * @param array $data Data to put in OC_Search_Result
     * @return void
     */
    public abstract function fill(array $data);

    /**
     * Replace fields with HTML-formatted results; apply any last-minute
     * formatting here before display.
     */
    abstract public function formatToHtml();
}
