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

use Google\Service\Dfareporting\TargetableRemarketingList;
use Google\Service\Dfareporting\TargetableRemarketingListsListResponse;

/**
 * The "targetableRemarketingLists" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $targetableRemarketingLists = $dfareportingService->targetableRemarketingLists;
 *  </code>
 */
class TargetableRemarketingLists extends \Google\Service\Resource
{
  /**
   * Gets one remarketing list by ID. (targetableRemarketingLists.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Remarketing list ID.
   * @param array $optParams Optional parameters.
   * @return TargetableRemarketingList
   */
  public function get($profileId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], TargetableRemarketingList::class);
  }
  /**
   * Retrieves a list of targetable remarketing lists, possibly filtered. This
   * method supports paging.
   * (targetableRemarketingLists.listTargetableRemarketingLists)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $advertiserId Select only targetable remarketing lists
   * targetable by these advertisers.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool active Select only active or only inactive targetable
   * remarketing lists.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string name Allows searching for objects by name or ID. Wildcards
   * (*) are allowed. For example, "remarketing list*2015" will return objects
   * with names like "remarketing list June 2015", "remarketing list April 2015",
   * or simply "remarketing list 2015". Most of the searches also add wildcards
   * implicitly at the start and the end of the search string. For example, a
   * search string of "remarketing list" will match objects with name "my
   * remarketing list", "remarketing list 2015", or simply "remarketing list".
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string sortField Field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @return TargetableRemarketingListsListResponse
   */
  public function listTargetableRemarketingLists($profileId, $advertiserId, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'advertiserId' => $advertiserId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], TargetableRemarketingListsListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TargetableRemarketingLists::class, 'Google_Service_Dfareporting_Resource_TargetableRemarketingLists');
