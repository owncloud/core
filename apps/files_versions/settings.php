<?php

OCP\User::checkAdminUser();

//OCP\Util::addscript( 'files_versions', 'versions' );
OCP\Util::addscript('files_versions', 'settings-admin');

$tmpl = new OCP\Template( 'files_versions', 'settings');
$tmpl->assign( 'versioningEnabled', OCP\Config::getSystemValue('versions', 'true') );
$tmpl->assign( 'versioningLimitType', 'number' );
$tmpl->assign( 'versioningLimitSize', '10 MB' );
$tmpl->assign( 'versioningLimitNumber', '5' );

return $tmpl->fetchPage();
