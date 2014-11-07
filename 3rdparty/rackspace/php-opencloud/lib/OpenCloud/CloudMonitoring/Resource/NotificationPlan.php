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

class NotificationPlan extends AbstractResource
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string Friendly name for the notification plan.
     */
    private $label;

    /**
     * @var array The notification list to send to when the state is CRITICAL.
     */
    private $critical_state;

    /**
     * @var array The notification list to send to when the state is OK.
     */
    private $ok_state;

    /**
     * @var array The notification list to send to when the state is WARNING.
     */
    private $warning_state;
	
    protected static $json_name = false;
    protected static $json_collection_name = 'values';
    protected static $url_resource = 'notification_plans';

    protected static $requiredKeys = array(
        'label'
    );
    
    protected static $emptyObject = array(
        'label',
        'critical_state',
        'ok_state',
        'warning_state'
    );

}