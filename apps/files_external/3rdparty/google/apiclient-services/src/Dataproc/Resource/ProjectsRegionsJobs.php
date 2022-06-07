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

namespace Google\Service\Dataproc\Resource;

use Google\Service\Dataproc\CancelJobRequest;
use Google\Service\Dataproc\DataprocEmpty;
use Google\Service\Dataproc\GetIamPolicyRequest;
use Google\Service\Dataproc\Job;
use Google\Service\Dataproc\ListJobsResponse;
use Google\Service\Dataproc\Operation;
use Google\Service\Dataproc\Policy;
use Google\Service\Dataproc\SetIamPolicyRequest;
use Google\Service\Dataproc\SubmitJobRequest;
use Google\Service\Dataproc\TestIamPermissionsRequest;
use Google\Service\Dataproc\TestIamPermissionsResponse;

/**
 * The "jobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataprocService = new Google\Service\Dataproc(...);
 *   $jobs = $dataprocService->jobs;
 *  </code>
 */
class ProjectsRegionsJobs extends \Google\Service\Resource
{
  /**
   * Starts a job cancellation request. To access the job resource after
   * cancellation, call regions/{region}/jobs.list (https://cloud.google.com/datap
   * roc/docs/reference/rest/v1/projects.regions.jobs/list) or
   * regions/{region}/jobs.get (https://cloud.google.com/dataproc/docs/reference/r
   * est/v1/projects.regions.jobs/get). (jobs.cancel)
   *
   * @param string $projectId Required. The ID of the Google Cloud Platform
   * project that the job belongs to.
   * @param string $region Required. The Dataproc region in which to handle the
   * request.
   * @param string $jobId Required. The job ID.
   * @param CancelJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Job
   */
  public function cancel($projectId, $region, $jobId, CancelJobRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'region' => $region, 'jobId' => $jobId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('cancel', [$params], Job::class);
  }
  /**
   * Deletes the job from the project. If the job is active, the delete fails, and
   * the response returns FAILED_PRECONDITION. (jobs.delete)
   *
   * @param string $projectId Required. The ID of the Google Cloud Platform
   * project that the job belongs to.
   * @param string $region Required. The Dataproc region in which to handle the
   * request.
   * @param string $jobId Required. The job ID.
   * @param array $optParams Optional parameters.
   * @return DataprocEmpty
   */
  public function delete($projectId, $region, $jobId, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'region' => $region, 'jobId' => $jobId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], DataprocEmpty::class);
  }
  /**
   * Gets the resource representation for a job in a project. (jobs.get)
   *
   * @param string $projectId Required. The ID of the Google Cloud Platform
   * project that the job belongs to.
   * @param string $region Required. The Dataproc region in which to handle the
   * request.
   * @param string $jobId Required. The job ID.
   * @param array $optParams Optional parameters.
   * @return Job
   */
  public function get($projectId, $region, $jobId, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'region' => $region, 'jobId' => $jobId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Job::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (jobs.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See Resource names
   * (https://cloud.google.com/apis/design/resource_names) for the appropriate
   * value for this field.
   * @param GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function getIamPolicy($resource, GetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Lists regions/{region}/jobs in a project. (jobs.listProjectsRegionsJobs)
   *
   * @param string $projectId Required. The ID of the Google Cloud Platform
   * project that the job belongs to.
   * @param string $region Required. The Dataproc region in which to handle the
   * request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clusterName Optional. If set, the returned jobs list
   * includes only jobs that were submitted to the named cluster.
   * @opt_param string filter Optional. A filter constraining the jobs to list.
   * Filters are case-sensitive and have the following syntax:field = value AND
   * field = value ...where field is status.state or labels.[KEY], and [KEY] is a
   * label key. value can be * to match all values. status.state can be either
   * ACTIVE or NON_ACTIVE. Only the logical AND operator is supported; space-
   * separated items are treated as having an implicit AND operator.Example
   * filter:status.state = ACTIVE AND labels.env = staging AND labels.starred = *
   * @opt_param string jobStateMatcher Optional. Specifies enumerated categories
   * of jobs to list. (default = match ALL jobs).If filter is provided,
   * jobStateMatcher will be ignored.
   * @opt_param int pageSize Optional. The number of results to return in each
   * response.
   * @opt_param string pageToken Optional. The page token, returned by a previous
   * call, to request the next page of results.
   * @return ListJobsResponse
   */
  public function listProjectsRegionsJobs($projectId, $region, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'region' => $region];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListJobsResponse::class);
  }
  /**
   * Updates a job in a project. (jobs.patch)
   *
   * @param string $projectId Required. The ID of the Google Cloud Platform
   * project that the job belongs to.
   * @param string $region Required. The Dataproc region in which to handle the
   * request.
   * @param string $jobId Required. The job ID.
   * @param Job $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Specifies the path, relative to Job,
   * of the field to update. For example, to update the labels of a Job the
   * update_mask parameter would be specified as labels, and the PATCH request
   * body would specify the new value. *Note:* Currently, labels is the only field
   * that can be updated.
   * @return Job
   */
  public function patch($projectId, $region, $jobId, Job $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'region' => $region, 'jobId' => $jobId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Job::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy.Can return NOT_FOUND, INVALID_ARGUMENT, and PERMISSION_DENIED
   * errors. (jobs.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See Resource names
   * (https://cloud.google.com/apis/design/resource_names) for the appropriate
   * value for this field.
   * @param SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function setIamPolicy($resource, SetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], Policy::class);
  }
  /**
   * Submits a job to a cluster. (jobs.submit)
   *
   * @param string $projectId Required. The ID of the Google Cloud Platform
   * project that the job belongs to.
   * @param string $region Required. The Dataproc region in which to handle the
   * request.
   * @param SubmitJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Job
   */
  public function submit($projectId, $region, SubmitJobRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'region' => $region, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('submit', [$params], Job::class);
  }
  /**
   * Submits job to a cluster. (jobs.submitAsOperation)
   *
   * @param string $projectId Required. The ID of the Google Cloud Platform
   * project that the job belongs to.
   * @param string $region Required. The Dataproc region in which to handle the
   * request.
   * @param SubmitJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function submitAsOperation($projectId, $region, SubmitJobRequest $postBody, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'region' => $region, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('submitAsOperation', [$params], Operation::class);
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * NOT_FOUND error.Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning. (jobs.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See Resource names
   * (https://cloud.google.com/apis/design/resource_names) for the appropriate
   * value for this field.
   * @param TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, TestIamPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], TestIamPermissionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsRegionsJobs::class, 'Google_Service_Dataproc_Resource_ProjectsRegionsJobs');
