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
 * The "nodeGroups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $nodeGroups = $computeService->nodeGroups;
 *  </code>
 */
class Google_Service_Compute_Resource_NodeGroups extends Google_Service_Resource
{
  /**
   * Adds specified number of nodes to the node group. (nodeGroups.addNodes)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $nodeGroup Name of the NodeGroup resource.
   * @param Google_Service_Compute_NodeGroupsAddNodesRequest $postBody
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
  public function addNodes($project, $zone, $nodeGroup, Google_Service_Compute_NodeGroupsAddNodesRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'nodeGroup' => $nodeGroup, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('addNodes', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Retrieves an aggregated list of node groups. Note: use nodeGroups.listNodes
   * for more details about each group. (nodeGroups.aggregatedList)
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
   * @return Google_Service_Compute_NodeGroupAggregatedList
   */
  public function aggregatedList($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('aggregatedList', array($params), "Google_Service_Compute_NodeGroupAggregatedList");
  }
  /**
   * Deletes the specified NodeGroup resource. (nodeGroups.delete)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $nodeGroup Name of the NodeGroup resource to delete.
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
  public function delete($project, $zone, $nodeGroup, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'nodeGroup' => $nodeGroup);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Deletes specified nodes from the node group. (nodeGroups.deleteNodes)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $nodeGroup Name of the NodeGroup resource whose nodes will be
   * deleted.
   * @param Google_Service_Compute_NodeGroupsDeleteNodesRequest $postBody
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
  public function deleteNodes($project, $zone, $nodeGroup, Google_Service_Compute_NodeGroupsDeleteNodesRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'nodeGroup' => $nodeGroup, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('deleteNodes', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Returns the specified NodeGroup. Get a list of available NodeGroups by making
   * a list() request. Note: the "nodes" field should not be used. Use
   * nodeGroups.listNodes instead. (nodeGroups.get)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $nodeGroup Name of the node group to return.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Compute_NodeGroup
   */
  public function get($project, $zone, $nodeGroup, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'nodeGroup' => $nodeGroup);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Compute_NodeGroup");
  }
  /**
   * Gets the access control policy for a resource. May be empty if no such policy
   * or resource exists. (nodeGroups.getIamPolicy)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int optionsRequestedPolicyVersion Requested IAM Policy version.
   * @return Google_Service_Compute_Policy
   */
  public function getIamPolicy($project, $zone, $resource, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_Compute_Policy");
  }
  /**
   * Creates a NodeGroup resource in the specified project using the data included
   * in the request. (nodeGroups.insert)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param int $initialNodeCount Initial count of nodes in the node group.
   * @param Google_Service_Compute_NodeGroup $postBody
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
  public function insert($project, $zone, $initialNodeCount, Google_Service_Compute_NodeGroup $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'initialNodeCount' => $initialNodeCount, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Retrieves a list of node groups available to the specified project. Note: use
   * nodeGroups.listNodes for more details about each group.
   * (nodeGroups.listNodeGroups)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
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
   * @return Google_Service_Compute_NodeGroupList
   */
  public function listNodeGroups($project, $zone, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Compute_NodeGroupList");
  }
  /**
   * Lists nodes in the node group. (nodeGroups.listNodes)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $nodeGroup Name of the NodeGroup resource whose nodes you want
   * to list.
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
   * @return Google_Service_Compute_NodeGroupsListNodes
   */
  public function listNodes($project, $zone, $nodeGroup, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'nodeGroup' => $nodeGroup);
    $params = array_merge($params, $optParams);
    return $this->call('listNodes', array($params), "Google_Service_Compute_NodeGroupsListNodes");
  }
  /**
   * Updates the specified node group. (nodeGroups.patch)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $nodeGroup Name of the NodeGroup resource to update.
   * @param Google_Service_Compute_NodeGroup $postBody
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
  public function patch($project, $zone, $nodeGroup, Google_Service_Compute_NodeGroup $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'nodeGroup' => $nodeGroup, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. (nodeGroups.setIamPolicy)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param Google_Service_Compute_ZoneSetPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Compute_Policy
   */
  public function setIamPolicy($project, $zone, $resource, Google_Service_Compute_ZoneSetPolicyRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_Compute_Policy");
  }
  /**
   * Updates the node template of the node group. (nodeGroups.setNodeTemplate)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $nodeGroup Name of the NodeGroup resource to update.
   * @param Google_Service_Compute_NodeGroupsSetNodeTemplateRequest $postBody
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
  public function setNodeTemplate($project, $zone, $nodeGroup, Google_Service_Compute_NodeGroupsSetNodeTemplateRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'zone' => $zone, 'nodeGroup' => $nodeGroup, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setNodeTemplate', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Returns permissions that a caller has on the specified resource.
   * (nodeGroups.testIamPermissions)
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
