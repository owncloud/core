<?php
/**
 * Defines a DNS record
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @package phpOpenCloud
 * @version 1.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud\DNS;

/**
 * The Record class represents a single domain record
 *
 * This is also used for PTR records.
 *
 * @api
 * @author Glen Campbell <glen.campbell@rackspace.com>
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

    protected $_parent;
    protected $_update_keys = array(
        'name',
        'ttl',
        'data',
        'priority',
        'comment'
    );
    protected $_create_keys = array(
        'type',
        'name',
        'ttl',
        'data',
        'priority',
        'comment'
    );

    /**
     * create a new record object
     *
     * @param mixed $parent either the domain object or the DNS object (for PTR)
     * @param mixed $info ID or array/object of data for the object
     * @return void
     */
    public function __construct($parent, $info = null) 
    {
        $this->_parent = $parent;
        if (get_class($parent) == 'OpenCloud\DNS\Service') {
            parent::__construct($parent, $info);
        } else {
            parent::__construct($parent->Service(), $info);
        }
    }

    /**
     * returns the parent domain
     *
     * @return Domain
     */
    public function Parent() 
    {
        return $this->_parent;
    }

}
