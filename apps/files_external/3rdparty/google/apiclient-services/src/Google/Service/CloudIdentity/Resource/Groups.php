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
 *   $cloudidentityService = new Google_Service_CloudIdentity(...);
 *   $groups = $cloudidentityService->groups;
 *  </code>
 */
class Google_Service_CloudIdentity_Resource_Groups extends Google_Service_Resource
{
  /**
   * Creates a Group. (groups.create)
   *
   * @param Google_Service_CloudIdentity_Group $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudIdentity_Operation
   */
  public function create(Google_Service_CloudIdentity_Group $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudIdentity_Operation");
  }
  /**
   * Deletes a Group. (groups.delete)
   *
   * @param string $name Required. [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the Group in
   * the format: `groups/{group_id}`, where `group_id` is the unique ID assigned
   * to the Group.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudIdentity_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudIdentity_Operation");
  }
  /**
   * Retrieves a Group. (groups.get)
   *
   * @param string $name Required. [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the Group in
   * the format: `groups/{group_id}`, where `group_id` is the unique ID assigned
   * to the Group.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudIdentity_Group
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudIdentity_Group");
  }
  /**
   * Lists groups within a customer or a domain. (groups.listGroups)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request, if any.
   * @opt_param int pageSize The default page size is 200 (max 1000) for the BASIC
   * view, and 50 (max 500) for the FULL view.
   * @opt_param string view Group resource view to be returned. Defaults to
   * [View.BASIC]().
   * @opt_param string parent Required. Customer ID to list all groups from.
   * @return Google_Service_CloudIdentity_ListGroupsResponse
   */
  public function listGroups($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudIdentity_ListGroupsResponse");
  }
  /**
   * Looks up [resource name](https://cloud.google.com/apis/design/resource_names)
   * of a Group by its EntityKey. (groups.lookup)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string groupKey.id The ID of the entity within the given
   * namespace. The ID must be unique within its namespace.
   * @opt_param string groupKey.namespace Namespaces provide isolation for IDs, so
   * an ID only needs to be unique within its namespace.
   *
   * Namespaces are currently only created as part of IdentitySource creation from
   * Admin Console. A namespace `"identitysources/{identity_source_id}"` is
   * created corresponding to every Identity Source `identity_source_id`.
   * @return Google_Service_CloudIdentity_LookupGroupNameResponse
   */
  public function lookup($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('lookup', array($params), "Google_Service_CloudIdentity_LookupGroupNameResponse");
  }
  /**
   * Updates a Group. (groups.patch)
   *
   * @param string $name Output only. [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the Group in
   * the format: `groups/{group_id}`, where group_id is the unique ID assigned to
   * the Group.
   *
   * Must be left blank while creating a Group.
   * @param Google_Service_CloudIdentity_Group $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Editable fields: `display_name`,
   * `description`
   * @return Google_Service_CloudIdentity_Operation
   */
  public function patch($name, Google_Service_CloudIdentity_Group $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CloudIdentity_Operation");
  }
  /**
   * Searches for Groups. (groups.search)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The next_page_token value returned from a
   * previous search request, if any.
   * @opt_param int pageSize The default page size is 200 (max 1000) for the BASIC
   * view, and 50 (max 500) for the FULL view.
   * @opt_param string query Required. `Required`. Query string for performing
   * search on groups. Users can search on parent and label attributes of groups.
   * EXACT match ('==') is supported on parent, and CONTAINS match ('in') is
   * supported on labels.
   * @opt_param string view Group resource view to be returned. Defaults to
   * [View.BASIC]().
   * @return Google_Service_CloudIdentity_SearchGroupsResponse
   */
  public function search($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_CloudIdentity_SearchGroupsResponse");
  }
}
