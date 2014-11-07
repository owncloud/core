<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright Copyright 2014 Rackspace US, Inc. See COPYING for licensing information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @version   1.6.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\LoadBalancer\Resource;

/**
 * This class will retrieve a list of events associated with the activity 
 * between the node and the load balancer. The events report errors found with the node.
 */
class NodeEvent extends Readonly 
{
    
    public $detailedMessage;
    public $nodeId;
    public $id;
    public $type;
    public $description;
    public $category;
    public $severity;
    public $relativeUri;
    public $accountId;
    public $loadbalancerId;
    public $title;
    public $author;
    public $created;

    protected static $json_name = 'nodeServiceEvent';
    protected static $url_resource = 'nodes/events';

}
