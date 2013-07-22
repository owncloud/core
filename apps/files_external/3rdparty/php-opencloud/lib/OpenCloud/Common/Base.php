<?php
/**
 * The root class for all other classes in this library
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @package phpOpenCloud
 * @version 1.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud\Common;

use OpenCloud\Common\Lang;
use OpenCloud\Common\Exceptions\AttributeError;
use OpenCloud\Common\Exceptions\JsonError;
use OpenCloud\Common\Exceptions\UrlError;

/**
 * The Base class is the root class for all other objects used or defined by
 * this SDK.
 *
 * It contains common code for error handling as well as service functions that
 * are useful. Because it is an abstract class, it cannot be called directly,
 * and it has no publicly-visible properties.
 *
 * @since 1.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */
abstract class Base
{

    private $http_headers = array();
    private $_errors = array();

    /**
     * Debug status.
     *
     * @var bool
     * @access private
     */
    private $debugStatus = false;

    /**
     * Sets the style for outputting debug messages.
     *
     * Echoing messages   == true
     * Returning messages == false
     *
     * (default value: true)
     *
     * @var bool
     * @access private
     */
    private $debugOutputStyle = true;

    /**
     * setDebug function.
     *
     * @access public
     * @return void
     */
    public function setDebug($status)
    {
        $this->debugStatus = $status;
    }

    /**
     * getDebug function.
     *
     * @access public
     * @return void
     */
    public function getDebug()
    {
        return $this->debugStatus;
    }

    /**
     * Sets the debug output style.
     *
     * @access public
     * @param mixed $state
     * @return void
     */
    public function setDebugOutputStyle($state)
    {
        $this->debugOutputStyle = $state;
    }

    /**
     * Gets the debug output style.
     *
     * @access public
     * @return void
     */
    public function getDebugOutputStyle()
    {
        return $this->debugOutputStyle;
    }

    /**
     * Displays a debug message if $RAXSDK_DEBUG is TRUE
     *
     * The primary parameter is a string in sprintf() format, and it can accept
     * up to five optional parameters. It prints the debug message, prefixed
     * with "Debug:" and the class name, to the standard output device.
     *
     * Example:
     *   `$this->debug('Starting execution of %s', get_class($this))`
     *
     * @param string $msg The message string (required); can be in
     *      sprintf() format.
     * @param mixed $p1 Optional argument to be passed to sprintf()
     * @param mixed $p2 Optional argument to be passed to sprintf()
     * @param mixed $p3 Optional argument to be passed to sprintf()
     * @param mixed $p4 Optional argument to be passed to sprintf()
     * @param mixed $p5 Optional argument to be passed to sprintf()
     * @return void
     *
     * @TODO - change this method name to something more descriptive/accurate
     */
    public function debug()
    {
        if ($this->getDebug() === true || RAXSDK_DEBUG === true) {
            return Debug::logMessage($this, func_get_args());
        }
    }

    /**
     * Returns the URL of the service/object
     *
     * The assumption is that nearly all objects will have a URL; at this
     * base level, it simply throws an exception to enforce the idea that
     * subclasses need to define this method.
     *
     * @throws UrlError
     */
    public function Url($subresource = '')
    {
        throw new UrlError(Lang::translate('URL method must be overridden in class definition'));
    }

    /**
     * Sets extended attributes on an object and validates them
     *
     * This function is provided to ensure that attributes cannot
     * arbitrarily added to an object. If this function is called, it
     * means that the attribute is not defined on the object, and thus
     * an exception is thrown.
     *
     * @param string $property the name of the attribute
     * @param mixed $value the value of the attribute
     * @return void
     */
    public function __set($property, $value)
    {
        $this->SetProperty($property, $value);
    }

    /**
     * Sets an extended (unrecognized) property on the current object
     *
     * If RAXSDK_STRICT_PROPERTY_CHECKS is TRUE, then the prefix of the
     * property name must appear in the $prefixes array, or else an
     * exception is thrown.
     *
     * @param string $property the property name
     * @param mixed $value the value of the property
     * @param array $prefixes optional list of supported prefixes
     * @throws \OpenCloud\AttributeError if strict checks are on and
     *      the property prefix is not in the list of prefixes.
     */
    public function SetProperty($property, $value, array $prefixes = array())
    {
        // if strict checks are off, go ahead and set it
        if (!RAXSDK_STRICT_PROPERTY_CHECKS) {
            $this->$property = $value;
        } elseif ($this->CheckAttributePrefix($property, $prefixes)) {
            // otherwise, check the prefix
            $this->$property = $value;
        } else {
            // if that fails, then throw the exception
            throw new AttributeError(sprintf(
                Lang::translate('Unrecognized attribute [%s] for [%s]'),
                $property,
                get_class($this)
            ));
        }
    }

    /**
     * Converts an array of key/value pairs into a single query string
     *
     * For example, array('A'=>1,'B'=>2) would become 'A=1&B=2'.
     *
     * @param array $arr array of key/value pairs
     * @return string
     */
    public function MakeQueryString($array)
    {
        $queryString = '';

        foreach($array as $key => $value) {
            if ($queryString) {
                $queryString .= '&';
            }
            $queryString .= urlencode($key) . '=' .
            	urlencode($this->to_string($value));
        }

        return $queryString;
    }

    /**
     * Checks the most recent JSON operation for errors
     *
     * This function should be called after any `json_*()` function call.
     * This ensures that nasty JSON errors are detected and the proper
     * exception thrown.
     *
     * Example:
     *   `$obj = json_decode($string);`
     *   `if (check_json_error()) do something ...`
     *
     * @return boolean TRUE if an error occurred, FALSE if none
     * @throws JsonError
     */
    public function CheckJsonError()
    {
        switch(json_last_error()) {
            case JSON_ERROR_NONE:
                return false;
                break;
            case JSON_ERROR_DEPTH:
                throw new JsonError(Lang::translate('JSON error: The maximum stack depth has been exceeded'));
                break;
            case JSON_ERROR_STATE_MISMATCH:
                throw new JsonError(Lang::translate('JSON error: Invalid or malformed JSON'));
                break;
            case JSON_ERROR_CTRL_CHAR:
                throw new JsonError(Lang::translate('JSON error: Control character error, possibly incorrectly encoded'));
                break;
            case JSON_ERROR_SYNTAX:
                throw new JsonError(Lang::translate('JSON error: Syntax error'));
                break;
            case JSON_ERROR_UTF8:
                throw new JsonError(Lang::translate('JSON error: Malformed UTF-8 characters, possibly incorrectly encoded'));
                break;
            default:
                throw new JsonError(Lang::translate('Unexpected JSON error'));
                break;
        }

        return true;
    }

    /**
     * Returns a class that implements the HttpRequest interface.
     *
     * This can be stubbed out for unit testing and avoid making live calls.
     */
    public function GetHttpRequestObject($url, $method = 'GET', array $options = array())
    {
        return new Request\Curl($url, $method, $options);
    }

    /**
     * Checks the attribute $property and only permits it if the prefix is
     * in the specified $prefixes array
     *
     * This is to support extension namespaces in some services.
     *
     * @param string $property the name of the attribute
     * @param array $prefixes a list of prefixes
     * @return boolean TRUE if valid; FALSE if not
     */
    private function CheckAttributePrefix($property, array $prefixes = array())
    {
        $prefix = strstr($property, ':', true);

        if (in_array($prefix, $prefixes)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Converts a value to an HTTP-displayable string form
     *
     * @param mixed $x a value to convert
     * @return string
     */
    private function to_string($x)
    {
        if (is_bool($x) && $x) {
            return 'True';
        } elseif (is_bool($x)) {
            return 'False';
        } else {
            return (string) $x;
        }
    }

}
