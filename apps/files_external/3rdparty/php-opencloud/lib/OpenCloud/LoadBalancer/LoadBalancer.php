<?php
/**
 * Defines a load balancer object
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 * See COPYING for licensing information
 *
 * @package phpOpenCloud
 * @version 1.0
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */

namespace OpenCloud\LoadBalancer;

use OpenCloud\Common\PersistentObject;
use OpenCloud\Common\Lang;
use OpenCloud\Common\Exceptions;

/**
 * The LoadBalancer class represents a single load balancer
 *
 * NOTE: see BillableLoadBalancer, a subclass, defined at the end of this file.
 *
 * @api
 * @author Glen Campbell <glen.campbell@rackspace.com>
 */
class LoadBalancer extends PersistentObject 
{

    public $id;
    public $name;
    public $port;
    public $protocol;
    public $virtualIps=array();
    public $nodes=array();
    public $accessList;
    public $algorithm;
    public $connectionLogging;
    public $connectionThrottle;
    public $healthMonitor;
    public $sessionPersistence;
    public $metadata = array();
    public $created;
    public $updated;
    public $status;
    public $timeout;
    public $nodeCount;
    public $sourceAddresses;

    protected static $json_name = 'loadBalancer';
    protected static $url_resource = 'loadbalancers';

    private $_create_keys = array(
        'name',
        'port',
        'protocol',
        'virtualIps',
        'nodes',
        'accessList',
        'algorithm',
        'connectionLogging',
        'connectionThrottle',
        'healthMonitor',
        'sessionPersistence'
    );

    /**
     * adds a node to the load balancer
     *
     * This method creates a Node object and adds it to a list of Nodes
     * to be added to the LoadBalancer. *Very important:* this method *NEVER*
     * adds the nodes directly to the load balancer itself; it stores them
     * on the object, and the nodes are added later, in one of two ways:
     *
     * * for a new LoadBalancer, the Nodes are added as part of the Create()
     *   method call.
     * * for an existing LoadBalancer, you must call the AddNodes() method
     *
     * @api
     * @param string $address the IP address of the node
     * @param integer $port the port # of the node
     * @param boolean $condition the initial condition of the node
     * @param string $type either PRIMARY or SECONDARY
     * @param integer $weight the node weight (for round-robin)
     * @throws \OpenCloud\DomainError if value is not valid
     * @return void
     */
    public function AddNode(
        $address, 
        $port, 
        $condition = 'ENABLED',
        $type = null, 
        $weight = null
    ) {
        $node = $this->Node();
        $node->address = $address;
        $node->port = $port;
        $cond = strtoupper($condition);

        switch($cond) {
            case 'ENABLED':
            case 'DISABLED':
            case 'DRAINING':
                $node->condition = $cond;
                break;
            default:
                throw new Exceptions\DomainError(sprintf(
                    Lang::translate('Value [%s] for Node::condition is not valid'), 
                    $condition
                ));
        }

        if ($type !== null) {
            switch(strtoupper($type)) {
                case 'PRIMARY':
                case 'SECONDARY':
                    $node->type = $type;
                    break;
                default:
                    throw new Exceptions\DomainError(sprintf(
                        Lang::translate('Value [%s] for Node::type is not valid'), 
                        $type
                    ));
            }
        }

        if ($weight !== null) {
            if (is_integer($weight)) {
                $node->weight = $weight;
            } else {
                throw new Exceptions\DomainError(sprintf(
                    Lang::translate('Value [%s] for Node::weight must be integer'), 
                    $weight
                ));
            }
        }

        $this->nodes[] = $node;
    }

    /**
     * adds queued nodes to the load balancer
     *
     * In many cases, Nodes will be added to the Load Balancer when it is
     * created (via the `Create()` method), but this method is provided when
     * a set of Nodes needs to be added after the fact.
     *
     * @api
     * @return HttpResponse
     */
    public function AddNodes() 
    {
        if (count($this->nodes) < 1) {
            throw new Exceptions\MissingValueError(
                Lang::translate('Cannot add nodes; no nodes are defined')
            );
        }

        // iterate through all the nodes
        foreach($this->nodes as $node) {
            $resp = $node->Create();
        }

        return $resp;
    }

    /**
     * adds a virtual IP to the load balancer
     *
     * You can use the strings `'PUBLIC'` or `'SERVICENET`' to indicate the
     * public or internal networks, or you can pass the `Id` of an existing
     * IP address.
     *
     * @api
     * @param string $id either 'public' or 'servicenet' or an ID of an
     *      existing IP address
     * @param integer $ipVersion either null, 4, or 6 (both, IPv4, or IPv6)
     * @return void
     */
    public function AddVirtualIp($type = 'PUBLIC', $ipVersion = NULL) 
    {
        $object = new \stdClass();

        /**
         * check for PUBLIC or SERVICENET
         */
        switch(strtoupper($type)) {
            case 'PUBLIC':
            case 'SERVICENET':
                $object->type = strtoupper($type);
                break;
            default:
                $object->id = $type;
                break;
        }

        if ($ipVersion) {
            switch($ipVersion) {
                case 4:
                    $object->version = 'IPV4';
                    break;
                case 6:
                    $object->version = 'IPV6';
                    break;
                default:
                    throw new Exceptions\DomainError(sprintf(
                        Lang::translate('Value [%s] for ipVersion is not valid'), 
                        $ipVersion
                    ));
            }
        }

        /**
         * If the load balancer exists, we want to add it immediately.
         * If not, we add it to the virtualIps list and add it when the load
         * balancer is created.
         */
        if ($this->Id()) {
            $virtualIp = $this->VirtualIp();
            $virtualIp->type = $type;
            $virtualIp->ipVersion = $object->version;
            $http = $virtualIp->Create();
            $this->Debug('AddVirtualIp:response [%s]', $http->HttpBody());
            return $http;
        } else {
            // queue it
            $this->virtualIps[] = $object;
        }

        return true;
    }

    /**
     * returns a Node object
     */
    public function Node($id = null) 
    {
        return new Resources\Node($this, $id);
    }

    /**
     * returns a Collection of Nodes
     */
    public function NodeList() 
    {
        return $this->Parent()->Collection('\OpenCloud\LoadBalancer\Resources\Node', null, $this);
    }

    /**
     * returns a NodeEvent object
     */
    public function NodeEvent() 
    {
        return new Resources\NodeEvent($this);
    }

    /**
     * returns a Collection of NodeEvents
     */
    public function NodeEventList() 
    {
        return $this->Parent()->Collection('\OpenCloud\LoadBalancer\Resources\NodeEvent', null, $this);
    }

    /**
     * returns a single Virtual IP (not called publicly)
     */
    public function VirtualIp($data = null) 
    {
        return new Resources\VirtualIp($this, $data);
    }

    /**
     * returns  a Collection of Virtual Ips
     */
    public function VirtualIpList() 
    {
        return $this->Service()->Collection('\OpenCloud\LoadBalancer\Resources\VirtualIp', null, $this);
    }

    /**
     */
    public function SessionPersistence() 
    {
        return new Resources\SessionPersistence($this);
    }

    /**
     * returns the load balancer's error page object
     *
     * @api
     * @return ErrorPage
     */
    public function ErrorPage() 
    {
        return new Resources\ErrorPage($this);
    }

    /**
     * returns the load balancer's health monitor object
     *
     * @api
     * @return HealthMonitor
     */
    public function HealthMonitor() 
    {
        return new Resources\HealthMonitor($this);
    }

    /**
     * returns statistics on the load balancer operation
     *
     * cannot be created, updated, or deleted
     *
     * @api
     * @return Stats
     */
    public function Stats() 
    {
        return new Resources\Stats($this);
    }

    /**
     */
    public function Usage() 
    {
        return new Resources\Usage($this);
    }

    /**
     */
    public function Access($data = null) 
    {
        return new Resources\Access($this, $data);
    }

    /**
     */
    public function AccessList() 
    {
        return $this->Service()->Collection('\OpenCloud\LoadBalancer\Resources\Access', null, $this);
    }

    /**
     */
    public function ConnectionThrottle() 
    {
        return new Resources\ConnectionThrottle($this);
    }

    /**
     */
    public function ConnectionLogging() 
    {
        return new Resources\ConnectionLogging($this);
    }

    /**
     */
    public function ContentCaching() 
    {
        return new Resources\ContentCaching($this);
    }

    /**
     */
    public function SSLTermination() 
    {
        return new Resources\SSLTermination($this);
    }

    /**
     */
    public function Metadata($data = null) 
    {
        return new Resources\Metadata($this, $data);
    }

    /**
     */
    public function MetadataList() 
    {
        return $this->Service()->Collection('\OpenCloud\LoadBalancer\Resources\Metadata', null, $this);
    }

    /**
     * returns the JSON object for Create()
     *
     * @return stdClass
     */
    protected function CreateJson() 
    {
        $object = new \stdClass();
        $elem = $this->JsonName();
        $object->$elem = new \stdClass();

        // set the properties
        foreach ($this->_create_keys as $key) {
            if ($key == 'nodes') {
                foreach ($this->$key as $node) {
                    $nodeObject = new \stdClass();
                    foreach ($node as $nodeKey => $nodeValue) {
                        if ($nodeValue !== null) {
                            $nodeObject->$nodeKey = $nodeValue;
                        }
                    }
                    $object->$elem->nodes[] = $nodeObject;
                }
            } elseif ($this->$key !== null) {
                $object->$elem->$key = $this->$key;
            }
        }

        return $object;
    }

}
