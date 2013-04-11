<?php

/**
 * A found bookmark
 */
class OC_Search_Result_Bookmark extends OC_Search_Result {
    /**
     * Type name; translated in templates
     */

    const TITLE = 'Bookmarks';

    /**
     * Default columns to display in list view
     * @var string 
     */
    public $default_columns = array('name', 'description', 'tags', 'modified', 'actions');

    /**
     * Date the bookmark was modified
     * @var int
     */
    public $modified;

    /**
     * The bookmark's description
     * @var string
     */
    public $description;

    /**
     * The bookmark's tags
     * @var string
     */
    public $tags;

    /**
     * Return a filled result from the given ID
     * @param string $id path to file
     */
    public static function fillFromId($id) {
        $bookmark = OC_Bookmarks_Bookmarks::getBookmark($id);
        if ($bookmark === null) {
            return null;
        }
        // create search result
        $result = new OC_Search_Result_Bookmark($id, '', '', '');
        // fill from file data
        $result->fill($bookmark);
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
        $this->link = $data['url'];
        $this->actions = self::format_actions($data);
        $this->modified = $data['lastmodified'];
        $this->description = $data['description'];
        $this->tags = implode(', ', $data['tags']);
    }

    /**
     * Format select fields to HTML
     */
    public function formatToHtml() {
        $this->name = self::format_name($this->name);
        $this->modified = self::format_date($this->modified);
        $this->description = htmlentities($this->description);
        $this->tags = htmlentities($this->tags);
    }

    /**
     * Create actions HTML
     * @param array $data
     * @return string
     */
    function format_actions($data) {
        $output_html = '<ul class="search_actions">';
        if ($data['user_id'] == OCP\USER::getUser()) {
            $l = OC_L10N::get('search');
            $output_html .= "<li><a href=\"{$data['url']}\">".$l->t('Open')."</a></li>";
            $edit_url = \OCP\Util::linkTo('bookmarks', 'index.php');
            $output_html .= "<li><a href=\"{$edit_url}\">".$l->t('Edit')."</a></li>";
        }
        // return
        return $output_html . '</ul>';
    }

    /**
     * Add an icon to the name
     * @param $name 
     * @return string
     */
    function format_name($name) {
        // add icon
        $url = \OC_Helper::mimetypeIcon('link');
        // add filename
        return '<span class="has-icon" style="background-image: url(' . $url . ');">' . htmlspecialchars($name) . '</span>';
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