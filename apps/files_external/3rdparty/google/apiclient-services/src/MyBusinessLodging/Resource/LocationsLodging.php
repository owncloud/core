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

namespace Google\Service\MyBusinessLodging\Resource;

use Google\Service\MyBusinessLodging\GetGoogleUpdatedLodgingResponse;

/**
 * The "lodging" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinesslodgingService = new Google\Service\MyBusinessLodging(...);
 *   $lodging = $mybusinesslodgingService->lodging;
 *  </code>
 */
class LocationsLodging extends \Google\Service\Resource
{
  /**
   * Returns the Google updated Lodging of a specific location.
   * (lodging.getGoogleUpdated)
   *
   * @param string $name Required. Google identifier for this location in the
   * form: `accounts/{account_id}/locations/{location_id}/lodging`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string readMask Required. The specific fields to return. Use "*"
   * to include all fields. Repeated field items cannot be individually specified.
   * @return GetGoogleUpdatedLodgingResponse
   */
  public function getGoogleUpdated($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getGoogleUpdated', [$params], GetGoogleUpdatedLodgingResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LocationsLodging::class, 'Google_Service_MyBusinessLodging_Resource_LocationsLodging');
