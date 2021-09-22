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

namespace Google\Service\CloudIdentity\Resource;

use Google\Service\CloudIdentity\Group;
use Google\Service\CloudIdentity\ListGroupsResponse;
use Google\Service\CloudIdentity\LookupGroupNameResponse;
use Google\Service\CloudIdentity\Operation;
use Google\Service\CloudIdentity\SearchGroupsResponse;

/**
 * The "groups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudidentityService = new Google\Service\CloudIdentity(...);
 *   $groups = $cloudidentityService->groups;
 *  </code>
 */
class Groups extends \Google\Service\Resource
{
  /**
   * Creates a Group. (groups.create)
   *
   * @param Group $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string initialGroupConfig Optional. The initial configuration
   * option for the `Group`.
   * @return Operation
   */
  public function create(Group $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Operation::class);
  }
  /**
   * Deletes a `Group`. (groups.delete)
   *
   * @param string $name Required. The [resource
   * name](https://cloud.google.com/apis/design/resource_names) of the `Group` to
   * retrieve. Must be of the form `groups/{group}`.
   * @param array $optParams Optional parameters.
   * @return Operation
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], Operation::class);
  }
  /**
   * Retrieves a `Group`. (groups.get)
   *
   * @param string $name Required. The [resource
   * name](https://cloud.google.com/apis/design/resource_names) of the `Group` to
   * retrieve. Must be of the form `groups/{group}`.
   * @param array $optParams Optional parameters.
   * @return Group
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Group::class);
  }
  /**
   * Lists the `Group` resources under a customer or namespace.
   * (groups.listGroups)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of results to return. Note that
   * the number of results returned may be less than this value even if there are
   * more available results. To fetch all results, clients must continue calling
   * this method repeatedly until the response no longer contains a
   * `next_page_token`. If unspecified, defaults to 200 for `View.BASIC` and to 50
   * for `View.FULL`. Must not be greater than 1000 for `View.BASIC` or 500 for
   * `View.FULL`.
   * @opt_param string pageToken The `next_page_token` value returned from a
   * previous list request, if any.
   * @opt_param string parent Required. The parent resource under which to list
   * all `Group` resources. Must be of the form
   * `identitysources/{identity_source}` for external- identity-mapped groups or
   * `customers/{customer}` for Google Groups. The `customer` must begin with "C"
   * (for example, 'C046psxkn').
   * @opt_param string view The level of detail to be returned. If unspecified,
   * defaults to `View.BASIC`.
   * @return ListGroupsResponse
   */
  public function listGroups($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListGroupsResponse::class);
  }
  /**
   * Looks up the [resource
   * name](https://cloud.google.com/apis/design/resource_names) of a `Group` by
   * its `EntityKey`. (groups.lookup)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string groupKey.id The ID of the entity. For Google-managed
   * entities, the `id` should be the email address of an existing group or user.
   * For external-identity-mapped entities, the `id` must be a string conforming
   * to the Identity Source's requirements. Must be unique within a `namespace`.
   * @opt_param string groupKey.namespace The namespace in which the entity
   * exists. If not specified, the `EntityKey` represents a Google-managed entity
   * such as a Google user or a Google Group. If specified, the `EntityKey`
   * represents an external-identity-mapped group. The namespace must correspond
   * to an identity source created in Admin Console and must be in the form of
   * `identitysources/{identity_source}`.
   * @return LookupGroupNameResponse
   */
  public function lookup($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('lookup', [$params], LookupGroupNameResponse::class);
  }
  /**
   * Updates a `Group`. (groups.patch)
   *
   * @param string $name Output only. The [resource
   * name](https://cloud.google.com/apis/design/resource_names) of the `Group`.
   * Shall be of the form `groups/{group}`.
   * @param Group $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The names of fields to update. May
   * only contain the following field names: `display_name`, `description`,
   * `labels`.
   * @return Operation
   */
  public function patch($name, Group $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Operation::class);
  }
  /**
   * Searches for `Group` resources matching a specified query. (groups.search)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of results to return. Note that
   * the number of results returned may be less than this value even if there are
   * more available results. To fetch all results, clients must continue calling
   * this method repeatedly until the response no longer contains a
   * `next_page_token`. If unspecified, defaults to 200 for `GroupView.BASIC` and
   * 50 for `GroupView.FULL`. Must not be greater than 1000 for `GroupView.BASIC`
   * or 500 for `GroupView.FULL`.
   * @opt_param string pageToken The `next_page_token` value returned from a
   * previous search request, if any.
   * @opt_param string query Required. The search query. Must be specified in
   * [Common Expression Language](https://opensource.google/projects/cel). May
   * only contain equality operators on the parent and inclusion operators on
   * labels (e.g., `parent == 'customers/{customer}' &&
   * 'cloudidentity.googleapis.com/groups.discussion_forum' in labels`). The
   * `customer` must begin with "C" (for example, 'C046psxkn').
   * @opt_param string view The level of detail to be returned. If unspecified,
   * defaults to `View.BASIC`.
   * @return SearchGroupsResponse
   */
  public function search($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('search', [$params], SearchGroupsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Groups::class, 'Google_Service_CloudIdentity_Resource_Groups');
