<?php
/**
 * PHP OpenCloud library
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\Common;

use OpenCloud\Common\Collection\PaginatedIterator;
use OpenCloud\Common\Exceptions\JsonError;
use OpenCloud\Common\Exceptions\UrlError;
use OpenCloud\Common\Collection\ResourceIterator;
use OpenCloud\Common\Constants\Header as HeaderConst;
use OpenCloud\Common\Constants\Mime as MimeConst;

/**
 * The root class for all other objects used or defined by this SDK.
 *
 * It contains common code for error handling as well as service functions that
 * are useful. Because it is an abstract class, it cannot be called directly,
 * and it has no publicly-visible properties.
 */
abstract class Base
{
    /**
     * @var array Holds all the properties added by overloading.
     */
    private $properties = array();

    /**
     * Debug status.
     *
     * @var    LoggerInterface
     * @access private
     */
    private $logger;

    /**
     * @return static
     */
    public static function getInstance()
    {
        return new static();
    }

    /**
     * Intercept non-existent method calls for dynamic getter/setter functionality.
     *
     * @param $method
     * @param $args
     * @throws Exceptions\RuntimeException
     */
    public function __call($method, $args)
    {
        $prefix = substr($method, 0, 3);

        // Get property - convert from camel case to underscore
        $property = lcfirst(substr($method, 3));

        // Only do these methods on properties which exist
        if ($this->propertyExists($property) && $prefix == 'get') {
            return $this->getProperty($property);
        }

        // Do setter
        if ($this->propertyExists($property) && $prefix == 'set') {
            return $this->setProperty($property, $args[0]);
        }
        
        throw new Exceptions\RuntimeException(sprintf(
        	'No method %s::%s()', 
        	get_class($this), 
        	$method
		));
    }
        
    /**
     * We can set a property under three conditions:
     *
     * 1. If it has a concrete setter: setProperty()
     * 2. If the property exists
     * 3. If the property name's prefix is in an approved list
     *
     * @param  mixed $property
     * @param  mixed $value
     * @return mixed
     */
    protected function setProperty($property, $value)
    {
        $setter = 'set' . $this->toCamel($property);

        if (method_exists($this, $setter)) {
            
            return call_user_func(array($this, $setter), $value);
            
        } elseif (false !== ($propertyVal = $this->propertyExists($property))) { 
            
            // Are we setting a public or private property?
            if ($this->isAccessible($propertyVal)) {
                $this->$propertyVal = $value;
            } else {
                $this->properties[$propertyVal] = $value;
            }

            return $this;

        } else {

            $this->getLogger()->warning(
                'Attempted to set {property} with value {value}, but the'
                . ' property has not been defined. Please define first.',
                array(
                    'property' => $property,
                    'value'    => print_r($value, true)
                )
            );
        }
    }

    /**
     * Basic check to see whether property exists.
     *
     * @param string $property   The property name being investigated.
     * @param bool   $allowRetry If set to TRUE, the check will try to format the name in underscores because
     *                           there are sometimes discrepancies between camelCaseNames and underscore_names.
     * @return bool
     */
    protected function propertyExists($property, $allowRetry = true)
    {
        if (!property_exists($this, $property) && !$this->checkAttributePrefix($property)) {
            // Convert to under_score and retry
            if ($allowRetry) {
                return $this->propertyExists($this->toUnderscores($property), false);
            } else {
                $property = false;
            }
        }

        return $property;
    }

    /**
     * Convert a string to camelCase format.
     *
     * @param       $string
     * @param  bool $capitalise Optional flag which allows for word capitalization.
     * @return mixed
     */
    function toCamel($string, $capitalise = true) 
    {
        if ($capitalise) {
            $string = ucfirst($string);
        }
        return preg_replace_callback('/_([a-z])/', function($char) {
            return strtoupper($char[1]);
        }, $string);
    }

    /**
     * Convert string to underscore format.
     *
     * @param $string
     * @return mixed
     */
    function toUnderscores($string) 
    {
        $string = lcfirst($string);
        return preg_replace_callback('/([A-Z])/', function($char) {
            return "_" . strtolower($char[1]);
        }, $string);
    }

    /**
     * Does the property exist in the object variable list (i.e. does it have public or protected visibility?)
     *
     * @param $property
     * @return bool
     */
    private function isAccessible($property)
    {
        return array_key_exists($property, get_object_vars($this));
    }
    
    /**
     * Checks the attribute $property and only permits it if the prefix is
     * in the specified $prefixes array
     *
     * This is to support extension namespaces in some services.
     *
     * @param string $property the name of the attribute
     * @return boolean
     */
    private function checkAttributePrefix($property)
    {
        if (!method_exists($this, 'getService')) {
            return false;
        }
        $prefix = strstr($property, ':', true);
        return in_array($prefix, $this->getService()->namespaces());
    }
    
    /**
     * Grab value out of the data array.
     *
     * @param string $property
     * @return mixed
     */
    protected function getProperty($property)
    {
        if (array_key_exists($property, $this->properties)) {
            return $this->properties[$property];
        } elseif (array_key_exists($this->toUnderscores($property), $this->properties)) {
            return $this->properties[$this->toUnderscores($property)];
        } elseif (method_exists($this, 'get' . ucfirst($property))) {
            return call_user_func(array($this, 'get' . ucfirst($property)));
        } elseif (false !== ($propertyVal = $this->propertyExists($property)) && $this->isAccessible($propertyVal)) {
            return $this->$propertyVal;
        }
        
        return null;
    }
    
    /**
     * Sets the logger.
     *
     * @param Log\LoggerInterface $logger
     * @return $this
     */
    public function setLogger(Log\LoggerInterface $logger)
    {
        $this->logger = $logger;
        return $this;
    }

    /**
     * Returns the Logger object.
     * 
     * @return \OpenCloud\Common\Log\AbstractLogger
     */
    public function getLogger()
    {
        if (null === $this->logger) {
            $this->setLogger(new Log\Logger);
        }
        return $this->logger;
    }

    /**
     * @deprecated
     */
    public function url($path = null, array $query = array())
    {
        return $this->getUrl($path, $query);
    }

    /**
     * Populates the current object based on an unknown data type.
     * 
     * @param  mixed $info
     * @param  bool
     * @throws Exceptions\InvalidArgumentError
     */
    /**
     * @param  mixed $info       The data structure that is populating the object.
     * @param  bool  $setObjects If set to TRUE, then this method will try to populate associated resources as objects
     *                           rather than anonymous data types. So, a Server being populated might stock a Network
     *                           object instead of a stdClass object.
     * @throws Exceptions\InvalidArgumentError
     */
    public function populate($info, $setObjects = true)
    {
        if (is_string($info) || is_integer($info)) {
            
            $this->setProperty($this->primaryKeyField(), $info);
            $this->refresh($info);
            
        } elseif (is_object($info) || is_array($info)) {

            foreach ($info as $key => $value) {
                
                if ($key == 'metadata' || $key == 'meta') {
                    
                    // Try retrieving existing value
                    if (null === ($metadata = $this->getProperty($key))) {
                        // If none exists, create new object
                        $metadata = new Metadata;
                    }
                    
                    // Set values for metadata
                    $metadata->setArray($value);
                    
                    // Set object property
                    $this->setProperty($key, $metadata);
                    
                } elseif (!empty($this->associatedResources[$key]) && $setObjects === true) {

                    // Associated resource
                    try {

                        $resource = $this->getService()->resource($this->associatedResources[$key], $value);
                        $resource->setParent($this);

                        $this->setProperty($key, $resource);

                    } catch (Exception\ServiceException $e) {}
   
                } elseif (!empty($this->associatedCollections[$key]) && $setObjects === true) {

                    // Associated collection
                    try {

                        $className = $this->associatedCollections[$key];
                        $options = $this->makeResourceIteratorOptions($className);
                        $iterator = ResourceIterator::factory($this, $options, $value);

                        $this->setProperty($key, $iterator);

                    } catch (Exception\ServiceException $e) {}
                    
                } elseif (!empty($this->aliases[$key])) {

                    // Sometimes we might want to preserve camelCase
                    // or covert `rax-bandwidth:bandwidth` to `raxBandwidth`
                    $this->setProperty($this->aliases[$key], $value);
                    
                } else {
                    // Normal key/value pair
                    $this->setProperty($key, $value);
                }

            }
        } elseif (null !== $info) {
            throw new Exceptions\InvalidArgumentError(sprintf(
                Lang::translate('Argument for [%s] must be string or object'), 
                get_class()
            ));
        }
    }

    /**
     * Checks the most recent JSON operation for errors.
     *
     * @throws Exceptions\JsonError
     * @codeCoverageIgnore
     */
    public static function checkJsonError()
    {
        switch (json_last_error()) {
            case JSON_ERROR_NONE:
                return;
            case JSON_ERROR_DEPTH:
                $jsonError = 'JSON error: The maximum stack depth has been exceeded';
                break;
            case JSON_ERROR_STATE_MISMATCH:
                $jsonError = 'JSON error: Invalid or malformed JSON';
                break;
            case JSON_ERROR_CTRL_CHAR:
                $jsonError = 'JSON error: Control character error, possibly incorrectly encoded';
                break;
            case JSON_ERROR_SYNTAX:
                $jsonError = 'JSON error: Syntax error';
                break;
            case JSON_ERROR_UTF8:
                $jsonError = 'JSON error: Malformed UTF-8 characters, possibly incorrectly encoded';
                break;
            default:
                $jsonError = 'Unexpected JSON error';
                break;
        }
        
        if (isset($jsonError)) {
            throw new JsonError(Lang::translate($jsonError));
        }
    }

    public static function generateUuid()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),

            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    public function makeResourceIteratorOptions($resource)
    {
        $options = array('resourceClass' => $this->stripNamespace($resource));

        if (method_exists($resource, 'jsonCollectionName')) {
            $options['key.collection'] = $resource::jsonCollectionName();
        }

        if (method_exists($resource, 'jsonCollectionElement')) {
            $options['key.collectionElement'] = $resource::jsonCollectionElement();
        }

        return $options;
    }

    public function stripNamespace($namespace)
    {
        $array = explode('\\', $namespace);
        return end($array);
    }

    protected static function getJsonHeader()
    {
        return array(HeaderConst::CONTENT_TYPE => MimeConst::JSON);
    }

}
