<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;

return static function (RectorConfig $rectorConfig): void {
	$rectorConfig->sets([LevelSetList::UP_TO_PHP_74]);

	$rectorConfig->paths([
		__DIR__ . '/apps',
		__DIR__ . '/core',
		__DIR__ . '/lib',
		__DIR__ . '/ocm-provider',
		__DIR__ . '/ocs',
		__DIR__ . '/ocs-provider',
		__DIR__ . '/settings',
		__DIR__ . '/tests',
	]);
	$rectorConfig->skip([
		__DIR__ . '/*/templates/*',
		__DIR__ . '/lib/composer/*',
	]);
};
