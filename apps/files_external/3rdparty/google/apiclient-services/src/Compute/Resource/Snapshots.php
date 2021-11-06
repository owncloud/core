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

use Google\Service\Compute\GlobalSetLabelsRequest;
use Google\Service\Compute\GlobalSetPolicyRequest;
use Google\Service\Compute\Operation;
use Google\Service\Compute\Policy;
use Google\Service\Compute\Snapshot;
use Google\Service\Compute\SnapshotList;
use Google\Service\Compute\TestPermissionsRequest;
use Google\Service\Compute\TestPermissionsResponse;

/**
 * The "snapshots" collection of methods.
 * Typical usage is:
 *  <code>
 *   $computeService = new Google\Service\Compute(...);
 *   $snapshots = $computeService->snapshots;
 *  </code>
 */
class Snapshots extends \Google\Service\Resource
{
  /**
   * Deletes the specified Snapshot resource. Keep in mind that deleting a single
   * snapshot might not necessarily delete all the data on that snapshot. If any
   * data on the snapshot that is marked for deletion is needed for subsequent
   * snapshots, the data will be moved to the next corresponding snapshot. For
   * more information, see Deleting snapshots. (snapshots.delete)
   *
   * @param string $project Project ID for this request.
   * @param string $snapshot Name of the Snapshot resource to delete.
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
  public function delete($project, $snapshot, $optParams = [])
  {
    $params = ['project' => $project, 'snapshot' => $snapshot];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Returns the specified Snapshot resource. Gets a list of available snapshots
   * by making a list() request. (snapshots.get)
   *
   * @param string $project Project ID for this request.
   * @param string $snapshot Name of the Snapshot resource to return.
   * @param array $optParams Optional parameters.
   * @return Snapshot
   */
  public function get($project, $snapshot, $optParams = [])
  {
    $params = ['project' => $project, 'snapshot' => $snapshot];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Snapshot::class);
  }
  /**
   * Gets the access control policy for a resource. May be empty if no such policy
   * or resource exists. (snapshots.getIamPolicy)
   *
   * @param string $project Project ID for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int optionsRequestedPolicyVersion Requested IAM Policy version.
   * @return Policy
   */
  public function getIamPolicy($project, $resource, $optParams = [])
  {
    $params = ['project' => $project, 'resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Retrieves the list of Snapshot resources contained within the specified
   * project. (snapshots.listSnapshots)
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
   * @return SnapshotList
   */
  public function listSnapshots($project, $optParams = [])
  {
    $params = ['project' => $project];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], SnapshotList::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. (snapshots.setIamPolicy)
   *
   * @param string $project Project ID for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param GlobalSetPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function setIamPolicy($project, $resource, GlobalSetPolicyRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], Policy::class);
  }
  /**
   * Sets the labels on a snapshot. To learn more about labels, read the Labeling
   * Resources documentation. (snapshots.setLabels)
   *
   * @param string $project Project ID for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param GlobalSetLabelsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function setLabels($project, $resource, GlobalSetLabelsRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setLabels', [$params], Operation::class);
  }
  /**
   * Returns permissions that a caller has on the specified resource.
   * (snapshots.testIamPermissions)
   *
   * @param string $project Project ID for this request.
   * @param string $resource Name or id of the resource for this request.
   * @param TestPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return TestPermissionsResponse
   */
  public function testIamPermissions($project, $resource, TestPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['project' => $project, 'resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], TestPermissionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Snapshots::class, 'Google_Service_Compute_Resource_Snapshots');
