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
class AgentTarget extends ReadOnlyResource
{
    
    private $type = 'agent.filesystem';
    
    protected static $json_name = 'targets';
    protected static $json_collection_name = 'targets';
    protected static $url_resource = 'targets';

    protected $allowedTypes = array(
        'agent.filesystem',
        'agent.memory',
        'agent.load_average',
        'agent.cpu',
        'agent.disk',
        'agent.network',
        'agent.plugin'
    );

    public function getUrl($path = null, array $query = array())
    {
        $path = "agent/check_types/{$this->type}/{$this->resourceName()}";
        return $this->getParent()->getUrl($path);
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
    
    public function getType()
    {
        return $this->type;
    }
    
}