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

use Google\Service\Dataflow\Job;
use Google\Service\Dataflow\JobMetrics;
use Google\Service\Dataflow\ListJobsResponse;
use Google\Service\Dataflow\Snapshot;
use Google\Service\Dataflow\SnapshotJobRequest;

/**
 * The "jobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataflowService = new Google\Service\Dataflow(...);
 *   $jobs = $dataflowService->jobs;
 *  </code>
 */
class ProjectsJobs extends \Google\Service\Resource
{
  /**
   * List the jobs of a project across all regions. (jobs.aggregated)
   *
   * @param string $projectId The project which owns the jobs.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter The kind of filter to use.
   * @opt_param string location The [regional endpoint]
   * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) that
   * contains this job.
   * @opt_param int pageSize If there are many jobs, limit response to at most
   * this many. The actual number of jobs returned will be the lesser of
   * max_responses and an unspecified server-defined limit.
   * @opt_param string pageToken Set this to the 'next_page_token' field of a
   * previous response to request additional results in a long list.
   * @opt_param string view Deprecated. ListJobs always returns summaries now. Use
   * GetJob for other JobViews.
   * @return ListJobsResponse
   */
  public function aggregated($projectId, $optParams = [])
  {
    $params = ['projectId' => $projectId];
    $params = array_merge($params, $optParams);
    return $this->call('aggregated', [$params], ListJobsResponse::class);
  }
  /**
   * Creates a Cloud Dataflow job. To create a job, we recommend using
   * `projects.locations.jobs.create` with a [regional endpoint]
   * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints). Using
   * `projects.jobs.create` is not recommended, as your job will always start in
   * `us-central1`. Do not enter confidential information when you supply string
   * values using the API. (jobs.create)
   *
   * @param string $projectId The ID of the Cloud Platform project that the job
   * belongs to.
   * @param Job $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string location The [regional endpoint]
   * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) that
   * contains this job.
   * @opt_param string replaceJobId Deprecated. This field is now in the Job
   * message.
   * @opt_param string view The level of information requested in response.
   * @return Job
   */
  public function create($projectId, Job $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Job::class);
  }
  /**
   * Gets the state of the specified Cloud Dataflow job. To get the state of a
   * job, we recommend using `projects.locations.jobs.get` with a [regional
   * endpoint] (https://cloud.google.com/dataflow/docs/concepts/regional-
   * endpoints). Using `projects.jobs.get` is not recommended, as you can only get
   * the state of jobs that are running in `us-central1`. (jobs.get)
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
   * @return Job
   */
  public function get($projectId, $jobId, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'jobId' => $jobId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Job::class);
  }
  /**
   * Request the job status. To request the status of a job, we recommend using
   * `projects.locations.jobs.getMetrics` with a [regional endpoint]
   * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints). Using
   * `projects.jobs.getMetrics` is not recommended, as you can only request the
   * status of jobs that are running in `us-central1`. (jobs.getMetrics)
   *
   * @param string $projectId A project id.
   * @param string $jobId The job to get metrics for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string location The [regional endpoint]
   * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) that
   * contains the job specified by job_id.
   * @opt_param string startTime Return only metric data that has changed since
   * this time. Default is to return all information about all metrics for the
   * job.
   * @return JobMetrics
   */
  public function getMetrics($projectId, $jobId, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'jobId' => $jobId];
    $params = array_merge($params, $optParams);
    return $this->call('getMetrics', [$params], JobMetrics::class);
  }
  /**
   * List the jobs of a project. To list the jobs of a project in a region, we
   * recommend using `projects.locations.jobs.list` with a [regional endpoint]
   * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints). To list
   * the all jobs across all regions, use `projects.jobs.aggregated`. Using
   * `projects.jobs.list` is not recommended, as you can only get the list of jobs
   * that are running in `us-central1`. (jobs.listProjectsJobs)
   *
   * @param string $projectId The project which owns the jobs.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter The kind of filter to use.
   * @opt_param string location The [regional endpoint]
   * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) that
   * contains this job.
   * @opt_param int pageSize If there are many jobs, limit response to at most
   * this many. The actual number of jobs returned will be the lesser of
   * max_responses and an unspecified server-defined limit.
   * @opt_param string pageToken Set this to the 'next_page_token' field of a
   * previous response to request additional results in a long list.
   * @opt_param string view Deprecated. ListJobs always returns summaries now. Use
   * GetJob for other JobViews.
   * @return ListJobsResponse
   */
  public function listProjectsJobs($projectId, $optParams = [])
  {
    $params = ['projectId' => $projectId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListJobsResponse::class);
  }
  /**
   * Snapshot the state of a streaming job. (jobs.snapshot)
   *
   * @param string $projectId The project which owns the job to be snapshotted.
   * @param string $jobId The job to be snapshotted.
   * @param SnapshotJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Snapshot
   */
  public function snapshot($projectId, $jobId, SnapshotJobRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'jobId' => $jobId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('snapshot', [$params], Snapshot::class);
  }
  /**
   * Updates the state of an existing Cloud Dataflow job. To update the state of
   * an existing job, we recommend using `projects.locations.jobs.update` with a
   * [regional endpoint] (https://cloud.google.com/dataflow/docs/concepts
   * /regional-endpoints). Using `projects.jobs.update` is not recommended, as you
   * can only update the state of jobs that are running in `us-central1`.
   * (jobs.update)
   *
   * @param string $projectId The ID of the Cloud Platform project that the job
   * belongs to.
   * @param string $jobId The job ID.
   * @param Job $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string location The [regional endpoint]
   * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) that
   * contains this job.
   * @return Job
   */
  public function update($projectId, $jobId, Job $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'jobId' => $jobId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Job::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsJobs::class, 'Google_Service_Dataflow_Resource_ProjectsJobs');
