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

namespace Google\Service\Connectors\Resource;

use Google\Service\Connectors\Connection;
use Google\Service\Connectors\ConnectionSchemaMetadata;
use Google\Service\Connectors\ListConnectionsResponse;
use Google\Service\Connectors\Operation;
use Google\Service\Connectors\Policy;
use Google\Service\Connectors\SetIamPolicyRequest;
use Google\Service\Connectors\TestIamPermissionsRequest;
use Google\Service\Connectors\TestIamPermissionsResponse;

/**
 * The "connections" collection of methods.
 * Typical usage is:
 *  <code>
 *   $connectorsService = new Google\Service\Connectors(...);
 *   $connections = $connectorsService->connections;
 *  </code>
 */
class ProjectsLocationsConnections extends \Google\Service\Resource
{
  /**
   * Creates a new Connection in a given project and location.
   * (connections.create)
   *
   * @param string $parent Required. Parent resource of the Connection, of the
   * form: `projects/locations`
   * @param Connection $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string connectionId Required. Identifier to assign to the
   * Connection. Must be unique within scope of the parent resource.
   * @return Operation
   */
  public function create($parent, Connection $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a single Connection. (connections.delete)
   *
   * @param string $name Required. Resource name of the form:
   * `projects/locations/connections`
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Gets details of a single Connection. (connections.get)
   *
   * @param string $name Required. Resource name of the form:
   * `projects/locations/connections`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view Specifies which fields of the Connection are returned
   * in the response. Defaults to `BASIC` view.
   * @return Connection
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Connection::class);
  }
  /**
   * Gets schema metadata of a connection. SchemaMetadata is a singleton resource
   * for each connection. (connections.getConnectionSchemaMetadata)
   *
   * @param string $name Required. Connection name Format: projects/{project}/loca
   * tions/{location}/connections/{connection}/connectionSchemaMetadata
   * @param array $optParams Optional parameters.
   * @return ConnectionSchemaMetadata
   */
  public function getConnectionSchemaMetadata($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getConnectionSchemaMetadata', [$params], ConnectionSchemaMetadata::class);
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set. (connections.getIamPolicy)
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
   * Lists Connections in a given project and location.
   * (connections.listProjectsLocationsConnections)
   *
   * @param string $parent Required. Parent resource of the Connection, of the
   * form: `projects/locations`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filter.
   * @opt_param string orderBy Order by parameters.
   * @opt_param int pageSize Page size.
   * @opt_param string pageToken Page token.
   * @opt_param string view Specifies which fields of the Connection are returned
   * in the response. Defaults to `BASIC` view.
   * @return ListConnectionsResponse
   */
  public function listProjectsLocationsConnections($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListConnectionsResponse::class);
  }
  /**
   * Updates the parameters of a single Connection. (connections.patch)
   *
   * @param string $name Output only. Resource name of the Connection. Format:
   * projects/{project}/locations/{location}/connections/{connection}
   * @param Connection $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Field mask is used to specify the fields to be
   * overwritten in the Connection resource by the update. The fields specified in
   * the update_mask are relative to the resource, not the full request. A field
   * will be overwritten if it is in the mask. If the user does not provide a mask
   * then all fields will be overwritten.
   * @return Operation
   */
  public function patch($name, Connection $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsConnections::class, 'Google_Service_Connectors_Resource_ProjectsLocationsConnections');
