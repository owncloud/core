<?php
/**
 * PHP OpenCloud library.
 *
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud;

use Guzzle\Http\Curl\CurlVersion;
use Guzzle\Common\Version as GuzzleVersion;

/**
 * Class Version
 *
 * @package OpenCloud
 */
class Version 
{
    const VERSION = '1.9.2';

    /**
     * @return string Indicate current SDK version.
     */
    public static function getVersion()
    {
        return self::VERSION;
    }

    /**
     * @return bool|float|string Indicate cURL's version.
     */
    public static function getCurlVersion()
    {
        return CurlVersion::getInstance()->get('version');
    }

    /**
     * @return string Indicate Guzzle's version.
     */
    public static function getGuzzleVersion()
    {
        return GuzzleVersion::VERSION;
    }

} 