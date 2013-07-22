<?php

namespace OpenCloud\LoadBalancer\Resources;

/**
 * a single node event, usually called as part of a Collection
 *
 * This is a read-only subresource.
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
