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

namespace Google\Service\Logging\Resource;

use Google\Service\Logging\CmekSettings;
use Google\Service\Logging\Settings;

/**
 * The "folders" collection of methods.
 * Typical usage is:
 *  <code>
 *   $loggingService = new Google\Service\Logging(...);
 *   $folders = $loggingService->folders;
 *  </code>
 */
class Folders extends \Google\Service\Resource
{
  /**
   * Gets the Logging CMEK settings for the given resource.Note: CMEK for the Log
   * Router can be configured for Google Cloud projects, folders, organizations
   * and billing accounts. Once configured for an organization, it applies to all
   * projects and folders in the Google Cloud organization.See Enabling CMEK for
   * Log Router (https://cloud.google.com/logging/docs/routing/managed-encryption)
   * for more information. (folders.getCmekSettings)
   *
   * @param string $name Required. The resource for which to retrieve CMEK
   * settings. "projects/[PROJECT_ID]/cmekSettings"
   * "organizations/[ORGANIZATION_ID]/cmekSettings"
   * "billingAccounts/[BILLING_ACCOUNT_ID]/cmekSettings"
   * "folders/[FOLDER_ID]/cmekSettings" For
   * example:"organizations/12345/cmekSettings"Note: CMEK for the Log Router can
   * be configured for Google Cloud projects, folders, organizations and billing
   * accounts. Once configured for an organization, it applies to all projects and
   * folders in the Google Cloud organization.
   * @param array $optParams Optional parameters.
   * @return CmekSettings
   */
  public function getCmekSettings($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getCmekSettings', [$params], CmekSettings::class);
  }
  /**
   * Gets the Log Router settings for the given resource.Note: Settings for the
   * Log Router can be get for Google Cloud projects, folders, organizations and
   * billing accounts. Currently it can only be configured for organizations. Once
   * configured for an organization, it applies to all projects and folders in the
   * Google Cloud organization.See Enabling CMEK for Log Router
   * (https://cloud.google.com/logging/docs/routing/managed-encryption) for more
   * information. (folders.getSettings)
   *
   * @param string $name Required. The resource for which to retrieve settings.
   * "projects/[PROJECT_ID]/settings" "organizations/[ORGANIZATION_ID]/settings"
   * "billingAccounts/[BILLING_ACCOUNT_ID]/settings"
   * "folders/[FOLDER_ID]/settings" For
   * example:"organizations/12345/settings"Note: Settings for the Log Router can
   * be get for Google Cloud projects, folders, organizations and billing
   * accounts. Currently it can only be configured for organizations. Once
   * configured for an organization, it applies to all projects and folders in the
   * Google Cloud organization.
   * @param array $optParams Optional parameters.
   * @return Settings
   */
  public function getSettings($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getSettings', [$params], Settings::class);
  }
  /**
   * Updates the Log Router settings for the given resource.Note: Settings for the
   * Log Router can currently only be configured for Google Cloud organizations.
   * Once configured, it applies to all projects and folders in the Google Cloud
   * organization.UpdateSettings will fail if 1) kms_key_name is invalid, or 2)
   * the associated service account does not have the required
   * roles/cloudkms.cryptoKeyEncrypterDecrypter role assigned for the key, or 3)
   * access to the key is disabled. 4) location_id is not supported by Logging. 5)
   * location_id violate OrgPolicy.See Enabling CMEK for Log Router
   * (https://cloud.google.com/logging/docs/routing/managed-encryption) for more
   * information. (folders.updateSettings)
   *
   * @param string $name Required. The resource name for the settings to update.
   * "organizations/[ORGANIZATION_ID]/settings" For
   * example:"organizations/12345/settings"Note: Settings for the Log Router can
   * currently only be configured for Google Cloud organizations. Once configured,
   * it applies to all projects and folders in the Google Cloud organization.
   * @param Settings $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Optional. Field mask identifying which fields
   * from settings should be updated. A field will be overwritten if and only if
   * it is in the update mask. Output only fields cannot be updated.See FieldMask
   * for more information.For example: "updateMask=kmsKeyName"
   * @return Settings
   */
  public function updateSettings($name, Settings $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateSettings', [$params], Settings::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Folders::class, 'Google_Service_Logging_Resource_Folders');
