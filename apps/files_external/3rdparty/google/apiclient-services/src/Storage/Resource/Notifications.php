<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Storage\Resource;

use Google\Service\Storage\Notification;
use Google\Service\Storage\Notifications as NotificationsModel;

/**
 * The "notifications" collection of methods.
 * Typical usage is:
 *  <code>
 *   $storageService = new Google\Service\Storage(...);
 *   $notifications = $storageService->notifications;
 *  </code>
 */
class Notifications extends \Google\Service\Resource
{
  /**
   * Permanently deletes a notification subscription. (notifications.delete)
   *
   * @param string $bucket The parent bucket of the notification.
   * @param string $notification ID of the notification to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   */
  public function delete($bucket, $notification, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'notification' => $notification];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * View a notification configuration. (notifications.get)
   *
   * @param string $bucket The parent bucket of the notification.
   * @param string $notification Notification ID
   * @param array $optParams Optional parameters.
   *
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return Notification
   */
  public function get($bucket, $notification, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'notification' => $notification];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Notification::class);
  }
  /**
   * Creates a notification subscription for a given bucket.
   * (notifications.insert)
   *
   * @param string $bucket The parent bucket of the notification.
   * @param Notification $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return Notification
   */
  public function insert($bucket, Notification $postBody, $optParams = [])
  {
    $params = ['bucket' => $bucket, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Notification::class);
  }
  /**
   * Retrieves a list of notification subscriptions for a given bucket.
   * (notifications.listNotifications)
   *
   * @param string $bucket Name of a Google Cloud Storage bucket.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string provisionalUserProject The project to be billed for this
   * request if the target bucket is requester-pays bucket.
   * @opt_param string userProject The project to be billed for this request.
   * Required for Requester Pays buckets.
   * @return NotificationsModel
   */
  public function listNotifications($bucket, $optParams = [])
  {
    $params = ['bucket' => $bucket];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], NotificationsModel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Notifications::class, 'Google_Service_Storage_Resource_Notifications');
