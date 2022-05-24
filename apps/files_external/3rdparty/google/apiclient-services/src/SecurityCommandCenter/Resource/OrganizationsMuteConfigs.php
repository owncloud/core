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

namespace Google\Service\SecurityCommandCenter\Resource;

use Google\Service\SecurityCommandCenter\GoogleCloudSecuritycenterV1MuteConfig;
use Google\Service\SecurityCommandCenter\ListMuteConfigsResponse;
use Google\Service\SecurityCommandCenter\SecuritycenterEmpty;

/**
 * The "muteConfigs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $securitycenterService = new Google\Service\SecurityCommandCenter(...);
 *   $muteConfigs = $securitycenterService->muteConfigs;
 *  </code>
 */
class OrganizationsMuteConfigs extends \Google\Service\Resource
{
  /**
   * Creates a mute config. (muteConfigs.create)
   *
   * @param string $parent Required. Resource name of the new mute configs's
   * parent. Its format is "organizations/[organization_id]",
   * "folders/[folder_id]", or "projects/[project_id]".
   * @param GoogleCloudSecuritycenterV1MuteConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string muteConfigId Required. Unique identifier provided by the
   * client within the parent scope. It must consist of lower case letters,
   * numbers, and hyphen, with the first character a letter, the last a letter or
   * a number, and a 63 character maximum.
   * @return GoogleCloudSecuritycenterV1MuteConfig
   */
  public function create($parent, GoogleCloudSecuritycenterV1MuteConfig $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudSecuritycenterV1MuteConfig::class);
  }
  /**
   * Deletes an existing mute config. (muteConfigs.delete)
   *
   * @param string $name Required. Name of the mute config to delete. Its format
   * is organizations/{organization}/muteConfigs/{config_id},
   * folders/{folder}/muteConfigs/{config_id}, or
   * projects/{project}/muteConfigs/{config_id}
   * @param array $optParams Optional parameters.
   * @return SecuritycenterEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], SecuritycenterEmpty::class);
  }
  /**
   * Gets a mute config. (muteConfigs.get)
   *
   * @param string $name Required. Name of the mute config to retrieve. Its format
   * is organizations/{organization}/muteConfigs/{config_id},
   * folders/{folder}/muteConfigs/{config_id}, or
   * projects/{project}/muteConfigs/{config_id}
   * @param array $optParams Optional parameters.
   * @return GoogleCloudSecuritycenterV1MuteConfig
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudSecuritycenterV1MuteConfig::class);
  }
  /**
   * Lists mute configs. (muteConfigs.listOrganizationsMuteConfigs)
   *
   * @param string $parent Required. The parent, which owns the collection of mute
   * configs. Its format is "organizations/[organization_id]",
   * "folders/[folder_id]", "projects/[project_id]".
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of configs to return. The service
   * may return fewer than this value. If unspecified, at most 10 configs will be
   * returned. The maximum value is 1000; values above 1000 will be coerced to
   * 1000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListMuteConfigs` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListMuteConfigs` must match the
   * call that provided the page token.
   * @return ListMuteConfigsResponse
   */
  public function listOrganizationsMuteConfigs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListMuteConfigsResponse::class);
  }
  /**
   * Updates a mute config. (muteConfigs.patch)
   *
   * @param string $name This field will be ignored if provided on config
   * creation. Format "organizations/{organization}/muteConfigs/{mute_config}"
   * "folders/{folder}/muteConfigs/{mute_config}"
   * "projects/{project}/muteConfigs/{mute_config}"
   * @param GoogleCloudSecuritycenterV1MuteConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The list of fields to be updated. If empty all
   * mutable fields will be updated.
   * @return GoogleCloudSecuritycenterV1MuteConfig
   */
  public function patch($name, GoogleCloudSecuritycenterV1MuteConfig $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudSecuritycenterV1MuteConfig::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrganizationsMuteConfigs::class, 'Google_Service_SecurityCommandCenter_Resource_OrganizationsMuteConfigs');
