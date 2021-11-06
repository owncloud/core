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

use Google\Service\Dfareporting\UserProfile;
use Google\Service\Dfareporting\UserProfileList;

/**
 * The "userProfiles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $userProfiles = $dfareportingService->userProfiles;
 *  </code>
 */
class UserProfiles extends \Google\Service\Resource
{
  /**
   * Gets one user profile by ID. (userProfiles.get)
   *
   * @param string $profileId The user profile ID.
   * @param array $optParams Optional parameters.
   * @return UserProfile
   */
  public function get($profileId, $optParams = [])
  {
    $params = ['profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], UserProfile::class);
  }
  /**
   * Retrieves list of user profiles for a user. (userProfiles.listUserProfiles)
   *
   * @param array $optParams Optional parameters.
   * @return UserProfileList
   */
  public function listUserProfiles($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], UserProfileList::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UserProfiles::class, 'Google_Service_Dfareporting_Resource_UserProfiles');
