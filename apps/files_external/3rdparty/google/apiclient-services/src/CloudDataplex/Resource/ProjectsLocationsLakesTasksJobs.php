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

namespace Google\Service\CloudDataplex\Resource;

use Google\Service\CloudDataplex\DataplexEmpty;
use Google\Service\CloudDataplex\GoogleCloudDataplexV1CancelJobRequest;
use Google\Service\CloudDataplex\GoogleCloudDataplexV1Job;
use Google\Service\CloudDataplex\GoogleCloudDataplexV1ListJobsResponse;

/**
 * The "jobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataplexService = new Google\Service\CloudDataplex(...);
 *   $jobs = $dataplexService->jobs;
 *  </code>
 */
class ProjectsLocationsLakesTasksJobs extends \Google\Service\Resource
{
  /**
   * Cancel jobs running for the task resource. (jobs.cancel)
   *
   * @param string $name Required. The resource name of the job: projects/{project
   * _number}/locations/{location_id}/lakes/{lake_id}/task/{task_id}/job/{job_id}.
   * @param GoogleCloudDataplexV1CancelJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return DataplexEmpty
   */
  public function cancel($name, GoogleCloudDataplexV1CancelJobRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('cancel', [$params], DataplexEmpty::class);
  }
  /**
   * Get job resource. (jobs.get)
   *
   * @param string $name Required. The resource name of the job: projects/{project
   * _number}/locations/{location_id}/lakes/{lake_id}/tasks/{task_id}/jobs/{job_id
   * }.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDataplexV1Job
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudDataplexV1Job::class);
  }
  /**
   * Lists Jobs under the given task. (jobs.listProjectsLocationsLakesTasksJobs)
   *
   * @param string $parent Required. The resource name of the parent environment:
   * projects/{project_number}/locations/{location_id}/lakes/{lake_id}/tasks/{task
   * _id}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. Maximum number of jobs to return. The
   * service may return fewer than this value. If unspecified, at most 10 jobs
   * will be returned. The maximum value is 1000; values above 1000 will be
   * coerced to 1000.
   * @opt_param string pageToken Optional. Page token received from a previous
   * ListJobs call. Provide this to retrieve the subsequent page. When paginating,
   * all other parameters provided to ListJobs must match the call that provided
   * the page token.
   * @return GoogleCloudDataplexV1ListJobsResponse
   */
  public function listProjectsLocationsLakesTasksJobs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDataplexV1ListJobsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsLakesTasksJobs::class, 'Google_Service_CloudDataplex_Resource_ProjectsLocationsLakesTasksJobs');
