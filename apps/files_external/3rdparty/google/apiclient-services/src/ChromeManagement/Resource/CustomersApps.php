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

use Google\Service\ChromeManagement\GoogleChromeManagementV1CountChromeAppRequestsResponse;

/**
 * The "apps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $chromemanagementService = new Google\Service\ChromeManagement(...);
 *   $apps = $chromemanagementService->apps;
 *  </code>
 */
class CustomersApps extends \Google\Service\Resource
{
  /**
   * Generate summary of app installation requests. (apps.countChromeAppRequests)
   *
   * @param string $customer Required. Customer id or "my_customer" to use the
   * customer associated to the account making the request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string orderBy Field used to order results. Supported fields: *
   * request_count * latest_request_time
   * @opt_param string orgUnitId The ID of the organizational unit.
   * @opt_param int pageSize Maximum number of results to return. Maximum and
   * default are 50, anything above will be coerced to 50.
   * @opt_param string pageToken Token to specify the page of the request to be
   * returned.
   * @return GoogleChromeManagementV1CountChromeAppRequestsResponse
   */
  public function countChromeAppRequests($customer, $optParams = [])
  {
    $params = ['customer' => $customer];
    $params = array_merge($params, $optParams);
    return $this->call('countChromeAppRequests', [$params], GoogleChromeManagementV1CountChromeAppRequestsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomersApps::class, 'Google_Service_ChromeManagement_Resource_CustomersApps');
