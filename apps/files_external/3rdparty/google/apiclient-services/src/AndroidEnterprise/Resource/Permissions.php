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

namespace Google\Service\AndroidEnterprise\Resource;

use Google\Service\AndroidEnterprise\Permission;

/**
 * The "permissions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidenterpriseService = new Google\Service\AndroidEnterprise(...);
 *   $permissions = $androidenterpriseService->permissions;
 *  </code>
 */
class Permissions extends \Google\Service\Resource
{
  /**
   * Retrieves details of an Android app permission for display to an enterprise
   * admin. (permissions.get)
   *
   * @param string $permissionId The ID of the permission.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string language The BCP47 tag for the user's preferred language
   * (e.g. "en-US", "de")
   * @return Permission
   */
  public function get($permissionId, $optParams = [])
  {
    $params = ['permissionId' => $permissionId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Permission::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Permissions::class, 'Google_Service_AndroidEnterprise_Resource_Permissions');
