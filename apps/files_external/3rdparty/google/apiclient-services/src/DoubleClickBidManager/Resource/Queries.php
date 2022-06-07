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

use Google\Service\DoubleClickBidManager\ListQueriesResponse;
use Google\Service\DoubleClickBidManager\Query;
use Google\Service\DoubleClickBidManager\Report;
use Google\Service\DoubleClickBidManager\RunQueryRequest;

/**
 * The "queries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $doubleclickbidmanagerService = new Google\Service\DoubleClickBidManager(...);
 *   $queries = $doubleclickbidmanagerService->queries;
 *  </code>
 */
class Queries extends \Google\Service\Resource
{
  /**
   * Creates a query. (queries.create)
   *
   * @param Query $postBody
   * @param array $optParams Optional parameters.
   * @return Query
   */
  public function create(Query $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Query::class);
  }
  /**
   * Deletes a stored query as well as the associated stored reports.
   * (queries.delete)
   *
   * @param string $queryId Required. Query ID to delete.
   * @param array $optParams Optional parameters.
   */
  public function delete($queryId, $optParams = [])
  {
    $params = ['queryId' => $queryId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Retrieves a stored query. (queries.get)
   *
   * @param string $queryId Required. Query ID to retrieve.
   * @param array $optParams Optional parameters.
   * @return Query
   */
  public function get($queryId, $optParams = [])
  {
    $params = ['queryId' => $queryId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Query::class);
  }
  /**
   * Retrieves stored queries. (queries.listQueries)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string orderBy Name of a field used to order results. The default
   * sorting order is ascending. To specify descending order for a field, append a
   * " desc" suffix. For example "metadata.title desc". Sorting is only supported
   * for the following fields: * queryId * metadata.title
   * @opt_param int pageSize Maximum number of results per page. Must be between
   * `1` and `100`. Defaults to `100` if unspecified.
   * @opt_param string pageToken A page token, received from a previous list call.
   * Provide this to retrieve the subsequent page of queries.
   * @return ListQueriesResponse
   */
  public function listQueries($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListQueriesResponse::class);
  }
  /**
   * Runs a stored query to generate a report. (queries.run)
   *
   * @param string $queryId Required. Query ID to run.
   * @param RunQueryRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool synchronous Whether the query should be run synchronously.
   * When true, this method will not return until the query has finished running.
   * When false or not specified, this method will return immediately.
   * @return Report
   */
  public function run($queryId, RunQueryRequest $postBody, $optParams = [])
  {
    $params = ['queryId' => $queryId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('run', [$params], Report::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Queries::class, 'Google_Service_DoubleClickBidManager_Resource_Queries');
