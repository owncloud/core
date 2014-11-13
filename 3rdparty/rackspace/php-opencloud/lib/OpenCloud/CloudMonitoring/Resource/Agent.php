<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\CloudMonitoring\Resource;

use OpenCloud\CloudMonitoring\Exception;
use OpenCloud\Common\Http\Message\Formatter;

/**
 * Agent class.
 */
class Agent extends ReadOnlyResource
{
    /**
     * Agent IDs are user specified strings that are a maximum of 255 characters and can contain letters, numbers,
     * dashes and dots.
     *
     * @var string
     */
    private $id;

    /**
     * @var int UTC timestamp of last connection.
     */
    private $last_connected;
	
    protected static $json_name = false;
    protected static $json_collection_name = 'values';
    protected static $url_resource = 'agents';

    /**
     * @return mixed
     * @throws \OpenCloud\CloudMonitoring\Exception\AgentException
     */
    public function getConnections()
	{
    	if (!$this->getId()) {
        	throw new Exception\AgentException(
        	   'Please specify an "ID" value'
        	);
    	}

    	return $this->getService()->resourceList('AgentConnection', $this->getUrl('connections'));
	}

    /**
     * @param $connectionId
     * @return mixed
     * @throws \OpenCloud\CloudMonitoring\Exception\AgentException
     */
    public function getConnection($connectionId)
	{
    	if (!$this->getId()) {
        	throw new Exception\AgentException(
        	   'Please specify an "ID" value'
        	);
    	}
    	
    	$url = clone $this->getUrl();
        $url->addPath('connections')->addPath($connectionId);

    	$response = $this->getClient()->get($url)->send();
        $body = Formatter::decode($response);

    	return $this->getService()->resource('AgentConnection', $body);
	}
	
}