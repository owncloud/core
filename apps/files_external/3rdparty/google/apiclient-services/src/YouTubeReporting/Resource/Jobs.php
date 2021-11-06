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

namespace Google\Service\YouTubeReporting\Resource;

use Google\Service\YouTubeReporting\Job;
use Google\Service\YouTubeReporting\ListJobsResponse;
use Google\Service\YouTubeReporting\YoutubereportingEmpty;

/**
 * The "jobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $youtubereportingService = new Google\Service\YouTubeReporting(...);
 *   $jobs = $youtubereportingService->jobs;
 *  </code>
 */
class Jobs extends \Google\Service\Resource
{
  /**
   * Creates a job and returns it. (jobs.create)
   *
   * @param Job $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string onBehalfOfContentOwner The content owner's external ID on
   * which behalf the user is acting on. If not set, the user is acting for
   * himself (his own channel).
   * @return Job
   */
  public function create(Job $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Job::class);
  }
  /**
   * Deletes a job. (jobs.delete)
   *
   * @param string $jobId The ID of the job to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string onBehalfOfContentOwner The content owner's external ID on
   * which behalf the user is acting on. If not set, the user is acting for
   * himself (his own channel).
   * @return YoutubereportingEmpty
   */
  public function delete($jobId, $optParams = [])
  {
    $params = ['jobId' => $jobId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], YoutubereportingEmpty::class);
  }
  /**
   * Gets a job. (jobs.get)
   *
   * @param string $jobId The ID of the job to retrieve.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string onBehalfOfContentOwner The content owner's external ID on
   * which behalf the user is acting on. If not set, the user is acting for
   * himself (his own channel).
   * @return Job
   */
  public function get($jobId, $optParams = [])
  {
    $params = ['jobId' => $jobId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Job::class);
  }
  /**
   * Lists jobs. (jobs.listJobs)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool includeSystemManaged If set to true, also system-managed jobs
   * will be returned; otherwise only user-created jobs will be returned. System-
   * managed jobs can neither be modified nor deleted.
   * @opt_param string onBehalfOfContentOwner The content owner's external ID on
   * which behalf the user is acting on. If not set, the user is acting for
   * himself (his own channel).
   * @opt_param int pageSize Requested page size. Server may return fewer jobs
   * than requested. If unspecified, server will pick an appropriate default.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of
   * ListReportTypesResponse.next_page_token returned in response to the previous
   * call to the `ListJobs` method.
   * @return ListJobsResponse
   */
  public function listJobs($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListJobsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Jobs::class, 'Google_Service_YouTubeReporting_Resource_Jobs');
