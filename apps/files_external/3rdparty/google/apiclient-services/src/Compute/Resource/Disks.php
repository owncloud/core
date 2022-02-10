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

use Google\Service\Compute\Disk;
use Google\Service\Compute\DiskAggregatedList;
use Google\Service\Compute\DiskList;
use Google\Service\Compute\DisksAddResourcePoliciesRequest;
use Google\Service\Compute\DisksRemoveResourcePoliciesRequest;
use Google\Service\Compute\DisksResizeRequest;
use Google\Service\Compute\Operation;
use Google\Service\Compute\Policy;
use Google\Service\Compute\Snapshot;
use Google\Service\Compute\TestPermissionsRequest;
use Google\Service\Compute\TestPermissionsResponse;
use Google\Service\Compute\ZoneSetLabelsRequest;
use Google\Service\Compute\ZoneSetPolicyRequest;

/**
 * The "disks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google\Service\Compute(...);
 *   $disks = $computeService->disks;
 *  </code>
 */
class Disks extends \Google\Service\Resource
{
  /**
   * Adds existing resource policies to a disk. You can only add one policy which
   * will be applied to this disk for scheduling snapshot creation.
   * (disks.addResourcePolicies)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $disk The disk name for this request.
   * @param DisksAddResourcePoliciesRequest $postBody
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
  public function addResourcePolicies($project, $zone, $disk, DisksAddResourcePoliciesRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'disk' => $disk, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addResourcePolicies', [$params], Operation::class);
  }
  /**
   * Retrieves an aggregated list of persistent disks. (disks.aggregatedList)
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
   * @return DiskAggregatedList
   */
  public function aggregatedList($project, $optParams = [])
  {
    $params = ['project' => $project];
    $params = array_merge($params, $optParams);
    return $this->call('aggregatedList', [$params], DiskAggregatedList::class);
  }
  /**
   * Creates a snapshot of a specified persistent disk. For regular snapshot
   * creation, consider using snapshots.insert instead, as that method supports
   * more features, such as creating snapshots in a project different from the
   * source disk project. (disks.createSnapshot)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $disk Name of the persistent disk to snapshot.
   * @param Snapshot $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool guestFlush [Input Only] Whether to attempt an application
   * consistent snapshot by informing the OS to prepare for the snapshot process.
   * Currently only supported on Windows instances using the Volume Shadow Copy
   * Service (VSS).
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
  public function createSnapshot($project, $zone, $disk, Snapshot $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'disk' => $disk, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('createSnapshot', [$params], Operation::class);
  }
  /**
   * Deletes the specified persistent disk. Deleting a disk removes its data
   * permanently and is irreversible. However, deleting a disk does not delete any
   * snapshots previously made from the disk. You must separately delete
   * snapshots. (disks.delete)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $disk Name of the persistent disk to delete.
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
  public function delete($project, $zone, $disk, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'disk' => $disk];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Returns a specified persistent disk. Gets a list of available persistent
   * disks by making a list() request. (disks.get)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $disk Name of the persistent disk to return.
   * @param array $optParams Optional parameters.
   * @return Disk
   */
  public function get($project, $zone, $disk, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'disk' => $disk];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Disk::class);
  }
  /**
   * Gets the access control policy for a resource. May be empty if no such policy
   * or resource exists. (disks.getIamPolicy)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int optionsRequestedPolicyVersion Requested IAM Policy version.
   * @return Policy
   */
  public function getIamPolicy($project, $zone, $resource, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Creates a persistent disk in the specified project using the data in the
   * request. You can create a disk from a source (sourceImage, sourceSnapshot, or
   * sourceDisk) or create an empty 500 GB data disk by omitting all properties.
   * You can also create a disk that is larger than the default size by specifying
   * the sizeGb property. (disks.insert)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param Disk $postBody
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
   * @opt_param string sourceImage Source image to restore onto a disk. This field
   * is optional.
   * @return Operation
   */
  public function insert($project, $zone, Disk $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Operation::class);
  }
  /**
   * Retrieves a list of persistent disks contained within the specified zone.
   * (disks.listDisks)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
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
   * @return DiskList
   */
  public function listDisks($project, $zone, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], DiskList::class);
  }
  /**
   * Removes resource policies from a disk. (disks.removeResourcePolicies)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $disk The disk name for this request.
   * @param DisksRemoveResourcePoliciesRequest $postBody
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
  public function removeResourcePolicies($project, $zone, $disk, DisksRemoveResourcePoliciesRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'disk' => $disk, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('removeResourcePolicies', [$params], Operation::class);
  }
  /**
   * Resizes the specified persistent disk. You can only increase the size of the
   * disk. (disks.resize)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $disk The name of the persistent disk.
   * @param DisksResizeRequest $postBody
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
  public function resize($project, $zone, $disk, DisksResizeRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'disk' => $disk, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('resize', [$params], Operation::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. (disks.setIamPolicy)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param ZoneSetPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function setIamPolicy($project, $zone, $resource, ZoneSetPolicyRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], Policy::class);
  }
  /**
   * Sets the labels on a disk. To learn more about labels, read the Labeling
   * Resources documentation. (disks.setLabels)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param ZoneSetLabelsRequest $postBody
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
  public function setLabels($project, $zone, $resource, ZoneSetLabelsRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setLabels', [$params], Operation::class);
  }
  /**
   * Returns permissions that a caller has on the specified resource.
   * (disks.testIamPermissions)
   *
   * @param string $project Project ID for this request.
   * @param string $zone The name of the zone for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param TestPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return TestPermissionsResponse
   */
  public function testIamPermissions($project, $zone, $resource, TestPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'zone' => $zone, 'resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], TestPermissionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Disks::class, 'Google_Service_Compute_Resource_Disks');
