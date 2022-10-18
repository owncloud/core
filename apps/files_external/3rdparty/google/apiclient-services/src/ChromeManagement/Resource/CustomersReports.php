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

namespace Google\Service\ChromeManagement\Resource;

use Google\Service\ChromeManagement\GoogleChromeManagementV1CountChromeDevicesReachingAutoExpirationDateResponse;
use Google\Service\ChromeManagement\GoogleChromeManagementV1CountChromeDevicesThatNeedAttentionResponse;
use Google\Service\ChromeManagement\GoogleChromeManagementV1CountChromeHardwareFleetDevicesResponse;
use Google\Service\ChromeManagement\GoogleChromeManagementV1CountChromeVersionsResponse;
use Google\Service\ChromeManagement\GoogleChromeManagementV1CountInstalledAppsResponse;
use Google\Service\ChromeManagement\GoogleChromeManagementV1FindInstalledAppDevicesResponse;

/**
 * The "reports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $chromemanagementService = new Google\Service\ChromeManagement(...);
 *   $reports = $chromemanagementService->reports;
 *  </code>
 */
class CustomersReports extends \Google\Service\Resource
{
  /**
   * Generate report of the number of devices expiring in each month of the
   * selected time frame. Devices are grouped by auto update expiration date and
   * model. Further information can be found
   * [here](https://support.google.com/chrome/a/answer/10564947).
   * (reports.countChromeDevicesReachingAutoExpirationDate)
   *
   * @param string $customer Required. The customer ID or "my_customer" prefixed
   * with "customers/".
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxAueDate Optional. Maximum expiration date in format
   * yyyy-mm-dd in UTC timezone. If included returns all devices that have already
   * expired and devices with auto expiration date equal to or earlier than the
   * maximum date.
   * @opt_param string minAueDate Optional. Maximum expiration date in format
   * yyyy-mm-dd in UTC timezone. If included returns all devices that have already
   * expired and devices with auto expiration date equal to or later than the
   * minimum date.
   * @opt_param string orgUnitId Optional. The organizational unit ID, if omitted,
   * will return data for all organizational units.
   * @return GoogleChromeManagementV1CountChromeDevicesReachingAutoExpirationDateResponse
   */
  public function countChromeDevicesReachingAutoExpirationDate($customer, $optParams = [])
  {
    $params = ['customer' => $customer];
    $params = array_merge($params, $optParams);
    return $this->call('countChromeDevicesReachingAutoExpirationDate', [$params], GoogleChromeManagementV1CountChromeDevicesReachingAutoExpirationDateResponse::class);
  }
  /**
   * Counts of ChromeOS devices that have not synced policies or have lacked user
   * activity in the past 28 days, are out of date, or are not complaint. Further
   * information can be found here
   * https://support.google.com/chrome/a/answer/10564947
   * (reports.countChromeDevicesThatNeedAttention)
   *
   * @param string $customer Required. The customer ID or "my_customer" prefixed
   * with "customers/".
   * @param array $optParams Optional parameters.
   *
   * @opt_param string orgUnitId Optional. The ID of the organizational unit. If
   * omitted, all data will be returned.
   * @opt_param string readMask Required. Mask of the fields that should be
   * populated in the returned report.
   * @return GoogleChromeManagementV1CountChromeDevicesThatNeedAttentionResponse
   */
  public function countChromeDevicesThatNeedAttention($customer, $optParams = [])
  {
    $params = ['customer' => $customer];
    $params = array_merge($params, $optParams);
    return $this->call('countChromeDevicesThatNeedAttention', [$params], GoogleChromeManagementV1CountChromeDevicesThatNeedAttentionResponse::class);
  }
  /**
   * Counts of devices with a specific hardware specification from the requested
   * hardware type (for example model name, processor type). Further information
   * can be found here https://support.google.com/chrome/a/answer/10564947
   * (reports.countChromeHardwareFleetDevices)
   *
   * @param string $customer Required. The customer ID or "my_customer".
   * @param array $optParams Optional parameters.
   *
   * @opt_param string orgUnitId Optional. The ID of the organizational unit. If
   * omitted, all data will be returned.
   * @opt_param string readMask Required. Mask of the fields that should be
   * populated in the returned report.
   * @return GoogleChromeManagementV1CountChromeHardwareFleetDevicesResponse
   */
  public function countChromeHardwareFleetDevices($customer, $optParams = [])
  {
    $params = ['customer' => $customer];
    $params = array_merge($params, $optParams);
    return $this->call('countChromeHardwareFleetDevices', [$params], GoogleChromeManagementV1CountChromeHardwareFleetDevicesResponse::class);
  }
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
   * @return GoogleChromeManagementV1CountChromeVersionsResponse
   */
  public function countChromeVersions($customer, $optParams = [])
  {
    $params = ['customer' => $customer];
    $params = array_merge($params, $optParams);
    return $this->call('countChromeVersions', [$params], GoogleChromeManagementV1CountChromeVersionsResponse::class);
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
   * @return GoogleChromeManagementV1CountInstalledAppsResponse
   */
  public function countInstalledApps($customer, $optParams = [])
  {
    $params = ['customer' => $customer];
    $params = array_merge($params, $optParams);
    return $this->call('countInstalledApps', [$params], GoogleChromeManagementV1CountInstalledAppsResponse::class);
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
   * @return GoogleChromeManagementV1FindInstalledAppDevicesResponse
   */
  public function findInstalledAppDevices($customer, $optParams = [])
  {
    $params = ['customer' => $customer];
    $params = array_merge($params, $optParams);
    return $this->call('findInstalledAppDevices', [$params], GoogleChromeManagementV1FindInstalledAppDevicesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomersReports::class, 'Google_Service_ChromeManagement_Resource_CustomersReports');
