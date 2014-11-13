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

/**
 * AgentConnection class.
 */
class AgentConnection extends ReadOnlyResource
{
    private $id;
    private $guid;
    private $agent_id;
    private $endpoint;
    private $process_version;
    private $bundle_version;
    private $agent_ip;

    protected static $json_name = false;
    protected static $json_collection_name = 'values';
    protected static $url_resource = 'agents';
    
}