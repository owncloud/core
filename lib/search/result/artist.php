<?php

/**
 * A found artist
 */
class OC_Search_Result_Artist extends OC_Search_Result {
    /**
     * Type name; translated in templates
     * @var string 
     */

    const TITLE = 'Artists';

    /**
     * Default columns to display in list view
     * @var string
     */
    public $default_columns = array('name', 'actions');

    /**
     * Return a filled result from the given ID
     * @param string $id path to file
     */
    public static function fillFromId($id) {
        // get artist data
        $data = array();
        $data['artist_id'] = $id;
        $data['artist_name'] = OCA\Media\Collection::getArtistName($id);
        // create result
        $result = new OC_Search_Result_Artist('', '', '', '');
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
        $this->id = $data['artist_id'];
        $this->name = $data['artist_name'];
        $this->link = OCP\Util::linkTo('media', 'index.php') . '#artist=' . urlencode($data['artist_name']);
        $this->actions = self::format_actions($this->link);
    }

    /**
     * Format select fields to HTML
     */
    public function formatToHtml() {
        $this->name = self::format_name($this->name);
    }

    /**
     * Add an icon to the name
     * @param $name 
     * @return string
     */
    function format_name($name) {
        // add icon
        $url = \OCP\image_path('', 'actions/user.svg');
        // add filename
        return '<span class="has-icon" style="background-image: url(' . $url . ');">' . htmlspecialchars($name) . '</span>';
    }

    /**
     * Create actions
     * @param string $url
     * @return string
     */
    function format_actions($url) {
        $output_html = '<ul class="search_actions">';
        // open
        $l = OC_L10N::get('search');
        $output_html .= "<li><a href=\"{$url}\">".$l->t('View all by this artist')."</a></li>";
        // return
        return $output_html . '</ul>';
    }

}