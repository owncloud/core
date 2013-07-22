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
class Agent extends ReadOnlyResource implements ResourceInterface
{
	
	public $last_connected;
	
    protected static $json_name = 'agents';
    protected static $json_collection_name = 'values';
    protected static $url_resource = 'agents';
    	
	public function baseUrl()
	{
    	return $this->Service()->Url($this->ResourceName());
	}
	
	public function getConnections()
	{
    	if (!$this->id) {
        	throw new Exception\AgentException(
        	   'Please specify an "ID" value'
        	);
    	}
    	
    	$url = $this->Url($this->id . '/connections');
    	return $this->Service()->Collection(__NAMESPACE__ . '\\AgentConnection', $url);
	}
	
	public function getConnection($connectionId)
	{
    	if (!$this->id) {
        	throw new Exception\AgentException(
        	   'Please specify an "ID" value'
        	);
    	}
    	
    	$url = $this->Url($this->id . '/connections/' . $connectionId);
    	$response = $this->Request($url);
    	return $this->Service()->resource('AgentConnection', $response);
	}
	
}