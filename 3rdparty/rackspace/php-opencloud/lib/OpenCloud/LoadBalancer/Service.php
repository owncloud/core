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

namespace OpenCloud\LoadBalancer;

use OpenCloud\Common\Service\NovaService;
use OpenCloud\OpenStack;

/**
 * The Rackspace Cloud Load Balancers
 */
class Service extends NovaService
{
    const DEFAULT_NAME = 'cloudLoadBalancers';
    const DEFAULT_TYPE = 'rax:load-balancer';

    /**
     * creates a new LoadBalancer object
     *
     * @api
     * @param string $id the identifier of the load balancer
     * @return Resource\LoadBalancer
     */
    public function loadBalancer($id = null) 
    {
        return new Resource\LoadBalancer($this, $id);
    }

    /**
     * returns a Collection of LoadBalancer objects
     *
     * @api
     * @param boolean $detail if TRUE (the default), then all details are
     *      returned; otherwise, the minimal set (ID, name) are retrieved
     * @param array $filter if provided, a set of key/value pairs that are
     *      set as query string parameters to the query
     * @return \OpenCloud\Common\Collection
     */
    public function loadBalancerList($detail = true, $filter = array()) 
    {
        return $this->collection('OpenCloud\LoadBalancer\Resource\LoadBalancer');
    }

    /**
     * creates a new BillableLoadBalancer object (read-only)
     *
     * @api
     * @param string $id the identifier of the load balancer
     * @return Resource\LoadBalancer
     */
    public function billableLoadBalancer($id = null) 
    {
        return new Resource\BillableLoadBalancer($this, $id);
    }

    /**
     * returns a Collection of BillableLoadBalancer objects
     *
     * @api
     * @param boolean $detail if TRUE (the default), then all details are
     *      returned; otherwise, the minimal set (ID, name) are retrieved
     * @param array $filter if provided, a set of key/value pairs that are
     *      set as query string parameters to the query
     * @return \OpenCloud\Common\Collection
     */
    public function billableLoadBalancerList($detail = true, $filter = array()) 
    {
        $class = 'OpenCloud\LoadBalancer\Resource\BillableLoadBalancer';
        $url = $this->url($class::ResourceName(), $filter);
        return $this->collection($class, $url);
    }

    /**
     * returns allowed domain
     *
     * @api
     * @param mixed $data either an array of values or null
     * @return Resource\AllowedDomain
     */
    public function allowedDomain($data = null) 
    {
        return new Resource\AllowedDomain($this, $data);
    }

    /**
     * returns Collection of AllowedDomain object
     *
     * @api
     * @return Collection
     */
    public function allowedDomainList() 
    {
        return $this->collection('OpenCloud\LoadBalancer\Resource\AllowedDomain', null, $this);
    }

    /**
     * single protocol (should never be called directly)
     *
     * Convenience method to be used by the ProtocolList Collection.
     *
     * @return Resource\Protocol
     */
    public function protocol($data = null) 
    {
        return new Resource\Protocol($this, $data);
    }

    /**
     * a list of Protocol objects
     *
     * @api
     * @return \OpenCloud\Common\Collection
     */
    public function protocolList() 
    {
        return $this->collection('OpenCloud\LoadBalancer\Resource\Protocol', null, $this);
    }

    /**
     * single algorithm (should never be called directly)
     *
     * convenience method used by the Collection factory
     *
     * @return Resource\Algorithm
     */
    public function algorithm($data = null) 
    {
        return new Resource\Algorithm($this, $data);
    }

    /**
     * a list of Algorithm objects
     *
     * @api
     * @return \OpenCloud\Common\Collection
     */
    public function algorithmList() 
    {
        return $this->collection('OpenCloud\LoadBalancer\Resource\Algorithm', null, $this);
    }

}
