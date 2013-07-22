<?php
/**
 * The OpenStack Compute (Nova) service
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @package phpOpenCloud
 * @version 1.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud\Compute;

use OpenCloud\OpenStack;
use OpenCloud\Common\Lang;
use OpenCloud\Common\Nova;
use OpenCloud\Common\Exceptions;

/**
 * The Compute class represents the OpenStack Nova service.
 *
 * It is constructed from a OpenStack object and requires a service name,
 * region, and URL type to select the proper endpoint from the service
 * catalog. However, constants can be used to define default values for
 * these to make it easier to use:
 *
 * Creating a compute object:
 *
 * <code>
 * $rackspace = new OpenCloud\Rackspace(...);
 * $dallas = new Compute(
 *    $rackspace,              // connection
 *   'cloudServersOpenStack',  // the service's name
 *   'DFW',                    // region identifier
 *   'publicURL'               // URL type
 *  );
 * </code>
 *
 * The easy way (with defaults); this assumes that the constants (RAXSDK_...)
 * are defined elsewhere *before* the inclusion of the first SDK library file:
 *
 * <code>
 * $rackspace = new OpenCloud\Rackspace(...);
 * $dallas = new OpenCloud\Compute($rackspace); // uses defaults
 * </code>
 *
 */
class Service extends Nova 
{

    /**
     * Called when creating a new Compute service object
     *
     * _NOTE_ that the order of parameters for this is *different* from the
     * parent Service class. This is because the earlier parameters are the
     * ones that most typically change, whereas the later ones are not
     * modified as often.
     *
     * @param \OpenCloud\Identity $conn - a connection object
     * @param string $serviceRegion - identifies the region of this Compute
     *      service
     * @param string $urltype - identifies the URL type ("publicURL",
     *      "privateURL")
     * @param string $serviceName - identifies the name of the service in the
     *      catalog
     */
    public function __construct(OpenStack $conn, $serviceName, $serviceRegion, $urltype) 
    {
        $this->debug(Lang::translate('initializing Compute...'));
        
        parent::__construct(
            $conn,
            'compute',
            $serviceName,
            $serviceRegion,
            $urltype
        );

        // check the URL version
        $path = parse_url($this->Url(), PHP_URL_PATH);

        if (substr($path, 0, 3) == '/v1') {
            throw new Exceptions\UnsupportedVersionError(sprintf(
                Lang::translate('Sorry; API version /v1 is not supported [%s]'), 
                $this->Url()
            ));
        }

        $this->load_namespaces();
    }

    /**
     * Returns the selected endpoint URL of this compute Service
     *
     * @param string $resource - an optional child resource. For example,
     *      passing 'details' would return .../servers/details. Should *not* be
     *    prefixed with a slash (/).
     * @param array $args (optional) an array of key-value pairs for query
     *      strings to append to the URL
     * @returns string - the requested URL
     */
    public function Url($resource = 'servers', array $args = array()) 
    {
        return parent::Url($resource, $args);
    }

    /**
     * Returns a Server object associated with this Compute service
     *
     * This is a factory method and should generally be used to create server
     * objects (thus ensuring that they are correctly associated with the
     * server) instead of calling the Server class explicitly.
     *
     * @api
     * @param string $id - if specified, the server with the ID is retrieved
     * @returns Compute\Server object
     */
    public function Server($id = NULL) 
    {
        return new Server($this, $id);
    }

    /**
     * Returns a Collection of server objects, filtered by the specified
     * parameters
     *
     * This is a factory method and should normally be called instead of
     * creating a ServerList object directly.
     *
     * @api
     * @param boolean $details - if TRUE, full server details are returned; if
     *      FALSE, just the minimal set of info is listed. Defaults to TRUE;
     *      you might set this to FALSE to improve performance at the risk of
     *      not having all the information you need.
     * @param array $filter - a set of key/value pairs that is passed to the
     *    servers list for filtering
     * @returns Collection
     */
    public function ServerList($details=TRUE, $filter=array()) 
    {
        if (!is_bool($details)) {
            throw new Exceptions\InvalidArgumentException(Lang::translate('First argument for Compute::ServerList() must be boolean'));
        }

        if (!is_array($filter)) {
            throw new Exceptions\InvalidArgumentException(Lang::translate('Second argument for Compute::ServerList() must be array'));
        }

        if ($details) {
            $url = $this->Url(Server::ResourceName() . '/detail', $filter);
        } else {
            $url = $this->Url(Server::ResourceName(), $filter);
        }

        return $this->Collection('\OpenCloud\Compute\Server', $url);
    }

    /**
     * Returns a Network object
     *
     * @api
     * @param string $id the network ID
     * @return Compute\Network
     */
    public function Network($id = null) 
    {
        return new Network($this, $id);
    }

    /**
     * Returns a Collection of Network objects
     *
     * @api
     * @param array $filters array of filter key/value pairs
     * @return Collection
     */
    public function NetworkList($filter = array()) 
    {
        return $this->Collection('\OpenCloud\Compute\Network');
    }

    /**
     * Returns an image from the service
     *
     * This is a factory method and should normally be called instead of
     * creating an Image object directly.
     *
     * @api
     * @param string $id - if supplied, returns the image with the specified ID.
     * @return Compute\Image object
     */
    public function Image($id = null) 
    {
        return new Image($this, $id);
    }

    /**
     * Returns a Collection of images (class Image)
     *
     * This is a factory method and should normally be used instead of creating
     * an ImageList object directly.
     *
     * @api
     * @param boolean $details - if TRUE (the default), returns complete image
     *      details. Set to FALSE to improve performance, but only return a
     *      minimal set of data
     * @param array $filter - key/value pairs to pass to the images resource.
     *      The actual values available here are determined by the OpenStack
     *      code and any extensions installed by your cloud provider;
     *      see http://docs.rackspace.com/servers/api/v2/cs-devguide/content/List_Images-d1e4435.html
     *      for current filters available.
     * @return Collection
     */
    public function ImageList($details = true, $filter = array()) 
    {
        // validate arguments
        if (!is_bool($details)) {
            throw new Exceptions\InvalidParameterError(Lang::translate('Invalid argument for Compute::ImageList(); boolean required'));
        }

        if ($details) {
            $url = $this->Url('images/detail', $filter);
        } else {
            $url = $this->Url('images', $filter);
        }

        return $this->Collection('\OpenCloud\Compute\Image', $url);
    }

}
