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

namespace Google\Service\BeyondCorp\Resource;

use Google\Service\BeyondCorp\Connection;
use Google\Service\BeyondCorp\GoogleIamV1Policy;
use Google\Service\BeyondCorp\GoogleIamV1SetIamPolicyRequest;
use Google\Service\BeyondCorp\GoogleIamV1TestIamPermissionsRequest;
use Google\Service\BeyondCorp\GoogleIamV1TestIamPermissionsResponse;
use Google\Service\BeyondCorp\GoogleLongrunningOperation;
use Google\Service\BeyondCorp\ListConnectionsResponse;
use Google\Service\BeyondCorp\ResolveConnectionsResponse;

/**
 * The "connections" collection of methods.
 * Typical usage is:
 *  <code>
 *   $beyondcorpService = new Google\Service\BeyondCorp(...);
 *   $connections = $beyondcorpService->connections;
 *  </code>
 */
class ProjectsLocationsConnections extends \Google\Service\Resource
{
  /**
   * Creates a new Connection in a given project and location.
   * (connections.create)
   *
   * @param string $parent Required. The resource project name of the connection
   * location using the form: `projects/{project_id}/locations/{location_id}`
   * @param Connection $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string connectionId Optional. User-settable connection resource
   * ID. * Must start with a letter. * Must contain between 4-63 characters from
   * (/a-z-/). * Must end with a number or a letter.
   * @opt_param string requestId Optional. An optional request ID to identify
   * requests. Specify a unique request ID so that if you must retry your request,
   * the server will know to ignore the request if it has already been completed.
   * The server will guarantee that for at least 60 minutes since the first
   * request. For example, consider a situation where you make an initial request
   * and t he request times out. If you make the request again with the same
   * request ID, the server can check if original operation with the same request
   * ID was received, and if so, will ignore the second request. This prevents
   * clients from accidentally creating duplicate commitments. The request ID must
   * be a valid UUID with the exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @opt_param bool validateOnly Optional. If set, validates request by executing
   * a dry-run which would not alter the resource in any way.
   * @return GoogleLongrunningOperation
   */
  public function create($parent, Connection $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Deletes a single Connection. (connections.delete)
   *
   * @param string $name Required. BeyondCorp Connector name using the form:
   * `projects/{project_id}/locations/{location_id}/connections/{connection_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId Optional. An optional request ID to identify
   * requests. Specify a unique request ID so that if you must retry your request,
   * the server will know to ignore the request if it has already been completed.
   * The server will guarantee that for at least 60 minutes after the first
   * request. For example, consider a situation where you make an initial request
   * and t he request times out. If you make the request again with the same
   * request ID, the server can check if original operation with the same request
   * ID was received, and if so, will ignore the second request. This prevents
   * clients from accidentally creating duplicate commitments. The request ID must
   * be a valid UUID with the exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @opt_param bool validateOnly Optional. If set, validates request by executing
   * a dry-run which would not alter the resource in any way.
   * @return GoogleLongrunningOperation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Gets details of a single Connection. (connections.get)
   *
   * @param string $name Required. BeyondCorp Connection name using the form:
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
   * requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
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
   * @return GoogleIamV1Policy
   */
  public function getIamPolicy($resource, $optParams = [])
  {
    $params = ['resource' => $resource];
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', [$params], GoogleIamV1Policy::class);
  }
  /**
   * Lists Connections in a given project and location.
   * (connections.listProjectsLocationsConnections)
   *
   * @param string $parent Required. The resource name of the connection location
   * using the form: `projects/{project_id}/locations/{location_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. A filter specifying constraints of a list
   * operation.
   * @opt_param string orderBy Optional. Specifies the ordering of results. See
   * [Sorting
   * order](https://cloud.google.com/apis/design/design_patterns#sorting_order)
   * for more information.
   * @opt_param int pageSize Optional. The maximum number of items to return. If
   * not specified, a default value of 50 will be used by the service. Regardless
   * of the page_size value, the response may include a partial list and a caller
   * should only rely on response's next_page_token to determine if there are more
   * instances left to be queried.
   * @opt_param string pageToken Optional. The next_page_token value returned from
   * a previous ListConnectionsRequest, if any.
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
   * @param string $name Required. Unique resource name of the connection. The
   * name is ignored when creating a connection.
   * @param Connection $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool allowMissing Optional. If set as true, will create the
   * resource if it is not found.
   * @opt_param string requestId Optional. An optional request ID to identify
   * requests. Specify a unique request ID so that if you must retry your request,
   * the server will know to ignore the request if it has already been completed.
   * The server will guarantee that for at least 60 minutes since the first
   * request. For example, consider a situation where you make an initial request
   * and t he request times out. If you make the request again with the same
   * request ID, the server can check if original operation with the same request
   * ID was received, and if so, will ignore the second request. This prevents
   * clients from accidentally creating duplicate commitments. The request ID must
   * be a valid UUID with the exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @opt_param string updateMask Required. Mask of fields to update. At least one
   * path must be supplied in this field. The elements of the repeated paths field
   * may only include these fields from [BeyondCorp.Connection]: * `labels` *
   * `display_name` * `application_endpoint` * `connectors`
   * @opt_param bool validateOnly Optional. If set, validates request by executing
   * a dry-run which would not alter the resource in any way.
   * @return GoogleLongrunningOperation
   */
  public function patch($name, Connection $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Resolves connections details for a given connector. An internal method called
   * by a connector to find connections to connect to. (connections.resolve)
   *
   * @param string $parent Required. The resource name of the connection location
   * using the form: `projects/{project_id}/locations/{location_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string connectorId Required. BeyondCorp Connector name of the
   * connector associated with those connections using the form:
   * `projects/{project_id}/locations/{location_id}/connectors/{connector_id}`
   * @opt_param int pageSize Optional. The maximum number of items to return. If
   * not specified, a default value of 50 will be used by the service. Regardless
   * of the page_size value, the response may include a partial list and a caller
   * should only rely on response's next_page_token to determine if there are more
   * instances left to be queried.
   * @opt_param string pageToken Optional. The next_page_token value returned from
   * a previous ResolveConnectionsResponse, if any.
   * @return ResolveConnectionsResponse
   */
  public function resolve($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('resolve', [$params], ResolveConnectionsResponse::class);
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (connections.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param GoogleIamV1SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleIamV1Policy
   */
  public function setIamPolicy($resource, GoogleIamV1SetIamPolicyRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', [$params], GoogleIamV1Policy::class);
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
   * being requested. See [Resource
   * names](https://cloud.google.com/apis/design/resource_names) for the
   * appropriate value for this field.
   * @param GoogleIamV1TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleIamV1TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, GoogleIamV1TestIamPermissionsRequest $postBody, $optParams = [])
  {
    $params = ['resource' => $resource, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', [$params], GoogleIamV1TestIamPermissionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsConnections::class, 'Google_Service_BeyondCorp_Resource_ProjectsLocationsConnections');
