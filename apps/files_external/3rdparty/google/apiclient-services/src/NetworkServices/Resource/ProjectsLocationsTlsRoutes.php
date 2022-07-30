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

use Google\Service\NetworkServices\ListTlsRoutesResponse;
use Google\Service\NetworkServices\Operation;
use Google\Service\NetworkServices\TlsRoute;

/**
 * The "tlsRoutes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $networkservicesService = new Google\Service\NetworkServices(...);
 *   $tlsRoutes = $networkservicesService->tlsRoutes;
 *  </code>
 */
class ProjectsLocationsTlsRoutes extends \Google\Service\Resource
{
  /**
   * Creates a new TlsRoute in a given project and location. (tlsRoutes.create)
   *
   * @param string $parent Required. The parent resource of the TlsRoute. Must be
   * in the format `projects/locations/global`.
   * @param TlsRoute $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string tlsRouteId Required. Short name of the TlsRoute resource to
   * be created. E.g. TODO(Add an example).
   * @return Operation
   */
  public function create($parent, TlsRoute $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a single TlsRoute. (tlsRoutes.delete)
   *
   * @param string $name Required. A name of the TlsRoute to delete. Must be in
   * the format `projects/locations/global/tlsRoutes`.
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
   * Gets details of a single TlsRoute. (tlsRoutes.get)
   *
   * @param string $name Required. A name of the TlsRoute to get. Must be in the
   * format `projects/locations/global/tlsRoutes`.
   * @param array $optParams Optional parameters.
   * @return TlsRoute
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], TlsRoute::class);
  }
  /**
   * Lists TlsRoute in a given project and location.
   * (tlsRoutes.listProjectsLocationsTlsRoutes)
   *
   * @param string $parent Required. The project and location from which the
   * TlsRoutes should be listed, specified in the format
   * `projects/locations/global`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of TlsRoutes to return per call.
   * @opt_param string pageToken The value returned by the last
   * `ListTlsRoutesResponse` Indicates that this is a continuation of a prior
   * `ListTlsRoutes` call, and that the system should return the next page of
   * data.
   * @return ListTlsRoutesResponse
   */
  public function listProjectsLocationsTlsRoutes($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListTlsRoutesResponse::class);
  }
  /**
   * Updates the parameters of a single TlsRoute. (tlsRoutes.patch)
   *
   * @param string $name Required. Name of the TlsRoute resource. It matches
   * pattern `projects/locations/global/tlsRoutes/tls_route_name>`.
   * @param TlsRoute $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Optional. Field mask is used to specify the
   * fields to be overwritten in the TlsRoute resource by the update. The fields
   * specified in the update_mask are relative to the resource, not the full
   * request. A field will be overwritten if it is in the mask. If the user does
   * not provide a mask then all fields will be overwritten.
   * @return Operation
   */
  public function patch($name, TlsRoute $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsTlsRoutes::class, 'Google_Service_NetworkServices_Resource_ProjectsLocationsTlsRoutes');
