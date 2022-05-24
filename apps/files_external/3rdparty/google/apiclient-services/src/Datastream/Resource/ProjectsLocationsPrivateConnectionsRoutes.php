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

use Google\Service\Datastream\ListRoutesResponse;
use Google\Service\Datastream\Operation;
use Google\Service\Datastream\Route;

/**
 * The "routes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datastreamService = new Google\Service\Datastream(...);
 *   $routes = $datastreamService->routes;
 *  </code>
 */
class ProjectsLocationsPrivateConnectionsRoutes extends \Google\Service\Resource
{
  /**
   * Use this method to create a route for a private connectivity configuration in
   * a project and location. (routes.create)
   *
   * @param string $parent Required. The parent that owns the collection of
   * Routes.
   * @param Route $postBody
   * @param array $optParams Optional parameters.
   *
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
   * @opt_param string routeId Required. The Route identifier.
   * @return Operation
   */
  public function create($parent, Route $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Use this method to delete a route. (routes.delete)
   *
   * @param string $name Required. The name of the Route resource to delete.
   * @param array $optParams Optional parameters.
   *
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
   * Use this method to get details about a route. (routes.get)
   *
   * @param string $name Required. The name of the Route resource to get.
   * @param array $optParams Optional parameters.
   * @return Route
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Route::class);
  }
  /**
   * Use this method to list routes created for a private connectivity
   * configuration in a project and location.
   * (routes.listProjectsLocationsPrivateConnectionsRoutes)
   *
   * @param string $parent Required. The parent that owns the collection of
   * Routess.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filter request.
   * @opt_param string orderBy Order by fields for the result.
   * @opt_param int pageSize Maximum number of Routes to return. The service may
   * return fewer than this value. If unspecified, at most 50 Routes will be
   * returned. The maximum value is 1000; values above 1000 will be coerced to
   * 1000.
   * @opt_param string pageToken Page token received from a previous `ListRoutes`
   * call. Provide this to retrieve the subsequent page. When paginating, all
   * other parameters provided to `ListRoutes` must match the call that provided
   * the page token.
   * @return ListRoutesResponse
   */
  public function listProjectsLocationsPrivateConnectionsRoutes($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListRoutesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsPrivateConnectionsRoutes::class, 'Google_Service_Datastream_Resource_ProjectsLocationsPrivateConnectionsRoutes');
