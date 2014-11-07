<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\Database;

use OpenCloud\Common\Service\NovaService;
use OpenCloud\OpenStack;

/**
 * The Rackspace Database As A Service (aka "Red Dwarf")
 */
class Service extends NovaService
{
    const DEFAULT_TYPE = 'rax:database';
    const DEFAULT_NAME = 'cloudDatabases';

    /**
     * Returns a list of flavors
     *
     * just call the parent FlavorList() method, but pass FALSE
     * because the /flavors/detail resource is not supported
     *
     * @api
     * @return \OpenCloud\Compute\FlavorList
     */
    public function flavorList($details = false, array $filter = array())
    {
        return parent::flavorList(false);
    }

    /**
     * Creates a Instance object
     *
     * @api
     * @param string $id the ID of the instance to retrieve
     * @return DbService\Instance
     */
    public function instance($id = null)
    {
        return new Resource\Instance($this, $id);
    }

    /**
     * Creates a Collection of Instance objects
     *
     * @api
     * @param array $params array of parameters to pass to the request as
     *      query strings
     * @return Collection
     */
    public function instanceList($params = array())
    {
        return $this->collection('OpenCloud\Database\Resource\Instance', null, null, $params);
    }
}
