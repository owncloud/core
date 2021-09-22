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

use Google\Service\Dfareporting\FloodlightActivityGroup;
use Google\Service\Dfareporting\FloodlightActivityGroupsListResponse;

/**
 * The "floodlightActivityGroups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $floodlightActivityGroups = $dfareportingService->floodlightActivityGroups;
 *  </code>
 */
class FloodlightActivityGroups extends \Google\Service\Resource
{
  /**
   * Gets one floodlight activity group by ID. (floodlightActivityGroups.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Floodlight activity Group ID.
   * @param array $optParams Optional parameters.
   * @return FloodlightActivityGroup
   */
  public function get($profileId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], FloodlightActivityGroup::class);
  }
  /**
   * Inserts a new floodlight activity group. (floodlightActivityGroups.insert)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param FloodlightActivityGroup $postBody
   * @param array $optParams Optional parameters.
   * @return FloodlightActivityGroup
   */
  public function insert($profileId, FloodlightActivityGroup $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], FloodlightActivityGroup::class);
  }
  /**
   * Retrieves a list of floodlight activity groups, possibly filtered. This
   * method supports paging.
   * (floodlightActivityGroups.listFloodlightActivityGroups)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserId Select only floodlight activity groups with
   * the specified advertiser ID. Must specify either advertiserId or
   * floodlightConfigurationId for a non-empty result.
   * @opt_param string floodlightConfigurationId Select only floodlight activity
   * groups with the specified floodlight configuration ID. Must specify either
   * advertiserId, or floodlightConfigurationId for a non-empty result.
   * @opt_param string ids Select only floodlight activity groups with the
   * specified IDs. Must specify either advertiserId or floodlightConfigurationId
   * for a non-empty result.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string searchString Allows searching for objects by name or ID.
   * Wildcards (*) are allowed. For example, "floodlightactivitygroup*2015" will
   * return objects with names like "floodlightactivitygroup June 2015",
   * "floodlightactivitygroup April 2015", or simply "floodlightactivitygroup
   * 2015". Most of the searches also add wildcards implicitly at the start and
   * the end of the search string. For example, a search string of
   * "floodlightactivitygroup" will match objects with name "my
   * floodlightactivitygroup activity", "floodlightactivitygroup 2015", or simply
   * "floodlightactivitygroup".
   * @opt_param string sortField Field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @opt_param string type Select only floodlight activity groups with the
   * specified floodlight activity group type.
   * @return FloodlightActivityGroupsListResponse
   */
  public function listFloodlightActivityGroups($profileId, $optParams = [])
  {
    $params = ['profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], FloodlightActivityGroupsListResponse::class);
  }
  /**
   * Updates an existing floodlight activity group. This method supports patch
   * semantics. (floodlightActivityGroups.patch)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id FloodlightActivityGroup ID.
   * @param FloodlightActivityGroup $postBody
   * @param array $optParams Optional parameters.
   * @return FloodlightActivityGroup
   */
  public function patch($profileId, $id, FloodlightActivityGroup $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], FloodlightActivityGroup::class);
  }
  /**
   * Updates an existing floodlight activity group.
   * (floodlightActivityGroups.update)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param FloodlightActivityGroup $postBody
   * @param array $optParams Optional parameters.
   * @return FloodlightActivityGroup
   */
  public function update($profileId, FloodlightActivityGroup $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], FloodlightActivityGroup::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FloodlightActivityGroups::class, 'Google_Service_Dfareporting_Resource_FloodlightActivityGroups');
