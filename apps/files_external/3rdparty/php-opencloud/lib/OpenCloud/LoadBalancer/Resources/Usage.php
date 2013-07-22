<?php

namespace OpenCloud\LoadBalancer\Resources;

/**
 * used to get usage data for a load balancer
 */
class Usage extends Readonly 
{
    
    public $id;
    public $averageNumConnections;
    public $incomingTransfer;
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
