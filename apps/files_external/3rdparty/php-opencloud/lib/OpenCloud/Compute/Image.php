<?php
/**
 * An object that defines a virtual machine image
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
 * The Image class represents a stored machine image returned by the
 * Compute service.
 *
 * In the future, this may be abstracted to access
 * Glance (the OpenStack image store) directly, but it is currently
 * not available to Rackspace customers, so we're using the /images
 * resource on the servers API endpoint.
 */
class Image extends PersistentObject 
{

    public $status;
    public $updated;
    public $links;
    public $minDisk;
    public $id;
    public $name;
    public $created;
    public $progress;
    public $minRam;
    public $metadata;
    public $server;

    protected static $json_name = 'image';
    protected static $url_resource = 'images';

    public function Create($params = array()) 
    { 
        $this->NoCreate(); 
    }

    public function Update($params = array()) 
    { 
        $this->NoUpdate(); 
    }

}
