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

use Google\Service\Dfareporting\Advertiser;
use Google\Service\Dfareporting\AdvertisersListResponse;

/**
 * The "advertisers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $advertisers = $dfareportingService->advertisers;
 *  </code>
 */
class Advertisers extends \Google\Service\Resource
{
  /**
   * Gets one advertiser by ID. (advertisers.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Advertiser ID.
   * @param array $optParams Optional parameters.
   * @return Advertiser
   */
  public function get($profileId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Advertiser::class);
  }
  /**
   * Inserts a new advertiser. (advertisers.insert)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Advertiser $postBody
   * @param array $optParams Optional parameters.
   * @return Advertiser
   */
  public function insert($profileId, Advertiser $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Advertiser::class);
  }
  /**
   * Retrieves a list of advertisers, possibly filtered. This method supports
   * paging. (advertisers.listAdvertisers)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserGroupIds Select only advertisers with these
   * advertiser group IDs.
   * @opt_param string floodlightConfigurationIds Select only advertisers with
   * these floodlight configuration IDs.
   * @opt_param string ids Select only advertisers with these IDs.
   * @opt_param bool includeAdvertisersWithoutGroupsOnly Select only advertisers
   * which do not belong to any advertiser group.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param bool onlyParent Select only advertisers which use another
   * advertiser's floodlight configuration.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string searchString Allows searching for objects by name or ID.
   * Wildcards (*) are allowed. For example, "advertiser*2015" will return objects
   * with names like "advertiser June 2015", "advertiser April 2015", or simply
   * "advertiser 2015". Most of the searches also add wildcards implicitly at the
   * start and the end of the search string. For example, a search string of
   * "advertiser" will match objects with name "my advertiser", "advertiser 2015",
   * or simply "advertiser" .
   * @opt_param string sortField Field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @opt_param string status Select only advertisers with the specified status.
   * @opt_param string subaccountId Select only advertisers with these subaccount
   * IDs.
   * @return AdvertisersListResponse
   */
  public function listAdvertisers($profileId, $optParams = [])
  {
    $params = ['profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], AdvertisersListResponse::class);
  }
  /**
   * Updates an existing advertiser. This method supports patch semantics.
   * (advertisers.patch)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Advertiser ID.
   * @param Advertiser $postBody
   * @param array $optParams Optional parameters.
   * @return Advertiser
   */
  public function patch($profileId, $id, Advertiser $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Advertiser::class);
  }
  /**
   * Updates an existing advertiser. (advertisers.update)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Advertiser $postBody
   * @param array $optParams Optional parameters.
   * @return Advertiser
   */
  public function update($profileId, Advertiser $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Advertiser::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Advertisers::class, 'Google_Service_Dfareporting_Resource_Advertisers');
