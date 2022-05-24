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

namespace Google\Service\Baremetalsolution\Resource;

use Google\Service\Baremetalsolution\FetchInstanceProvisioningSettingsResponse;

/**
 * The "instanceProvisioningSettings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $baremetalsolutionService = new Google\Service\Baremetalsolution(...);
 *   $instanceProvisioningSettings = $baremetalsolutionService->instanceProvisioningSettings;
 *  </code>
 */
class ProjectsLocationsInstanceProvisioningSettings extends \Google\Service\Resource
{
  /**
   * Get instance provisioning settings for a given project. This is hidden method
   * used by UI only. (instanceProvisioningSettings.fetch)
   *
   * @param string $location Required. The parent project and location containing
   * the ProvisioningSettings.
   * @param array $optParams Optional parameters.
   * @return FetchInstanceProvisioningSettingsResponse
   */
  public function fetch($location, $optParams = [])
  {
    $params = ['location' => $location];
    $params = array_merge($params, $optParams);
    return $this->call('fetch', [$params], FetchInstanceProvisioningSettingsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsInstanceProvisioningSettings::class, 'Google_Service_Baremetalsolution_Resource_ProjectsLocationsInstanceProvisioningSettings');
