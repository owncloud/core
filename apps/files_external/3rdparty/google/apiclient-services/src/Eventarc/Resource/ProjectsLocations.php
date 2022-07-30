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

namespace Google\Service\Eventarc\Resource;

use Google\Service\Eventarc\GoogleChannelConfig;
use Google\Service\Eventarc\ListLocationsResponse;
use Google\Service\Eventarc\Location;

/**
 * The "locations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $eventarcService = new Google\Service\Eventarc(...);
 *   $locations = $eventarcService->locations;
 *  </code>
 */
class ProjectsLocations extends \Google\Service\Resource
{
  /**
   * Gets information about a location. (locations.get)
   *
   * @param string $name Resource name for the location.
   * @param array $optParams Optional parameters.
   * @return Location
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Location::class);
  }
  /**
   * Get a GoogleChannelConfig (locations.getGoogleChannelConfig)
   *
   * @param string $name Required. The name of the config to get.
   * @param array $optParams Optional parameters.
   * @return GoogleChannelConfig
   */
  public function getGoogleChannelConfig($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getGoogleChannelConfig', [$params], GoogleChannelConfig::class);
  }
  /**
   * Lists information about the supported locations for this service.
   * (locations.listProjectsLocations)
   *
   * @param string $name The resource that owns the locations collection, if
   * applicable.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A filter to narrow down results to a preferred
   * subset. The filtering language accepts strings like `"displayName=tokyo"`,
   * and is documented in more detail in [AIP-160](https://google.aip.dev/160).
   * @opt_param int pageSize The maximum number of results to return. If not set,
   * the service selects a default.
   * @opt_param string pageToken A page token received from the `next_page_token`
   * field in the response. Send that page token to receive the subsequent page.
   * @return ListLocationsResponse
   */
  public function listProjectsLocations($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListLocationsResponse::class);
  }
  /**
   * Update a single GoogleChannelConfig (locations.updateGoogleChannelConfig)
   *
   * @param string $name Required. The resource name of the config. Must be in the
   * format of, `projects/{project}/locations/{location}/googleChannelConfig`.
   * @param GoogleChannelConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The fields to be updated; only fields explicitly
   * provided are updated. If no field mask is provided, all provided fields in
   * the request are updated. To update all fields, provide a field mask of "*".
   * @return GoogleChannelConfig
   */
  public function updateGoogleChannelConfig($name, GoogleChannelConfig $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateGoogleChannelConfig', [$params], GoogleChannelConfig::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocations::class, 'Google_Service_Eventarc_Resource_ProjectsLocations');
