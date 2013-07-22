<?php
/**
 * A Cloud Databases instance (similar to a Compute Server)
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @package phpOpenCloud
 * @version 1.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud\Database;

use OpenCloud\Common\Collection;
use OpenCloud\Common\PersistentObject;
use OpenCloud\Common\Lang;
use OpenCloud\Common\Exceptions;
use OpenCloud\Compute\Flavor;

/**
 * Instance represents an instance of DbService, similar to a Server in a
 * Compute service
 *
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */
class Instance extends PersistentObject 
{

    public $id;
    public $name;
    public $status;
    public $links;
    public $hostname;
    public $volume;
    public $created;
    public $updated;
    public $flavor;
    
    protected static $json_name = 'instance';
    protected static $url_resource = 'instances';

    private $_databases;    // used to Create databases simultaneously
    private $_users;        // used to Create users simultaneously

    /**
     * Creates a new instance object
     *
     * This could use the default constructor, but we want to make sure that
     * the volume attribute is an object.
     *
     * @param \OpenCloud\DbService $service the DbService object associated 
     *      with this
     * @param mixed $info the ID or array of info for the object
     */
    public function __construct(Service $service, $info = null) 
    {
        $this->volume = new \stdClass;
        return parent::__construct($service, $info);
    }

    /**
     * Updates a database instance (not permitted)
     *
     * Update() is not supported by database instances; thus, this always
     * throws an exception.
     *
     * @throws InstanceUpdateError always
     */
    public function Update($params = array()) 
    {
        throw new Exceptions\InstanceUpdateError(
            Lang::translate('Updates are not currently supported by Cloud Databases')
        );
    }

    /**
     * Restarts the database instance
     *
     * @api
     * @returns \OpenCloud\HttpResponse
     */
    public function Restart() 
    {
        return $this->Action($this->RestartJson());
    }

    /**
     * Resizes the database instance (sets RAM)
     *
     * @api
     * @param \OpenCloud\Compute\Flavor $flavor a flavor object
     * @returns \OpenCloud\HttpResponse
     */
    public function Resize(Flavor $flavor) 
    {
        return $this->Action($this->ResizeJson($flavor));
    }

    /**
     * Resizes the volume associated with the database instance (disk space)
     *
     * @api
     * @param integer $newvolumesize the size of the new volume, in gigabytes
     * @return \OpenCloud\HttpResponse
     */
    public function ResizeVolume($newvolumesize) 
    {
        return $this->Action($this->ResizeVolumeJson($newvolumesize));
    }

    /**
     * Enables the root user for the instance
     *
     * @api
     * @return User the root user, including name and password
     * @throws InstanceError if HTTP response is not Success
     */
    public function EnableRootUser() 
    {
        $response = $this->Service()->Request($this->Url('root'), 'POST');

        // check response
        if ($response->HttpStatus() > 202) {
            throw new Exceptions\InstanceError(sprintf(
                Lang::translate('Error enabling root user for instance [%s], status [%d] response [%s]'),
                $this->name, 
                $response->HttpStatus(), 
                $response->HttpBody()
            ));
        }

        $obj = json_decode($response->HttpBody());
        
        if ($this->CheckJsonError()) {
            return false;
        }

        if (isset($obj->user)) {
            return new User($this, $obj->user);
        } else {
            return false;
        }
    }

    /**
     * Returns TRUE if the root user is enabled
     *
     * @api
     * @return boolean TRUE if the root user is enabled; FALSE otherwise
     * @throws InstanceError if HTTP status is not Success
     */
    public function IsRootEnabled() 
    {
        $response = $this->Service()->Request($this->Url('root'), 'GET');

        // check response
        if ($response->HttpStatus() > 202) {
            throw new Exceptions\InstanceError(sprintf(
                Lang::translate('Error enabling root user for instance [%s], status [%d] response [%s]'),
                $this->name, 
                $response->HttpStatus(), 
                $response->HttpBody()
            ));
        }

        $obj = json_decode($response->HttpBody());

        if ($this->CheckJsonError()) {
            return false;
        }

        if (isset($obj->rootEnabled) && $obj->rootEnabled) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Returns a new Database object
     *
     * @param string $name the database name
     * @return Database
     */
    public function Database($name = '') 
    {
        return new Database($this, $name);
    }

    /**
     * Returns a new User object
     *
     * @param string $name the user name
     * @param array $databases a simple array of database names
     * @return User
     */
    public function User($name = '', $databases = array()) 
    {
        return new User($this, $name, $databases);
    }

    /**
     * Returns a Collection of all databases in the instance
     *
     * @return Collection
     * @throws DatabaseListError if HTTP status is not Success
     */
    public function DatabaseList() 
    {
        $response = $this->Service()->Request($this->Url('databases'));

        // check response status
        if ($response->HttpStatus() > 200) {
            throw new Exceptions\DatabaseListError(sprintf(
                Lang::translate('Error listing databases for instance [%s], status [%d] response [%s]'),
                $this->name, 
                $response->HttpStatus(), 
                $response->HttpBody()
            ));
        }

        // parse the response
        $obj = json_decode($response->HttpBody());

        if (!$this->CheckJsonError()) {
            if (!isset($obj->databases)) {
                return new Collection($this, '\OpenCloud\DbService\Database', array());
            }
            return new Collection($this, '\OpenCloud\DbService\Database', $obj->databases);
        }
        return false;
    }

    /**
     * Returns a Collection of all users in the instance
     *
     * @return Collection
     * @throws UserListError if HTTP status is not Success
     */
    public function UserList() 
    {
        $response = $this->Service()->Request($this->Url('users'));

        // check response status
        if ($response->HttpStatus() > 200) {
            throw new Exceptions\UserListError(sprintf(
                Lang::translate('Error listing users for instance [%s], status [%d] response [%s]'),
                $this->name, 
                $response->HttpStatus(), 
                $response->HttpBody()
            ));
        }

        // parse the response
        $obj = json_decode($response->HttpBody());
        if (!$this->CheckJsonError()) {
            if (!isset($obj->users)) {
                return new Collection($this, '\OpenCloud\DbService\User', array());
            }
            return new Collection($this, '\OpenCloud\DbService\User', $obj->users);
        }
        return false;
    }

    /**
     * Generates the JSON string for Create()
     *
     * @return \stdClass
     */
    protected function CreateJson() 
    {
        $object = new \stdClass();
        $object->instance = new \stdClass();

        if (!isset($this->flavor)) {
            throw new Exceptions\InstanceFlavorError(Lang::translate('a flavor must be specified'));
        }

        if (!is_object($this->flavor)) {
            throw new Exceptions\InstanceFlavorError(Lang::translate('the [flavor] attribute must be a Flavor object'));
        }

        $object->instance->flavorRef = $this->flavor->links[0]->href;

        // name
        if (!isset($this->name)) {
            throw new Exceptions\InstanceError(Lang::translate('Instance name is required'));
        }

        $object->instance->name = $this->name;

        // volume
        $object->instance->volume = $this->volume;

        return $object;
    }

    /**
     * Generates the JSON object for Restart
     */
    private function RestartJson() 
    {
        $object = new \stdClass();
        $object->restart = new \stdClass();
        return $object;
    }

    /**
     * Generates the JSON object for Resize
     */
    private function ResizeJson($flavorRef) 
    {
        $object = new \stdClass();
        $object->resize = new \stdClass();
        $object->resize->flavorRef = $flavorRef;
        return $object;
    }

    /**
     * Generates the JSON object for ResizeVolume
     */
    private function ResizeVolumeJson($size) 
    {
        $object = new \stdClass();
        $object->resize = new \stdClass();
        $object->resize->volume = new \stdClass();
        $object->resize->volume->size = $size;
        return $object;
    }

}
