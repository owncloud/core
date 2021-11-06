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
use Google\Service\MyBusinessAccountManagement\ListAccountAdminsResponse;
use Google\Service\MyBusinessAccountManagement\MybusinessaccountmanagementEmpty;

/**
 * The "admins" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessaccountmanagementService = new Google\Service\MyBusinessAccountManagement(...);
 *   $admins = $mybusinessaccountmanagementService->admins;
 *  </code>
 */
class AccountsAdmins extends \Google\Service\Resource
{
  /**
   * Invites the specified user to become an administrator for the specified
   * account. The invitee must accept the invitation in order to be granted access
   * to the account. See AcceptInvitation to programmatically accept an
   * invitation. (admins.create)
   *
   * @param string $parent Required. The resource name of the account this admin
   * is created for. `accounts/{account_id}`.
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
   * Removes the specified admin from the specified account. (admins.delete)
   *
   * @param string $name Required. The resource name of the admin to remove from
   * the account. `accounts/{account_id}/admins/{admin_id}`.
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
   * Lists the admins for the specified account. (admins.listAccountsAdmins)
   *
   * @param string $parent Required. The name of the account from which to
   * retrieve a list of admins. `accounts/{account_id}/admins`.
   * @param array $optParams Optional parameters.
   * @return ListAccountAdminsResponse
   */
  public function listAccountsAdmins($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListAccountAdminsResponse::class);
  }
  /**
   * Updates the Admin for the specified Account Admin. (admins.patch)
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
class_alias(AccountsAdmins::class, 'Google_Service_MyBusinessAccountManagement_Resource_AccountsAdmins');
