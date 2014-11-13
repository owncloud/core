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
 * The connection throttling feature imposes limits on the number of connections 
 * per IP address to help mitigate malicious or abusive traffic to your 
 * applications. The attributes in the table that follows can be configured 
 * based on the traffic patterns for your sites.
 */
class ConnectionThrottle extends SubResource 
{
    /**
     * Allow at least this number of connections per IP address before applying 
     * throttling restrictions. Setting a value of 0 allows unlimited 
     * simultaneous connections; otherwise, set a value between 1 and 1000.
     * 
     * @var int
     */
    public $minConnections;
    
    /**
     * Maximum number of connections to allow for a single IP address. Setting a 
     * value of 0 will allow unlimited simultaneous connections; otherwise set a 
     * value between 1 and 100000.
     * 
     * @var int 
     */
    public $maxConnections;
    
    /**
     * Maximum number of connections allowed from a single IP address in the 
     * defined rateInterval. Setting a value of 0 allows an unlimited connection 
     * rate; otherwise, set a value between 1 and 100000.
     * 
     * @var int
     */
    public $maxConnectionRate;
    
    /**
     * Frequency (in seconds) at which the maxConnectionRate is assessed. 
     * For example, a maxConnectionRate of 30 with a rateInterval of 60 would 
     * allow a maximum of 30 connections per minute for a single IP address. 
     * This value must be between 1 and 3600.
     * 
     * @var int
     */
    public $rateInterval;

    protected static $json_name = "connectionThrottle";
    protected static $url_resource = "connectionthrottle";

    protected $createKeys = array(
        'minConnections',
        'maxConnections',
        'maxConnectionRate',
        'rateInterval'
    );

    /**
     * create uses PUT like Update
     */
    public function create($params = array()) 
    { 
        return $this->update($params); 
    }

}
