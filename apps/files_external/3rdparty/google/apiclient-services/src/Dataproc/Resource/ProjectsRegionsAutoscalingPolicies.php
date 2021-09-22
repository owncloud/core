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

use Google\Service\Dataproc\AutoscalingPolicy;
use Google\Service\Dataproc\DataprocEmpty;
use Google\Service\Dataproc\GetIamPolicyRequest;
use Google\Service\Dataproc\ListAutoscalingPoliciesResponse;
use Google\Service\Dataproc\Policy;
use Google\Service\Dataproc\SetIamPolicyRequest;
use Google\Service\Dataproc\TestIamPermissionsRequest;
use Google\Service\Dataproc\TestIamPermissionsResponse;

/**
 * The "autoscalingPolicies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dataprocService = new Google\Service\Dataproc(...);
 *   $autoscalingPolicies = $dataprocService->autoscalingPolicies;
 *  </code>
 */
class ProjectsRegionsAutoscalingPolicies extends \Google\Service\Resource
{
  /**
   * Creates new autoscaling policy. (autoscalingPolicies.create)
   *
   * @param string $parent Required. The "resource name" of the region or
   * location, as described in
   * https://cloud.google.com/apis/design/resource_names. For
   * projects.regions.autoscalingPolicies.create, the resource name of the region
   * has the following format: projects/{project_id}/regions/{region} For
   * projects.locations.autoscalingPolicies.create, the resource name of the
   * location has the following format: projects/{project_id}/locations/{location}
   * @param AutoscalingPolicy $postBody
   * @param array $optParams Optional parameters.
   * @return AutoscalingPolicy
   */
  public function create($parent, AutoscalingPolicy $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], AutoscalingPolicy::class);
  }
  /**
   * Deletes an autoscaling policy. It is an error to delete an autoscaling policy
   * that is in use by one or more clusters. (autoscalingPolicies.delete)
   *
   * @param string $name Required. The "resource name" of the autoscaling policy,
   * as described in https://cloud.google.com/apis/design/resource_names. For
   * projects.regions.autoscalingPolicies.delete, the resource name of the policy
   * has the following format:
   * projects/{project_id}/regions/{region}/autoscalingPolicies/{policy_id} For
   * projects.locations.autoscalingPolicies.delete, the resource name of the
   * policy has the following format:
   * projects/{project_id}/locations/{location}/autoscalingPolicies/{policy_id}
   * @param array $optParams Optional parameters.
   * @return DataprocEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], DataprocEmpty::class);
  }
  /**
   * Retrieves autoscaling policy. (autoscalingPolicies.get)
   *
   * @param string $name Required. The "resource name" of the autoscaling policy,
   * as described in https://cloud.google.com/apis/design/resource_names. For
   * projects.regions.autoscalingPolicies.get, the resource name of the policy has
   * the following format:
   * projects/{project_id}/regions/{region}/autoscalingPolicies/{policy_id} For
   * projects.locations.autoscalingPolicies.get, the resource name of the policy
   * has the following format:
   * projects/{project_id}/locations/{location}/autoscalingPolicies/{policy_id}
   * @param array $optParams Optional parameters.
   * @return AutoscalingPolicy
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], AutoscalingPolicy::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set.
   * (autoscalingPolicies.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
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
   * Lists autoscaling policies in the project.
   * (autoscalingPolicies.listProjectsRegionsAutoscalingPolicies)
   *
   * @param string $parent Required. The "resource name" of the region or
   * location, as described in
   * https://cloud.google.com/apis/design/resource_names. For
   * projects.regions.autoscalingPolicies.list, the resource name of the region
   * has the following format: projects/{project_id}/regions/{region} For
   * projects.locations.autoscalingPolicies.list, the resource name of the
   * location has the following format: projects/{project_id}/locations/{location}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of results to return in
   * each response. Must be less than or equal to 1000. Defaults to 100.
   * @opt_param string pageToken Optional. The page token, returned by a previous
   * call, to request the next page of results.
   * @return ListAutoscalingPoliciesResponse
   */
  public function listProjectsRegionsAutoscalingPolicies($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListAutoscalingPoliciesResponse::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy.Can return NOT_FOUND, INVALID_ARGUMENT, and PERMISSION_DENIED
   * errors. (autoscalingPolicies.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
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
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * NOT_FOUND error.Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning.
   * (autoscalingPolicies.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
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
  /**
   * Updates (replaces) autoscaling policy.Disabled check for update_mask, because
   * all updates will be full replacements. (autoscalingPolicies.update)
   *
   * @param string $name Output only. The "resource name" of the autoscaling
   * policy, as described in https://cloud.google.com/apis/design/resource_names.
   * For projects.regions.autoscalingPolicies, the resource name of the policy has
   * the following format:
   * projects/{project_id}/regions/{region}/autoscalingPolicies/{policy_id} For
   * projects.locations.autoscalingPolicies, the resource name of the policy has
   * the following format:
   * projects/{project_id}/locations/{location}/autoscalingPolicies/{policy_id}
   * @param AutoscalingPolicy $postBody
   * @param array $optParams Optional parameters.
   * @return AutoscalingPolicy
   */
  public function update($name, AutoscalingPolicy $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], AutoscalingPolicy::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsRegionsAutoscalingPolicies::class, 'Google_Service_Dataproc_Resource_ProjectsRegionsAutoscalingPolicies');
