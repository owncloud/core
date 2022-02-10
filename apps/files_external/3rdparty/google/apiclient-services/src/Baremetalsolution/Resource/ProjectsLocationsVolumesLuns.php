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

use Google\Service\Baremetalsolution\ListLunsResponse;
use Google\Service\Baremetalsolution\Lun;

/**
 * The "luns" collection of methods.
 * Typical usage is:
 *  <code>
 *   $baremetalsolutionService = new Google\Service\Baremetalsolution(...);
 *   $luns = $baremetalsolutionService->luns;
 *  </code>
 */
class ProjectsLocationsVolumesLuns extends \Google\Service\Resource
{
  /**
   * Get details of a single storage logical unit number(LUN). (luns.get)
   *
   * @param string $name Required. Name of the resource.
   * @param array $optParams Optional parameters.
   * @return Lun
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Lun::class);
  }
  /**
   * List storage volume luns for given storage volume.
   * (luns.listProjectsLocationsVolumesLuns)
   *
   * @param string $parent Required. Parent value for ListLunsRequest.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Requested page size. The server might return fewer
   * items than requested. If unspecified, server will pick an appropriate
   * default.
   * @opt_param string pageToken A token identifying a page of results from the
   * server.
   * @return ListLunsResponse
   */
  public function listProjectsLocationsVolumesLuns($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListLunsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsVolumesLuns::class, 'Google_Service_Baremetalsolution_Resource_ProjectsLocationsVolumesLuns');
