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

namespace Google\Service\PeopleService\Resource;

use Google\Service\PeopleService\BatchGetContactGroupsResponse;
use Google\Service\PeopleService\ContactGroup;
use Google\Service\PeopleService\CreateContactGroupRequest;
use Google\Service\PeopleService\ListContactGroupsResponse;
use Google\Service\PeopleService\PeopleEmpty;
use Google\Service\PeopleService\UpdateContactGroupRequest;

/**
 * The "contactGroups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $peopleService = new Google\Service\PeopleService(...);
 *   $contactGroups = $peopleService->contactGroups;
 *  </code>
 */
class ContactGroups extends \Google\Service\Resource
{
  /**
   * Get a list of contact groups owned by the authenticated user by specifying a
   * list of contact group resource names. (contactGroups.batchGet)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string groupFields Optional. A field mask to restrict which fields
   * on the group are returned. Defaults to `metadata`, `groupType`,
   * `memberCount`, and `name` if not set or set to empty. Valid fields are: *
   * clientData * groupType * memberCount * metadata * name
   * @opt_param int maxMembers Optional. Specifies the maximum number of members
   * to return for each group. Defaults to 0 if not set, which will return zero
   * members.
   * @opt_param string resourceNames Required. The resource names of the contact
   * groups to get. There is a maximum of 200 resource names.
   * @return BatchGetContactGroupsResponse
   */
  public function batchGet($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('batchGet', [$params], BatchGetContactGroupsResponse::class);
  }
  /**
   * Create a new contact group owned by the authenticated user. Created contact
   * group names must be unique to the users contact groups. Attempting to create
   * a group with a duplicate name will return a HTTP 409 error.
   * (contactGroups.create)
   *
   * @param CreateContactGroupRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ContactGroup
   */
  public function create(CreateContactGroupRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], ContactGroup::class);
  }
  /**
   * Delete an existing contact group owned by the authenticated user by
   * specifying a contact group resource name. (contactGroups.delete)
   *
   * @param string $resourceName Required. The resource name of the contact group
   * to delete.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool deleteContacts Optional. Set to true to also delete the
   * contacts in the specified group.
   * @return PeopleEmpty
   */
  public function delete($resourceName, $optParams = [])
  {
    $params = ['resourceName' => $resourceName];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], PeopleEmpty::class);
  }
  /**
   * Get a specific contact group owned by the authenticated user by specifying a
   * contact group resource name. (contactGroups.get)
   *
   * @param string $resourceName Required. The resource name of the contact group
   * to get.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string groupFields Optional. A field mask to restrict which fields
   * on the group are returned. Defaults to `metadata`, `groupType`,
   * `memberCount`, and `name` if not set or set to empty. Valid fields are: *
   * clientData * groupType * memberCount * metadata * name
   * @opt_param int maxMembers Optional. Specifies the maximum number of members
   * to return. Defaults to 0 if not set, which will return zero members.
   * @return ContactGroup
   */
  public function get($resourceName, $optParams = [])
  {
    $params = ['resourceName' => $resourceName];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ContactGroup::class);
  }
  /**
   * List all contact groups owned by the authenticated user. Members of the
   * contact groups are not populated. (contactGroups.listContactGroups)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string groupFields Optional. A field mask to restrict which fields
   * on the group are returned. Defaults to `metadata`, `groupType`,
   * `memberCount`, and `name` if not set or set to empty. Valid fields are: *
   * clientData * groupType * memberCount * metadata * name
   * @opt_param int pageSize Optional. The maximum number of resources to return.
   * Valid values are between 1 and 1000, inclusive. Defaults to 30 if not set or
   * set to 0.
   * @opt_param string pageToken Optional. The next_page_token value returned from
   * a previous call to
   * [ListContactGroups](/people/api/rest/v1/contactgroups/list). Requests the
   * next page of resources.
   * @opt_param string syncToken Optional. A sync token, returned by a previous
   * call to `contactgroups.list`. Only resources changed since the sync token was
   * created will be returned.
   * @return ListContactGroupsResponse
   */
  public function listContactGroups($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListContactGroupsResponse::class);
  }
  /**
   * Update the name of an existing contact group owned by the authenticated user.
   * Updated contact group names must be unique to the users contact groups.
   * Attempting to create a group with a duplicate name will return a HTTP 409
   * error. (contactGroups.update)
   *
   * @param string $resourceName The resource name for the contact group, assigned
   * by the server. An ASCII string, in the form of
   * `contactGroups/{contact_group_id}`.
   * @param UpdateContactGroupRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ContactGroup
   */
  public function update($resourceName, UpdateContactGroupRequest $postBody, $optParams = [])
  {
    $params = ['resourceName' => $resourceName, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], ContactGroup::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContactGroups::class, 'Google_Service_PeopleService_Resource_ContactGroups');
