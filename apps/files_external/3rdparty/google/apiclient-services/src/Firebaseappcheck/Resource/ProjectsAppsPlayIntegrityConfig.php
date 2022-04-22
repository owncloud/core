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

use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1betaBatchGetPlayIntegrityConfigsResponse;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1betaPlayIntegrityConfig;

/**
 * The "playIntegrityConfig" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebaseappcheckService = new Google\Service\Firebaseappcheck(...);
 *   $playIntegrityConfig = $firebaseappcheckService->playIntegrityConfig;
 *  </code>
 */
class ProjectsAppsPlayIntegrityConfig extends \Google\Service\Resource
{
  /**
   * Atomically gets the PlayIntegrityConfigs for the specified list of apps.
   * (playIntegrityConfig.batchGet)
   *
   * @param string $parent Required. The parent project name shared by all
   * PlayIntegrityConfigs being retrieved, in the format ```
   * projects/{project_number} ``` The parent collection in the `name` field of
   * any resource being retrieved must match this field, or the entire batch
   * fails.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string names Required. The relative resource names of the
   * PlayIntegrityConfigs to retrieve, in the format ```
   * projects/{project_number}/apps/{app_id}/playIntegrityConfig ``` A maximum of
   * 100 objects can be retrieved in a batch.
   * @return GoogleFirebaseAppcheckV1betaBatchGetPlayIntegrityConfigsResponse
   */
  public function batchGet($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('batchGet', [$params], GoogleFirebaseAppcheckV1betaBatchGetPlayIntegrityConfigsResponse::class);
  }
  /**
   * Gets the PlayIntegrityConfig for the specified app. (playIntegrityConfig.get)
   *
   * @param string $name Required. The relative resource name of the
   * PlayIntegrityConfig, in the format: ```
   * projects/{project_number}/apps/{app_id}/playIntegrityConfig ```
   * @param array $optParams Optional parameters.
   * @return GoogleFirebaseAppcheckV1betaPlayIntegrityConfig
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleFirebaseAppcheckV1betaPlayIntegrityConfig::class);
  }
  /**
   * Updates the PlayIntegrityConfig for the specified app. While this
   * configuration is incomplete or invalid, the app will be unable to exchange
   * Play Integrity tokens for App Check tokens. (playIntegrityConfig.patch)
   *
   * @param string $name Required. The relative resource name of the Play
   * Integrity configuration object, in the format: ```
   * projects/{project_number}/apps/{app_id}/playIntegrityConfig ```
   * @param GoogleFirebaseAppcheckV1betaPlayIntegrityConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. A comma-separated list of names of
   * fields in the PlayIntegrityConfig Gets to update. Example: `token_ttl`.
   * @return GoogleFirebaseAppcheckV1betaPlayIntegrityConfig
   */
  public function patch($name, GoogleFirebaseAppcheckV1betaPlayIntegrityConfig $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleFirebaseAppcheckV1betaPlayIntegrityConfig::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsAppsPlayIntegrityConfig::class, 'Google_Service_Firebaseappcheck_Resource_ProjectsAppsPlayIntegrityConfig');
