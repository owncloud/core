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

use Google\Service\Dfareporting\CountriesListResponse;
use Google\Service\Dfareporting\Country;

/**
 * The "countries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $countries = $dfareportingService->countries;
 *  </code>
 */
class Countries extends \Google\Service\Resource
{
  /**
   * Gets one country by ID. (countries.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $dartId Country DART ID.
   * @param array $optParams Optional parameters.
   * @return Country
   */
  public function get($profileId, $dartId, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'dartId' => $dartId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Country::class);
  }
  /**
   * Retrieves a list of countries. (countries.listCountries)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   * @return CountriesListResponse
   */
  public function listCountries($profileId, $optParams = [])
  {
    $params = ['profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], CountriesListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Countries::class, 'Google_Service_Dfareporting_Resource_Countries');
