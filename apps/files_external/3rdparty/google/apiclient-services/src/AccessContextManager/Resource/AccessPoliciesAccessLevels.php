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

use Google\Service\AccessContextManager\AccessLevel;
use Google\Service\AccessContextManager\ListAccessLevelsResponse;
use Google\Service\AccessContextManager\Operation;
use Google\Service\AccessContextManager\ReplaceAccessLevelsRequest;
use Google\Service\AccessContextManager\TestIamPermissionsRequest;
use Google\Service\AccessContextManager\TestIamPermissionsResponse;

/**
 * The "accessLevels" collection of methods.
 * Typical usage is:
 *  <code>
 *   $accesscontextmanagerService = new Google\Service\AccessContextManager(...);
 *   $accessLevels = $accesscontextmanagerService->accessLevels;
 *  </code>
 */
class AccessPoliciesAccessLevels extends \Google\Service\Resource
{
  /**
   * Creates an access level. The long-running operation from this RPC has a
   * successful status after the access level propagates to long-lasting storage.
   * If access levels contain errors, an error response is returned for the first
   * error encountered. (accessLevels.create)
   *
   * @param string $parent Required. Resource name for the access policy which
   * owns this Access Level. Format: `accessPolicies/{policy_id}`
   * @param AccessLevel $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function create($parent, AccessLevel $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes an access level based on the resource name. The long-running
   * operation from this RPC has a successful status after the access level has
   * been removed from long-lasting storage. (accessLevels.delete)
   *
   * @param string $name Required. Resource name for the Access Level. Format:
   * `accessPolicies/{policy_id}/accessLevels/{access_level_id}`
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
   * Gets an access level based on the resource name. (accessLevels.get)
   *
   * @param string $name Required. Resource name for the Access Level. Format:
   * `accessPolicies/{policy_id}/accessLevels/{access_level_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string accessLevelFormat Whether to return `BasicLevels` in the
   * Cloud Common Expression Language rather than as `BasicLevels`. Defaults to
   * AS_DEFINED, where Access Levels are returned as `BasicLevels` or
   * `CustomLevels` based on how they were created. If set to CEL, all Access
   * Levels are returned as `CustomLevels`. In the CEL case, `BasicLevels` are
   * translated to equivalent `CustomLevels`.
   * @return AccessLevel
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], AccessLevel::class);
  }
  /**
   * Lists all access levels for an access policy.
   * (accessLevels.listAccessPoliciesAccessLevels)
   *
   * @param string $parent Required. Resource name for the access policy to list
   * Access Levels from. Format: `accessPolicies/{policy_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string accessLevelFormat Whether to return `BasicLevels` in the
   * Cloud Common Expression language, as `CustomLevels`, rather than as
   * `BasicLevels`. Defaults to returning `AccessLevels` in the format they were
   * defined.
   * @opt_param int pageSize Number of Access Levels to include in the list.
   * Default 100.
   * @opt_param string pageToken Next page token for the next batch of Access
   * Level instances. Defaults to the first page of results.
   * @return ListAccessLevelsResponse
   */
  public function listAccessPoliciesAccessLevels($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListAccessLevelsResponse::class);
  }
  /**
   * Updates an access level. The long-running operation from this RPC has a
   * successful status after the changes to the access level propagate to long-
   * lasting storage. If access levels contain errors, an error response is
   * returned for the first error encountered. (accessLevels.patch)
   *
   * @param string $name Required. Resource name for the Access Level. The
   * `short_name` component must begin with a letter and only include alphanumeric
   * and '_'. Format:
   * `accessPolicies/{access_policy}/accessLevels/{access_level}`. The maximum
   * length of the `access_level` component is 50 characters.
   * @param AccessLevel $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Mask to control which fields get
   * updated. Must be non-empty.
   * @return Operation
   */
  public function patch($name, AccessLevel $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Replaces all existing access levels in an access policy with the access
   * levels provided. This is done atomically. The long-running operation from
   * this RPC has a successful status after all replacements propagate to long-
   * lasting storage. If the replacement contains errors, an error response is
   * returned for the first error encountered. Upon error, the replacement is
   * cancelled, and existing access levels are not affected. The
   * Operation.response field contains ReplaceAccessLevelsResponse. Removing
   * access levels contained in existing service perimeters result in an error.
   * (accessLevels.replaceAll)
   *
   * @param string $parent Required. Resource name for the access policy which
   * owns these Access Levels. Format: `accessPolicies/{policy_id}`
   * @param ReplaceAccessLevelsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function replaceAll($parent, ReplaceAccessLevelsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('replaceAll', [$params], Operation::class);
  }
  /**
   * Returns the IAM permissions that the caller has on the specified Access
   * Context Manager resource. The resource can be an AccessPolicy, AccessLevel,
   * or ServicePerimeter. This method does not support other resources.
   * (accessLevels.testIamPermissions)
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
class_alias(AccessPoliciesAccessLevels::class, 'Google_Service_AccessContextManager_Resource_AccessPoliciesAccessLevels');
