<?php
/**
 * Rackspace's Cloud Databases (database as a service)
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @package phpOpenCloud
 * @version 1.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud\Database;

use OpenCloud\Common\Nova;
use OpenCloud\OpenStack;

/**
 * The Rackspace Database As A Service (aka "Red Dwarf")
 *
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */
class Service extends Nova
{

    /**
     * Creates a new DbService service connection
     *
     * This is not normally called directly, but via the factory method on the
     * OpenStack or Rackspace connection object.
     *
     * @param OpenStack $conn the connection on which to create the service
     * @param string $name the name of the service (e.g., "cloudDatabases")
     * @param string $region the region of the service (e.g., "DFW" or "LON")
     * @param string $urltype the type of URL (normally "publicURL")
     */
    public function __construct(OpenStack $conn, $name, $region, $urltype)
    {
        parent::__construct($conn, 'rax:database', $name, $region, $urltype);
    }

    /**
     * Returns the URL of this database service, or optionally that of
     * an instance
     *
     * @param string $resource the resource required
     * @param array $args extra arguments to pass to the URL as query strings
     */
    public function Url($resource = 'instances', array $args = array())
    {
        return parent::Url($resource, $args);
    }

    /**
     * Returns a list of flavors
     *
     * just call the parent FlavorList() method, but pass FALSE
     * because the /flavors/detail resource is not supported
     *
     * @api
     * @return \OpenCloud\Compute\FlavorList
     */
    public function FlavorList($details = false, array $filter = array())
    {
        return parent::FlavorList(false);
    }

    /**
     * Creates a Instance object
     *
     * @api
     * @param string $id the ID of the instance to retrieve
     * @return DbService\Instance
     */
    public function Instance($id = null)
    {
        return new Instance($this, $id);
    }

    /**
     * Creates a Collection of Instance objects
     *
     * @api
     * @param array $params array of parameters to pass to the request as
     *      query strings
     * @return Collection
     */
    public function InstanceList($params = array())
    {
        return $this->Collection('\OpenCloud\Database\Instance', null, null, $params);
    }
}
