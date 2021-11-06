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

use Google\Service\Dfareporting\MobileApp;
use Google\Service\Dfareporting\MobileAppsListResponse;

/**
 * The "mobileApps" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $mobileApps = $dfareportingService->mobileApps;
 *  </code>
 */
class MobileApps extends \Google\Service\Resource
{
  /**
   * Gets one mobile app by ID. (mobileApps.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Mobile app ID.
   * @param array $optParams Optional parameters.
   * @return MobileApp
   */
  public function get($profileId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], MobileApp::class);
  }
  /**
   * Retrieves list of available mobile apps. (mobileApps.listMobileApps)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string directories Select only apps from these directories.
   * @opt_param string ids Select only apps with these IDs.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string searchString Allows searching for objects by name or ID.
   * Wildcards (*) are allowed. For example, "app*2015" will return objects with
   * names like "app Jan 2018", "app Jan 2018", or simply "app 2018". Most of the
   * searches also add wildcards implicitly at the start and the end of the search
   * string. For example, a search string of "app" will match objects with name
   * "my app", "app 2018", or simply "app".
   * @return MobileAppsListResponse
   */
  public function listMobileApps($profileId, $optParams = [])
  {
    $params = ['profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], MobileAppsListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MobileApps::class, 'Google_Service_Dfareporting_Resource_MobileApps');
