<?php

$installedVersion=OCP\Config::getAppValue('files', 'installed_version');

if (version_compare($installedVersion, '1.1.8', '<')) {

	// update wrong mimetypes
	$wrongMimetypes = array(
		'application/mspowerpoint' => 'application/vnd.ms-powerpoint',
		'application/msexcel' => 'application/vnd.ms-excel',
	);

	$stmt = OC_DB::prepare('
		UPDATE `*PREFIX*mimetypes`
		SET    `mimetype` = ?
		WHERE  `mimetype` = ?
	');

	foreach ($wrongMimetypes as $wrong => $correct) {
		OC_DB::executeAudited($stmt, array($wrong, $correct));
	}

	$updatedMimetypes = array(
		'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
		'xlsx' => 'application/vnd.ms-excel',
		'pptx' => 'application/vnd.ms-powerpoint',
	);
	
	// separate doc from docx etc
	foreach ($updatedMimetypes as $extension => $mimetype ) {
		$result = OC_DB::executeAudited('
			SELECT count(`mimetype`)
			FROM   `*PREFIX*mimetypes`
			WHERE  `mimetype` = ?
			',array($mimetype)
		);

		$exists = $result->fetchOne();

		if ( ! $exists ) {
			// insert mimetype
			OC_DB::executeAudited('
				INSERT INTO `*PREFIX*mimetypes` ( `mimetype` )
				VALUES ( ? )
				', array($mimetype)
			);
		}

		// change mimetype for files with x extension
		OC_DB::executeAudited('
			UPDATE `*PREFIX*filecache`
			SET `mimetype` = (
				SELECT `id`
				FROM `*PREFIX*mimetypes`
				WHERE `mimetype` = ?
			) WHERE `name` LIKE ?
			', array($mimetype, '%.'.$extension)
		);
	}
}

// fix webdav properties,add namespace in front of the property, update for OC4.5
if (version_compare($installedVersion, '1.1.6', '<')) {
	// SQL92 string concatenation is ||, some of the DBMS don't know that
	if (OC_Config::getValue('dbtype') === 'mysql') {
		$concat = 'concat(\'{DAV:}\', `propertyname`)';
	} else if (OC_Config::getValue('dbtype') === 'mssql') {
		$concat = '\'{DAV:}\' + `propertyname`';
	} else {
		$concat = '\'{DAV:}\' || `propertyname`';
	}
	$query = OC_DB::executeAudited('
		UPDATE `*PREFIX*properties`
		SET    `propertyname` = ' . $concat . '
		WHERE  `propertyname` NOT LIKE \'{%\'
	');
}

//update from OC 3

//try to remove remaining files.
//Give a warning if not possible

$filesToRemove = array(
	'ajax',
	'appinfo',
	'css',
	'js',
	'l10n',
	'templates',
	'admin.php',
	'download.php',
	'index.php',
	'settings.php'
);

foreach($filesToRemove as $file) {
	$filepath = OC::$SERVERROOT . '/files/' . $file;
	if(!file_exists($filepath)) {
		continue;
	}
	$success = OCP\Files::rmdirr($filepath);
	if($success === false) {
		//probably not sufficient privileges, give up and give a message.
		OCP\Util::writeLog('files', 'Could not clean /files/ directory.'
				.' Please remove everything except webdav.php from ' . OC::$SERVERROOT . '/files/', OCP\Util::ERROR);
		break;
	}
}
