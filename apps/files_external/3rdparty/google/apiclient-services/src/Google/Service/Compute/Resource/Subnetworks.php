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
 * The "subnetworks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $subnetworks = $computeService->subnetworks;
 *  </code>
 */
class Google_Service_Compute_Resource_Subnetworks extends Google_Service_Resource
{
  /**
   * Retrieves an aggregated list of subnetworks. (subnetworks.aggregatedList)
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
   * @opt_param bool includeAllScopes Indicates whether every visible scope for
   * each scope type (zone, region, global) should be included in the response.
   * For new resource types added after this field, the flag has no effect as new
   * resource types will always include every visible scope for each scope type in
   * response. For resource types which predate this field, if this flag is
   * omitted or false, only scopes of the scope types where the resource type is
   * expected to be found will be included.
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
   * @return Google_Service_Compute_SubnetworkAggregatedList
   */
  public function aggregatedList($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('aggregatedList', array($params), "Google_Service_Compute_SubnetworkAggregatedList");
  }
  /**
   * Deletes the specified subnetwork. (subnetworks.delete)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $subnetwork Name of the Subnetwork resource to delete.
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
  public function delete($project, $region, $subnetwork, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'subnetwork' => $subnetwork);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Expands the IP CIDR range of the subnetwork to a specified value.
   * (subnetworks.expandIpCidrRange)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $subnetwork Name of the Subnetwork resource to update.
   * @param Google_Service_Compute_SubnetworksExpandIpCidrRangeRequest $postBody
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
  public function expandIpCidrRange($project, $region, $subnetwork, Google_Service_Compute_SubnetworksExpandIpCidrRangeRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'subnetwork' => $subnetwork, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('expandIpCidrRange', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Returns the specified subnetwork. Gets a list of available subnetworks list()
   * request. (subnetworks.get)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $subnetwork Name of the Subnetwork resource to return.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Compute_Subnetwork
   */
  public function get($project, $region, $subnetwork, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'subnetwork' => $subnetwork);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Compute_Subnetwork");
  }
  /**
   * Gets the access control policy for a resource. May be empty if no such policy
   * or resource exists. (subnetworks.getIamPolicy)
   *
   * @param string $project Project ID for this request.
   * @param string $region The name of the region for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int optionsRequestedPolicyVersion Requested IAM Policy version.
   * @return Google_Service_Compute_Policy
   */
  public function getIamPolicy($project, $region, $resource, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_Compute_Policy");
  }
  /**
   * Creates a subnetwork in the specified project using the data included in the
   * request. (subnetworks.insert)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param Google_Service_Compute_Subnetwork $postBody
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
  public function insert($project, $region, Google_Service_Compute_Subnetwork $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Retrieves a list of subnetworks available to the specified project.
   * (subnetworks.listSubnetworks)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
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
   * @return Google_Service_Compute_SubnetworkList
   */
  public function listSubnetworks($project, $region, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Compute_SubnetworkList");
  }
  /**
   * Retrieves an aggregated list of all usable subnetworks in the project.
   * (subnetworks.listUsable)
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
   * @return Google_Service_Compute_UsableSubnetworksAggregatedList
   */
  public function listUsable($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('listUsable', array($params), "Google_Service_Compute_UsableSubnetworksAggregatedList");
  }
  /**
   * Patches the specified subnetwork with the data included in the request. Only
   * certain fields can up updated with a patch request as indicated in the field
   * descriptions. You must specify the current fingerprint of the subnetwork
   * resource being patched. (subnetworks.patch)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $subnetwork Name of the Subnetwork resource to patch.
   * @param Google_Service_Compute_Subnetwork $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param int drainTimeoutSeconds The drain timeout specifies the upper
   * bound in seconds on the amount of time allowed to drain connections from the
   * current ACTIVE subnetwork to the current BACKUP subnetwork. The drain timeout
   * is only applicable when the following conditions are true: - the subnetwork
   * being patched has purpose = INTERNAL_HTTPS_LOAD_BALANCER - the subnetwork
   * being patched has role = BACKUP - the patch request is setting the role to
   * ACTIVE. Note that after this patch operation the roles of the ACTIVE and
   * BACKUP subnetworks will be swapped.
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
  public function patch($project, $region, $subnetwork, Google_Service_Compute_Subnetwork $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'subnetwork' => $subnetwork, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. (subnetworks.setIamPolicy)
   *
   * @param string $project Project ID for this request.
   * @param string $region The name of the region for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param Google_Service_Compute_RegionSetPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Compute_Policy
   */
  public function setIamPolicy($project, $region, $resource, Google_Service_Compute_RegionSetPolicyRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_Compute_Policy");
  }
  /**
   * Set whether VMs in this subnet can access Google services without assigning
   * external IP addresses through Private Google Access.
   * (subnetworks.setPrivateIpGoogleAccess)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $subnetwork Name of the Subnetwork resource.
   * @param Google_Service_Compute_SubnetworksSetPrivateIpGoogleAccessRequest $postBody
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
  public function setPrivateIpGoogleAccess($project, $region, $subnetwork, Google_Service_Compute_SubnetworksSetPrivateIpGoogleAccessRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'subnetwork' => $subnetwork, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setPrivateIpGoogleAccess', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Returns permissions that a caller has on the specified resource.
   * (subnetworks.testIamPermissions)
   *
   * @param string $project Project ID for this request.
   * @param string $region The name of the region for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param Google_Service_Compute_TestPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Compute_TestPermissionsResponse
   */
  public function testIamPermissions($project, $region, $resource, Google_Service_Compute_TestPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_Compute_TestPermissionsResponse");
  }
}
