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

namespace Google\Service\DisplayVideo\Resource;

use Google\Service\DisplayVideo\BulkEditAssignedUserRolesRequest;
use Google\Service\DisplayVideo\BulkEditAssignedUserRolesResponse;
use Google\Service\DisplayVideo\DisplayvideoEmpty;
use Google\Service\DisplayVideo\ListUsersResponse;
use Google\Service\DisplayVideo\User;

/**
 * The "users" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google\Service\DisplayVideo(...);
 *   $users = $displayvideoService->users;
 *  </code>
 */
class Users extends \Google\Service\Resource
{
  /**
   * Bulk edits user roles for a user. The operation will delete the assigned user
   * roles provided in BulkEditAssignedUserRolesRequest.deletedAssignedUserRoles
   * and then assign the user roles provided in
   * BulkEditAssignedUserRolesRequest.createdAssignedUserRoles.
   * (users.bulkEditAssignedUserRoles)
   *
   * @param string $userId Required. The ID of the user to which the assigned user
   * roles belong.
   * @param BulkEditAssignedUserRolesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BulkEditAssignedUserRolesResponse
   */
  public function bulkEditAssignedUserRoles($userId, BulkEditAssignedUserRolesRequest $postBody, $optParams = [])
  {
    $params = ['userId' => $userId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('bulkEditAssignedUserRoles', [$params], BulkEditAssignedUserRolesResponse::class);
  }
  /**
   * Creates a new user. Returns the newly created user if successful.
   * (users.create)
   *
   * @param User $postBody
   * @param array $optParams Optional parameters.
   * @return User
   */
  public function create(User $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], User::class);
  }
  /**
   * Deletes a user. (users.delete)
   *
   * @param string $userId Required. The ID of the user to delete.
   * @param array $optParams Optional parameters.
   * @return DisplayvideoEmpty
   */
  public function delete($userId, $optParams = [])
  {
    $params = ['userId' => $userId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], DisplayvideoEmpty::class);
  }
  /**
   * Gets a user. (users.get)
   *
   * @param string $userId Required. The ID of the user to fetch.
   * @param array $optParams Optional parameters.
   * @return User
   */
  public function get($userId, $optParams = [])
  {
    $params = ['userId' => $userId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], User::class);
  }
  /**
   * Lists users that are accessible to the current user. If two users have user
   * roles on the same partner or advertiser, they can access each other.
   * (users.listUsers)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Allows filtering by user properties. Supported
   * syntax: * Filter expressions are made up of one or more restrictions. *
   * Restrictions can be combined by the logical operator `AND`. * A restriction
   * has the form of `{field} {operator} {value}`. * The operator must be
   * `CONTAINS (:)` or `EQUALS (=)`. * The operator must be `CONTAINS (:)` for the
   * following fields: - `displayName` - `email` * The operator must be `EQUALS
   * (=)` for the following fields: - `assignedUserRole.userRole` -
   * `assignedUserRole.partnerId` - `assignedUserRole.advertiserId` -
   * `assignedUserRole.entityType`: A synthetic field of AssignedUserRole used for
   * filtering. Identifies the type of entity to which the user role is assigned.
   * Valid values are `Partner` and `Advertiser`. -
   * `assignedUserRole.parentPartnerId`: A synthetic field of AssignedUserRole
   * used for filtering. Identifies the parent partner of the entity to which the
   * user role is assigned." Examples: * The user with displayName containing
   * `foo`: `displayName:"foo"` * The user with email containing `bar`:
   * `email:"bar"` * All users with standard user roles:
   * `assignedUserRole.userRole="STANDARD"` * All users with user roles for
   * partner 123: `assignedUserRole.partnerId="123"` * All users with user roles
   * for advertiser 123: `assignedUserRole.advertiserId="123"` * All users with
   * partner level user roles: `entityType="PARTNER"` * All users with user roles
   * for partner 123 and advertisers under partner 123: `parentPartnerId="123"`
   * The length of this field should be no more than 500 characters.
   * @opt_param string orderBy Field by which to sort the list. Acceptable values
   * are: * `displayName` (default) The default sorting order is ascending. To
   * specify descending order for a field, a suffix "desc" should be added to the
   * field name. For example, `displayName desc`.
   * @opt_param int pageSize Requested page size. Must be between `1` and `100`.
   * If unspecified will default to `100`.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListUsers` method. If not specified, the first page of
   * results will be returned.
   * @return ListUsersResponse
   */
  public function listUsers($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListUsersResponse::class);
  }
  /**
   * Updates an existing user. Returns the updated user if successful.
   * (users.patch)
   *
   * @param string $userId Output only. The unique ID of the user. Assigned by the
   * system.
   * @param User $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The mask to control which fields to
   * update.
   * @return User
   */
  public function patch($userId, User $postBody, $optParams = [])
  {
    $params = ['userId' => $userId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], User::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Users::class, 'Google_Service_DisplayVideo_Resource_Users');
