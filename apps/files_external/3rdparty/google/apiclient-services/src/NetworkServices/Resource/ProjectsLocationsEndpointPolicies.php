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

namespace Google\Service\NetworkServices\Resource;

use Google\Service\NetworkServices\EndpointPolicy;
use Google\Service\NetworkServices\ListEndpointPoliciesResponse;
use Google\Service\NetworkServices\Operation;
use Google\Service\NetworkServices\Policy;
use Google\Service\NetworkServices\SetIamPolicyRequest;
use Google\Service\NetworkServices\TestIamPermissionsRequest;
use Google\Service\NetworkServices\TestIamPermissionsResponse;

/**
 * The "endpointPolicies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $networkservicesService = new Google\Service\NetworkServices(...);
 *   $endpointPolicies = $networkservicesService->endpointPolicies;
 *  </code>
 */
class ProjectsLocationsEndpointPolicies extends \Google\Service\Resource
{
  /**
   * Creates a new EndpointPolicy in a given project and location.
   * (endpointPolicies.create)
   *
   * @param string $parent Required. The parent resource of the EndpointPolicy.
   * Must be in the format `projects/locations/global`.
   * @param EndpointPolicy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string endpointPolicyId Required. Short name of the EndpointPolicy
   * resource to be created. E.g. "CustomECS".
   * @return Operation
   */
  public function create($parent, EndpointPolicy $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a single EndpointPolicy. (endpointPolicies.delete)
   *
   * @param string $name Required. A name of the EndpointPolicy to delete. Must be
   * in the format `projects/locations/global/endpointPolicies`.
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Gets details of a single EndpointPolicy. (endpointPolicies.get)
   *
   * @param string $name Required. A name of the EndpointPolicy to get. Must be in
   * the format `projects/locations/global/endpointPolicies`.
   * @param array $optParams Optional parameters.
   * @return EndpointPolicy
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], EndpointPolicy::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set.
   * (endpointPolicies.getIamPolicy)
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
   * @return Policy
   */
  public function getIamPolicy($resource, $optParams = [])
  {
    $params = ['resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Lists EndpointPolicies in a given project and location.
   * (endpointPolicies.listProjectsLocationsEndpointPolicies)
   *
   * @param string $parent Required. The project and location from which the
   * EndpointPolicies should be listed, specified in the format
   * `projects/locations/global`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of EndpointPolicies to return per
   * call.
   * @opt_param string pageToken The value returned by the last
   * `ListEndpointPoliciesResponse` Indicates that this is a continuation of a
   * prior `ListEndpointPolicies` call, and that the system should return the next
   * page of data.
   * @return ListEndpointPoliciesResponse
   */
  public function listProjectsLocationsEndpointPolicies($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListEndpointPoliciesResponse::class);
  }
  /**
   * Updates the parameters of a single EndpointPolicy. (endpointPolicies.patch)
   *
   * @param string $name Required. Name of the EndpointPolicy resource. It matches
   * pattern
   * `projects/{project}/locations/global/endpointPolicies/{endpoint_policy}`.
   * @param EndpointPolicy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Optional. Field mask is used to specify the
   * fields to be overwritten in the EndpointPolicy resource by the update. The
   * fields specified in the update_mask are relative to the resource, not the
   * full request. A field will be overwritten if it is in the mask. If the user
   * does not provide a mask then all fields will be overwritten.
   * @return Operation
   */
  public function patch($name, EndpointPolicy $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (endpointPolicies.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
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
   * (endpointPolicies.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
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
class_alias(ProjectsLocationsEndpointPolicies::class, 'Google_Service_NetworkServices_Resource_ProjectsLocationsEndpointPolicies');
