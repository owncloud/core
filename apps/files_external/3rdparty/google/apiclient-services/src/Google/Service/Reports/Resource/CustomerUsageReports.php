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
 * The "customerUsageReports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Reports(...);
 *   $customerUsageReports = $adminService->customerUsageReports;
 *  </code>
 */
class Google_Service_Reports_Resource_CustomerUsageReports extends Google_Service_Resource
{
  /**
   * Retrieves a report which is a collection of properties and statistics for a
   * specific customer's account. For more information, see the Customers Usage
   * Report guide. For more information about the customer report's parameters,
   * see the Customers Usage parameters reference guides.
   * (customerUsageReports.get)
   *
   * @param string $date Represents the date the usage occurred. The timestamp is
   * in the ISO 8601 format, yyyy-mm-dd. We recommend you use your account's time
   * zone for this.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customerId The unique ID of the customer to retrieve data
   * for.
   * @opt_param string pageToken Token to specify next page. A report with
   * multiple pages has a nextPageToken property in the response. For your follow-
   * on requests getting all of the report's pages, enter the nextPageToken value
   * in the pageToken query string.
   * @opt_param string parameters The parameters query string is a comma-separated
   * list of event parameters that refine a report's results. The parameter is
   * associated with a specific application. The application values for the
   * Customers usage report include accounts, app_maker, apps_scripts, calendar,
   * classroom, cros, docs, gmail, gplus, device_management, meet, and sites. A
   * parameters query string is in the CSV form of app_name1:param_name1,
   * app_name2:param_name2. Note: The API doesn't accept multiple values of a
   * parameter. If a particular parameter is supplied more than once in the API
   * request, the API only accepts the last value of that request parameter. In
   * addition, if an invalid request parameter is supplied in the API request, the
   * API ignores that request parameter and returns the response corresponding to
   * the remaining valid request parameters.
   *
   * An example of an invalid request parameter is one that does not belong to the
   * application. If no parameters are requested, all parameters are returned.
   * @return Google_Service_Reports_UsageReports
   */
  public function get($date, $optParams = array())
  {
    $params = array('date' => $date);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Reports_UsageReports");
  }
}
