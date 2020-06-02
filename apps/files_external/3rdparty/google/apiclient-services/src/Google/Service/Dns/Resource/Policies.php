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
   * (policies.create)
   *
   * @param string $project
   * @param Google_Service_Dns_Policy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId
   * @return Google_Service_Dns_Policy
   */
  public function create($project, Google_Service_Dns_Policy $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Dns_Policy");
  }
  /**
   * (policies.delete)
   *
   * @param string $project
   * @param string $policy
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId
   */
  public function delete($project, $policy, $optParams = array())
  {
    $params = array('project' => $project, 'policy' => $policy);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * (policies.get)
   *
   * @param string $project
   * @param string $policy
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId
   * @return Google_Service_Dns_Policy
   */
  public function get($project, $policy, $optParams = array())
  {
    $params = array('project' => $project, 'policy' => $policy);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Dns_Policy");
  }
  /**
   * (policies.listPolicies)
   *
   * @param string $project
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults
   * @opt_param string pageToken
   * @return Google_Service_Dns_PoliciesListResponse
   */
  public function listPolicies($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Dns_PoliciesListResponse");
  }
  /**
   * (policies.patch)
   *
   * @param string $project
   * @param string $policy
   * @param Google_Service_Dns_Policy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId
   * @return Google_Service_Dns_PoliciesPatchResponse
   */
  public function patch($project, $policy, Google_Service_Dns_Policy $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'policy' => $policy, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Dns_PoliciesPatchResponse");
  }
  /**
   * (policies.update)
   *
   * @param string $project
   * @param string $policy
   * @param Google_Service_Dns_Policy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId
   * @return Google_Service_Dns_PoliciesUpdateResponse
   */
  public function update($project, $policy, Google_Service_Dns_Policy $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'policy' => $policy, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Dns_PoliciesUpdateResponse");
  }
}
