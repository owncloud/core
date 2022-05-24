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

namespace Google\Service\Dfareporting\Resource;

use Google\Service\Dfareporting\UserRolePermission;
use Google\Service\Dfareporting\UserRolePermissionsListResponse;

/**
 * The "userRolePermissions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $userRolePermissions = $dfareportingService->userRolePermissions;
 *  </code>
 */
class UserRolePermissions extends \Google\Service\Resource
{
  /**
   * Gets one user role permission by ID. (userRolePermissions.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id User role permission ID.
   * @param array $optParams Optional parameters.
   * @return UserRolePermission
   */
  public function get($profileId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], UserRolePermission::class);
  }
  /**
   * Gets a list of user role permissions, possibly filtered.
   * (userRolePermissions.listUserRolePermissions)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string ids Select only user role permissions with these IDs.
   * @return UserRolePermissionsListResponse
   */
  public function listUserRolePermissions($profileId, $optParams = [])
  {
    $params = ['profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], UserRolePermissionsListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UserRolePermissions::class, 'Google_Service_Dfareporting_Resource_UserRolePermissions');
