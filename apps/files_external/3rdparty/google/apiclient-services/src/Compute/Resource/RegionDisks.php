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
use Google\Service\Compute\DiskList;
use Google\Service\Compute\Operation;
use Google\Service\Compute\Policy;
use Google\Service\Compute\RegionDisksAddResourcePoliciesRequest;
use Google\Service\Compute\RegionDisksRemoveResourcePoliciesRequest;
use Google\Service\Compute\RegionDisksResizeRequest;
use Google\Service\Compute\RegionSetLabelsRequest;
use Google\Service\Compute\RegionSetPolicyRequest;
use Google\Service\Compute\Snapshot;
use Google\Service\Compute\TestPermissionsRequest;
use Google\Service\Compute\TestPermissionsResponse;

/**
 * The "regionDisks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google\Service\Compute(...);
 *   $regionDisks = $computeService->regionDisks;
 *  </code>
 */
class RegionDisks extends \Google\Service\Resource
{
  /**
   * Adds existing resource policies to a regional disk. You can only add one
   * policy which will be applied to this disk for scheduling snapshot creation.
   * (regionDisks.addResourcePolicies)
   *
   * @param string $project Project ID for this request.
   * @param string $region The name of the region for this request.
   * @param string $disk The disk name for this request.
   * @param RegionDisksAddResourcePoliciesRequest $postBody
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
  public function addResourcePolicies($project, $region, $disk, RegionDisksAddResourcePoliciesRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'disk' => $disk, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addResourcePolicies', [$params], Operation::class);
  }
  /**
   * Creates a snapshot of a specified persistent disk. For regular snapshot
   * creation, consider using snapshots.insert instead, as that method supports
   * more features, such as creating snapshots in a project different from the
   * source disk project. (regionDisks.createSnapshot)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region for this request.
   * @param string $disk Name of the regional persistent disk to snapshot.
   * @param Snapshot $postBody
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
  public function createSnapshot($project, $region, $disk, Snapshot $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'disk' => $disk, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('createSnapshot', [$params], Operation::class);
  }
  /**
   * Deletes the specified regional persistent disk. Deleting a regional disk
   * removes all the replicas of its data permanently and is irreversible.
   * However, deleting a disk does not delete any snapshots previously made from
   * the disk. You must separately delete snapshots. (regionDisks.delete)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region for this request.
   * @param string $disk Name of the regional persistent disk to delete.
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
  public function delete($project, $region, $disk, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'disk' => $disk];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Returns a specified regional persistent disk. (regionDisks.get)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region for this request.
   * @param string $disk Name of the regional persistent disk to return.
   * @param array $optParams Optional parameters.
   * @return Disk
   */
  public function get($project, $region, $disk, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'disk' => $disk];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Disk::class);
  }
  /**
   * Gets the access control policy for a resource. May be empty if no such policy
   * or resource exists. (regionDisks.getIamPolicy)
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
   * Creates a persistent regional disk in the specified project using the data
   * included in the request. (regionDisks.insert)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region for this request.
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
  public function insert($project, $region, Disk $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Operation::class);
  }
  /**
   * Retrieves the list of persistent disks contained within the specified region.
   * (regionDisks.listRegionDisks)
   *
   * @param string $project Project ID for this request.
   * @param string $region Name of the region for this request.
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
  public function listRegionDisks($project, $region, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], DiskList::class);
  }
  /**
   * Removes resource policies from a regional disk.
   * (regionDisks.removeResourcePolicies)
   *
   * @param string $project Project ID for this request.
   * @param string $region The name of the region for this request.
   * @param string $disk The disk name for this request.
   * @param RegionDisksRemoveResourcePoliciesRequest $postBody
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
  public function removeResourcePolicies($project, $region, $disk, RegionDisksRemoveResourcePoliciesRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'disk' => $disk, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('removeResourcePolicies', [$params], Operation::class);
  }
  /**
   * Resizes the specified regional persistent disk. (regionDisks.resize)
   *
   * @param string $project The project ID for this request.
   * @param string $region Name of the region for this request.
   * @param string $disk Name of the regional persistent disk.
   * @param RegionDisksResizeRequest $postBody
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
  public function resize($project, $region, $disk, RegionDisksResizeRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'disk' => $disk, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('resize', [$params], Operation::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. (regionDisks.setIamPolicy)
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
   * Sets the labels on the target regional disk. (regionDisks.setLabels)
   *
   * @param string $project Project ID for this request.
   * @param string $region The region for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param RegionSetLabelsRequest $postBody
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
  public function setLabels($project, $region, $resource, RegionSetLabelsRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'region' => $region, 'resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setLabels', [$params], Operation::class);
  }
  /**
   * Returns permissions that a caller has on the specified resource.
   * (regionDisks.testIamPermissions)
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
class_alias(RegionDisks::class, 'Google_Service_Compute_Resource_RegionDisks');
