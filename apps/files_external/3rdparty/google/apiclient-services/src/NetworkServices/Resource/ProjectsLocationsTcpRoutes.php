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

namespace Google\Service\NetworkServices\Resource;

use Google\Service\NetworkServices\ListTcpRoutesResponse;
use Google\Service\NetworkServices\Operation;
use Google\Service\NetworkServices\TcpRoute;

/**
 * The "tcpRoutes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $networkservicesService = new Google\Service\NetworkServices(...);
 *   $tcpRoutes = $networkservicesService->tcpRoutes;
 *  </code>
 */
class ProjectsLocationsTcpRoutes extends \Google\Service\Resource
{
  /**
   * Creates a new TcpRoute in a given project and location. (tcpRoutes.create)
   *
   * @param string $parent Required. The parent resource of the TcpRoute. Must be
   * in the format `projects/locations/global`.
   * @param TcpRoute $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string tcpRouteId Required. Short name of the TcpRoute resource to
   * be created. E.g. TODO(Add an example).
   * @return Operation
   */
  public function create($parent, TcpRoute $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a single TcpRoute. (tcpRoutes.delete)
   *
   * @param string $name Required. A name of the TcpRoute to delete. Must be in
   * the format `projects/locations/global/tcpRoutes`.
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
   * Gets details of a single TcpRoute. (tcpRoutes.get)
   *
   * @param string $name Required. A name of the TcpRoute to get. Must be in the
   * format `projects/locations/global/tcpRoutes`.
   * @param array $optParams Optional parameters.
   * @return TcpRoute
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], TcpRoute::class);
  }
  /**
   * Lists TcpRoute in a given project and location.
   * (tcpRoutes.listProjectsLocationsTcpRoutes)
   *
   * @param string $parent Required. The project and location from which the
   * TcpRoutes should be listed, specified in the format
   * `projects/locations/global`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of TcpRoutes to return per call.
   * @opt_param string pageToken The value returned by the last
   * `ListTcpRoutesResponse` Indicates that this is a continuation of a prior
   * `ListTcpRoutes` call, and that the system should return the next page of
   * data.
   * @return ListTcpRoutesResponse
   */
  public function listProjectsLocationsTcpRoutes($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListTcpRoutesResponse::class);
  }
  /**
   * Updates the parameters of a single TcpRoute. (tcpRoutes.patch)
   *
   * @param string $name Required. Name of the TcpRoute resource. It matches
   * pattern `projects/locations/global/tcpRoutes/tcp_route_name>`.
   * @param TcpRoute $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Optional. Field mask is used to specify the
   * fields to be overwritten in the TcpRoute resource by the update. The fields
   * specified in the update_mask are relative to the resource, not the full
   * request. A field will be overwritten if it is in the mask. If the user does
   * not provide a mask then all fields will be overwritten.
   * @return Operation
   */
  public function patch($name, TcpRoute $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsTcpRoutes::class, 'Google_Service_NetworkServices_Resource_ProjectsLocationsTcpRoutes');
