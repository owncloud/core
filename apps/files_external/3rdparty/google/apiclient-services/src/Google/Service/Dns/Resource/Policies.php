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

/**
 * The "policies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dnsService = new Google_Service_Dns(...);
 *   $policies = $dnsService->policies;
 *  </code>
 */
class Google_Service_Dns_Resource_Policies extends Google_Service_Resource
{
  /**
   * Creates a new Policy. (policies.create)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param Google_Service_Dns_Policy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return Google_Service_Dns_Policy
   */
  public function create($project, Google_Service_Dns_Policy $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Dns_Policy");
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
  public function delete($project, $policy, $optParams = array())
  {
    $params = array('project' => $project, 'policy' => $policy);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
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
   * @return Google_Service_Dns_Policy
   */
  public function get($project, $policy, $optParams = array())
  {
    $params = array('project' => $project, 'policy' => $policy);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dns_Policy");
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
   * @return Google_Service_Dns_PoliciesListResponse
   */
  public function listPolicies($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dns_PoliciesListResponse");
  }
  /**
   * Apply a partial update to an existing Policy. (policies.patch)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $policy User given friendly name of the policy addressed by
   * this request.
   * @param Google_Service_Dns_Policy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return Google_Service_Dns_PoliciesPatchResponse
   */
  public function patch($project, $policy, Google_Service_Dns_Policy $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'policy' => $policy, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Dns_PoliciesPatchResponse");
  }
  /**
   * Update an existing Policy. (policies.update)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $policy User given friendly name of the policy addressed by
   * this request.
   * @param Google_Service_Dns_Policy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return Google_Service_Dns_PoliciesUpdateResponse
   */
  public function update($project, $policy, Google_Service_Dns_Policy $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'policy' => $policy, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Dns_PoliciesUpdateResponse");
  }
}
