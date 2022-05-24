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

namespace Google\Service\ShoppingContent\Resource;

use Google\Service\ShoppingContent\PubsubNotificationSettings as PubsubNotificationSettingsModel;

/**
 * The "pubsubnotificationsettings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google\Service\ShoppingContent(...);
 *   $pubsubnotificationsettings = $contentService->pubsubnotificationsettings;
 *  </code>
 */
class Pubsubnotificationsettings extends \Google\Service\Resource
{
  /**
   * Retrieves a Merchant Center account's pubsub notification settings.
   * (pubsubnotificationsettings.get)
   *
   * @param string $merchantId The ID of the account for which to get pubsub
   * notification settings.
   * @param array $optParams Optional parameters.
   * @return PubsubNotificationSettingsModel
   */
  public function get($merchantId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], PubsubNotificationSettingsModel::class);
  }
  /**
   * Register a Merchant Center account for pubsub notifications. Note that cloud
   * topic name shouldn't be provided as part of the request.
   * (pubsubnotificationsettings.update)
   *
   * @param string $merchantId The ID of the account.
   * @param PubsubNotificationSettingsModel $postBody
   * @param array $optParams Optional parameters.
   * @return PubsubNotificationSettingsModel
   */
  public function update($merchantId, PubsubNotificationSettingsModel $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], PubsubNotificationSettingsModel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Pubsubnotificationsettings::class, 'Google_Service_ShoppingContent_Resource_Pubsubnotificationsettings');
