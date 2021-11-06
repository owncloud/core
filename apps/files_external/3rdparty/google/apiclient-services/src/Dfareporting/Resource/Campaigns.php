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

use Google\Service\Dfareporting\Campaign;
use Google\Service\Dfareporting\CampaignsListResponse;

/**
 * The "campaigns" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $campaigns = $dfareportingService->campaigns;
 *  </code>
 */
class Campaigns extends \Google\Service\Resource
{
  /**
   * Gets one campaign by ID. (campaigns.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Campaign ID.
   * @param array $optParams Optional parameters.
   * @return Campaign
   */
  public function get($profileId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Campaign::class);
  }
  /**
   * Inserts a new campaign. (campaigns.insert)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Campaign $postBody
   * @param array $optParams Optional parameters.
   * @return Campaign
   */
  public function insert($profileId, Campaign $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Campaign::class);
  }
  /**
   * Retrieves a list of campaigns, possibly filtered. This method supports
   * paging. (campaigns.listCampaigns)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string advertiserGroupIds Select only campaigns whose advertisers
   * belong to these advertiser groups.
   * @opt_param string advertiserIds Select only campaigns that belong to these
   * advertisers.
   * @opt_param bool archived Select only archived campaigns. Don't set this field
   * to select both archived and non-archived campaigns.
   * @opt_param bool atLeastOneOptimizationActivity Select only campaigns that
   * have at least one optimization activity.
   * @opt_param string excludedIds Exclude campaigns with these IDs.
   * @opt_param string ids Select only campaigns with these IDs.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string overriddenEventTagId Select only campaigns that have
   * overridden this event tag ID.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string searchString Allows searching for campaigns by name or ID.
   * Wildcards (*) are allowed. For example, "campaign*2015" will return campaigns
   * with names like "campaign June 2015", "campaign April 2015", or simply
   * "campaign 2015". Most of the searches also add wildcards implicitly at the
   * start and the end of the search string. For example, a search string of
   * "campaign" will match campaigns with name "my campaign", "campaign 2015", or
   * simply "campaign".
   * @opt_param string sortField Field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @opt_param string subaccountId Select only campaigns that belong to this
   * subaccount.
   * @return CampaignsListResponse
   */
  public function listCampaigns($profileId, $optParams = [])
  {
    $params = ['profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], CampaignsListResponse::class);
  }
  /**
   * Updates an existing campaign. This method supports patch semantics.
   * (campaigns.patch)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Campaign ID.
   * @param Campaign $postBody
   * @param array $optParams Optional parameters.
   * @return Campaign
   */
  public function patch($profileId, $id, Campaign $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Campaign::class);
  }
  /**
   * Updates an existing campaign. (campaigns.update)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param Campaign $postBody
   * @param array $optParams Optional parameters.
   * @return Campaign
   */
  public function update($profileId, Campaign $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Campaign::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Campaigns::class, 'Google_Service_Dfareporting_Resource_Campaigns');
