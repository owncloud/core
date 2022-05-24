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

namespace Google\Service\Dfareporting\Resource;

use Google\Service\Dfareporting\FloodlightConfiguration;
use Google\Service\Dfareporting\FloodlightConfigurationsListResponse;

/**
 * The "floodlightConfigurations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $floodlightConfigurations = $dfareportingService->floodlightConfigurations;
 *  </code>
 */
class FloodlightConfigurations extends \Google\Service\Resource
{
  /**
   * Gets one floodlight configuration by ID. (floodlightConfigurations.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Floodlight configuration ID.
   * @param array $optParams Optional parameters.
   * @return FloodlightConfiguration
   */
  public function get($profileId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], FloodlightConfiguration::class);
  }
  /**
   * Retrieves a list of floodlight configurations, possibly filtered.
   * (floodlightConfigurations.listFloodlightConfigurations)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string ids Set of IDs of floodlight configurations to retrieve.
   * Required field; otherwise an empty list will be returned.
   * @return FloodlightConfigurationsListResponse
   */
  public function listFloodlightConfigurations($profileId, $optParams = [])
  {
    $params = ['profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], FloodlightConfigurationsListResponse::class);
  }
  /**
   * Updates an existing floodlight configuration. This method supports patch
   * semantics. (floodlightConfigurations.patch)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id FloodlightConfiguration ID.
   * @param FloodlightConfiguration $postBody
   * @param array $optParams Optional parameters.
   * @return FloodlightConfiguration
   */
  public function patch($profileId, $id, FloodlightConfiguration $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], FloodlightConfiguration::class);
  }
  /**
   * Updates an existing floodlight configuration.
   * (floodlightConfigurations.update)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param FloodlightConfiguration $postBody
   * @param array $optParams Optional parameters.
   * @return FloodlightConfiguration
   */
  public function update($profileId, FloodlightConfiguration $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], FloodlightConfiguration::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FloodlightConfigurations::class, 'Google_Service_Dfareporting_Resource_FloodlightConfigurations');
