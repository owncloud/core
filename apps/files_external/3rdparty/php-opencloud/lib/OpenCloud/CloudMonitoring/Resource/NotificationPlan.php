<?php

namespace OpenCloud\CloudMonitoring\Resource;

use OpenCloud\CloudMonitoring\Exception;

class NotificationPlan extends AbstractResource implements ResourceInterface
{
	public $label;
	public $critical_state;
	public $ok_state;
	public $warning_state;
	
    protected static $json_name = 'notification_plans';
    protected static $json_collection_name = 'values';
    protected static $url_resource = 'notification_plans';

    protected static $requiredKeys = array(
        'label'
    );
    
    protected static $emptyObject = array(
        'label',
        'critical_state',
        'ok_state',
        'warning_state'
    );

    public function baseUrl()
    {
        return $this->Service()->Url($this->ResourceName());
    }
	
}