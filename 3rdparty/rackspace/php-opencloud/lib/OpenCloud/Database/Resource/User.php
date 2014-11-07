<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\Database\Resource;

use OpenCloud\Common\PersistentObject;
use OpenCloud\Common\Exceptions;
use OpenCloud\Common\Lang;

/**
 * This class represents a User in the Rackspace "Red Dwarf"
 * database-as-a-service product.
 */
class User extends PersistentObject
{

    /**
     * @var string $name the user name
     * @var string $password the user's password
     * @var array $databases a list of database names assigned to the user
     */
    public $name;
    public $password;
    public $databases = array();
    
    protected static $json_name = 'user';
    protected static $url_resource = 'users';

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
        $this->setParent($instance);

        if (!empty($db)) {
            $this->databases = $db;
        }
        
        // Lazy...
        if (is_string($info)) {
            $info = array('name' => $info);
        }

        return parent::__construct($instance->getService(), $info);
    }
    
    /**
     * Returns name of this user. Because it's so important (i.e. as an
     * identifier), it will throw an error if not set/empty.
     * 
     * @return type
     * @throws Exceptions\DatabaseNameError
     */
    public function getName()
    {
        if (empty($this->name)) {
            throw new Exceptions\DatabaseNameError(
                Lang::translate('This user does not have a name yet')
            );
        }
        return $this->name;
    }
    
    /**
     * {@inheritDoc}
     */
    public function primaryKeyField()
    {
        return 'name';
    }

	/**
	 * Adds a new database to the list of databases for the user
	 *
	 * @api
	 * @param string $dbname the database name to be added
	 * @return void
	 */
	public function addDatabase($dbname)
    {
		$this->databases[] = $dbname;
	}
    
	/**
	 * {@inheritDoc}
	 */
	public function update($params = array())
    {
		return $this->noUpdate();
	}

	/**
	 * Deletes a database user
	 *
	 * @api
	 * @return \OpenCloud\HttpResponse
	 * @throws UserDeleteError if HTTP response is not Success
	 */
	public function delete()
    {
		return $this->getClient()->delete($this->url())->send();
	}

	/**
	 * {@inheritDoc}
	 */
	protected function createJson()
    {        
        $user = (object) array(
            'name'      => $this->name,
            'password'  => $this->password,
            'databases' => array()
        );
        
		foreach ($this->databases as $dbName) {
			$user->databases[] = (object) array('name' => $dbName);
		}

		return (object) array(
            'users' => array($user)
        );
	}
}
