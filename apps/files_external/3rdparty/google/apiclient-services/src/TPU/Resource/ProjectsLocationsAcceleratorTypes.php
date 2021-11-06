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

namespace Google\Service\TPU\Resource;

use Google\Service\TPU\AcceleratorType;
use Google\Service\TPU\ListAcceleratorTypesResponse;

/**
 * The "acceleratorTypes" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tpuService = new Google\Service\TPU(...);
 *   $acceleratorTypes = $tpuService->acceleratorTypes;
 *  </code>
 */
class ProjectsLocationsAcceleratorTypes extends \Google\Service\Resource
{
  /**
   * Gets AcceleratorType. (acceleratorTypes.get)
   *
   * @param string $name Required. The resource name.
   * @param array $optParams Optional parameters.
   * @return AcceleratorType
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], AcceleratorType::class);
  }
  /**
   * Lists accelerator types supported by this API.
   * (acceleratorTypes.listProjectsLocationsAcceleratorTypes)
   *
   * @param string $parent Required. The parent resource name.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter List filter.
   * @opt_param string orderBy Sort results.
   * @opt_param int pageSize The maximum number of items to return.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous List request, if any.
   * @return ListAcceleratorTypesResponse
   */
  public function listProjectsLocationsAcceleratorTypes($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListAcceleratorTypesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsAcceleratorTypes::class, 'Google_Service_TPU_Resource_ProjectsLocationsAcceleratorTypes');
