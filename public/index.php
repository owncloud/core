<?php
// stupid file copy - just for the prove of concept
// maybe using an asset pipeline could help here?
function clone_assets($dir) {
	if (file_exists($dir)) {
		return;
	}
	$src = __DIR__.'/../'.$dir;
	$dest = dirname(__DIR__.'/'.$dir);
	$r0 = mkdir($dest, 0777, true);
	$r1 = `cp -r $src $dest`;
}

clone_assets("3rdparty/js");
clone_assets("3rdparty/css");
clone_assets("3rdparty/Jcrop/css");
clone_assets("3rdparty/Jcrop/js");
clone_assets("3rdparty/zxcvbn/js");
clone_assets("core/img");
clone_assets("core/fonts");
clone_assets("core/css");
clone_assets("core/js");
clone_assets("settings/img");
clone_assets("settings/css");
clone_assets("settings/js");
clone_assets("search/js");
clone_assets("apps/files/js");
clone_assets("apps/files_external/js");
clone_assets("apps/files_sharing/js");
clone_assets("apps/files/css");
clone_assets("apps/files_external/css");
clone_assets("apps/files_sharing/css");

define('OWNCLOUD_PUBLIC_FOLDER', 1);

// require top level index.php
require '../index.php';

