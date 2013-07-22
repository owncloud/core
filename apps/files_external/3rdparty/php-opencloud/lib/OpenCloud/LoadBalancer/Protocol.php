<?php

namespace OpenCloud\LoadBalancer;

use OpenCloud\Common\PersistentObject;

/**
 * sub-resource to manage protocols (read-only)
 */
class Protocol extends PersistentObject 
{

    public $name;
    public $port;
    protected static $json_name = 'protocol';
    protected static $url_resource = 'loadbalancers/protocols';

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
