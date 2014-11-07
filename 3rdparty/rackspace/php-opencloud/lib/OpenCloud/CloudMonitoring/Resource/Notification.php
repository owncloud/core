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

use OpenCloud\Common\Http\Message\Formatter;

/**
 * Notification class.
 */
class Notification extends AbstractResource
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string Friendly name for the notification.
     */
    private $label;

    /**
     * @var string|NotificationType The notification type to send.
     */
    private $type;

    /**
     * @var array A hash of notification specific details based on the notification type.
     */
    private $details;
    
    protected static $json_name = false;
    protected static $json_collection_name = 'values';
    protected static $url_resource = 'notifications';
    
    protected static $emptyObject = array(
        'label',
        'type',
        'details'
    );

    protected static $requiredKeys = array(
        'type',
        'details'
    );
    
    protected $associatedResources = array(
        'NotificationType' => 'NotificationType'
    );
        
    public function testUrl($debug = false)
    {
        return $this->getService()->getUrl('test-notification');
    }
    
    public function test($debug = false)
    {
        $response = $this->getService()
            ->getClient()
            ->post($this->testUrl($debug))
            ->send();

        return Formatter::decode($response);
    }
    
}