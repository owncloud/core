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

namespace Google\Service\Indexing\Resource;

use Google\Service\Indexing\PublishUrlNotificationResponse;
use Google\Service\Indexing\UrlNotification;
use Google\Service\Indexing\UrlNotificationMetadata;

/**
 * The "urlNotifications" collection of methods.
 * Typical usage is:
 *  <code>
 *   $indexingService = new Google\Service\Indexing(...);
 *   $urlNotifications = $indexingService->urlNotifications;
 *  </code>
 */
class UrlNotifications extends \Google\Service\Resource
{
  /**
   * Gets metadata about a Web Document. This method can _only_ be used to query
   * URLs that were previously seen in successful Indexing API notifications.
   * Includes the latest `UrlNotification` received via this API.
   * (urlNotifications.getMetadata)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string url URL that is being queried.
   * @return UrlNotificationMetadata
   */
  public function getMetadata($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('getMetadata', [$params], UrlNotificationMetadata::class);
  }
  /**
   * Notifies that a URL has been updated or deleted. (urlNotifications.publish)
   *
   * @param UrlNotification $postBody
   * @param array $optParams Optional parameters.
   * @return PublishUrlNotificationResponse
   */
  public function publish(UrlNotification $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('publish', [$params], PublishUrlNotificationResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UrlNotifications::class, 'Google_Service_Indexing_Resource_UrlNotifications');
