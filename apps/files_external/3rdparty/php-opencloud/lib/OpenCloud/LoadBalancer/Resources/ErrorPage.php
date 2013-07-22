<?php

namespace OpenCloud\LoadBalancer\Resources;

/**
 * The /loadbalancer/{id}/errorpage manages the error page for the load
 * balancer.
 */
class ErrorPage extends SubResource 
{
    public $content;
    protected static $json_name = 'errorpage';
    protected static $url_resource = 'errorpage';
    protected $_create_keys = array('content');
    
    /**
     * creates a new error page
     *
     * This calls the Update() method, since it requires a PUT to create
     * a new error page. A POST request is not supported, since the URL
     * resource is already defined.
     *
     * @param array $parm array of parameters
     */
    public function Create($params = array()) 
    { 
        $this->Update($params); 
    }

}
