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

namespace Google\Service\Pubsub\Resource;

use Google\Service\Pubsub\CreateSnapshotRequest;
use Google\Service\Pubsub\ListSnapshotsResponse;
use Google\Service\Pubsub\Policy;
use Google\Service\Pubsub\PubsubEmpty;
use Google\Service\Pubsub\SetIamPolicyRequest;
use Google\Service\Pubsub\Snapshot;
use Google\Service\Pubsub\TestIamPermissionsRequest;
use Google\Service\Pubsub\TestIamPermissionsResponse;
use Google\Service\Pubsub\UpdateSnapshotRequest;

/**
 * The "snapshots" collection of methods.
 * Typical usage is:
 *  <code>
 *   $pubsubService = new Google\Service\Pubsub(...);
 *   $snapshots = $pubsubService->snapshots;
 *  </code>
 */
class ProjectsSnapshots extends \Google\Service\Resource
{
  /**
   * Creates a snapshot from the requested subscription. Snapshots are used in
   * [Seek](https://cloud.google.com/pubsub/docs/replay-overview) operations,
   * which allow you to manage message acknowledgments in bulk. That is, you can
   * set the acknowledgment state of messages in an existing subscription to the
   * state captured by a snapshot. If the snapshot already exists, returns
   * `ALREADY_EXISTS`. If the requested subscription doesn't exist, returns
   * `NOT_FOUND`. If the backlog in the subscription is too old -- and the
   * resulting snapshot would expire in less than 1 hour -- then
   * `FAILED_PRECONDITION` is returned. See also the `Snapshot.expire_time` field.
   * If the name is not provided in the request, the server will assign a random
   * name for this snapshot on the same project as the subscription, conforming to
   * the [resource name format]
   * (https://cloud.google.com/pubsub/docs/admin#resource_names). The generated
   * name is populated in the returned Snapshot object. Note that for REST API
   * requests, you must specify a name in the request. (snapshots.create)
   *
   * @param string $name Required. User-provided name for this snapshot. If the
   * name is not provided in the request, the server will assign a random name for
   * this snapshot on the same project as the subscription. Note that for REST API
   * requests, you must specify a name. See the resource name rules. Format is
   * `projects/{project}/snapshots/{snap}`.
   * @param CreateSnapshotRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Snapshot
   */
  public function create($name, CreateSnapshotRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Snapshot::class);
  }
  /**
   * Removes an existing snapshot. Snapshots are used in [Seek]
   * (https://cloud.google.com/pubsub/docs/replay-overview) operations, which
   * allow you to manage message acknowledgments in bulk. That is, you can set the
   * acknowledgment state of messages in an existing subscription to the state
   * captured by a snapshot. When the snapshot is deleted, all messages retained
   * in the snapshot are immediately dropped. After a snapshot is deleted, a new
   * one may be created with the same name, but the new one has no association
   * with the old snapshot or its subscription, unless the same subscription is
   * specified. (snapshots.delete)
   *
   * @param string $snapshot Required. The name of the snapshot to delete. Format
   * is `projects/{project}/snapshots/{snap}`.
   * @param array $optParams Optional parameters.
   * @return PubsubEmpty
   */
  public function delete($snapshot, $optParams = [])
  {
    $params = ['snapshot' => $snapshot];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], PubsubEmpty::class);
  }
  /**
   * Gets the configuration details of a snapshot. Snapshots are used in Seek
   * operations, which allow you to manage message acknowledgments in bulk. That
   * is, you can set the acknowledgment state of messages in an existing
   * subscription to the state captured by a snapshot. (snapshots.get)
   *
   * @param string $snapshot Required. The name of the snapshot to get. Format is
   * `projects/{project}/snapshots/{snap}`.
   * @param array $optParams Optional parameters.
   * @return Snapshot
   */
  public function get($snapshot, $optParams = [])
  {
    $params = ['snapshot' => $snapshot];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Snapshot::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (snapshots.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int options.requestedPolicyVersion Optional. The maximum policy
   * version that will be used to format the policy. Valid values are 0, 1, and 3.
   * Requests specifying an invalid value will be rejected. Requests for policies
   * with any conditional role bindings must specify version 3. Policies with no
   * conditional role bindings may specify any valid value or leave the field
   * unset. The policy in the response might use the policy version that you
   * specified, or it might use a lower policy version. For example, if you
   * specify version 3, but the policy has no conditional role bindings, the
   * response uses version 1. To learn which resources support conditions in their
   * IAM policies, see the [IAM
   * documentation](https://cloud.google.com/iam/help/conditions/resource-
   * policies).
   * @return Policy
   */
  public function getIamPolicy($resource, $optParams = [])
  {
    $params = ['resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Lists the existing snapshots. Snapshots are used in [Seek](
   * https://cloud.google.com/pubsub/docs/replay-overview) operations, which allow
   * you to manage message acknowledgments in bulk. That is, you can set the
   * acknowledgment state of messages in an existing subscription to the state
   * captured by a snapshot. (snapshots.listProjectsSnapshots)
   *
   * @param string $project Required. The name of the project in which to list
   * snapshots. Format is `projects/{project-id}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of snapshots to return.
   * @opt_param string pageToken The value returned by the last
   * `ListSnapshotsResponse`; indicates that this is a continuation of a prior
   * `ListSnapshots` call, and that the system should return the next page of
   * data.
   * @return ListSnapshotsResponse
   */
  public function listProjectsSnapshots($project, $optParams = [])
  {
    $params = ['project' => $project];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListSnapshotsResponse::class);
  }
  /**
   * Updates an existing snapshot. Snapshots are used in Seek operations, which
   * allow you to manage message acknowledgments in bulk. That is, you can set the
   * acknowledgment state of messages in an existing subscription to the state
   * captured by a snapshot. (snapshots.patch)
   *
   * @param string $name The name of the snapshot.
   * @param UpdateSnapshotRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Snapshot
   */
  public function patch($name, UpdateSnapshotRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Snapshot::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (snapshots.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function setIamPolicy($resource, SetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], Policy::class);
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning.
   * (snapshots.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, TestIamPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], TestIamPermissionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsSnapshots::class, 'Google_Service_Pubsub_Resource_ProjectsSnapshots');
