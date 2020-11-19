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
 *   $mlService = new Google_Service_CloudMachineLearningEngine(...);
 *   $locations = $mlService->locations;
 *  </code>
 */
class Google_Service_CloudMachineLearningEngine_Resource_ProjectsLocations extends Google_Service_Resource
{
  /**
   * Get the complete list of CMLE capabilities in a location, along with their
   * location-specific properties. (locations.get)
   *
   * @param string $name Required. The name of the location.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Location
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Location");
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
   * @opt_param string pageToken Optional. A page token to request the next page
   * of results. You get the token from the `next_page_token` field of the
   * response from the previous call.
   * @opt_param int pageSize Optional. The number of locations to retrieve per
   * "page" of results. If there are more remaining results than this number, the
   * response message will contain a valid value in the `next_page_token` field.
   * The default value is 20, and the maximum page size is 100.
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ListLocationsResponse
   */
  public function listProjectsLocations($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ListLocationsResponse");
  }
}
