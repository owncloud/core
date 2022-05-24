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

use Google\Service\Dfareporting\AccountUserProfile;
use Google\Service\Dfareporting\AccountUserProfilesListResponse;

/**
 * The "accountUserProfiles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $accountUserProfiles = $dfareportingService->accountUserProfiles;
 *  </code>
 */
class AccountUserProfiles extends \Google\Service\Resource
{
  /**
   * Gets one account user profile by ID. (accountUserProfiles.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id User profile ID.
   * @param array $optParams Optional parameters.
   * @return AccountUserProfile
   */
  public function get($profileId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], AccountUserProfile::class);
  }
  /**
   * Inserts a new account user profile. (accountUserProfiles.insert)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param AccountUserProfile $postBody
   * @param array $optParams Optional parameters.
   * @return AccountUserProfile
   */
  public function insert($profileId, AccountUserProfile $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], AccountUserProfile::class);
  }
  /**
   * Retrieves a list of account user profiles, possibly filtered. This method
   * supports paging. (accountUserProfiles.listAccountUserProfiles)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool active Select only active user profiles.
   * @opt_param string ids Select only user profiles with these IDs.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string searchString Allows searching for objects by name, ID or
   * email. Wildcards (*) are allowed. For example, "user profile*2015" will
   * return objects with names like "user profile June 2015", "user profile April
   * 2015", or simply "user profile 2015". Most of the searches also add wildcards
   * implicitly at the start and the end of the search string. For example, a
   * search string of "user profile" will match objects with name "my user
   * profile", "user profile 2015", or simply "user profile".
   * @opt_param string sortField Field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @opt_param string subaccountId Select only user profiles with the specified
   * subaccount ID.
   * @opt_param string userRoleId Select only user profiles with the specified
   * user role ID.
   * @return AccountUserProfilesListResponse
   */
  public function listAccountUserProfiles($profileId, $optParams = [])
  {
    $params = ['profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], AccountUserProfilesListResponse::class);
  }
  /**
   * Updates an existing account user profile. This method supports patch
   * semantics. (accountUserProfiles.patch)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id AccountUserProfile ID.
   * @param AccountUserProfile $postBody
   * @param array $optParams Optional parameters.
   * @return AccountUserProfile
   */
  public function patch($profileId, $id, AccountUserProfile $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], AccountUserProfile::class);
  }
  /**
   * Updates an existing account user profile. (accountUserProfiles.update)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param AccountUserProfile $postBody
   * @param array $optParams Optional parameters.
   * @return AccountUserProfile
   */
  public function update($profileId, AccountUserProfile $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], AccountUserProfile::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountUserProfiles::class, 'Google_Service_Dfareporting_Resource_AccountUserProfiles');
