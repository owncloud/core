<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Stephen Sugden <openstack@stephensugden.com>
 */

namespace OpenCloud\Orchestration;

use OpenCloud\Common\Service\CatalogService;

/**
 * The Orchestration class represents the OpenStack Heat service.
 *
 * Heat is a service to orchestrate multiple composite cloud applications using 
 * the AWS CloudFormation template format, through both an OpenStack-native ReST 
 * API and a CloudFormation-compatible Query API.
 * 
 * @codeCoverageIgnore
 */
class Service extends CatalogService
{
    const DEFAULT_TYPE = 'orchestration';
    const DEFAULT_NAME = 'cloudOrchestration';

    /**
     * Returns a Stack object associated with this Orchestration service
     *
     * @api
     * @param string $id - the stack with the ID is retrieved
     * @returns Stack object
     */
    public function stack($id = null) 
    {
        return new Stack($this, $id);
    }
    
    /**
     * Return namespaces.
     * 
     * @return array
     */
    public function namespaces() 
    {
        return array();
    }
}
