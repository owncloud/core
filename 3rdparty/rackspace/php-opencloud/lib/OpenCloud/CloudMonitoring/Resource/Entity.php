<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\CloudMonitoring\Resource;

/**
 * Entity class.
 */
class Entity extends AbstractResource
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string Defines a name for the entity.
     */
    private $label;

    /**
     * @var string Agent to which this entity is bound to.
     */
    private $agent_id;

    /**
     * @var array Hash of IP addresses that can be referenced by checks on this entity.
     */
    private $ip_addresses;

    protected static $json_name = false;
    protected static $url_resource = 'entities';
    protected static $json_collection_name = 'values';

    protected static $emptyObject = array(
        'label',
        'agent_id',
        'ip_addresses',
        'metadata'
    );

    protected static $requiredKeys = array(
        'label'
    );

    public function getChecks()
    {
        return $this->getService()->resourceList('Check', null, $this);
    }

    public function getCheck($id = null)
    {
        return $this->getService()->resource('Check', $id, $this);
    }

    public function createCheck(array $params)
    {
        return $this->getCheck()->create($params);
    }

    public function testNewCheckParams(array $params, $debug = false)
    {
        return $this->getCheck()->testParams($params, $debug);
    }

    public function createAlarm(array $params)
    {
        return $this->getService()->resource('Alarm', $params, $this)->create();
    }

    public function testAlarm(array $params)
    {
        return $this->getService()->resource('Alarm', null, $this)->test($params);
    }

    public function getAlarms()
    {
        return $this->getService()->resourceList('Alarm', null, $this);
    }

    public function getAlarm($id = null)
    {
        return $this->getService()->resource('Alarm', $id, $this);
    }

}