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

use Google\Service\Baremetalsolution\ProvisioningConfig;
use Google\Service\Baremetalsolution\SubmitProvisioningConfigRequest;
use Google\Service\Baremetalsolution\SubmitProvisioningConfigResponse;

/**
 * The "provisioningConfigs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $baremetalsolutionService = new Google\Service\Baremetalsolution(...);
 *   $provisioningConfigs = $baremetalsolutionService->provisioningConfigs;
 *  </code>
 */
class ProjectsLocationsProvisioningConfigs extends \Google\Service\Resource
{
  /**
   * Create new ProvisioningConfig. (provisioningConfigs.create)
   *
   * @param string $parent Required. The parent project and location containing
   * the ProvisioningConfig.
   * @param ProvisioningConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string email Optional. Email provided to send a confirmation with
   * provisioning config to.
   * @return ProvisioningConfig
   */
  public function create($parent, ProvisioningConfig $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], ProvisioningConfig::class);
  }
  /**
   * Get ProvisioningConfig by name. (provisioningConfigs.get)
   *
   * @param string $name Required. Name of the ProvisioningConfig.
   * @param array $optParams Optional parameters.
   * @return ProvisioningConfig
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ProvisioningConfig::class);
  }
  /**
   * Update existing ProvisioningConfig. (provisioningConfigs.patch)
   *
   * @param string $name Output only. The system-generated name of the
   * provisioning config. This follows the UUID format.
   * @param ProvisioningConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string email Optional. Email provided to send a confirmation with
   * provisioning config to.
   * @opt_param string updateMask Required. The list of fields to update.
   * @return ProvisioningConfig
   */
  public function patch($name, ProvisioningConfig $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], ProvisioningConfig::class);
  }
  /**
   * Submit a provisiong configuration for a given project.
   * (provisioningConfigs.submit)
   *
   * @param string $parent Required. The parent project and location containing
   * the ProvisioningConfig.
   * @param SubmitProvisioningConfigRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SubmitProvisioningConfigResponse
   */
  public function submit($parent, SubmitProvisioningConfigRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('submit', [$params], SubmitProvisioningConfigResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsProvisioningConfigs::class, 'Google_Service_Baremetalsolution_Resource_ProjectsLocationsProvisioningConfigs');
