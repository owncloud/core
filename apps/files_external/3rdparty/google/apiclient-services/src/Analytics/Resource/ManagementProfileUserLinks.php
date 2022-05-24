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

use Google\Service\Analytics\EntityUserLink;
use Google\Service\Analytics\EntityUserLinks;

/**
 * The "profileUserLinks" collection of methods.
 * Typical usage is:
 *  <code>
 *   $analyticsService = new Google\Service\Analytics(...);
 *   $profileUserLinks = $analyticsService->profileUserLinks;
 *  </code>
 */
class ManagementProfileUserLinks extends \Google\Service\Resource
{
  /**
   * Removes a user from the given view (profile). (profileUserLinks.delete)
   *
   * @param string $accountId Account ID to delete the user link for.
   * @param string $webPropertyId Web Property ID to delete the user link for.
   * @param string $profileId View (Profile) ID to delete the user link for.
   * @param string $linkId Link ID to delete the user link for.
   * @param array $optParams Optional parameters.
   */
  public function delete($accountId, $webPropertyId, $profileId, $linkId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'linkId' => $linkId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Adds a new user to the given view (profile). (profileUserLinks.insert)
   *
   * @param string $accountId Account ID to create the user link for.
   * @param string $webPropertyId Web Property ID to create the user link for.
   * @param string $profileId View (Profile) ID to create the user link for.
   * @param EntityUserLink $postBody
   * @param array $optParams Optional parameters.
   * @return EntityUserLink
   */
  public function insert($accountId, $webPropertyId, $profileId, EntityUserLink $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], EntityUserLink::class);
  }
  /**
   * Lists profile-user links for a given view (profile).
   * (profileUserLinks.listManagementProfileUserLinks)
   *
   * @param string $accountId Account ID which the given view (profile) belongs
   * to.
   * @param string $webPropertyId Web Property ID which the given view (profile)
   * belongs to. Can either be a specific web property ID or '~all', which refers
   * to all the web properties that user has access to.
   * @param string $profileId View (Profile) ID to retrieve the profile-user links
   * for. Can either be a specific profile ID or '~all', which refers to all the
   * profiles that user has access to.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int max-results The maximum number of profile-user links to
   * include in this response.
   * @opt_param int start-index An index of the first profile-user link to
   * retrieve. Use this parameter as a pagination mechanism along with the max-
   * results parameter.
   * @return EntityUserLinks
   */
  public function listManagementProfileUserLinks($accountId, $webPropertyId, $profileId, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], EntityUserLinks::class);
  }
  /**
   * Updates permissions for an existing user on the given view (profile).
   * (profileUserLinks.update)
   *
   * @param string $accountId Account ID to update the user link for.
   * @param string $webPropertyId Web Property ID to update the user link for.
   * @param string $profileId View (Profile ID) to update the user link for.
   * @param string $linkId Link ID to update the user link for.
   * @param EntityUserLink $postBody
   * @param array $optParams Optional parameters.
   * @return EntityUserLink
   */
  public function update($accountId, $webPropertyId, $profileId, $linkId, EntityUserLink $postBody, $optParams = [])
  {
    $params = ['accountId' => $accountId, 'webPropertyId' => $webPropertyId, 'profileId' => $profileId, 'linkId' => $linkId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], EntityUserLink::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ManagementProfileUserLinks::class, 'Google_Service_Analytics_Resource_ManagementProfileUserLinks');
