<?php

namespace OpenCloud\CloudMonitoring\Resource;

use OpenCloud\Common\PersistentObject;
use OpenCloud\CloudMonitoring\Exception;

/**
 * AgentConnection class.
 * 
 * @extends ReadOnlyResource
 */
class AgentConnection extends ReadOnlyResource implements ResourceInterface
{

    public $guid;
    public $agent_id;
    public $endpoint;
    public $process_version;
    public $bundle_version;
    public $agent_ip;

    protected static $json_name = 'agents';
    protected static $json_collection_name = 'values';
    protected static $url_resource = 'agents';

    public function baseUrl()
    {
    }

}