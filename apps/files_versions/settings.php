<?php

OCP\User::checkAdminUser();

//OCP\Util::addscript( 'files_versions', 'versions' );
OCP\Util::addscript('files_versions', 'settings-admin');
$tmpl = new OCP\Template( 'files_versions', 'settings');
$tmpl->assign( 'versioningEnabled', OCP\Config::getSystemValue('versions', 'true') );
$tmpl->assign( 'versioningLimitType', OCP\Config::getAppValue('files_versions', 'limitType', 'time') );
$tmpl->assign( 'versioningLimitSize', OCP\Util::humanFileSize(OCP\Config::getAppValue('files_versions', 'max_size', '0')) );
$tmpl->assign( 'versioningLimitTime', OCP\Config::getAppValue('files_versions', 'max_time', '0') );

return $tmpl->fetchPage();
