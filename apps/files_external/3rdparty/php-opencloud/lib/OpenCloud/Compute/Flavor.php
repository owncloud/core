<?php

/**
 * A flavor object, which defines RAM, disk, and other settings for a virtual
 * machine.
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @package phpOpenCloud
 * @version 1.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud\Compute;

use OpenCloud\Common\PersistentObject;

/**
 * The Flavor class represents a flavor defined by the Compute service
 *
 * At its simplest, a Flavor represents a combination of RAM, disk space,
 * and compute CPUs, though there are other extended attributes.
 */
class Flavor extends PersistentObject 
{

    public $status;
    public $updated;
    public $vcpus;
    public $disk;
    public $name;
    public $links;
    public $rxtx_factor;
    public $ram;
    public $id;
    public $swap;

    protected static $json_name = 'flavor';
    protected static $url_resource = 'flavors';

    public function Create($params = array()) 
    { 
        return $this->NoCreate(); 
    }
    
    public function Update($params = array()) 
    { 
        return $this->NoUpdate(); 
    }
    
    public function Delete() 
    { 
        return $this->NoDelete(); 
    }

}
