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
   * Lists the `Membership`s within a `Group`. (memberships.listGroupsMemberships)
   *
   * @param string $parent Required. The parent `Group` resource under which to
   * lookup the `Membership` name. Must be of the form `groups/{group_id}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view The level of detail to be returned. If unspecified,
   * defaults to `View.BASIC`.
   * @opt_param int pageSize The maximum number of results to return. Note that
   * the number of results returned may be less than this value even if there are
   * more available results. To fetch all results, clients must continue calling
   * this method repeatedly until the response no longer contains a
   * `next_page_token`. If unspecified, defaults to 200 for `GroupView.BASIC` and
   * to 50 for `GroupView.FULL`. Must not be greater than 1000 for
   * `GroupView.BASIC` or 500 for `GroupView.FULL`.
   * @opt_param string pageToken The `next_page_token` value returned from a
   * previous search request, if any.
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
}
