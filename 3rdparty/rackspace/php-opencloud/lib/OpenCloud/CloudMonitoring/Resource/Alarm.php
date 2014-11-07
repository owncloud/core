<?php
/**
 * PHP OpenCloud library.
 * 
 * @copyright 2014 Rackspace Hosting, Inc. See LICENSE for information.
 * @license   https://www.apache.org/licenses/LICENSE-2.0
 * @author    Glen Campbell <glen.campbell@rackspace.com>
 * @author    Jamie Hannaford <jamie.hannaford@rackspace.com>
 */

namespace OpenCloud\CloudMonitoring\Resource;

use OpenCloud\CloudMonitoring\Exception;
use OpenCloud\Common\Http\Message\Formatter;

/**
 * Alarm class.
 */
class Alarm extends AbstractResource
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string The ID of the check to alert on.
     */
    private $check_id;

    /**
     * @var string The id of the notification plan to execute when the state changes.
     */
    private $notification_plan_id;

    /**
     * @var string The alarm DSL for describing alerting conditions and their output states.
     */
    private $criteria;

    /**
     * @var bool Disable processing and alerts on this alarm.
     */
    private $disabled;

    /**
     * @var string A friendly label for an alarm.
     */
    private $label;
	
    protected static $json_name = false;
    protected static $json_collection_name = 'values';
    protected static $url_resource = 'alarms';
    
    protected static $requiredKeys = array(
        'check_id',
        'notification_plan_id'
    );
    
    protected static $emptyObject = array(
        'check_id',
        'notification_plan_id',
        'criteria',
        'disabled',
        'label',
        'metadata'
    );
    
    public function test($params = array(), $debug = false)
    {
        if (!isset($params['criteria'])) {
            throw new Exception\AlarmException(
                'Please specify a "criteria" value'
            );
        }
        
        if (!isset($params['check_data']) || !is_array($params['check_data'])) {
            throw new Exception\AlarmException(
                'Please specify a "check_data" array'
            );
        }
        
        $url  = $this->getParent()->url('test-alarm');
        $body = json_encode((object) $params);

        $response = $this->getService()
            ->getClient()
            ->post($url, self::getJsonHeader(), $body)
            ->send();

        return Formatter::decode($response);
    }

    public function getHistoryUrl()
    {
        return $this->getUrl()->addPath(NotificationHistory::resourceName());
    }

    public function getRecordedChecks()
    {
        $response = $this->getService()
            ->getClient()
            ->get($this->getHistoryUrl())
            ->send();

        $body = Formatter::decode($response);

        return (isset($body->check_ids)) ? $body->check_ids : false;
    }

    public function getNotificationHistoryForCheck($checkId)
    {
        $url = $this->getHistoryUrl()->addPath($checkId);
        return $this->getService()->resourceList('NotificationHistory', $url, $this);
    }

    public function getNotificationHistoryItem($checkId, $uuid)
    {
        $resource = $this->getService()->resource('NotificationHistory', null, $this);

        $url = clone $resource->getUrl();
        $url->addPath($checkId)->addPath($uuid);
        $resource->refresh(null, $url);

        return $resource;
    }

    public function notificationHistory($info)
    {
        return $this->getService()->resource('NotificationHistory', $info, $this);
    }

    public function isDisabled()
    {
        return $this->getDisabled() === true;
    }
	
}