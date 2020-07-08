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
 * The "indexes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datastoreService = new Google_Service_Datastore(...);
 *   $indexes = $datastoreService->indexes;
 *  </code>
 */
class Google_Service_Datastore_Resource_ProjectsIndexes extends Google_Service_Resource
{
  /**
   * Creates the specified index. A newly created index's initial state is
   * `CREATING`. On completion of the returned google.longrunning.Operation, the
   * state will be `READY`. If the index already exists, the call will return an
   * `ALREADY_EXISTS` status.
   *
   * During index creation, the process could result in an error, in which case
   * the index will move to the `ERROR` state. The process can be recovered by
   * fixing the data that caused the error, removing the index with delete, then
   * re-creating the index with create.
   *
   * Indexes with a single property cannot be created. (indexes.create)
   *
   * @param string $projectId Project ID against which to make the request.
   * @param Google_Service_Datastore_GoogleDatastoreAdminV1Index $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Datastore_GoogleLongrunningOperation
   */
  public function create($projectId, Google_Service_Datastore_GoogleDatastoreAdminV1Index $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Datastore_GoogleLongrunningOperation");
  }
  /**
   * Deletes an existing index. An index can only be deleted if it is in a `READY`
   * or `ERROR` state. On successful execution of the request, the index will be
   * in a `DELETING` state. And on completion of the returned
   * google.longrunning.Operation, the index will be removed.
   *
   * During index deletion, the process could result in an error, in which case
   * the index will move to the `ERROR` state. The process can be recovered by
   * fixing the data that caused the error, followed by calling delete again.
   * (indexes.delete)
   *
   * @param string $projectId Project ID against which to make the request.
   * @param string $indexId The resource ID of the index to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Datastore_GoogleLongrunningOperation
   */
  public function delete($projectId, $indexId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'indexId' => $indexId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Datastore_GoogleLongrunningOperation");
  }
  /**
   * Gets an index. (indexes.get)
   *
   * @param string $projectId Project ID against which to make the request.
   * @param string $indexId The resource ID of the index to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Datastore_GoogleDatastoreAdminV1Index
   */
  public function get($projectId, $indexId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'indexId' => $indexId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Datastore_GoogleDatastoreAdminV1Index");
  }
  /**
   * Lists the indexes that match the specified filters.  Datastore uses an
   * eventually consistent query to fetch the list of indexes and may occasionally
   * return stale results. (indexes.listProjectsIndexes)
   *
   * @param string $projectId Project ID against which to make the request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter
   * @opt_param string pageToken The next_page_token value returned from a
   * previous List request, if any.
   * @opt_param int pageSize The maximum number of items to return.  If zero, then
   * all results will be returned.
   * @return Google_Service_Datastore_GoogleDatastoreAdminV1ListIndexesResponse
   */
  public function listProjectsIndexes($projectId, $optParams = array())
  {
    $params = array('projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Datastore_GoogleDatastoreAdminV1ListIndexesResponse");
  }
}
