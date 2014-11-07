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
 * Sub-resource to manage Metadata
 */
class Metadata extends SubResource 
{

    public $id;
    public $key;
    public $value;

    protected static $json_name = 'meta';
    protected static $json_collection_name = 'metadata';
    protected static $url_resource = 'metadata';

    protected $createKeys = array(
        'key', 
        'value'
    );

    public function name() 
    {
        return $this->key;
    }

}
