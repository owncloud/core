<?php

/*
 * This file is part of the Assetic package, an OpenSky project.
 *
 * (c) 2010-2014 OpenSky Project Inc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Assetic\Util;

/**
 * Less Utils.
 *
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 */
abstract class LessUtils extends CssUtils
{
    const REGEX_IMPORTS         = '/@import(?:-once)? (?:url\()?(\'|"|)(?P<url>[^\'"\)\n\r]*)\1\)?;?/';
    const REGEX_IMPORTS_NO_URLS = '/@import(?:-once)? (?!url\()(\'|"|)(?P<url>[^\'"\)\n\r]*)\1;?/';
    const REGEX_COMMENTS        = '/((?:\/\*[^*]*\*+(?:[^\/][^*]*\*+)*\/)|\/\/[^\n]+)/';
}
