<?php
/**
 * The Rackspace Cloud DNS persistent object
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @package phpOpenCloud
 * @version 1.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud\DNS;

use OpenCloud\Common\PersistentObject;
use OpenCloud\Common\Lang;
use OpenCloud\Common\Exceptions;

/**
 * The DnsObject class is an extension of the PersistentObject class that
 * permits the asynchronous responses used by Cloud DNS
 *
 */
abstract class Object extends PersistentObject 
{

    /**
     * Create() returns an asynchronous response
     *
     * @param array $params array of key/value pairs
     * @return AsyncResponse
     */
    public function Create($params = array()) 
    {
        $resp = parent::Create($params);
        return new AsyncResponse($this->Service(), $resp->HttpBody());
    }

    /**
     * Update() returns an asynchronous response
     *
     * @param array $params array of key/value pairs
     * @return AsyncResponse
     */
    public function Update($params = array()) 
    {
        $resp = parent::Update($params);
        return new AsyncResponse($this->Service(), $resp->HttpBody());
    }

    /**
     * Delete() returns an asynchronous response
     *
     * @param array $params array of key/value pairs
     * @return AsyncResponse
     */
    public function Delete() 
    {
        $resp = parent::Delete();
        return new AsyncResponse($this->Service(), $resp->HttpBody());
    }

    /**
     * returns the create keys
     */
    public function CreateKeys() 
    {
        return $this->_create_keys;
    }

    /**
     * creates the JSON for create
     *
     * @return stdClass
     */
    protected function CreateJson() 
    {
        if (!isset($this->_create_keys)) {
            throw new Exceptions\CreateError(
                Lang::translate('Missing [_create_keys]')
            );
        }

        $object = new \stdClass;
        $object->{self::JsonCollectionName()} = array(
            $this->GetJson($this->_create_keys)
        );
        return $object;
    }

    /**
     * creates the JSON for update
     *
     * @return stdClass
     */
    protected function UpdateJson($params = array()) 
    {
        if (!isset($this->_update_keys)) {
            throw new Exceptions\UpdateError(
                Lang::translate('Missing [_update_keys]')
            );
        }
        return $this->GetJson($this->_update_keys);
    }

    /**
     * returns JSON based on $keys
     *
     * @param array $keys list of items to include
     * @return stdClass
     */
    private function GetJson($keys) 
    {
        $object = new \stdClass;
        foreach($keys as $item) {
            if ($this->$item) {
                $object->$item = $this->$item;
            }
        }
        return $object;
    }

}
