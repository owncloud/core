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

use Google\Service\Compute\Operation;
use Google\Service\Compute\PacketMirroring;
use Google\Service\Compute\PacketMirroringAggregatedList;
use Google\Service\Compute\PacketMirroringList;
use Google\Service\Compute\TestPermissionsRequest;
use Google\Service\Compute\TestPermissionsResponse;

/**
 * The "packetMirrorings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google\Service\Compute(...);
 *   $packetMirrorings = $computeService->packetMirrorings;
 *  </code>
 */
class PacketMirrorings extends \Google\Service\Resource
{
  /**
   * Retrieves an aggregated list of packetMirrorings.
   * (packetMirrorings.aggregatedList)
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
   * @return PacketMirroringAggregatedList
   */
  public function aggregatedList($project, $optParams = [])
  {
    $params = ['project' => $project];
    $params = array_merge($params, $optParams);
    return $this->call('aggregatedList', [$params], PacketMirroringAggregatedList::class);
  }
  /**
   * Deletes the specified PacketMirroring resource. (packetMirrorings.delete)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region for this request.
   * @param string $packetMirroring Name of the PacketMirroring resource to
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
  public function delete($project, $region, $packetMirroring, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'packetMirroring' => $packetMirroring];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Returns the specified PacketMirroring resource. (packetMirrorings.get)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region for this request.
   * @param string $packetMirroring Name of the PacketMirroring resource to
   * return.
   * @param array $optParams Optional parameters.
   * @return PacketMirroring
   */
  public function get($project, $region, $packetMirroring, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'packetMirroring' => $packetMirroring];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], PacketMirroring::class);
  }
  /**
   * Creates a PacketMirroring resource in the specified project and region using
   * the data included in the request. (packetMirrorings.insert)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region for this request.
   * @param PacketMirroring $postBody
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
  public function insert($project, $region, PacketMirroring $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Operation::class);
  }
  /**
   * Retrieves a list of PacketMirroring resources available to the specified
   * project and region. (packetMirrorings.listPacketMirrorings)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region for this request.
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
   * @return PacketMirroringList
   */
  public function listPacketMirrorings($project, $region, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], PacketMirroringList::class);
  }
  /**
   * Patches the specified PacketMirroring resource with the data included in the
   * request. This method supports PATCH semantics and uses JSON merge patch
   * format and processing rules. (packetMirrorings.patch)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region for this request.
   * @param string $packetMirroring Name of the PacketMirroring resource to patch.
   * @param PacketMirroring $postBody
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
  public function patch($project, $region, $packetMirroring, PacketMirroring $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'packetMirroring' => $packetMirroring, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Returns permissions that a caller has on the specified resource.
   * (packetMirrorings.testIamPermissions)
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
class_alias(PacketMirrorings::class, 'Google_Service_Compute_Resource_PacketMirrorings');
