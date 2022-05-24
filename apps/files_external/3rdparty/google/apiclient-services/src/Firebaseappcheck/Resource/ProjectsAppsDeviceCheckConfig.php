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

namespace Google\Service\Firebaseappcheck\Resource;

use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1BatchGetDeviceCheckConfigsResponse;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1DeviceCheckConfig;

/**
 * The "deviceCheckConfig" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebaseappcheckService = new Google\Service\Firebaseappcheck(...);
 *   $deviceCheckConfig = $firebaseappcheckService->deviceCheckConfig;
 *  </code>
 */
class ProjectsAppsDeviceCheckConfig extends \Google\Service\Resource
{
  /**
   * Atomically gets the DeviceCheckConfigs for the specified list of apps. For
   * security reasons, the `private_key` field is never populated in the response.
   * (deviceCheckConfig.batchGet)
   *
   * @param string $parent Required. The parent project name shared by all
   * DeviceCheckConfigs being retrieved, in the format ```
   * projects/{project_number} ``` The parent collection in the `name` field of
   * any resource being retrieved must match this field, or the entire batch
   * fails.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string names Required. The relative resource names of the
   * DeviceCheckConfigs to retrieve, in the format ```
   * projects/{project_number}/apps/{app_id}/deviceCheckConfig ``` A maximum of
   * 100 objects can be retrieved in a batch.
   * @return GoogleFirebaseAppcheckV1BatchGetDeviceCheckConfigsResponse
   */
  public function batchGet($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('batchGet', [$params], GoogleFirebaseAppcheckV1BatchGetDeviceCheckConfigsResponse::class);
  }
  /**
   * Gets the DeviceCheckConfig for the specified app. For security reasons, the
   * `private_key` field is never populated in the response.
   * (deviceCheckConfig.get)
   *
   * @param string $name Required. The relative resource name of the
   * DeviceCheckConfig, in the format: ```
   * projects/{project_number}/apps/{app_id}/deviceCheckConfig ```
   * @param array $optParams Optional parameters.
   * @return GoogleFirebaseAppcheckV1DeviceCheckConfig
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleFirebaseAppcheckV1DeviceCheckConfig::class);
  }
  /**
   * Updates the DeviceCheckConfig for the specified app. While this configuration
   * is incomplete or invalid, the app will be unable to exchange DeviceCheck
   * tokens for App Check tokens. For security reasons, the `private_key` field is
   * never populated in the response. (deviceCheckConfig.patch)
   *
   * @param string $name Required. The relative resource name of the DeviceCheck
   * configuration object, in the format: ```
   * projects/{project_number}/apps/{app_id}/deviceCheckConfig ```
   * @param GoogleFirebaseAppcheckV1DeviceCheckConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. A comma-separated list of names of
   * fields in the DeviceCheckConfig Gets to update. Example:
   * `key_id,private_key`.
   * @return GoogleFirebaseAppcheckV1DeviceCheckConfig
   */
  public function patch($name, GoogleFirebaseAppcheckV1DeviceCheckConfig $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleFirebaseAppcheckV1DeviceCheckConfig::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsAppsDeviceCheckConfig::class, 'Google_Service_Firebaseappcheck_Resource_ProjectsAppsDeviceCheckConfig');
