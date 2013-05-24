<?php

/**
 * A found image
 */
class OC_Search_Result_Image extends OC_Search_Result_File {
    /**
     * Type name; translated in templates
     * @var string 
     */

    const TITLE = 'Images';

    /**
     * Default columns to display in list view
     * @var string
     */
    public $default_columns = array('name', 'size', 'modified', 'actions');

    /**
     * Format select fields to HTML
     */
    public function formatToHtml() {
        $this->name = self::format_name($this->path, 'image');
        $this->size = self::format_size($this->size);
        $this->modified = self::format_date($this->modified);
    }

}