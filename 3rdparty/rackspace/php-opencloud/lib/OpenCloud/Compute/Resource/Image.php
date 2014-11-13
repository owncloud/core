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
 * A collection of files for a specific operating system (OS) that you use to 
 * create or rebuild a server. Rackspace provides pre-built images. You can also 
 * create custom images from servers that you have launched. Custom images can 
 * be used for data backups or as "gold" images for additional servers.
 *
 * @note In the future, this may be abstracted to access Glance (the OpenStack 
 * image store) directly, but it is currently not available to Rackspace 
 * customers, so we're using the /images resource on the servers API endpoint.
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

    /**
     * {@inheritDoc}
     */
    public function create($params = array()) 
    { 
        return $this->noCreate(); 
    }

    /**
     * {@inheritDoc}
     */
    public function update($params = array()) 
    { 
        return $this->noUpdate(); 
    }

}
