<?php

namespace OpenCloud\CloudMonitoring\Resource;

use OpenCloud\Common\Exceptions;
use OpenCloud\Common\Lang;
use OpenCloud\Common\PersistentObject;
use OpenCloud\CloudMonitoring\Service;
use OpenCloud\CloudMonitoring\Exception;

/**
 * Abstract AbstractResource class.
 * 
 * @abstract
 * @extends PersistentObject
 * @package phpOpenCloud
 * @version 1.0
 * @author  Jamie Hannaford <jamie@limetree.org>
 */
abstract class AbstractResource extends PersistentObject
{
    /**
     * Service object
     * 
     * @var mixed
     * @access public
     */
    public $service;
    
	/**
	 * Parent object
	 * 
	 * @var mixed
	 * @access public
	 */
	public $parent;
	
	/**
	 * Unique identifier
	 * 
	 * @var mixed
	 * @access public
	 */
	public $id;
	
	/**
	 * Name
	 * 
	 * @var mixed
	 * @access public
	 */
	public $name;
    
    /**
     * __construct function.
     * 
     * @access public
     * @param mixed $service
     * @param mixed $info
     * @return void
     */
    public function __construct($service, $info)
    {
        $this->setService($service);
        parent::__construct($service, $info);
        $this->populate($info);
    }
    
    /**
     * Populate object from array/stdClass object.
     * 
     * @access public
     * @param mixed $properties
     * @return void
     */
    public function populate($properties)
    {
        if (is_array($properties) || is_object($properties)) {
            foreach ($properties as $key => $value) {
                if (isset($this->$key)) {
                    $this->$key = $value;
                }
            }
        }
    }
    
    /**
     * Retrieve property from array/object.
     * 
     * @access public
     * @param mixed $haystack
     * @param mixed $needle
     * @return void
     */
    public function getProperty($haystack, $needle)
    {
        if (is_object($haystack) && isset($haystack->$needle)) {
           return $haystack->$needle; 
        }
        
        if (is_array($haystack) && isset($haystack[$needle])) {
            return $haystack[$needle];
        }
        
        return false;
    }
    
    /**
     * Set parent object.
     * 
     * @access public
     * @param mixed $parent
     * @return void
     */
    public function setParent($parent)
    {
    	$this->parent = $parent;
    }
    
    /**
     * Url function.
     * 
     * @access public
     * @param string $subresource (default: '')
     * @return void
     */
    public function Url($subresource = '', $query=array())
    {
        $url = $this->baseUrl();
        
        if ($subresource) {
            $url .= "/$subresource";
        } 
        
        return $url.$this->MakeQueryString($query);
    }
    
    /**
     * Retrieve parent object.
     * 
     * @access public
     * @return void
     */
    public function Parent()
    {
        if (null === $this->parent) {
            $this->parent = $this->Service();
        }
        return $this->parent;
    }
    
    /**
     * Set main service object.
     * 
     * @access public
     * @param mixed $service
     * @return void
     */
    public function setService($service)
    {
        $this->service = $service;
    }
    
    public function Service()
    {
        if (null === $this->service) {
            throw new Exception\CloudMonitoringException(
                'No service defined'
            );
        }
        return $this->service;
    }

    /**
     * Get a resource from external service based on ID.
     * 
     * @access public
     * @param mixed $id (default: null)
     * @return void
     */
    public function get($id = null)
    {
        $primaryKey = $this->PrimaryKeyField();

        // perform a GET on the URL
        $response = $this->Service()->Request($this->Url($id));

        // check status codes
        if ($response->HttpStatus() == 404) {
            throw new Exception\CloudMonitoringException(sprintf(
                '%s [%s] not found [%s]',
                get_class($this), 
                $this->$primaryKey, 
                $this->Url()
            ));
        }

        if ($response->HttpStatus() >= 300) {
            throw new Exception\CloudMonitoringException(
                sprintf(Lang::translate('Unexpected %s error [%d] [%s]'),
                get_class($this),
                $response->HttpStatus(),
                $response->HttpBody()
            ));
        }

        // check for empty response
        if (!$response->HttpBody()) {
            throw new Exception\CloudMonitoringException(
                sprintf(Lang::translate('%s::Refresh() unexpected empty response, URL [%s]'),
                get_class($this),
                $this->Url()
            ));
        }

        if ($json = $response->HttpBody()) {
            
            $response = json_decode($json);
            
            foreach ($response as $item => $value) {
                $this->$item = $value;
            }
            
        }
    }
    
    /**
     * Procedure for JSON create object.
     * 
     * @access protected
     * @return void
     */
    protected function CreateJson() 
    {
    	$object = new \stdClass;

        foreach (static::$emptyObject as $key) {
            if (isset($this->$key)) {
                $object->$key = $this->$key;
            }
        }

        foreach (static::$requiredKeys as $requiredKey) {
            if (!isset($object->$requiredKey)) {
                throw new Exceptions\CreateError(sprintf(
                    "%s is required to create a new %s",
                    $requiredKey,
                    get_class()
                ));
            }
        }

    	return $object;
    }

    /**
     * Procedure for JSON update object.
     * 
     * @access protected
     * @return void
     */
    protected function UpdateJson($params = array()) 
    {
        foreach (static::$requiredKeys as $requiredKey) {
            if (!isset($this->$requiredKey)) {
                throw new Exceptions\UpdateError(sprintf(
                    "%s is required to create a new %s",
                    $requiredKey,
                    get_class()
                ));
            }
        }

        return $this;
    } 
    
    /**
     * Retrieves a collection of resource objects.
     * 
     * @access public
     * @return void
     */
    public function listAll()
    {
        return $this->Service()->Collection(get_class($this), $this->Url());
    } 
    
    public function updateUrl()
    {
        return $this->Url($this->id);
    }

    /**
     * Update object.
     * 
     * @access public
     * @param array $params (default: array())
     * @return void
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
            $this->updateUrl(), 
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
     * Delete object.
     * 
     * @access public
     * @return void
     */
    public function Delete() 
    {
        $this->debug('%s::Delete()', get_class($this));

        // send the request
        $response = $this->Service()->Request($this->Url($this->id), 'DELETE');

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
     * Request function.
     * 
     * @access protected
     * @param mixed $url
     * @param string $method (default: 'GET')
     * @param array $headers (default: array())
     * @param mixed $body (default: null)
     * @return void
     */
    protected function Request($url, $method = 'GET', array $headers = array(), $body = null)
    {
        $response = $this->Service()->Request($url, $method, $headers, $body);
        
        if ($body = $response->HttpBody()) {
            return json_decode($body);
        } 
        
        return false;
    }

    /**
     * Test the validity of certain parameters for the resource.
     * 
     * @access public
     * @param array $params (default: array())
     * @param bool $debug (default: false)
     * @return void
     */
    public function test($params = array(), $debug = false)
    {
        if (!empty($params)) {
            foreach($params as $key => $value) {
                $this->$key = $value;
            }
        }

        $obj = $this->CreateJson();
        $json = json_encode($obj);

        if ($this->CheckJsonError()) {
            return false;
        }

        // send the request
        $response = $this->Service()->Request(
            $this->testUrl($debug), 
            'POST', 
            array(), 
            $json
        );

        // check the return code
        if ($response->HttpStatus() > 204) {
            throw new Exceptions\TestException(sprintf(
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
     * Test the validity of an existing resource.
     * 
     * @access public
     * @param bool $debug (default: false)
     * @return void
     */
    public function testExisting($debug = false)
    {
        $obj = $this->UpdateJson();
        $json = json_encode($obj);

        if ($this->CheckJsonError()) {
            return false;
        }

        $url = $this->Url($this->id . '/test' . ($debug ? '?debug=true' : ''));

        // send the request
        $response = $this->Service()->Request(
            $url, 
            'POST', 
            array(), 
            $json
        );

        // check the return code
        if ($response->HttpStatus() > 204) {
            throw new Exception\TestException(sprintf(
                'Error testing [%s] with [%s], status [%d] response [%s]',
                get_class($this),
                $json,
                $response->HttpStatus(),
                $response->HttpBody()
            ));
        }

        return $response;
    }

}