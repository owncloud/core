<?php

namespace OpenCloud\CloudMonitoring\Resource;

/**
 * Changelog class.
 * 
 * @extends ReadOnlyResource
 */
class Changelog extends ReadOnlyResource
{

    public $timestamp;
    public $entity_id;
    public $alarm_id;
    public $check_id;
    public $state;
    public $analyzed_by_monitoring_zone_id;
    
    protected static $json_name = 'changelogs/alarms';
    protected static $json_collection_name = 'values';
    protected static $url_resource = 'changelogs/alarms';
    
    public function baseUrl()
    {
        return $this->Service()->Url($this->ResourceName());
    }

}