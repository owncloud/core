<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\Volume\Resource;

use OpenCloud\Common\PersistentObject;
use OpenCloud\Common\Lang;
use OpenCloud\Common\Exceptions;

/**
 * The Snapshot class represents a single block storage snapshot
 */
class Snapshot extends PersistentObject 
{

    public $id;
    public $display_name;
    public $display_description;
    public $volume_id;
    public $status;
    public $size;
    public $created_at;
    public $metadata;

    protected $force = false;

    protected static $json_name = 'snapshot';
    protected static $url_resource = 'snapshots';

    protected $createKeys = array(
        'display_name',
        'display_description',
        'volume_id',
        'force'
    );

    public function update($params = array()) 
    {
        return $this->noUpdate();
    }

    public function name() 
    {
        return $this->display_name;
    }

}
