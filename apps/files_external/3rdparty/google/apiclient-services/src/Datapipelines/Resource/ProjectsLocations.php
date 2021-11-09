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

namespace Google\Service\Datapipelines\Resource;

use Google\Service\Datapipelines\GoogleCloudDatapipelinesV1ListPipelinesResponse;

/**
 * The "locations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datapipelinesService = new Google\Service\Datapipelines(...);
 *   $locations = $datapipelinesService->locations;
 *  </code>
 */
class ProjectsLocations extends \Google\Service\Resource
{
  /**
   * Lists pipelines. Returns a "NOT_FOUND" error if the list is empty. Returns a
   * "FORBIDDEN" error if the caller doesn't have permission to access it.
   * (locations.listPipelines)
   *
   * @param string $parent Required. The location name. For example:
   * `projects/PROJECT_ID/locations/LOCATION_ID`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter An expression for filtering the results of the
   * request. If unspecified, all pipelines will be returned. Multiple filters can
   * be applied and must be comma separated. Fields eligible for filtering are: +
   * `type`: The type of the pipeline (streaming or batch). Allowed values are
   * `ALL`, `BATCH`, and `STREAMING`. + `executor_type`: The type of pipeline
   * execution layer. This is always Dataflow for now, but more executors may be
   * added later. Allowed values are `ALL` and `DATAFLOW`. + `status`: The
   * activity status of the pipeline. Allowed values are `ALL`, `ACTIVE`,
   * `ARCHIVED`, and `PAUSED`. For example, to limit results to active batch
   * processing pipelines: type:BATCH,status:ACTIVE
   * @opt_param int pageSize The maximum number of entities to return. The service
   * may return fewer than this value, even if there are additional pages. If
   * unspecified, the max limit is yet to be determined by the backend
   * implementation.
   * @opt_param string pageToken A page token, received from a previous
   * `ListPipelines` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListPipelines` must match the
   * call that provided the page token.
   * @return GoogleCloudDatapipelinesV1ListPipelinesResponse
   */
  public function listPipelines($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('listPipelines', [$params], GoogleCloudDatapipelinesV1ListPipelinesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocations::class, 'Google_Service_Datapipelines_Resource_ProjectsLocations');
