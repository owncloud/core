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
 * The "entityUsageReports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Reports(...);
 *   $entityUsageReports = $adminService->entityUsageReports;
 *  </code>
 */
class Google_Service_Reports_Resource_EntityUsageReports extends Google_Service_Resource
{
  /**
   * Retrieves a report which is a collection of properties and statistics for
   * entities used by users within the account. For more information, see the
   * Entities Usage Report guide. For more information about the entities report's
   * parameters, see the Entities Usage parameters reference guides.
   * (entityUsageReports.get)
   *
   * @param string $entityType Represents the type of entity for the report.
   * @param string $entityKey Represents the key of the object to filter the data
   * with.
   * @param string $date Represents the date the usage occurred. The timestamp is
   * in the ISO 8601 format, yyyy-mm-dd. We recommend you use your account's time
   * zone for this.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customerId The unique ID of the customer to retrieve data
   * for.
   * @opt_param string filters The filters query string is a comma-separated list
   * of an application's event parameters where the parameter's value is
   * manipulated by a relational operator. The filters query string includes the
   * name of the application whose usage is returned in the report. The
   * application values for the Entities usage report include accounts, docs, and
   * gmail. Filters are in the form [application name]:[parameter name][relational
   * operator][parameter value],....
   *
   * In this example, the <> 'not equal to' operator is URL-encoded in the
   * request's query string (%3C%3E): GET https://www.googleapis.com/admin/reports
   * /v1/usage/gplus_communities/all/dates/2017-12-01
   * ?parameters=gplus:community_name,gplus:num_total_members
   * =gplus:num_total_members>0
   *
   * The relational operators include:   - == - 'equal to'.  - <> - 'not equal
   * to'. It is URL-encoded (%3C%3E).  - < - 'less than'. It is URL-encoded (%3C).
   * - <= - 'less than or equal to'. It is URL-encoded (%3C=).  - > - 'greater
   * than'. It is URL-encoded (%3E).  - >= - 'greater than or equal to'. It is
   * URL-encoded (%3E=).  Filters can only be applied to numeric parameters.
   * @opt_param string maxResults Determines how many activity records are shown
   * on each response page. For example, if the request sets maxResults=1 and the
   * report has two activities, the report has two pages. The response's
   * nextPageToken property has the token to the second page.
   * @opt_param string pageToken Token to specify next page. A report with
   * multiple pages has a nextPageToken property in the response. In your follow-
   * on request getting the next page of the report, enter the nextPageToken value
   * in the pageToken query string.
   * @opt_param string parameters The parameters query string is a comma-separated
   * list of event parameters that refine a report's results. The parameter is
   * associated with a specific application. The application values for the
   * Entities usage report are only gplus. A parameter query string is in the CSV
   * form of [app_name1:param_name1], [app_name2:param_name2].... Note: The API
   * doesn't accept multiple values of a parameter. If a particular parameter is
   * supplied more than once in the API request, the API only accepts the last
   * value of that request parameter. In addition, if an invalid request parameter
   * is supplied in the API request, the API ignores that request parameter and
   * returns the response corresponding to the remaining valid request parameters.
   *
   * An example of an invalid request parameter is one that does not belong to the
   * application. If no parameters are requested, all parameters are returned.
   * @return Google_Service_Reports_UsageReports
   */
  public function get($entityType, $entityKey, $date, $optParams = array())
  {
    $params = array('entityType' => $entityType, 'entityKey' => $entityKey, 'date' => $date);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Reports_UsageReports");
  }
}
