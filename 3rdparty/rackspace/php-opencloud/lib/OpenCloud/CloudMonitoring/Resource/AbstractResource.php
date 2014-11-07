<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\CloudMonitoring\Resource;

use OpenCloud\Common\Exceptions;
use OpenCloud\Common\PersistentObject;
use OpenCloud\Common\Http\Message\Formatter;

abstract class AbstractResource extends PersistentObject
{
    public function createJson()
    {
        foreach (static::$requiredKeys as $requiredKey) {
            if (!$this->getProperty($requiredKey)) {
                throw new Exceptions\CreateError(sprintf(
                    "%s is required to create a new %s", $requiredKey, get_class()
                ));
            }
        }

        $object = new \stdClass;
        
        foreach (static::$emptyObject as $key) {
            if ($property = $this->getProperty($key)) {
                $object->$key = $property;
            }
        }
        
        return $object;
    }

    protected function updateJson($params = array())
    {
        $object = (object) $params;       
        
        foreach (static::$requiredKeys as $requiredKey) {
            if (!$this->getProperty($requiredKey)) {
                throw new Exceptions\UpdateError(sprintf(
                    "%s is required to update a %s", $requiredKey, get_class($this)
                ));
            }
        }

        return $object;
    }

    /**
     * Retrieves a collection of resource objects.
     * 
     * @access public
     * @return void
     */
    public function listAll()
    {
        return $this->getService()->collection(get_class($this), $this->url());
    }

    /**
     * Test the validity of certain parameters for the resource.
     * 
     * @access public
     * @param array $params (default: array())
     * @param bool $debug (default: false)
     * @return void
     */
    public function testParams($params = array(), $debug = false)
    {
        $json = json_encode((object) $params);

        // send the request
        $response = $this->getService()
            ->getClient()
            ->post($this->testUrl($debug), self::getJsonHeader(), $json)
            ->send();

        return Formatter::decode($response);
    }

    /**
     * Test the validity of an existing resource.
     * 
     * @access public
     * @param bool $debug (default: false)
     * @return void
     */
    public function test($debug = false)
    {
        $json = json_encode($this->updateJson());
        $this->checkJsonError();

        $response = $this->getClient()
            ->post($this->testExistingUrl($debug), self::getJsonHeader(), $json)
            ->send();

        return Formatter::decode($response);
    }
   
}