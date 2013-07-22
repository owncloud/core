<?php

namespace OpenCloud\CloudMonitoring\Resource;

use OpenCloud\Common\Lang;
use OpenCloud\Common\PersistentObject;
use OpenCloud\CloudMonitoring\Exception;

/**
 * Check class.
 * 
 * @extends AbstractResource
 */
class Check extends AbstractResource implements ResourceInterface
{
    public $id;
	public $type;
	public $details;
	public $disabled;
	public $label;
	public $metadata;
	public $period;
	public $timeout;
	public $monitoring_zones_poll;
	public $target_alias;
	public $target_hostname;
	public $target_resolver;

    protected static $json_name = 'checks';
    protected static $json_collection_name = 'values';
    protected static $url_resource = 'checks';

    protected static $emptyObject = array(
        'type',
        'details',
        'disabled',
        'label',
        'metadata',
        'period',
        'timeout',
        'monitoring_zones_poll',
        'target_alias',
        'target_hostname',
        'target_resolver'
    );

    protected static $requiredKeys = array(
        'type'
    );
    
    public function populate($data)
    {
        parent::populate($data);
        
        if ($type = $this->getProperty($data, 'type')) {
            $this->type = $this->Service()->resource('CheckType', $type);
        }
    }

    public function baseUrl($subresource = '')
    {
        return $this->Parent()->Url() . '/' . $this->Parent()->id . '/'. $this->ResourceName();
    }

    public function CreateUrl()
    {
        return $this->Url();
    }

    public function testUrl($debug = false)
    {
        $url = $this->Parent()->Url() . '/' . $this->Parent()->id . '/test-check'; 
        return ($debug !== true) ? $url : $url . '?debug=true';
    }

}