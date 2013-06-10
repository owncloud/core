<?php
// Init owncloud

// Firefox and Konqueror tries to download application/json for me.  --Arthur
OCP\JSON::setContentTypeHeader('text/plain');

// If a directory token is sent along check if public upload is permitted.
// If not, check the login.
// If no token is sent along, rely on login only
if ($_POST['dirToken']) {
  $linkItem = OCP\Share::getShareByToken($_POST['dirToken']);

  if (!($linkItem['permissions'] & OCP\PERMISSION_CREATE)) {
    OCP\JSON::checkLoggedIn();
  } else {

    // The token defines the target directory (security reasons)
    $dir = $linkItem['file_target'];

    // Setup FS with owner
    // NOTE: this subject has been discussed in the IRC channel. So far however I didn't come to a conclusion
    // about possible security issues on this line. Please take a closer look at this during evaluation.
    OC_Util::setupFS($linkItem['uid_owner']);
  }
} else {
  // The standard case, files are uploaded through logged in users :)
  OCP\JSON::checkLoggedIn();
  $dir = isset($_POST['dir']) ? $_POST['dir'] : "";
}

OCP\JSON::callCheck();
$l = OC_L10N::get((isset($_POST['appname']) ? $_POST['appname'] : 'files' ));

// get array with current storage stats (e.g. max file size)
$storageStats = \OCA\files\lib\Helper::buildFileStorageStatistics($dir);

if (!isset($_FILES['files'])) {
	OCP\JSON::error(array('data' => array_merge(array('message' => $l->t('No file was uploaded. Unknown error')), $storageStats)));
	exit();
}

foreach ($_FILES['files']['error'] as $error) {
	if ($error != 0) {
		$errors = array(
			UPLOAD_ERR_OK => $l->t('There is no error, the file uploaded with success'),
			UPLOAD_ERR_INI_SIZE => $l->t('The uploaded file exceeds the upload_max_filesize directive in php.ini: ')
				. ini_get('upload_max_filesize'),
			UPLOAD_ERR_FORM_SIZE => $l->t('The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form'),
			UPLOAD_ERR_PARTIAL => $l->t('The uploaded file was only partially uploaded'),
			UPLOAD_ERR_NO_FILE => $l->t('No file was uploaded'),
			UPLOAD_ERR_NO_TMP_DIR => $l->t('Missing a temporary folder'),
			UPLOAD_ERR_CANT_WRITE => $l->t('Failed to write to disk'),
		);
		OCP\JSON::error(array('data' => array_merge(array('message' => $errors[$error]), $storageStats)));
		exit();
	}
}
$files = $_FILES['files'];

$error = '';

$maxUploadFilesize = OCP\Util::maxUploadFilesize($dir);
$maxHumanFilesize = OCP\Util::humanFileSize($maxUploadFilesize);

$totalSize = 0;
foreach ($files['size'] as $size) {
	$totalSize += $size;
}
if ($maxUploadFilesize >= 0 and $totalSize > $maxUploadFilesize) {
	OCP\JSON::error(array('data' => array('message' => $l->t('Not enough storage available'),
		'uploadMaxFilesize' => $maxUploadFilesize,
		'maxHumanFilesize' => $maxHumanFilesize)));
	exit();
}

$result = array();
if (strpos($dir, '..') === false) {
	$fileCount = count($files['name']);
	for ($i = 0; $i < $fileCount; $i++) {
		$target = OCP\Files::buildNotExistingFileName(stripslashes($dir), $files['name'][$i]);
		// $path needs to be normalized - this failed within drag'n'drop upload to a sub-folder
		$target = \OC\Files\Filesystem::normalizePath($target);
		if (is_uploaded_file($files['tmp_name'][$i]) and \OC\Files\Filesystem::fromTmpFile($files['tmp_name'][$i], $target)) {
			$meta = \OC\Files\Filesystem::getFileInfo($target);
			// updated max file size after upload
			$storageStats = \OCA\files\lib\Helper::buildFileStorageStatistics($dir);

			$result[] = array('status' => 'success',
				'mime' => $meta['mimetype'],
				'size' => $meta['size'],
				'id' => $meta['fileid'],
				'name' => basename($target),
				'originalname'=>$files['name'][$i],
				'uploadMaxFilesize' => $maxUploadFilesize,
				'maxHumanFilesize' => $maxHumanFilesize
			);
		}
	}
	OCP\JSON::encodedPrint($result);
	exit();
} else {
	$error = $l->t('Invalid directory.');
}

OCP\JSON::error(array('data' => array_merge(array('message' => $error), $storageStats)));
