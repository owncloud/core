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

use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1betaBatchGetRecaptchaV3ConfigsResponse;
use Google\Service\Firebaseappcheck\GoogleFirebaseAppcheckV1betaRecaptchaV3Config;

/**
 * The "recaptchaV3Config" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebaseappcheckService = new Google\Service\Firebaseappcheck(...);
 *   $recaptchaV3Config = $firebaseappcheckService->recaptchaV3Config;
 *  </code>
 */
class ProjectsAppsRecaptchaV3Config extends \Google\Service\Resource
{
  /**
   * Atomically gets the RecaptchaV3Configs for the specified list of apps. For
   * security reasons, the `site_secret` field is never populated in the response.
   * (recaptchaV3Config.batchGet)
   *
   * @param string $parent Required. The parent project name shared by all
   * RecaptchaV3Configs being retrieved, in the format ```
   * projects/{project_number} ``` The parent collection in the `name` field of
   * any resource being retrieved must match this field, or the entire batch
   * fails.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string names Required. The relative resource names of the
   * RecaptchaV3Configs to retrieve, in the format: ```
   * projects/{project_number}/apps/{app_id}/recaptchaV3Config ``` A maximum of
   * 100 objects can be retrieved in a batch.
   * @return GoogleFirebaseAppcheckV1betaBatchGetRecaptchaV3ConfigsResponse
   */
  public function batchGet($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('batchGet', [$params], GoogleFirebaseAppcheckV1betaBatchGetRecaptchaV3ConfigsResponse::class);
  }
  /**
   * Gets the RecaptchaV3Config for the specified app. For security reasons, the
   * `site_secret` field is never populated in the response.
   * (recaptchaV3Config.get)
   *
   * @param string $name Required. The relative resource name of the
   * RecaptchaV3Config, in the format: ```
   * projects/{project_number}/apps/{app_id}/recaptchaV3Config ```
   * @param array $optParams Optional parameters.
   * @return GoogleFirebaseAppcheckV1betaRecaptchaV3Config
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleFirebaseAppcheckV1betaRecaptchaV3Config::class);
  }
  /**
   * Updates the RecaptchaV3Config for the specified app. While this configuration
   * is incomplete or invalid, the app will be unable to exchange reCAPTCHA V3
   * tokens for App Check tokens. For security reasons, the `site_secret` field is
   * never populated in the response. (recaptchaV3Config.patch)
   *
   * @param string $name Required. The relative resource name of the reCAPTCHA v3
   * configuration object, in the format: ```
   * projects/{project_number}/apps/{app_id}/recaptchaV3Config ```
   * @param GoogleFirebaseAppcheckV1betaRecaptchaV3Config $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. A comma-separated list of names of
   * fields in the RecaptchaV3Config to update. Example: `site_secret`.
   * @return GoogleFirebaseAppcheckV1betaRecaptchaV3Config
   */
  public function patch($name, GoogleFirebaseAppcheckV1betaRecaptchaV3Config $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleFirebaseAppcheckV1betaRecaptchaV3Config::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsAppsRecaptchaV3Config::class, 'Google_Service_Firebaseappcheck_Resource_ProjectsAppsRecaptchaV3Config');
