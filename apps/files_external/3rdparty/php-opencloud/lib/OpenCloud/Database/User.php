<?php
/**
 * A Database user
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @package phpOpenCloud
 * @version 1.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud\Database;

use OpenCloud\Common\Base;
use OpenCloud\Common\Exceptions;
use OpenCloud\Common\Lang;

/**
 * This class represents a User in the Rackspace "Red Dwarf"
 * database-as-a-service product.
 *
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */
class User extends Base
{

    /**
     * @var string $name the user name
     * @var string $password the user's password
     * @var array $databases a list of database names assigned to the user
     */
    public $name;
    public $password;
    public $databases = array();

    private $_instance;

    /**
     * Creates a new database object
     *
     * Unlike other objects (Servers, DataObjects, etc.), passing a database
     * name to the constructor does *not* pull information from the database.
     * For example, if you pass an ID to the `Server()` constructor, it will
     * attempt to retrieve the information on that server from the service,
     * and will return an error if it is not found. However, the Cloud
     * Users service does not permit retrieval of information on
     * individual databases (only via Collection), and thus passing in a
     * name via the `$info` parameter only creates an in-memory object that
     * is not necessarily tied to an actual database.
     *
     * @param Instance $instance the parent DbService\Instance of the database
     * @param mixed $info if an array or object, treated as properties to set;
     *      if a string, treated as the database name
     * @param array $db a list of database names to associate with the User
     * @return void
     * @throws UserNameError if `$info` is not a string, object, or array
     */
    public function __construct(Instance $instance, $info = null, $db = array())
    {
        $this->_instance = $instance;

        if (!empty($db)) {
            $this->databases = $db;
        }

        if (is_object($info) || is_array($info)) {
            foreach($info as $property => $value) {
                $this->$property = $value;
            }
        } elseif (is_string($info)) {
            $this->name = $info;
        } elseif (isset($info)) {
            throw new Exceptions\UserNameError(
                Lang::translate('User parameter must be an object, array, or string')
            );
        }
    }

    /**
     * Returns the Url of the User
     *
     * @param string $subresource Not used
     * @return string
     * @throws UserNameError if the user name is not set
     */
    public function Url($subresource = '')
    {
        if (!isset($this->name)) {
            throw new Exceptions\UserNameError(
                Lang::translate('The user does not have a Url yet')
            );
        }
        return stripslashes($this->Instance()->Url('users')) . '/' .
        			$this->name;
    }

    /**
     * Returns the Instance of the User
     *
     * @return Instance
     */
    public function Instance()
    {
        return $this->_instance;
    }

    /**
     * Returns the related service
     *
     * @return \OpenCloud\DbService
     */
    public function Service()
    {
    	return $this->Instance()->Service();
    }

	/**
	 * Adds a new database to the list of databases for the user
	 *
	 * @api
	 * @param string $dbname the database name to be added
	 * @return void
	 */
	public function AddDatabase($dbname)
    {
		$this->databases[] = $dbname;
	}

	/**
	 * Creates a new database user
	 *
	 * @api
	 * @param array $params an associative array of parameters
	 * @return \OpenCloud\HttpResponse
	 * @throws UserNameError if the user's name is not defined
	 * @throws UserCreateError if the HTTP status is not Success
	 */
	public function Create($params = array())
    {
		foreach($params as $name => $value) {
			$this->$name = $value;
        }

		if (!isset($this->name)) {
			throw new Exceptions\UserNameError(
                Lang::translate('Cannot create a database user without a name')
            );
        }

		$json = json_encode($this->CreateJson());

		$this->debug('Create() JSON[%s]', $json);

		if ($this->CheckJsonError()) {
			return false;
        }

		$url = $this->Instance()->Url('users');

		// send the request
		$response = $this->Service()->Request($url, 'POST', array(), $json);

		$this->debug('Create() response [%d] - [%s]', $response->HttpStatus(), $response->HttpBody());

		// check the response
		if ($response->HttpStatus() > 202) {
			throw new Exceptions\UserCreateError(sprintf(
                Lang::translate('Error creating user [%s], status [%d] response [%s]'),
			    $this->name,
                $response->HttpStatus(),
                $response->HttpBody()
            ));
        }

		return $response;
	}

	/**
	 * Updates a database user (not currently permitted)
	 *
	 * @param array $params not currently used, but provided for future updates
	 * @throws UserUpdateError always; updates are not currently permitted by
	 *		this service.
	 */
	public function Update($params = array())
    {
		throw new Exceptions\UserUpdateError(
		    Lang::translate('You cannot update a database user at this time')
        );
	}

	/**
	 * Deletes a database user
	 *
	 * @api
	 * @return \OpenCloud\HttpResponse
	 * @throws UserDeleteError if HTTP response is not Success
	 */
	public function Delete()
    {
		$response = $this->Service()->Request($this->Url(), 'DELETE');

		// check status code
		if ($response->HttpStatus() > 202) {
			throw new Exceptions\UserDeleteError(sprintf(
                Lang::translate('Error deleting user [%s], status [%d] response [%s]',
				$this->name,
                $response->HttpStatus(),
                $response->HttpBody())
            ));
        }

		return $response;
	}

	/**
	 * Creates the JSON object for the Create method
	 */
	private function CreateJson()
    {
		$object = new \stdClass();
		$object->users = array();
		$object->users[0] = new \stdClass();
		$object->users[0]->name = $this->name;
		$object->users[0]->password = $this->password;
		$object->users[0]->databases = array();

		foreach($this->databases as $dbName) {
			$database = new \stdClass();
			$database->name = $dbName;
			$object->users[0]->databases[] = $database;
		}

		return $object;
	}
}
