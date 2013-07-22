<?php

namespace OpenCloud\CloudMonitoring\Resource;

class AgentHostInfo extends AgentHost
{
	
	public function SetProperty($property, $value, array $prefixes = array())
	{
		$this->$property = $value;
	}

}