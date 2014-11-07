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

use OpenCloud\Common\PersistentObject;

/**
 * The nodes defined by the load balancer are responsible for servicing the 
 * requests received through the load balancer's virtual IP. By default, the 
 * load balancer employs a basic health check that ensures the node is listening 
 * on its defined port. The node is checked at the time of addition and at regular 
 * intervals as defined by the load balancer health check configuration. If a 
 * back-end node is not listening on its port or does not meet the conditions of 
 * the defined active health check for the load balancer, then the load balancer 
 * will not forward connections and its status will be listed as "OFFLINE". Only 
 * nodes that are in an "ONLINE" status will receive and be able to service 
 * traffic from the load balancer.
 * 
 * All nodes have an associated status that indicates whether the node is 
 * ONLINE, OFFLINE, or DRAINING. Only nodes that are in ONLINE status will 
 * receive and be able to service traffic from the load balancer. The OFFLINE 
 * status represents a node that cannot accept or service traffic. A node in 
 * DRAINING status represents a node that stops the traffic manager from sending 
 * any additional new connections to the node, but honors established sessions. 
 * If the traffic manager receives a request and session persistence requires 
 * that the node is used, the traffic manager will use it. The status is 
 * determined by the passive or active health monitors.
 * 
 * If the WEIGHTED_ROUND_ROBIN load balancer algorithm mode is selected, then 
 * the caller should assign the relevant weights to the node as part of the 
 * weight attribute of the node element. When the algorithm of the load balancer 
 * is changed to WEIGHTED_ROUND_ROBIN and the nodes do not already have an 
 * assigned weight, the service will automatically set the weight to "1" for all nodes.
 * 
 * One or more secondary nodes can be added to a specified load balancer so that 
 * if all the primary nodes fail, traffic can be redirected to secondary nodes. 
 * The type attribute allows configuring the node as either PRIMARY or SECONDARY.
 */
class Node extends PersistentObject 
{
    
    public $id;
    
    /**
     * IP address or domain name for the node.
     * 
     * @var string
     */
    public $address;
    
    /**
     * Port number for the service you are load balancing.
     * 
     * @var int 
     */
    public $port;
    
    /**
     * Condition for the node, which determines its role within the load balancer.
     * 
     * @var string 
     */
    public $condition;
    
    /**
     * Current state of the node. Can either be ONLINE, OFFLINE or DRAINING.
     * 
     * @var string 
     */
    public $status;
    
    /**
     * Weight of node to add. If the WEIGHTED_ROUND_ROBIN load balancer algorithm 
     * mode is selected, then the user should assign the relevant weight to the 
     * node using the weight attribute for the node. Must be an integer from 1 to 100.
     * 
     * @var int 
     */
    public $weight;
    
    /**
     * Type of node to add: 
     * 
     * * PRIMARY: Nodes defined as PRIMARY are in the normal rotation to receive 
     *      traffic from the load balancer.
     * 
     * * SECONDARY: Nodes defined as SECONDARY are only in the rotation to 
     *      receive traffic from the load balancer when all the primary nodes fail.
     * 
     * @var string 
     */
    public $type;

    protected static $json_name = FALSE;
    protected static $json_collection_name = 'nodes';
    protected static $url_resource = 'nodes';
    
    public $createKeys = array(
        'address',
        'port',
        'condition',
        'type',
        'weight'
    );

    /**
     * returns the Node name
     *
     * @return string
     */
    public function name() 
    {
        return get_class() . '[' . $this->Id() . ']';
    }

    protected function createJson() 
    {
        $nodes = (object) array('node' => new \stdClass);
        foreach($this->createKeys as $key) {
            $nodes->node->$key = $this->$key;
        }
        
        return (object) array('nodes' => array($nodes));
    }

    protected function updateJson($params = array())
    {
        if ($this->condition) {
            $params['condition'] = $this->condition;
        }
        if ($this->type) {
            $params['type'] = $this->type;
        }
        if ($this->weight) {
            $params['weight'] = $this->weight;
        }

        return (object) array('node' => (object) $params);
    }

    /**
     * factory method to create a new Metadata child of the Node
     *
     * @api
     * @return Metadata
     */
    public function metadata($data = null) 
    {
        return new Metadata($this, $data);
    }

    /**
     * factory method to create a Collection of Metadata object
     *
     * Note that these are metadata children of the Node, not of the
     * LoadBalancer.
     *
     * @api
     * @return Collection of Metadata
     */
    public function metadataList() 
    {
        return $this->getService()->collection('OpenCloud\LoadBalancer\Resource\Metadata', null, $this);
    }
    
}
