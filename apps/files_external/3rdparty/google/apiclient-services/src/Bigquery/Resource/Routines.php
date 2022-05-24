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

use Google\Service\Bigquery\ListRoutinesResponse;
use Google\Service\Bigquery\Routine;

/**
 * The "routines" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigqueryService = new Google\Service\Bigquery(...);
 *   $routines = $bigqueryService->routines;
 *  </code>
 */
class Routines extends \Google\Service\Resource
{
  /**
   * Deletes the routine specified by routineId from the dataset.
   * (routines.delete)
   *
   * @param string $projectId Required. Project ID of the routine to delete
   * @param string $datasetId Required. Dataset ID of the routine to delete
   * @param string $routineId Required. Routine ID of the routine to delete
   * @param array $optParams Optional parameters.
   */
  public function delete($projectId, $datasetId, $routineId, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'datasetId' => $datasetId, 'routineId' => $routineId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets the specified routine resource by routine ID. (routines.get)
   *
   * @param string $projectId Required. Project ID of the requested routine
   * @param string $datasetId Required. Dataset ID of the requested routine
   * @param string $routineId Required. Routine ID of the requested routine
   * @param array $optParams Optional parameters.
   *
   * @opt_param string readMask If set, only the Routine fields in the field mask
   * are returned in the response. If unset, all Routine fields are returned.
   * @return Routine
   */
  public function get($projectId, $datasetId, $routineId, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'datasetId' => $datasetId, 'routineId' => $routineId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Routine::class);
  }
  /**
   * Creates a new routine in the dataset. (routines.insert)
   *
   * @param string $projectId Required. Project ID of the new routine
   * @param string $datasetId Required. Dataset ID of the new routine
   * @param Routine $postBody
   * @param array $optParams Optional parameters.
   * @return Routine
   */
  public function insert($projectId, $datasetId, Routine $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'datasetId' => $datasetId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Routine::class);
  }
  /**
   * Lists all routines in the specified dataset. Requires the READER dataset
   * role. (routines.listRoutines)
   *
   * @param string $projectId Required. Project ID of the routines to list
   * @param string $datasetId Required. Dataset ID of the routines to list
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter If set, then only the Routines matching this filter
   * are returned. The current supported form is either "routine_type:" or
   * "routineType:", where is a RoutineType enum. Example:
   * "routineType:SCALAR_FUNCTION".
   * @opt_param string maxResults The maximum number of results to return in a
   * single response page. Leverage the page tokens to iterate through the entire
   * collection.
   * @opt_param string pageToken Page token, returned by a previous call, to
   * request the next page of results
   * @opt_param string readMask If set, then only the Routine fields in the field
   * mask, as well as project_id, dataset_id and routine_id, are returned in the
   * response. If unset, then the following Routine fields are returned: etag,
   * project_id, dataset_id, routine_id, routine_type, creation_time,
   * last_modified_time, and language.
   * @return ListRoutinesResponse
   */
  public function listRoutines($projectId, $datasetId, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'datasetId' => $datasetId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListRoutinesResponse::class);
  }
  /**
   * Updates information in an existing routine. The update method replaces the
   * entire Routine resource. (routines.update)
   *
   * @param string $projectId Required. Project ID of the routine to update
   * @param string $datasetId Required. Dataset ID of the routine to update
   * @param string $routineId Required. Routine ID of the routine to update
   * @param Routine $postBody
   * @param array $optParams Optional parameters.
   * @return Routine
   */
  public function update($projectId, $datasetId, $routineId, Routine $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'datasetId' => $datasetId, 'routineId' => $routineId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Routine::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Routines::class, 'Google_Service_Bigquery_Resource_Routines');
