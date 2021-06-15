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
 * The "reports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $chromemanagementService = new Google_Service_ChromeManagement(...);
 *   $reports = $chromemanagementService->reports;
 *  </code>
 */
class Google_Service_ChromeManagement_Resource_CustomersReports extends Google_Service_Resource
{
  /**
   * Generate report of installed Chrome versions. (reports.countChromeVersions)
   *
   * @param string $customer Required. Customer id or "my_customer" to use the
   * customer associated to the account making the request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Query string to filter results, AND-separated fields
   * in EBNF syntax. Note: OR operations are not supported in this filter.
   * Supported filter fields: * last_active_date
   * @opt_param string orgUnitId The ID of the organizational unit.
   * @opt_param int pageSize Maximum number of results to return. Maximum and
   * default are 100.
   * @opt_param string pageToken Token to specify the page of the request to be
   * returned.
   * @return Google_Service_ChromeManagement_GoogleChromeManagementV1CountChromeVersionsResponse
   */
  public function countChromeVersions($customer, $optParams = array())
  {
    $params = array('customer' => $customer);
    $params = array_merge($params, $optParams);
    return $this->call('countChromeVersions', array($params), "Google_Service_ChromeManagement_GoogleChromeManagementV1CountChromeVersionsResponse");
  }
  /**
   * Generate report of app installations. (reports.countInstalledApps)
   *
   * @param string $customer Required. Customer id or "my_customer" to use the
   * customer associated to the account making the request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Query string to filter results, AND-separated fields
   * in EBNF syntax. Note: OR operations are not supported in this filter.
   * Supported filter fields: * app_name * app_type * install_type *
   * number_of_permissions * total_install_count * latest_profile_active_date *
   * permission_name
   * @opt_param string orderBy Field used to order results. Supported order by
   * fields: * app_name * app_type * install_type * number_of_permissions *
   * total_install_count
   * @opt_param string orgUnitId The ID of the organizational unit.
   * @opt_param int pageSize Maximum number of results to return. Maximum and
   * default are 100.
   * @opt_param string pageToken Token to specify the page of the request to be
   * returned.
   * @return Google_Service_ChromeManagement_GoogleChromeManagementV1CountInstalledAppsResponse
   */
  public function countInstalledApps($customer, $optParams = array())
  {
    $params = array('customer' => $customer);
    $params = array_merge($params, $optParams);
    return $this->call('countInstalledApps', array($params), "Google_Service_ChromeManagement_GoogleChromeManagementV1CountInstalledAppsResponse");
  }
  /**
   * Generate report of devices that have a specified app installed.
   * (reports.findInstalledAppDevices)
   *
   * @param string $customer Required. Customer id or "my_customer" to use the
   * customer associated to the account making the request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string appId Unique identifier of the app. For Chrome apps and
   * extensions, the 32-character id (e.g. ehoadneljpdggcbbknedodolkkjodefl). For
   * Android apps, the package name (e.g. com.evernote).
   * @opt_param string appType Type of the app.
   * @opt_param string filter Query string to filter results, AND-separated fields
   * in EBNF syntax. Note: OR operations are not supported in this filter.
   * Supported filter fields: * last_active_date
   * @opt_param string orderBy Field used to order results. Supported order by
   * fields: * machine * device_id
   * @opt_param string orgUnitId The ID of the organizational unit.
   * @opt_param int pageSize Maximum number of results to return. Maximum and
   * default are 100.
   * @opt_param string pageToken Token to specify the page of the request to be
   * returned.
   * @return Google_Service_ChromeManagement_GoogleChromeManagementV1FindInstalledAppDevicesResponse
   */
  public function findInstalledAppDevices($customer, $optParams = array())
  {
    $params = array('customer' => $customer);
    $params = array_merge($params, $optParams);
    return $this->call('findInstalledAppDevices', array($params), "Google_Service_ChromeManagement_GoogleChromeManagementV1FindInstalledAppDevicesResponse");
  }
}
