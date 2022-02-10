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

use Google\Service\Compute\InstanceReference;
use Google\Service\Compute\Operation;
use Google\Service\Compute\TargetPool;
use Google\Service\Compute\TargetPoolAggregatedList;
use Google\Service\Compute\TargetPoolInstanceHealth;
use Google\Service\Compute\TargetPoolList;
use Google\Service\Compute\TargetPoolsAddHealthCheckRequest;
use Google\Service\Compute\TargetPoolsAddInstanceRequest;
use Google\Service\Compute\TargetPoolsRemoveHealthCheckRequest;
use Google\Service\Compute\TargetPoolsRemoveInstanceRequest;
use Google\Service\Compute\TargetReference;

/**
 * The "targetPools" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google\Service\Compute(...);
 *   $targetPools = $computeService->targetPools;
 *  </code>
 */
class TargetPools extends \Google\Service\Resource
{
  /**
   * Adds health check URLs to a target pool. (targetPools.addHealthCheck)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $targetPool Name of the target pool to add a health check to.
   * @param TargetPoolsAddHealthCheckRequest $postBody
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
  public function addHealthCheck($project, $region, $targetPool, TargetPoolsAddHealthCheckRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'targetPool' => $targetPool, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addHealthCheck', [$params], Operation::class);
  }
  /**
   * Adds an instance to a target pool. (targetPools.addInstance)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $targetPool Name of the TargetPool resource to add instances
   * to.
   * @param TargetPoolsAddInstanceRequest $postBody
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
  public function addInstance($project, $region, $targetPool, TargetPoolsAddInstanceRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'targetPool' => $targetPool, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addInstance', [$params], Operation::class);
  }
  /**
   * Retrieves an aggregated list of target pools. (targetPools.aggregatedList)
   *
   * @param string $project Project ID for this request.
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
   * @return TargetPoolAggregatedList
   */
  public function aggregatedList($project, $optParams = [])
  {
    $params = ['project' => $project];
    $params = array_merge($params, $optParams);
    return $this->call('aggregatedList', [$params], TargetPoolAggregatedList::class);
  }
  /**
   * Deletes the specified target pool. (targetPools.delete)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $targetPool Name of the TargetPool resource to delete.
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
  public function delete($project, $region, $targetPool, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'targetPool' => $targetPool];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Returns the specified target pool. Gets a list of available target pools by
   * making a list() request. (targetPools.get)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $targetPool Name of the TargetPool resource to return.
   * @param array $optParams Optional parameters.
   * @return TargetPool
   */
  public function get($project, $region, $targetPool, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'targetPool' => $targetPool];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], TargetPool::class);
  }
  /**
   * Gets the most recent health check results for each IP for the instance that
   * is referenced by the given target pool. (targetPools.getHealth)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $targetPool Name of the TargetPool resource to which the
   * queried instance belongs.
   * @param InstanceReference $postBody
   * @param array $optParams Optional parameters.
   * @return TargetPoolInstanceHealth
   */
  public function getHealth($project, $region, $targetPool, InstanceReference $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'targetPool' => $targetPool, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('getHealth', [$params], TargetPoolInstanceHealth::class);
  }
  /**
   * Creates a target pool in the specified project and region using the data
   * included in the request. (targetPools.insert)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param TargetPool $postBody
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
  public function insert($project, $region, TargetPool $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Operation::class);
  }
  /**
   * Retrieves a list of target pools available to the specified project and
   * region. (targetPools.listTargetPools)
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
   * @return TargetPoolList
   */
  public function listTargetPools($project, $region, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], TargetPoolList::class);
  }
  /**
   * Removes health check URL from a target pool. (targetPools.removeHealthCheck)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region for this request.
   * @param string $targetPool Name of the target pool to remove health checks
   * from.
   * @param TargetPoolsRemoveHealthCheckRequest $postBody
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
  public function removeHealthCheck($project, $region, $targetPool, TargetPoolsRemoveHealthCheckRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'targetPool' => $targetPool, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('removeHealthCheck', [$params], Operation::class);
  }
  /**
   * Removes instance URL from a target pool. (targetPools.removeInstance)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $targetPool Name of the TargetPool resource to remove instances
   * from.
   * @param TargetPoolsRemoveInstanceRequest $postBody
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
  public function removeInstance($project, $region, $targetPool, TargetPoolsRemoveInstanceRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'targetPool' => $targetPool, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('removeInstance', [$params], Operation::class);
  }
  /**
   * Changes a backup target pool's configurations. (targetPools.setBackup)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region scoping this request.
   * @param string $targetPool Name of the TargetPool resource to set a backup
   * pool for.
   * @param TargetReference $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param float failoverRatio New failoverRatio value for the target pool.
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
  public function setBackup($project, $region, $targetPool, TargetReference $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'targetPool' => $targetPool, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setBackup', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TargetPools::class, 'Google_Service_Compute_Resource_TargetPools');
