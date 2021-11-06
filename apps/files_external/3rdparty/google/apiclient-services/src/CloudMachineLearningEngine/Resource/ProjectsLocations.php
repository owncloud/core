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

namespace Google\Service\CloudMachineLearningEngine\Resource;

use Google\Service\CloudMachineLearningEngine\GoogleCloudMlV1ListLocationsResponse;
use Google\Service\CloudMachineLearningEngine\GoogleCloudMlV1Location;

/**
 * The "locations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mlService = new Google\Service\CloudMachineLearningEngine(...);
 *   $locations = $mlService->locations;
 *  </code>
 */
class ProjectsLocations extends \Google\Service\Resource
{
  /**
   * Get the complete list of CMLE capabilities in a location, along with their
   * location-specific properties. (locations.get)
   *
   * @param string $name Required. The name of the location.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudMlV1Location
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudMlV1Location::class);
  }
  /**
   * List all locations that provides at least one type of CMLE capability.
   * (locations.listProjectsLocations)
   *
   * @param string $parent Required. The name of the project for which available
   * locations are to be listed (since some locations might be whitelisted for
   * specific projects).
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The number of locations to retrieve per
   * "page" of results. If there are more remaining results than this number, the
   * response message will contain a valid value in the `next_page_token` field.
   * The default value is 20, and the maximum page size is 100.
   * @opt_param string pageToken Optional. A page token to request the next page
   * of results. You get the token from the `next_page_token` field of the
   * response from the previous call.
   * @return GoogleCloudMlV1ListLocationsResponse
   */
  public function listProjectsLocations($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudMlV1ListLocationsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocations::class, 'Google_Service_CloudMachineLearningEngine_Resource_ProjectsLocations');
