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

namespace Google\Service\Datastream\Resource;

use Google\Service\Datastream\ListPrivateConnectionsResponse;
use Google\Service\Datastream\Operation;
use Google\Service\Datastream\PrivateConnection;

/**
 * The "privateConnections" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datastreamService = new Google\Service\Datastream(...);
 *   $privateConnections = $datastreamService->privateConnections;
 *  </code>
 */
class ProjectsLocationsPrivateConnections extends \Google\Service\Resource
{
  /**
   * Use this method to create a private connectivity configuration.
   * (privateConnections.create)
   *
   * @param string $parent Required. The parent that owns the collection of
   * PrivateConnections.
   * @param PrivateConnection $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string privateConnectionId Required. The private connectivity
   * identifier.
   * @opt_param string requestId Optional. A request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. The
   * server will guarantee that for at least 60 minutes since the first request.
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function create($parent, PrivateConnection $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Use this method to delete a private connectivity configuration.
   * (privateConnections.delete)
   *
   * @param string $name Required. The name of the private connectivity
   * configuration to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool force Optional. If set to true, any child routes that belong
   * to this PrivateConnection will also be deleted.
   * @opt_param string requestId Optional. A request ID to identify requests.
   * Specify a unique request ID so that if you must retry your request, the
   * server will know to ignore the request if it has already been completed. The
   * server will guarantee that for at least 60 minutes after the first request.
   * For example, consider a situation where you make an initial request and the
   * request times out. If you make the request again with the same request ID,
   * the server can check if original operation with the same request ID was
   * received, and if so, will ignore the second request. This prevents clients
   * from accidentally creating duplicate commitments. The request ID must be a
   * valid UUID with the exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Use this method to get details about a private connectivity configuration.
   * (privateConnections.get)
   *
   * @param string $name Required. The name of the private connectivity
   * configuration to get.
   * @param array $optParams Optional parameters.
   * @return PrivateConnection
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], PrivateConnection::class);
  }
  /**
   * Use this method to list private connectivity configurations in a project and
   * location. (privateConnections.listProjectsLocationsPrivateConnections)
   *
   * @param string $parent Required. The parent that owns the collection of
   * private connectivity configurations.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filter request.
   * @opt_param string orderBy Order by fields for the result.
   * @opt_param int pageSize Maximum number of private connectivity configurations
   * to return. If unspecified, at most 50 private connectivity configurations
   * that will be returned. The maximum value is 1000; values above 1000 will be
   * coerced to 1000.
   * @opt_param string pageToken Page token received from a previous
   * `ListPrivateConnections` call. Provide this to retrieve the subsequent page.
   * When paginating, all other parameters provided to `ListPrivateConnections`
   * must match the call that provided the page token.
   * @return ListPrivateConnectionsResponse
   */
  public function listProjectsLocationsPrivateConnections($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListPrivateConnectionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsPrivateConnections::class, 'Google_Service_Datastream_Resource_ProjectsLocationsPrivateConnections');
