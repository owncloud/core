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
 * All load balancers must define the protocol of the service which is being 
 * load balanced. The protocol selection should be based on the protocol of the 
 * back-end nodes. When configuring a load balancer, the default port for the 
 * given protocol will be selected unless otherwise specified.
 * 
 * @link http://docs.rackspace.com/loadbalancers/api/v1.0/clb-devguide/content/List_Load_Balancing_Protocols-d1e4269.html
 */
class Protocol extends Readonly 
{

    public $name;
    public $port;
    protected static $json_name = 'protocol';
    protected static $url_resource = 'loadbalancers/protocols';

}
