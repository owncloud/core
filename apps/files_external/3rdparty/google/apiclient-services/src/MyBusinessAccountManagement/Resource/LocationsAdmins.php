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

namespace Google\Service\MyBusinessAccountManagement\Resource;

use Google\Service\MyBusinessAccountManagement\Admin;
use Google\Service\MyBusinessAccountManagement\ListLocationAdminsResponse;
use Google\Service\MyBusinessAccountManagement\MybusinessaccountmanagementEmpty;

/**
 * The "admins" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessaccountmanagementService = new Google\Service\MyBusinessAccountManagement(...);
 *   $admins = $mybusinessaccountmanagementService->admins;
 *  </code>
 */
class LocationsAdmins extends \Google\Service\Resource
{
  /**
   * Invites the specified user to become an administrator for the specified
   * location. The invitee must accept the invitation in order to be granted
   * access to the location. See AcceptInvitation to programmatically accept an
   * invitation. (admins.create)
   *
   * @param string $parent Required. The resource name of the location this admin
   * is created for. `locations/{location_id}/admins`.
   * @param Admin $postBody
   * @param array $optParams Optional parameters.
   * @return Admin
   */
  public function create($parent, Admin $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Admin::class);
  }
  /**
   * Removes the specified admin as a manager of the specified location.
   * (admins.delete)
   *
   * @param string $name Required. The resource name of the admin to remove from
   * the location.
   * @param array $optParams Optional parameters.
   * @return MybusinessaccountmanagementEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], MybusinessaccountmanagementEmpty::class);
  }
  /**
   * Lists all of the admins for the specified location.
   * (admins.listLocationsAdmins)
   *
   * @param string $parent Required. The name of the location to list admins of.
   * `locations/{location_id}/admins`.
   * @param array $optParams Optional parameters.
   * @return ListLocationAdminsResponse
   */
  public function listLocationsAdmins($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListLocationAdminsResponse::class);
  }
  /**
   * Updates the Admin for the specified location. Only the AdminRole of the Admin
   * can be updated. (admins.patch)
   *
   * @param string $name Immutable. The resource name. For account admins, this is
   * in the form: `accounts/{account_id}/admins/{admin_id}` For location admins,
   * this is in the form: `locations/{location_id}/admins/{admin_id}` This field
   * will be ignored if set during admin creation.
   * @param Admin $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The specific fields that should be
   * updated. The only editable field is role.
   * @return Admin
   */
  public function patch($name, Admin $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Admin::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LocationsAdmins::class, 'Google_Service_MyBusinessAccountManagement_Resource_LocationsAdmins');
