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
 * The "userUsageReport" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Reports(...);
 *   $userUsageReport = $adminService->userUsageReport;
 *  </code>
 */
class Google_Service_Reports_Resource_UserUsageReport extends Google_Service_Resource
{
  /**
   * Retrieves a report which is a collection of properties and statistics for a
   * set of users with the account. For more information, see the User Usage
   * Report guide. For more information about the user report's parameters, see
   * the Users Usage parameters reference guides. (userUsageReport.get)
   *
   * @param string $userKey Represents the profile ID or the user email for which
   * the data should be filtered. Can be `all` for all information, or `userKey`
   * for a user's unique G Suite profile ID or their primary email address.
   * @param string $date Represents the date the usage occurred. The timestamp is
   * in the ISO 8601 format, yyyy-mm-dd. We recommend you use your account's time
   * zone for this.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customerId The unique ID of the customer to retrieve data
   * for.
   * @opt_param string filters The `filters` query string is a comma-separated
   * list of an application's event parameters where the parameter's value is
   * manipulated by a relational operator. The `filters` query string includes the
   * name of the application whose usage is returned in the report. The
   * application values for the Users Usage Report include `accounts`, `docs`, and
   * `gmail`. Filters are in the form `[application name]:parameter name[parameter
   * value],...`. In this example, the `<>` 'not equal to' operator is URL-encoded
   * in the request's query string (%3C%3E): GET
   * https://www.googleapis.com/admin/reports/v1/usage/users/all/dates/2013-03-03
   * ?parameters=accounts:last_login_time
   * =accounts:last_login_time%3C%3E2010-10-28T10:26:35.000Z The relational
   * operators include: - `==` - 'equal to'. - `<>` - 'not equal to'. It is URL-
   * encoded (%3C%3E). - `<` - 'less than'. It is URL-encoded (%3C). - `<=` -
   * 'less than or equal to'. It is URL-encoded (%3C=). - `>` - 'greater than'. It
   * is URL-encoded (%3E). - `>=` - 'greater than or equal to'. It is URL-encoded
   * (%3E=).
   * @opt_param string groupIdFilter Comma separated group ids (obfuscated) on
   * which user activities are filtered, i.e, the response will contain activities
   * for only those users that are a part of at least one of the group ids
   * mentioned here. Format: "id:abc123,id:xyz456"
   * @opt_param string maxResults Determines how many activity records are shown
   * on each response page. For example, if the request sets `maxResults=1` and
   * the report has two activities, the report has two pages. The response's
   * `nextPageToken` property has the token to the second page. The `maxResults`
   * query string is optional.
   * @opt_param string orgUnitID ID of the organizational unit to report on. User
   * activity will be shown only for users who belong to the specified
   * organizational unit. Data before Dec 17, 2018 doesn't appear in the filtered
   * results.
   * @opt_param string pageToken Token to specify next page. A report with
   * multiple pages has a `nextPageToken` property in the response. In your
   * follow-on request getting the next page of the report, enter the
   * `nextPageToken` value in the `pageToken` query string.
   * @opt_param string parameters The `parameters` query string is a comma-
   * separated list of event parameters that refine a report's results. The
   * parameter is associated with a specific application. The application values
   * for the Customers Usage report include `accounts`, `app_maker`,
   * `apps_scripts`, `calendar`, `classroom`, `cros`, `docs`, `gmail`, `gplus`,
   * `device_management`, `meet`, and `sites`. A `parameters` query string is in
   * the CSV form of `app_name1:param_name1, app_name2:param_name2`. *Note:* The
   * API doesn't accept multiple values of a parameter. If a particular parameter
   * is supplied more than once in the API request, the API only accepts the last
   * value of that request parameter. In addition, if an invalid request parameter
   * is supplied in the API request, the API ignores that request parameter and
   * returns the response corresponding to the remaining valid request parameters.
   * An example of an invalid request parameter is one that does not belong to the
   * application. If no parameters are requested, all parameters are returned.
   * @return Google_Service_Reports_UsageReports
   */
  public function get($userKey, $date, $optParams = array())
  {
    $params = array('userKey' => $userKey, 'date' => $date);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Reports_UsageReports");
  }
}
