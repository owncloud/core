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

use Google\Service\Compute\InstanceGroupManager;
use Google\Service\Compute\InstanceGroupManagerAggregatedList;
use Google\Service\Compute\InstanceGroupManagerList;
use Google\Service\Compute\InstanceGroupManagersAbandonInstancesRequest;
use Google\Service\Compute\InstanceGroupManagersApplyUpdatesRequest;
use Google\Service\Compute\InstanceGroupManagersCreateInstancesRequest;
use Google\Service\Compute\InstanceGroupManagersDeleteInstancesRequest;
use Google\Service\Compute\InstanceGroupManagersDeletePerInstanceConfigsReq;
use Google\Service\Compute\InstanceGroupManagersListErrorsResponse;
use Google\Service\Compute\InstanceGroupManagersListManagedInstancesResponse;
use Google\Service\Compute\InstanceGroupManagersListPerInstanceConfigsResp;
use Google\Service\Compute\InstanceGroupManagersPatchPerInstanceConfigsReq;
use Google\Service\Compute\InstanceGroupManagersRecreateInstancesRequest;
use Google\Service\Compute\InstanceGroupManagersSetInstanceTemplateRequest;
use Google\Service\Compute\InstanceGroupManagersSetTargetPoolsRequest;
use Google\Service\Compute\InstanceGroupManagersUpdatePerInstanceConfigsReq;
use Google\Service\Compute\Operation;

/**
 * The "instanceGroupManagers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google\Service\Compute(...);
 *   $instanceGroupManagers = $computeService->instanceGroupManagers;
 *  </code>
 */
class InstanceGroupManagers extends \Google\Service\Resource
{
  /**
   * Flags the specified instances to be removed from the managed instance group.
   * Abandoning an instance does not delete the instance, but it does remove the
   * instance from any target pools that are applied by the managed instance
   * group. This method reduces the targetSize of the managed instance group by
   * the number of instances that you abandon. This operation is marked as DONE
   * when the action is scheduled even if the instances have not yet been removed
   * from the group. You must separately verify the status of the abandoning
   * action with the listmanagedinstances method. If the group is part of a
   * backend service that has enabled connection draining, it can take up to 60
   * seconds after the connection draining duration has elapsed before the VM
   * instance is removed or deleted. You can specify a maximum of 1000 instances
   * with this method per request. (instanceGroupManagers.abandonInstances)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone where the managed instance group is
   * located.
   * @param string $instanceGroupManager The name of the managed instance group.
   * @param InstanceGroupManagersAbandonInstancesRequest $postBody
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
  public function abandonInstances($project, $zone, $instanceGroupManager, InstanceGroupManagersAbandonInstancesRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('abandonInstances', [$params], Operation::class);
  }
  /**
   * Retrieves the list of managed instance groups and groups them by zone.
   * (instanceGroupManagers.aggregatedList)
   *
   * @param string $project Project ID for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter expression that filters resources listed in
   * the response. The expression must specify the field name, a comparison
   * operator, and the value that you want to use for filtering. The value must be
   * a string, a number, or a boolean. The comparison operator must be either `=`,
   * `!=`, `>`, or `<`. For example, if you are filtering Compute Engine
   * instances, you can exclude instances named `example-instance` by specifying
   * `name != example-instance`. You can also filter nested fields. For example,
   * you could specify `scheduling.automaticRestart = false` to include instances
   * only if they are not scheduled for automatic restarts. You can use filtering
   * on nested fields to filter based on resource labels. To filter on multiple
   * expressions, provide each separate expression within parentheses. For
   * example: ``` (scheduling.automaticRestart = true) (cpuPlatform = "Intel
   * Skylake") ``` By default, each expression is an `AND` expression. However,
   * you can include `AND` and `OR` expressions explicitly. For example: ```
   * (cpuPlatform = "Intel Skylake") OR (cpuPlatform = "Intel Broadwell") AND
   * (scheduling.automaticRestart = true) ```
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
   * @return InstanceGroupManagerAggregatedList
   */
  public function aggregatedList($project, $optParams = [])
  {
    $params = ['project' => $project];
    $params = array_merge($params, $optParams);
    return $this->call('aggregatedList', [$params], InstanceGroupManagerAggregatedList::class);
  }
  /**
   * Applies changes to selected instances on the managed instance group. This
   * method can be used to apply new overrides and/or new versions.
   * (instanceGroupManagers.applyUpdatesToInstances)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone where the managed instance group is
   * located. Should conform to RFC1035.
   * @param string $instanceGroupManager The name of the managed instance group,
   * should conform to RFC1035.
   * @param InstanceGroupManagersApplyUpdatesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function applyUpdatesToInstances($project, $zone, $instanceGroupManager, InstanceGroupManagersApplyUpdatesRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('applyUpdatesToInstances', [$params], Operation::class);
  }
  /**
   * Creates instances with per-instance configs in this managed instance group.
   * Instances are created using the current instance template. The create
   * instances operation is marked DONE if the createInstances request is
   * successful. The underlying actions take additional time. You must separately
   * verify the status of the creating or actions with the listmanagedinstances
   * method. (instanceGroupManagers.createInstances)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone where the managed instance group is
   * located. It should conform to RFC1035.
   * @param string $instanceGroupManager The name of the managed instance group.
   * It should conform to RFC1035.
   * @param InstanceGroupManagersCreateInstancesRequest $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId An optional request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. For
   * example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported (
   * 00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function createInstances($project, $zone, $instanceGroupManager, InstanceGroupManagersCreateInstancesRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('createInstances', [$params], Operation::class);
  }
  /**
   * Deletes the specified managed instance group and all of the instances in that
   * group. Note that the instance group must not belong to a backend service.
   * Read Deleting an instance group for more information.
   * (instanceGroupManagers.delete)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone where the managed instance group is
   * located.
   * @param string $instanceGroupManager The name of the managed instance group to
   * delete.
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
  public function delete($project, $zone, $instanceGroupManager, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Flags the specified instances in the managed instance group for immediate
   * deletion. The instances are also removed from any target pools of which they
   * were a member. This method reduces the targetSize of the managed instance
   * group by the number of instances that you delete. This operation is marked as
   * DONE when the action is scheduled even if the instances are still being
   * deleted. You must separately verify the status of the deleting action with
   * the listmanagedinstances method. If the group is part of a backend service
   * that has enabled connection draining, it can take up to 60 seconds after the
   * connection draining duration has elapsed before the VM instance is removed or
   * deleted. You can specify a maximum of 1000 instances with this method per
   * request. (instanceGroupManagers.deleteInstances)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone where the managed instance group is
   * located.
   * @param string $instanceGroupManager The name of the managed instance group.
   * @param InstanceGroupManagersDeleteInstancesRequest $postBody
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
  public function deleteInstances($project, $zone, $instanceGroupManager, InstanceGroupManagersDeleteInstancesRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('deleteInstances', [$params], Operation::class);
  }
  /**
   * Deletes selected per-instance configs for the managed instance group.
   * (instanceGroupManagers.deletePerInstanceConfigs)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone where the managed instance group is
   * located. It should conform to RFC1035.
   * @param string $instanceGroupManager The name of the managed instance group.
   * It should conform to RFC1035.
   * @param InstanceGroupManagersDeletePerInstanceConfigsReq $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function deletePerInstanceConfigs($project, $zone, $instanceGroupManager, InstanceGroupManagersDeletePerInstanceConfigsReq $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('deletePerInstanceConfigs', [$params], Operation::class);
  }
  /**
   * Returns all of the details about the specified managed instance group. Gets a
   * list of available managed instance groups by making a list() request.
   * (instanceGroupManagers.get)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone where the managed instance group is
   * located.
   * @param string $instanceGroupManager The name of the managed instance group.
   * @param array $optParams Optional parameters.
   * @return InstanceGroupManager
   */
  public function get($project, $zone, $instanceGroupManager, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], InstanceGroupManager::class);
  }
  /**
   * Creates a managed instance group using the information that you specify in
   * the request. After the group is created, instances in the group are created
   * using the specified instance template. This operation is marked as DONE when
   * the group is created even if the instances in the group have not yet been
   * created. You must separately verify the status of the individual instances
   * with the listmanagedinstances method. A managed instance group can have up to
   * 1000 VM instances per group. Please contact Cloud Support if you need an
   * increase in this limit. (instanceGroupManagers.insert)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone where you want to create the managed
   * instance group.
   * @param InstanceGroupManager $postBody
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
  public function insert($project, $zone, InstanceGroupManager $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Operation::class);
  }
  /**
   * Retrieves a list of managed instance groups that are contained within the
   * specified project and zone. (instanceGroupManagers.listInstanceGroupManagers)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone where the managed instance group is
   * located.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter expression that filters resources listed in
   * the response. The expression must specify the field name, a comparison
   * operator, and the value that you want to use for filtering. The value must be
   * a string, a number, or a boolean. The comparison operator must be either `=`,
   * `!=`, `>`, or `<`. For example, if you are filtering Compute Engine
   * instances, you can exclude instances named `example-instance` by specifying
   * `name != example-instance`. You can also filter nested fields. For example,
   * you could specify `scheduling.automaticRestart = false` to include instances
   * only if they are not scheduled for automatic restarts. You can use filtering
   * on nested fields to filter based on resource labels. To filter on multiple
   * expressions, provide each separate expression within parentheses. For
   * example: ``` (scheduling.automaticRestart = true) (cpuPlatform = "Intel
   * Skylake") ``` By default, each expression is an `AND` expression. However,
   * you can include `AND` and `OR` expressions explicitly. For example: ```
   * (cpuPlatform = "Intel Skylake") OR (cpuPlatform = "Intel Broadwell") AND
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
   * @return InstanceGroupManagerList
   */
  public function listInstanceGroupManagers($project, $zone, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], InstanceGroupManagerList::class);
  }
  /**
   * Lists all errors thrown by actions on instances for a given managed instance
   * group. The filter and orderBy query parameters are not supported.
   * (instanceGroupManagers.listErrors)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone where the managed instance group is
   * located. It should conform to RFC1035.
   * @param string $instanceGroupManager The name of the managed instance group.
   * It must be a string that meets the requirements in RFC1035, or an unsigned
   * long integer: must match regexp pattern:
   * (?:[a-z](?:[-a-z0-9]{0,61}[a-z0-9])?)|1-9{0,19}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter expression that filters resources listed in
   * the response. The expression must specify the field name, a comparison
   * operator, and the value that you want to use for filtering. The value must be
   * a string, a number, or a boolean. The comparison operator must be either `=`,
   * `!=`, `>`, or `<`. For example, if you are filtering Compute Engine
   * instances, you can exclude instances named `example-instance` by specifying
   * `name != example-instance`. You can also filter nested fields. For example,
   * you could specify `scheduling.automaticRestart = false` to include instances
   * only if they are not scheduled for automatic restarts. You can use filtering
   * on nested fields to filter based on resource labels. To filter on multiple
   * expressions, provide each separate expression within parentheses. For
   * example: ``` (scheduling.automaticRestart = true) (cpuPlatform = "Intel
   * Skylake") ``` By default, each expression is an `AND` expression. However,
   * you can include `AND` and `OR` expressions explicitly. For example: ```
   * (cpuPlatform = "Intel Skylake") OR (cpuPlatform = "Intel Broadwell") AND
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
   * @return InstanceGroupManagersListErrorsResponse
   */
  public function listErrors($project, $zone, $instanceGroupManager, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager];
    $params = array_merge($params, $optParams);
    return $this->call('listErrors', [$params], InstanceGroupManagersListErrorsResponse::class);
  }
  /**
   * Lists all of the instances in the managed instance group. Each instance in
   * the list has a currentAction, which indicates the action that the managed
   * instance group is performing on the instance. For example, if the group is
   * still creating an instance, the currentAction is CREATING. If a previous
   * action failed, the list displays the errors for that failed action. The
   * orderBy query parameter is not supported.
   * (instanceGroupManagers.listManagedInstances)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone where the managed instance group is
   * located.
   * @param string $instanceGroupManager The name of the managed instance group.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter expression that filters resources listed in
   * the response. The expression must specify the field name, a comparison
   * operator, and the value that you want to use for filtering. The value must be
   * a string, a number, or a boolean. The comparison operator must be either `=`,
   * `!=`, `>`, or `<`. For example, if you are filtering Compute Engine
   * instances, you can exclude instances named `example-instance` by specifying
   * `name != example-instance`. You can also filter nested fields. For example,
   * you could specify `scheduling.automaticRestart = false` to include instances
   * only if they are not scheduled for automatic restarts. You can use filtering
   * on nested fields to filter based on resource labels. To filter on multiple
   * expressions, provide each separate expression within parentheses. For
   * example: ``` (scheduling.automaticRestart = true) (cpuPlatform = "Intel
   * Skylake") ``` By default, each expression is an `AND` expression. However,
   * you can include `AND` and `OR` expressions explicitly. For example: ```
   * (cpuPlatform = "Intel Skylake") OR (cpuPlatform = "Intel Broadwell") AND
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
   * @return InstanceGroupManagersListManagedInstancesResponse
   */
  public function listManagedInstances($project, $zone, $instanceGroupManager, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager];
    $params = array_merge($params, $optParams);
    return $this->call('listManagedInstances', [$params], InstanceGroupManagersListManagedInstancesResponse::class);
  }
  /**
   * Lists all of the per-instance configs defined for the managed instance group.
   * The orderBy query parameter is not supported.
   * (instanceGroupManagers.listPerInstanceConfigs)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone where the managed instance group is
   * located. It should conform to RFC1035.
   * @param string $instanceGroupManager The name of the managed instance group.
   * It should conform to RFC1035.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter expression that filters resources listed in
   * the response. The expression must specify the field name, a comparison
   * operator, and the value that you want to use for filtering. The value must be
   * a string, a number, or a boolean. The comparison operator must be either `=`,
   * `!=`, `>`, or `<`. For example, if you are filtering Compute Engine
   * instances, you can exclude instances named `example-instance` by specifying
   * `name != example-instance`. You can also filter nested fields. For example,
   * you could specify `scheduling.automaticRestart = false` to include instances
   * only if they are not scheduled for automatic restarts. You can use filtering
   * on nested fields to filter based on resource labels. To filter on multiple
   * expressions, provide each separate expression within parentheses. For
   * example: ``` (scheduling.automaticRestart = true) (cpuPlatform = "Intel
   * Skylake") ``` By default, each expression is an `AND` expression. However,
   * you can include `AND` and `OR` expressions explicitly. For example: ```
   * (cpuPlatform = "Intel Skylake") OR (cpuPlatform = "Intel Broadwell") AND
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
   * @return InstanceGroupManagersListPerInstanceConfigsResp
   */
  public function listPerInstanceConfigs($project, $zone, $instanceGroupManager, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager];
    $params = array_merge($params, $optParams);
    return $this->call('listPerInstanceConfigs', [$params], InstanceGroupManagersListPerInstanceConfigsResp::class);
  }
  /**
   * Updates a managed instance group using the information that you specify in
   * the request. This operation is marked as DONE when the group is patched even
   * if the instances in the group are still in the process of being patched. You
   * must separately verify the status of the individual instances with the
   * listManagedInstances method. This method supports PATCH semantics and uses
   * the JSON merge patch format and processing rules. If you update your group to
   * specify a new template or instance configuration, it's possible that your
   * intended specification for each VM in the group is different from the current
   * state of that VM. To learn how to apply an updated configuration to the VMs
   * in a MIG, see Updating instances in a MIG. (instanceGroupManagers.patch)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone where you want to create the managed
   * instance group.
   * @param string $instanceGroupManager The name of the instance group manager.
   * @param InstanceGroupManager $postBody
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
  public function patch($project, $zone, $instanceGroupManager, InstanceGroupManager $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Inserts or patches per-instance configs for the managed instance group.
   * perInstanceConfig.name serves as a key used to distinguish whether to perform
   * insert or patch. (instanceGroupManagers.patchPerInstanceConfigs)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone where the managed instance group is
   * located. It should conform to RFC1035.
   * @param string $instanceGroupManager The name of the managed instance group.
   * It should conform to RFC1035.
   * @param InstanceGroupManagersPatchPerInstanceConfigsReq $postBody
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
  public function patchPerInstanceConfigs($project, $zone, $instanceGroupManager, InstanceGroupManagersPatchPerInstanceConfigsReq $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patchPerInstanceConfigs', [$params], Operation::class);
  }
  /**
   * Flags the specified VM instances in the managed instance group to be
   * immediately recreated. Each instance is recreated using the group's current
   * configuration. This operation is marked as DONE when the flag is set even if
   * the instances have not yet been recreated. You must separately verify the
   * status of each instance by checking its currentAction field; for more
   * information, see Checking the status of managed instances. If the group is
   * part of a backend service that has enabled connection draining, it can take
   * up to 60 seconds after the connection draining duration has elapsed before
   * the VM instance is removed or deleted. You can specify a maximum of 1000
   * instances with this method per request.
   * (instanceGroupManagers.recreateInstances)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone where the managed instance group is
   * located.
   * @param string $instanceGroupManager The name of the managed instance group.
   * @param InstanceGroupManagersRecreateInstancesRequest $postBody
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
  public function recreateInstances($project, $zone, $instanceGroupManager, InstanceGroupManagersRecreateInstancesRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('recreateInstances', [$params], Operation::class);
  }
  /**
   * Resizes the managed instance group. If you increase the size, the group
   * creates new instances using the current instance template. If you decrease
   * the size, the group deletes instances. The resize operation is marked DONE
   * when the resize actions are scheduled even if the group has not yet added or
   * deleted any instances. You must separately verify the status of the creating
   * or deleting actions with the listmanagedinstances method. When resizing down,
   * the instance group arbitrarily chooses the order in which VMs are deleted.
   * The group takes into account some VM attributes when making the selection
   * including: + The status of the VM instance. + The health of the VM instance.
   * + The instance template version the VM is based on. + For regional managed
   * instance groups, the location of the VM instance. This list is subject to
   * change. If the group is part of a backend service that has enabled connection
   * draining, it can take up to 60 seconds after the connection draining duration
   * has elapsed before the VM instance is removed or deleted.
   * (instanceGroupManagers.resize)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone where the managed instance group is
   * located.
   * @param string $instanceGroupManager The name of the managed instance group.
   * @param int $size The number of running instances that the managed instance
   * group should maintain at any given time. The group automatically adds or
   * removes instances to maintain the number of instances specified by this
   * parameter.
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
  public function resize($project, $zone, $instanceGroupManager, $size, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'size' => $size];
    $params = array_merge($params, $optParams);
    return $this->call('resize', [$params], Operation::class);
  }
  /**
   * Specifies the instance template to use when creating new instances in this
   * group. The templates for existing instances in the group do not change unless
   * you run recreateInstances, run applyUpdatesToInstances, or set the group's
   * updatePolicy.type to PROACTIVE. (instanceGroupManagers.setInstanceTemplate)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone where the managed instance group is
   * located.
   * @param string $instanceGroupManager The name of the managed instance group.
   * @param InstanceGroupManagersSetInstanceTemplateRequest $postBody
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
  public function setInstanceTemplate($project, $zone, $instanceGroupManager, InstanceGroupManagersSetInstanceTemplateRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setInstanceTemplate', [$params], Operation::class);
  }
  /**
   * Modifies the target pools to which all instances in this managed instance
   * group are assigned. The target pools automatically apply to all of the
   * instances in the managed instance group. This operation is marked DONE when
   * you make the request even if the instances have not yet been added to their
   * target pools. The change might take some time to apply to all of the
   * instances in the group depending on the size of the group.
   * (instanceGroupManagers.setTargetPools)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone where the managed instance group is
   * located.
   * @param string $instanceGroupManager The name of the managed instance group.
   * @param InstanceGroupManagersSetTargetPoolsRequest $postBody
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
  public function setTargetPools($project, $zone, $instanceGroupManager, InstanceGroupManagersSetTargetPoolsRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setTargetPools', [$params], Operation::class);
  }
  /**
   * Inserts or updates per-instance configs for the managed instance group.
   * perInstanceConfig.name serves as a key used to distinguish whether to perform
   * insert or patch. (instanceGroupManagers.updatePerInstanceConfigs)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone where the managed instance group is
   * located. It should conform to RFC1035.
   * @param string $instanceGroupManager The name of the managed instance group.
   * It should conform to RFC1035.
   * @param InstanceGroupManagersUpdatePerInstanceConfigsReq $postBody
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
  public function updatePerInstanceConfigs($project, $zone, $instanceGroupManager, InstanceGroupManagersUpdatePerInstanceConfigsReq $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'instanceGroupManager' => $instanceGroupManager, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updatePerInstanceConfigs', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InstanceGroupManagers::class, 'Google_Service_Compute_Resource_InstanceGroupManagers');
