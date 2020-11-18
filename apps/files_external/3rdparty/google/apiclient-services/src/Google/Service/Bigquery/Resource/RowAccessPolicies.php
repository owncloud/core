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
 * The "rowAccessPolicies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigqueryService = new Google_Service_Bigquery(...);
 *   $rowAccessPolicies = $bigqueryService->rowAccessPolicies;
 *  </code>
 */
class Google_Service_Bigquery_Resource_RowAccessPolicies extends Google_Service_Resource
{
  /**
   * Lists all row access policies on the specified table.
   * (rowAccessPolicies.listRowAccessPolicies)
   *
   * @param string $projectId Required. Project ID of the row access policies to
   * list.
   * @param string $datasetId Required. Dataset ID of row access policies to list.
   * @param string $tableId Required. Table ID of the table to list row access
   * policies.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of results to return in a single
   * response page. Leverage the page tokens to iterate through the entire
   * collection.
   * @opt_param string pageToken Page token, returned by a previous call, to
   * request the next page of results.
   * @return Google_Service_Bigquery_ListRowAccessPoliciesResponse
   */
  public function listRowAccessPolicies($projectId, $datasetId, $tableId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'datasetId' => $datasetId, 'tableId' => $tableId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Bigquery_ListRowAccessPoliciesResponse");
  }
}
