<?php

// this drops the keys below, because they aren't needed anymore
// core related
if (version_compare(\OCP\Config::getSystemValue('version', '0.0.0'), '7.0.0', '<')) {
	\OCP\Config::deleteSystemValue('allowZipDownload');
	\OCP\Config::deleteSystemValue('maxZipInputSize');
}

if (version_compare(\OCP\Config::getAppValue('files', 'installed_version'), '1.1.9', '<')) {

	// update wrong mimetypes
	$wrongMimetypes = array(
		'application/mspowerpoint' => 'application/vnd.ms-powerpoint',
		'application/msexcel' => 'application/vnd.ms-excel',
	);

	$existsStmt = OC_DB::prepare('
		SELECT count(`mimetype`)
		FROM   `*PREFIX*mimetypes`
		WHERE  `mimetype` = ?
	');

	$getIdStmt = OC_DB::prepare('
		SELECT `id`
		FROM   `*PREFIX*mimetypes`
		WHERE  `mimetype` = ?
	');

	$insertStmt = OC_DB::prepare('
		INSERT INTO `*PREFIX*mimetypes` ( `mimetype` )
		VALUES ( ? )
	');

	$updateWrongStmt = OC_DB::prepare('
		UPDATE `*PREFIX*filecache`
		SET `mimetype` = (
			SELECT `id`
			FROM `*PREFIX*mimetypes`
			WHERE `mimetype` = ?
		) WHERE `mimetype` = ?
	');

	$deleteStmt = OC_DB::prepare('
		DELETE FROM `*PREFIX*filecache`
		WHERE `id` = ?
	');

	foreach ($wrongMimetypes as $wrong => $correct) {


		// do we need to remove a wrong mimetype?
		$result = OC_DB::executeAudited($getIdStmt, array($wrong));
		$wrongId = $result->fetchOne();

		if ($wrongId !== false) {

			// do we need to insert the correct mimetype?
			$result = OC_DB::executeAudited($existsStmt, array($correct));
			$exists = $result->fetchOne();

			if ( ! $exists ) {
				// insert mimetype
				OC_DB::executeAudited($insertStmt, array($correct));
			}

			// change wrong mimetype to correct mimetype in filecache
			OC_DB::executeAudited($updateWrongStmt, array($correct, $wrongId));

			// delete wrong mimetype
			OC_DB::executeAudited($deleteStmt, array($wrongId));

		}

	}

	$updatedMimetypes = array(
		'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
		'xlsx' => 'application/vnd.ms-excel',
		'pptx' => 'application/vnd.ms-powerpoint',
	);

	$updateByNameStmt = OC_DB::prepare('
		UPDATE `*PREFIX*filecache`
		SET `mimetype` = (
			SELECT `id`
			FROM `*PREFIX*mimetypes`
			WHERE `mimetype` = ?
		) WHERE `name` LIKE ?
	');

	// separate doc from docx etc
	foreach ($updatedMimetypes as $extension => $mimetype ) {
		$result = OC_DB::executeAudited($existsStmt, array($mimetype));
		$exists = $result->fetchOne();

		if ( ! $exists ) {
			// insert mimetype
			OC_DB::executeAudited($insertStmt, array($mimetype));
		}

		// change mimetype for files with x extension
		OC_DB::executeAudited($updateByNameStmt, array($mimetype, '%.'.$extension));
	}
}