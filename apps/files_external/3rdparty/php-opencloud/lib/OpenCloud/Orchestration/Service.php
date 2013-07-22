<?php
/**
 * The OpenStack Orchestration (Heat) service
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @package phpOpenCloud
 * @version 1.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 * @author Stephen Sugden <openstack@stephensugden.com>
 */

namespace OpenCloud\Orchestration;

use OpenCloud\AbstractClass\Service as AbstractService;
use OpenCloud\Base\Lang;
use OpenCloud\OpenStack;

/**
 * The Orchestration class represents the OpenStack Heat service.
 *
 * It is constructed from a OpenStack object and requires a service name,
 * region, and URL type to select the proper endpoint from the service
 * catalog. However, constants can be used to define default values for
 * these to make it easier to use:
 *
 */
class Service extends AbstractService {

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
    public function __construct(
        OpenStack $conn,
        $serviceName,
        $serviceRegion,
        $urltype
    ) {
        $this->debug(_('initializing Orchestration...'));
        parent::__construct(
            $conn,
            'orchestration',
            $serviceName,
            $serviceRegion,
            $urltype
        );
    }

    /**
     * Returns a Stack object associated with this Orchestration service
     *
     * @api
     * @param string $id - the stack with the ID is retrieved
     * @returns Stack object
     */
    public function Stack($id = null) {
        return new Stack($this, $id);
    }

    public function namespaces() {
        return array();
    }
}
