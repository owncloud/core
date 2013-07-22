<?php

namespace OpenCloud\LoadBalancer;

use OpenCloud\Common\PersistentObject;

/**
 * sub-resource to manage algorithms (read-only)
 */
class Algorithm extends PersistentObject 
{
    
    public $name;
    protected static $json_name = 'algorithm';
    protected static $url_resource = 'loadbalancers/algorithms';
    
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
