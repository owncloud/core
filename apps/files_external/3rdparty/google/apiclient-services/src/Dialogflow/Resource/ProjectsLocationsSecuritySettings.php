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

namespace Google\Service\Dialogflow\Resource;

use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3ListSecuritySettingsResponse;
use Google\Service\Dialogflow\GoogleCloudDialogflowCxV3SecuritySettings;
use Google\Service\Dialogflow\GoogleProtobufEmpty;

/**
 * The "securitySettings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dialogflowService = new Google\Service\Dialogflow(...);
 *   $securitySettings = $dialogflowService->securitySettings;
 *  </code>
 */
class ProjectsLocationsSecuritySettings extends \Google\Service\Resource
{
  /**
   * Create security settings in the specified location. (securitySettings.create)
   *
   * @param string $parent Required. The location to create an SecuritySettings
   * for. Format: `projects//locations/`.
   * @param GoogleCloudDialogflowCxV3SecuritySettings $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDialogflowCxV3SecuritySettings
   */
  public function create($parent, GoogleCloudDialogflowCxV3SecuritySettings $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudDialogflowCxV3SecuritySettings::class);
  }
  /**
   * Deletes the specified SecuritySettings. (securitySettings.delete)
   *
   * @param string $name Required. The name of the SecuritySettings to delete.
   * Format: `projects//locations//securitySettings/`.
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Retrieves the specified SecuritySettings. The returned settings may be stale
   * by up to 1 minute. (securitySettings.get)
   *
   * @param string $name Required. Resource name of the settings. Format:
   * `projects//locations//securitySettings/`.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDialogflowCxV3SecuritySettings
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudDialogflowCxV3SecuritySettings::class);
  }
  /**
   * Returns the list of all security settings in the specified location.
   * (securitySettings.listProjectsLocationsSecuritySettings)
   *
   * @param string $parent Required. The location to list all security settings
   * for. Format: `projects//locations/`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of items to return in a single
   * page. By default 20 and at most 100.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request.
   * @return GoogleCloudDialogflowCxV3ListSecuritySettingsResponse
   */
  public function listProjectsLocationsSecuritySettings($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudDialogflowCxV3ListSecuritySettingsResponse::class);
  }
  /**
   * Updates the specified SecuritySettings. (securitySettings.patch)
   *
   * @param string $name Resource name of the settings. Required for the
   * SecuritySettingsService.UpdateSecuritySettings method.
   * SecuritySettingsService.CreateSecuritySettings populates the name
   * automatically. Format: `projects//locations//securitySettings/`.
   * @param GoogleCloudDialogflowCxV3SecuritySettings $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The mask to control which fields get
   * updated. If the mask is not present, all fields will be updated.
   * @return GoogleCloudDialogflowCxV3SecuritySettings
   */
  public function patch($name, GoogleCloudDialogflowCxV3SecuritySettings $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudDialogflowCxV3SecuritySettings::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsSecuritySettings::class, 'Google_Service_Dialogflow_Resource_ProjectsLocationsSecuritySettings');
