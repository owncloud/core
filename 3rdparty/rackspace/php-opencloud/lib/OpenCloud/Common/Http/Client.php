<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\Common\Http;

use Guzzle\Http\Client as GuzzleClient;
use Guzzle\Http\Curl\CurlHandle;
use Guzzle\Http\Curl\CurlVersion;
use OpenCloud\Common\Exceptions\UnsupportedVersionError;

/**
 * Base client object which handles HTTP transactions. Each service is based off of a Client which acts as a
 * centralized parent.
 */ 
class Client extends GuzzleClient
{
    const VERSION = '1.9.0';
    const MINIMUM_PHP_VERSION = '5.3.0';

    public function __construct($baseUrl = '', $config = null)
    {
        // @codeCoverageIgnoreStart
    	if (PHP_VERSION < self::MINIMUM_PHP_VERSION) {
    		throw new UnsupportedVersionError(sprintf(
                'You must have PHP version >= %s installed.',
                self::MINIMUM_PHP_VERSION
            ));
        }
        // @codeCoverageIgnoreEnd

        parent::__construct($baseUrl, $config);
    }
    
    public function getDefaultUserAgent()
    {
        return 'OpenCloud/' . self::VERSION
            . ' cURL/' . CurlVersion::getInstance()->get('version')
            . ' PHP/' . PHP_VERSION;
    }

    public function getUserAgent()
    {
        return $this->userAgent;
    }
    
}