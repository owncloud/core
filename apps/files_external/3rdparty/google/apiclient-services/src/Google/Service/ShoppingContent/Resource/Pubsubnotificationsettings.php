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

/**
 * The "pubsubnotificationsettings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $pubsubnotificationsettings = $contentService->pubsubnotificationsettings;
 *  </code>
 */
class Google_Service_ShoppingContent_Resource_Pubsubnotificationsettings extends Google_Service_Resource
{
  /**
   * Retrieves a Merchant Center account's pubsub notification settings.
   * (pubsubnotificationsettings.get)
   *
   * @param string $merchantId The ID of the account for which to get pubsub
   * notification settings.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_PubsubNotificationSettings
   */
  public function get($merchantId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ShoppingContent_PubsubNotificationSettings");
  }
  /**
   * Register a Merchant Center account for pubsub notifications. Note that cloud
   * topic name should not be provided as part of the request.
   * (pubsubnotificationsettings.update)
   *
   * @param string $merchantId The ID of the account.
   * @param Google_Service_ShoppingContent_PubsubNotificationSettings $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_PubsubNotificationSettings
   */
  public function update($merchantId, Google_Service_ShoppingContent_PubsubNotificationSettings $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_ShoppingContent_PubsubNotificationSettings");
  }
}
