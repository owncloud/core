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
 * The "connections" collection of methods.
 * Typical usage is:
 *  <code>
 *   $bigqueryconnectionService = new Google_Service_BigQueryConnectionService(...);
 *   $connections = $bigqueryconnectionService->connections;
 *  </code>
 */
class Google_Service_BigQueryConnectionService_Resource_ProjectsLocationsConnections extends Google_Service_Resource
{
  /**
   * Creates a new connection. (connections.create)
   *
   * @param string $parent Required. Parent resource name. Must be in the format
   * `projects/{project_id}/locations/{location_id}`
   * @param Google_Service_BigQueryConnectionService_Connection $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string connectionId Optional. Connection id that should be
   * assigned to the created connection.
   * @return Google_Service_BigQueryConnectionService_Connection
   */
  public function create($parent, Google_Service_BigQueryConnectionService_Connection $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_BigQueryConnectionService_Connection");
  }
  /**
   * Deletes connection and associated credential. (connections.delete)
   *
   * @param string $name Required. Name of the deleted connection, for example:
   * `projects/{project_id}/locations/{location_id}/connections/{connection_id}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigQueryConnectionService_BigqueryconnectionEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_BigQueryConnectionService_BigqueryconnectionEmpty");
  }
  /**
   * Returns specified connection. (connections.get)
   *
   * @param string $name Required. Name of the requested connection, for example:
   * `projects/{project_id}/locations/{location_id}/connections/{connection_id}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigQueryConnectionService_Connection
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_BigQueryConnectionService_Connection");
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (connections.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_BigQueryConnectionService_GetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigQueryConnectionService_Policy
   */
  public function getIamPolicy($resource, Google_Service_BigQueryConnectionService_GetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_BigQueryConnectionService_Policy");
  }
  /**
   * Returns a list of connections in the given project.
   * (connections.listProjectsLocationsConnections)
   *
   * @param string $parent Required. Parent resource name. Must be in the form:
   * `projects/{project_id}/locations/{location_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Page token.
   * @opt_param string maxResults Required. Maximum number of results per page.
   * @return Google_Service_BigQueryConnectionService_ListConnectionsResponse
   */
  public function listProjectsLocationsConnections($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_BigQueryConnectionService_ListConnectionsResponse");
  }
  /**
   * Updates the specified connection. For security reasons, also resets
   * credential if connection properties are in the update field mask.
   * (connections.patch)
   *
   * @param string $name Required. Name of the connection to update, for example:
   * `projects/{project_id}/locations/{location_id}/connections/{connection_id}`
   * @param Google_Service_BigQueryConnectionService_Connection $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Update mask for the connection fields
   * to be updated.
   * @return Google_Service_BigQueryConnectionService_Connection
   */
  public function patch($name, Google_Service_BigQueryConnectionService_Connection $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_BigQueryConnectionService_Connection");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy.
   *
   * Can return Public Errors: NOT_FOUND, INVALID_ARGUMENT and PERMISSION_DENIED
   * (connections.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_BigQueryConnectionService_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigQueryConnectionService_Policy
   */
  public function setIamPolicy($resource, Google_Service_BigQueryConnectionService_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_BigQueryConnectionService_Policy");
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * NOT_FOUND error.
   *
   * Note: This operation is designed to be used for building permission-aware UIs
   * and command-line tools, not for authorization checking. This operation may
   * "fail open" without warning. (connections.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_BigQueryConnectionService_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigQueryConnectionService_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_BigQueryConnectionService_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_BigQueryConnectionService_TestIamPermissionsResponse");
  }
  /**
   * Sets the credential for the specified connection.
   * (connections.updateCredential)
   *
   * @param string $name Required. Name of the connection, for example: `projects/
   * {project_id}/locations/{location_id}/connections/{connection_id}/credential`
   * @param Google_Service_BigQueryConnectionService_ConnectionCredential $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_BigQueryConnectionService_BigqueryconnectionEmpty
   */
  public function updateCredential($name, Google_Service_BigQueryConnectionService_ConnectionCredential $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateCredential', array($params), "Google_Service_BigQueryConnectionService_BigqueryconnectionEmpty");
  }
}
