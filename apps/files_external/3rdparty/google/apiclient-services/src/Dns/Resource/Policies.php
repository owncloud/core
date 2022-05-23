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

namespace Google\Service\Dns\Resource;

use Google\Service\Dns\PoliciesListResponse;
use Google\Service\Dns\PoliciesPatchResponse;
use Google\Service\Dns\PoliciesUpdateResponse;
use Google\Service\Dns\Policy;

/**
 * The "policies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dnsService = new Google\Service\Dns(...);
 *   $policies = $dnsService->policies;
 *  </code>
 */
class Policies extends \Google\Service\Resource
{
  /**
   * Creates a new Policy. (policies.create)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param Policy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return Policy
   */
  public function create($project, Policy $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Policy::class);
  }
  /**
   * Deletes a previously created Policy. Fails if the policy is still being
   * referenced by a network. (policies.delete)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $policy User given friendly name of the policy addressed by
   * this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   */
  public function delete($project, $policy, $optParams = [])
  {
    $params = ['project' => $project, 'policy' => $policy];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Fetches the representation of an existing Policy. (policies.get)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $policy User given friendly name of the policy addressed by
   * this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return Policy
   */
  public function get($project, $policy, $optParams = [])
  {
    $params = ['project' => $project, 'policy' => $policy];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Policy::class);
  }
  /**
   * Enumerates all Policies associated with a project. (policies.listPolicies)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Optional. Maximum number of results to be returned.
   * If unspecified, the server decides how many results to return.
   * @opt_param string pageToken Optional. A tag returned by a previous list
   * request that was truncated. Use this parameter to continue a previous list
   * request.
   * @return PoliciesListResponse
   */
  public function listPolicies($project, $optParams = [])
  {
    $params = ['project' => $project];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], PoliciesListResponse::class);
  }
  /**
   * Applies a partial update to an existing Policy. (policies.patch)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $policy User given friendly name of the policy addressed by
   * this request.
   * @param Policy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return PoliciesPatchResponse
   */
  public function patch($project, $policy, Policy $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'policy' => $policy, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], PoliciesPatchResponse::class);
  }
  /**
   * Updates an existing Policy. (policies.update)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $policy User given friendly name of the policy addressed by
   * this request.
   * @param Policy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return PoliciesUpdateResponse
   */
  public function update($project, $policy, Policy $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'policy' => $policy, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], PoliciesUpdateResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Policies::class, 'Google_Service_Dns_Resource_Policies');
