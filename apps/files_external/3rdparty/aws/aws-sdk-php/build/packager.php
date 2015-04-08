<?php
require __DIR__ . '/artifacts/Burgomaster.php';

$stageDirectory = __DIR__ . '/artifacts/staging';
$projectRoot = __DIR__ . '/../';
$burgomaster = new \Burgomaster($stageDirectory, $projectRoot);
$autoloaderFilename = 'aws-autoloader.php';

$metaFiles = ['README.md', 'LICENSE.md', 'NOTICE.md', 'CHANGELOG.md'];
foreach ($metaFiles as $file) {
    $burgomaster->deepCopy($file, $file);
}

// Copy each dependency to the staging directory. Copy *.php and *.pem files.
$burgomaster->recursiveCopy('src/Aws', 'Aws', ['php', 'json']);
$burgomaster->recursiveCopy('vendor/guzzle/guzzle/src/Guzzle', 'Guzzle', ['php', 'pem']);
$burgomaster->recursiveCopy('vendor/doctrine/cache/lib/Doctrine', 'Doctrine');
$burgomaster->recursiveCopy('vendor/psr/log/Psr', 'Psr');
$burgomaster->recursiveCopy('vendor/monolog/monolog/src/Monolog', 'Monolog');
$burgomaster->recursiveCopy('vendor/symfony/event-dispatcher/Symfony', 'Symfony');

$burgomaster->createAutoloader(array(), $autoloaderFilename);
$burgomaster->createZip(__DIR__ . '/artifacts/aws.zip');
$burgomaster->createPhar(__DIR__ . '/artifacts/aws.phar', null, $autoloaderFilename);
$burgomaster->startSection('test_phar');
$burgomaster->debug('Phar output: '
    . $burgomaster->exec('php ' . __DIR__ . '/test_phar.php'));
$burgomaster->endSection();
