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
 * A virtual IP (VIP) makes a load balancer accessible by clients. The load 
 * balancing service supports either a public VIP, routable on the public 
 * Internet, or a ServiceNet address, routable only within the region in which 
 * the load balancer resides.
 */
class VirtualIp extends SubResource 
{

    public $id;
    
    /**
     * IP address.
     * 
     * @var string 
     */
    public $address;
    
    /**
     * Either "PUBLIC" (public Internet) or "SERVICENET" (internal Rackspace network)
     * 
     * @var int 
     */
    public $type;
    
    /**
     * Either 4 or 6.
     * 
     * @var int 
     */
    public $ipVersion;

    protected static $json_collection_name = 'virtualIps';
    protected static $json_name = FALSE;
    protected static $url_resource = 'virtualips';
    
    public $createKeys = array(
        'type', 
        'ipVersion'
    );
    
    public function update($params = array()) 
    { 
        return $this->noUpdate(); 
    }

}
