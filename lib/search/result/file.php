<?php

/**
 * A found file
 */
class OC_Search_Result_File extends OC_Search_Result {
    /**
     * Type name; translated in templates
     * @var string 
     */

    const TITLE = 'Files';

    /**
     * Default columns to display in list view
     * @var string
     */
    public $default_columns = array('name', 'size', 'modified', 'actions');

    /**
     * Path to file
     * @var string
     */
    public $path;

    /**
     * Size, in bytes
     * @var int 
     */
    public $size;

    /**
     * Date modified, in human readable form
     * @var string
     */
    public $modified;

    /**
     * File mime type
     * @var string
     */
    public $mime_type;

    /**
     * File permissions:
     * 
     * @var string
     */
    public $permissions;

    /**
     * Return a filled result from the given ID
     * @param string $id path to file
     */
    public static function fillFromId($id) {
	// get path to file
	$path = $id;
	// get fileData
	$fileData = \OC\Files\Filesystem::getFileInfo($path);
	// create result
	$result = new OC_Search_Result_File($fileData['fileid'], '', '', '');
	// fill from file data
	$result->fill($fileData);
	// return
	return $result;
    }

    /**
     * 
     * @return string
     */
    public function getContent() {
	$content = '';
	// convert path by removing the root path string
	$path = str_ireplace('files/', '', $this->path);
	switch ($this->mime_type) {
	    case 'httpd/unix-directory':
		$content = 'folder directory';
		break;
	    case 'application/pdf':
		require_once 'Zend/Pdf.php';
		$_content = \OC\Files\Filesystem::file_get_contents($path);
		$pdf = Zend_Pdf::parse($_content);
		$parser = new OCA\Search\PdfParser();
		$content = $parser->pdf2txt($pdf->render());
		break;
	    case 'text/html': case 'text/xml': case 'application/msword':
		$content = strip_tags(\OC\Files\Filesystem::file_get_contents($path));
		break;
	    case 'text/plain':
	    default:
		$content = \OC\Files\Filesystem::file_get_contents($path);
		break;
	}
	return $content;
    }

    /**
     * Fill the current result with the given data
     * @param string $id
     */
    public function fill(array $data) {
	$info = pathinfo($data['path']);
	$this->id = $data['fileid'];
	$this->name = $info['basename'];
	$this->link = \OCP\Util::linkTo('files', 'index.php', array('dir' => $info['dirname'], 'file' => $info['basename']));
	$this->permissions = self::get_permissions($data['path']);
	$this->actions = self::format_actions($data['path'], $data['mimetype'], $this->permissions);
	$this->path = (strpos($data['path'], 'files') === 0) ? substr($data['path'], 5) : $data['path'];
	$this->size = $data['size'];
	$this->modified = $data['mtime'];
	$this->mime_type = $data['mimetype'];
    }

    /**
     * Format select fields to HTML
     */
    public function formatToHtml() {
	$this->name = self::format_name($this->path, $this->mime_type);
	$this->size = self::format_size($this->size);
	$this->modified = self::format_date($this->modified);
    }

    /**
     * Determine permissions for a given file path
     * @param string $path
     * @return int
     */
    function get_permissions($path) {
	// add read permissions
	$permissions = \OCP\PERMISSION_READ;
	// get directory
	$fileinfo = pathinfo($path);
	$dir = $fileinfo['dirname'] . '/';
	// add update permissions
	if (\OC_Filesystem::isUpdatable($dir)) {
	    $permissions |= \OCP\PERMISSION_UPDATE;
	}
	// add delete permissions
	if (\OC_Filesystem::isDeletable($dir)) {
	    $permissions |= \OCP\PERMISSION_DELETE;
	}
	// add share permissions
	if (\OC_Filesystem::isSharable($dir)) {
	    $permissions |= \OCP\PERMISSION_SHARE;
	}
	// return
	return $permissions;
    }

    /**
     * Formats the file name into an HTML span; adds icon and an extension span
     * @param type $path
     * @param type $mimetype
     * @return type
     */
    function format_name($path, $mimetype) {
	$pathinfo = pathinfo($path);
	// add icon
	$url = \OC_Helper::mimetypeIcon($mimetype);
	$icon = ' style="background-image: url(' . $url . '); "';
	// add filename
	$output = '<span class="filename has-icon"' . $icon . '>' . htmlspecialchars($pathinfo['filename']) . '</span>';
	// add extension
	if (!empty($pathinfo['extension'])) {
	    $output .= "<span class=\"extension\">.{$pathinfo['extension']}</span>";
	}
	return $output;
    }

    /**
     * 
     * @param array $input_data
     * @return string
     */
    function format_actions($path, $mimetype, $permissions) {
	$output_html = '<ul class="search_actions">';
	// dir or file?
	if ($mimetype == 'httpd/unix-directory') {
	    $dir = $path;
	    $file = null;
	} else {
	    $file_info = pathinfo($path);
	    $dir = $file_info['dirname'];
	    $file = $file_info['basename'];
	}
	$dir = str_ireplace(OC_Filesystem::getRoot(), '/', $dir);
	// download
	if ($permissions & \OCP\PERMISSION_READ) {
	    $url = \OCP\Util::linkTo('files', 'ajax/download.php', array('dir' => $dir, 'files' => $file));
	    $output_html .= "<li><a href=\"{$url}\">Download</a></li>";
	}
	// go to location
	if ($permissions & \OCP\PERMISSION_READ) {
	    $url = \OCP\Util::linkTo('files', 'index.php', array('dir' => $dir));
	    $output_html .= "<li><a href=\"{$url}\">Go to location</a></li>";
	}
	// delete
	if ($permissions & \OCP\PERMISSION_DELETE) {
	    $url = \OCP\Util::linkTo('files', 'ajax/delete.php', array('dir' => $dir, 'file' => $file));
	    $output_html .= "<li><a href=\"{$url}\">Delete</a></li>";
	}
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