<?php
/**
 * An abstraction that defines persistent objects associated with a service
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @package phpOpenCloud
 * @version 1.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud\Common;

/**
 * represents an object that has the ability to be
 * retrieved, created, updated, and deleted.
 *
 * This class abstracts much of the common functionality between Nova
 * servers, Swift containers and objects, DBAAS instances, Cinder volumes,
 * and various other objects that (a) have a URL, (b) can be created, updated,
 * deleted, or retrieved, and (c) use a standard JSON format with a top-level
 * element followed by a child object with attributes.
 *
 * In general, you can create a persistent object class by subclassing this
 * class and defining some protected, static variables:
 *
 * - $url_resource - the sub-resource value in the URL of the parent. For
 *   example, if the parent URL is `http://something/parent`, then setting
 *   this value to `'another'` would result in a URL for the persistent
 *   object of `http://something/parent/another`.
 *
 * - $json_name - the top-level JSON object name. For example, if the
 *   persistent object is represented by `{"foo": {"attr":value, ...}}`, then
 *   set `json_name = 'foo'`.
 *
 * - $json_collection_name - optional; this value is the name of a collection
 *   of the persistent objects. If not provided, it defaults to `json_name`
 *   with an appended `'s'` (e.g., if `json_name` is `"foo"`, then
 *   `json_collection_name` would be `"foos"` by default). Set this value if
 *   the collection name doesn't follow this pattern.
 *
 * - $json_collection_element - the common pattern for a collection is:
 *   `{"collection": [{"attr":"value",...}, {"attr":"value",...}, ...]}`
 *   That is, each element of the array is an anonymous object containing the
 *   object's attributes. In (very) rare instances, the objects in the array
 *   are named, and `json_collection_element` contains the name of the
 *   collection objects. For example, in this:
 *   `{"allowedDomain":[{"allowedDomain":{"name":"foo"}}]}`, then
 *   `json_collection_element` would be set to `'allowedDomain'`.
 *
 * The PersistentObject class supports the standard `Create()`, `Update()`,
 * and `Delete()` methods; if these are not needed (i.e., not supported by
 * the service, the subclass should redefine these to call the
 * `NoCreate`, `NoUpdate`, or `NoDelete` methods, which will trigger an
 * appropriate exception. For example, if an object cannot be created:
 *
 *    function Create($parm=array()) { $this->NoCreate(); }
 *
 * This will cause any call to the `Create()` method to fail with an
 * exception.
 *
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */
abstract class PersistentObject extends Base
{

    protected $id;
    private $_parent;

    /**
     * Retrieves the instance from persistent storage
     *
     * @param mixed $parentobj the parent object of the current object
     * @param mixed $info the ID or array/object of data
     * @throws InvalidArgumentError if $info has an invalid data type
     */
    public function __construct($parentObject, $info = null)
    {
        $this->_parent = $parentObject;

        if (property_exists($this, 'metadata')) {
            $this->metadata = new Metadata;
        }

        if (is_string($info) || is_integer($info)) {
            $this->{$this->PrimaryKeyField()} = (string) $info;
            $this->Refresh($info);
        } elseif (is_object($info) || is_array($info)) {
            foreach($info as $key => $value) {
                if ($key == 'metadata') {
                    $this->$key->SetArray($value);
                } else {
                    $this->$key = $value;
                }
            }
        } elseif ($info !== null) {
            throw new Exceptions\InvalidArgumentError(sprintf(Lang::translate('Argument for [%s] must be string or object'), get_class()));
        }
    }

    public function setParent($parent)
    {
        $this->_parent = $parent;
    }

    /**
     * Creates a new object
     *
     * @api
     * @param array $params array of values to set when creating the object
     * @return HttpResponse
     * @throws VolumeCreateError if HTTP status is not Success
     */
    public function Create($params = array())
    {
        // set parameters
        if (!empty($params)) {
            foreach($params as $key => $value) {
                $this->$key = $value;
            }
        }

        // debug
        $this->debug('%s::Create(%s)', get_class($this), $this->Name());

        // construct the JSON
        $object = $this->CreateJson();
        $json = json_encode($object);

        if ($this->CheckJsonError()) {
            return false;
        }

        $this->debug('%s::Create JSON [%s]', get_class($this), $json);

        // send the request
        $response = $this->Service()->Request(
            $this->CreateUrl(),
            'POST',
            array('Content-Type' => 'application/json'),
            $json
        );

        // check the return code
        if ($response->HttpStatus() > 204) {
            throw new Exceptions\CreateError(sprintf(
                Lang::translate('Error creating [%s] [%s], status [%d] response [%s]'),
                get_class($this),
                $this->Name(),
                $response->HttpStatus(),
                $response->HttpBody()
            ));
        }

        if ($response->HttpStatus() == "201" && $location = $response->Header('Location')) {
            // follow Location header
            $this->Refresh(NULL, $location);
        } else {
            // set values from response
            $retobj = json_decode($response->HttpBody());
            if (!$this->CheckJsonError()) {
                $top = $this->JsonName();
                if (isset($retobj->$top)) {
                    foreach($retobj->$top as $key => $value) {
                        $this->$key = $value;
                    }
                }
            }
        }

        return $response;
    }

    /**
     * Updates an existing object
     *
     * @api
     * @param array $params array of values to set when updating the object
     * @return HttpResponse
     * @throws VolumeCreateError if HTTP status is not Success
     */
    public function Update($params = array())
    {
        // set parameters
        foreach($params as $key => $value) {
            $this->$key = $value;
        }

        // debug
        $this->debug('%s::Update(%s)', get_class($this), $this->Name());

        // construct the JSON
        $obj = $this->UpdateJson($params);
        $json = json_encode($obj);

        if ($this->CheckJsonError()) {
            return false;
        }

        $this->debug('%s::Update JSON [%s]', get_class($this), $json);

        // send the request
        $response = $this->Service()->Request(
            $this->Url(),
            'PUT',
            array(),
            $json
        );

        // check the return code
        if ($response->HttpStatus() > 204) {
            throw new Exceptions\UpdateError(sprintf(
                Lang::translate('Error updating [%s] with [%s], status [%d] response [%s]'),
                get_class($this),
                $json,
                $response->HttpStatus(),
                $response->HttpBody()
            ));
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
    public function Delete()
    {
        $this->debug('%s::Delete()', get_class($this));

        // send the request
        $response = $this->Service()->Request($this->Url(), 'DELETE');

        // check the return code
        if ($response->HttpStatus() > 204) {
            throw new Exceptions\DeleteError(sprintf(
                Lang::translate('Error deleting [%s] [%s], status [%d] response [%s]'),
                get_class(),
                $this->Name(),
                $response->HttpStatus(),
                $response->HttpBody()
            ));
        }

        return $response;
    }

    /**
     * Returns the default URL of the object
     *
     * This may have to be overridden in subclasses.
     *
     * @param string $subresource optional sub-resource string
     * @param array $qstr optional k/v pairs for query strings
     * @return string
     * @throws UrlError if URL is not defined
     */
    public function Url($subresource = NULL, $queryString = array())
    {
        // find the primary key attribute name
        $primaryKey = $this->PrimaryKeyField();

        // first, see if we have a [self] link
        $url = $this->FindLink('self');

        /**
         * Next, check to see if we have an ID
         * Note that we use Parent() instead of Service(), since the parent
         * object might not be a service.
         */
        if (!$url && $this->$primaryKey) {
            $url = Lang::noslash($this->Parent()->Url($this->ResourceName())) . '/' . $this->$primaryKey;
        }

        // add the subresource
        if ($url) {
            $url .= $subresource ? "/$subresource" : '';
            if (count($queryString)) {
                $url .= '?' . $this->MakeQueryString($queryString);
            }
            return $url;
        }

        // otherwise, we don't have a URL yet
        throw new Exceptions\UrlError(sprintf(Lang::translate('%s does not have a URL yet'), get_class($this)));
        return false;
    }

    /**
     * Waits for the server/instance status to change
     *
     * This function repeatedly polls the system for a change in server
     * status. Once the status reaches the `$terminal` value (or 'ERROR'),
     * then the function returns.
     *
     * The polling interval is set by the constant RAXSDK_POLL_INTERVAL.
     *
     * The function will automatically terminate after RAXSDK_SERVER_MAXTIMEOUT
     * seconds elapse.
     *
     * @api
     * @param string $terminal the terminal state to wait for
     * @param integer $timeout the max time (in seconds) to wait
     * @param callable $callback a callback function that is invoked with
     *      each repetition of the polling sequence. This can be used, for
     *      example, to update a status display or to permit other operations
     *      to continue
     * @return void
     *
     */
    public function WaitFor(
        $terminal = 'ACTIVE',
        $timeout = RAXSDK_SERVER_MAXTIMEOUT,
        $callback = NULL,
        $sleep = RAXSDK_POLL_INTERVAL
    ) {
        // find the primary key field
        $primaryKey = $this->PrimaryKeyField();

        // save stats
        $startTime = time();
        $startStatus = $this->Status();

        while (true) {
            $this->Refresh($this->$primaryKey);
            if ($callback) {
                call_user_func($callback, $this);
            }
            if ($this->Status() == 'ERROR') {
                return;
            }
            if ($this->Status() == $terminal) {
                return;
            }
            if (time() - $startTime > $timeout) {
                return;
            }
            sleep($sleep);
        }
    }

    /**
     * Returns the Service/parent object associated with this object
     */
    public function Service()
    {
        return $this->_parent;
    }

    /**
     * returns the parent object of this object
     *
     * This is a synonym for Service(), since the object is usually a
     * service.
     */
    public function Parent()
    {
        return $this->Service();
    }

    /**
     * Validates properties that have a namespace: prefix
     *
     * If the property prefix: appears in the list of supported extension
     * namespaces, then the property is applied to the object. Otherwise,
     * an exception is thrown.
     *
     * @param string $name the name of the property
     * @param mixed $value the property's value
     * @return void
     * @throws AttributeError
     */
    public function __set($name, $value)
    {
        $this->SetProperty($name, $value, $this->Service()->namespaces());
    }

    /**
     * Refreshes the object from the origin (useful when the server is
     * changing states)
     *
     * @return void
     * @throws IdRequiredError
     */
    public function Refresh($id = null, $url = null)
    {
        $primaryKey = $this->PrimaryKeyField();

        if (!$url) {
            if ($id === null) {
                $id = $this->$primaryKey;
            }

            if (!$id) {
                throw new Exceptions\IdRequiredError(sprintf(
                    Lang::translate('%s has no ID; cannot be refreshed'),
                    get_class()));
            }

            // retrieve it
            $this->debug(Lang::translate('%s id [%s]'), get_class($this), $id);
            $this->$primaryKey = $id;
            $url = $this->Url();
        }

        // reset status, if available
        if (property_exists($this, 'status')) {
            $this->status = null;
        }

        // perform a GET on the URL
        $response = $this->Service()->Request($url);

        // check status codes
        if ($response->HttpStatus() == 404) {
            throw new Exceptions\InstanceNotFound(
                sprintf(Lang::translate('%s [%s] not found [%s]'),
                get_class($this),
                $this->$primaryKey,
                $url
            ));
        }

        if ($response->HttpStatus() >= 300) {
            throw new Exceptions\UnknownError(
                sprintf(Lang::translate('Unexpected %s error [%d] [%s]'),
                get_class($this),
                $response->HttpStatus(),
                $response->HttpBody()
            ));
        }

        // check for empty response
        if (!$response->HttpBody()) {
            throw new Exceptions\EmptyResponseError(
                sprintf(Lang::translate('%s::Refresh() unexpected empty response, URL [%s]'),
                get_class($this),
                $url
            ));
        }

        // we're ok, reload the response
        if ($json = $response->HttpBody()) {
            $this->debug('Refresh() JSON [%s]', $json);
            $resp = json_decode($json);

            if ($this->CheckJsonError()) {
                throw new Exceptions\ServerJsonError(sprintf(Lang::translate('JSON parse error on %s refresh'), get_class($this)));
            }

            $top = $this->JsonName();

            if ($top === false) {
                foreach($resp as $item => $value) {
                    $this->$item = $value;
                }
            } elseif (isset($resp->$top)) {
                foreach($resp->$top as $item => $value) {
                    $this->$item = $value;
                }
            }
        }
    }

    /**
     * Returns the displayable name of the object
     *
     * Can be overridden by child objects; *must* be overridden by child
     * objects if the object does not have a `name` attribute defined.
     *
     * @api
     * @return string
     * @throws NameError if attribute 'name' is not defined
     */
    public function Name()
    {
        if (property_exists($this, 'name')) {
            return $this->name;
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
    public function Status()
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
    public function Id()
    {
        return $this->id;
    }

    /**
     * checks for `$alias` in extensions and throws an error if not present
     *
     * @throws UnsupportedExtensionError
     */
    public function CheckExtension($alias)
    {
        if (!in_array($alias, $this->Service()->namespaces())) {
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
    public function Region()
    {
        return $this->Service()->Region();
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
     * @throws ServerIdError if server ID is not defined
     * @throws ServerActionError on other errors
     * @returns boolean; TRUE if successful, FALSE otherwise
     */
    protected function Action($object)
    {
        $primaryKey = $this->PrimaryKeyField();

        if (!$this->$primaryKey) {
            throw new Exceptions\IdRequiredError(sprintf(
                Lang::translate('%s is not defined'),
                get_class($this)
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
        $this->debug('JSON [%s]', $json);

        if ($this->CheckJsonError()) {
            return false;
        }

        // debug - save the request
        $this->debug(Lang::translate('%s::Action [%s]'), get_class($this), $json);

        // get the URL for the POST message
        $url = $this->Url('action');

        // POST the message
        $response = $this->Service()->Request($url, 'POST', array(), $json);

        if (!is_object($response)) {
            throw new Exceptions\HttpError(sprintf(
                Lang::translate('Invalid response for %s::Action() request'),
                get_class($this)
            ));
        }

        // check for errors
        if ($response->HttpStatus() >= 300) {
            throw new Exceptions\ServerActionError(sprintf(
                Lang::translate('%s::Action() [%s] failed; response [%s]'),
                get_class($this),
                $url,
                $response->HttpBody()
            ));
        }

        return $response;
    }

    /**
     * Since each server can have multiple links, this returns the desired one
     *
     * @param string $type - 'self' is most common; use 'bookmark' for
     *      the version-independent one
     * @return string the URL from the links block
     */
    protected function FindLink($type = 'self')
    {
        if (!isset($this->links) || !$this->links) {
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
    protected function CreateUrl()
    {
        return $this->Parent()->Url($this->ResourceName());
    }

    /**
     * Returns the primary key field for the object
     *
     * The primary key is usually 'id', but this function is provided so that
     * (in rare cases where it is not 'id'), it can be overridden.
     *
     * @return string
     */
    protected function PrimaryKeyField()
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
     * @throws DocumentError if not overridden
     */
    public static function JsonName()
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
    public static function JsonCollectionName()
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
    public static function JsonCollectionElement()
    {
        if (isset(static::$json_collection_element)) {
            return static::$json_collection_element;
        } else {
            return null;
        }
    }

    /**
     * Returns the resource name for the URL of the object; must be overridden
     * in child classes
     *
     * For example, a server is `/servers/`, a database instance is
     * `/instances/`. Must be overridden in child classes.
     *
     * @throws UrlError
     */
    public static function ResourceName()
    {
        if (isset(static::$url_resource)) {
            return static::$url_resource;
        }

        throw new Exceptions\UrlError(sprintf(
            Lang::translate('No URL resource defined for class [%s] in ResourceName()'),
            get_class()
        ));
    }

    /**
     * Returns an object for the Create() method JSON
     *
     * Must be overridden in a child class.
     *
     * @throws CreateError if not overridden
     */
    protected function CreateJson()
    {
        throw new Exceptions\CreateError(sprintf(
            Lang::translate('[%s] CreateJson() must be overridden'),
            get_class($this)
        ));
    }

    /**
     * Returns an object for the Update() method JSON
     *
     * Must be overridden in a child class.
     *
     * @throws UpdateError if not overridden
     */
    protected function UpdateJson($params = array())
    {
        throw new Exceptions\UpdateError(sprintf(
            Lang::translate('[%s] UpdateJson() must be overridden'),
            get_class($this)
        ));
    }

    /**
     * throws a CreateError for subclasses that don't support Create
     *
     * @throws CreateError
     */
    protected function NoCreate()
    {
        throw new Exceptions\CreateError(sprintf(
            Lang::translate('[%s] does not support Create()'),
            get_class()
        ));
    }

    /**
     * throws a DeleteError for subclasses that don't support Delete
     *
     * @throws DeleteError
     */
    protected function NoDelete()
    {
        throw new Exceptions\DeleteError(sprintf(
            Lang::translate('[%s] does not support Delete()'),
            get_class()
        ));
    }

    /**
     * throws a UpdateError for subclasses that don't support Update
     *
     * @throws UpdateError
     */
    protected function NoUpdate()
    {
        throw new Exceptions\UpdateError(sprintf(
            Lang::translate('[%s] does not support Update()'),
            get_class()
        ));
    }

}
