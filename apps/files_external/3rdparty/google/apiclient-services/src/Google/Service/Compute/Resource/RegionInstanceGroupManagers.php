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
 * The "regionInstanceGroupManagers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google_Service_Compute(...);
 *   $regionInstanceGroupManagers = $computeService->regionInstanceGroupManagers;
 *  </code>
 */
class Google_Service_Compute_Resource_RegionInstanceGroupManagers extends Google_Service_Resource
{
  /**
   * Flags the specified instances to be immediately removed from the managed
   * instance group. Abandoning an instance does not delete the instance, but it
   * does remove the instance from any target pools that are applied by the
   * managed instance group. This method reduces the targetSize of the managed
   * instance group by the number of instances that you abandon. This operation is
   * marked as DONE when the action is scheduled even if the instances have not
   * yet been removed from the group. You must separately verify the status of the
   * abandoning action with the listmanagedinstances method.
   *
   * If the group is part of a backend service that has enabled connection
   * draining, it can take up to 60 seconds after the connection draining duration
   * has elapsed before the VM instance is removed or deleted.
   *
   * You can specify a maximum of 1000 instances with this method per request.
   * (regionInstanceGroupManagers.abandonInstances)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $instanceGroupManager Name of the managed instance group.
   * @param Google_Service_Compute_RegionInstanceGroupManagersAbandonInstancesRequest $postBody
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
  public function abandonInstances($project, $region, $instanceGroupManager, Google_Service_Compute_RegionInstanceGroupManagersAbandonInstancesRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('abandonInstances', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Apply updates to selected instances the managed instance group.
   * (regionInstanceGroupManagers.applyUpdatesToInstances)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request, should conform
   * to RFC1035.
   * @param string $instanceGroupManager The name of the managed instance group,
   * should conform to RFC1035.
   * @param Google_Service_Compute_RegionInstanceGroupManagersApplyUpdatesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Compute_Operation
   */
  public function applyUpdatesToInstances($project, $region, $instanceGroupManager, Google_Service_Compute_RegionInstanceGroupManagersApplyUpdatesRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('applyUpdatesToInstances', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Creates instances with per-instance configs in this regional managed instance
   * group. Instances are created using the current instance template. The create
   * instances operation is marked DONE if the createInstances request is
   * successful. The underlying actions take additional time. You must separately
   * verify the status of the creating or actions with the listmanagedinstances
   * method. (regionInstanceGroupManagers.createInstances)
   *
   * @param string $project Project ID for this request.
   * @param string $region The name of the region where the managed instance group
   * is located. It should conform to RFC1035.
   * @param string $instanceGroupManager The name of the managed instance group.
   * It should conform to RFC1035.
   * @param Google_Service_Compute_RegionInstanceGroupManagersCreateInstancesRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed.
   *
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request.
   *
   * The request ID must be a valid UUID with the exception that zero UUID is not
   * supported (00000000-0000-0000-0000-000000000000).
   * @return Google_Service_Compute_Operation
   */
  public function createInstances($project, $region, $instanceGroupManager, Google_Service_Compute_RegionInstanceGroupManagersCreateInstancesRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('createInstances', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Deletes the specified managed instance group and all of the instances in that
   * group. (regionInstanceGroupManagers.delete)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $instanceGroupManager Name of the managed instance group to
   * delete.
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
  public function delete($project, $region, $instanceGroupManager, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'instanceGroupManager' => $instanceGroupManager);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Flags the specified instances in the managed instance group to be immediately
   * deleted. The instances are also removed from any target pools of which they
   * were a member. This method reduces the targetSize of the managed instance
   * group by the number of instances that you delete. The deleteInstances
   * operation is marked DONE if the deleteInstances request is successful. The
   * underlying actions take additional time. You must separately verify the
   * status of the deleting action with the listmanagedinstances method.
   *
   * If the group is part of a backend service that has enabled connection
   * draining, it can take up to 60 seconds after the connection draining duration
   * has elapsed before the VM instance is removed or deleted.
   *
   * You can specify a maximum of 1000 instances with this method per request.
   * (regionInstanceGroupManagers.deleteInstances)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $instanceGroupManager Name of the managed instance group.
   * @param Google_Service_Compute_RegionInstanceGroupManagersDeleteInstancesRequest $postBody
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
  public function deleteInstances($project, $region, $instanceGroupManager, Google_Service_Compute_RegionInstanceGroupManagersDeleteInstancesRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('deleteInstances', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Deletes selected per-instance configs for the managed instance group.
   * (regionInstanceGroupManagers.deletePerInstanceConfigs)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request, should conform
   * to RFC1035.
   * @param string $instanceGroupManager The name of the managed instance group.
   * It should conform to RFC1035.
   * @param Google_Service_Compute_RegionInstanceGroupManagerDeleteInstanceConfigReq $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Compute_Operation
   */
  public function deletePerInstanceConfigs($project, $region, $instanceGroupManager, Google_Service_Compute_RegionInstanceGroupManagerDeleteInstanceConfigReq $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('deletePerInstanceConfigs', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Returns all of the details about the specified managed instance group.
   * (regionInstanceGroupManagers.get)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $instanceGroupManager Name of the managed instance group to
   * return.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Compute_InstanceGroupManager
   */
  public function get($project, $region, $instanceGroupManager, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'instanceGroupManager' => $instanceGroupManager);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Compute_InstanceGroupManager");
  }
  /**
   * Creates a managed instance group using the information that you specify in
   * the request. After the group is created, instances in the group are created
   * using the specified instance template. This operation is marked as DONE when
   * the group is created even if the instances in the group have not yet been
   * created. You must separately verify the status of the individual instances
   * with the listmanagedinstances method.
   *
   * A regional managed instance group can contain up to 2000 instances.
   * (regionInstanceGroupManagers.insert)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param Google_Service_Compute_InstanceGroupManager $postBody
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
  public function insert($project, $region, Google_Service_Compute_InstanceGroupManager $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Retrieves the list of managed instance groups that are contained within the
   * specified region.
   * (regionInstanceGroupManagers.listRegionInstanceGroupManagers)
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
   * which provides partial results in case of failure. The default value is
   * false.
   * @return Google_Service_Compute_RegionInstanceGroupManagerList
   */
  public function listRegionInstanceGroupManagers($project, $region, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Compute_RegionInstanceGroupManagerList");
  }
  /**
   * Lists all errors thrown by actions on instances for a given regional managed
   * instance group. The filter and orderBy query parameters are not supported.
   * (regionInstanceGroupManagers.listErrors)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request. This should
   * conform to RFC1035.
   * @param string $instanceGroupManager The name of the managed instance group.
   * It must be a string that meets the requirements in RFC1035, or an unsigned
   * long integer: must match regexp pattern:
   * (?:[a-z](?:[-a-z0-9]{0,61}[a-z0-9])?)|[1-9][0-9]{0,19}.
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
   * @return Google_Service_Compute_RegionInstanceGroupManagersListErrorsResponse
   */
  public function listErrors($project, $region, $instanceGroupManager, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'instanceGroupManager' => $instanceGroupManager);
    $params = array_merge($params, $optParams);
    return $this->call('listErrors', array($params), "Google_Service_Compute_RegionInstanceGroupManagersListErrorsResponse");
  }
  /**
   * Lists the instances in the managed instance group and instances that are
   * scheduled to be created. The list includes any current actions that the group
   * has scheduled for its instances. The orderBy query parameter is not
   * supported. (regionInstanceGroupManagers.listManagedInstances)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $instanceGroupManager The name of the managed instance group.
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
   * @return Google_Service_Compute_RegionInstanceGroupManagersListInstancesResponse
   */
  public function listManagedInstances($project, $region, $instanceGroupManager, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'instanceGroupManager' => $instanceGroupManager);
    $params = array_merge($params, $optParams);
    return $this->call('listManagedInstances', array($params), "Google_Service_Compute_RegionInstanceGroupManagersListInstancesResponse");
  }
  /**
   * Lists all of the per-instance configs defined for the managed instance group.
   * The orderBy query parameter is not supported.
   * (regionInstanceGroupManagers.listPerInstanceConfigs)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request, should conform
   * to RFC1035.
   * @param string $instanceGroupManager The name of the managed instance group.
   * It should conform to RFC1035.
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
   * @return Google_Service_Compute_RegionInstanceGroupManagersListInstanceConfigsResp
   */
  public function listPerInstanceConfigs($project, $region, $instanceGroupManager, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'instanceGroupManager' => $instanceGroupManager);
    $params = array_merge($params, $optParams);
    return $this->call('listPerInstanceConfigs', array($params), "Google_Service_Compute_RegionInstanceGroupManagersListInstanceConfigsResp");
  }
  /**
   * Updates a managed instance group using the information that you specify in
   * the request. This operation is marked as DONE when the group is patched even
   * if the instances in the group are still in the process of being patched. You
   * must separately verify the status of the individual instances with the
   * listmanagedinstances method. This method supports PATCH semantics and uses
   * the JSON merge patch format and processing rules.
   * (regionInstanceGroupManagers.patch)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $instanceGroupManager The name of the instance group manager.
   * @param Google_Service_Compute_InstanceGroupManager $postBody
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
  public function patch($project, $region, $instanceGroupManager, Google_Service_Compute_InstanceGroupManager $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Inserts or patches per-instance configs for the managed instance group.
   * perInstanceConfig.name serves as a key used to distinguish whether to perform
   * insert or patch. (regionInstanceGroupManagers.patchPerInstanceConfigs)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request, should conform
   * to RFC1035.
   * @param string $instanceGroupManager The name of the managed instance group.
   * It should conform to RFC1035.
   * @param Google_Service_Compute_RegionInstanceGroupManagerPatchInstanceConfigReq $postBody
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
  public function patchPerInstanceConfigs($project, $region, $instanceGroupManager, Google_Service_Compute_RegionInstanceGroupManagerPatchInstanceConfigReq $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patchPerInstanceConfigs', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Flags the specified VM instances in the managed instance group to be
   * immediately recreated. Each instance is recreated using the group's current
   * configuration. This operation is marked as DONE when the flag is set even if
   * the instances have not yet been recreated. You must separately verify the
   * status of each instance by checking its currentAction field; for more
   * information, see Checking the status of managed instances.
   *
   * If the group is part of a backend service that has enabled connection
   * draining, it can take up to 60 seconds after the connection draining duration
   * has elapsed before the VM instance is removed or deleted.
   *
   * You can specify a maximum of 1000 instances with this method per request.
   * (regionInstanceGroupManagers.recreateInstances)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $instanceGroupManager Name of the managed instance group.
   * @param Google_Service_Compute_RegionInstanceGroupManagersRecreateRequest $postBody
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
  public function recreateInstances($project, $region, $instanceGroupManager, Google_Service_Compute_RegionInstanceGroupManagersRecreateRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('recreateInstances', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Changes the intended size of the managed instance group. If you increase the
   * size, the group creates new instances using the current instance template. If
   * you decrease the size, the group deletes one or more instances.
   *
   * The resize operation is marked DONE if the resize request is successful. The
   * underlying actions take additional time. You must separately verify the
   * status of the creating or deleting actions with the listmanagedinstances
   * method.
   *
   * If the group is part of a backend service that has enabled connection
   * draining, it can take up to 60 seconds after the connection draining duration
   * has elapsed before the VM instance is removed or deleted.
   * (regionInstanceGroupManagers.resize)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $instanceGroupManager Name of the managed instance group.
   * @param int $size Number of instances that should exist in this instance group
   * manager.
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
  public function resize($project, $region, $instanceGroupManager, $size, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'instanceGroupManager' => $instanceGroupManager, 'size' => $size);
    $params = array_merge($params, $optParams);
    return $this->call('resize', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Sets the instance template to use when creating new instances or recreating
   * instances in this group. Existing instances are not affected.
   * (regionInstanceGroupManagers.setInstanceTemplate)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $instanceGroupManager The name of the managed instance group.
   * @param Google_Service_Compute_RegionInstanceGroupManagersSetTemplateRequest $postBody
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
  public function setInstanceTemplate($project, $region, $instanceGroupManager, Google_Service_Compute_RegionInstanceGroupManagersSetTemplateRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setInstanceTemplate', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Modifies the target pools to which all new instances in this group are
   * assigned. Existing instances in the group are not affected.
   * (regionInstanceGroupManagers.setTargetPools)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $instanceGroupManager Name of the managed instance group.
   * @param Google_Service_Compute_RegionInstanceGroupManagersSetTargetPoolsRequest $postBody
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
  public function setTargetPools($project, $region, $instanceGroupManager, Google_Service_Compute_RegionInstanceGroupManagersSetTargetPoolsRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setTargetPools', array($params), "Google_Service_Compute_Operation");
  }
  /**
   * Inserts or updates per-instance configs for the managed instance group.
   * perInstanceConfig.name serves as a key used to distinguish whether to perform
   * insert or patch. (regionInstanceGroupManagers.updatePerInstanceConfigs)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request, should conform
   * to RFC1035.
   * @param string $instanceGroupManager The name of the managed instance group.
   * It should conform to RFC1035.
   * @param Google_Service_Compute_RegionInstanceGroupManagerUpdateInstanceConfigReq $postBody
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
  public function updatePerInstanceConfigs($project, $region, $instanceGroupManager, Google_Service_Compute_RegionInstanceGroupManagerUpdateInstanceConfigReq $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'region' => $region, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updatePerInstanceConfigs', array($params), "Google_Service_Compute_Operation");
  }
}
