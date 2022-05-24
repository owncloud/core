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

use Google\Service\Dfareporting\CitiesListResponse;

/**
 * The "cities" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $cities = $dfareportingService->cities;
 *  </code>
 */
class Cities extends \Google\Service\Resource
{
  /**
   * Retrieves a list of cities, possibly filtered. (cities.listCities)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string countryDartIds Select only cities from these countries.
   * @opt_param string dartIds Select only cities with these DART IDs.
   * @opt_param string namePrefix Select only cities with names starting with this
   * prefix.
   * @opt_param string regionDartIds Select only cities from these regions.
   * @return CitiesListResponse
   */
  public function listCities($profileId, $optParams = [])
  {
    $params = ['profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], CitiesListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Cities::class, 'Google_Service_Dfareporting_Resource_Cities');
