<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\Autoscale\Resource;

/**
 * This specifies the basic elements of the group. The Group Configuration contains:
 * 
 * - Group Name
 * - Group Cooldown (how long a group has to wait before you can scale again in seconds)
 * - Minimum and Maximum number of entities
 * 
 * @link https://github.com/rackerlabs/otter/blob/master/doc/getting_started.rst
 * @link http://docs.autoscale.apiary.io/
 */
class GroupConfiguration extends AbstractResource
{
    
    public $name;
    public $cooldown;
    public $minEntities;
    public $maxEntities;
    public $metadata;
    
    protected static $json_name = 'groupConfiguration';
    protected static $url_resource = 'config';
    
    public $createKeys = array(
        'name',
        'cooldown',
        'minEntities',
        'maxEntities'
    );

    public function create($params = array())
    {
        return $this->noCreate();
    }

    public function delete()
    {
        return $this->noDelete();
    }
    
}