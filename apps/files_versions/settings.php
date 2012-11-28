<?php

OCP\User::checkAdminUser();

//OCP\Util::addscript( 'files_versions', 'versions' );
OCP\Util::addscript('files_versions', 'settings-admin');
$tmpl = new OCP\Template( 'files_versions', 'settings');
$tmpl->assign( 'versioningEnabled', OCP\Config::getSystemValue('versions', 'true') );
$tmpl->assign( 'versioningLimitType', OCP\Config::getAppValue('files_versions', 'limitType', 'number') );
$tmpl->assign( 'versioningLimitSize', OCP\Config::getAppValue('files_versions', 'max_size', '10485760') );
$tmpl->assign( 'versioningLimitNumber', OCP\Config::getAppValue('files_versions', 'max_number', '5') );

return $tmpl->fetchPage();
