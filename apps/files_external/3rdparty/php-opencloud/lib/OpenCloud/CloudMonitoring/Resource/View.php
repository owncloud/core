<?php

namespace OpenCloud\CloudMonitoring\Resource;

/**
 * View class.
 * 
 * @extends ReadOnlyResource
 */
class View extends ReadOnlyResource implements ResourceInterface
{
    public $timestamp;
    public $entity;
    public $alarms;
    public $checks;
    public $latest_alarm_states;
    
    public $dataOnly = false;
    
    protected static $json_name = 'views/overview';
    protected static $json_collection_name = 'values';
    protected static $url_resource = 'views/overview';
    
    public function baseUrl()
    {
        return $this->Service()->Url($this->ResourceName());
    }
    
    public function setDataOnly($bool)
    {
        $this->dataOnly = $bool;   
    }
    
    public function getDataOnly()
    {
        return $this->dataOnly;
    }
    
    public function populate($data)
    {
        parent::populate($data);
        
        if (!$this->getDataOnly()) {
            if ($entity = $this->getProperty($data, 'entity')) {
                $this->entity = $this->Service()->resource('Entity', $entity);
            }
            
            if ($alarms = $this->getProperty($data, 'alarms')) {
                $this->alarms = array();
                foreach ($alarms as $alarm) {
                    $this->alarms[] = $this->Service()->resource('Alarm', $alarm);
                }
            }
            
            if ($checks = $this->getProperty($data, 'checks')) {
                $this->checks = array();
                foreach ($checks as $check) {
                    $this->checks[] = $this->Service()->resource('Check', $check);
                }
            }
        }
    }

}