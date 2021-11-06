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

namespace Google\Service\Calendar\Resource;

use Google\Service\Calendar\Channel;
use Google\Service\Calendar\Setting;
use Google\Service\Calendar\Settings as SettingsModel;

/**
 * The "settings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $calendarService = new Google\Service\Calendar(...);
 *   $settings = $calendarService->settings;
 *  </code>
 */
class Settings extends \Google\Service\Resource
{
  /**
   * Returns a single user setting. (settings.get)
   *
   * @param string $setting The id of the user setting.
   * @param array $optParams Optional parameters.
   * @return Setting
   */
  public function get($setting, $optParams = [])
  {
    $params = ['setting' => $setting];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Setting::class);
  }
  /**
   * Returns all user settings for the authenticated user. (settings.listSettings)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Maximum number of entries returned on one result
   * page. By default the value is 100 entries. The page size can never be larger
   * than 250 entries. Optional.
   * @opt_param string pageToken Token specifying which result page to return.
   * Optional.
   * @opt_param string syncToken Token obtained from the nextSyncToken field
   * returned on the last page of results from the previous list request. It makes
   * the result of this list request contain only entries that have changed since
   * then. If the syncToken expires, the server will respond with a 410 GONE
   * response code and the client should clear its storage and perform a full
   * synchronization without any syncToken. Learn more about incremental
   * synchronization. Optional. The default is to return all entries.
   * @return SettingsModel
   */
  public function listSettings($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], SettingsModel::class);
  }
  /**
   * Watch for changes to Settings resources. (settings.watch)
   *
   * @param Channel $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Maximum number of entries returned on one result
   * page. By default the value is 100 entries. The page size can never be larger
   * than 250 entries. Optional.
   * @opt_param string pageToken Token specifying which result page to return.
   * Optional.
   * @opt_param string syncToken Token obtained from the nextSyncToken field
   * returned on the last page of results from the previous list request. It makes
   * the result of this list request contain only entries that have changed since
   * then. If the syncToken expires, the server will respond with a 410 GONE
   * response code and the client should clear its storage and perform a full
   * synchronization without any syncToken. Learn more about incremental
   * synchronization. Optional. The default is to return all entries.
   * @return Channel
   */
  public function watch(Channel $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('watch', [$params], Channel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Settings::class, 'Google_Service_Calendar_Resource_Settings');
