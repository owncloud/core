<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\CloudMonitoring;

use OpenCloud\Common\Service\CatalogService;

/**
 * Cloud Monitoring service.
 *
 * @package OpenCloud\CloudMonitoring
 * @link    http://docs.rackspace.com/cm/api/v1.0/cm-devguide/content/index.html
 */
class Service extends CatalogService
{
    const DEFAULT_TYPE = 'rax:monitor';
    const DEFAULT_NAME = 'cloudMonitoring';

    protected $regionless = true;

    /**
     * @var array CloudMonitoring resources.
     */
    protected $resources = array(
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
     * Get an agent.
     *
     * @param string|null $id
     * @return \OpenCloud\CloudMonitoring\Resource\Agent
     */
    public function getAgent($id = null)
    {
        return $this->resource('Agent', $id);
    }

    public function getAgents()
    {
        return $this->resourceList('Agent');
    }

    public function getAgentHost($id = null)
    {
        return $this->resource('AgentHost', $id);
    }

    public function getAgentTargets()
    {
        return $this->resourceList('AgentTarget');
    }

    public function getAgentToken($id = null)
    {
        return $this->resource('AgentToken', $id);
    }

    public function getAgentTokens()
    {
        return $this->resourceList('AgentToken');
    }

    /**
     * Return a collection of Entities.
     *
     * @return \OpenCloud\Common\Collection
     */
    public function getEntities()
    {
        return $this->resourceList('Entity');
    }

    public function createEntity(array $params)
    {
        return $this->getEntity()->create($params);
    }

    /**
     * Get either an empty object, or a populated one that exists on the API.
     *
     * @param null $id
     * @return \OpenCloud\CloudMonitoring\Resource\Entity
     */
    public function getEntity($id = null)
    {
        return $this->resource('Entity', $id);
    }

    /**
     * Get a collection of possible check types.
     *
     * @return \OpenCloud\Common\Collection
     */
    public function getCheckTypes()
    {
        return $this->resourceList('CheckType');
    }

    /**
     * Get a particular check type.
     *
     * @param null $id
     * @return \OpenCloud\CloudMonitoring\Resource\CheckType
     */
    public function getCheckType($id = null)
    {
        return $this->resource('CheckType', $id);
    }

    /**
     * Create a new notification.
     *
     * @param array $params
     * @return
     */
    public function createNotification(array $params)
    {
        return $this->getNotification($params)->create();
    }

    /**
     * Test the parameters of a notification before creating it.
     *
     * @param array $params
     * @return mixed
     */
    public function testNotification(array $params)
    {
        return $this->getNotification()->testParams($params);
    }

    /**
     * Get a particular notification.
     *
     * @param null $id
     * @return \OpenCloud\CloudMonitoring\Resource\Notification
     */
    public function getNotification($id = null)
    {
        return $this->resource('Notification', $id);
    }

    /**
     * Get a collection of Notifications.
     *
     * @return \OpenCloud\Common\Collection
     */
    public function getNotifications()
    {
        return $this->resourceList('Notification');
    }

    /**
     * Create a new notification plan.
     *
     * @param array $params
     * @return mixed
     */
    public function createNotificationPlan(array $params)
    {
        return $this->getNotificationPlan()->create($params);
    }

    /**
     * Get a particular notification plan.
     *
     * @param null $id
     * @return \OpenCloud\CloudMonitoring\Resource\NotificationPlan
     */
    public function getNotificationPlan($id = null)
    {
        return $this->resource('NotificationPlan', $id);
    }

    /**
     * Get a collection of notification plans.
     *
     * @return \OpenCloud\Common\Collection
     */
    public function getNotificationPlans()
    {
        return $this->resourceList('NotificationPlan');
    }

    /**
     * Get a particular notification type.
     *
     * @param null $id
     * @return \OpenCloud\CloudMonitoring\Resource\NotificationType
     */
    public function getNotificationType($id = null)
    {
        return $this->resource('NotificationType', $id);
    }

    /**
     * Get a collection of notification types.
     *
     * @return \OpenCloud\Common\Collection
     */
    public function getNotificationTypes()
    {
        return $this->resourceList('NotificationType');
    }

    /**
     * Get a collection of monitoring zones.
     *
     * @return \OpenCloud\Common\Collection
     */
    public function getMonitoringZones()
    {
        return $this->resourceList('Zone');
    }

    /**
     * Get a particular monitoring zone.
     *
     * @param null $id
     * @return \OpenCloud\CloudMonitoring\Resource\Zone
     */
    public function getMonitoringZone($id = null)
    {
        return $this->resource('Zone', $id);
    }

    /**
     * Get a changelog - either a general one or one catered for a particular entity.
     *
     * @param string|null $data
     * @return object|false
     */
    public function getChangelog($data = null)
    {
        // Cater for Collections
        if (is_object($data)) {
            return $this->resource('Changelog', $data);
        }

        $url = $this->resource('Changelog')->getUrl();

        if ($data) {
            $url->setQuery(array('entityId' => (string) $data));
        }

        return $this->resourceList('Changelog', $url);
    }

    /**
     * @return object|false
     */
    public function getViews()
    {
        return $this->resourceList('View');
    }

}