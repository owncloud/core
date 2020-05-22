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
 *   $dataflowService = new Google_Service_Dataflow(...);
 *   $jobs = $dataflowService->jobs;
 *  </code>
 */
class Google_Service_Dataflow_Resource_ProjectsJobs extends Google_Service_Resource
{
  /**
   * List the jobs of a project across all regions. (jobs.aggregated)
   *
   * @param string $projectId The project which owns the jobs.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string location The [regional endpoint]
   * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) that
   * contains this job.
   * @opt_param string pageToken Set this to the 'next_page_token' field of a
   * previous response to request additional results in a long list.
   * @opt_param int pageSize If there are many jobs, limit response to at most
   * this many. The actual number of jobs returned will be the lesser of
   * max_responses and an unspecified server-defined limit.
   * @opt_param string view Level of information requested in response. Default is
   * `JOB_VIEW_SUMMARY`.
   * @opt_param string filter The kind of filter to use.
   * @return Google_Service_Dataflow_ListJobsResponse
   */
  public function aggregated($projectId, $optParams = array())
  {
    $params = array('projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('aggregated', array($params), "Google_Service_Dataflow_ListJobsResponse");
  }
  /**
   * Creates a Cloud Dataflow job.
   *
   * To create a job, we recommend using `projects.locations.jobs.create` with a
   * [regional endpoint] (https://cloud.google.com/dataflow/docs/concepts
   * /regional-endpoints). Using `projects.jobs.create` is not recommended, as
   * your job will always start in `us-central1`. (jobs.create)
   *
   * @param string $projectId The ID of the Cloud Platform project that the job
   * belongs to.
   * @param Google_Service_Dataflow_Job $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string location The [regional endpoint]
   * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) that
   * contains this job.
   * @opt_param string replaceJobId Deprecated. This field is now in the Job
   * message.
   * @opt_param string view The level of information requested in response.
   * @return Google_Service_Dataflow_Job
   */
  public function create($projectId, Google_Service_Dataflow_Job $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Dataflow_Job");
  }
  /**
   * Gets the state of the specified Cloud Dataflow job.
   *
   * To get the state of a job, we recommend using `projects.locations.jobs.get`
   * with a [regional endpoint] (https://cloud.google.com/dataflow/docs/concepts
   * /regional-endpoints). Using `projects.jobs.get` is not recommended, as you
   * can only get the state of jobs that are running in `us-central1`. (jobs.get)
   *
   * @param string $projectId The ID of the Cloud Platform project that the job
   * belongs to.
   * @param string $jobId The job ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string location The [regional endpoint]
   * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) that
   * contains this job.
   * @opt_param string view The level of information requested in response.
   * @return Google_Service_Dataflow_Job
   */
  public function get($projectId, $jobId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'jobId' => $jobId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dataflow_Job");
  }
  /**
   * Request the job status.
   *
   * To request the status of a job, we recommend using
   * `projects.locations.jobs.getMetrics` with a [regional endpoint]
   * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints). Using
   * `projects.jobs.getMetrics` is not recommended, as you can only request the
   * status of jobs that are running in `us-central1`. (jobs.getMetrics)
   *
   * @param string $projectId A project id.
   * @param string $jobId The job to get messages for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string startTime Return only metric data that has changed since
   * this time. Default is to return all information about all metrics for the
   * job.
   * @opt_param string location The [regional endpoint]
   * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) that
   * contains the job specified by job_id.
   * @return Google_Service_Dataflow_JobMetrics
   */
  public function getMetrics($projectId, $jobId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'jobId' => $jobId);
    $params = array_merge($params, $optParams);
    return $this->call('getMetrics', array($params), "Google_Service_Dataflow_JobMetrics");
  }
  /**
   * List the jobs of a project.
   *
   * To list the jobs of a project in a region, we recommend using
   * `projects.locations.jobs.get` with a [regional endpoint]
   * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints). To list
   * the all jobs across all regions, use `projects.jobs.aggregated`. Using
   * `projects.jobs.list` is not recommended, as you can only get the list of jobs
   * that are running in `us-central1`. (jobs.listProjectsJobs)
   *
   * @param string $projectId The project which owns the jobs.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view Level of information requested in response. Default is
   * `JOB_VIEW_SUMMARY`.
   * @opt_param string filter The kind of filter to use.
   * @opt_param string location The [regional endpoint]
   * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) that
   * contains this job.
   * @opt_param string pageToken Set this to the 'next_page_token' field of a
   * previous response to request additional results in a long list.
   * @opt_param int pageSize If there are many jobs, limit response to at most
   * this many. The actual number of jobs returned will be the lesser of
   * max_responses and an unspecified server-defined limit.
   * @return Google_Service_Dataflow_ListJobsResponse
   */
  public function listProjectsJobs($projectId, $optParams = array())
  {
    $params = array('projectId' => $projectId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dataflow_ListJobsResponse");
  }
  /**
   * Snapshot the state of a streaming job. (jobs.snapshot)
   *
   * @param string $projectId The project which owns the job to be snapshotted.
   * @param string $jobId The job to be snapshotted.
   * @param Google_Service_Dataflow_SnapshotJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataflow_Snapshot
   */
  public function snapshot($projectId, $jobId, Google_Service_Dataflow_SnapshotJobRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'jobId' => $jobId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('snapshot', array($params), "Google_Service_Dataflow_Snapshot");
  }
  /**
   * Updates the state of an existing Cloud Dataflow job.
   *
   * To update the state of an existing job, we recommend using
   * `projects.locations.jobs.update` with a [regional endpoint]
   * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints). Using
   * `projects.jobs.update` is not recommended, as you can only update the state
   * of jobs that are running in `us-central1`. (jobs.update)
   *
   * @param string $projectId The ID of the Cloud Platform project that the job
   * belongs to.
   * @param string $jobId The job ID.
   * @param Google_Service_Dataflow_Job $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string location The [regional endpoint]
   * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) that
   * contains this job.
   * @return Google_Service_Dataflow_Job
   */
  public function update($projectId, $jobId, Google_Service_Dataflow_Job $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'jobId' => $jobId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Dataflow_Job");
  }
}
