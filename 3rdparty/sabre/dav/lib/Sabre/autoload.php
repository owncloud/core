<?php

/**
 * SabreDAV's autoloader
 *
 * This file is kept for backwards compatibility purposes.
 * SabreDAV now uses the composer autoloader.
 *
 * You should stop including this file, and include 'vendor/autoload.php'
 * instead.
 *
 * @deprecated Will be removed in a future version!
 * @copyright Copyright (C) 2007-2014 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */

/**
 * We are assuming that the composer autoloader is just 2 directories up.
 *
 * This is not the case when sabredav is installed as a dependency. But, in
 * those cases it's not expected that people will look for this file anyway.
 */

require __DIR__ . '/../../vendor/autoload.php';
