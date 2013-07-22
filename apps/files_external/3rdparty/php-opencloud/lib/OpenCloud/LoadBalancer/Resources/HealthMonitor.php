<?php

namespace OpenCloud\LoadBalancer\Resources;

/**
 * sub-resource to manage health monitor info
 */
class HealthMonitor extends SubResource 
{

    public $type;
    public $delay;
    public $timeout;
    public $attemptsBeforeDeactivation;
    public $bodyRegex;
    public $hostHeader;
    public $path;
    public $statusRegex;
        
    protected static $json_name = 'healthMonitor';
    protected static $url_resource = 'healthmonitor';

    protected $_create_keys = array(
        'type',
        'delay',
        'timeout',
        'attemptsBeforeDeactivation',
        'bodyRegex',
        'hostHeader',
        'path',
        'statusRegex'
    );

    /**
     * creates a new health monitor
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
