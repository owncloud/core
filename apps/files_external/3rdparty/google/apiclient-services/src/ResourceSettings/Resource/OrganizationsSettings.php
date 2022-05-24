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

namespace Google\Service\ResourceSettings\Resource;

use Google\Service\ResourceSettings\GoogleCloudResourcesettingsV1ListSettingsResponse;
use Google\Service\ResourceSettings\GoogleCloudResourcesettingsV1Setting;

/**
 * The "settings" collection of methods.
 * Typical usage is:
 *  <code>
 *   $resourcesettingsService = new Google\Service\ResourceSettings(...);
 *   $settings = $resourcesettingsService->settings;
 *  </code>
 */
class OrganizationsSettings extends \Google\Service\Resource
{
  /**
   * Returns a specified setting. Returns a `google.rpc.Status` with
   * `google.rpc.Code.NOT_FOUND` if the setting does not exist. (settings.get)
   *
   * @param string $name Required. The name of the setting to get. See Setting for
   * naming requirements.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view The SettingView for this request.
   * @return GoogleCloudResourcesettingsV1Setting
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudResourcesettingsV1Setting::class);
  }
  /**
   * Lists all the settings that are available on the Cloud resource `parent`.
   * (settings.listOrganizationsSettings)
   *
   * @param string $parent Required. The project, folder, or organization that is
   * the parent resource for this setting. Must be in one of the following forms:
   * * `projects/{project_number}` * `projects/{project_id}` *
   * `folders/{folder_id}` * `organizations/{organization_id}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Unused. The size of the page to be returned.
   * @opt_param string pageToken Unused. A page token used to retrieve the next
   * page.
   * @opt_param string view The SettingView for this request.
   * @return GoogleCloudResourcesettingsV1ListSettingsResponse
   */
  public function listOrganizationsSettings($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudResourcesettingsV1ListSettingsResponse::class);
  }
  /**
   * Updates a specified setting. Returns a `google.rpc.Status` with
   * `google.rpc.Code.NOT_FOUND` if the setting does not exist. Returns a
   * `google.rpc.Status` with `google.rpc.Code.FAILED_PRECONDITION` if the setting
   * is flagged as read only. Returns a `google.rpc.Status` with
   * `google.rpc.Code.ABORTED` if the etag supplied in the request does not match
   * the persisted etag of the setting value. On success, the response will
   * contain only `name`, `local_value` and `etag`. The `metadata` and
   * `effective_value` cannot be updated through this API. Note: the supplied
   * setting will perform a full overwrite of the `local_value` field.
   * (settings.patch)
   *
   * @param string $name The resource name of the setting. Must be in one of the
   * following forms: * `projects/{project_number}/settings/{setting_name}` *
   * `folders/{folder_id}/settings/{setting_name}` *
   * `organizations/{organization_id}/settings/{setting_name}` For example,
   * "/projects/123/settings/gcp-enableMyFeature"
   * @param GoogleCloudResourcesettingsV1Setting $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudResourcesettingsV1Setting
   */
  public function patch($name, GoogleCloudResourcesettingsV1Setting $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudResourcesettingsV1Setting::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsSettings::class, 'Google_Service_ResourceSettings_Resource_OrganizationsSettings');
