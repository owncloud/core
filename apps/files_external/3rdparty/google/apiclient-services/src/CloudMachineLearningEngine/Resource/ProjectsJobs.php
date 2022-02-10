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

namespace Google\Service\CloudMachineLearningEngine\Resource;

use Google\Service\CloudMachineLearningEngine\GoogleCloudMlV1CancelJobRequest;
use Google\Service\CloudMachineLearningEngine\GoogleCloudMlV1Job;
use Google\Service\CloudMachineLearningEngine\GoogleCloudMlV1ListJobsResponse;
use Google\Service\CloudMachineLearningEngine\GoogleIamV1Policy;
use Google\Service\CloudMachineLearningEngine\GoogleIamV1SetIamPolicyRequest;
use Google\Service\CloudMachineLearningEngine\GoogleIamV1TestIamPermissionsRequest;
use Google\Service\CloudMachineLearningEngine\GoogleIamV1TestIamPermissionsResponse;
use Google\Service\CloudMachineLearningEngine\GoogleProtobufEmpty;

/**
 * The "jobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mlService = new Google\Service\CloudMachineLearningEngine(...);
 *   $jobs = $mlService->jobs;
 *  </code>
 */
class ProjectsJobs extends \Google\Service\Resource
{
  /**
   * Cancels a running job. (jobs.cancel)
   *
   * @param string $name Required. The name of the job to cancel.
   * @param GoogleCloudMlV1CancelJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function cancel($name, GoogleCloudMlV1CancelJobRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('cancel', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Creates a training or a batch prediction job. (jobs.create)
   *
   * @param string $parent Required. The project name.
   * @param GoogleCloudMlV1Job $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudMlV1Job
   */
  public function create($parent, GoogleCloudMlV1Job $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudMlV1Job::class);
  }
  /**
   * Describes a job. (jobs.get)
   *
   * @param string $name Required. The name of the job to get the description of.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudMlV1Job
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudMlV1Job::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (jobs.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int options.requestedPolicyVersion Optional. The maximum policy
   * version that will be used to format the policy. Valid values are 0, 1, and 3.
   * Requests specifying an invalid value will be rejected. Requests for policies
   * with any conditional role bindings must specify version 3. Policies with no
   * conditional role bindings may specify any valid value or leave the field
   * unset. The policy in the response might use the policy version that you
   * specified, or it might use a lower policy version. For example, if you
   * specify version 3, but the policy has no conditional role bindings, the
   * response uses version 1. To learn which resources support conditions in their
   * IAM policies, see the [IAM
   * documentation](https://cloud.google.com/iam/help/conditions/resource-
   * policies).
   * @return GoogleIamV1Policy
   */
  public function getIamPolicy($resource, $optParams = [])
  {
    $params = ['resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], GoogleIamV1Policy::class);
  }
  /**
   * Lists the jobs in the project. If there are no jobs that match the request
   * parameters, the list request returns an empty response body: {}.
   * (jobs.listProjectsJobs)
   *
   * @param string $parent Required. The name of the project for which to list
   * jobs.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Specifies the subset of jobs to retrieve.
   * You can filter on the value of one or more attributes of the job object. For
   * example, retrieve jobs with a job identifier that starts with 'census':
   * gcloud ai-platform jobs list --filter='jobId:census*' List all failed jobs
   * with names that start with 'rnn': gcloud ai-platform jobs list
   * --filter='jobId:rnn* AND state:FAILED' For more examples, see the guide to
   * monitoring jobs.
   * @opt_param int pageSize Optional. The number of jobs to retrieve per "page"
   * of results. If there are more remaining results than this number, the
   * response message will contain a valid value in the `next_page_token` field.
   * The default value is 20, and the maximum page size is 100.
   * @opt_param string pageToken Optional. A page token to request the next page
   * of results. You get the token from the `next_page_token` field of the
   * response from the previous call.
   * @return GoogleCloudMlV1ListJobsResponse
   */
  public function listProjectsJobs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudMlV1ListJobsResponse::class);
  }
  /**
   * Updates a specific job resource. Currently the only supported fields to
   * update are `labels`. (jobs.patch)
   *
   * @param string $name Required. The job name.
   * @param GoogleCloudMlV1Job $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Specifies the path, relative to `Job`,
   * of the field to update. To adopt etag mechanism, include `etag` field in the
   * mask, and include the `etag` value in your job resource. For example, to
   * change the labels of a job, the `update_mask` parameter would be specified as
   * `labels`, `etag`, and the `PATCH` request body would specify the new value,
   * as follows: { "labels": { "owner": "Google", "color": "Blue" } "etag":
   * "33a64df551425fcc55e4d42a148795d9f25f89d4" } If `etag` matches the one on the
   * server, the labels of the job will be replaced with the given ones, and the
   * server end `etag` will be recalculated. Currently the only supported update
   * masks are `labels` and `etag`.
   * @return GoogleCloudMlV1Job
   */
  public function patch($name, GoogleCloudMlV1Job $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudMlV1Job::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (jobs.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param GoogleIamV1SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleIamV1Policy
   */
  public function setIamPolicy($resource, GoogleIamV1SetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], GoogleIamV1Policy::class);
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning. (jobs.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param GoogleIamV1TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleIamV1TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, GoogleIamV1TestIamPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], GoogleIamV1TestIamPermissionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsJobs::class, 'Google_Service_CloudMachineLearningEngine_Resource_ProjectsJobs');
