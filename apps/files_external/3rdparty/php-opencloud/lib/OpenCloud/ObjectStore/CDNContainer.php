<?php
/**
 * Containers for OpenStack Object Storage (Swift) and Rackspace Cloud Files
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @package phpOpenCloud
 * @version 1.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud\ObjectStore;

use OpenCloud\Common\ObjectStore;
use OpenCloud\Common\Service as AbstractService;
use OpenCloud\Common\Lang;
use OpenCloud\Common\Exceptions;

/**
 * A simple container for the CDN Service
 *
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */
class CDNContainer extends ObjectStore
{

    public $name;
    public $count = 0;
    public $bytes = 0;

    private $service;
    private $container_url;
    private $_cdn;

    /**
     * Creates the container object
     *
     * Creates a new container object or, if the $cdata object is a string,
     * retrieves the named container from the object store. If $cdata is an
     * array or an object, then its values are used to set this object.
     *
     * @param OpenCloud\ObjectStore $service - the ObjectStore service
     * @param mixed $cdata - if supplied, the name of the object
     */
    public function __construct(AbstractService $service, $cdata = NULL)
    {
        $this->debug(Lang::translate('Initializing Container...'));

        parent::__construct();

        $this->service = $service;

        // set values from an object (via containerlist)
        if (is_object($cdata)) {
            foreach ($cdata as $name => $value) {
                if ($name == 'metadata') {
                    $this->metadata->SetArray($value);
                } else {
                    $this->$name = $value;
                }
            }
            //$this->Refresh();
        } elseif ($cdata) {
            // or, if it's a string, retrieve the object with that name
            $this->debug(Lang::translate('Getting container [%s]'), $cdata);
            $this->name = $cdata;
            $this->Refresh();
        }
    }

    /**
     * Returns the URL of the container
     *
     * @return string
	 * @param string $subresource not used; required for compatibility
     * @throws NoNameError
     */
    public function Url($subresource='')
    {
        if (!$this->name) {
            throw new Exceptions\NoNameError(Lang::translate('Container does not have an identifier'));
        }
        return Lang::noslash($this->Service()->Url(rawurlencode($this->name)));
    }

    /**
     * Creates a new container with the specified attributes
     *
     * @param array $params array of parameters
     * @return boolean TRUE on success; FALSE on failure
     * @throws ContainerCreateError
     */
    public function Create($params = array())
    {
        foreach ($params as $name => $value) {
            switch($name) {
                case 'name':
                    if ($this->is_valid_name($value)) {
                        $this->name = $value;
                    }
                    break;
                default:
                    $this->$name = $value;
                    break;
            }
        }

        $this->container_url = $this->Url();
        $headers = $this->MetadataHeaders();
        $response = $this->Service()->Request($this->Url(), 'PUT', $headers);

        // check return code
        if ($response->HttpStatus() > 202) {
            throw new Exceptions\ContainerCreateError(sprintf(
                Lang::translate('Problem creating container [%s] status [%d] response [%s]'),
                $this->Url(),
                $response->HttpStatus(),
                $response->HttpBody()
            ));
            return false;
        }

        return true;
    }

    /**
     * Updates the metadata for a container
     *
     * @return boolean TRUE on success; FALSE on failure
     * @throws ContainerCreateError
     */
    public function Update()
    {
        $headers = $this->MetadataHeaders();
        $response = $this->Service()->Request($this->Url(), 'POST', $headers);

        // check return code
        if ($response->HttpStatus() > 204) {
            throw new \OpenCloud\Common\Exceptions\ContainerCreateError(sprintf(
                Lang::translate('Problem updating container [%s] status [%d] response [%s]'),
                $this->Url(),
                $response->HttpStatus(),
                $response->HttpBody()
            ));
            return false;
        }
        return true;
    }

    /**
     * Deletes the specified container
     *
     * @return boolean TRUE on success; FALSE on failure
     * @throws ContainerDeleteError
     */
    public function Delete()
    {
        $response = $this->Service()->Request($this->Url(), 'DELETE');

        // validate the response code
        if ($response->HttpStatus() == 404) {
            throw new Exceptions\ContainerNotFoundError(sprintf(
                Lang::translate('Container [%s] not found'),
                $this->name
            ));
        }

        if ($response->HttpStatus() == 409) {
            throw new Exceptions\ContainerNotEmptyError(sprintf(
                Lang::translate('Container [%s] must be empty before deleting'),
                $this->name
            ));
        }

        if ($response->HttpStatus() >= 300) {
            throw new Exceptions\ContainerDeleteError(sprintf(
                Lang::translate('Problem deleting container [%s] status [%d] response [%s]'),
                $this->Url(),
                $response->HttpStatus(),
                $response->HttpBody()
            ));
            return false;
        }

        return true;
    }

    /**
     * Returns the Service associated with the Container
     */
    public function Service()
    {
        return $this->service;
    }

    /********** PRIVATE METHODS **********/

    /**
     * Loads the object from the service
     *
     * @return void
     */
    public function Refresh($name=NULL, $url=NULL)
    {
        $response = $this->Service()->Request(
        	$this->Url($name), 'HEAD', array('Accept' => '*/*'));

        // validate the response code
        if ($this->name != 'TEST') {
            if ($response->HttpStatus() == 404) {
                throw new Exceptions\ContainerNotFoundError(sprintf(
                    Lang::translate('Container [%s] (%s) not found'),
                    $this->name,
                    $this->Url()
                ));
            }

            if ($response->HttpStatus() >= 300) {
                throw new Exceptions\HttpError(sprintf(
                    Lang::translate('Error retrieving Container, status [%d] response [%s]'),
                    $response->HttpStatus(),
                    $response->HttpBody()
                ));
            }
        }

		// check for headers (not metadata)
		foreach($response->Headers() as $header => $value) {
			switch($header) {
			case 'X-Container-Object-Count':
				$this->count = $value;
				break;
			case 'X-Container-Bytes-Used':
				$this->bytes = $value;
				break;
			}
		}

        // parse the returned object
        $this->GetMetadata($response);
    }

    /**
     * Validates that the container name is acceptable
     *
     * @param string $name the container name to validate
     * @return boolean TRUE if ok; throws an exception if not
     * @throws ContainerNameError
     */
    private function is_valid_name($name)
    {
        if (!$name) {
            throw new Exceptions\ContainerNameError(
            	Lang::translate('Container name cannot be blank'));
        }

        if ($name == '0') {
            throw new Exceptions\ContainerNameError(
            	Lang::translate('"0" is not a valid container name'));
        }

        if (strpos($name, '/') !== false) {
            throw new Exceptions\ContainerNameError(
            	Lang::translate('Container name cannot contain "/"'));
        }

        if (strlen($name) > Service::MAX_CONTAINER_NAME_LEN) {
            throw new Exceptions\ContainerNameError(
            	Lang::translate('Container name is too long'));
        }

        return true;
    }

}
