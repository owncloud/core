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

use Google\Service\PeopleService\ListConnectionsResponse;

/**
 * The "connections" collection of methods.
 * Typical usage is:
 *  <code>
 *   $peopleService = new Google\Service\PeopleService(...);
 *   $connections = $peopleService->connections;
 *  </code>
 */
class PeopleConnections extends \Google\Service\Resource
{
  /**
   * Provides a list of the authenticated user's contacts. Sync tokens expire 7
   * days after the full sync. A request with an expired sync token will get an
   * error with an [google.rpc.ErrorInfo](https://cloud.google.com/apis/design/err
   * ors#error_info) with reason "EXPIRED_SYNC_TOKEN". In the case of such an
   * error clients should make a full sync request without a `sync_token`. The
   * first page of a full sync request has an additional quota. If the quota is
   * exceeded, a 429 error will be returned. This quota is fixed and can not be
   * increased. When the `sync_token` is specified, resources deleted since the
   * last sync will be returned as a person with `PersonMetadata.deleted` set to
   * true. When the `page_token` or `sync_token` is specified, all other request
   * parameters must match the first call. Writes may have a propagation delay of
   * several minutes for sync requests. Incremental syncs are not intended for
   * read-after-write use cases. See example usage at [List the user's contacts
   * that have
   * changed](/people/v1/contacts#list_the_users_contacts_that_have_changed).
   * (connections.listPeopleConnections)
   *
   * @param string $resourceName Required. The resource name to return connections
   * for. Only `people/me` is valid.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The number of connections to include in the
   * response. Valid values are between 1 and 1000, inclusive. Defaults to 100 if
   * not set or set to 0.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * response `next_page_token`. Provide this to retrieve the subsequent page.
   * When paginating, all other parameters provided to `people.connections.list`
   * must match the first call that provided the page token.
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
   * @opt_param bool requestSyncToken Optional. Whether the response should return
   * `next_sync_token` on the last page of results. It can be used to get
   * incremental changes since the last request by setting it on the request
   * `sync_token`. More details about sync behavior at `people.connections.list`.
   * @opt_param string sortOrder Optional. The order in which the connections
   * should be sorted. Defaults to `LAST_MODIFIED_ASCENDING`.
   * @opt_param string sources Optional. A mask of what source types to return.
   * Defaults to READ_SOURCE_TYPE_CONTACT and READ_SOURCE_TYPE_PROFILE if not set.
   * @opt_param string syncToken Optional. A sync token, received from a previous
   * response `next_sync_token` Provide this to retrieve only the resources
   * changed since the last request. When syncing, all other parameters provided
   * to `people.connections.list` must match the first call that provided the sync
   * token. More details about sync behavior at `people.connections.list`.
   * @return ListConnectionsResponse
   */
  public function listPeopleConnections($resourceName, $optParams = [])
  {
    $params = ['resourceName' => $resourceName];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListConnectionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PeopleConnections::class, 'Google_Service_PeopleService_Resource_PeopleConnections');
