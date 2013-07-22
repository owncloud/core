<?php

namespace OpenCloud\LoadBalancer;

use OpenCloud\Common\PersistentObject;

/**
 * sub-resource to manage allowed domains
 *
 * Note that this is actually a sub-resource of the load balancers service,
 * and not of the load balancer object. It's included here for convenience,
 * since it matches the pattern of the other LB subresources.
 *
 * @api
 */
class AllowedDomain extends PersistentObject 
{

    public $name;
    protected static $json_name = 'allowedDomain';
    protected static$json_collection_name = 'allowedDomains';
    protected static$json_collection_element = 'allowedDomain';
    protected static$url_resource = 'loadbalancers/alloweddomains';

    public function Create($params = array()) 
    { 
        $this->NoCreate(); 
    }

    public function Update($params = array()) 
    { 
        $this->NoUpdate(); 
    }

    public function Delete() 
    { 
        $this->NoDelete(); 
    }

}
