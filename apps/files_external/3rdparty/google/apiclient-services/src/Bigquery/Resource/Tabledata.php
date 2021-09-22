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

namespace Google\Service\Bigquery\Resource;

use Google\Service\Bigquery\TableDataInsertAllRequest;
use Google\Service\Bigquery\TableDataInsertAllResponse;
use Google\Service\Bigquery\TableDataList;

/**
 * The "tabledata" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigqueryService = new Google\Service\Bigquery(...);
 *   $tabledata = $bigqueryService->tabledata;
 *  </code>
 */
class Tabledata extends \Google\Service\Resource
{
  /**
   * Streams data into BigQuery one record at a time without needing to run a load
   * job. Requires the WRITER dataset role. (tabledata.insertAll)
   *
   * @param string $projectId Project ID of the destination table.
   * @param string $datasetId Dataset ID of the destination table.
   * @param string $tableId Table ID of the destination table.
   * @param TableDataInsertAllRequest $postBody
   * @param array $optParams Optional parameters.
   * @return TableDataInsertAllResponse
   */
  public function insertAll($projectId, $datasetId, $tableId, TableDataInsertAllRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'datasetId' => $datasetId, 'tableId' => $tableId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insertAll', [$params], TableDataInsertAllResponse::class);
  }
  /**
   * Retrieves table data from a specified set of rows. Requires the READER
   * dataset role. (tabledata.listTabledata)
   *
   * @param string $projectId Project ID of the table to read
   * @param string $datasetId Dataset ID of the table to read
   * @param string $tableId Table ID of the table to read
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults Maximum number of results to return
   * @opt_param string pageToken Page token, returned by a previous call,
   * identifying the result set
   * @opt_param string selectedFields List of fields to return (comma-separated).
   * If unspecified, all fields are returned
   * @opt_param string startIndex Zero-based index of the starting row to read
   * @return TableDataList
   */
  public function listTabledata($projectId, $datasetId, $tableId, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'datasetId' => $datasetId, 'tableId' => $tableId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], TableDataList::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Tabledata::class, 'Google_Service_Bigquery_Resource_Tabledata');
