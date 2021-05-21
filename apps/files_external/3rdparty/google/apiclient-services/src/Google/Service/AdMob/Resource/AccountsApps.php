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
 * The "apps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $admobService = new Google_Service_AdMob(...);
 *   $apps = $admobService->apps;
 *  </code>
 */
class Google_Service_AdMob_Resource_AccountsApps extends Google_Service_Resource
{
  /**
   * List the apps under the specified AdMob account. (apps.listAccountsApps)
   *
   * @param string $parent Required. Resource name of the account to list apps
   * for. Example: accounts/pub-9876543210987654
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of apps to return. If unspecified
   * or 0, at most 1000 apps will be returned. The maximum value is 10,000; values
   * above 10,000 will be coerced to 10,000.
   * @opt_param string pageToken The value returned by the last
   * `ListAppsResponse`; indicates that this is a continuation of a prior
   * `ListApps` call, and that the system should return the next page of data.
   * @return Google_Service_AdMob_ListAppsResponse
   */
  public function listAccountsApps($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdMob_ListAppsResponse");
  }
}
