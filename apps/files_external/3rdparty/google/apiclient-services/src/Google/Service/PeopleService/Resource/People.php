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
 * The "people" collection of methods.
 * Typical usage is:
 *  <code>
 *   $peopleService = new Google_Service_PeopleService(...);
 *   $people = $peopleService->people;
 *  </code>
 */
class Google_Service_PeopleService_Resource_People extends Google_Service_Resource
{
  /**
   * Create a new contact and return the person resource for that contact.
   * (people.createContact)
   *
   * @param Google_Service_PeopleService_Person $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_PeopleService_Person
   */
  public function createContact(Google_Service_PeopleService_Person $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('createContact', array($params), "Google_Service_PeopleService_Person");
  }
  /**
   * Delete a contact person. Any non-contact data will not be deleted.
   * (people.deleteContact)
   *
   * @param string $resourceName Required. The resource name of the contact to
   * delete.
   * @param array $optParams Optional parameters.
   * @return Google_Service_PeopleService_PeopleEmpty
   */
  public function deleteContact($resourceName, $optParams = array())
  {
    $params = array('resourceName' => $resourceName);
    $params = array_merge($params, $optParams);
    return $this->call('deleteContact', array($params), "Google_Service_PeopleService_PeopleEmpty");
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
   * the post mutate get. Valid values are:
   *
   * * addresses * ageRanges * biographies * birthdays * coverPhotos *
   * emailAddresses * events * genders * imClients * interests * locales *
   * memberships * metadata * names * nicknames * occupations * organizations *
   * phoneNumbers * photos * relations * residences * sipAddresses * skills * urls
   * * userDefined
   * @return Google_Service_PeopleService_DeleteContactPhotoResponse
   */
  public function deleteContactPhoto($resourceName, $optParams = array())
  {
    $params = array('resourceName' => $resourceName);
    $params = array_merge($params, $optParams);
    return $this->call('deleteContactPhoto', array($params), "Google_Service_PeopleService_DeleteContactPhotoResponse");
  }
  /**
   * Provides information about a person by specifying a resource name. Use
   * `people/me` to indicate the authenticated user.
   *
   * The request throws a 400 error if 'personFields' is not specified.
   * (people.get)
   *
   * @param string $resourceName Required. The resource name of the person to
   * provide information about.
   *
   * - To get information about the authenticated user, specify `people/me`. - To
   * get information about a google account, specify  `people/{account_id}`. - To
   * get information about a contact, specify the resource name that   identifies
   * the contact as returned by
   * [`people.connections.list`](/people/api/rest/v1/people.connections/list).
   * @param array $optParams Optional parameters.
   *
   * @opt_param string personFields Required. A field mask to restrict which
   * fields on the person are returned. Multiple fields can be specified by
   * separating them with commas. Valid values are:
   *
   * * addresses * ageRanges * biographies * birthdays * coverPhotos *
   * emailAddresses * events * genders * imClients * interests * locales *
   * memberships * metadata * names * nicknames * occupations * organizations *
   * phoneNumbers * photos * relations * residences * sipAddresses * skills * urls
   * * userDefined
   * @opt_param string requestMask.includeField Required. Comma-separated list of
   * person fields to be included in the response. Each path should start with
   * `person.`: for example, `person.names` or `person.photos`.
   * @return Google_Service_PeopleService_Person
   */
  public function get($resourceName, $optParams = array())
  {
    $params = array('resourceName' => $resourceName);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_PeopleService_Person");
  }
  /**
   * Provides information about a list of specific people by specifying a list of
   * requested resource names. Use `people/me` to indicate the authenticated user.
   *
   * The request throws a 400 error if 'personFields' is not specified.
   * (people.getBatchGet)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string personFields Required. A field mask to restrict which
   * fields on each person are returned. Multiple fields can be specified by
   * separating them with commas. Valid values are:
   *
   * * addresses * ageRanges * biographies * birthdays * coverPhotos *
   * emailAddresses * events * genders * imClients * interests * locales *
   * memberships * metadata * names * nicknames * occupations * organizations *
   * phoneNumbers * photos * relations * residences * sipAddresses * skills * urls
   * * userDefined
   * @opt_param string resourceNames Required. The resource names of the people to
   * provide information about.
   *
   * - To get information about the authenticated user, specify `people/me`. - To
   * get information about a google account, specify   `people/{account_id}`. - To
   * get information about a contact, specify the resource name that   identifies
   * the contact as returned by
   * [`people.connections.list`](/people/api/rest/v1/people.connections/list).
   *
   * You can include up to 50 resource names in one request.
   * @opt_param string requestMask.includeField Required. Comma-separated list of
   * person fields to be included in the response. Each path should start with
   * `person.`: for example, `person.names` or `person.photos`.
   * @return Google_Service_PeopleService_GetPeopleResponse
   */
  public function getBatchGet($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('getBatchGet', array($params), "Google_Service_PeopleService_GetPeopleResponse");
  }
  /**
   * Update contact data for an existing contact person. Any non-contact data will
   * not be modified.
   *
   * The request throws a 400 error if `updatePersonFields` is not specified.
   *
   * The request throws a 400 error if `person.metadata.sources` is not specified
   * for the contact to be updated.
   *
   * The request throws a 400 error with an error with reason
   * `"failedPrecondition"` if `person.metadata.sources.etag` is different than
   * the contact's etag, which indicates the contact has changed since its data
   * was read. Clients should get the latest person and re-apply their updates to
   * the latest person. (people.updateContact)
   *
   * @param string $resourceName The resource name for the person, assigned by the
   * server. An ASCII string with a max length of 27 characters, in the form of
   * `people/{person_id}`.
   * @param Google_Service_PeopleService_Person $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updatePersonFields Required. A field mask to restrict which
   * fields on the person are updated. Multiple fields can be specified by
   * separating them with commas. All updated fields will be replaced. Valid
   * values are:
   *
   * * addresses * biographies * birthdays * emailAddresses * events * genders *
   * imClients * interests * locales * memberships * names * nicknames *
   * occupations * organizations * phoneNumbers * relations * residences *
   * sipAddresses * urls * userDefined
   * @return Google_Service_PeopleService_Person
   */
  public function updateContact($resourceName, Google_Service_PeopleService_Person $postBody, $optParams = array())
  {
    $params = array('resourceName' => $resourceName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateContact', array($params), "Google_Service_PeopleService_Person");
  }
  /**
   * Update a contact's photo. (people.updateContactPhoto)
   *
   * @param string $resourceName Required. Person resource name
   * @param Google_Service_PeopleService_UpdateContactPhotoRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_PeopleService_UpdateContactPhotoResponse
   */
  public function updateContactPhoto($resourceName, Google_Service_PeopleService_UpdateContactPhotoRequest $postBody, $optParams = array())
  {
    $params = array('resourceName' => $resourceName, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('updateContactPhoto', array($params), "Google_Service_PeopleService_UpdateContactPhotoResponse");
  }
}
