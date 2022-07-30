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

namespace Google\Service\DoubleClickBidManager\Resource;

use Google\Service\DoubleClickBidManager\ListReportsResponse;
use Google\Service\DoubleClickBidManager\Report;

/**
 * The "reports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $doubleclickbidmanagerService = new Google\Service\DoubleClickBidManager(...);
 *   $reports = $doubleclickbidmanagerService->reports;
 *  </code>
 */
class QueriesReports extends \Google\Service\Resource
{
  /**
   * Retrieves a report. (reports.get)
   *
   * @param string $queryId Required. ID of the query the report is associated
   * with.
   * @param string $reportId Required. ID of the report to retrieve.
   * @param array $optParams Optional parameters.
   * @return Report
   */
  public function get($queryId, $reportId, $optParams = [])
  {
    $params = ['queryId' => $queryId, 'reportId' => $reportId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Report::class);
  }
  /**
   * Lists reports associated with a query. (reports.listQueriesReports)
   *
   * @param string $queryId Required. ID of the query with which the reports are
   * associated.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string orderBy Name of a field used to order results. The default
   * sorting order is ascending. To specify descending order for a field, append a
   * " desc" suffix. For example "key.reportId desc". Sorting is only supported
   * for the following fields: * `key.reportId`
   * @opt_param int pageSize Maximum number of results per page. Must be between
   * `1` and `100`. Defaults to `100` if unspecified.
   * @opt_param string pageToken A page token, received from a previous list call.
   * Provide this to retrieve the subsequent page of reports.
   * @return ListReportsResponse
   */
  public function listQueriesReports($queryId, $optParams = [])
  {
    $params = ['queryId' => $queryId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListReportsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QueriesReports::class, 'Google_Service_DoubleClickBidManager_Resource_QueriesReports');
