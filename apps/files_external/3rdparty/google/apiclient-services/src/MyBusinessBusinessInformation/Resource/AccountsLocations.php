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

namespace Google\Service\MyBusinessBusinessInformation\Resource;

use Google\Service\MyBusinessBusinessInformation\ListLocationsResponse;
use Google\Service\MyBusinessBusinessInformation\Location;

/**
 * The "locations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $mybusinessbusinessinformationService = new Google\Service\MyBusinessBusinessInformation(...);
 *   $locations = $mybusinessbusinessinformationService->locations;
 *  </code>
 */
class AccountsLocations extends \Google\Service\Resource
{
  /**
   * Creates a new Location that will be owned by the logged in user.
   * (locations.create)
   *
   * @param string $parent Required. The name of the account in which to create
   * this location.
   * @param Location $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId Optional. A unique request ID for the server to
   * detect duplicated requests. We recommend using UUIDs. Max length is 50
   * characters.
   * @opt_param bool validateOnly Optional. If true, the request is validated
   * without actually creating the location.
   * @return Location
   */
  public function create($parent, Location $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Location::class);
  }
  /**
   * Lists the locations for the specified account.
   * (locations.listAccountsLocations)
   *
   * @param string $parent Required. The name of the account to fetch locations
   * from. If the parent Account is of AccountType PERSONAL, only Locations that
   * are directly owned by the Account are returned, otherwise it will return all
   * accessible locations from the Account, either directly or indirectly.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. A filter constraining the locations to
   * return. The response includes only entries that match the filter. If `filter`
   * is empty, then constraints are applied and all locations (paginated) are
   * retrieved for the requested account. For more information about valid fields
   * and example usage, see [Work with Location Data
   * Guide](https://developers.google.com/my-business/content/location-
   * data#filter_results_when_you_list_locations).
   * @opt_param string orderBy Optional. Sorting order for the request. Multiple
   * fields should be comma-separated, following SQL syntax. The default sorting
   * order is ascending. To specify descending order, a suffix " desc" should be
   * added. Valid fields to order_by are title and store_code. For example:
   * "title, store_code desc" or "title" or "store_code desc"
   * @opt_param int pageSize Optional. How many locations to fetch per page.
   * Default value is 10 if not set. Minimum is 1, and maximum page size is 100.
   * @opt_param string pageToken Optional. If specified, it fetches the next
   * `page` of locations. The page token is returned by previous calls to
   * `ListLocations` when there were more locations than could fit in the
   * requested page size.
   * @opt_param string readMask Required. Read mask to specify what fields will be
   * returned in the response.
   * @return ListLocationsResponse
   */
  public function listAccountsLocations($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListLocationsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsLocations::class, 'Google_Service_MyBusinessBusinessInformation_Resource_AccountsLocations');
