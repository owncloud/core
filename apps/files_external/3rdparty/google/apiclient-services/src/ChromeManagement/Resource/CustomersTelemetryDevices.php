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

use Google\Service\ChromeManagement\GoogleChromeManagementV1ListTelemetryDevicesResponse;

/**
 * The "devices" collection of methods.
 * Typical usage is:
 *  <code>
 *   $chromemanagementService = new Google\Service\ChromeManagement(...);
 *   $devices = $chromemanagementService->devices;
 *  </code>
 */
class CustomersTelemetryDevices extends \Google\Service\Resource
{
  /**
   * List all telemetry devices. (devices.listCustomersTelemetryDevices)
   *
   * @param string $parent Required. Customer id or "my_customer" to use the
   * customer associated to the account making the request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Only include resources that match the
   * filter. Supported filter fields: - org_unit_id - serial_number
   * @opt_param int pageSize Maximum number of results to return. Maximum and
   * default are 100.
   * @opt_param string pageToken Token to specify next page in the list.
   * @opt_param string readMask Required. Read mask to specify which fields to
   * return.
   * @return GoogleChromeManagementV1ListTelemetryDevicesResponse
   */
  public function listCustomersTelemetryDevices($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleChromeManagementV1ListTelemetryDevicesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomersTelemetryDevices::class, 'Google_Service_ChromeManagement_Resource_CustomersTelemetryDevices');
