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
 * Reports all usage for a Load Balancer recorded within the preceding 24 hours.
 */
class Usage extends Readonly 
{
    
    public $id;
    public $averageNumConnections;
    
    /**
     * Incoming transfer in bytes.
     * 
     * @var int 
     */
    public $incomingTransfer;
    
    /**
     * Outgoing transfer in bytes.
     * 
     * @var int 
     */
    public $outgoingTransfer;
    public $averageNumConnectionsSsl;
    public $incomingTransferSsl;
    public $outgoingTransferSsl;
    public $numVips;
    public $numPolls;
    public $startTime;
    public $endTime;
    public $vipType;
    public $sslMode;
    public $eventType;

    protected static $json_name = 'loadBalancerUsageRecord';
    protected static $url_resource = 'usage';

}
