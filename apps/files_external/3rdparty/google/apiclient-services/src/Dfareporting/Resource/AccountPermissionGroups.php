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

use Google\Service\Dfareporting\AccountPermissionGroup;
use Google\Service\Dfareporting\AccountPermissionGroupsListResponse;

/**
 * The "accountPermissionGroups" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $accountPermissionGroups = $dfareportingService->accountPermissionGroups;
 *  </code>
 */
class AccountPermissionGroups extends \Google\Service\Resource
{
  /**
   * Gets one account permission group by ID. (accountPermissionGroups.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id Account permission group ID.
   * @param array $optParams Optional parameters.
   * @return AccountPermissionGroup
   */
  public function get($profileId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], AccountPermissionGroup::class);
  }
  /**
   * Retrieves the list of account permission groups.
   * (accountPermissionGroups.listAccountPermissionGroups)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   * @return AccountPermissionGroupsListResponse
   */
  public function listAccountPermissionGroups($profileId, $optParams = [])
  {
    $params = ['profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], AccountPermissionGroupsListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountPermissionGroups::class, 'Google_Service_Dfareporting_Resource_AccountPermissionGroups');
