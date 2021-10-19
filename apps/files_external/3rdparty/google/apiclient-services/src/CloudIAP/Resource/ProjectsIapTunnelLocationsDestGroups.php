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

namespace Google\Service\CloudIAP\Resource;

use Google\Service\CloudIAP\IapEmpty;
use Google\Service\CloudIAP\ListTunnelDestGroupsResponse;
use Google\Service\CloudIAP\TunnelDestGroup;

/**
 * The "destGroups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $iapService = new Google\Service\CloudIAP(...);
 *   $destGroups = $iapService->destGroups;
 *  </code>
 */
class ProjectsIapTunnelLocationsDestGroups extends \Google\Service\Resource
{
  /**
   * Creates a new TunnelDestGroup. (destGroups.create)
   *
   * @param string $parent Required. Google Cloud Project ID and location. In the
   * following format:
   * `projects/{project_number/id}/iap_tunnel/locations/{location}`.
   * @param TunnelDestGroup $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string tunnelDestGroupId Required. The ID to use for the
   * TunnelDestGroup, which becomes the final component of the resource name. This
   * value must be 4-63 characters, and valid characters are `[a-z]-`.
   * @return TunnelDestGroup
   */
  public function create($parent, TunnelDestGroup $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], TunnelDestGroup::class);
  }
  /**
   * Deletes a TunnelDestGroup. (destGroups.delete)
   *
   * @param string $name Required. Name of the TunnelDestGroup to delete. In the
   * following format: `projects/{project_number/id}/iap_tunnel/locations/{locatio
   * n}/destGroups/{dest_group}`.
   * @param array $optParams Optional parameters.
   * @return IapEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], IapEmpty::class);
  }
  /**
   * Retrieves an existing TunnelDestGroup. (destGroups.get)
   *
   * @param string $name Required. Name of the TunnelDestGroup to be fetched. In
   * the following format: `projects/{project_number/id}/iap_tunnel/locations/{loc
   * ation}/destGroups/{dest_group}`.
   * @param array $optParams Optional parameters.
   * @return TunnelDestGroup
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], TunnelDestGroup::class);
  }
  /**
   * Lists the existing TunnelDestGroups. To group across all locations, use a `-`
   * as the location ID. For example:
   * `/v1/projects/123/iap_tunnel/locations/-/destGroups`
   * (destGroups.listProjectsIapTunnelLocationsDestGroups)
   *
   * @param string $parent Required. Google Cloud Project ID and location. In the
   * following format:
   * `projects/{project_number/id}/iap_tunnel/locations/{location}`. A `-` can be
   * used for the location to group across all locations.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of groups to return. The service
   * might return fewer than this value. If unspecified, at most 100 groups are
   * returned. The maximum value is 1000; values above 1000 are coerced to 1000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListTunnelDestGroups` call. Provide this to retrieve the subsequent page.
   * When paginating, all other parameters provided to `ListTunnelDestGroups` must
   * match the call that provided the page token.
   * @return ListTunnelDestGroupsResponse
   */
  public function listProjectsIapTunnelLocationsDestGroups($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListTunnelDestGroupsResponse::class);
  }
  /**
   * Updates a TunnelDestGroup. (destGroups.patch)
   *
   * @param string $name Required. Immutable. Identifier for the TunnelDestGroup.
   * Must be unique within the project and contain only lower case letters (a-z)
   * and dashes (-).
   * @param TunnelDestGroup $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask A field mask that specifies which IAP settings
   * to update. If omitted, then all of the settings are updated. See
   * https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#fieldmask
   * @return TunnelDestGroup
   */
  public function patch($name, TunnelDestGroup $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], TunnelDestGroup::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsIapTunnelLocationsDestGroups::class, 'Google_Service_CloudIAP_Resource_ProjectsIapTunnelLocationsDestGroups');
