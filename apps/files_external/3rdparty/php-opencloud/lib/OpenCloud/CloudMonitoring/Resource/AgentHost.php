<?php

namespace OpenCloud\CloudMonitoring\Resource;

use OpenCloud\Common\PersistentObject;
use OpenCloud\CloudMonitoring\Exception;

/**
 * Agent class.
 * 
 * @extends ReadOnlyResource
 * @implements ResourceInterface
 */
class AgentHost extends ReadOnlyResource implements ResourceInterface
{
    
    public $token;
    public $label;
    
    protected static $json_name = 'host_info';
    protected static $json_collection_name = 'info';
    protected static $url_resource = 'host_info';

    private $allowedTypes = array(
        'cpus',
        'disks',
        'filesystems',
        'memory',
        'network_interfaces',
        'processes',
        'system',
        'who'
    );

    public function baseUrl()
    {
        return $this->Parent()->Url($this->Parent()->id . '/' . $this->ResourceName());
    }

    public function info($type)
    {
        if (!in_array($type, $this->allowedTypes)) {
            throw new Exception\AgentException(sprintf(
                'Incorrect info type. Please specify one of the following: %s',
                implode(', ', $this->allowedTypes)
            ));
        }

        return $this->Service()->Collection(__NAMESPACE__ . '\AgentHostInfo', $this->Url($type));
    }    
    
}