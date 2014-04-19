<?php

OCP\JSON::checkAppEnabled('files_external');
OCP\JSON::checkLoggedIn();
OCP\JSON::callCheck();

if (isset($_POST['path'])) {
	if (!is_dir($_POST['path'])) {
		OCP\JSON::error(array('data' => array('message' => 'Incorrect path: ' . $_POST['path'])));
	} elseif (isset($_POST['isnotempty']) && ($_POST['isnotempty'])) {
		$dirs = glob($_POST['path'] . '/*', GLOB_ONLYDIR);
		OCP\JSON::success(array('data' => !empty($dirs)));
	} else {
		$dirs = array();
		foreach(glob($_POST['path'] . '/*', GLOB_ONLYDIR) as $subdir) {
			$dirs[basename($subdir)] = $subdir;
		}
		OCP\JSON::success(array('data' => $dirs));
	}
} else {
	OCP\JSON::error(array('data' => array('message' => 'Please provide the path for directory listing')));
}
