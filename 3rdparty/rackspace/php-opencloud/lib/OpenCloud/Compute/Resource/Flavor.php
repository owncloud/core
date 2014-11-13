<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\Compute\Resource;

use OpenCloud\Common\PersistentObject;

/**
 * A resource configuration for a server. Each flavor is a unique combination 
 * of disk, memory, vCPUs, and network bandwidth.
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

    public function create($params = array()) 
    { 
        return $this->noCreate(); 
    }

    public function update($params = array()) 
    { 
        return $this->noUpdate(); 
    }

    public function delete() 
    {
        return $this->noDelete();
    }

}
