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

namespace Google\Service\AccessContextManager\Resource;

use Google\Service\AccessContextManager\AccessPolicy;
use Google\Service\AccessContextManager\GetIamPolicyRequest;
use Google\Service\AccessContextManager\ListAccessPoliciesResponse;
use Google\Service\AccessContextManager\Operation;
use Google\Service\AccessContextManager\Policy;
use Google\Service\AccessContextManager\SetIamPolicyRequest;
use Google\Service\AccessContextManager\TestIamPermissionsRequest;
use Google\Service\AccessContextManager\TestIamPermissionsResponse;

/**
 * The "accessPolicies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $accesscontextmanagerService = new Google\Service\AccessContextManager(...);
 *   $accessPolicies = $accesscontextmanagerService->accessPolicies;
 *  </code>
 */
class AccessPolicies extends \Google\Service\Resource
{
  /**
   * Creates an access policy. This method fails if the organization already has
   * an access policy. The long-running operation has a successful status after
   * the access policy propagates to long-lasting storage. Syntactic and basic
   * semantic errors are returned in `metadata` as a BadRequest proto.
   * (accessPolicies.create)
   *
   * @param AccessPolicy $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function create(AccessPolicy $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes an access policy based on the resource name. The long-running
   * operation has a successful status after the access policy is removed from
   * long-lasting storage. (accessPolicies.delete)
   *
   * @param string $name Required. Resource name for the access policy to delete.
   * Format `accessPolicies/{policy_id}`
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
   * Returns an access policy based on the name. (accessPolicies.get)
   *
   * @param string $name Required. Resource name for the access policy to get.
   * Format `accessPolicies/{policy_id}`
   * @param array $optParams Optional parameters.
   * @return AccessPolicy
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], AccessPolicy::class);
  }
  /**
   * Gets the IAM policy for the specified Access Context Manager access policy.
   * (accessPolicies.getIamPolicy)
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
   * Lists all access policies in an organization.
   * (accessPolicies.listAccessPolicies)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Number of AccessPolicy instances to include in the
   * list. Default 100.
   * @opt_param string pageToken Next page token for the next batch of
   * AccessPolicy instances. Defaults to the first page of results.
   * @opt_param string parent Required. Resource name for the container to list
   * AccessPolicy instances from. Format: `organizations/{org_id}`
   * @return ListAccessPoliciesResponse
   */
  public function listAccessPolicies($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListAccessPoliciesResponse::class);
  }
  /**
   * Updates an access policy. The long-running operation from this RPC has a
   * successful status after the changes to the access policy propagate to long-
   * lasting storage. (accessPolicies.patch)
   *
   * @param string $name Output only. Resource name of the `AccessPolicy`. Format:
   * `accessPolicies/{access_policy}`
   * @param AccessPolicy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Mask to control which fields get
   * updated. Must be non-empty.
   * @return Operation
   */
  public function patch($name, AccessPolicy $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Sets the IAM policy for the specified Access Context Manager access policy.
   * This method replaces the existing IAM policy on the access policy. The IAM
   * policy controls the set of users who can perform specific operations on the
   * Access Context Manager access policy. (accessPolicies.setIamPolicy)
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
   * Returns the IAM permissions that the caller has on the specified Access
   * Context Manager resource. The resource can be an AccessPolicy, AccessLevel,
   * or ServicePerimeter. This method does not support other resources.
   * (accessPolicies.testIamPermissions)
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
class_alias(AccessPolicies::class, 'Google_Service_AccessContextManager_Resource_AccessPolicies');
