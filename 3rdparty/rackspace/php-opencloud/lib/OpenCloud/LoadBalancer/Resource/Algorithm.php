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
 * All load balancers utilize an algorithm that defines how traffic should be 
 * directed between back-end nodes. The default algorithm for newly created load 
 * balancers is RANDOM, which can be overridden at creation time or changed 
 * after the load balancer has been initially provisioned. The algorithm name is 
 * to be constant within a major revision of the load balancing API, though new 
 * algorithms may be created with a unique algorithm name within a given major 
 * revision of the service API.
 * 
 * Accepted options are:
 * 
 * * LEAST_CONNECTIONS: The node with the lowest number of connections will 
 *      receive requests.
 * 
 * * RANDOM: Back-end servers are selected at random.
 * 
 * * ROUND_ROBIN: Connections are routed to each of the back-end servers in turn.
 * 
 * * WEIGHTED_LEAST_CONNECTIONS: Each request will be assigned to a node based 
 *      on the number of concurrent connections to the node and its weight. 
 * 
 * * WEIGHTED_ROUND_ROBIN: A round robin algorithm, but with different 
 *      proportions of traffic being directed to the back-end nodes. Weights 
 *      must be defined as part of the load balancer's node configuration.
 */
class Algorithm extends Readonly 
{
    
    public $name;
    protected static $json_name = 'algorithm';
    protected static $url_resource = 'loadbalancers/algorithms';

}
