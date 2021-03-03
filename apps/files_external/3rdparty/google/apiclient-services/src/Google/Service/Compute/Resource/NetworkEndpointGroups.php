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
 * The "networkEndpointGroups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $networkEndpointGroups = $computeService->networkEndpointGroups;
 *  </code>
 */
class Google_Service_Compute_Resource_NetworkEndpointGroups extends Google_Service_Resource
{
  /**
   * Retrieves the list of network endpoint groups and sorts them by zone.
   * (networkEndpointGroups.aggregatedList)
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
   * which provides partial results in case of failure. The default value is
   * false.
   * @return Google_Service_Compute_NetworkEndpointGroupAggregatedList
   */
  public function aggregatedList($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('aggregatedList', array($params), "Google_Service_Compute_NetworkEndpointGroupAggregatedList");
  }
  /**
   * Attach a list of network endpoints to the specified network endpoint group.
   * (networkEndpointGroups.attachNetworkEndpoints)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone where the network endpoint group is
   * located. It should comply with RFC1035.
   * @param string $networkEndpointGroup The name of the network endpoint group
   * where you are attaching network endpoints to. It should comply with RFC1035.
   * @param Google_Service_Compute_NetworkEndpointGroupsAttachEndpointsRequest $postBody
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
  public function attachNetworkEndpoints($project, $zone, $networkEndpointGroup, Google_Service_Compute_NetworkEndpointGroupsAttachEndpointsRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'networkEndpointGroup' => $networkEndpointGroup, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('attachNetworkEndpoints', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Deletes the specified network endpoint group. The network endpoints in the
   * NEG and the VM instances they belong to are not terminated when the NEG is
   * deleted. Note that the NEG cannot be deleted if there are backend services
   * referencing it. (networkEndpointGroups.delete)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone where the network endpoint group is
   * located. It should comply with RFC1035.
   * @param string $networkEndpointGroup The name of the network endpoint group to
   * delete. It should comply with RFC1035.
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
  public function delete($project, $zone, $networkEndpointGroup, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'networkEndpointGroup' => $networkEndpointGroup);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Detach a list of network endpoints from the specified network endpoint group.
   * (networkEndpointGroups.detachNetworkEndpoints)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone where the network endpoint group is
   * located. It should comply with RFC1035.
   * @param string $networkEndpointGroup The name of the network endpoint group
   * where you are removing network endpoints. It should comply with RFC1035.
   * @param Google_Service_Compute_NetworkEndpointGroupsDetachEndpointsRequest $postBody
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
  public function detachNetworkEndpoints($project, $zone, $networkEndpointGroup, Google_Service_Compute_NetworkEndpointGroupsDetachEndpointsRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'networkEndpointGroup' => $networkEndpointGroup, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('detachNetworkEndpoints', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Returns the specified network endpoint group. Gets a list of available
   * network endpoint groups by making a list() request.
   * (networkEndpointGroups.get)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone where the network endpoint group is
   * located. It should comply with RFC1035.
   * @param string $networkEndpointGroup The name of the network endpoint group.
   * It should comply with RFC1035.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Compute_NetworkEndpointGroup
   */
  public function get($project, $zone, $networkEndpointGroup, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'networkEndpointGroup' => $networkEndpointGroup);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Compute_NetworkEndpointGroup");
  }
  /**
   * Creates a network endpoint group in the specified project using the
   * parameters that are included in the request. (networkEndpointGroups.insert)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone where you want to create the network
   * endpoint group. It should comply with RFC1035.
   * @param Google_Service_Compute_NetworkEndpointGroup $postBody
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
  public function insert($project, $zone, Google_Service_Compute_NetworkEndpointGroup $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Retrieves the list of network endpoint groups that are located in the
   * specified project and zone. (networkEndpointGroups.listNetworkEndpointGroups)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone where the network endpoint group is
   * located. It should comply with RFC1035.
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
   * which provides partial results in case of failure. The default value is
   * false.
   * @return Google_Service_Compute_NetworkEndpointGroupList
   */
  public function listNetworkEndpointGroups($project, $zone, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Compute_NetworkEndpointGroupList");
  }
  /**
   * Lists the network endpoints in the specified network endpoint group.
   * (networkEndpointGroups.listNetworkEndpoints)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone where the network endpoint group is
   * located. It should comply with RFC1035.
   * @param string $networkEndpointGroup The name of the network endpoint group
   * from which you want to generate a list of included network endpoints. It
   * should comply with RFC1035.
   * @param Google_Service_Compute_NetworkEndpointGroupsListEndpointsRequest $postBody
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
   * which provides partial results in case of failure. The default value is
   * false.
   * @return Google_Service_Compute_NetworkEndpointGroupsListNetworkEndpoints
   */
  public function listNetworkEndpoints($project, $zone, $networkEndpointGroup, Google_Service_Compute_NetworkEndpointGroupsListEndpointsRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'networkEndpointGroup' => $networkEndpointGroup, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('listNetworkEndpoints', array($params), "Google_Service_Compute_NetworkEndpointGroupsListNetworkEndpoints");
  }
  /**
   * Returns permissions that a caller has on the specified resource.
   * (networkEndpointGroups.testIamPermissions)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param Google_Service_Compute_TestPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Compute_TestPermissionsResponse
   */
  public function testIamPermissions($project, $zone, $resource, Google_Service_Compute_TestPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_Compute_TestPermissionsResponse");
  }
}
