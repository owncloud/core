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
 * The "organizations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $loggingService = new Google_Service_Logging(...);
 *   $organizations = $loggingService->organizations;
 *  </code>
 */
class Google_Service_Logging_Resource_Organizations extends Google_Service_Resource
{
  /**
   * Gets the Logs Router CMEK settings for the given resource.Note: CMEK for the
   * Logs Router can currently only be configured for GCP organizations. Once
   * configured, it applies to all projects and folders in the GCP
   * organization.See Enabling CMEK for Logs Router for more information.
   * (organizations.getCmekSettings)
   *
   * @param string $name Required. The resource for which to retrieve CMEK
   * settings. "projects/[PROJECT_ID]/cmekSettings"
   * "organizations/[ORGANIZATION_ID]/cmekSettings"
   * "billingAccounts/[BILLING_ACCOUNT_ID]/cmekSettings"
   * "folders/[FOLDER_ID]/cmekSettings" Example:
   * "organizations/12345/cmekSettings".Note: CMEK for the Logs Router can
   * currently only be configured for GCP organizations. Once configured, it
   * applies to all projects and folders in the GCP organization.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Logging_CmekSettings
   */
  public function getCmekSettings($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getCmekSettings', array($params), "Google_Service_Logging_CmekSettings");
  }
  /**
   * Updates the Logs Router CMEK settings for the given resource.Note: CMEK for
   * the Logs Router can currently only be configured for GCP organizations. Once
   * configured, it applies to all projects and folders in the GCP
   * organization.UpdateCmekSettings will fail if 1) kms_key_name is invalid, or
   * 2) the associated service account does not have the required
   * roles/cloudkms.cryptoKeyEncrypterDecrypter role assigned for the key, or 3)
   * access to the key is disabled.See Enabling CMEK for Logs Router for more
   * information. (organizations.updateCmekSettings)
   *
   * @param string $name Required. The resource name for the CMEK settings to
   * update. "projects/[PROJECT_ID]/cmekSettings"
   * "organizations/[ORGANIZATION_ID]/cmekSettings"
   * "billingAccounts/[BILLING_ACCOUNT_ID]/cmekSettings"
   * "folders/[FOLDER_ID]/cmekSettings" Example:
   * "organizations/12345/cmekSettings".Note: CMEK for the Logs Router can
   * currently only be configured for GCP organizations. Once configured, it
   * applies to all projects and folders in the GCP organization.
   * @param Google_Service_Logging_CmekSettings $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Optional. Field mask identifying which fields
   * from cmek_settings should be updated. A field will be overwritten if and only
   * if it is in the update mask. Output only fields cannot be updated.See
   * FieldMask for more information.Example: "updateMask=kmsKeyName"
   * @return Google_Service_Logging_CmekSettings
   */
  public function updateCmekSettings($name, Google_Service_Logging_CmekSettings $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateCmekSettings', array($params), "Google_Service_Logging_CmekSettings");
  }
}
