<?php

/**
 * A found feed
 */
class OC_Search_Result_Feed extends OC_Search_Result {
    /**
     * Type name; translated in templates
     */

    const TITLE = 'Feeds';

    /**
     * Default columns to display in list view
     * @var string 
     */
    public $default_columns = array('name', 'folder', 'modified', 'actions');

    /**
     * Date the feed was modified
     * @var int
     */
    public $modified;

    /**
     * Favicon link
     * @var string
     */
    private $favicon;

    /**
     * Return a filled result from the given ID
     * @param string $id path to file
     */
    public static function fillFromId($id) {
        $feedMapper = new OCA\News\FeedMapper(OCP\USER::getUser());
        $feed = $feedMapper->findById($id);
        if ($feed === null) {
            return null;
        }
        // create search result
        $result = new OC_Search_Result_Feed($id, '', '', '');
        // fill from file data
        $result->fill($feed);
        // return
        return $result;
    }

    /**
     * Fill the current result with the given data
     * @param string $id
     */
    public function fill(array $data) {
        $this->id = $data['id'];
        $this->name = $data['title'];
        $this->link = OCP\Util::linkTo('news', 'index.php') . '?feedid=' . urlencode($data['id']);
        $this->actions = self::format_actions($data);
        $this->modified = $data['lastmodified'];
        $this->favicon = $data['favicon_link'];
    }

    /**
     * Format select fields to HTML
     */
    public function formatToHtml() {
        $this->name = self::format_name($this->name, $this->favicon);
        $this->modified = self::format_date($this->modified);
    }

    /**
     * Create actions HTML
     * @param array $data
     * @return string
     */
    function format_actions($data) {
        $output_html = '<ul class="search_actions">';
        // add go to article
        $output_html .= "<li><a href=\"{$this->link}\">Open</a></li>";
        $output_html .= "<li><a href=\"{$data['url']}\">Open RSS</a></li>";
        // return
        return $output_html . '</ul>';
    }

    /**
     * Format name, add favicon as icon
     * @param string $name
     * @param string $url
     * @return string
     */
    function format_name($name, $url) {
        if ($url) {
            // add icon
            return '<span class="has-icon" style="background-image: url(' . $url . ');">' . htmlspecialchars($name) . '</span>';
        } else {
            return htmlspecialchars($name);
        }
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