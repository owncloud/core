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
use OpenCloud\Common\Collection\ResourceIterator;

/**
 * Agent class.
 */
class AgentHost extends ReadOnlyResource
{
    private $token;
    private $label;
    
    protected static $json_name = false;
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

    public function info($type)
    {
        if (!in_array($type, $this->allowedTypes)) {
            throw new Exception\AgentException(sprintf(
                'Incorrect info type. Please specify one of the following: %s',
                implode(', ', $this->allowedTypes)
            ));
        }

        return $this->getService()->resourceList('AgentHostInfo', $this->getUrl($type), $this);
    }

}