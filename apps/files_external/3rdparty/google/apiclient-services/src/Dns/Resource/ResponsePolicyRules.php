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

use Google\Service\Dns\ResponsePolicyRule;
use Google\Service\Dns\ResponsePolicyRulesListResponse;
use Google\Service\Dns\ResponsePolicyRulesPatchResponse;
use Google\Service\Dns\ResponsePolicyRulesUpdateResponse;

/**
 * The "responsePolicyRules" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dnsService = new Google\Service\Dns(...);
 *   $responsePolicyRules = $dnsService->responsePolicyRules;
 *  </code>
 */
class ResponsePolicyRules extends \Google\Service\Resource
{
  /**
   * Creates a new Response Policy Rule. (responsePolicyRules.create)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $location Specifies the location of the resource. This
   * information will be used for routing and will be part of the resource name.
   * @param string $responsePolicy User assigned name of the Response Policy
   * containing the Response Policy Rule.
   * @param ResponsePolicyRule $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return ResponsePolicyRule
   */
  public function create($project, $location, $responsePolicy, ResponsePolicyRule $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'location' => $location, 'responsePolicy' => $responsePolicy, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], ResponsePolicyRule::class);
  }
  /**
   * Deletes a previously created Response Policy Rule.
   * (responsePolicyRules.delete)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $location Specifies the location of the resource. This
   * information will be used for routing and will be part of the resource name.
   * @param string $responsePolicy User assigned name of the Response Policy
   * containing the Response Policy Rule.
   * @param string $responsePolicyRule User assigned name of the Response Policy
   * Rule addressed by this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   */
  public function delete($project, $location, $responsePolicy, $responsePolicyRule, $optParams = [])
  {
    $params = ['project' => $project, 'location' => $location, 'responsePolicy' => $responsePolicy, 'responsePolicyRule' => $responsePolicyRule];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Fetches the representation of an existing Response Policy Rule.
   * (responsePolicyRules.get)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $location Specifies the location of the resource. This
   * information will be used for routing and will be part of the resource name.
   * @param string $responsePolicy User assigned name of the Response Policy
   * containing the Response Policy Rule.
   * @param string $responsePolicyRule User assigned name of the Response Policy
   * Rule addressed by this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return ResponsePolicyRule
   */
  public function get($project, $location, $responsePolicy, $responsePolicyRule, $optParams = [])
  {
    $params = ['project' => $project, 'location' => $location, 'responsePolicy' => $responsePolicy, 'responsePolicyRule' => $responsePolicyRule];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ResponsePolicyRule::class);
  }
  /**
   * Enumerates all Response Policy Rules associated with a project.
   * (responsePolicyRules.listResponsePolicyRules)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $location Specifies the location of the resource. This
   * information will be used for routing and will be part of the resource name.
   * @param string $responsePolicy User assigned name of the Response Policy to
   * list.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxResults Optional. Maximum number of results to be returned.
   * If unspecified, the server decides how many results to return.
   * @opt_param string pageToken Optional. A tag returned by a previous list
   * request that was truncated. Use this parameter to continue a previous list
   * request.
   * @return ResponsePolicyRulesListResponse
   */
  public function listResponsePolicyRules($project, $location, $responsePolicy, $optParams = [])
  {
    $params = ['project' => $project, 'location' => $location, 'responsePolicy' => $responsePolicy];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ResponsePolicyRulesListResponse::class);
  }
  /**
   * Applies a partial update to an existing Response Policy Rule.
   * (responsePolicyRules.patch)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $location Specifies the location of the resource. This
   * information will be used for routing and will be part of the resource name.
   * @param string $responsePolicy User assigned name of the Response Policy
   * containing the Response Policy Rule.
   * @param string $responsePolicyRule User assigned name of the Response Policy
   * Rule addressed by this request.
   * @param ResponsePolicyRule $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return ResponsePolicyRulesPatchResponse
   */
  public function patch($project, $location, $responsePolicy, $responsePolicyRule, ResponsePolicyRule $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'location' => $location, 'responsePolicy' => $responsePolicy, 'responsePolicyRule' => $responsePolicyRule, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], ResponsePolicyRulesPatchResponse::class);
  }
  /**
   * Updates an existing Response Policy Rule. (responsePolicyRules.update)
   *
   * @param string $project Identifies the project addressed by this request.
   * @param string $location Specifies the location of the resource. This
   * information will be used for routing and will be part of the resource name.
   * @param string $responsePolicy User assigned name of the Response Policy
   * containing the Response Policy Rule.
   * @param string $responsePolicyRule User assigned name of the Response Policy
   * Rule addressed by this request.
   * @param ResponsePolicyRule $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string clientOperationId For mutating operation requests only. An
   * optional identifier specified by the client. Must be unique for operation
   * resources in the Operations collection.
   * @return ResponsePolicyRulesUpdateResponse
   */
  public function update($project, $location, $responsePolicy, $responsePolicyRule, ResponsePolicyRule $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'location' => $location, 'responsePolicy' => $responsePolicy, 'responsePolicyRule' => $responsePolicyRule, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], ResponsePolicyRulesUpdateResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResponsePolicyRules::class, 'Google_Service_Dns_Resource_ResponsePolicyRules');
