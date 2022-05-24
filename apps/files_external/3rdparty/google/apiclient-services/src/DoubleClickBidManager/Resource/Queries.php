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
   * Creates a query. (queries.createquery)
   *
   * @param Query $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool asynchronous If true, tries to run the query asynchronously.
   * Only applicable when the frequency is ONE_TIME.
   * @return Query
   */
  public function createquery(Query $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('createquery', [$params], Query::class);
  }
  /**
   * Deletes a stored query as well as the associated stored reports.
   * (queries.deletequery)
   *
   * @param string $queryId Query ID to delete.
   * @param array $optParams Optional parameters.
   */
  public function deletequery($queryId, $optParams = [])
  {
    $params = ['queryId' => $queryId];
    $params = array_merge($params, $optParams);
    return $this->call('deletequery', [$params]);
  }
  /**
   * Retrieves a stored query. (queries.getquery)
   *
   * @param string $queryId Query ID to retrieve.
   * @param array $optParams Optional parameters.
   * @return Query
   */
  public function getquery($queryId, $optParams = [])
  {
    $params = ['queryId' => $queryId];
    $params = array_merge($params, $optParams);
    return $this->call('getquery', [$params], Query::class);
  }
  /**
   * Retrieves stored queries. (queries.listqueries)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of results per page. Must be between 1
   * and 100. Defaults to 100 if unspecified.
   * @opt_param string pageToken Optional pagination token.
   * @return ListQueriesResponse
   */
  public function listqueries($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('listqueries', [$params], ListQueriesResponse::class);
  }
  /**
   * Runs a stored query to generate a report. (queries.runquery)
   *
   * @param string $queryId Query ID to run.
   * @param RunQueryRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool asynchronous If true, tries to run the query asynchronously.
   */
  public function runquery($queryId, RunQueryRequest $postBody, $optParams = [])
  {
    $params = ['queryId' => $queryId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('runquery', [$params]);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Queries::class, 'Google_Service_DoubleClickBidManager_Resource_Queries');
