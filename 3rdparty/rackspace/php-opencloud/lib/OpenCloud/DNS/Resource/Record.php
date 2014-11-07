<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\DNS\Resource;

use OpenCloud\DNS\Service;

/**
 * The Record class represents a single domain record
 *
 * This is also used for PTR records.
 */
class Record extends Object 
{

    public $ttl;
    public $updated;
    public $created;
    public $name;
    public $id;
    public $type;
    public $data;
    public $priority;
    public $comment;

    protected static $json_name = false;
    protected static $json_collection_name = 'records';
    protected static $url_resource = 'records';

    protected $parent;
    
    protected $updateKeys = array(
        'name',
        'ttl',
        'data',
        'priority',
        'comment'
    );
    
    protected $createKeys = array(
        'type',
        'name',
        'ttl',
        'data',
        'priority',
        'comment'
    );

}
