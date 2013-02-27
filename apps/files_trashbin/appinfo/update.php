<?php

$installedVersion=OCP\Config::getAppValue('files_trashbin', 'installed_version');
// move versions to new directory

if (version_compare($installedVersion, '0.2', '<')) {
	$datadir = \OCP\Config::getSystemValue('datadirectory').'/';

	$users = \OCP\User::getUsers();
	foreach ($users as $user) {
		
		//create new folders
		@mkdir($datadir.$user.'/files_trashbin/files');
		@mkdir($datadir.$user.'/files_trashbin/versions');
		@mkdir($datadir.$user.'/files_trashbin/keyfiles');
			
		// move files to the new folders
		if ($handle = opendir($datadir.$user.'/files_trashbin')) {
			while (false !== ($file = readdir($handle))) {
				if ($file != "." && $file != ".." && $file != 'files' && $file != 'versions' && $file != 'keyfiles') {
					rename($datadir.$user.'/files_trashbin/'.$file,
							$datadir.$user.'/files_trashbin/files/'.$file);
				}
			}
			closedir($handle);
		}
				
		// move versions to the new folder
		$old_trashbin_dir = $datadir.$user.'/versions_trashbin';
		if (!is_dir($old_trashbin_dir)) {
			continue;
		}
		if ($handle = opendir($old_trashbin_dir)) {
			while (false !== ($file = readdir($handle))) {
				rename($old_trashbin_dir.'/'.$file,
						$datadir.$user.'/files_trashbin/versions/'.$file);
			}
			closedir($handle);
		}
		
		@rmdir($old_trashbin_dir);
		
	}
}
