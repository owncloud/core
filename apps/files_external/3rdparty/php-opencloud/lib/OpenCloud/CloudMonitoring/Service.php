<?php

namespace OpenCloud\CloudMonitoring;

use OpenCloud\OpenStack;
use OpenCloud\Common\Service as AbstractService;

/**
 * The Rackspace Cloud Monitoring service.
 *
 * @copyright 2012-2013 Rackspace Hosting, Inc.
 *      See COPYING for licensing information
 * @package phpOpenCloud
 * @version 1.0
 * @author  Jamie Hannaford <jamie@limetree.org>
 * @extends AbstractService
 */
class Service extends AbstractService
{

    /**
     * Cloud Monitoring resources.
     * 
     * @var     mixed
     * @access  private
     */
    private $resources = array(
        'Account',
        'Agent',
        'AgentConnection',
        'AgentHost',
        'AgentHostInfo',
        'AgentTarget',
        'AgentToken',
        'Alarm',
        'Changelog',
        'Check',
        'CheckType',
        'Entity',
        'Metric',
        'Notification',
        'NotificationHistory',
        'NotificationPlan',
        'NotificationType',
        'View',
        'Zone'
    );

	/**
	 * Main service constructor.
	 * 
	 * @access public
	 * @param OpenStack $connection
	 * @param mixed $serviceName
	 * @param mixed $serviceRegion
	 * @param mixed $urlType
	 * @return void
	 */
	public function __construct(OpenStack $connection, $serviceName, $serviceRegion, $urlType) 
	{
		parent::__construct(
            $connection,
            'rax:monitor',
            $serviceName,
            $serviceRegion,
            $urlType
        );
	}

    /**
     * getResources function.
     * 
     * @access public
     * @return void
     */
    public function getResources()
    {
        return $this->resources;
    }

    /**
     * Factory method for instantiating resource objects.
     * 
     * @access public
     * @param string $resourceName
     * @param mixed $info (default: null)
     * @return void
     */
    public function resource($resourceName, $info = null)
    {
        $className = __NAMESPACE__ . '\\Resource\\' . ucfirst($resourceName);

        if (!class_exists($className)) {
            throw new Exception\ServiceException(sprintf(
                '%s resource does not exist, please try one of the following: %s',
                $resourceName,
                implode(', ', $this->getResources())
            ));
        }
        
        return new $className($this, $info);
    }
    

    /**
     * Request function.
     * 
     * @access  public
     * @param   string $url
     * @param   string $method (default: 'GET')
     * @param   array $headers (default: array())
     * @param   mixed $body (default: null)
     * @return  void
     */
    public function Request(
        $url, 
        $method = 'GET', 
        array $headers = array(), 
        $body = null
    ) {
        $headers['X-Auth-Token'] = $this->conn->Token();

        if ($tenant = $this->conn->Tenant()) {
            $headers['X-Auth-Project-Id'] = $tenant;
        }

        if (is_string($body)) {
            $headers['Content-type'] = 'application/json';
        }

        return $this->conn->Request($url, $method, $headers, $body);
    }

}