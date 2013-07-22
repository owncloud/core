<?php
/**
 * A database in the Cloud Databases service
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
 * This class represents a Database in the Rackspace "Red Dwarf"
 * database-as-a-service product.
 *
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */
class Database extends Base
{

    public $name;
    private $_instance;

    /**
     * Creates a new database object
     *
     * Unlike other objects (Servers, DataObjects, etc.), passing a database
     * name to the constructor does *not* pull information from the database.
     * For example, if you pass an ID to the `Server()` constructor, it will
     * attempt to retrieve the information on that server from the service,
     * and will return an error if it is not found. However, the Cloud
     * Databases service does not permit retrieval of information on
     * individual databases (only via Collection), and thus passing in a
     * name via the `$info` parameter only creates an in-memory object that
     * is not necessarily tied to an actual database.
     *
     * @param Instance $instance the parent DbService\Instance of the database
     * @param mixed $info if an array or object, treated as properties to set;
     *      if a string, treated as the database name
     * @return void
     * @throws DatabaseNameError if `$info` is not a string, object, or array
     */
    public function __construct(Instance $instance, $info = null)
    {
        $this->_instance = $instance;

        if (is_object($info) || is_array($info)) {
            foreach ($info as $property => $value) {
                $this->$property = $value;
            }
        } elseif (is_string($info)) {
            $this->name = $info;
        } elseif ($info !== null) {
            throw new Exceptions\DatabaseNameError(
                Lang::translate('Database parameter must be an object, array, or string')
            );
        }
    }

    /**
     * Returns the Url of the Database
     *
     * @api
     * @param string $subresource Not used
     * @return string
     */
    public function Url($subresource = '')
    {
        if (!isset($this->name)) {
            throw new Exceptions\DatabaseNameError(
                Lang::translate('The database does not have a Url yet')
            );
        }
        return stripslashes($this->Instance()->Url('databases')) . '/' .
        		$this->name;
    }

    /**
     * Returns the Instance of the database
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
     * Creates a new database
     *
     * @api
     * @param array $params array of attributes to set prior to Create
     * @return \OpenCloud\HttpResponse
     */
    public function Create($params = array())
    {
        // target the /databases subresource
        $url = $this->Instance()->Url('databases');

        if (isset($params['name'])) {
        	$this->name = $params['name'];
        }

        $json = json_encode($this->CreateJson($params));

        if ($this->CheckJsonError()) {
        	return false;
        }

        // POST it off
        $response = $this->Service()->Request($url, 'POST', array(), $json);

        // check the response code
        if ($response->HttpStatus() != 202) {
        	throw new Exceptions\DatabaseCreateError(sprintf(
                Lang::translate('Error creating database [%s], status [%d] response [%s]'),
        		$this->name,
                $response->HttpStatus(),
                $response->HttpBody()
            ));
        }

        // refresh and return
        return $response;
    }

    /**
     * Updates an existing database
     *
     * @param array $params ignored
     * @throws DatabaseUpdateError always; updates are not permitted
     * @return void
     */
    public function Update($params = array())
    {
    	throw new Exceptions\DatabaseUpdateError(
            Lang::translate('Updates are not currently permitted on Database objects')
        );
    }

    /**
     * Deletes a database
     *
     * @api
     * @return \OpenCloud\HttpResponseb
     */
    public function Delete()
    {
    	$resp = $this->Service()->Request($this->Url(), 'DELETE');
    	if ($resp->HttpStatus() != 202) {
    		throw new Exceptions\DatabaseDeleteError(sprintf(
                Lang::translate('Error deleting database [%s], status [%d] response [%s]'),
    			$this->name,
    			$resp->HttpStatus(),
    			$resp->HttpBody()
            ));
        }
    	return $resp;
    }

    /**
     * Returns the JSON object for creating the database
     */
    private function CreateJson($params = array())
    {
        $obj = new \stdClass();
        $obj->databases = array();
	    $obj->databases[0] = new \stdClass();

        // set the name
	    if (!isset($this->name)) {
	        throw new Exceptions\DatabaseNameError(
	            Lang::translate('Database name is required')
            );
        }

	    $obj->databases[0]->name = $this->name;

	    foreach($params as $key => $value) {
	    	$obj->databases[0]->$key = $value;
        }

        return $obj;
    }

}
