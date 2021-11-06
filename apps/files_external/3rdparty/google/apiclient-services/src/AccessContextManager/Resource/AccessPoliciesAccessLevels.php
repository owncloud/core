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
   * Create an Access Level. The longrunning operation from this RPC will have a
   * successful status once the Access Level has propagated to long-lasting
   * storage. Access Levels containing errors will result in an error response for
   * the first error encountered. (accessLevels.create)
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
   * Delete an Access Level by resource name. The longrunning operation from this
   * RPC will have a successful status once the Access Level has been removed from
   * long-lasting storage. (accessLevels.delete)
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
   * Get an Access Level by resource name. (accessLevels.get)
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
   * List all Access Levels for an access policy.
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
   * Update an Access Level. The longrunning operation from this RPC will have a
   * successful status once the changes to the Access Level have propagated to
   * long-lasting storage. Access Levels containing errors will result in an error
   * response for the first error encountered. (accessLevels.patch)
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
   * Replace all existing Access Levels in an Access Policy with the Access Levels
   * provided. This is done atomically. The longrunning operation from this RPC
   * will have a successful status once all replacements have propagated to long-
   * lasting storage. Replacements containing errors will result in an error
   * response for the first error encountered. Replacement will be cancelled on
   * error, existing Access Levels will not be affected. Operation.response field
   * will contain ReplaceAccessLevelsResponse. Removing Access Levels contained in
   * existing Service Perimeters will result in error. (accessLevels.replaceAll)
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccessPoliciesAccessLevels::class, 'Google_Service_AccessContextManager_Resource_AccessPoliciesAccessLevels');
