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
 * The "jobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudschedulerService = new Google_Service_CloudScheduler(...);
 *   $jobs = $cloudschedulerService->jobs;
 *  </code>
 */
class Google_Service_CloudScheduler_Resource_ProjectsLocationsJobs extends Google_Service_Resource
{
  /**
   * Creates a job. (jobs.create)
   *
   * @param string $parent Required. The location name. For example:
   * `projects/PROJECT_ID/locations/LOCATION_ID`.
   * @param Google_Service_CloudScheduler_Job $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudScheduler_Job
   */
  public function create($parent, Google_Service_CloudScheduler_Job $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudScheduler_Job");
  }
  /**
   * Deletes a job. (jobs.delete)
   *
   * @param string $name Required. The job name. For example:
   * `projects/PROJECT_ID/locations/LOCATION_ID/jobs/JOB_ID`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudScheduler_CloudschedulerEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudScheduler_CloudschedulerEmpty");
  }
  /**
   * Gets a job. (jobs.get)
   *
   * @param string $name Required. The job name. For example:
   * `projects/PROJECT_ID/locations/LOCATION_ID/jobs/JOB_ID`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudScheduler_Job
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudScheduler_Job");
  }
  /**
   * Lists jobs. (jobs.listProjectsLocationsJobs)
   *
   * @param string $parent Required. The location name. For example:
   * `projects/PROJECT_ID/locations/LOCATION_ID`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken A token identifying a page of results the server
   * will return. To request the first page results, page_token must be empty. To
   * request the next page of results, page_token must be the value of
   * next_page_token returned from the previous call to ListJobs. It is an error
   * to switch the value of filter or order_by while iterating through pages.
   * @opt_param int pageSize Requested page size.
   *
   * The maximum page size is 500. If unspecified, the page size will be the
   * maximum. Fewer jobs than requested might be returned, even if more jobs
   * exist; use next_page_token to determine if more jobs exist.
   * @return Google_Service_CloudScheduler_ListJobsResponse
   */
  public function listProjectsLocationsJobs($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudScheduler_ListJobsResponse");
  }
  /**
   * Updates a job.
   *
   * If successful, the updated Job is returned. If the job does not exist,
   * `NOT_FOUND` is returned.
   *
   * If UpdateJob does not successfully return, it is possible for the job to be
   * in an Job.State.UPDATE_FAILED state. A job in this state may not be executed.
   * If this happens, retry the UpdateJob request until a successful response is
   * received. (jobs.patch)
   *
   * @param string $name Optionally caller-specified in CreateJob, after which it
   * becomes output only.
   *
   * The job name. For example:
   * `projects/PROJECT_ID/locations/LOCATION_ID/jobs/JOB_ID`.
   *
   * * `PROJECT_ID` can contain letters ([A-Za-z]), numbers ([0-9]),    hyphens
   * (-), colons (:), or periods (.).    For more information, see    [Identifying
   * projects](https://cloud.google.com/resource-manager/docs/creating-managing-
   * projects#identifying_projects) * `LOCATION_ID` is the canonical ID for the
   * job's location.    The list of available locations can be obtained by calling
   * ListLocations.    For more information, see
   * https://cloud.google.com/about/locations/. * `JOB_ID` can contain only
   * letters ([A-Za-z]), numbers ([0-9]),    hyphens (-), or underscores (_). The
   * maximum length is 500 characters.
   * @param Google_Service_CloudScheduler_Job $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask A  mask used to specify which fields of the job
   * are being updated.
   * @return Google_Service_CloudScheduler_Job
   */
  public function patch($name, Google_Service_CloudScheduler_Job $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudScheduler_Job");
  }
  /**
   * Pauses a job.
   *
   * If a job is paused then the system will stop executing the job until it is
   * re-enabled via ResumeJob. The state of the job is stored in state; if paused
   * it will be set to Job.State.PAUSED. A job must be in Job.State.ENABLED to be
   * paused. (jobs.pause)
   *
   * @param string $name Required. The job name. For example:
   * `projects/PROJECT_ID/locations/LOCATION_ID/jobs/JOB_ID`.
   * @param Google_Service_CloudScheduler_PauseJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudScheduler_Job
   */
  public function pause($name, Google_Service_CloudScheduler_PauseJobRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('pause', array($params), "Google_Service_CloudScheduler_Job");
  }
  /**
   * Resume a job.
   *
   * This method reenables a job after it has been Job.State.PAUSED. The state of
   * a job is stored in Job.state; after calling this method it will be set to
   * Job.State.ENABLED. A job must be in Job.State.PAUSED to be resumed.
   * (jobs.resume)
   *
   * @param string $name Required. The job name. For example:
   * `projects/PROJECT_ID/locations/LOCATION_ID/jobs/JOB_ID`.
   * @param Google_Service_CloudScheduler_ResumeJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudScheduler_Job
   */
  public function resume($name, Google_Service_CloudScheduler_ResumeJobRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('resume', array($params), "Google_Service_CloudScheduler_Job");
  }
  /**
   * Forces a job to run now.
   *
   * When this method is called, Cloud Scheduler will dispatch the job, even if
   * the job is already running. (jobs.run)
   *
   * @param string $name Required. The job name. For example:
   * `projects/PROJECT_ID/locations/LOCATION_ID/jobs/JOB_ID`.
   * @param Google_Service_CloudScheduler_RunJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudScheduler_Job
   */
  public function run($name, Google_Service_CloudScheduler_RunJobRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('run', array($params), "Google_Service_CloudScheduler_Job");
  }
}
