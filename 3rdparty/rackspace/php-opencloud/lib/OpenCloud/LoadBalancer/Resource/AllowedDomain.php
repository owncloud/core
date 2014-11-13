<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright Copyright 2014 Rackspace US, Inc. See COPYING for licensing information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @version   1.6.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\LoadBalancer\Resource;

/**
 * The allowed domains are restrictions set for the allowed domain names used 
 * for adding load balancer nodes. In order to submit a domain name as an address 
 * for the load balancer node to add, the user must verify that the domain is 
 * valid by using the List Allowed Domains call.
 *
 * Note that this is actually a sub-resource of the load balancers service,
 * and not of the load balancer object. It's included here for convenience,
 * since it matches the pattern of the other LB subresources.
 */
class AllowedDomain extends Readonly 
{

    public $name;
    
    protected static $json_name = 'allowedDomain';
    protected static $json_collection_name = 'allowedDomains';
    protected static $json_collection_element = 'allowedDomain';
    protected static $url_resource = 'loadbalancers/alloweddomains';
    
}
