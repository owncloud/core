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
class AgentToken extends AbstractResource implements ResourceInterface
{
    
    public $token;
    public $label;
    
    protected static $json_name = 'agent_tokens';
    protected static $json_collection_name = 'values';
    protected static $url_resource = 'agent_tokens';
    
    protected static $emptyObject = array(
        'label',
        'token'
    );

    protected static $requiredKeys = array();

    public function baseUrl()
    {
        return $this->Service()->Url($this->ResourceName());
    }
    
}