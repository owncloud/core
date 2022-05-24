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

use Google\Service\Datapipelines\GoogleCloudDatapipelinesV1ListJobsResponse;

/**
 * The "jobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datapipelinesService = new Google\Service\Datapipelines(...);
 *   $jobs = $datapipelinesService->jobs;
 *  </code>
 */
class ProjectsLocationsPipelinesJobs extends \Google\Service\Resource
{
  /**
   * Lists jobs for a given pipeline. Throws a "FORBIDDEN" error if the caller
   * doesn't have permission to access it.
   * (jobs.listProjectsLocationsPipelinesJobs)
   *
   * @param string $parent Required. The pipeline name. For example:
   * `projects/PROJECT_ID/locations/LOCATION_ID/pipelines/PIPELINE_ID`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of entities to return. The service
   * may return fewer than this value, even if there are additional pages. If
   * unspecified, the max limit will be determined by the backend implementation.
   * @opt_param string pageToken A page token, received from a previous `ListJobs`
   * call. Provide this to retrieve the subsequent page. When paginating, all
   * other parameters provided to `ListJobs` must match the call that provided the
   * page token.
   * @return GoogleCloudDatapipelinesV1ListJobsResponse
   */
  public function listProjectsLocationsPipelinesJobs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDatapipelinesV1ListJobsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsPipelinesJobs::class, 'Google_Service_Datapipelines_Resource_ProjectsLocationsPipelinesJobs');
