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

namespace Google\Service\CloudDeploy\Resource;

use Google\Service\CloudDeploy\JobRun;
use Google\Service\CloudDeploy\ListJobRunsResponse;

/**
 * The "jobRuns" collection of methods.
 * Typical usage is:
 *  <code>
 *   $clouddeployService = new Google\Service\CloudDeploy(...);
 *   $jobRuns = $clouddeployService->jobRuns;
 *  </code>
 */
class ProjectsLocationsDeliveryPipelinesReleasesRolloutsJobRuns extends \Google\Service\Resource
{
  /**
   * Gets details of a single JobRun. (jobRuns.get)
   *
   * @param string $name Required. Name of the `JobRun`. Format must be projects/{
   * project_id}/locations/{location_name}/deliveryPipelines/{pipeline_name}/relea
   * ses/{release_name}/rollouts/{rollout_name}/jobRuns/{job_run_name}.
   * @param array $optParams Optional parameters.
   * @return JobRun
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], JobRun::class);
  }
  /**
   * Lists JobRuns in a given project and location.
   * (jobRuns.listProjectsLocationsDeliveryPipelinesReleasesRolloutsJobRuns)
   *
   * @param string $parent Required. The `Rollout` which owns this collection of
   * `JobRun` objects.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Filter results to be returned. See
   * https://google.aip.dev/160 for more details.
   * @opt_param string orderBy Optional. Field to sort by. See
   * https://google.aip.dev/132#ordering for more details.
   * @opt_param int pageSize Optional. The maximum number of `JobRun` objects to
   * return. The service may return fewer than this value. If unspecified, at most
   * 50 `JobRun` objects will be returned. The maximum value is 1000; values above
   * 1000 will be set to 1000.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * `ListJobRuns` call. Provide this to retrieve the subsequent page. When
   * paginating, all other provided parameters match the call that provided the
   * page token.
   * @return ListJobRunsResponse
   */
  public function listProjectsLocationsDeliveryPipelinesReleasesRolloutsJobRuns($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListJobRunsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsDeliveryPipelinesReleasesRolloutsJobRuns::class, 'Google_Service_CloudDeploy_Resource_ProjectsLocationsDeliveryPipelinesReleasesRolloutsJobRuns');
