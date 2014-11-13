<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\Autoscale\Resource;

use OpenCloud\Common\PersistentObject;

/**
 * Contains generic, abstracted functionality for Autoscale resources.
 */
abstract class AbstractResource extends PersistentObject
{
    /**
     * These are used to set the object used for JSON encode. 
     * 
     * @var array 
     */
    public $createKeys = array();
    
    /**
     * These resources are associated with this one. When this resource object  
     * is populated, if a key is found matching one of these array keys, it is
     * set as an instantiated resource object (rather than an arbitrary string
     * or stdClass object).
     * 
     * @var array 
     */
    public $associatedResources = array();
    
    /**
     * Same as an associated resource, but it's instantiated as a Collection.
     * 
     * @var array 
     */
    public $associatedCollections = array();
    
    /**
     * Creates the object which will be JSON encoded for request.
     * 
     * @return \stdClass
     */
    public function createJson() 
    {
        $object = new \stdClass;

        foreach ($this->createKeys as $key) {
            if ($value = $this->getProperty($key)) {
                $object->$key = $value;
            }
        }
        
        if (!empty($this->metadata)) {
            $object->metadata = new \stdClass;
            foreach ($this->getMetadata()->toArray() as $key => $value) {
                $object->metadata->$key = $value;
            }
        }

        return $object;
    }
    
    /**
     * Creates the object which will be JSON encoded for request.
     * 
     * @return array
     */
    protected function updateJson($params = array())
    {
        $existing = array();
        foreach ($this->createKeys as $key) {
            $existing[$key] = $this->$key;
        }
        
        return $existing + $params;
    }
    
    public function primaryKeyField()
    {
        return 'id';
    }
    
}