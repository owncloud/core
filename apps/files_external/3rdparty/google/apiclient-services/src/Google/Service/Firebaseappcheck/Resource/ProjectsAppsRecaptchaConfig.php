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
 * The "recaptchaConfig" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebaseappcheckService = new Google_Service_Firebaseappcheck(...);
 *   $recaptchaConfig = $firebaseappcheckService->recaptchaConfig;
 *  </code>
 */
class Google_Service_Firebaseappcheck_Resource_ProjectsAppsRecaptchaConfig extends Google_Service_Resource
{
  /**
   * Gets the RecaptchaConfigs for the specified list of apps atomically. For
   * security reasons, the `site_secret` field is never populated in the response.
   * (recaptchaConfig.batchGet)
   *
   * @param string $parent Required. The parent project name shared by all
   * RecaptchaConfigs being retrieved, in the format ``` projects/{project_number}
   * ``` The parent collection in the `name` field of any resource being retrieved
   * must match this field, or the entire batch fails.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string names Required. The relative resource names of the
   * RecaptchaConfigs to retrieve, in the format: ```
   * projects/{project_number}/apps/{app_id}/recaptchaConfig ``` A maximum of 100
   * objects can be retrieved in a batch.
   * @return Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaBatchGetRecaptchaConfigsResponse
   */
  public function batchGet($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('batchGet', array($params), "Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaBatchGetRecaptchaConfigsResponse");
  }
  /**
   * Gets the RecaptchaConfig for the specified app. For security reasons, the
   * `site_secret` field is never populated in the response. (recaptchaConfig.get)
   *
   * @param string $name Required. The relative resource name of the
   * RecaptchaConfig, in the format: ```
   * projects/{project_number}/apps/{app_id}/recaptchaConfig ```
   * @param array $optParams Optional parameters.
   * @return Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaRecaptchaConfig
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaRecaptchaConfig");
  }
  /**
   * Updates the RecaptchaConfig for the specified app. While this configuration
   * is incomplete or invalid, the app will be unable to exchange reCAPTCHA tokens
   * for App Check tokens. For security reasons, the `site_secret` field is never
   * populated in the response. (recaptchaConfig.patch)
   *
   * @param string $name Required. The relative resource name of the reCAPTCHA v3
   * configuration object, in the format: ```
   * projects/{project_number}/apps/{app_id}/recaptchaConfig ```
   * @param Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaRecaptchaConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. A comma-separated list of names of
   * fields in the RecaptchaConfig to update. Example: `site_secret`.
   * @return Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaRecaptchaConfig
   */
  public function patch($name, Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaRecaptchaConfig $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaRecaptchaConfig");
  }
}
