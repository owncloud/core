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
use Google\Service\Compute\Operation;
use Google\Service\Compute\Policy;
use Google\Service\Compute\RegionNetworkFirewallPoliciesGetEffectiveFirewallsResponse;
use Google\Service\Compute\RegionSetPolicyRequest;
use Google\Service\Compute\TestPermissionsRequest;
use Google\Service\Compute\TestPermissionsResponse;

/**
 * The "regionNetworkFirewallPolicies" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google\Service\Compute(...);
 *   $regionNetworkFirewallPolicies = $computeService->regionNetworkFirewallPolicies;
 *  </code>
 */
class RegionNetworkFirewallPolicies extends \Google\Service\Resource
{
  /**
   * Inserts an association for the specified network firewall policy.
   * (regionNetworkFirewallPolicies.addAssociation)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $firewallPolicy Name of the firewall policy to update.
   * @param FirewallPolicyAssociation $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool replaceExistingAssociation Indicates whether or not to
   * replace it if an association already exists. This is false by default, in
   * which case an error will be returned if an association already exists.
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
  public function addAssociation($project, $region, $firewallPolicy, FirewallPolicyAssociation $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'firewallPolicy' => $firewallPolicy, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addAssociation', [$params], Operation::class);
  }
  /**
   * Inserts a rule into a network firewall policy.
   * (regionNetworkFirewallPolicies.addRule)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
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
  public function addRule($project, $region, $firewallPolicy, FirewallPolicyRule $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'firewallPolicy' => $firewallPolicy, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addRule', [$params], Operation::class);
  }
  /**
   * Copies rules to the specified network firewall policy.
   * (regionNetworkFirewallPolicies.cloneRules)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
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
  public function cloneRules($project, $region, $firewallPolicy, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'firewallPolicy' => $firewallPolicy];
    $params = array_merge($params, $optParams);
    return $this->call('cloneRules', [$params], Operation::class);
  }
  /**
   * Deletes the specified network firewall policy.
   * (regionNetworkFirewallPolicies.delete)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
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
  public function delete($project, $region, $firewallPolicy, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'firewallPolicy' => $firewallPolicy];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Returns the specified network firewall policy.
   * (regionNetworkFirewallPolicies.get)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $firewallPolicy Name of the firewall policy to get.
   * @param array $optParams Optional parameters.
   * @return FirewallPolicy
   */
  public function get($project, $region, $firewallPolicy, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'firewallPolicy' => $firewallPolicy];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], FirewallPolicy::class);
  }
  /**
   * Gets an association with the specified name.
   * (regionNetworkFirewallPolicies.getAssociation)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $firewallPolicy Name of the firewall policy to which the
   * queried association belongs.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string name The name of the association to get from the firewall
   * policy.
   * @return FirewallPolicyAssociation
   */
  public function getAssociation($project, $region, $firewallPolicy, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'firewallPolicy' => $firewallPolicy];
    $params = array_merge($params, $optParams);
    return $this->call('getAssociation', [$params], FirewallPolicyAssociation::class);
  }
  /**
   * Returns the effective firewalls on a given network.
   * (regionNetworkFirewallPolicies.getEffectiveFirewalls)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $network Network reference
   * @param array $optParams Optional parameters.
   * @return RegionNetworkFirewallPoliciesGetEffectiveFirewallsResponse
   */
  public function getEffectiveFirewalls($project, $region, $network, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'network' => $network];
    $params = array_merge($params, $optParams);
    return $this->call('getEffectiveFirewalls', [$params], RegionNetworkFirewallPoliciesGetEffectiveFirewallsResponse::class);
  }
  /**
   * Gets the access control policy for a resource. May be empty if no such policy
   * or resource exists. (regionNetworkFirewallPolicies.getIamPolicy)
   *
   * @param string $project Project ID for this request.
   * @param string $region The name of the region for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int optionsRequestedPolicyVersion Requested IAM Policy version.
   * @return Policy
   */
  public function getIamPolicy($project, $region, $resource, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Gets a rule of the specified priority.
   * (regionNetworkFirewallPolicies.getRule)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $firewallPolicy Name of the firewall policy to which the
   * queried rule belongs.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int priority The priority of the rule to get from the firewall
   * policy.
   * @return FirewallPolicyRule
   */
  public function getRule($project, $region, $firewallPolicy, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'firewallPolicy' => $firewallPolicy];
    $params = array_merge($params, $optParams);
    return $this->call('getRule', [$params], FirewallPolicyRule::class);
  }
  /**
   * Creates a new network firewall policy in the specified project and region.
   * (regionNetworkFirewallPolicies.insert)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
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
  public function insert($project, $region, FirewallPolicy $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Operation::class);
  }
  /**
   * Lists all the network firewall policies that have been configured for the
   * specified project in the given region.
   * (regionNetworkFirewallPolicies.listRegionNetworkFirewallPolicies)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter expression that filters resources listed in
   * the response. The expression must specify the field name, an operator, and
   * the value that you want to use for filtering. The value must be a string, a
   * number, or a boolean. The operator must be either `=`, `!=`, `>`, `<`, `<=`,
   * `>=` or `:`. For example, if you are filtering Compute Engine instances, you
   * can exclude instances named `example-instance` by specifying `name !=
   * example-instance`. The `:` operator can be used with string fields to match
   * substrings. For non-string fields it is equivalent to the `=` operator. The
   * `:*` comparison can be used to test whether a key has been defined. For
   * example, to find all objects with `owner` label use: ``` labels.owner:* ```
   * You can also filter nested fields. For example, you could specify
   * `scheduling.automaticRestart = false` to include instances only if they are
   * not scheduled for automatic restarts. You can use filtering on nested fields
   * to filter based on resource labels. To filter on multiple expressions,
   * provide each separate expression within parentheses. For example: ```
   * (scheduling.automaticRestart = true) (cpuPlatform = "Intel Skylake") ``` By
   * default, each expression is an `AND` expression. However, you can include
   * `AND` and `OR` expressions explicitly. For example: ``` (cpuPlatform = "Intel
   * Skylake") OR (cpuPlatform = "Intel Broadwell") AND
   * (scheduling.automaticRestart = true) ```
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
  public function listRegionNetworkFirewallPolicies($project, $region, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], FirewallPolicyList::class);
  }
  /**
   * Patches the specified network firewall policy.
   * (regionNetworkFirewallPolicies.patch)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
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
  public function patch($project, $region, $firewallPolicy, FirewallPolicy $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'firewallPolicy' => $firewallPolicy, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Patches a rule of the specified priority.
   * (regionNetworkFirewallPolicies.patchRule)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
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
  public function patchRule($project, $region, $firewallPolicy, FirewallPolicyRule $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'firewallPolicy' => $firewallPolicy, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patchRule', [$params], Operation::class);
  }
  /**
   * Removes an association for the specified network firewall policy.
   * (regionNetworkFirewallPolicies.removeAssociation)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $firewallPolicy Name of the firewall policy to update.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string name Name for the association that will be removed.
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
  public function removeAssociation($project, $region, $firewallPolicy, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'firewallPolicy' => $firewallPolicy];
    $params = array_merge($params, $optParams);
    return $this->call('removeAssociation', [$params], Operation::class);
  }
  /**
   * Deletes a rule of the specified priority.
   * (regionNetworkFirewallPolicies.removeRule)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
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
  public function removeRule($project, $region, $firewallPolicy, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'firewallPolicy' => $firewallPolicy];
    $params = array_merge($params, $optParams);
    return $this->call('removeRule', [$params], Operation::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. (regionNetworkFirewallPolicies.setIamPolicy)
   *
   * @param string $project Project ID for this request.
   * @param string $region The name of the region for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param RegionSetPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function setIamPolicy($project, $region, $resource, RegionSetPolicyRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], Policy::class);
  }
  /**
   * Returns permissions that a caller has on the specified resource.
   * (regionNetworkFirewallPolicies.testIamPermissions)
   *
   * @param string $project Project ID for this request.
   * @param string $region The name of the region for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param TestPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return TestPermissionsResponse
   */
  public function testIamPermissions($project, $region, $resource, TestPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], TestPermissionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RegionNetworkFirewallPolicies::class, 'Google_Service_Compute_Resource_RegionNetworkFirewallPolicies');
