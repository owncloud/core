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

use Google\Service\Dns\ResponsePoliciesListResponse;
use Google\Service\Dns\ResponsePoliciesPatchResponse;
use Google\Service\Dns\ResponsePoliciesUpdateResponse;
use Google\Service\Dns\ResponsePolicy;

/**
 * The "responsePolicies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dnsService = new Google\Service\Dns(...);
 *   $responsePolicies = $dnsService->responsePolicies;
 *  </code>
 */
class ResponsePolicies extends \Google\Service\Resource
{
  /**
   * Creates a new Response Policy (responsePolicies.create)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $location Specifies the location of the resource, only
   * applicable in the v APIs. This information will be used for routing and will
   * be part of the resource name.
   * @param ResponsePolicy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return ResponsePolicy
   */
  public function create($project, $location, ResponsePolicy $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'location' => $location, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], ResponsePolicy::class);
  }
  /**
   * Deletes a previously created Response Policy. Fails if the response policy is
   * non-empty or still being referenced by a network. (responsePolicies.delete)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $location Specifies the location of the resource. This
   * information will be used for routing and will be part of the resource name.
   * @param string $responsePolicy User assigned name of the Response Policy
   * addressed by this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   */
  public function delete($project, $location, $responsePolicy, $optParams = [])
  {
    $params = ['project' => $project, 'location' => $location, 'responsePolicy' => $responsePolicy];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Fetches the representation of an existing Response Policy.
   * (responsePolicies.get)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $location Specifies the location of the resource. This
   * information will be used for routing and will be part of the resource name.
   * @param string $responsePolicy User assigned name of the Response Policy
   * addressed by this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return ResponsePolicy
   */
  public function get($project, $location, $responsePolicy, $optParams = [])
  {
    $params = ['project' => $project, 'location' => $location, 'responsePolicy' => $responsePolicy];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ResponsePolicy::class);
  }
  /**
   * Enumerates all Response Policies associated with a project.
   * (responsePolicies.listResponsePolicies)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $location Specifies the location of the resource. This
   * information will be used for routing and will be part of the resource name.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Optional. Maximum number of results to be returned.
   * If unspecified, the server decides how many results to return.
   * @opt_param string pageToken Optional. A tag returned by a previous list
   * request that was truncated. Use this parameter to continue a previous list
   * request.
   * @return ResponsePoliciesListResponse
   */
  public function listResponsePolicies($project, $location, $optParams = [])
  {
    $params = ['project' => $project, 'location' => $location];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ResponsePoliciesListResponse::class);
  }
  /**
   * Applies a partial update to an existing Response Policy.
   * (responsePolicies.patch)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $location Specifies the location of the resource. This
   * information will be used for routing and will be part of the resource name.
   * @param string $responsePolicy User assigned name of the Respones Policy
   * addressed by this request.
   * @param ResponsePolicy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return ResponsePoliciesPatchResponse
   */
  public function patch($project, $location, $responsePolicy, ResponsePolicy $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'location' => $location, 'responsePolicy' => $responsePolicy, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], ResponsePoliciesPatchResponse::class);
  }
  /**
   * Updates an existing Response Policy. (responsePolicies.update)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $location Specifies the location of the resource. This
   * information will be used for routing and will be part of the resource name.
   * @param string $responsePolicy User assigned name of the Response Policy
   * addressed by this request.
   * @param ResponsePolicy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return ResponsePoliciesUpdateResponse
   */
  public function update($project, $location, $responsePolicy, ResponsePolicy $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'location' => $location, 'responsePolicy' => $responsePolicy, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], ResponsePoliciesUpdateResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResponsePolicies::class, 'Google_Service_Dns_Resource_ResponsePolicies');
