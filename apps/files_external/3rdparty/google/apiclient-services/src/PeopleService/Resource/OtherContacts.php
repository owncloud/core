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

use Google\Service\PeopleService\CopyOtherContactToMyContactsGroupRequest;
use Google\Service\PeopleService\ListOtherContactsResponse;
use Google\Service\PeopleService\Person;
use Google\Service\PeopleService\SearchResponse;

/**
 * The "otherContacts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $peopleService = new Google\Service\PeopleService(...);
 *   $otherContacts = $peopleService->otherContacts;
 *  </code>
 */
class OtherContacts extends \Google\Service\Resource
{
  /**
   * Copies an "Other contact" to a new contact in the user's "myContacts" group
   * Mutate requests for the same user should be sent sequentially to avoid
   * increased latency and failures.
   * (otherContacts.copyOtherContactToMyContactsGroup)
   *
   * @param string $resourceName Required. The resource name of the "Other
   * contact" to copy.
   * @param CopyOtherContactToMyContactsGroupRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Person
   */
  public function copyOtherContactToMyContactsGroup($resourceName, CopyOtherContactToMyContactsGroupRequest $postBody, $optParams = [])
  {
    $params = ['resourceName' => $resourceName, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('copyOtherContactToMyContactsGroup', [$params], Person::class);
  }
  /**
   * List all "Other contacts", that is contacts that are not in a contact group.
   * "Other contacts" are typically auto created contacts from interactions. Sync
   * tokens expire 7 days after the full sync. A request with an expired sync
   * token will result in a 410 error. In the case of such an error clients should
   * make a full sync request without a `sync_token`. The first page of a full
   * sync request has an additional quota. If the quota is exceeded, a 429 error
   * will be returned. This quota is fixed and can not be increased. When the
   * `sync_token` is specified, resources deleted since the last sync will be
   * returned as a person with `PersonMetadata.deleted` set to true. When the
   * `page_token` or `sync_token` is specified, all other request parameters must
   * match the first call. Writes may have a propagation delay of several minutes
   * for sync requests. Incremental syncs are not intended for read-after-write
   * use cases. See example usage at [List the user's other contacts that have
   * changed](/people/v1/other-
   * contacts#list_the_users_other_contacts_that_have_changed).
   * (otherContacts.listOtherContacts)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The number of "Other contacts" to include
   * in the response. Valid values are between 1 and 1000, inclusive. Defaults to
   * 100 if not set or set to 0.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * response `next_page_token`. Provide this to retrieve the subsequent page.
   * When paginating, all other parameters provided to `otherContacts.list` must
   * match the first call that provided the page token.
   * @opt_param string readMask Required. A field mask to restrict which fields on
   * each person are returned. Multiple fields can be specified by separating them
   * with commas. What values are valid depend on what ReadSourceType is used. If
   * READ_SOURCE_TYPE_CONTACT is used, valid values are: * emailAddresses *
   * metadata * names * phoneNumbers * photos If READ_SOURCE_TYPE_PROFILE is used,
   * valid values are: * addresses * ageRanges * biographies * birthdays *
   * calendarUrls * clientData * coverPhotos * emailAddresses * events *
   * externalIds * genders * imClients * interests * locales * locations *
   * memberships * metadata * miscKeywords * names * nicknames * occupations *
   * organizations * phoneNumbers * photos * relations * sipAddresses * skills *
   * urls * userDefined
   * @opt_param bool requestSyncToken Optional. Whether the response should return
   * `next_sync_token` on the last page of results. It can be used to get
   * incremental changes since the last request by setting it on the request
   * `sync_token`. More details about sync behavior at `otherContacts.list`.
   * @opt_param string sources Optional. A mask of what source types to return.
   * Defaults to READ_SOURCE_TYPE_CONTACT if not set. Possible values for this
   * field are: * READ_SOURCE_TYPE_CONTACT *
   * READ_SOURCE_TYPE_CONTACT,READ_SOURCE_TYPE_PROFILE Specifying
   * READ_SOURCE_TYPE_PROFILE without specifying READ_SOURCE_TYPE_CONTACT is not
   * permitted.
   * @opt_param string syncToken Optional. A sync token, received from a previous
   * response `next_sync_token` Provide this to retrieve only the resources
   * changed since the last request. When syncing, all other parameters provided
   * to `otherContacts.list` must match the first call that provided the sync
   * token. More details about sync behavior at `otherContacts.list`.
   * @return ListOtherContactsResponse
   */
  public function listOtherContacts($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListOtherContactsResponse::class);
  }
  /**
   * Provides a list of contacts in the authenticated user's other contacts that
   * matches the search query. The query matches on a contact's `names`,
   * `emailAddresses`, and `phoneNumbers` fields that are from the OTHER_CONTACT
   * source. **IMPORTANT**: Before searching, clients should send a warmup request
   * with an empty query to update the cache. See
   * https://developers.google.com/people/v1/other-
   * contacts#search_the_users_other_contacts (otherContacts.search)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The number of results to return. Defaults
   * to 10 if field is not set, or set to 0. Values greater than 30 will be capped
   * to 30.
   * @opt_param string query Required. The plain-text query for the request. The
   * query is used to match prefix phrases of the fields on a person. For example,
   * a person with name "foo name" matches queries such as "f", "fo", "foo", "foo
   * n", "nam", etc., but not "oo n".
   * @opt_param string readMask Required. A field mask to restrict which fields on
   * each person are returned. Multiple fields can be specified by separating them
   * with commas. Valid values are: * emailAddresses * metadata * names *
   * phoneNumbers
   * @return SearchResponse
   */
  public function search($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('search', [$params], SearchResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OtherContacts::class, 'Google_Service_PeopleService_Resource_OtherContacts');
