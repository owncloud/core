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

namespace Google\Service\TagManager\Resource;

use Google\Service\TagManager\ListZonesResponse;
use Google\Service\TagManager\RevertZoneResponse;
use Google\Service\TagManager\Zone;

/**
 * The "zones" collection of methods.
 * Typical usage is:
 *  <code>
 *   $tagmanagerService = new Google\Service\TagManager(...);
 *   $zones = $tagmanagerService->zones;
 *  </code>
 */
class AccountsContainersWorkspacesZones extends \Google\Service\Resource
{
  /**
   * Creates a GTM Zone. (zones.create)
   *
   * @param string $parent GTM Workspace's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}/workspaces/{workspace_id}
   * @param Zone $postBody
   * @param array $optParams Optional parameters.
   * @return Zone
   */
  public function create($parent, Zone $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Zone::class);
  }
  /**
   * Deletes a GTM Zone. (zones.delete)
   *
   * @param string $path GTM Zone's API relative path. Example: accounts/{account_
   * id}/containers/{container_id}/workspaces/{workspace_id}/zones/{zone_id}
   * @param array $optParams Optional parameters.
   */
  public function delete($path, $optParams = [])
  {
    $params = ['path' => $path];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets a GTM Zone. (zones.get)
   *
   * @param string $path GTM Zone's API relative path. Example: accounts/{account_
   * id}/containers/{container_id}/workspaces/{workspace_id}/zones/{zone_id}
   * @param array $optParams Optional parameters.
   * @return Zone
   */
  public function get($path, $optParams = [])
  {
    $params = ['path' => $path];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Zone::class);
  }
  /**
   * Lists all GTM Zones of a GTM container workspace.
   * (zones.listAccountsContainersWorkspacesZones)
   *
   * @param string $parent GTM Workspace's API relative path. Example:
   * accounts/{account_id}/containers/{container_id}/workspaces/{workspace_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken Continuation token for fetching the next page of
   * results.
   * @return ListZonesResponse
   */
  public function listAccountsContainersWorkspacesZones($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListZonesResponse::class);
  }
  /**
   * Reverts changes to a GTM Zone in a GTM Workspace. (zones.revert)
   *
   * @param string $path GTM Zone's API relative path. Example: accounts/{account_
   * id}/containers/{container_id}/workspaces/{workspace_id}/zones/{zone_id}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string fingerprint When provided, this fingerprint must match the
   * fingerprint of the zone in storage.
   * @return RevertZoneResponse
   */
  public function revert($path, $optParams = [])
  {
    $params = ['path' => $path];
    $params = array_merge($params, $optParams);
    return $this->call('revert', [$params], RevertZoneResponse::class);
  }
  /**
   * Updates a GTM Zone. (zones.update)
   *
   * @param string $path GTM Zone's API relative path. Example: accounts/{account_
   * id}/containers/{container_id}/workspaces/{workspace_id}/zones/{zone_id}
   * @param Zone $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string fingerprint When provided, this fingerprint must match the
   * fingerprint of the zone in storage.
   * @return Zone
   */
  public function update($path, Zone $postBody, $optParams = [])
  {
    $params = ['path' => $path, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Zone::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsContainersWorkspacesZones::class, 'Google_Service_TagManager_Resource_AccountsContainersWorkspacesZones');
