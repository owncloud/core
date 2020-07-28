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
 * The "snapshots" collection of methods.
 * Typical usage is:
 *  <code>
 *   $pubsubService = new Google_Service_Pubsub(...);
 *   $snapshots = $pubsubService->snapshots;
 *  </code>
 */
class Google_Service_Pubsub_Resource_ProjectsSnapshots extends Google_Service_Resource
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
   * requests, you must specify a name.  See the  resource name rules. Format is
   * `projects/{project}/snapshots/{snap}`.
   * @param Google_Service_Pubsub_CreateSnapshotRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_Snapshot
   */
  public function create($name, Google_Service_Pubsub_CreateSnapshotRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Pubsub_Snapshot");
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
   * @return Google_Service_Pubsub_PubsubEmpty
   */
  public function delete($snapshot, $optParams = array())
  {
    $params = array('snapshot' => $snapshot);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Pubsub_PubsubEmpty");
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
   * @return Google_Service_Pubsub_Snapshot
   */
  public function get($snapshot, $optParams = array())
  {
    $params = array('snapshot' => $snapshot);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Pubsub_Snapshot");
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
   * @opt_param int options.requestedPolicyVersion Optional. The policy format
   * version to be returned.
   *
   * Valid values are 0, 1, and 3. Requests specifying an invalid value will be
   * rejected.
   *
   * Requests for policies with any conditional bindings must specify version 3.
   * Policies without any conditional bindings may specify any valid value or
   * leave the field unset.
   *
   * To learn which resources support conditions in their IAM policies, see the
   * [IAM documentation](https://cloud.google.com/iam/help/conditions/resource-
   * policies).
   * @return Google_Service_Pubsub_Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_Pubsub_Policy");
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
   * @return Google_Service_Pubsub_ListSnapshotsResponse
   */
  public function listProjectsSnapshots($project, $optParams = array())
  {
    $params = array('project' => $project);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Pubsub_ListSnapshotsResponse");
  }
  /**
   * Updates an existing snapshot. Snapshots are used in Seek operations, which
   * allow you to manage message acknowledgments in bulk. That is, you can set the
   * acknowledgment state of messages in an existing subscription to the state
   * captured by a snapshot. (snapshots.patch)
   *
   * @param string $name The name of the snapshot.
   * @param Google_Service_Pubsub_UpdateSnapshotRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_Snapshot
   */
  public function patch($name, Google_Service_Pubsub_UpdateSnapshotRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Pubsub_Snapshot");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy.
   *
   * Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and `PERMISSION_DENIED` errors.
   * (snapshots.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_Pubsub_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_Policy
   */
  public function setIamPolicy($resource, Google_Service_Pubsub_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_Pubsub_Policy");
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error.
   *
   * Note: This operation is designed to be used for building permission-aware UIs
   * and command-line tools, not for authorization checking. This operation may
   * "fail open" without warning. (snapshots.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_Pubsub_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Pubsub_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_Pubsub_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_Pubsub_TestIamPermissionsResponse");
  }
}
