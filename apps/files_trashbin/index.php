<?php

// Check if we are a user
OCP\User::checkLoggedIn();

OCP\App::setActiveNavigationEntry('files_index');

OCP\Util::addScript('files_trashbin', 'disableDefaultActions');
OCP\Util::addScript('files', 'fileactions');
$tmpl = new OCP\Template('files_trashbin', 'index', 'user');

OCP\Util::addStyle('files', 'files');
OCP\Util::addScript('files', 'filelist');
// filelist overrides
OCP\Util::addScript('files_trashbin', 'filelist');
OCP\Util::addscript('files', 'files');
OCP\Util::addScript('files_trashbin', 'trash');

$dir = isset($_GET['dir']) ? stripslashes($_GET['dir']) : '';

$isIE8 = false;
preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $matches);
if (count($matches) > 0 && $matches[1] <= 8){
	$isIE8 = true;
}

// if IE8 and "?dir=path" was specified, reformat the URL to use a hash like "#?dir=path"
if ($isIE8 && isset($_GET['dir'])){
	if ($dir === ''){
		$dir = '/';
	}
	header('Location: ' . OCP\Util::linkTo('files_trashbin', 'index.php') . '#?dir=' . \OCP\Util::encodePath($dir));
	exit();
}

$breadcrumb = \OCA\Files_Trashbin\Helper::makeBreadcrumb($dir);

$breadcrumbNav = new OCP\Template('files_trashbin', 'part.breadcrumb', '');
$breadcrumbNav->assign('breadcrumb', $breadcrumb);
$breadcrumbNav->assign('baseURL', OCP\Util::linkTo('files_trashbin', 'index.php') . '?dir=');
$breadcrumbNav->assign('home', OCP\Util::linkTo('files', 'index.php'));

$tmpl->assign('breadcrumb', $breadcrumbNav->fetchPage());
$tmpl->assign('dir', $dir);
$tmpl->assign('disableSharing', true);

$tmpl->printPage();
