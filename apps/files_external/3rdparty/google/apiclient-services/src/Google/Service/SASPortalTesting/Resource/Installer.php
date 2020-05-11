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
 * The "installer" collection of methods.
 * Typical usage is:
 *  <code>
 *   $prod_tt_sasportalService = new Google_Service_SASPortalTesting(...);
 *   $installer = $prod_tt_sasportalService->installer;
 *  </code>
 */
class Google_Service_SASPortalTesting_Resource_Installer extends Google_Service_Resource
{
  /**
   * Generates a secret to be used with the ValidateInstaller method
   * (installer.generateSecret)
   *
   * @param Google_Service_SASPortalTesting_SasPortalGenerateSecretRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SASPortalTesting_SasPortalGenerateSecretResponse
   */
  public function generateSecret(Google_Service_SASPortalTesting_SasPortalGenerateSecretRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('generateSecret', array($params), "Google_Service_SASPortalTesting_SasPortalGenerateSecretResponse");
  }
  /**
   * Validates the identity of a Certified Professional Installer (CPI).
   * (installer.validate)
   *
   * @param Google_Service_SASPortalTesting_SasPortalValidateInstallerRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_SASPortalTesting_SasPortalValidateInstallerResponse
   */
  public function validate(Google_Service_SASPortalTesting_SasPortalValidateInstallerRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('validate', array($params), "Google_Service_SASPortalTesting_SasPortalValidateInstallerResponse");
  }
}
