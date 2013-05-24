<?php

/**
 * A found album
 */
class OC_Search_Result_Album extends OC_Search_Result {
    /**
     * Type name; translated in templates
     * @var string 
     */

    const TITLE = 'Albums';

    /**
     * Default columns to display in list view
     * @var string
     */
    public $default_columns = array('name', 'artist', 'actions');

    /**
     * The artist name
     * @var string
     */
    public $artist;

    /**
     * Return a filled result from the given ID
     * @param string $id path to file
     */
    public static function fillFromId($id) {
        // get album data
        $data = OCA\Media\Collection::getAlbum($id);
        // create result
        $result = new OC_Search_Result_Album('', '', '', '');
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
        $this->id = $data['album_id'];
        $this->name = $data['album_name'];
        $this->artist = OCA\Media\Collection::getArtistName($data['album_artist']);
        $this->link = OCP\Util::linkTo('media', 'index.php') . '#artist=' . urlencode($this->artist) . '&album=' . urlencode($this->name);
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
        $url = \OC_Helper::mimetypeIcon('folder');
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
        $output_html .= "<li><a href=\"{$url}\">".$l->t('View songs')."</a></li>";
        // return
        return $output_html . '</ul>';
    }

}