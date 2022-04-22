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

namespace Google\Service\BackupforGKE\Resource;

use Google\Service\BackupforGKE\GoogleLongrunningOperation;
use Google\Service\BackupforGKE\ListRestorePlansResponse;
use Google\Service\BackupforGKE\Policy;
use Google\Service\BackupforGKE\RestorePlan;
use Google\Service\BackupforGKE\SetIamPolicyRequest;
use Google\Service\BackupforGKE\TestIamPermissionsRequest;
use Google\Service\BackupforGKE\TestIamPermissionsResponse;

/**
 * The "restorePlans" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gkebackupService = new Google\Service\BackupforGKE(...);
 *   $restorePlans = $gkebackupService->restorePlans;
 *  </code>
 */
class ProjectsLocationsRestorePlans extends \Google\Service\Resource
{
  /**
   * Creates a new RestorePlan in a given location. (restorePlans.create)
   *
   * @param string $parent Required. The location within which to create the
   * RestorePlan. Format: projects/{project}/locations/{location}
   * @param RestorePlan $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string restorePlanId Required. The client-provided short name for
   * the RestorePlan resource. This name must: a. be between 1 and 63 characters
   * long (inclusive) b. consist of only lower-case ASCII letters, numbers, and
   * dashes c. start with a lower-case letter d. end with a lower-case letter or
   * number e. be unique within the set of RestorePlans in this location
   * @return GoogleLongrunningOperation
   */
  public function create($parent, RestorePlan $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Deletes an existing RestorePlan. (restorePlans.delete)
   *
   * @param string $name Required. Fully qualified RestorePlan name. Format:
   * projects/{project}/locations/{location}/restorePlans/{restore_plan}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string etag If provided, this value must match the value currently
   * assigned to the target resource.
   * @opt_param bool force If set to true, any restores below this restorePlan
   * will also be deleted. Otherwise, the request will only succeed if the
   * restorePlan has no restores.
   * @return GoogleLongrunningOperation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Retrieve the details of a single RestorePlan. (restorePlans.get)
   *
   * @param string $name Required. Fully qualified RestorePlan name. Format:
   * projects/{project}/locations/{location}/restorePlans/{restore_plan}
   * @param array $optParams Optional parameters.
   * @return RestorePlan
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], RestorePlan::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (restorePlans.getIamPolicy)
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
   * @return Policy
   */
  public function getIamPolicy($resource, $optParams = [])
  {
    $params = ['resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Lists RestorePlans in a given location.
   * (restorePlans.listProjectsLocationsRestorePlans)
   *
   * @param string $parent Required. The location that contains the RestorePlans
   * to list. Format: projects/{project}/locations/{location}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter List filter.
   * @opt_param string orderBy Sort results.
   * @opt_param int pageSize The target number of results to return in a single
   * response. If not specified, a default value will be chosen by the service.
   * Note that the response may inclue a partial list and a caller should only
   * rely on the response's next_page_token to determine if there are more
   * instances left to be queried.
   * @opt_param string pageToken The value of next_page_token received from a
   * previous `ListRestorePlans` call. Provide this to retrieve the subsequent
   * page in a multi-page list of results. When paginating, all other parameters
   * provided to `ListRestorePlans` must match the call that provided the page
   * token.
   * @return ListRestorePlansResponse
   */
  public function listProjectsLocationsRestorePlans($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListRestorePlansResponse::class);
  }
  /**
   * Update a RestorePlan. (restorePlans.patch)
   *
   * @param string $name Output only. [Output Only] The full name of the
   * RestorePlan resource. Format: projects/locations/restorePlans
   * @param RestorePlan $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask This is used to specify the fields to be
   * overwritten in the RestorePlan targeted for update. The values for each of
   * these updated fields will be taken from the `restore_plan` provided with this
   * request. Field names are relative to the root of the resource. If no
   * `update_mask` is provided, all fields in `restore_plan` will be written to
   * the target RestorePlan resource. Note that OUTPUT_ONLY and IMMUTABLE fields
   * in `restore_plan` are ignored and are not used to update the target
   * RestorePlan.
   * @return GoogleLongrunningOperation
   */
  public function patch($name, RestorePlan $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (restorePlans.setIamPolicy)
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
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning.
   * (restorePlans.testIamPermissions)
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsRestorePlans::class, 'Google_Service_BackupforGKE_Resource_ProjectsLocationsRestorePlans');
