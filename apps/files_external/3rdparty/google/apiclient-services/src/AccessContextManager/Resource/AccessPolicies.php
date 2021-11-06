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
use Google\Service\AccessContextManager\ListAccessPoliciesResponse;
use Google\Service\AccessContextManager\Operation;

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
   * Create an `AccessPolicy`. Fails if this organization already has a
   * `AccessPolicy`. The longrunning Operation will have a successful status once
   * the `AccessPolicy` has propagated to long-lasting storage. Syntactic and
   * basic semantic errors will be returned in `metadata` as a BadRequest proto.
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
   * Delete an AccessPolicy by resource name. The longrunning Operation will have
   * a successful status once the AccessPolicy has been removed from long-lasting
   * storage. (accessPolicies.delete)
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
   * Get an AccessPolicy by name. (accessPolicies.get)
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
   * List all AccessPolicies under a container.
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
   * Update an AccessPolicy. The longrunning Operation from this RPC will have a
   * successful status once the changes to the AccessPolicy have propagated to
   * long-lasting storage. Syntactic and basic semantic errors will be returned in
   * `metadata` as a BadRequest proto. (accessPolicies.patch)
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccessPolicies::class, 'Google_Service_AccessContextManager_Resource_AccessPolicies');
