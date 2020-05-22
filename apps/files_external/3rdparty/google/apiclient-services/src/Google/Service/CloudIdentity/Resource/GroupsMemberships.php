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
 * The "memberships" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudidentityService = new Google_Service_CloudIdentity(...);
 *   $memberships = $cloudidentityService->memberships;
 *  </code>
 */
class Google_Service_CloudIdentity_Resource_GroupsMemberships extends Google_Service_Resource
{
  /**
   * Creates a Membership. (memberships.create)
   *
   * @param string $parent Required. [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the Group to
   * create Membership within. Format: `groups/{group_id}`, where `group_id` is
   * the unique ID assigned to the Group.
   * @param Google_Service_CloudIdentity_Membership $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudIdentity_Operation
   */
  public function create($parent, Google_Service_CloudIdentity_Membership $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CloudIdentity_Operation");
  }
  /**
   * Deletes a Membership. (memberships.delete)
   *
   * @param string $name Required. [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the Membership
   * to be deleted.
   *
   * Format: `groups/{group_id}/memberships/{member_id}`, where `group_id` is the
   * unique ID assigned to the Group to which Membership belongs to, and member_id
   * is the unique ID assigned to the member.
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
   * Retrieves a Membership. (memberships.get)
   *
   * @param string $name Required. [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the Membership
   * to be retrieved.
   *
   * Format: `groups/{group_id}/memberships/{member_id}`, where `group_id` is the
   * unique id assigned to the Group to which Membership belongs to, and
   * `member_id` is the unique ID assigned to the member.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudIdentity_Membership
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CloudIdentity_Membership");
  }
  /**
   * Lists Memberships within a Group. (memberships.listGroupsMemberships)
   *
   * @param string $parent Required. [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the Group to
   * list Memberships within.
   *
   * Format: `groups/{group_id}`, where `group_id` is the unique ID assigned to
   * the Group.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request, if any.
   * @opt_param int pageSize The default page size is 200 (max 1000) for the BASIC
   * view, and 50 (max 500) for the FULL view.
   * @opt_param string view Membership resource view to be returned. Defaults to
   * View.BASIC.
   * @return Google_Service_CloudIdentity_ListMembershipsResponse
   */
  public function listGroupsMemberships($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudIdentity_ListMembershipsResponse");
  }
  /**
   * Looks up [resource name](https://cloud.google.com/apis/design/resource_names)
   * of a Membership within a Group by member's EntityKey. (memberships.lookup)
   *
   * @param string $parent Required. [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the Group to
   * lookup Membership within.
   *
   * Format: `groups/{group_id}`, where `group_id` is the unique ID assigned to
   * the Group.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string memberKey.id The ID of the entity within the given
   * namespace. The ID must be unique within its namespace.
   * @opt_param string memberKey.namespace Namespaces provide isolation for IDs,
   * so an ID only needs to be unique within its namespace.
   *
   * Namespaces are currently only created as part of IdentitySource creation from
   * Admin Console. A namespace `"identitysources/{identity_source_id}"` is
   * created corresponding to every Identity Source `identity_source_id`.
   * @return Google_Service_CloudIdentity_LookupMembershipNameResponse
   */
  public function lookup($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('lookup', array($params), "Google_Service_CloudIdentity_LookupMembershipNameResponse");
  }
}
