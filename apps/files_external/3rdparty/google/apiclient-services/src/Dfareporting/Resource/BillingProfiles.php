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

use Google\Service\Dfareporting\BillingProfile;
use Google\Service\Dfareporting\BillingProfilesListResponse;

/**
 * The "billingProfiles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $billingProfiles = $dfareportingService->billingProfiles;
 *  </code>
 */
class BillingProfiles extends \Google\Service\Resource
{
  /**
   * Gets one billing profile by ID. (billingProfiles.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Billing Profile ID.
   * @param array $optParams Optional parameters.
   * @return BillingProfile
   */
  public function get($profileId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], BillingProfile::class);
  }
  /**
   * Retrieves a list of billing profiles, possibly filtered. This method supports
   * paging. (billingProfiles.listBillingProfiles)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string currency_code Select only billing profile with currency.
   * @opt_param string ids Select only billing profile with these IDs.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string name Allows searching for billing profiles by name.
   * Wildcards (*) are allowed. For example, "profile*2020" will return objects
   * with names like "profile June 2020", "profile April 2020", or simply "profile
   * 2020". Most of the searches also add wildcards implicitly at the start and
   * the end of the search string. For example, a search string of "profile" will
   * match objects with name "my profile", "profile 2021", or simply "profile".
   * @opt_param bool onlySuggestion Select only billing profile which is suggested
   * for the currency_code & subaccount_id using the Billing Suggestion API.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string sortField Field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @opt_param string status Select only billing profile with the specified
   * status.
   * @opt_param string subaccountIds Select only billing profile with the
   * specified subaccount.When only_suggestion is true, only a single
   * subaccount_id is supported.
   * @return BillingProfilesListResponse
   */
  public function listBillingProfiles($profileId, $optParams = [])
  {
    $params = ['profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], BillingProfilesListResponse::class);
  }
  /**
   * Updates an existing billing profile. (billingProfiles.update)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param BillingProfile $postBody
   * @param array $optParams Optional parameters.
   * @return BillingProfile
   */
  public function update($profileId, BillingProfile $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], BillingProfile::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BillingProfiles::class, 'Google_Service_Dfareporting_Resource_BillingProfiles');
