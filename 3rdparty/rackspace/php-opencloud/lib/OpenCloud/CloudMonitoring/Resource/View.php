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
 * View class.
 */
class View extends ReadOnlyResource
{
    private $timestamp;
    private $entity;
    private $alarms;
    private $checks;
    private $latest_alarm_states;
    
    protected static $json_name = false;
    protected static $json_collection_name = 'values';
    protected static $url_resource = 'views/overview';
    
    protected $associatedResources = array(
        'entity' => 'Entity'
    );
    
    protected $associatedCollections = array(
        'alarms' => 'Alarm',
        'checks' => 'Check'
    );

    public function getAlarm($info = null)
    {
        return $this->getService()->resource('Alarm', $info);
    }

    public function getCheck($info = null)
    {
        return $this->getService()->resource('Check', $info);
    }

}