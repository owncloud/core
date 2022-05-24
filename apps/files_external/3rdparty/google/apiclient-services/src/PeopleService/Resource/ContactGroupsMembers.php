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

use Google\Service\PeopleService\ModifyContactGroupMembersRequest;
use Google\Service\PeopleService\ModifyContactGroupMembersResponse;

/**
 * The "members" collection of methods.
 * Typical usage is:
 *  <code>
 *   $peopleService = new Google\Service\PeopleService(...);
 *   $members = $peopleService->members;
 *  </code>
 */
class ContactGroupsMembers extends \Google\Service\Resource
{
  /**
   * Modify the members of a contact group owned by the authenticated user. The
   * only system contact groups that can have members added are
   * `contactGroups/myContacts` and `contactGroups/starred`. Other system contact
   * groups are deprecated and can only have contacts removed. (members.modify)
   *
   * @param string $resourceName Required. The resource name of the contact group
   * to modify.
   * @param ModifyContactGroupMembersRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ModifyContactGroupMembersResponse
   */
  public function modify($resourceName, ModifyContactGroupMembersRequest $postBody, $optParams = [])
  {
    $params = ['resourceName' => $resourceName, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('modify', [$params], ModifyContactGroupMembersResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContactGroupsMembers::class, 'Google_Service_PeopleService_Resource_ContactGroupsMembers');
