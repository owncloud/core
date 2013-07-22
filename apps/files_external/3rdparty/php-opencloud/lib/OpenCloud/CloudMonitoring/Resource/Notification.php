<?php

namespace OpenCloud\CloudMonitoring\Resource;

/**
 * Notification class.
 * 
 * @extends AbstractResource
 */
class Notification extends AbstractResource implements ResourceInterface
{
    
    public $label;
    public $type;
    public $details;
    
    protected static $json_name = 'notifications';
    protected static $json_collection_name = 'values';
    protected static $url_resource = 'notifications';
    
    protected static $emptyObject = array(
        'label',
        'type',
        'details'
    );

    protected static $requiredKeys = array(
        'type',
        'details'
    );
    
    public function populate($data)
    {
        parent::populate($data);
        
        if ($type = $this->getProperty($data, 'type')) {
            $this->type = $this->service()->resource('NotificationType', $type);
        }
    }
    
    public function baseUrl()
    {
        return $this->Service()->Url($this->ResourceName());
    }
    
    public function testUrl($debug = false)
    {
        return $this->Service()->Url('test-notification');
    }
    
}