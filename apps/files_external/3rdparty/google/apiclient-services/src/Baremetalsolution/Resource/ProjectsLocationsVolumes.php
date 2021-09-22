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

namespace Google\Service\Baremetalsolution\Resource;

use Google\Service\Baremetalsolution\ListVolumesResponse;
use Google\Service\Baremetalsolution\Volume;

/**
 * The "volumes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $baremetalsolutionService = new Google\Service\Baremetalsolution(...);
 *   $volumes = $baremetalsolutionService->volumes;
 *  </code>
 */
class ProjectsLocationsVolumes extends \Google\Service\Resource
{
  /**
   * Gets details of a single Volume. (volumes.get)
   *
   * @param string $name Required. Name of the resource.
   * @param array $optParams Optional parameters.
   * @return Volume
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Volume::class);
  }
  /**
   * Lists Volumes in a given project and location.
   * (volumes.listProjectsLocationsVolumes)
   *
   * @param string $parent Required. Parent value for ListVolumesRequest.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Filtering results.
   * @opt_param string orderBy Hint for how to order the results.
   * @opt_param int pageSize Requested page size. Server may return fewer items
   * than requested. If unspecified, server will pick an appropriate default.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return.
   * @return ListVolumesResponse
   */
  public function listProjectsLocationsVolumes($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListVolumesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsVolumes::class, 'Google_Service_Baremetalsolution_Resource_ProjectsLocationsVolumes');
