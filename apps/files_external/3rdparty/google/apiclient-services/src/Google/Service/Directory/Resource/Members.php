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
 * The "members" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $members = $adminService->members;
 *  </code>
 */
class Google_Service_Directory_Resource_Members extends Google_Service_Resource
{
  /**
   * Removes a member from a group. (members.delete)
   *
   * @param string $groupKey Identifies the group in the API request. The value
   * can be the group's email address, group alias, or the unique group ID.
   * @param string $memberKey Identifies the group member in the API request. A
   * group member can be a user or another group. The value can be the member's
   * (group or user) primary email address, alias, or unique ID.
   * @param array $optParams Optional parameters.
   */
  public function delete($groupKey, $memberKey, $optParams = array())
  {
    $params = array('groupKey' => $groupKey, 'memberKey' => $memberKey);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves a group member's properties. (members.get)
   *
   * @param string $groupKey Identifies the group in the API request. The value
   * can be the group's email address, group alias, or the unique group ID.
   * @param string $memberKey Identifies the group member in the API request. A
   * group member can be a user or another group. The value can be the member's
   * (group or user) primary email address, alias, or unique ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Member
   */
  public function get($groupKey, $memberKey, $optParams = array())
  {
    $params = array('groupKey' => $groupKey, 'memberKey' => $memberKey);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_Member");
  }
  /**
   * Checks whether the given user is a member of the group. Membership can be
   * direct or nested. (members.hasMember)
   *
   * @param string $groupKey Identifies the group in the API request. The value
   * can be the group's email address, group alias, or the unique group ID.
   * @param string $memberKey Identifies the user member in the API request. The
   * value can be the user's primary email address, alias, or unique ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_MembersHasMember
   */
  public function hasMember($groupKey, $memberKey, $optParams = array())
  {
    $params = array('groupKey' => $groupKey, 'memberKey' => $memberKey);
    $params = array_merge($params, $optParams);
    return $this->call('hasMember', array($params), "Google_Service_Directory_MembersHasMember");
  }
  /**
   * Adds a user to the specified group. (members.insert)
   *
   * @param string $groupKey Identifies the group in the API request. The value
   * can be the group's email address, group alias, or the unique group ID.
   * @param Google_Service_Directory_Member $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Member
   */
  public function insert($groupKey, Google_Service_Directory_Member $postBody, $optParams = array())
  {
    $params = array('groupKey' => $groupKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Directory_Member");
  }
  /**
   * Retrieves a paginated list of all members in a group. (members.listMembers)
   *
   * @param string $groupKey Identifies the group in the API request. The value
   * can be the group's email address, group alias, or the unique group ID.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool includeDerivedMembership Whether to list indirect
   * memberships. Default: false.
   * @opt_param int maxResults Maximum number of results to return. Max allowed
   * value is 200.
   * @opt_param string pageToken Token to specify next page in the list.
   * @opt_param string roles The `roles` query parameter allows you to retrieve
   * group members by role. Allowed values are `OWNER`, `MANAGER`, and `MEMBER`.
   * @return Google_Service_Directory_Members
   */
  public function listMembers($groupKey, $optParams = array())
  {
    $params = array('groupKey' => $groupKey);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_Members");
  }
  /**
   * Updates the membership properties of a user in the specified group. This
   * method supports [patch semantics](/admin-
   * sdk/directory/v1/guides/performance#patch). (members.patch)
   *
   * @param string $groupKey Identifies the group in the API request. The value
   * can be the group's email address, group alias, or the unique group ID.
   * @param string $memberKey Identifies the group member in the API request. A
   * group member can be a user or another group. The value can be the member's
   * (group or user) primary email address, alias, or unique ID.
   * @param Google_Service_Directory_Member $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Member
   */
  public function patch($groupKey, $memberKey, Google_Service_Directory_Member $postBody, $optParams = array())
  {
    $params = array('groupKey' => $groupKey, 'memberKey' => $memberKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Directory_Member");
  }
  /**
   * Updates the membership of a user in the specified group. (members.update)
   *
   * @param string $groupKey Identifies the group in the API request. The value
   * can be the group's email address, group alias, or the unique group ID.
   * @param string $memberKey Identifies the group member in the API request. A
   * group member can be a user or another group. The value can be the member's
   * (group or user) primary email address, alias, or unique ID.
   * @param Google_Service_Directory_Member $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Member
   */
  public function update($groupKey, $memberKey, Google_Service_Directory_Member $postBody, $optParams = array())
  {
    $params = array('groupKey' => $groupKey, 'memberKey' => $memberKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Directory_Member");
  }
}
