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

use Google\Service\AccessContextManager\CommitServicePerimetersRequest;
use Google\Service\AccessContextManager\ListServicePerimetersResponse;
use Google\Service\AccessContextManager\Operation;
use Google\Service\AccessContextManager\ReplaceServicePerimetersRequest;
use Google\Service\AccessContextManager\ServicePerimeter;
use Google\Service\AccessContextManager\TestIamPermissionsRequest;
use Google\Service\AccessContextManager\TestIamPermissionsResponse;

/**
 * The "servicePerimeters" collection of methods.
 * Typical usage is:
 *  <code>
 *   $accesscontextmanagerService = new Google\Service\AccessContextManager(...);
 *   $servicePerimeters = $accesscontextmanagerService->servicePerimeters;
 *  </code>
 */
class AccessPoliciesServicePerimeters extends \Google\Service\Resource
{
  /**
   * Commits the dry-run specification for all the service perimeters in an access
   * policy. A commit operation on a service perimeter involves copying its `spec`
   * field to the `status` field of the service perimeter. Only service perimeters
   * with `use_explicit_dry_run_spec` field set to true are affected by a commit
   * operation. The long-running operation from this RPC has a successful status
   * after the dry-run specifications for all the service perimeters have been
   * committed. If a commit fails, it causes the long-running operation to return
   * an error response and the entire commit operation is cancelled. When
   * successful, the Operation.response field contains
   * CommitServicePerimetersResponse. The `dry_run` and the `spec` fields are
   * cleared after a successful commit operation. (servicePerimeters.commit)
   *
   * @param string $parent Required. Resource name for the parent Access Policy
   * which owns all Service Perimeters in scope for the commit operation. Format:
   * `accessPolicies/{policy_id}`
   * @param CommitServicePerimetersRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function commit($parent, CommitServicePerimetersRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('commit', [$params], Operation::class);
  }
  /**
   * Creates a service perimeter. The long-running operation from this RPC has a
   * successful status after the service perimeter propagates to long-lasting
   * storage. If a service perimeter contains errors, an error response is
   * returned for the first error encountered. (servicePerimeters.create)
   *
   * @param string $parent Required. Resource name for the access policy which
   * owns this Service Perimeter. Format: `accessPolicies/{policy_id}`
   * @param ServicePerimeter $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function create($parent, ServicePerimeter $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a service perimeter based on the resource name. The long-running
   * operation from this RPC has a successful status after the service perimeter
   * is removed from long-lasting storage. (servicePerimeters.delete)
   *
   * @param string $name Required. Resource name for the Service Perimeter.
   * Format: `accessPolicies/{policy_id}/servicePerimeters/{service_perimeter_id}`
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
   * Gets a service perimeter based on the resource name. (servicePerimeters.get)
   *
   * @param string $name Required. Resource name for the Service Perimeter.
   * Format:
   * `accessPolicies/{policy_id}/servicePerimeters/{service_perimeters_id}`
   * @param array $optParams Optional parameters.
   * @return ServicePerimeter
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ServicePerimeter::class);
  }
  /**
   * Lists all service perimeters for an access policy.
   * (servicePerimeters.listAccessPoliciesServicePerimeters)
   *
   * @param string $parent Required. Resource name for the access policy to list
   * Service Perimeters from. Format: `accessPolicies/{policy_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Number of Service Perimeters to include in the list.
   * Default 100.
   * @opt_param string pageToken Next page token for the next batch of Service
   * Perimeter instances. Defaults to the first page of results.
   * @return ListServicePerimetersResponse
   */
  public function listAccessPoliciesServicePerimeters($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListServicePerimetersResponse::class);
  }
  /**
   * Updates a service perimeter. The long-running operation from this RPC has a
   * successful status after the service perimeter propagates to long-lasting
   * storage. If a service perimeter contains errors, an error response is
   * returned for the first error encountered. (servicePerimeters.patch)
   *
   * @param string $name Required. Resource name for the ServicePerimeter. The
   * `short_name` component must begin with a letter and only include alphanumeric
   * and '_'. Format:
   * `accessPolicies/{access_policy}/servicePerimeters/{service_perimeter}`
   * @param ServicePerimeter $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Mask to control which fields get
   * updated. Must be non-empty.
   * @return Operation
   */
  public function patch($name, ServicePerimeter $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Replace all existing service perimeters in an access policy with the service
   * perimeters provided. This is done atomically. The long-running operation from
   * this RPC has a successful status after all replacements propagate to long-
   * lasting storage. Replacements containing errors result in an error response
   * for the first error encountered. Upon an error, replacement are cancelled and
   * existing service perimeters are not affected. The Operation.response field
   * contains ReplaceServicePerimetersResponse. (servicePerimeters.replaceAll)
   *
   * @param string $parent Required. Resource name for the access policy which
   * owns these Service Perimeters. Format: `accessPolicies/{policy_id}`
   * @param ReplaceServicePerimetersRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function replaceAll($parent, ReplaceServicePerimetersRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('replaceAll', [$params], Operation::class);
  }
  /**
   * Returns the IAM permissions that the caller has on the specified Access
   * Context Manager resource. The resource can be an AccessPolicy, AccessLevel,
   * or ServicePerimeter. This method does not support other resources.
   * (servicePerimeters.testIamPermissions)
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
class_alias(AccessPoliciesServicePerimeters::class, 'Google_Service_AccessContextManager_Resource_AccessPoliciesServicePerimeters');
