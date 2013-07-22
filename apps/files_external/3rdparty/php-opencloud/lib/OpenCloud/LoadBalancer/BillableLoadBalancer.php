<?php

namespace OpenCloud\LoadBalancer;

/**
 * used to get a list of billable load balancers for a specific date range
 */
class BillableLoadBalancer extends LoadBalancer 
{

    protected static $url_resource = 'loadbalancers/billable';

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
