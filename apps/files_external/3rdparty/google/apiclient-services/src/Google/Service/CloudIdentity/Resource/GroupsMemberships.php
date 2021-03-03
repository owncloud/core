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
   * Check a potential member for membership in a group. **Note:** This feature is
   * only available to Google Workspace Enterprise Standard, Enterprise Plus, and
   * Enterprise for Education; and Cloud Identity Premium accounts. If the account
   * of the member is not one of these, a 403 (PERMISSION_DENIED) HTTP status code
   * will be returned. A member has membership to a group as long as there is a
   * single viewable transitive membership between the group and the member. The
   * actor must have view permissions to at least one transitive membership
   * between the member and group. (memberships.checkTransitiveMembership)
   *
   * @param string $parent [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the group to
   * check the transitive membership in. Format: `groups/{group_id}`, where
   * `group_id` is the unique id assigned to the Group to which the Membership
   * belongs to.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string query Required. A CEL expression that MUST include member
   * specification. This is a `required` field. Certain groups are uniquely
   * identified by both a 'member_key_id' and a 'member_key_namespace', which
   * requires an additional query input: 'member_key_namespace'. Example query:
   * `member_key_id == 'member_key_id_value'`
   * @return Google_Service_CloudIdentity_CheckTransitiveMembershipResponse
   */
  public function checkTransitiveMembership($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('checkTransitiveMembership', array($params), "Google_Service_CloudIdentity_CheckTransitiveMembershipResponse");
  }
  /**
   * Creates a `Membership`. (memberships.create)
   *
   * @param string $parent Required. The parent `Group` resource under which to
   * create the `Membership`. Must be of the form `groups/{group_id}`.
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
   * Deletes a `Membership`. (memberships.delete)
   *
   * @param string $name Required. The [resource
   * name](https://cloud.google.com/apis/design/resource_names) of the
   * `Membership` to delete. Must be of the form
   * `groups/{group_id}/memberships/{membership_id}`
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
   * Retrieves a `Membership`. (memberships.get)
   *
   * @param string $name Required. The [resource
   * name](https://cloud.google.com/apis/design/resource_names) of the
   * `Membership` to retrieve. Must be of the form
   * `groups/{group_id}/memberships/{membership_id}`.
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
   * Get a membership graph of just a member or both a member and a group.
   * **Note:** This feature is only available to Google Workspace Enterprise
   * Standard, Enterprise Plus, and Enterprise for Education; and Cloud Identity
   * Premium accounts. If the account of the member is not one of these, a 403
   * (PERMISSION_DENIED) HTTP status code will be returned. Given a member, the
   * response will contain all membership paths from the member. Given both a
   * group and a member, the response will contain all membership paths between
   * the group and the member. (memberships.getMembershipGraph)
   *
   * @param string $parent Required. [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the group to
   * search transitive memberships in. Format: `groups/{group_id}`, where
   * `group_id` is the unique ID assigned to the Group to which the Membership
   * belongs to. group_id can be a wildcard collection id "-". When a group_id is
   * specified, the membership graph will be constrained to paths between the
   * member (defined in the query) and the parent. If a wildcard collection is
   * provided, all membership paths connected to the member will be returned.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string query Required. A CEL expression that MUST include member
   * specification AND label(s). Certain groups are uniquely identified by both a
   * 'member_key_id' and a 'member_key_namespace', which requires an additional
   * query input: 'member_key_namespace'. Example query: `member_key_id ==
   * 'member_key_id_value' && in labels`
   * @return Google_Service_CloudIdentity_Operation
   */
  public function getMembershipGraph($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('getMembershipGraph', array($params), "Google_Service_CloudIdentity_Operation");
  }
  /**
   * Lists the `Membership`s within a `Group`. (memberships.listGroupsMemberships)
   *
   * @param string $parent Required. The parent `Group` resource under which to
   * lookup the `Membership` name. Must be of the form `groups/{group_id}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of results to return. Note that
   * the number of results returned may be less than this value even if there are
   * more available results. To fetch all results, clients must continue calling
   * this method repeatedly until the response no longer contains a
   * `next_page_token`. If unspecified, defaults to 200 for `GroupView.BASIC` and
   * to 50 for `GroupView.FULL`. Must not be greater than 1000 for
   * `GroupView.BASIC` or 500 for `GroupView.FULL`.
   * @opt_param string pageToken The `next_page_token` value returned from a
   * previous search request, if any.
   * @opt_param string view The level of detail to be returned. If unspecified,
   * defaults to `View.BASIC`.
   * @return Google_Service_CloudIdentity_ListMembershipsResponse
   */
  public function listGroupsMemberships($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CloudIdentity_ListMembershipsResponse");
  }
  /**
   * Looks up the [resource
   * name](https://cloud.google.com/apis/design/resource_names) of a `Membership`
   * by its `EntityKey`. (memberships.lookup)
   *
   * @param string $parent Required. The parent `Group` resource under which to
   * lookup the `Membership` name. Must be of the form `groups/{group_id}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string memberKey.id The ID of the entity. For Google-managed
   * entities, the `id` should be the email address of an existing group or user.
   * For external-identity-mapped entities, the `id` must be a string conforming
   * to the Identity Source's requirements. Must be unique within a `namespace`.
   * @opt_param string memberKey.namespace The namespace in which the entity
   * exists. If not specified, the `EntityKey` represents a Google-managed entity
   * such as a Google user or a Google Group. If specified, the `EntityKey`
   * represents an external-identity-mapped group. The namespace must correspond
   * to an identity source created in Admin Console and must be in the form of
   * `identitysources/{identity_source_id}.
   * @return Google_Service_CloudIdentity_LookupMembershipNameResponse
   */
  public function lookup($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('lookup', array($params), "Google_Service_CloudIdentity_LookupMembershipNameResponse");
  }
  /**
   * Modifies the `MembershipRole`s of a `Membership`.
   * (memberships.modifyMembershipRoles)
   *
   * @param string $name Required. The [resource
   * name](https://cloud.google.com/apis/design/resource_names) of the
   * `Membership` whose roles are to be modified. Must be of the form
   * `groups/{group_id}/memberships/{membership_id}`.
   * @param Google_Service_CloudIdentity_ModifyMembershipRolesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudIdentity_ModifyMembershipRolesResponse
   */
  public function modifyMembershipRoles($name, Google_Service_CloudIdentity_ModifyMembershipRolesRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('modifyMembershipRoles', array($params), "Google_Service_CloudIdentity_ModifyMembershipRolesResponse");
  }
  /**
   * Search transitive groups of a member. **Note:** This feature is only
   * available to Google Workspace Enterprise Standard, Enterprise Plus, and
   * Enterprise for Education; and Cloud Identity Premium accounts. If the account
   * of the member is not one of these, a 403 (PERMISSION_DENIED) HTTP status code
   * will be returned. A transitive group is any group that has a direct or
   * indirect membership to the member. Actor must have view permissions all
   * transitive groups. (memberships.searchTransitiveGroups)
   *
   * @param string $parent [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the group to
   * search transitive memberships in. Format: `groups/{group_id}`, where
   * `group_id` is always '-' as this API will search across all groups for a
   * given member.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The default page size is 200 (max 1000).
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request, if any.
   * @opt_param string query Required. A CEL expression that MUST include member
   * specification AND label(s). This is a `required` field. Users can search on
   * label attributes of groups. CONTAINS match ('in') is supported on labels.
   * Certain groups are uniquely identified by both a 'member_key_id' and a
   * 'member_key_namespace', which requires an additional query input:
   * 'member_key_namespace'. Example query: `member_key_id ==
   * 'member_key_id_value' && in labels`
   * @return Google_Service_CloudIdentity_SearchTransitiveGroupsResponse
   */
  public function searchTransitiveGroups($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('searchTransitiveGroups', array($params), "Google_Service_CloudIdentity_SearchTransitiveGroupsResponse");
  }
  /**
   * Search transitive memberships of a group. **Note:** This feature is only
   * available to Google Workspace Enterprise Standard, Enterprise Plus, and
   * Enterprise for Education; and Cloud Identity Premium accounts. If the account
   * of the group is not one of these, a 403 (PERMISSION_DENIED) HTTP status code
   * will be returned. A transitive membership is any direct or indirect
   * membership of a group. Actor must have view permissions to all transitive
   * memberships. (memberships.searchTransitiveMemberships)
   *
   * @param string $parent [Resource
   * name](https://cloud.google.com/apis/design/resource_names) of the group to
   * search transitive memberships in. Format: `groups/{group_id}`, where
   * `group_id` is the unique ID assigned to the Group.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The default page size is 200 (max 1000).
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request, if any.
   * @return Google_Service_CloudIdentity_SearchTransitiveMembershipsResponse
   */
  public function searchTransitiveMemberships($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('searchTransitiveMemberships', array($params), "Google_Service_CloudIdentity_SearchTransitiveMembershipsResponse");
  }
}
