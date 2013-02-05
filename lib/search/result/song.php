<?php

/**
 * A found song
 */
class OC_Search_Result_Song extends OC_Search_Result {
    /**
     * Type name; translated in templates
     * @var string 
     */

    const TITLE = 'Songs';

    /**
     * Default columns to display in list view
     * @var string
     */
    public $default_columns = array('track', 'name', 'length', 'play_count', 'album', 'artist', 'actions');

    /**
     * The artist name
     * @var string
     */
    public $artist;

    /**
     * The album name
     * @var string
     */
    public $album;

    /**
     * The song size
     * @var int
     */
    public $size;

    /**
     * The song length
     * @var int
     */
    public $length;

    /**
     * The track number
     * @var int
     */
    public $track;

    /**
     * Number of times played
     * @var int
     */
    public $play_count;

    /**
     * Date last played
     * @var int
     */
    public $last_played;

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
        $this->id = $data['song_id'];
        $this->name = $data['song_name'];
        $this->artist = OCA\Media\Collection::getArtistName($data['song_artist']);
        $this->album = OCA\Media\Collection::getAlbumName($data['song_album']);
        $this->link = OCP\Util::linkTo('media', 'index.php') . '#artist=' . urlencode($this->artist) . '&album=' . urlencode($this->album) . '&song=' . urlencode($this->name);
        $this->actions = self::format_actions($this->link);
        $this->size = $data['song_size'];
        $this->length = $data['song_length'];
        $this->track = $data['song_track'];
        $this->play_count = $data['song_playcount'];
        $this->last_played = $data['song_lastplayed'];
    }

    /**
     * Format select fields to HTML
     */
    public function formatToHtml() {
        $this->name = self::format_name($this->name);
        $this->size = self::format_size($this->size);
        $this->last_played = self::format_data($this->last_played);
        // format length
        $minutes = floor($this->length / 60);
        $seconds = $this->length % 60;
        $this->length = $minutes . ':' . $seconds;
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
        $output_html .= "<li><a href=\"{$url}\">View songs</a></li>";
        // return
        return $output_html . '</ul>';
    }

    /**
     * Formats size into an HTML span; adds color and makes it human-readable
     * @param string $size
     * @return string
     */
    function format_size($size) {
        $color = self::get_size_color($size);
        return '<span style="color: ' . $color . '">' . OC_Helper::humanFileSize($size) . '</span>';
    }

    /**
     * Determines the color to draw a file size; files under 200MB are shades of grey.
     * @param int $size in bytes
     * @return string CSS color string
     */
    function get_size_color($size) {
        $color = intval(200 - $size / 10000);
        $color = max(0, $color);
        return "rgb($color, $color, $color)";
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