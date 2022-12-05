<?php

$dirToParse = 'apps';
$dirIterator = new DirectoryIterator(__DIR__ . '/' . $dirToParse);

$bundledApps = [
	'comments',
	'dav',
	'encryption',
	'federatedfilesharing',
	'federation',
	'files',
	'files_external',
	'files_sharing',
	'files_trashbin',
	'files_versions',
	'provisioning_api',
	'systemtags',
	'updatenotification'
];

$excludeDirs = [
	'lib/composer',
	'build',
	'apps/files_external/3rdparty',
	'apps-external',
	'data',
	'3rdparty',
];

foreach ($dirIterator as $fileinfo) {
	$filename = $fileinfo->getFilename();
	if ($fileinfo->isDir() && !$fileinfo->isDot() && !in_array($filename, $bundledApps)) {
		$excludeDirs[] = $dirToParse . '/' . $filename;
	}
}

$finder = PhpCsFixer\Finder::create()
	->exclude($excludeDirs)
	->notPath('config/config.php')
	->notPath('config/config.backup.php')
	->notPath('tests/autoconfig*')
	->notPath('apps/files_external/templates/list.php')
	->notPath('apps/files_external/templates/settings.php')
	->notPath('core/templates/layout.user.php')
	->notPath('core/templates/twofactorselectchallenge.php')
	->notPath('settings/templates/email.new_user.php')
	->notPath('settings/templates/settingsPage.php')
	->notPath('settings/templates/panels/personal/settings.development.notice.php')
	->in(__DIR__);

$config = new OC\CodingStandard\Config();
$config->setFinder($finder);
return $config;
