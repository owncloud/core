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

use Google\Service\Dfareporting\CreativeGroup;
use Google\Service\Dfareporting\CreativeGroupsListResponse;

/**
 * The "creativeGroups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $creativeGroups = $dfareportingService->creativeGroups;
 *  </code>
 */
class CreativeGroups extends \Google\Service\Resource
{
  /**
   * Gets one creative group by ID. (creativeGroups.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Creative group ID.
   * @param array $optParams Optional parameters.
   * @return CreativeGroup
   */
  public function get($profileId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], CreativeGroup::class);
  }
  /**
   * Inserts a new creative group. (creativeGroups.insert)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param CreativeGroup $postBody
   * @param array $optParams Optional parameters.
   * @return CreativeGroup
   */
  public function insert($profileId, CreativeGroup $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], CreativeGroup::class);
  }
  /**
   * Retrieves a list of creative groups, possibly filtered. This method supports
   * paging. (creativeGroups.listCreativeGroups)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserIds Select only creative groups that belong to
   * these advertisers.
   * @opt_param int groupNumber Select only creative groups that belong to this
   * subgroup.
   * @opt_param string ids Select only creative groups with these IDs.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string searchString Allows searching for creative groups by name
   * or ID. Wildcards (*) are allowed. For example, "creativegroup*2015" will
   * return creative groups with names like "creativegroup June 2015",
   * "creativegroup April 2015", or simply "creativegroup 2015". Most of the
   * searches also add wild-cards implicitly at the start and the end of the
   * search string. For example, a search string of "creativegroup" will match
   * creative groups with the name "my creativegroup", "creativegroup 2015", or
   * simply "creativegroup".
   * @opt_param string sortField Field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @return CreativeGroupsListResponse
   */
  public function listCreativeGroups($profileId, $optParams = [])
  {
    $params = ['profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], CreativeGroupsListResponse::class);
  }
  /**
   * Updates an existing creative group. This method supports patch semantics.
   * (creativeGroups.patch)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id CreativeGroup ID.
   * @param CreativeGroup $postBody
   * @param array $optParams Optional parameters.
   * @return CreativeGroup
   */
  public function patch($profileId, $id, CreativeGroup $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], CreativeGroup::class);
  }
  /**
   * Updates an existing creative group. (creativeGroups.update)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param CreativeGroup $postBody
   * @param array $optParams Optional parameters.
   * @return CreativeGroup
   */
  public function update($profileId, CreativeGroup $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], CreativeGroup::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CreativeGroups::class, 'Google_Service_Dfareporting_Resource_CreativeGroups');
