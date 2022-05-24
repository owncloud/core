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

namespace Google\Service\CloudRun\Resource;

use Google\Service\CloudRun\GoogleCloudRunV2Job;
use Google\Service\CloudRun\GoogleCloudRunV2ListJobsResponse;
use Google\Service\CloudRun\GoogleCloudRunV2RunJobRequest;
use Google\Service\CloudRun\GoogleIamV1Policy;
use Google\Service\CloudRun\GoogleIamV1SetIamPolicyRequest;
use Google\Service\CloudRun\GoogleIamV1TestIamPermissionsRequest;
use Google\Service\CloudRun\GoogleIamV1TestIamPermissionsResponse;
use Google\Service\CloudRun\GoogleLongrunningOperation;

/**
 * The "jobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $runService = new Google\Service\CloudRun(...);
 *   $jobs = $runService->jobs;
 *  </code>
 */
class ProjectsLocationsJobs extends \Google\Service\Resource
{
  /**
   * Create a Job. (jobs.create)
   *
   * @param string $parent Required. The location and project in which this Job
   * should be created. Format: projects/{projectnumber}/locations/{location}
   * @param GoogleCloudRunV2Job $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string jobId Required. The unique identifier for the Job. The name
   * of the job becomes {parent}/jobs/{job_id}.
   * @opt_param bool validateOnly Indicates that the request should be validated
   * and default values populated, without persisting the request or creating any
   * resources.
   * @return GoogleLongrunningOperation
   */
  public function create($parent, GoogleCloudRunV2Job $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Deletes a Job. (jobs.delete)
   *
   * @param string $name Required. The full name of the Job. Format:
   * projects/{projectnumber}/locations/{location}/jobs/{job}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string etag A system-generated fingerprint for this version of the
   * resource. May be used to detect modification conflict during updates.
   * @opt_param bool force If set to true, the Job and its Executions will be
   * deleted no matter whether any Executions are still running or not. If set to
   * false or unset, the Job and its Executions can only be deleted if there are
   * no running Executions. Any running Execution will fail the deletion.
   * @opt_param bool validateOnly Indicates that the request should be validated
   * without actually deleting any resources.
   * @return GoogleLongrunningOperation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Gets information about a Job. (jobs.get)
   *
   * @param string $name Required. The full name of the Job. Format:
   * projects/{projectnumber}/locations/{location}/jobs/{job}
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRunV2Job
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudRunV2Job::class);
  }
  /**
   * Get the IAM Access Control policy currently in effect for the given Job. This
   * result does not include any inherited policies. (jobs.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
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
   * List Jobs. (jobs.listProjectsLocationsJobs)
   *
   * @param string $parent Required. The location and project to list resources
   * on. Format: projects/{projectnumber}/locations/{location}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of Jobs to return in this call.
   * @opt_param string pageToken A page token received from a previous call to
   * ListJobs. All other parameters must match.
   * @opt_param bool showDeleted If true, returns deleted (but unexpired)
   * resources along with active ones.
   * @return GoogleCloudRunV2ListJobsResponse
   */
  public function listProjectsLocationsJobs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudRunV2ListJobsResponse::class);
  }
  /**
   * Updates a Job. (jobs.patch)
   *
   * @param string $name The fully qualified name of this Job. Format:
   * projects/{project}/locations/{location}/jobs/{job}
   * @param GoogleCloudRunV2Job $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool allowMissing If set to true, and if the Job does not exist,
   * it will create a new one. Caller must have both create and update permissions
   * for this call if this is set to true.
   * @opt_param bool validateOnly Indicates that the request should be validated
   * and default values populated, without persisting the request or updating any
   * resources.
   * @return GoogleLongrunningOperation
   */
  public function patch($name, GoogleCloudRunV2Job $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Triggers creation of a new Execution of this Job. (jobs.run)
   *
   * @param string $name Required. The full name of the Job. Format:
   * projects/{projectnumber}/locations/{location}/jobs/{job}
   * @param GoogleCloudRunV2RunJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function run($name, GoogleCloudRunV2RunJobRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('run', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Sets the IAM Access control policy for the specified Job. Overwrites any
   * existing policy. (jobs.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
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
   * Returns permissions that a caller has on the specified Project. There are no
   * permissions required for making this API call. (jobs.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
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
class_alias(ProjectsLocationsJobs::class, 'Google_Service_CloudRun_Resource_ProjectsLocationsJobs');
