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

namespace Google\Service\BigQueryConnectionService\Resource;

use Google\Service\BigQueryConnectionService\BigqueryconnectionEmpty;
use Google\Service\BigQueryConnectionService\Connection;
use Google\Service\BigQueryConnectionService\ConnectionCredential;
use Google\Service\BigQueryConnectionService\GetIamPolicyRequest;
use Google\Service\BigQueryConnectionService\ListConnectionsResponse;
use Google\Service\BigQueryConnectionService\Policy;
use Google\Service\BigQueryConnectionService\SetIamPolicyRequest;
use Google\Service\BigQueryConnectionService\TestIamPermissionsRequest;
use Google\Service\BigQueryConnectionService\TestIamPermissionsResponse;

/**
 * The "connections" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigqueryconnectionService = new Google\Service\BigQueryConnectionService(...);
 *   $connections = $bigqueryconnectionService->connections;
 *  </code>
 */
class ProjectsLocationsConnections extends \Google\Service\Resource
{
  /**
   * Creates a new connection. (connections.create)
   *
   * @param string $parent Required. Parent resource name. Must be in the format
   * `projects/{project_id}/locations/{location_id}`
   * @param Connection $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string connectionId Optional. Connection id that should be
   * assigned to the created connection.
   * @return Connection
   */
  public function create($parent, Connection $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Connection::class);
  }
  /**
   * Deletes connection and associated credential. (connections.delete)
   *
   * @param string $name Required. Name of the deleted connection, for example:
   * `projects/{project_id}/locations/{location_id}/connections/{connection_id}`
   * @param array $optParams Optional parameters.
   * @return BigqueryconnectionEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], BigqueryconnectionEmpty::class);
  }
  /**
   * Returns specified connection. (connections.get)
   *
   * @param string $name Required. Name of the requested connection, for example:
   * `projects/{project_id}/locations/{location_id}/connections/{connection_id}`
   * @param array $optParams Optional parameters.
   * @return Connection
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Connection::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (connections.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Policy
   */
  public function getIamPolicy($resource, GetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], Policy::class);
  }
  /**
   * Returns a list of connections in the given project.
   * (connections.listProjectsLocationsConnections)
   *
   * @param string $parent Required. Parent resource name. Must be in the form:
   * `projects/{project_id}/locations/{location_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults Required. Maximum number of results per page.
   * @opt_param string pageToken Page token.
   * @return ListConnectionsResponse
   */
  public function listProjectsLocationsConnections($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListConnectionsResponse::class);
  }
  /**
   * Updates the specified connection. For security reasons, also resets
   * credential if connection properties are in the update field mask.
   * (connections.patch)
   *
   * @param string $name Required. Name of the connection to update, for example:
   * `projects/{project_id}/locations/{location_id}/connections/{connection_id}`
   * @param Connection $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Update mask for the connection fields
   * to be updated.
   * @return Connection
   */
  public function patch($name, Connection $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Connection::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (connections.setIamPolicy)
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
   * (connections.testIamPermissions)
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
  /**
   * Sets the credential for the specified connection.
   * (connections.updateCredential)
   *
   * @param string $name Required. Name of the connection, for example: `projects/
   * {project_id}/locations/{location_id}/connections/{connection_id}/credential`
   * @param ConnectionCredential $postBody
   * @param array $optParams Optional parameters.
   * @return BigqueryconnectionEmpty
   */
  public function updateCredential($name, ConnectionCredential $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateCredential', [$params], BigqueryconnectionEmpty::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsConnections::class, 'Google_Service_BigQueryConnectionService_Resource_ProjectsLocationsConnections');
