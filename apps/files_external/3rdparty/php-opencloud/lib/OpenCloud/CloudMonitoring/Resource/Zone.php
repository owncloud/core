<?php

namespace OpenCloud\CloudMonitoring\Resource;

/**
 * Zone class.
 * 
 * @extends ReadOnlyResource
 */
class Zone extends ReadOnlyResource implements ResourceInterface
{
	public $country_code;
	public $label;
	public $source_ips;

    protected static $json_name = 'monitoring_zones';
    protected static $json_collection_name = 'values';
    protected static $url_resource = 'monitoring_zones';

    public function baseUrl($subresource = '')
    {
    	return $this->Parent()->Url($this->ResourceName());
    }

    public function traceroute(array $options)
    {
        if (!$this->id) {
            throw new Exception\ZoneException(
                'Please specify a zone ID'
            );    
        }
        
        if (!isset($options['target'])) {
            throw new Exception\ZoneException(
                'Please specify a "target" value'
            );
        }
        
        $params = new \stdClass;
        $params->target = $options['target'];
        
        if (isset($options['target_resolver'])) {
            $params->target_resolver = $options['target_resolver'];
        }
        
        $url = $this->Url($this->id . '/traceroute');
        $body = json_encode($params);        
        return $this->Service()->Request($url, 'POST', array(), $body);
    }
    
}