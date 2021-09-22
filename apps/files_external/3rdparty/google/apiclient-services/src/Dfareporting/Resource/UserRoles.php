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

use Google\Service\Dfareporting\UserRole;
use Google\Service\Dfareporting\UserRolesListResponse;

/**
 * The "userRoles" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dfareportingService = new Google\Service\Dfareporting(...);
 *   $userRoles = $dfareportingService->userRoles;
 *  </code>
 */
class UserRoles extends \Google\Service\Resource
{
  /**
   * Deletes an existing user role. (userRoles.delete)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id User role ID.
   * @param array $optParams Optional parameters.
   */
  public function delete($profileId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets one user role by ID. (userRoles.get)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id User role ID.
   * @param array $optParams Optional parameters.
   * @return UserRole
   */
  public function get($profileId, $id, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], UserRole::class);
  }
  /**
   * Inserts a new user role. (userRoles.insert)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param UserRole $postBody
   * @param array $optParams Optional parameters.
   * @return UserRole
   */
  public function insert($profileId, UserRole $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], UserRole::class);
  }
  /**
   * Retrieves a list of user roles, possibly filtered. This method supports
   * paging. (userRoles.listUserRoles)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool accountUserRoleOnly Select only account level user roles not
   * associated with any specific subaccount.
   * @opt_param string ids Select only user roles with the specified IDs.
   * @opt_param int maxResults Maximum number of results to return.
   * @opt_param string pageToken Value of the nextPageToken from the previous
   * result page.
   * @opt_param string searchString Allows searching for objects by name or ID.
   * Wildcards (*) are allowed. For example, "userrole*2015" will return objects
   * with names like "userrole June 2015", "userrole April 2015", or simply
   * "userrole 2015". Most of the searches also add wildcards implicitly at the
   * start and the end of the search string. For example, a search string of
   * "userrole" will match objects with name "my userrole", "userrole 2015", or
   * simply "userrole".
   * @opt_param string sortField Field by which to sort the list.
   * @opt_param string sortOrder Order of sorted results.
   * @opt_param string subaccountId Select only user roles that belong to this
   * subaccount.
   * @return UserRolesListResponse
   */
  public function listUserRoles($profileId, $optParams = [])
  {
    $params = ['profileId' => $profileId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], UserRolesListResponse::class);
  }
  /**
   * Updates an existing user role. This method supports patch semantics.
   * (userRoles.patch)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param string $id UserRole ID.
   * @param UserRole $postBody
   * @param array $optParams Optional parameters.
   * @return UserRole
   */
  public function patch($profileId, $id, UserRole $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], UserRole::class);
  }
  /**
   * Updates an existing user role. (userRoles.update)
   *
   * @param string $profileId User profile ID associated with this request.
   * @param UserRole $postBody
   * @param array $optParams Optional parameters.
   * @return UserRole
   */
  public function update($profileId, UserRole $postBody, $optParams = [])
  {
    $params = ['profileId' => $profileId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], UserRole::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UserRoles::class, 'Google_Service_Dfareporting_Resource_UserRoles');
