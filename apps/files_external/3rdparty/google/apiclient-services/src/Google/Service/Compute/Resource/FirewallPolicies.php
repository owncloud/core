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
 * The "firewallPolicies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $firewallPolicies = $computeService->firewallPolicies;
 *  </code>
 */
class Google_Service_Compute_Resource_FirewallPolicies extends Google_Service_Resource
{
  /**
   * Inserts an association for the specified firewall policy.
   * (firewallPolicies.addAssociation)
   *
   * @param string $firewallPolicy Name of the firewall policy to update.
   * @param Google_Service_Compute_FirewallPolicyAssociation $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool replaceExistingAssociation Indicates whether or not to
   * replace it if an association of the attachment already exists. This is false
   * by default, in which case an error will be returned if an association already
   * exists.
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
  public function addAssociation($firewallPolicy, Google_Service_Compute_FirewallPolicyAssociation $postBody, $optParams = array())
  {
    $params = array('firewallPolicy' => $firewallPolicy, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('addAssociation', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Inserts a rule into a firewall policy. (firewallPolicies.addRule)
   *
   * @param string $firewallPolicy Name of the firewall policy to update.
   * @param Google_Service_Compute_FirewallPolicyRule $postBody
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
  public function addRule($firewallPolicy, Google_Service_Compute_FirewallPolicyRule $postBody, $optParams = array())
  {
    $params = array('firewallPolicy' => $firewallPolicy, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('addRule', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Copies rules to the specified firewall policy. (firewallPolicies.cloneRules)
   *
   * @param string $firewallPolicy Name of the firewall policy to update.
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
   * @opt_param string sourceFirewallPolicy The firewall policy from which to copy
   * rules.
   * @return Google_Service_Compute_Operation
   */
  public function cloneRules($firewallPolicy, $optParams = array())
  {
    $params = array('firewallPolicy' => $firewallPolicy);
    $params = array_merge($params, $optParams);
    return $this->call('cloneRules', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Deletes the specified policy. (firewallPolicies.delete)
   *
   * @param string $firewallPolicy Name of the firewall policy to delete.
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
  public function delete($firewallPolicy, $optParams = array())
  {
    $params = array('firewallPolicy' => $firewallPolicy);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Returns the specified firewall policy. (firewallPolicies.get)
   *
   * @param string $firewallPolicy Name of the firewall policy to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Compute_FirewallPolicy
   */
  public function get($firewallPolicy, $optParams = array())
  {
    $params = array('firewallPolicy' => $firewallPolicy);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Compute_FirewallPolicy");
  }
  /**
   * Gets an association with the specified name.
   * (firewallPolicies.getAssociation)
   *
   * @param string $firewallPolicy Name of the firewall policy to which the
   * queried rule belongs.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string name The name of the association to get from the firewall
   * policy.
   * @return Google_Service_Compute_FirewallPolicyAssociation
   */
  public function getAssociation($firewallPolicy, $optParams = array())
  {
    $params = array('firewallPolicy' => $firewallPolicy);
    $params = array_merge($params, $optParams);
    return $this->call('getAssociation', array($params), "Google_Service_Compute_FirewallPolicyAssociation");
  }
  /**
   * Gets the access control policy for a resource. May be empty if no such policy
   * or resource exists. (firewallPolicies.getIamPolicy)
   *
   * @param string $resource Name or id of the resource for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int optionsRequestedPolicyVersion Requested IAM Policy version.
   * @return Google_Service_Compute_Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_Compute_Policy");
  }
  /**
   * Gets a rule of the specified priority. (firewallPolicies.getRule)
   *
   * @param string $firewallPolicy Name of the firewall policy to which the
   * queried rule belongs.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int priority The priority of the rule to get from the firewall
   * policy.
   * @return Google_Service_Compute_FirewallPolicyRule
   */
  public function getRule($firewallPolicy, $optParams = array())
  {
    $params = array('firewallPolicy' => $firewallPolicy);
    $params = array_merge($params, $optParams);
    return $this->call('getRule', array($params), "Google_Service_Compute_FirewallPolicyRule");
  }
  /**
   * Creates a new policy in the specified project using the data included in the
   * request. (firewallPolicies.insert)
   *
   * @param Google_Service_Compute_FirewallPolicy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string parentId Parent ID for this request. The ID can be either
   * be "folders/[FOLDER_ID]" if the parent is a folder or
   * "organizations/[ORGANIZATION_ID]" if the parent is an organization.
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
  public function insert(Google_Service_Compute_FirewallPolicy $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Lists all the policies that have been configured for the specified folder or
   * organization. (firewallPolicies.listFirewallPolicies)
   *
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
   * @opt_param string parentId Parent ID for this request.
   * @opt_param bool returnPartialSuccess Opt-in for partial success behavior
   * which provides partial results in case of failure. The default value is
   * false.
   * @return Google_Service_Compute_FirewallPolicyList
   */
  public function listFirewallPolicies($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Compute_FirewallPolicyList");
  }
  /**
   * Lists associations of a specified target, i.e., organization or folder.
   * (firewallPolicies.listAssociations)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string targetResource The target resource to list associations. It
   * is an organization, or a folder.
   * @return Google_Service_Compute_FirewallPoliciesListAssociationsResponse
   */
  public function listAssociations($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('listAssociations', array($params), "Google_Service_Compute_FirewallPoliciesListAssociationsResponse");
  }
  /**
   * Moves the specified firewall policy. (firewallPolicies.move)
   *
   * @param string $firewallPolicy Name of the firewall policy to update.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string parentId The new parent of the firewall policy.
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
  public function move($firewallPolicy, $optParams = array())
  {
    $params = array('firewallPolicy' => $firewallPolicy);
    $params = array_merge($params, $optParams);
    return $this->call('move', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Patches the specified policy with the data included in the request.
   * (firewallPolicies.patch)
   *
   * @param string $firewallPolicy Name of the firewall policy to update.
   * @param Google_Service_Compute_FirewallPolicy $postBody
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
  public function patch($firewallPolicy, Google_Service_Compute_FirewallPolicy $postBody, $optParams = array())
  {
    $params = array('firewallPolicy' => $firewallPolicy, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Patches a rule of the specified priority. (firewallPolicies.patchRule)
   *
   * @param string $firewallPolicy Name of the firewall policy to update.
   * @param Google_Service_Compute_FirewallPolicyRule $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param int priority The priority of the rule to patch.
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
  public function patchRule($firewallPolicy, Google_Service_Compute_FirewallPolicyRule $postBody, $optParams = array())
  {
    $params = array('firewallPolicy' => $firewallPolicy, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patchRule', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Removes an association for the specified firewall policy.
   * (firewallPolicies.removeAssociation)
   *
   * @param string $firewallPolicy Name of the firewall policy to update.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string name Name for the attachment that will be removed.
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
  public function removeAssociation($firewallPolicy, $optParams = array())
  {
    $params = array('firewallPolicy' => $firewallPolicy);
    $params = array_merge($params, $optParams);
    return $this->call('removeAssociation', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Deletes a rule of the specified priority. (firewallPolicies.removeRule)
   *
   * @param string $firewallPolicy Name of the firewall policy to update.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int priority The priority of the rule to remove from the firewall
   * policy.
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
  public function removeRule($firewallPolicy, $optParams = array())
  {
    $params = array('firewallPolicy' => $firewallPolicy);
    $params = array_merge($params, $optParams);
    return $this->call('removeRule', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. (firewallPolicies.setIamPolicy)
   *
   * @param string $resource Name or id of the resource for this request.
   * @param Google_Service_Compute_GlobalOrganizationSetPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Compute_Policy
   */
  public function setIamPolicy($resource, Google_Service_Compute_GlobalOrganizationSetPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_Compute_Policy");
  }
  /**
   * Returns permissions that a caller has on the specified resource.
   * (firewallPolicies.testIamPermissions)
   *
   * @param string $resource Name or id of the resource for this request.
   * @param Google_Service_Compute_TestPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Compute_TestPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_Compute_TestPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_Compute_TestPermissionsResponse");
  }
}
