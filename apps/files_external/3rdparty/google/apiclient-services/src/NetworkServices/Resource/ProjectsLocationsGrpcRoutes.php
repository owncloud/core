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

use Google\Service\NetworkServices\GrpcRoute;
use Google\Service\NetworkServices\ListGrpcRoutesResponse;
use Google\Service\NetworkServices\Operation;

/**
 * The "grpcRoutes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $networkservicesService = new Google\Service\NetworkServices(...);
 *   $grpcRoutes = $networkservicesService->grpcRoutes;
 *  </code>
 */
class ProjectsLocationsGrpcRoutes extends \Google\Service\Resource
{
  /**
   * Creates a new GrpcRoute in a given project and location. (grpcRoutes.create)
   *
   * @param string $parent Required. The parent resource of the GrpcRoute. Must be
   * in the format `projects/locations/global`.
   * @param GrpcRoute $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string grpcRouteId Required. Short name of the GrpcRoute resource
   * to be created.
   * @return Operation
   */
  public function create($parent, GrpcRoute $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a single GrpcRoute. (grpcRoutes.delete)
   *
   * @param string $name Required. A name of the GrpcRoute to delete. Must be in
   * the format `projects/locations/global/grpcRoutes`.
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
   * Gets details of a single GrpcRoute. (grpcRoutes.get)
   *
   * @param string $name Required. A name of the GrpcRoute to get. Must be in the
   * format `projects/locations/global/grpcRoutes`.
   * @param array $optParams Optional parameters.
   * @return GrpcRoute
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GrpcRoute::class);
  }
  /**
   * Lists GrpcRoutes in a given project and location.
   * (grpcRoutes.listProjectsLocationsGrpcRoutes)
   *
   * @param string $parent Required. The project and location from which the
   * GrpcRoutes should be listed, specified in the format
   * `projects/locations/global`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of GrpcRoutes to return per call.
   * @opt_param string pageToken The value returned by the last
   * `ListGrpcRoutesResponse` Indicates that this is a continuation of a prior
   * `ListGrpcRoutes` call, and that the system should return the next page of
   * data.
   * @return ListGrpcRoutesResponse
   */
  public function listProjectsLocationsGrpcRoutes($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListGrpcRoutesResponse::class);
  }
  /**
   * Updates the parameters of a single GrpcRoute. (grpcRoutes.patch)
   *
   * @param string $name Required. Name of the GrpcRoute resource. It matches
   * pattern `projects/locations/global/grpcRoutes/`
   * @param GrpcRoute $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Optional. Field mask is used to specify the
   * fields to be overwritten in the GrpcRoute resource by the update. The fields
   * specified in the update_mask are relative to the resource, not the full
   * request. A field will be overwritten if it is in the mask. If the user does
   * not provide a mask then all fields will be overwritten.
   * @return Operation
   */
  public function patch($name, GrpcRoute $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsGrpcRoutes::class, 'Google_Service_NetworkServices_Resource_ProjectsLocationsGrpcRoutes');
