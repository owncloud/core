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
class AgentTarget extends ReadOnlyResource implements ResourceInterface
{
    
    public $type = 'agent.filesystem';
    
    protected static $json_name = 'targets';
    protected static $json_collection_name = 'targets';
    protected static $url_resource = 'targets';

    private $allowedTypes = array(
        'agent.filesystem',
        'agent.memory',
        'agent.load_average',
        'agent.cpu',
        'agent.disk',
        'agent.network',
        'agent.plugin'
    );

    public function baseUrl()
    {
        $resourceUrl = "agent/check_types/{$this->type}/{$this->ResourceName()}";
        return $this->Parent()->Url($this->Parent()->id . '/' . $resourceUrl);
    }

    public function setType($type)
    {
        if (!in_array($type, $this->allowedTypes)) {
            throw new Exception\AgentException(sprintf(
                'Incorrect target type. Please specify one of the following: %s',
                implode(', ', $this->allowedTypes)
            ));
        }

        $this->type = $type;
    }

    public function listAll()
    {
        if (!$this->type) {
            throw new Exception\AgentException(sprintf(
                'Please specify a target type'
            ));
        }

        $response = json_decode($this->Service()->Request($this->Url())->HttpBody());
        
        if (isset($response->{self::$json_collection_name})) {
            $response = $response->{self::$json_collection_name};
        }

        return $response;
    } 
    
}