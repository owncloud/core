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
 *   $dataprocService = new Google_Service_Dataproc(...);
 *   $jobs = $dataprocService->jobs;
 *  </code>
 */
class Google_Service_Dataproc_Resource_ProjectsRegionsJobs extends Google_Service_Resource
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
   * @param Google_Service_Dataproc_CancelJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_Job
   */
  public function cancel($projectId, $region, $jobId, Google_Service_Dataproc_CancelJobRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'region' => $region, 'jobId' => $jobId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('cancel', array($params), "Google_Service_Dataproc_Job");
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
   * @return Google_Service_Dataproc_DataprocEmpty
   */
  public function delete($projectId, $region, $jobId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'region' => $region, 'jobId' => $jobId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Dataproc_DataprocEmpty");
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
   * @return Google_Service_Dataproc_Job
   */
  public function get($projectId, $region, $jobId, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'region' => $region, 'jobId' => $jobId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dataproc_Job");
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (jobs.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_Dataproc_GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_Policy
   */
  public function getIamPolicy($resource, Google_Service_Dataproc_GetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_Dataproc_Policy");
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
   * @return Google_Service_Dataproc_ListJobsResponse
   */
  public function listProjectsRegionsJobs($projectId, $region, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'region' => $region);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dataproc_ListJobsResponse");
  }
  /**
   * Updates a job in a project. (jobs.patch)
   *
   * @param string $projectId Required. The ID of the Google Cloud Platform
   * project that the job belongs to.
   * @param string $region Required. The Dataproc region in which to handle the
   * request.
   * @param string $jobId Required. The job ID.
   * @param Google_Service_Dataproc_Job $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Specifies the path, relative to Job,
   * of the field to update. For example, to update the labels of a Job the
   * update_mask parameter would be specified as labels, and the PATCH request
   * body would specify the new value. *Note:* Currently, labels is the only field
   * that can be updated.
   * @return Google_Service_Dataproc_Job
   */
  public function patch($projectId, $region, $jobId, Google_Service_Dataproc_Job $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'region' => $region, 'jobId' => $jobId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Dataproc_Job");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy.Can return NOT_FOUND, INVALID_ARGUMENT, and PERMISSION_DENIED
   * errors. (jobs.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_Dataproc_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_Policy
   */
  public function setIamPolicy($resource, Google_Service_Dataproc_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_Dataproc_Policy");
  }
  /**
   * Submits a job to a cluster. (jobs.submit)
   *
   * @param string $projectId Required. The ID of the Google Cloud Platform
   * project that the job belongs to.
   * @param string $region Required. The Dataproc region in which to handle the
   * request.
   * @param Google_Service_Dataproc_SubmitJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_Job
   */
  public function submit($projectId, $region, Google_Service_Dataproc_SubmitJobRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'region' => $region, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('submit', array($params), "Google_Service_Dataproc_Job");
  }
  /**
   * Submits job to a cluster. (jobs.submitAsOperation)
   *
   * @param string $projectId Required. The ID of the Google Cloud Platform
   * project that the job belongs to.
   * @param string $region Required. The Dataproc region in which to handle the
   * request.
   * @param Google_Service_Dataproc_SubmitJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_Operation
   */
  public function submitAsOperation($projectId, $region, Google_Service_Dataproc_SubmitJobRequest $postBody, $optParams = array())
  {
    $params = array('projectId' => $projectId, 'region' => $region, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('submitAsOperation', array($params), "Google_Service_Dataproc_Operation");
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * NOT_FOUND error.Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning. (jobs.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_Dataproc_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Dataproc_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_Dataproc_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_Dataproc_TestIamPermissionsResponse");
  }
}
