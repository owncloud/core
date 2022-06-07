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

namespace Google\Service\Compute\Resource;

use Google\Service\Compute\FirewallPolicy;
use Google\Service\Compute\FirewallPolicyAssociation;
use Google\Service\Compute\FirewallPolicyList;
use Google\Service\Compute\FirewallPolicyRule;
use Google\Service\Compute\GlobalSetPolicyRequest;
use Google\Service\Compute\Operation;
use Google\Service\Compute\Policy;
use Google\Service\Compute\TestPermissionsRequest;
use Google\Service\Compute\TestPermissionsResponse;

/**
 * The "networkFirewallPolicies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google\Service\Compute(...);
 *   $networkFirewallPolicies = $computeService->networkFirewallPolicies;
 *  </code>
 */
class NetworkFirewallPolicies extends \Google\Service\Resource
{
  /**
   * Inserts an association for the specified firewall policy.
   * (networkFirewallPolicies.addAssociation)
   *
   * @param string $project Project ID for this request.
   * @param string $firewallPolicy Name of the firewall policy to update.
   * @param FirewallPolicyAssociation $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool replaceExistingAssociation Indicates whether or not to
   * replace it if an association of the attachment already exists. This is false
   * by default, in which case an error will be returned if an association already
   * exists.
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function addAssociation($project, $firewallPolicy, FirewallPolicyAssociation $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'firewallPolicy' => $firewallPolicy, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addAssociation', [$params], Operation::class);
  }
  /**
   * Inserts a rule into a firewall policy. (networkFirewallPolicies.addRule)
   *
   * @param string $project Project ID for this request.
   * @param string $firewallPolicy Name of the firewall policy to update.
   * @param FirewallPolicyRule $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param int maxPriority When rule.priority is not specified, auto choose a
   * unused priority between minPriority and maxPriority>. This field is exclusive
   * with rule.priority.
   * @opt_param int minPriority When rule.priority is not specified, auto choose a
   * unused priority between minPriority and maxPriority>. This field is exclusive
   * with rule.priority.
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function addRule($project, $firewallPolicy, FirewallPolicyRule $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'firewallPolicy' => $firewallPolicy, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addRule', [$params], Operation::class);
  }
  /**
   * Copies rules to the specified firewall policy.
   * (networkFirewallPolicies.cloneRules)
   *
   * @param string $project Project ID for this request.
   * @param string $firewallPolicy Name of the firewall policy to update.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @opt_param string sourceFirewallPolicy The firewall policy from which to copy
   * rules.
   * @return Operation
   */
  public function cloneRules($project, $firewallPolicy, $optParams = [])
  {
    $params = ['project' => $project, 'firewallPolicy' => $firewallPolicy];
    $params = array_merge($params, $optParams);
    return $this->call('cloneRules', [$params], Operation::class);
  }
  /**
   * Deletes the specified policy. (networkFirewallPolicies.delete)
   *
   * @param string $project Project ID for this request.
   * @param string $firewallPolicy Name of the firewall policy to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function delete($project, $firewallPolicy, $optParams = [])
  {
    $params = ['project' => $project, 'firewallPolicy' => $firewallPolicy];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Returns the specified network firewall policy. (networkFirewallPolicies.get)
   *
   * @param string $project Project ID for this request.
   * @param string $firewallPolicy Name of the firewall policy to get.
   * @param array $optParams Optional parameters.
   * @return FirewallPolicy
   */
  public function get($project, $firewallPolicy, $optParams = [])
  {
    $params = ['project' => $project, 'firewallPolicy' => $firewallPolicy];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], FirewallPolicy::class);
  }
  /**
   * Gets an association with the specified name.
   * (networkFirewallPolicies.getAssociation)
   *
   * @param string $project Project ID for this request.
   * @param string $firewallPolicy Name of the firewall policy to which the
   * queried association belongs.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string name The name of the association to get from the firewall
   * policy.
   * @return FirewallPolicyAssociation
   */
  public function getAssociation($project, $firewallPolicy, $optParams = [])
  {
    $params = ['project' => $project, 'firewallPolicy' => $firewallPolicy];
    $params = array_merge($params, $optParams);
    return $this->call('getAssociation', [$params], FirewallPolicyAssociation::class);
  }
  /**
   * Gets the access control policy for a resource. May be empty if no such policy
   * or resource exists. (networkFirewallPolicies.getIamPolicy)
   *
   * @param string $project Project ID for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int optionsRequestedPolicyVersion Requested IAM Policy version.
   * @return Policy
   */
  public function getIamPolicy($project, $resource, $optParams = [])
  {
    $params = ['project' => $project, 'resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Gets a rule of the specified priority. (networkFirewallPolicies.getRule)
   *
   * @param string $project Project ID for this request.
   * @param string $firewallPolicy Name of the firewall policy to which the
   * queried rule belongs.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int priority The priority of the rule to get from the firewall
   * policy.
   * @return FirewallPolicyRule
   */
  public function getRule($project, $firewallPolicy, $optParams = [])
  {
    $params = ['project' => $project, 'firewallPolicy' => $firewallPolicy];
    $params = array_merge($params, $optParams);
    return $this->call('getRule', [$params], FirewallPolicyRule::class);
  }
  /**
   * Creates a new policy in the specified project using the data included in the
   * request. (networkFirewallPolicies.insert)
   *
   * @param string $project Project ID for this request.
   * @param FirewallPolicy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function insert($project, FirewallPolicy $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Operation::class);
  }
  /**
   * Lists all the policies that have been configured for the specified project.
   * (networkFirewallPolicies.listNetworkFirewallPolicies)
   *
   * @param string $project Project ID for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter expression that filters resources listed in
   * the response. Most Compute resources support two types of filter expressions:
   * expressions that support regular expressions and expressions that follow API
   * improvement proposal AIP-160. If you want to use AIP-160, your expression
   * must specify the field name, an operator, and the value that you want to use
   * for filtering. The value must be a string, a number, or a boolean. The
   * operator must be either `=`, `!=`, `>`, `<`, `<=`, `>=` or `:`. For example,
   * if you are filtering Compute Engine instances, you can exclude instances
   * named `example-instance` by specifying `name != example-instance`. The `:`
   * operator can be used with string fields to match substrings. For non-string
   * fields it is equivalent to the `=` operator. The `:*` comparison can be used
   * to test whether a key has been defined. For example, to find all objects with
   * `owner` label use: ``` labels.owner:* ``` You can also filter nested fields.
   * For example, you could specify `scheduling.automaticRestart = false` to
   * include instances only if they are not scheduled for automatic restarts. You
   * can use filtering on nested fields to filter based on resource labels. To
   * filter on multiple expressions, provide each separate expression within
   * parentheses. For example: ``` (scheduling.automaticRestart = true)
   * (cpuPlatform = "Intel Skylake") ``` By default, each expression is an `AND`
   * expression. However, you can include `AND` and `OR` expressions explicitly.
   * For example: ``` (cpuPlatform = "Intel Skylake") OR (cpuPlatform = "Intel
   * Broadwell") AND (scheduling.automaticRestart = true) ``` If you want to use a
   * regular expression, use the `eq` (equal) or `ne` (not equal) operator against
   * a single un-parenthesized expression with or without quotes or against
   * multiple parenthesized expressions. Examples: `fieldname eq unquoted literal`
   * `fieldname eq 'single quoted literal'` `fieldname eq "double quoted literal"`
   * `(fieldname1 eq literal) (fieldname2 ne "literal")` The literal value is
   * interpreted as a regular expression using Google RE2 library syntax. The
   * literal value must match the entire field. For example, to filter for
   * instances that do not end with name "instance", you would use `name ne
   * .*instance`.
   * @opt_param string maxResults The maximum number of results per page that
   * should be returned. If the number of available results is larger than
   * `maxResults`, Compute Engine returns a `nextPageToken` that can be used to
   * get the next page of results in subsequent list requests. Acceptable values
   * are `0` to `500`, inclusive. (Default: `500`)
   * @opt_param string orderBy Sorts list results by a certain order. By default,
   * results are returned in alphanumerical order based on the resource name. You
   * can also sort results in descending order based on the creation timestamp
   * using `orderBy="creationTimestamp desc"`. This sorts results based on the
   * `creationTimestamp` field in reverse chronological order (newest result
   * first). Use this to sort resources like operations so that the newest
   * operation is returned first. Currently, only sorting by `name` or
   * `creationTimestamp desc` is supported.
   * @opt_param string pageToken Specifies a page token to use. Set `pageToken` to
   * the `nextPageToken` returned by a previous list request to get the next page
   * of results.
   * @opt_param bool returnPartialSuccess Opt-in for partial success behavior
   * which provides partial results in case of failure. The default value is
   * false.
   * @return FirewallPolicyList
   */
  public function listNetworkFirewallPolicies($project, $optParams = [])
  {
    $params = ['project' => $project];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], FirewallPolicyList::class);
  }
  /**
   * Patches the specified policy with the data included in the request.
   * (networkFirewallPolicies.patch)
   *
   * @param string $project Project ID for this request.
   * @param string $firewallPolicy Name of the firewall policy to update.
   * @param FirewallPolicy $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function patch($project, $firewallPolicy, FirewallPolicy $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'firewallPolicy' => $firewallPolicy, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Patches a rule of the specified priority. (networkFirewallPolicies.patchRule)
   *
   * @param string $project Project ID for this request.
   * @param string $firewallPolicy Name of the firewall policy to update.
   * @param FirewallPolicyRule $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param int priority The priority of the rule to patch.
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function patchRule($project, $firewallPolicy, FirewallPolicyRule $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'firewallPolicy' => $firewallPolicy, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patchRule', [$params], Operation::class);
  }
  /**
   * Removes an association for the specified firewall policy.
   * (networkFirewallPolicies.removeAssociation)
   *
   * @param string $project Project ID for this request.
   * @param string $firewallPolicy Name of the firewall policy to update.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string name Name for the attachment that will be removed.
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function removeAssociation($project, $firewallPolicy, $optParams = [])
  {
    $params = ['project' => $project, 'firewallPolicy' => $firewallPolicy];
    $params = array_merge($params, $optParams);
    return $this->call('removeAssociation', [$params], Operation::class);
  }
  /**
   * Deletes a rule of the specified priority.
   * (networkFirewallPolicies.removeRule)
   *
   * @param string $project Project ID for this request.
   * @param string $firewallPolicy Name of the firewall policy to update.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int priority The priority of the rule to remove from the firewall
   * policy.
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function removeRule($project, $firewallPolicy, $optParams = [])
  {
    $params = ['project' => $project, 'firewallPolicy' => $firewallPolicy];
    $params = array_merge($params, $optParams);
    return $this->call('removeRule', [$params], Operation::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. (networkFirewallPolicies.setIamPolicy)
   *
   * @param string $project Project ID for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param GlobalSetPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function setIamPolicy($project, $resource, GlobalSetPolicyRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], Policy::class);
  }
  /**
   * Returns permissions that a caller has on the specified resource.
   * (networkFirewallPolicies.testIamPermissions)
   *
   * @param string $project Project ID for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param TestPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return TestPermissionsResponse
   */
  public function testIamPermissions($project, $resource, TestPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], TestPermissionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NetworkFirewallPolicies::class, 'Google_Service_Compute_Resource_NetworkFirewallPolicies');
