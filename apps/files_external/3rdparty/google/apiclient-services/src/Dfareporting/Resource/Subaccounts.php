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

namespace Google\Service\Dfareporting\Resource;

use Google\Service\Dfareporting\Subaccount;
use Google\Service\Dfareporting\SubaccountsListResponse;

/**
 * The "subaccounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $subaccounts = $dfareportingService->subaccounts;
 *  </code>
 */
class Subaccounts extends \Google\Service\Resource
{
  /**
   * Gets one subaccount by ID. (subaccounts.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Subaccount ID.
   * @param array $optParams Optional parameters.
   * @return Subaccount
   */
  public function get($profileId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Subaccount::class);
  }
  /**
   * Inserts a new subaccount. (subaccounts.insert)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Subaccount $postBody
   * @param array $optParams Optional parameters.
   * @return Subaccount
   */
  public function insert($profileId, Subaccount $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Subaccount::class);
  }
  /**
   * Gets a list of subaccounts, possibly filtered. This method supports paging.
   * (subaccounts.listSubaccounts)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string ids Select only subaccounts with these IDs.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string searchString Allows searching for objects by name or ID.
   * Wildcards (*) are allowed. For example, "subaccount*2015" will return objects
   * with names like "subaccount June 2015", "subaccount April 2015", or simply
   * "subaccount 2015". Most of the searches also add wildcards implicitly at the
   * start and the end of the search string. For example, a search string of
   * "subaccount" will match objects with name "my subaccount", "subaccount 2015",
   * or simply "subaccount" .
   * @opt_param string sortField Field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @return SubaccountsListResponse
   */
  public function listSubaccounts($profileId, $optParams = [])
  {
    $params = ['profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], SubaccountsListResponse::class);
  }
  /**
   * Updates an existing subaccount. This method supports patch semantics.
   * (subaccounts.patch)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Subaccount ID.
   * @param Subaccount $postBody
   * @param array $optParams Optional parameters.
   * @return Subaccount
   */
  public function patch($profileId, $id, Subaccount $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Subaccount::class);
  }
  /**
   * Updates an existing subaccount. (subaccounts.update)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Subaccount $postBody
   * @param array $optParams Optional parameters.
   * @return Subaccount
   */
  public function update($profileId, Subaccount $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Subaccount::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Subaccounts::class, 'Google_Service_Dfareporting_Resource_Subaccounts');
