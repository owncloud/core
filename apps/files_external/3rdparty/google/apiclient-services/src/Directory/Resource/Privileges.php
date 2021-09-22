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

namespace Google\Service\Directory\Resource;

use Google\Service\Directory\Privileges as PrivilegesModel;

/**
 * The "privileges" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google\Service\Directory(...);
 *   $privileges = $adminService->privileges;
 *  </code>
 */
class Privileges extends \Google\Service\Resource
{
  /**
   * Retrieves a paginated list of all privileges for a customer.
   * (privileges.listPrivileges)
   *
   * @param string $customer Immutable ID of the Google Workspace account.
   * @param array $optParams Optional parameters.
   * @return PrivilegesModel
   */
  public function listPrivileges($customer, $optParams = [])
  {
    $params = ['customer' => $customer];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], PrivilegesModel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Privileges::class, 'Google_Service_Directory_Resource_Privileges');
