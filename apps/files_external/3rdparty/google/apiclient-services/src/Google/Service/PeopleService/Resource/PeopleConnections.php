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
 * The "connections" collection of methods.
 * Typical usage is:
 *  <code>
 *   $peopleService = new Google_Service_PeopleService(...);
 *   $connections = $peopleService->connections;
 *  </code>
 */
class Google_Service_PeopleService_Resource_PeopleConnections extends Google_Service_Resource
{
  /**
   * Provides a list of the authenticated user's contacts.
   *
   * The request throws a 400 error if 'personFields' is not specified.
   * (connections.listPeopleConnections)
   *
   * @param string $resourceName Required. The resource name to return connections
   * for. Only `people/me` is valid.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The number of connections to include in the
   * response. Valid values are between 1 and 1000, inclusive. Defaults to 100 if
   * not set or set to 0.
   * @opt_param string sortOrder Optional. The order in which the connections
   * should be sorted. Defaults to `LAST_MODIFIED_ASCENDING`.
   * @opt_param string personFields Required. A field mask to restrict which
   * fields on each person are returned. Multiple fields can be specified by
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
   * @opt_param bool requestSyncToken Optional. Whether the response should
   * include `next_sync_token`, which can be used to get all changes since the
   * last request. For subsequent sync requests use the `sync_token` param
   * instead. Initial sync requests that specify `request_sync_token` have an
   * additional rate limit.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * `ListConnections` call. Provide this to retrieve the subsequent page.
   *
   * When paginating, all other parameters provided to `ListConnections` must
   * match the call that provided the page token.
   * @opt_param string syncToken Optional. A sync token, received from a previous
   * `ListConnections` call. Provide this to retrieve only the resources changed
   * since the last request. Sync requests that specify `sync_token` have an
   * additional rate limit.
   *
   * When syncing, all other parameters provided to `ListConnections` must match
   * the call that provided the sync token.
   * @return Google_Service_PeopleService_ListConnectionsResponse
   */
  public function listPeopleConnections($resourceName, $optParams = array())
  {
    $params = array('resourceName' => $resourceName);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_PeopleService_ListConnectionsResponse");
  }
}
