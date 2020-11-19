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
 * The "queries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $apigeeService = new Google_Service_Apigee(...);
 *   $queries = $apigeeService->queries;
 *  </code>
 */
class Google_Service_Apigee_Resource_OrganizationsEnvironmentsQueries extends Google_Service_Resource
{
  /**
   * Submit a query to be processed in the background. If the submission of the
   * query succeeds, the API returns a 201 status and an ID that refer to the
   * query. In addition to the HTTP status 201, the `state` of "enqueued" means
   * that the request succeeded. (queries.create)
   *
   * @param string $parent Required. The parent resource name. Must be of the form
   * `organizations/{org}/environments/{env}`.
   * @param Google_Service_Apigee_GoogleCloudApigeeV1Query $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1AsyncQuery
   */
  public function create($parent, Google_Service_Apigee_GoogleCloudApigeeV1Query $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1AsyncQuery");
  }
  /**
   * Get query status If the query is still in progress, the `state` is set to
   * "running" After the query has completed successfully, `state` is set to
   * "completed" (queries.get)
   *
   * @param string $name Required. Name of the asynchronous query to get. Must be
   * of the form `organizations/{org}/environments/{env}/queries/{queryId}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1AsyncQuery
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1AsyncQuery");
  }
  /**
   * After the query is completed, use this API to retrieve the results. If the
   * request succeeds, and there is a non-zero result set, the result is
   * downloaded to the client as a zipped JSON file. The name of the downloaded
   * file will be: OfflineQueryResult-.zip Example: `OfflineQueryResult-
   * 9cfc0d85-0f30-46d6-ae6f-318d0cb961bd.zip` (queries.getResult)
   *
   * @param string $name Required. Name of the asynchronous query result to get.
   * Must be of the form
   * `organizations/{org}/environments/{env}/queries/{queryId}/result`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Apigee_GoogleApiHttpBody
   */
  public function getResult($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getResult', array($params), "Google_Service_Apigee_GoogleApiHttpBody");
  }
  /**
   * Return a list of Asynchronous Queries
   * (queries.listOrganizationsEnvironmentsQueries)
   *
   * @param string $parent Required. The parent resource name. Must be of the form
   * `organizations/{org}/environments/{env}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string dataset Filter response list by dataset. Example: `api`,
   * `mint`
   * @opt_param string submittedBy Filter response list by user who submitted
   * queries.
   * @opt_param string inclQueriesWithoutReport Flag to include asynchronous
   * queries that don't have a report denifition.
   * @opt_param string from Filter response list by returning asynchronous queries
   * that created after this date time. Time must be in ISO date-time format like
   * '2011-12-03T10:15:30Z'.
   * @opt_param string to Filter response list by returning asynchronous queries
   * that created before this date time. Time must be in ISO date-time format like
   * '2011-12-03T10:16:30Z'.
   * @opt_param string status Filter response list by asynchronous query status.
   * @return Google_Service_Apigee_GoogleCloudApigeeV1ListAsyncQueriesResponse
   */
  public function listOrganizationsEnvironmentsQueries($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Apigee_GoogleCloudApigeeV1ListAsyncQueriesResponse");
  }
}
