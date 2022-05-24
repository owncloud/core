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

namespace Google\Service\Analytics\Resource;

use Google\Service\Analytics\Profile;
use Google\Service\Analytics\Profiles;

/**
 * The "profiles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google\Service\Analytics(...);
 *   $profiles = $analyticsService->profiles;
 *  </code>
 */
class ManagementProfiles extends \Google\Service\Resource
{
  /**
   * Deletes a view (profile). (profiles.delete)
   *
   * @param string $accountId Account ID to delete the view (profile) for.
   * @param string $webPropertyId Web property ID to delete the view (profile)
   * for.
   * @param string $profileId ID of the view (profile) to be deleted.
   * @param array $optParams Optional parameters.
   */
  public function delete($accountId, $webPropertyId, $profileId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets a view (profile) to which the user has access. (profiles.get)
   *
   * @param string $accountId Account ID to retrieve the view (profile) for.
   * @param string $webPropertyId Web property ID to retrieve the view (profile)
   * for.
   * @param string $profileId View (Profile) ID to retrieve the view (profile)
   * for.
   * @param array $optParams Optional parameters.
   * @return Profile
   */
  public function get($accountId, $webPropertyId, $profileId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Profile::class);
  }
  /**
   * Create a new view (profile). (profiles.insert)
   *
   * @param string $accountId Account ID to create the view (profile) for.
   * @param string $webPropertyId Web property ID to create the view (profile)
   * for.
   * @param Profile $postBody
   * @param array $optParams Optional parameters.
   * @return Profile
   */
  public function insert($accountId, $webPropertyId, Profile $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Profile::class);
  }
  /**
   * Lists views (profiles) to which the user has access.
   * (profiles.listManagementProfiles)
   *
   * @param string $accountId Account ID for the view (profiles) to retrieve. Can
   * either be a specific account ID or '~all', which refers to all the accounts
   * to which the user has access.
   * @param string $webPropertyId Web property ID for the views (profiles) to
   * retrieve. Can either be a specific web property ID or '~all', which refers to
   * all the web properties to which the user has access.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int max-results The maximum number of views (profiles) to include
   * in this response.
   * @opt_param int start-index An index of the first entity to retrieve. Use this
   * parameter as a pagination mechanism along with the max-results parameter.
   * @return Profiles
   */
  public function listManagementProfiles($accountId, $webPropertyId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], Profiles::class);
  }
  /**
   * Updates an existing view (profile). This method supports patch semantics.
   * (profiles.patch)
   *
   * @param string $accountId Account ID to which the view (profile) belongs
   * @param string $webPropertyId Web property ID to which the view (profile)
   * belongs
   * @param string $profileId ID of the view (profile) to be updated.
   * @param Profile $postBody
   * @param array $optParams Optional parameters.
   * @return Profile
   */
  public function patch($accountId, $webPropertyId, $profileId, Profile $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Profile::class);
  }
  /**
   * Updates an existing view (profile). (profiles.update)
   *
   * @param string $accountId Account ID to which the view (profile) belongs
   * @param string $webPropertyId Web property ID to which the view (profile)
   * belongs
   * @param string $profileId ID of the view (profile) to be updated.
   * @param Profile $postBody
   * @param array $optParams Optional parameters.
   * @return Profile
   */
  public function update($accountId, $webPropertyId, $profileId, Profile $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Profile::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ManagementProfiles::class, 'Google_Service_Analytics_Resource_ManagementProfiles');
