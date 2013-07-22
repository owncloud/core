<?php

namespace OpenCloud\CloudMonitoring\Resource;

use OpenCloud\CloudMonitoring\Exception;

/**
 * NotificationHistory class.
 * 
 * @extends ReadOnlyResource
 * @implements ResourceInterface
 */
class NotificationHistory extends ReadOnlyResource implements ResourceInterface
{
    public $timestamp;
    public $notification_plan_id;
    public $transaction_id;
    public $status;
    public $state;
    public $notification_results;
    public $previous_state;
    
    protected static $json_name = 'notification_history';
    protected static $json_collection_name = 'values';
    protected static $url_resource = 'notification_history';

    public function baseUrl()
    {
        return $this->Parent()->Url($this->Parent()->id) . '/notification_history';
    }

    public function listChecks()
    {
        $response = $this->Service()->Request($this->Url());
        if ($json = $response->HttpBody()) {
            return json_decode($json);
        }
        return false;
    }
    
    public function listHistory($checkId)
    {
        return $this->Service()->Collection(get_class($this), $this->Url($checkId));
    }

    public function getSingleHistoryItem($checkId, $historyId)
    {
        $response = $this->Service()->Request($this->Url($checkId . '/' . $historyId));
        if ($json = $response->HttpBody()) {
            $object = json_decode($json);
            foreach ($object as $key => $val) {
                $this->$key = $val;
            }
        }
        return false;
    }

}