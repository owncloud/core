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

/**
 * The "locations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinesslodgingService = new Google_Service_MyBusinessLodging(...);
 *   $locations = $mybusinesslodgingService->locations;
 *  </code>
 */
class Google_Service_MyBusinessLodging_Resource_Locations extends Google_Service_Resource
{
  /**
   * Returns the Lodging of a specific location. (locations.getLodging)
   *
   * @param string $name Required. Google identifier for this location in the
   * form: `locations/{location_id}/lodging`
   * @param array $optParams Optional parameters.
   *
   * @opt_param string readMask Required. The specific fields to return. Use "*"
   * to include all fields. Repeated field items cannot be individually specified.
   * @return Google_Service_MyBusinessLodging_Lodging
   */
  public function getLodging($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getLodging', array($params), "Google_Service_MyBusinessLodging_Lodging");
  }
  /**
   * Updates the Lodging of a specific location. (locations.updateLodging)
   *
   * @param string $name Required. Google identifier for this location in the
   * form: `locations/{location_id}/lodging`
   * @param Google_Service_MyBusinessLodging_Lodging $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The specific fields to update. Use "*"
   * to update all fields, which may include unsetting empty fields in the
   * request. Repeated field items cannot be individually updated.
   * @return Google_Service_MyBusinessLodging_Lodging
   */
  public function updateLodging($name, Google_Service_MyBusinessLodging_Lodging $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateLodging', array($params), "Google_Service_MyBusinessLodging_Lodging");
  }
}
