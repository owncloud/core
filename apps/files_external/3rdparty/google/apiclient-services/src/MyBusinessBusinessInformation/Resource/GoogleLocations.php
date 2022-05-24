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

namespace Google\Service\MyBusinessBusinessInformation\Resource;

use Google\Service\MyBusinessBusinessInformation\SearchGoogleLocationsRequest;
use Google\Service\MyBusinessBusinessInformation\SearchGoogleLocationsResponse;

/**
 * The "googleLocations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessbusinessinformationService = new Google\Service\MyBusinessBusinessInformation(...);
 *   $googleLocations = $mybusinessbusinessinformationService->googleLocations;
 *  </code>
 */
class GoogleLocations extends \Google\Service\Resource
{
  /**
   * Search all of the possible locations that are a match to the specified
   * request. (googleLocations.search)
   *
   * @param SearchGoogleLocationsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SearchGoogleLocationsResponse
   */
  public function search(SearchGoogleLocationsRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('search', [$params], SearchGoogleLocationsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleLocations::class, 'Google_Service_MyBusinessBusinessInformation_Resource_GoogleLocations');
