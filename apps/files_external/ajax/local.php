<?php

OCP\JSON::checkAppEnabled('files_external');
OCP\JSON::checkLoggedIn();
OCP\JSON::callCheck();
OC_JSON::checkAdminUser();

$localroot = '/home';

if (isset($_POST['path'])) {
	$path = realpath($_POST['path']);
	
	if ( (strpos($path,$localroot) === 0) or empty($_POST['path']) ) {
		if ( empty($_POST['path']) ) {
			$path = $localroot;
		}
		if (!is_dir($path)) {
			//path is incorrect or is a file. Nothing to do, we work only with dirs
			OCP\JSON::error(array('data' => array('message' => 'Incorrect path: ' . $_POST['path'])));
		} elseif (isset($_POST['isnotempty']) && ($_POST['isnotempty'])) {
			//we only check if the dir has subdirs
			$dirs = glob($path . '/*', GLOB_ONLYDIR);
			OCP\JSON::success(array('data' => !empty($dirs)));
		} elseif (isset($_POST['ascendpath']) && ($_POST['ascendpath'])) {
			//we must return the full ascendance path, where
			//key is the predecessor dir and value is a subdir
			//which must be selected in corresponding selector
			//array( '/'      => '/a',
			//       '/a'     => '/a/b',
			//       '/a/b'   => '/a/b/c',
			//       '/a/b/c' => '/a/b/c/d' )
			$dirs = array();
			$curdir = $path;
			$selectdir = $path;
			$parentname = dirname($path);
			$safeguard = 100; //in case of some funny directory loops
			while (($parentname !== $curdir) && ($safeguard > 0)) {
				$safeguard -= 1;
				$curdir = $parentname;
				$parentname = dirname($curdir);
				$dirs[$curdir] = $selectdir;
				$selectdir = $curdir;
			}
			if ($safeguard === 0) {
				//some funny directory loop
				OCP\JSON::error(array('data' => array('message' => 'An error occured while exploring th path: ' . $_POST['path'])));
			} else {
				foreach( $dirs as $dir => $subdir) {
					if ( strpos($dir,$localroot) !== 0 ) {
						unset($dirs[$dir]);
					}
				}
				OCP\JSON::success(array('data' => $dirs));
			}
		} else {
			//normal directory listing, return an array
			//where key is a sibdir name and value is it's full path
			$dirs = array();
			foreach(glob($path . '/*', GLOB_ONLYDIR) as $subdir) {
				$dirs[basename($subdir)] = $subdir;
			}
			OCP\JSON::success(array('data' => $dirs));
		}
	} else {
		OCP\JSON::error(array('data' => array('message' => 'The path is outside of the permitted scope, no listing will be provided: ' . $_POST['path'])));
	}
} else {
	//no path provided
	OCP\JSON::error(array('data' => array('message' => 'Please provide the path for directory listing')));
}
