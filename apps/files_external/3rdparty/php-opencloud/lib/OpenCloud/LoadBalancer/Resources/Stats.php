<?php

namespace OpenCloud\LoadBalancer\Resources;

/**
 * Stats returns statistics about the load balancer
 */
class Stats extends Readonly 
{

    public $connectTimeOut;
    public $connectError;
    public $connectFailure;
    public $dataTimedOut;
    public $keepAliveTimedOut;
    public $maxConn;

    protected static $json_name = FALSE;
    protected static $url_resource = 'stats';

}
