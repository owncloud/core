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

namespace Google\Service\Contactcenterinsights\Resource;

use Google\Service\Contactcenterinsights\GoogleCloudContactcenterinsightsV1Settings;

/**
 * The "locations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contactcenterinsightsService = new Google\Service\Contactcenterinsights(...);
 *   $locations = $contactcenterinsightsService->locations;
 *  </code>
 */
class ProjectsLocations extends \Google\Service\Resource
{
  /**
   * Gets project-level settings. (locations.getSettings)
   *
   * @param string $name Required. The name of the settings resource to get.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudContactcenterinsightsV1Settings
   */
  public function getSettings($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getSettings', [$params], GoogleCloudContactcenterinsightsV1Settings::class);
  }
  /**
   * Updates project-level settings. (locations.updateSettings)
   *
   * @param string $name Immutable. The resource name of the settings resource.
   * Format: projects/{project}/locations/{location}/settings
   * @param GoogleCloudContactcenterinsightsV1Settings $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The list of fields to be updated.
   * @return GoogleCloudContactcenterinsightsV1Settings
   */
  public function updateSettings($name, GoogleCloudContactcenterinsightsV1Settings $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateSettings', [$params], GoogleCloudContactcenterinsightsV1Settings::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocations::class, 'Google_Service_Contactcenterinsights_Resource_ProjectsLocations');
