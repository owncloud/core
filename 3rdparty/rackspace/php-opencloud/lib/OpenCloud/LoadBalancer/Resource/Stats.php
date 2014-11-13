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
 * Returns statistics about the load balancer.
 * 
 * @link http://docs.rackspace.com/loadbalancers/api/v1.0/clb-devguide/content/List_Load_Balancer_Stats-d1e1524.html
 */
class Stats extends Readonly 
{
    
    /**
     * Connections closed by this load balancer because the 'connect_timeout' 
     * interval was exceeded.
     * 
     * @var int 
     */
    public $connectTimeOut;
    
    /**
     * Number of transaction or protocol errors in this load balancer.
     * 
     * @var int 
     */
    public $connectError;
    
    /**
     * Number of connection failures in this load balancer.
     * 
     * @var int 
     */
    public $connectFailure;
    
    /**
     * Connections closed by this load balancer because the 'timeout' interval 
     * was exceeded.
     * 
     * @var int 
     */
    public $dataTimedOut;
    
    /**
     * Connections closed by this load balancer because the 'keepalive_timeout' 
     * interval was exceeded.
     * 
     * @var int 
     */
    public $keepAliveTimedOut;
    
    /**
     * Maximum number of simultaneous TCP connections this load balancer has 
     * processed at any one time.
     * 
     * @var int 
     */
    public $maxConn;

    protected static $json_name = false;
    protected static $url_resource = 'stats';

}
