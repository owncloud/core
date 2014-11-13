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
 * The access list management feature allows fine-grained network access 
 * controls to be applied to the load balancer's virtual IP address. A single IP 
 * address, multiple IP addresses, or entire network subnets can be added as a 
 * networkItem. Items that are configured with the ALLOW type will always take 
 * precedence over items with the DENY type. To reject traffic from all items 
 * except for those with the ALLOW type, add a networkItem with an address of 
 * "0.0.0.0/0" and a DENY type.
 */
class Access extends SubResource 
{

    public $id;
    
    /**
     * Type of item to add:
     * ALLOW - Specifies items that will always take precedence over items with 
     *  the DENY type.
     * DENY - Specifies items to which traffic can be denied.
     * 
     * @var string 
     */
    public $type;
    
    /**
     * IP address for item to add to access list.
     * 
     * @var string 
     */
    public $address;
    
    protected static $json_name = "accessList";
    protected static $url_resource = "accesslist";
    protected $createKeys = array(
        'type', 
        'address'
    );

    public function update($params = array()) 
    { 
        return $this->noUpdate(); 
    }

    protected function createJson()
    {
        $object = new \stdClass;

        foreach ($this->createKeys as $item) {
            $object->$item = $this->$item;
        }

        if ($top = $this->jsonName()) {
            $object = array($top => array($object));
        }

        return $object;
    }

}