<?php

namespace OpenCloud\LoadBalancer\Resources;

/**
 * sub-resource to manage connection logging
 *
 * @api
 */
class ConnectionLogging extends SubResource 
{

	public $enabled;
    protected static $json_name = "connectionLogging";
    protected static $url_resource = "connectionlogging";
    protected $_create_keys = array('enabled');

	public function Create($params = array()) 
    { 
        $this->Update($params); 
    }

	public function Delete() 
    { 
        $this->NoDelete(); 
    }

}
