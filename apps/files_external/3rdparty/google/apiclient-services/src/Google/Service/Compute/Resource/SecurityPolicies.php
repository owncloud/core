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
 * The "securityPolicies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $securityPolicies = $computeService->securityPolicies;
 *  </code>
 */
class Google_Service_Compute_Resource_SecurityPolicies extends Google_Service_Resource
{
  /**
   * Inserts a rule into a security policy. (securityPolicies.addRule)
   *
   * @param string $project Project ID for this request.
   * @param string $securityPolicy Name of the security policy to update.
   * @param Google_Service_Compute_SecurityPolicyRule $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Compute_Operation
   */
  public function addRule($project, $securityPolicy, Google_Service_Compute_SecurityPolicyRule $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'securityPolicy' => $securityPolicy, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('addRule', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Deletes the specified policy. (securityPolicies.delete)
   *
   * @param string $project Project ID for this request.
   * @param string $securityPolicy Name of the security policy to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed.
   *
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments.
   *
   * The request ID must be a valid UUID with the exception that zero UUID is not
   * supported (00000000-0000-0000-0000-000000000000).
   * @return Google_Service_Compute_Operation
   */
  public function delete($project, $securityPolicy, $optParams = array())
  {
    $params = array('project' => $project, 'securityPolicy' => $securityPolicy);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * List all of the ordered rules present in a single specified policy.
   * (securityPolicies.get)
   *
   * @param string $project Project ID for this request.
   * @param string $securityPolicy Name of the security policy to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Compute_SecurityPolicy
   */
  public function get($project, $securityPolicy, $optParams = array())
  {
    $params = array('project' => $project, 'securityPolicy' => $securityPolicy);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Compute_SecurityPolicy");
  }
  /**
   * Gets a rule at the specified priority. (securityPolicies.getRule)
   *
   * @param string $project Project ID for this request.
   * @param string $securityPolicy Name of the security policy to which the
   * queried rule belongs.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int priority The priority of the rule to get from the security
   * policy.
   * @return Google_Service_Compute_SecurityPolicyRule
   */
  public function getRule($project, $securityPolicy, $optParams = array())
  {
    $params = array('project' => $project, 'securityPolicy' => $securityPolicy);
    $params = array_merge($params, $optParams);
    return $this->call('getRule', array($params), "Google_Service_Compute_SecurityPolicyRule");
  }
  /**
   * Creates a new policy in the specified project using the data included in the
   * request. (securityPolicies.insert)
   *
   * @param string $project Project ID for this request.
   * @param Google_Service_Compute_SecurityPolicy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed.
   *
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments.
   *
   * The request ID must be a valid UUID with the exception that zero UUID is not
   * supported (00000000-0000-0000-0000-000000000000).
   * @return Google_Service_Compute_Operation
   */
  public function insert($project, Google_Service_Compute_SecurityPolicy $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * List all the policies that have been configured for the specified project.
   * (securityPolicies.listSecurityPolicies)
   *
   * @param string $project Project ID for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter expression that filters resources listed in
   * the response. The expression must specify the field name, a comparison
   * operator, and the value that you want to use for filtering. The value must be
   * a string, a number, or a boolean. The comparison operator must be either `=`,
   * `!=`, `>`, or `<`.
   *
   * For example, if you are filtering Compute Engine instances, you can exclude
   * instances named `example-instance` by specifying `name != example-instance`.
   *
   * You can also filter nested fields. For example, you could specify
   * `scheduling.automaticRestart = false` to include instances only if they are
   * not scheduled for automatic restarts. You can use filtering on nested fields
   * to filter based on resource labels.
   *
   * To filter on multiple expressions, provide each separate expression within
   * parentheses. For example: ``` (scheduling.automaticRestart = true)
   * (cpuPlatform = "Intel Skylake") ``` By default, each expression is an `AND`
   * expression. However, you can include `AND` and `OR` expressions explicitly.
   * For example: ``` (cpuPlatform = "Intel Skylake") OR (cpuPlatform = "Intel
   * Broadwell") AND (scheduling.automaticRestart = true) ```
   * @opt_param string maxResults The maximum number of results per page that
   * should be returned. If the number of available results is larger than
   * `maxResults`, Compute Engine returns a `nextPageToken` that can be used to
   * get the next page of results in subsequent list requests. Acceptable values
   * are `0` to `500`, inclusive. (Default: `500`)
   * @opt_param string orderBy Sorts list results by a certain order. By default,
   * results are returned in alphanumerical order based on the resource name.
   *
   * You can also sort results in descending order based on the creation timestamp
   * using `orderBy="creationTimestamp desc"`. This sorts results based on the
   * `creationTimestamp` field in reverse chronological order (newest result
   * first). Use this to sort resources like operations so that the newest
   * operation is returned first.
   *
   * Currently, only sorting by `name` or `creationTimestamp desc` is supported.
   * @opt_param string pageToken Specifies a page token to use. Set `pageToken` to
   * the `nextPageToken` returned by a previous list request to get the next page
   * of results.
   * @opt_param bool returnPartialSuccess Opt-in for partial success behavior
   * which provides partial results in case of failure. The default value is false
   * and the logic is the same as today.
   * @return Google_Service_Compute_SecurityPolicyList
   */
  public function listSecurityPolicies($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Compute_SecurityPolicyList");
  }
  /**
   * Gets the current list of preconfigured Web Application Firewall (WAF)
   * expressions. (securityPolicies.listPreconfiguredExpressionSets)
   *
   * @param string $project Project ID for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter expression that filters resources listed in
   * the response. The expression must specify the field name, a comparison
   * operator, and the value that you want to use for filtering. The value must be
   * a string, a number, or a boolean. The comparison operator must be either `=`,
   * `!=`, `>`, or `<`.
   *
   * For example, if you are filtering Compute Engine instances, you can exclude
   * instances named `example-instance` by specifying `name != example-instance`.
   *
   * You can also filter nested fields. For example, you could specify
   * `scheduling.automaticRestart = false` to include instances only if they are
   * not scheduled for automatic restarts. You can use filtering on nested fields
   * to filter based on resource labels.
   *
   * To filter on multiple expressions, provide each separate expression within
   * parentheses. For example: ``` (scheduling.automaticRestart = true)
   * (cpuPlatform = "Intel Skylake") ``` By default, each expression is an `AND`
   * expression. However, you can include `AND` and `OR` expressions explicitly.
   * For example: ``` (cpuPlatform = "Intel Skylake") OR (cpuPlatform = "Intel
   * Broadwell") AND (scheduling.automaticRestart = true) ```
   * @opt_param string maxResults The maximum number of results per page that
   * should be returned. If the number of available results is larger than
   * `maxResults`, Compute Engine returns a `nextPageToken` that can be used to
   * get the next page of results in subsequent list requests. Acceptable values
   * are `0` to `500`, inclusive. (Default: `500`)
   * @opt_param string orderBy Sorts list results by a certain order. By default,
   * results are returned in alphanumerical order based on the resource name.
   *
   * You can also sort results in descending order based on the creation timestamp
   * using `orderBy="creationTimestamp desc"`. This sorts results based on the
   * `creationTimestamp` field in reverse chronological order (newest result
   * first). Use this to sort resources like operations so that the newest
   * operation is returned first.
   *
   * Currently, only sorting by `name` or `creationTimestamp desc` is supported.
   * @opt_param string pageToken Specifies a page token to use. Set `pageToken` to
   * the `nextPageToken` returned by a previous list request to get the next page
   * of results.
   * @opt_param bool returnPartialSuccess Opt-in for partial success behavior
   * which provides partial results in case of failure. The default value is false
   * and the logic is the same as today.
   * @return Google_Service_Compute_SecurityPoliciesListPreconfiguredExpressionSetsResponse
   */
  public function listPreconfiguredExpressionSets($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('listPreconfiguredExpressionSets', array($params), "Google_Service_Compute_SecurityPoliciesListPreconfiguredExpressionSetsResponse");
  }
  /**
   * Patches the specified policy with the data included in the request.
   * (securityPolicies.patch)
   *
   * @param string $project Project ID for this request.
   * @param string $securityPolicy Name of the security policy to update.
   * @param Google_Service_Compute_SecurityPolicy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed.
   *
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments.
   *
   * The request ID must be a valid UUID with the exception that zero UUID is not
   * supported (00000000-0000-0000-0000-000000000000).
   * @return Google_Service_Compute_Operation
   */
  public function patch($project, $securityPolicy, Google_Service_Compute_SecurityPolicy $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'securityPolicy' => $securityPolicy, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Patches a rule at the specified priority. (securityPolicies.patchRule)
   *
   * @param string $project Project ID for this request.
   * @param string $securityPolicy Name of the security policy to update.
   * @param Google_Service_Compute_SecurityPolicyRule $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param int priority The priority of the rule to patch.
   * @return Google_Service_Compute_Operation
   */
  public function patchRule($project, $securityPolicy, Google_Service_Compute_SecurityPolicyRule $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'securityPolicy' => $securityPolicy, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patchRule', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Deletes a rule at the specified priority. (securityPolicies.removeRule)
   *
   * @param string $project Project ID for this request.
   * @param string $securityPolicy Name of the security policy to update.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int priority The priority of the rule to remove from the security
   * policy.
   * @return Google_Service_Compute_Operation
   */
  public function removeRule($project, $securityPolicy, $optParams = array())
  {
    $params = array('project' => $project, 'securityPolicy' => $securityPolicy);
    $params = array_merge($params, $optParams);
    return $this->call('removeRule', array($params), "Google_Service_Compute_Operation");
  }
}
