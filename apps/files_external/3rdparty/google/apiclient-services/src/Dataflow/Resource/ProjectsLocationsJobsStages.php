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

namespace Google\Service\Dataflow\Resource;

use Google\Service\Dataflow\StageExecutionDetails;

/**
 * The "stages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataflowService = new Google\Service\Dataflow(...);
 *   $stages = $dataflowService->stages;
 *  </code>
 */
class ProjectsLocationsJobsStages extends \Google\Service\Resource
{
  /**
   * Request detailed information about the execution status of a stage of the
   * job. EXPERIMENTAL. This API is subject to change or removal without notice.
   * (stages.getExecutionDetails)
   *
   * @param string $projectId A project id.
   * @param string $location The [regional endpoint]
   * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) that
   * contains the job specified by job_id.
   * @param string $jobId The job to get execution details for.
   * @param string $stageId The stage for which to fetch information.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string endTime Upper time bound of work items to include, by start
   * time.
   * @opt_param int pageSize If specified, determines the maximum number of work
   * items to return. If unspecified, the service may choose an appropriate
   * default, or may return an arbitrarily large number of results.
   * @opt_param string pageToken If supplied, this should be the value of
   * next_page_token returned by an earlier call. This will cause the next page of
   * results to be returned.
   * @opt_param string startTime Lower time bound of work items to include, by
   * start time.
   * @return StageExecutionDetails
   */
  public function getExecutionDetails($projectId, $location, $jobId, $stageId, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'location' => $location, 'jobId' => $jobId, 'stageId' => $stageId];
    $params = array_merge($params, $optParams);
    return $this->call('getExecutionDetails', [$params], StageExecutionDetails::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsJobsStages::class, 'Google_Service_Dataflow_Resource_ProjectsLocationsJobsStages');
