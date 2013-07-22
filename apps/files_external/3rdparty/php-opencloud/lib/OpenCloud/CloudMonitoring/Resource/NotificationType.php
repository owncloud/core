<?php

namespace OpenCloud\CloudMonitoring\Resource;

/**
 * NotificationType class.
 * 
 * @extends ReadOnlyResource
 * @implements ResourceInterface
 */
class NotificationType extends ReadOnlyResource implements ResourceInterface
{

    public $address;
    public $fields;
    
    protected static $json_name = 'notification_types';
    protected static $json_collection_name = 'values';
    protected static $url_resource = 'notification_types';
    
    public function baseUrl()
    {
        return $this->Service()->Url($this->ResourceName());
    }

}