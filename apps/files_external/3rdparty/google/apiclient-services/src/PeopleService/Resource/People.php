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

use Google\Service\PeopleService\BatchCreateContactsRequest;
use Google\Service\PeopleService\BatchCreateContactsResponse;
use Google\Service\PeopleService\BatchDeleteContactsRequest;
use Google\Service\PeopleService\BatchUpdateContactsRequest;
use Google\Service\PeopleService\BatchUpdateContactsResponse;
use Google\Service\PeopleService\DeleteContactPhotoResponse;
use Google\Service\PeopleService\GetPeopleResponse;
use Google\Service\PeopleService\ListDirectoryPeopleResponse;
use Google\Service\PeopleService\PeopleEmpty;
use Google\Service\PeopleService\Person;
use Google\Service\PeopleService\SearchDirectoryPeopleResponse;
use Google\Service\PeopleService\SearchResponse;
use Google\Service\PeopleService\UpdateContactPhotoRequest;
use Google\Service\PeopleService\UpdateContactPhotoResponse;

/**
 * The "people" collection of methods.
 * Typical usage is:
 *  <code>
 *   $peopleService = new Google\Service\PeopleService(...);
 *   $people = $peopleService->people;
 *  </code>
 */
class People extends \Google\Service\Resource
{
  /**
   * Create a batch of new contacts and return the PersonResponses for the newly
   * created contacts. Limited to 10 parallel requests per user.
   * (people.batchCreateContacts)
   *
   * @param BatchCreateContactsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchCreateContactsResponse
   */
  public function batchCreateContacts(BatchCreateContactsRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchCreateContacts', [$params], BatchCreateContactsResponse::class);
  }
  /**
   * Delete a batch of contacts. Any non-contact data will not be deleted. Limited
   * to 10 parallel requests per user. (people.batchDeleteContacts)
   *
   * @param BatchDeleteContactsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return PeopleEmpty
   */
  public function batchDeleteContacts(BatchDeleteContactsRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchDeleteContacts', [$params], PeopleEmpty::class);
  }
  /**
   * Update a batch of contacts and return a map of resource names to
   * PersonResponses for the updated contacts. Limited to 10 parallel requests per
   * user. (people.batchUpdateContacts)
   *
   * @param BatchUpdateContactsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchUpdateContactsResponse
   */
  public function batchUpdateContacts(BatchUpdateContactsRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchUpdateContacts', [$params], BatchUpdateContactsResponse::class);
  }
  /**
   * Create a new contact and return the person resource for that contact. The
   * request returns a 400 error if more than one field is specified on a field
   * that is a singleton for contact sources: * biographies * birthdays * genders
   * * names (people.createContact)
   *
   * @param Person $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string personFields Required. A field mask to restrict which
   * fields on each person are returned. Multiple fields can be specified by
   * separating them with commas. Defaults to all fields if not set. Valid values
   * are: * addresses * ageRanges * biographies * birthdays * calendarUrls *
   * clientData * coverPhotos * emailAddresses * events * externalIds * genders *
   * imClients * interests * locales * locations * memberships * metadata *
   * miscKeywords * names * nicknames * occupations * organizations * phoneNumbers
   * * photos * relations * sipAddresses * skills * urls * userDefined
   * @opt_param string sources Optional. A mask of what source types to return.
   * Defaults to READ_SOURCE_TYPE_CONTACT and READ_SOURCE_TYPE_PROFILE if not set.
   * @return Person
   */
  public function createContact(Person $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('createContact', [$params], Person::class);
  }
  /**
   * Delete a contact person. Any non-contact data will not be deleted.
   * (people.deleteContact)
   *
   * @param string $resourceName Required. The resource name of the contact to
   * delete.
   * @param array $optParams Optional parameters.
   * @return PeopleEmpty
   */
  public function deleteContact($resourceName, $optParams = [])
  {
    $params = ['resourceName' => $resourceName];
    $params = array_merge($params, $optParams);
    return $this->call('deleteContact', [$params], PeopleEmpty::class);
  }
  /**
   * Delete a contact's photo. (people.deleteContactPhoto)
   *
   * @param string $resourceName Required. The resource name of the contact whose
   * photo will be deleted.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string personFields Optional. A field mask to restrict which
   * fields on the person are returned. Multiple fields can be specified by
   * separating them with commas. Defaults to empty if not set, which will skip
   * the post mutate get. Valid values are: * addresses * ageRanges * biographies
   * * birthdays * calendarUrls * clientData * coverPhotos * emailAddresses *
   * events * externalIds * genders * imClients * interests * locales * locations
   * * memberships * metadata * miscKeywords * names * nicknames * occupations *
   * organizations * phoneNumbers * photos * relations * sipAddresses * skills *
   * urls * userDefined
   * @opt_param string sources Optional. A mask of what source types to return.
   * Defaults to READ_SOURCE_TYPE_CONTACT and READ_SOURCE_TYPE_PROFILE if not set.
   * @return DeleteContactPhotoResponse
   */
  public function deleteContactPhoto($resourceName, $optParams = [])
  {
    $params = ['resourceName' => $resourceName];
    $params = array_merge($params, $optParams);
    return $this->call('deleteContactPhoto', [$params], DeleteContactPhotoResponse::class);
  }
  /**
   * Provides information about a person by specifying a resource name. Use
   * `people/me` to indicate the authenticated user. The request returns a 400
   * error if 'personFields' is not specified. (people.get)
   *
   * @param string $resourceName Required. The resource name of the person to
   * provide information about. - To get information about the authenticated user,
   * specify `people/me`. - To get information about a google account, specify
   * `people/{account_id}`. - To get information about a contact, specify the
   * resource name that identifies the contact as returned by
   * `people.connections.list`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string personFields Required. A field mask to restrict which
   * fields on the person are returned. Multiple fields can be specified by
   * separating them with commas. Valid values are: * addresses * ageRanges *
   * biographies * birthdays * calendarUrls * clientData * coverPhotos *
   * emailAddresses * events * externalIds * genders * imClients * interests *
   * locales * locations * memberships * metadata * miscKeywords * names *
   * nicknames * occupations * organizations * phoneNumbers * photos * relations *
   * sipAddresses * skills * urls * userDefined
   * @opt_param string requestMask.includeField Required. Comma-separated list of
   * person fields to be included in the response. Each path should start with
   * `person.`: for example, `person.names` or `person.photos`.
   * @opt_param string sources Optional. A mask of what source types to return.
   * Defaults to READ_SOURCE_TYPE_PROFILE and READ_SOURCE_TYPE_CONTACT if not set.
   * @return Person
   */
  public function get($resourceName, $optParams = [])
  {
    $params = ['resourceName' => $resourceName];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Person::class);
  }
  /**
   * Provides information about a list of specific people by specifying a list of
   * requested resource names. Use `people/me` to indicate the authenticated user.
   * The request returns a 400 error if 'personFields' is not specified.
   * (people.getBatchGet)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string personFields Required. A field mask to restrict which
   * fields on each person are returned. Multiple fields can be specified by
   * separating them with commas. Valid values are: * addresses * ageRanges *
   * biographies * birthdays * calendarUrls * clientData * coverPhotos *
   * emailAddresses * events * externalIds * genders * imClients * interests *
   * locales * locations * memberships * metadata * miscKeywords * names *
   * nicknames * occupations * organizations * phoneNumbers * photos * relations *
   * sipAddresses * skills * urls * userDefined
   * @opt_param string requestMask.includeField Required. Comma-separated list of
   * person fields to be included in the response. Each path should start with
   * `person.`: for example, `person.names` or `person.photos`.
   * @opt_param string resourceNames Required. The resource names of the people to
   * provide information about. It's repeatable. The URL query parameter should be
   * resourceNames==&... - To get information about the authenticated user,
   * specify `people/me`. - To get information about a google account, specify
   * `people/{account_id}`. - To get information about a contact, specify the
   * resource name that identifies the contact as returned by
   * `people.connections.list`. There is a maximum of 200 resource names.
   * @opt_param string sources Optional. A mask of what source types to return.
   * Defaults to READ_SOURCE_TYPE_CONTACT and READ_SOURCE_TYPE_PROFILE if not set.
   * @return GetPeopleResponse
   */
  public function getBatchGet($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('getBatchGet', [$params], GetPeopleResponse::class);
  }
  /**
   * Provides a list of domain profiles and domain contacts in the authenticated
   * user's domain directory. When the `sync_token` is specified, resources
   * deleted since the last sync will be returned as a person with
   * `PersonMetadata.deleted` set to true. When the `page_token` or `sync_token`
   * is specified, all other request parameters must match the first call. Writes
   * may have a propagation delay of several minutes for sync requests.
   * Incremental syncs are not intended for read-after-write use cases. See
   * example usage at [List the directory people that have
   * changed](/people/v1/directory#list_the_directory_people_that_have_changed).
   * (people.listDirectoryPeople)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string mergeSources Optional. Additional data to merge into the
   * directory sources if they are connected through verified join keys such as
   * email addresses or phone numbers.
   * @opt_param int pageSize Optional. The number of people to include in the
   * response. Valid values are between 1 and 1000, inclusive. Defaults to 100 if
   * not set or set to 0.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * response `next_page_token`. Provide this to retrieve the subsequent page.
   * When paginating, all other parameters provided to
   * `people.listDirectoryPeople` must match the first call that provided the page
   * token.
   * @opt_param string readMask Required. A field mask to restrict which fields on
   * each person are returned. Multiple fields can be specified by separating them
   * with commas. Valid values are: * addresses * ageRanges * biographies *
   * birthdays * calendarUrls * clientData * coverPhotos * emailAddresses * events
   * * externalIds * genders * imClients * interests * locales * locations *
   * memberships * metadata * miscKeywords * names * nicknames * occupations *
   * organizations * phoneNumbers * photos * relations * sipAddresses * skills *
   * urls * userDefined
   * @opt_param bool requestSyncToken Optional. Whether the response should return
   * `next_sync_token`. It can be used to get incremental changes since the last
   * request by setting it on the request `sync_token`. More details about sync
   * behavior at `people.listDirectoryPeople`.
   * @opt_param string sources Required. Directory sources to return.
   * @opt_param string syncToken Optional. A sync token, received from a previous
   * response `next_sync_token` Provide this to retrieve only the resources
   * changed since the last request. When syncing, all other parameters provided
   * to `people.listDirectoryPeople` must match the first call that provided the
   * sync token. More details about sync behavior at `people.listDirectoryPeople`.
   * @return ListDirectoryPeopleResponse
   */
  public function listDirectoryPeople($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('listDirectoryPeople', [$params], ListDirectoryPeopleResponse::class);
  }
  /**
   * Provides a list of contacts in the authenticated user's grouped contacts that
   * matches the search query. The query matches on a contact's `names`,
   * `nickNames`, `emailAddresses`, `phoneNumbers`, and `organizations` fields
   * that are from the CONTACT source. **IMPORTANT**: Before searching, clients
   * should send a warmup request with an empty query to update the cache. See
   * https://developers.google.com/people/v1/contacts#search_the_users_contacts
   * (people.searchContacts)
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
   * with commas. Valid values are: * addresses * ageRanges * biographies *
   * birthdays * calendarUrls * clientData * coverPhotos * emailAddresses * events
   * * externalIds * genders * imClients * interests * locales * locations *
   * memberships * metadata * miscKeywords * names * nicknames * occupations *
   * organizations * phoneNumbers * photos * relations * sipAddresses * skills *
   * urls * userDefined
   * @opt_param string sources Optional. A mask of what source types to return.
   * Defaults to READ_SOURCE_TYPE_CONTACT if not set.
   * @return SearchResponse
   */
  public function searchContacts($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('searchContacts', [$params], SearchResponse::class);
  }
  /**
   * Provides a list of domain profiles and domain contacts in the authenticated
   * user's domain directory that match the search query.
   * (people.searchDirectoryPeople)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string mergeSources Optional. Additional data to merge into the
   * directory sources if they are connected through verified join keys such as
   * email addresses or phone numbers.
   * @opt_param int pageSize Optional. The number of people to include in the
   * response. Valid values are between 1 and 500, inclusive. Defaults to 100 if
   * not set or set to 0.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * response `next_page_token`. Provide this to retrieve the subsequent page.
   * When paginating, all other parameters provided to `SearchDirectoryPeople`
   * must match the first call that provided the page token.
   * @opt_param string query Required. Prefix query that matches fields in the
   * person. Does NOT use the read_mask for determining what fields to match.
   * @opt_param string readMask Required. A field mask to restrict which fields on
   * each person are returned. Multiple fields can be specified by separating them
   * with commas. Valid values are: * addresses * ageRanges * biographies *
   * birthdays * calendarUrls * clientData * coverPhotos * emailAddresses * events
   * * externalIds * genders * imClients * interests * locales * locations *
   * memberships * metadata * miscKeywords * names * nicknames * occupations *
   * organizations * phoneNumbers * photos * relations * sipAddresses * skills *
   * urls * userDefined
   * @opt_param string sources Required. Directory sources to return.
   * @return SearchDirectoryPeopleResponse
   */
  public function searchDirectoryPeople($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('searchDirectoryPeople', [$params], SearchDirectoryPeopleResponse::class);
  }
  /**
   * Update contact data for an existing contact person. Any non-contact data will
   * not be modified. Any non-contact data in the person to update will be
   * ignored. All fields specified in the `update_mask` will be replaced. The
   * server returns a 400 error if `person.metadata.sources` is not specified for
   * the contact to be updated or if there is no contact source. The server
   * returns a 400 error with reason `"failedPrecondition"` if
   * `person.metadata.sources.etag` is different than the contact's etag, which
   * indicates the contact has changed since its data was read. Clients should get
   * the latest person and merge their updates into the latest person. The server
   * returns a 400 error if `memberships` are being updated and there are no
   * contact group memberships specified on the person. The server returns a 400
   * error if more than one field is specified on a field that is a singleton for
   * contact sources: * biographies * birthdays * genders * names
   * (people.updateContact)
   *
   * @param string $resourceName The resource name for the person, assigned by the
   * server. An ASCII string with a max length of 27 characters, in the form of
   * `people/{person_id}`.
   * @param Person $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string personFields Optional. A field mask to restrict which
   * fields on each person are returned. Multiple fields can be specified by
   * separating them with commas. Defaults to all fields if not set. Valid values
   * are: * addresses * ageRanges * biographies * birthdays * calendarUrls *
   * clientData * coverPhotos * emailAddresses * events * externalIds * genders *
   * imClients * interests * locales * locations * memberships * metadata *
   * miscKeywords * names * nicknames * occupations * organizations * phoneNumbers
   * * photos * relations * sipAddresses * skills * urls * userDefined
   * @opt_param string sources Optional. A mask of what source types to return.
   * Defaults to READ_SOURCE_TYPE_CONTACT and READ_SOURCE_TYPE_PROFILE if not set.
   * @opt_param string updatePersonFields Required. A field mask to restrict which
   * fields on the person are updated. Multiple fields can be specified by
   * separating them with commas. All updated fields will be replaced. Valid
   * values are: * addresses * biographies * birthdays * calendarUrls * clientData
   * * emailAddresses * events * externalIds * genders * imClients * interests *
   * locales * locations * memberships * miscKeywords * names * nicknames *
   * occupations * organizations * phoneNumbers * relations * sipAddresses * urls
   * * userDefined
   * @return Person
   */
  public function updateContact($resourceName, Person $postBody, $optParams = [])
  {
    $params = ['resourceName' => $resourceName, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateContact', [$params], Person::class);
  }
  /**
   * Update a contact's photo. (people.updateContactPhoto)
   *
   * @param string $resourceName Required. Person resource name
   * @param UpdateContactPhotoRequest $postBody
   * @param array $optParams Optional parameters.
   * @return UpdateContactPhotoResponse
   */
  public function updateContactPhoto($resourceName, UpdateContactPhotoRequest $postBody, $optParams = [])
  {
    $params = ['resourceName' => $resourceName, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateContactPhoto', [$params], UpdateContactPhotoResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(People::class, 'Google_Service_PeopleService_Resource_People');
