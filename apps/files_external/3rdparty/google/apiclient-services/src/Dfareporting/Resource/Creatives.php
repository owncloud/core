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

use Google\Service\Dfareporting\Creative;
use Google\Service\Dfareporting\CreativesListResponse;

/**
 * The "creatives" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $creatives = $dfareportingService->creatives;
 *  </code>
 */
class Creatives extends \Google\Service\Resource
{
  /**
   * Gets one creative by ID. (creatives.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Creative ID.
   * @param array $optParams Optional parameters.
   * @return Creative
   */
  public function get($profileId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Creative::class);
  }
  /**
   * Inserts a new creative. (creatives.insert)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Creative $postBody
   * @param array $optParams Optional parameters.
   * @return Creative
   */
  public function insert($profileId, Creative $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Creative::class);
  }
  /**
   * Retrieves a list of creatives, possibly filtered. This method supports
   * paging. (creatives.listCreatives)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool active Select only active creatives. Leave blank to select
   * active and inactive creatives.
   * @opt_param string advertiserId Select only creatives with this advertiser ID.
   * @opt_param bool archived Select only archived creatives. Leave blank to
   * select archived and unarchived creatives.
   * @opt_param string campaignId Select only creatives with this campaign ID.
   * @opt_param string companionCreativeIds Select only in-stream video creatives
   * with these companion IDs.
   * @opt_param string creativeFieldIds Select only creatives with these creative
   * field IDs.
   * @opt_param string ids Select only creatives with these IDs.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string renderingIds Select only creatives with these rendering
   * IDs.
   * @opt_param string searchString Allows searching for objects by name or ID.
   * Wildcards (*) are allowed. For example, "creative*2015" will return objects
   * with names like "creative June 2015", "creative April 2015", or simply
   * "creative 2015". Most of the searches also add wildcards implicitly at the
   * start and the end of the search string. For example, a search string of
   * "creative" will match objects with name "my creative", "creative 2015", or
   * simply "creative".
   * @opt_param string sizeIds Select only creatives with these size IDs.
   * @opt_param string sortField Field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @opt_param string studioCreativeId Select only creatives corresponding to
   * this Studio creative ID.
   * @opt_param string types Select only creatives with these creative types.
   * @return CreativesListResponse
   */
  public function listCreatives($profileId, $optParams = [])
  {
    $params = ['profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], CreativesListResponse::class);
  }
  /**
   * Updates an existing creative. This method supports patch semantics.
   * (creatives.patch)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Creative ID.
   * @param Creative $postBody
   * @param array $optParams Optional parameters.
   * @return Creative
   */
  public function patch($profileId, $id, Creative $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Creative::class);
  }
  /**
   * Updates an existing creative. (creatives.update)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Creative $postBody
   * @param array $optParams Optional parameters.
   * @return Creative
   */
  public function update($profileId, Creative $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Creative::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Creatives::class, 'Google_Service_Dfareporting_Resource_Creatives');
