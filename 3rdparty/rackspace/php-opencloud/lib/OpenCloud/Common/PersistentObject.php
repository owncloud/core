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

use Guzzle\Http\Exception\BadResponseException;
use Guzzle\Http\Message\Response;
use Guzzle\Http\Url;
use OpenCloud\Common\Constants\State as StateConst;
use OpenCloud\Common\Service\ServiceInterface;
use OpenCloud\Common\Exceptions\RuntimeException;
use OpenCloud\Common\Http\Message\Formatter;

/**
 * Represents an object that can be retrieved, created, updated and deleted.
 *
 * This class abstracts much of the common functionality between: 
 *  
 *  * Nova servers;
 *  * Swift containers and objects;
 *  * DBAAS instances;
 *  * Cinder volumes;
 *  * and various other objects that:
 *    * have a URL;
 *    * can be created, updated, deleted, or retrieved;
 *    * use a standard JSON format with a top-level element followed by 
 *      a child object with attributes.
 *
 * In general, you can create a persistent object class by subclassing this
 * class and defining some protected, static variables:
 * 
 *  * $url_resource - the sub-resource value in the URL of the parent. For
 *    example, if the parent URL is `http://something/parent`, then setting this
 *    value to "another" would result in a URL for the persistent object of 
 *    `http://something/parent/another`.
 *
 *  * $json_name - the top-level JSON object name. For example, if the
 *    persistent object is represented by `{"foo": {"attr":value, ...}}`, then
 *    set $json_name to "foo".
 *
 *  * $json_collection_name - optional; this value is the name of a collection
 *    of the persistent objects. If not provided, it defaults to `json_name`
 *    with an appended "s" (e.g., if `json_name` is "foo", then
 *    `json_collection_name` would be "foos"). Set this value if the collection 
 *    name doesn't follow this pattern.
 *
 *  * $json_collection_element - the common pattern for a collection is:
 *    `{"collection": [{"attr":"value",...}, {"attr":"value",...}, ...]}`
 *    That is, each element of the array is a \stdClass object containing the
 *    object's attributes. In rare instances, the objects in the array
 *    are named, and `json_collection_element` contains the name of the
 *    collection objects. For example, in this JSON response:
 *    `{"allowedDomain":[{"allowedDomain":{"name":"foo"}}]}`,
 *    `json_collection_element` would be set to "allowedDomain".
 *
 * The PersistentObject class supports the standard CRUD methods; if these are 
 * not needed (i.e. not supported by  the service), the subclass should redefine 
 * these to call the `noCreate`, `noUpdate`, or `noDelete` methods, which will 
 * trigger an appropriate exception. For example, if an object cannot be created:
 *
 *    function create($params = array()) 
 *    { 
 *       $this->noCreate(); 
 *    }
 */
abstract class PersistentObject extends Base
{
    private $service;
    private $parent;
    protected $metadata;

    /**
     * Retrieves the instance from persistent storage
     *
     * @param mixed $service The service object for this resource
     * @param mixed $info    The ID or array/object of data
     */
    public function __construct($service = null, $info = null)
    {
        if ($service instanceof ServiceInterface) {
            $this->setService($service);
        }
        
        $this->metadata = new Metadata;

        $this->populate($info);
    }
            
    /**
     * Sets the service associated with this resource object.
     * 
     * @param \OpenCloud\Common\Service\ServiceInterface $service
     * @return \OpenCloud\Common\PersistentObject
     */
    public function setService(ServiceInterface $service)
    {
        $this->service = $service;
        return $this;
    }
    
    /**
     * Returns the service object for this resource; required for making
     * requests, etc. because it has direct access to the Connection.
     * 
     * @return \OpenCloud\Common\Service\ServiceInterface
     * @throws \OpenCloud\Common\Exceptions\ServiceException
     */
    public function getService()
    {
        if (null === $this->service) {
            throw new Exceptions\ServiceException(
                'No service defined'
            );
        }
        return $this->service;
    }
    
    /**
     * Set the parent object for this resource.
     * 
     * @param \OpenCloud\Common\PersistentObject $parent
     * @return \OpenCloud\Common\PersistentObject
     */
    public function setParent(PersistentObject $parent)
    {
        $this->parent = $parent;
        return $this;
    }
    
    /**
     * Returns the parent.
     * 
     * @return \OpenCloud\Common\PersistentObject
     */
    public function getParent()
    {
        if (null === $this->parent) {
            $this->parent = $this->getService();
        }
        return $this->parent;
    }
        
    public function getClient()
    {
        return $this->getService()->getClient();
    }
    
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
        
        return $this;
    }
    
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * Creates a new object
     *
     * @param array $params array of values to set when creating the object
     * @return HttpResponse
     * @throws VolumeCreateError if HTTP status is not Success
     */
    public function create($params = array())
    {
        // set parameters
        if (!empty($params)) {
            $this->populate($params, false);
        }

        // construct the JSON
        $json = json_encode($this->createJson());
        $this->checkJsonError();

        $createUrl = $this->createUrl();

        $response = $this->getClient()->post($createUrl, self::getJsonHeader(), $json)->send();

        // We have to try to parse the response body first because it should have precedence over a Location refresh.
        // I'd like to reverse the order, but Nova instances return ephemeral properties on creation which are not
        // available when you follow the Location link...
        if (null !== ($decoded = $this->parseResponse($response))) {
            $this->populate($decoded);
        } elseif ($location = $response->getHeader('Location')) {
            $this->refreshFromLocationUrl($location);
        }

        return $response;
    }

    public function refreshFromLocationUrl($url)
    {
        $fullUrl = Url::factory($url);

        $response = $this->getClient()->get($fullUrl)->send();

        if (null !== ($decoded = $this->parseResponse($response))) {
            $this->populate($decoded);
        }
    }

    /**
     * Updates an existing object
     *
     * @api
     * @param array $params array of values to set when updating the object
     * @return HttpResponse
     * @throws VolumeCreateError if HTTP status is not Success
     */
    public function update($params = array())
    {
        // set parameters
        if (!empty($params)) {
            $this->populate($params);
        }

        // debug
        $this->getLogger()->info('{class}::Update({name})', array(
            'class' => get_class($this),
            'name'  => $this->getProperty($this->primaryKeyField())
        ));

        // construct the JSON
        $json = json_encode($this->updateJson($params));
        $this->checkJsonError();

        // send the request
        return $this->getClient()->put($this->getUrl(), self::getJsonHeader(), $json)->send();
    }

    /**
     * Refreshes the object from the origin (useful when the server is
     * changing states)
     *
     * @param string|null $id
     * @param string|null $url
     *
     * @return void
     * @throws Exceptions\IdRequiredError
     */
    public function refresh($id = null, $url = null)
    {
        $primaryKey = $this->primaryKeyField();
        $primaryKeyVal = $this->getProperty($primaryKey);
        
        if (!$url) {
            
            if (!$id = $id ?: $primaryKeyVal) {
                throw new Exceptions\IdRequiredError(sprintf(
                    Lang::translate("%s has no %s; cannot be refreshed"),
                    get_class($this),
                    $primaryKey
                ));
            }
            
            if ($primaryKeyVal != $id) {
                $this->setProperty($primaryKey, $id);
            }
            
            $url = $this->getUrl();
        }
        
        // reset status, if available
        if ($this->getProperty('status')) {
            $this->setProperty('status', null);
        }

        $response = $this->getClient()->get($url)->send();
  
        if (null !== ($decoded = $this->parseResponse($response))) {
            $this->populate($decoded);
        }
        
        return $response;
    }
    
    /**
     * Deletes an object
     *
     * @api
     * @return HttpResponse
     * @throws DeleteError if HTTP status is not Success
     */
    public function delete()
    {
        $this->getLogger()->info('{class}::Delete()', array('class' => get_class($this)));

        // send the request
        return $this->getClient()->delete($this->getUrl())->send();
    }

    /**
     * @deprecated
     */
    public function url($path = null, array $query = array())
    {
        return $this->getUrl($path, $query);
    }

    /**
     * Returns the default URL of the object
     *
     * This may have to be overridden in subclasses.
     *
     * @param string $subresource optional sub-resource string
     * @param array $qstr optional k/v pairs for query strings
     * @return string
     */
    public function getUrl($path = null, array $query = array())
    {
        if (!$url = $this->findLink('self')) {

            // ...otherwise construct a URL from parent and this resource's
            // "URL name". If no name is set, resourceName() throws an error.
            $url = $this->getParent()->getUrl($this->resourceName());

            // Does it have a primary key?
            if (null !== ($primaryKey = $this->getProperty($this->primaryKeyField()))) {
                $url->addPath((string) $primaryKey);
            }
        }

        if (!$url instanceof Url) {
            $url = Url::factory($url);
        }

        return $url->addPath((string) $path)->setQuery($query);
    }

    /**
     * Waits for the server/instance status to change
     *
     * This function repeatedly polls the system for a change in server
     * status. Once the status reaches the `$terminal` value (or 'ERROR'),
     * then the function returns.
     *
     * @api
     * @param string $terminal the terminal state to wait for
     * @param integer $timeout the max time (in seconds) to wait
     * @param callable $callback a callback function that is invoked with
     *      each repetition of the polling sequence. This can be used, for
     *      example, to update a status display or to permit other operations
     *      to continue
     * @return void
     * @codeCoverageIgnore
     */
    public function waitFor($state = null, $timeout = null, $callback = null, $interval = null)
    {
        $state    = $state ?: StateConst::ACTIVE;
        $timeout  = $timeout ?: StateConst::DEFAULT_TIMEOUT;
        $interval = $interval ?: StateConst::DEFAULT_INTERVAL;

        // save stats
        $startTime = time();
        
        $states = array('ERROR', $state);
        
        while (true) {
            
            $this->refresh($this->getProperty($this->primaryKeyField()));
            
            if ($callback) {
                call_user_func($callback, $this);
            }
            
            if (in_array($this->status(), $states) || (time() - $startTime) > $timeout) {
                return;
            }
            
            sleep($interval);
        }
    }
    
    /**
     * Sends the json string to the /action resource
     *
     * This is used for many purposes, such as rebooting the server,
     * setting the root password, creating images, etc.
     * Since it can only be used on a live server, it checks for a valid ID.
     *
     * @param $object - this will be encoded as json, and we handle all the JSON
     *     error-checking in one place
     * @throws Exceptions\IdRequiredError if server ID is not defined
     * @throws Exceptions\ServerActionError on other errors
     * @returns boolean; TRUE if successful, FALSE otherwise
     */
    protected function action($object)
    {
        if (!$this->getProperty($this->primaryKeyField())) {
            throw new Exceptions\IdRequiredError(sprintf(
                Lang::translate('%s is not defined'),
                get_class($this),
                $this->primaryKeyField()
            ));
        }

        if (!is_object($object)) {
            throw new Exceptions\ServerActionError(sprintf(
                Lang::translate('%s::Action() requires an object as its parameter'),
                get_class($this)
            ));
        }

        // convert the object to json
        $json = json_encode($object);
        $this->checkJsonError();

        // debug - save the request
        $this->getLogger()->info(Lang::translate('{class}::action [{json}]'), array(
            'class' => get_class($this), 
            'json'  => $json
        ));

        // get the URL for the POST message
        $url = $this->url('action');

        // POST the message
        return $this->getClient()->post($url, self::getJsonHeader(), $json)->send();
    }

     /**
     * Returns an object for the Create() method JSON
     * Must be overridden in a child class.
     *
     * @throws CreateError if not overridden
     */
    protected function createJson()
    {
        if (!isset($this->createKeys)) {
            throw new RuntimeException(sprintf(
                'This resource object [%s] must have a visible createKeys array',
                get_class($this)
            ));
        }
        
        $element = (object) array();

        foreach ($this->createKeys as $key) {
            if (null !== ($property = $this->getProperty($key))) {
                $element->$key = $property;
            }
        }

        if (isset($this->metadata) && count($this->metadata)) {
            $element->metadata = (object) $this->metadata->toArray();
        }

        return (object) array($this->jsonName() => (object) $element);
    }

    /**
     * Returns an object for the Update() method JSON
     * Must be overridden in a child class.
     *
     * @throws Exceptions\UpdateError if not overridden
     */
    protected function updateJson($params = array())
    {
        throw new Exceptions\UpdateError(sprintf(
            Lang::translate('[%s] UpdateJson() must be overridden'),
            get_class($this)
        ));
    }

    /**
     * throws a CreateError for subclasses that don't support Create
     *
     * @throws Exceptions\CreateError
     */
    protected function noCreate()
    {
        throw new Exceptions\CreateError(sprintf(
            Lang::translate('[%s] does not support Create()'),
            get_class($this)
        ));
    }

    /**
     * throws a DeleteError for subclasses that don't support Delete
     *
     * @throws Exceptions\DeleteError
     */
    protected function noDelete()
    {
        throw new Exceptions\DeleteError(sprintf(
            Lang::translate('[%s] does not support Delete()'),
            get_class($this)
        ));
    }

    /**
     * throws a UpdateError for subclasses that don't support Update
     *
     * @throws Exceptions\UpdateError
     */
    protected function noUpdate()
    {
        throw new Exceptions\UpdateError(sprintf(
            Lang::translate('[%s] does not support Update()'),
            get_class($this)
        ));
    }
        
    /**
     * Returns the displayable name of the object
     *
     * Can be overridden by child objects; *must* be overridden by child
     * objects if the object does not have a `name` attribute defined.
     *
     * @api
     * @return string
     * @throws Exceptions\NameError if attribute 'name' is not defined
     */
    public function name()
    {
        if (null !== ($name = $this->getProperty('name'))) {
            return $name;
        } else {
            throw new Exceptions\NameError(sprintf(
                Lang::translate('Name attribute does not exist for [%s]'),
                get_class($this)
            ));
        }
    }

    /**
     * returns the object's status or `N/A` if not available
     *
     * @api
     * @return string
     */
    public function status()
    {
        return (isset($this->status)) ? $this->status : 'N/A';
    }

    /**
     * returns the object's identifier
     *
     * Can be overridden by a child class if the identifier is not in the
     * `$id` property. Use of this function permits the `$id` attribute to
     * be protected or private to prevent unauthorized overwriting for
     * security.
     *
     * @api
     * @return string
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * checks for `$alias` in extensions and throws an error if not present
     *
     * @throws Exceptions\UnsupportedExtensionError
     */
    public function checkExtension($alias)
    {
        if (!in_array($alias, $this->getService()->namespaces())) {
            throw new Exceptions\UnsupportedExtensionError(sprintf(
                Lang::translate('Extension [%s] is not installed'),
                $alias
            ));
        }
        
        return true;
    }

    /**
     * returns the region associated with the object
     *
     * navigates to the parent service to determine the region.
     *
     * @api
     */
    public function region()
    {
        return $this->getService()->Region();
    }
    
    /**
     * Since each server can have multiple links, this returns the desired one
     *
     * @param string $type - 'self' is most common; use 'bookmark' for
     *      the version-independent one
     * @return string the URL from the links block
     */
    public function findLink($type = 'self')
    {
        if (empty($this->links)) {
            return false;
        }

        foreach ($this->links as $link) {
            if ($link->rel == $type) {
                return $link->href;
            }
        }

        return false;
    }

    /**
     * returns the URL used for Create
     *
     * @return string
     */
    public function createUrl()
    {
        return $this->getParent()->getUrl($this->resourceName());
    }

    /**
     * Returns the primary key field for the object
     *
     * The primary key is usually 'id', but this function is provided so that
     * (in rare cases where it is not 'id'), it can be overridden.
     *
     * @return string
     */
    protected function primaryKeyField()
    {
        return 'id';
    }

    /**
     * Returns the top-level document identifier for the returned response
     * JSON document; must be overridden in child classes
     *
     * For example, a server document is (JSON) `{"server": ...}` and an
     * Instance document is `{"instance": ...}` - this function must return
     * the top level document name (either "server" or "instance", in
     * these examples).
     *
     * @throws Exceptions\DocumentError if not overridden
     */
    public static function jsonName()
    {
        if (isset(static::$json_name)) {
            return static::$json_name;
        }

        throw new Exceptions\DocumentError(sprintf(
            Lang::translate('No JSON object defined for class [%s] in JsonName()'),
            get_class()
        ));
    }

    /**
     * returns the collection JSON element name
     *
     * When an object is returned in a collection, it usually has a top-level
     * object that is an array holding child objects of the object types.
     * This static function returns the name of the top-level element. Usually,
     * that top-level element is simply the JSON name of the resource.'s';
     * however, it can be overridden by specifying the $json_collection_name
     * attribute.
     *
     * @return string
     */
    public static function jsonCollectionName()
    {
        if (isset(static::$json_collection_name)) {
            return static::$json_collection_name;
        } else {
            return static::$json_name . 's';
        }
    }

    /**
     * returns the JSON name for each element in a collection
     *
     * Usually, elements in a collection are anonymous; this function, however,
     * provides for an element level name:
     *
     *  `{ "collection" : [ { "element" : ... } ] }`
     *
     * @return string
     */
    public static function jsonCollectionElement()
    {
        if (isset(static::$json_collection_element)) {
            return static::$json_collection_element;
        }
    }

    /**
     * Returns the resource name for the URL of the object; must be overridden
     * in child classes
     *
     * For example, a server is `/servers/`, a database instance is
     * `/instances/`. Must be overridden in child classes.
     *
     * @throws Exceptions\UrlError
     */
    public static function resourceName()
    {
        if (isset(static::$url_resource)) {
            return static::$url_resource;
        }

        throw new Exceptions\UrlError(sprintf(
            Lang::translate('No URL resource defined for class [%s] in ResourceName()'),
            get_class()
        ));
    }
    
    public function parseResponse(Response $response)
    {
        $body = Formatter::decode($response);
        
        $top = $this->jsonName();
            
        if ($top && isset($body->$top)) {
            $content = $body->$top;
        } else {
            $content = $body;
        }
        
        return $content;
    }

}
