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
 * NotificationHistory class.
 */
class NotificationHistory extends ReadOnlyResource
{
    private $id;
    private $timestamp;
    private $notification_plan_id;
    private $transaction_id;
    private $status;
    private $state;
    private $notification_results;
    private $previous_state;
    
    protected static $json_name = false;
    protected static $json_collection_name = 'values';
    protected static $url_resource = 'notification_history';

    public function listChecks()
    {
        $response = $this->getClient()->get($this->url())->send();
        return Formatter::decode($response);
    }
    
    public function listHistory($checkId)
    {
        return $this->getService()->collection(get_class(), $this->url($checkId));
    }

    public function getSingleHistoryItem($checkId, $historyId)
    {
        $url = $this->url($checkId . '/' . $historyId);
        $response = $this->getClient()->get($url)->send();
        
        if (null !== ($decoded = Formatter::decode($response))) {
            $this->populate($decoded);
        }

        return false;
    }

}