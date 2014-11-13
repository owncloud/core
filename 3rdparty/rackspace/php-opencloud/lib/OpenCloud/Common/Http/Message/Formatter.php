<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\Common\Http\Message;

use Guzzle\Http\Message\Response;
use OpenCloud\Common\Constants\Header;
use OpenCloud\Common\Constants\Mime;
use OpenCloud\Common\Exceptions\JsonError;

class Formatter
{

    public static function decode(Response $response)
    {
        if (strpos($response->getHeader(Header::CONTENT_TYPE), Mime::JSON) !== false) {
            $string   = (string) $response->getBody();
            $response = json_decode($string);
            self::checkJsonError($string);
            return $response;
        }
    }

    public static function encode($body)
    {
        return json_encode($body);
    }

    public static function checkJsonError($string = null)
    {
        if (json_last_error()) {
            $error   = sprintf('%s', json_last_error_msg());
            $message = ($string) ? sprintf('%s trying to decode: %s', $error, $string) : $error;
            throw new JsonError($message);
        }
    }

}