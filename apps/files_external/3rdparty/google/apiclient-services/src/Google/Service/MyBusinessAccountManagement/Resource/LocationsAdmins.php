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

/**
 * The "admins" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessaccountmanagementService = new Google_Service_MyBusinessAccountManagement(...);
 *   $admins = $mybusinessaccountmanagementService->admins;
 *  </code>
 */
class Google_Service_MyBusinessAccountManagement_Resource_LocationsAdmins extends Google_Service_Resource
{
  /**
   * Invites the specified user to become an administrator for the specified
   * location. The invitee must accept the invitation in order to be granted
   * access to the location. See AcceptInvitation to programmatically accept an
   * invitation. (admins.create)
   *
   * @param string $parent Required. The resource name of the location this admin
   * is created for. `locations/{location_id}/admins`.
   * @param Google_Service_MyBusinessAccountManagement_Admin $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusinessAccountManagement_Admin
   */
  public function create($parent, Google_Service_MyBusinessAccountManagement_Admin $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_MyBusinessAccountManagement_Admin");
  }
  /**
   * Removes the specified admin as a manager of the specified location.
   * (admins.delete)
   *
   * @param string $name Required. The resource name of the admin to remove from
   * the location.
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusinessAccountManagement_MybusinessaccountmanagementEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_MyBusinessAccountManagement_MybusinessaccountmanagementEmpty");
  }
  /**
   * Lists all of the admins for the specified location.
   * (admins.listLocationsAdmins)
   *
   * @param string $parent Required. The name of the location to list admins of.
   * `locations/{location_id}/admins`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusinessAccountManagement_ListLocationAdminsResponse
   */
  public function listLocationsAdmins($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_MyBusinessAccountManagement_ListLocationAdminsResponse");
  }
  /**
   * Updates the Admin for the specified location. Only the AdminRole of the Admin
   * can be updated. (admins.patch)
   *
   * @param string $name Immutable. The resource name. For account admins, this is
   * in the form: `accounts/{account_id}/admins/{admin_id}` For location admins,
   * this is in the form: `locations/{location_id}/admins/{admin_id}` This field
   * will be ignored if set during admin creation.
   * @param Google_Service_MyBusinessAccountManagement_Admin $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The specific fields that should be
   * updated. The only editable field is role.
   * @return Google_Service_MyBusinessAccountManagement_Admin
   */
  public function patch($name, Google_Service_MyBusinessAccountManagement_Admin $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_MyBusinessAccountManagement_Admin");
  }
}
