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

namespace Google\Service\MyBusinessNotificationSettings\Resource;

use Google\Service\MyBusinessNotificationSettings\NotificationSetting;

/**
 * The "accounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessnotificationsService = new Google\Service\MyBusinessNotificationSettings(...);
 *   $accounts = $mybusinessnotificationsService->accounts;
 *  </code>
 */
class Accounts extends \Google\Service\Resource
{
  /**
   * Returns the pubsub notification settings for the account.
   * (accounts.getNotificationSetting)
   *
   * @param string $name Required. The resource name of the notification setting
   * we are trying to fetch.
   * @param array $optParams Optional parameters.
   * @return NotificationSetting
   */
  public function getNotificationSetting($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getNotificationSetting', [$params], NotificationSetting::class);
  }
  /**
   * Sets the pubsub notification setting for the account informing Google which
   * topic to send pubsub notifications for. Use the notification_types field
   * within notification_setting to manipulate the events an account wants to
   * subscribe to. An account will only have one notification setting resource,
   * and only one pubsub topic can be set. To delete the setting, update with an
   * empty notification_types (accounts.updateNotificationSetting)
   *
   * @param string $name Required. The resource name this setting is for. This is
   * of the form `accounts/{account_id}/notificationSetting`.
   * @param NotificationSetting $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The specific fields that should be
   * updated. The only editable field is notification_setting.
   * @return NotificationSetting
   */
  public function updateNotificationSetting($name, NotificationSetting $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateNotificationSetting', [$params], NotificationSetting::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Accounts::class, 'Google_Service_MyBusinessNotificationSettings_Resource_Accounts');
