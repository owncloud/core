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
 * The "groups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google_Service_Directory(...);
 *   $groups = $adminService->groups;
 *  </code>
 */
class Google_Service_Directory_Resource_Groups extends Google_Service_Resource
{
  /**
   * Deletes a group. (groups.delete)
   *
   * @param string $groupKey Identifies the group in the API request. The value
   * can be the group's email address, group alias, or the unique group ID.
   * @param array $optParams Optional parameters.
   */
  public function delete($groupKey, $optParams = array())
  {
    $params = array('groupKey' => $groupKey);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Retrieves a group's properties. (groups.get)
   *
   * @param string $groupKey Identifies the group in the API request. The value
   * can be the group's email address, group alias, or the unique group ID.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Group
   */
  public function get($groupKey, $optParams = array())
  {
    $params = array('groupKey' => $groupKey);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Directory_Group");
  }
  /**
   * Creates a group. (groups.insert)
   *
   * @param Google_Service_Directory_Group $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Group
   */
  public function insert(Google_Service_Directory_Group $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Directory_Group");
  }
  /**
   * Retrieve all groups of a domain or of a user given a userKey (paginated)
   * (groups.listGroups)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customer The unique ID for the customer's Google Workspace
   * account. In case of a multi-domain account, to fetch all groups for a
   * customer, fill this field instead of domain. As an account administrator, you
   * can also use the `my_customer` alias to represent your account's
   * `customerId`. The `customerId` is also returned as part of the [Users
   * ](/admin-sdk/directory/v1/reference/users)
   * @opt_param string domain The domain name. Use this field to get fields from
   * only one domain. To return all domains for a customer account, use the
   * `customer` query parameter instead.
   * @opt_param int maxResults Maximum number of results to return. Max allowed
   * value is 200.
   * @opt_param string orderBy Column to use for sorting results
   * @opt_param string pageToken Token to specify next page in the list
   * @opt_param string query Query string search. Should be of the form "".
   * Complete documentation is at https: //developers.google.com/admin-
   * sdk/directory/v1/guides/search-groups
   * @opt_param string sortOrder Whether to return results in ascending or
   * descending order. Only of use when orderBy is also used
   * @opt_param string userKey Email or immutable ID of the user if only those
   * groups are to be listed, the given user is a member of. If it's an ID, it
   * should match with the ID of the user object.
   * @return Google_Service_Directory_Groups
   */
  public function listGroups($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Directory_Groups");
  }
  /**
   * Updates a group's properties. This method supports [patch semantics](/admin-
   * sdk/directory/v1/guides/performance#patch). (groups.patch)
   *
   * @param string $groupKey Identifies the group in the API request. The value
   * can be the group's email address, group alias, or the unique group ID.
   * @param Google_Service_Directory_Group $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Group
   */
  public function patch($groupKey, Google_Service_Directory_Group $postBody, $optParams = array())
  {
    $params = array('groupKey' => $groupKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Directory_Group");
  }
  /**
   * Updates a group's properties. (groups.update)
   *
   * @param string $groupKey Identifies the group in the API request. The value
   * can be the group's email address, group alias, or the unique group ID.
   * @param Google_Service_Directory_Group $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Directory_Group
   */
  public function update($groupKey, Google_Service_Directory_Group $postBody, $optParams = array())
  {
    $params = array('groupKey' => $groupKey, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Directory_Group");
  }
}
