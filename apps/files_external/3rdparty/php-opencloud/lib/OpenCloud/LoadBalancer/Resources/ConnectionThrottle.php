<?php

namespace OpenCloud\LoadBalancer\Resources;

/**
 * sub-resource to manage connection throttling
 *
 * @api
 */
class ConnectionThrottle extends SubResource 
{
    
    public $minConnections;
    public $maxConnections;
    public $maxConnectionRate;
    public $rateInterval;

    protected static $json_name = "connectionThrottle";
    protected static $url_resource = "connectionthrottle";

    protected $_create_keys = array(
        'minConnections',
        'maxConnections',
        'maxConnectionRate',
        'rateInterval'
    );

    /**
     * create uses PUT like Update
     */
    public function Create($params = array()) 
    { 
        $this->Update($params); 
    }

}
