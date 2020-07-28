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
 * The "users" collection of methods.
 * Typical usage is:
 *  <code>
 *   $displayvideoService = new Google_Service_DisplayVideo(...);
 *   $users = $displayvideoService->users;
 *  </code>
 */
class Google_Service_DisplayVideo_Resource_Users extends Google_Service_Resource
{
  /**
   * Bulk edits user roles for a user. The operation will delete the assigned user
   * roles provided in
   * BulkEditAssignedUserRolesRequest.deleted_assigned_user_roles and then assign
   * the user roles provided in
   * BulkEditAssignedUserRolesRequest.created_assigned_user_roles.
   * (users.bulkEditAssignedUserRoles)
   *
   * @param string $userId Required. The ID of the user to which the assigned user
   * roles belong.
   * @param Google_Service_DisplayVideo_BulkEditAssignedUserRolesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DisplayVideo_BulkEditAssignedUserRolesResponse
   */
  public function bulkEditAssignedUserRoles($userId, Google_Service_DisplayVideo_BulkEditAssignedUserRolesRequest $postBody, $optParams = array())
  {
    $params = array('userId' => $userId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('bulkEditAssignedUserRoles', array($params), "Google_Service_DisplayVideo_BulkEditAssignedUserRolesResponse");
  }
  /**
   * Creates a new user. Returns the newly created user if successful.
   * (users.create)
   *
   * @param Google_Service_DisplayVideo_User $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DisplayVideo_User
   */
  public function create(Google_Service_DisplayVideo_User $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_DisplayVideo_User");
  }
  /**
   * Deletes a user. (users.delete)
   *
   * @param string $userId Required. The ID of the user to delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_DisplayVideo_DisplayvideoEmpty
   */
  public function delete($userId, $optParams = array())
  {
    $params = array('userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_DisplayVideo_DisplayvideoEmpty");
  }
  /**
   * Gets a user. (users.get)
   *
   * @param string $userId Required. The ID of the user to fetch.
   * @param array $optParams Optional parameters.
   * @return Google_Service_DisplayVideo_User
   */
  public function get($userId, $optParams = array())
  {
    $params = array('userId' => $userId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DisplayVideo_User");
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
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of next_page_token returned from
   * the previous call to `ListUsers` method. If not specified, the first page of
   * results will be returned.
   * @opt_param int pageSize Requested page size. Must be between `1` and `100`.
   * If unspecified will default to `100`.
   * @opt_param string orderBy Field by which to sort the list. Acceptable values
   * are: * `displayName` (default) The default sorting order is ascending. To
   * specify descending order for a field, a suffix "desc" should be added to the
   * field name. For example, `displayName desc`.
   * @return Google_Service_DisplayVideo_ListUsersResponse
   */
  public function listUsers($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DisplayVideo_ListUsersResponse");
  }
  /**
   * Updates an existing user. Returns the updated user if successful.
   * (users.patch)
   *
   * @param string $userId Output only. The unique ID of the user. Assigned by the
   * system.
   * @param Google_Service_DisplayVideo_User $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The mask to control which fields to
   * update.
   * @return Google_Service_DisplayVideo_User
   */
  public function patch($userId, Google_Service_DisplayVideo_User $postBody, $optParams = array())
  {
    $params = array('userId' => $userId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_DisplayVideo_User");
  }
}
