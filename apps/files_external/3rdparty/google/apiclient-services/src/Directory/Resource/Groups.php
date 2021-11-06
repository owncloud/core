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

use Google\Service\Directory\Group;
use Google\Service\Directory\Groups as GroupsModel;

/**
 * The "groups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google\Service\Directory(...);
 *   $groups = $adminService->groups;
 *  </code>
 */
class Groups extends \Google\Service\Resource
{
  /**
   * Deletes a group. (groups.delete)
   *
   * @param string $groupKey Identifies the group in the API request. The value
   * can be the group's email address, group alias, or the unique group ID.
   * @param array $optParams Optional parameters.
   */
  public function delete($groupKey, $optParams = [])
  {
    $params = ['groupKey' => $groupKey];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Retrieves a group's properties. (groups.get)
   *
   * @param string $groupKey Identifies the group in the API request. The value
   * can be the group's email address, group alias, or the unique group ID.
   * @param array $optParams Optional parameters.
   * @return Group
   */
  public function get($groupKey, $optParams = [])
  {
    $params = ['groupKey' => $groupKey];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Group::class);
  }
  /**
   * Creates a group. (groups.insert)
   *
   * @param Group $postBody
   * @param array $optParams Optional parameters.
   * @return Group
   */
  public function insert(Group $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Group::class);
  }
  /**
   * Retrieves all groups of a domain or of a user given a userKey (paginated).
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
   * @return GroupsModel
   */
  public function listGroups($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GroupsModel::class);
  }
  /**
   * Updates a group's properties. This method supports [patch semantics](/admin-
   * sdk/directory/v1/guides/performance#patch). (groups.patch)
   *
   * @param string $groupKey Identifies the group in the API request. The value
   * can be the group's email address, group alias, or the unique group ID.
   * @param Group $postBody
   * @param array $optParams Optional parameters.
   * @return Group
   */
  public function patch($groupKey, Group $postBody, $optParams = [])
  {
    $params = ['groupKey' => $groupKey, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Group::class);
  }
  /**
   * Updates a group's properties. (groups.update)
   *
   * @param string $groupKey Identifies the group in the API request. The value
   * can be the group's email address, group alias, or the unique group ID.
   * @param Group $postBody
   * @param array $optParams Optional parameters.
   * @return Group
   */
  public function update($groupKey, Group $postBody, $optParams = [])
  {
    $params = ['groupKey' => $groupKey, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Group::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Groups::class, 'Google_Service_Directory_Resource_Groups');
