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

namespace Google\Service\AndroidEnterprise\Resource;

use Google\Service\AndroidEnterprise\AuthenticationToken;
use Google\Service\AndroidEnterprise\ProductSet;
use Google\Service\AndroidEnterprise\User;
use Google\Service\AndroidEnterprise\UsersListResponse;

/**
 * The "users" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidenterpriseService = new Google\Service\AndroidEnterprise(...);
 *   $users = $androidenterpriseService->users;
 *  </code>
 */
class Users extends \Google\Service\Resource
{
  /**
   * Deleted an EMM-managed user. (users.delete)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $userId The ID of the user.
   * @param array $optParams Optional parameters.
   */
  public function delete($enterpriseId, $userId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'userId' => $userId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Generates an authentication token which the device policy client can use to
   * provision the given EMM-managed user account on a device. The generated token
   * is single-use and expires after a few minutes. You can provision a maximum of
   * 10 devices per user. This call only works with EMM-managed accounts.
   * (users.generateAuthenticationToken)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $userId The ID of the user.
   * @param array $optParams Optional parameters.
   * @return AuthenticationToken
   */
  public function generateAuthenticationToken($enterpriseId, $userId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'userId' => $userId];
    $params = array_merge($params, $optParams);
    return $this->call('generateAuthenticationToken', [$params], AuthenticationToken::class);
  }
  /**
   * Retrieves a user's details. (users.get)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $userId The ID of the user.
   * @param array $optParams Optional parameters.
   * @return User
   */
  public function get($enterpriseId, $userId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'userId' => $userId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], User::class);
  }
  /**
   * Retrieves the set of products a user is entitled to access. **Note:** This
   * item has been deprecated. New integrations cannot use this method and can
   * refer to our new recommendations. (users.getAvailableProductSet)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $userId The ID of the user.
   * @param array $optParams Optional parameters.
   * @return ProductSet
   */
  public function getAvailableProductSet($enterpriseId, $userId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'userId' => $userId];
    $params = array_merge($params, $optParams);
    return $this->call('getAvailableProductSet', [$params], ProductSet::class);
  }
  /**
   * Creates a new EMM-managed user. The Users resource passed in the body of the
   * request should include an accountIdentifier and an accountType. If a
   * corresponding user already exists with the same account identifier, the user
   * will be updated with the resource. In this case only the displayName field
   * can be changed. (users.insert)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param User $postBody
   * @param array $optParams Optional parameters.
   * @return User
   */
  public function insert($enterpriseId, User $postBody, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], User::class);
  }
  /**
   * Looks up a user by primary email address. This is only supported for Google-
   * managed users. Lookup of the id is not needed for EMM-managed users because
   * the id is already returned in the result of the Users.insert call.
   * (users.listUsers)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $email Required. The exact primary email address of the user to
   * look up.
   * @param array $optParams Optional parameters.
   * @return UsersListResponse
   */
  public function listUsers($enterpriseId, $email, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'email' => $email];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], UsersListResponse::class);
  }
  /**
   * Revokes access to all devices currently provisioned to the user. The user
   * will no longer be able to use the managed Play store on any of their managed
   * devices. This call only works with EMM-managed accounts.
   * (users.revokeDeviceAccess)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $userId The ID of the user.
   * @param array $optParams Optional parameters.
   */
  public function revokeDeviceAccess($enterpriseId, $userId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'userId' => $userId];
    $params = array_merge($params, $optParams);
    return $this->call('revokeDeviceAccess', [$params]);
  }
  /**
   * Modifies the set of products that a user is entitled to access (referred to
   * as *whitelisted* products). Only products that are approved or products that
   * were previously approved (products with revoked approval) can be whitelisted.
   * **Note:** This item has been deprecated. New integrations cannot use this
   * method and can refer to our new recommendations.
   * (users.setAvailableProductSet)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $userId The ID of the user.
   * @param ProductSet $postBody
   * @param array $optParams Optional parameters.
   * @return ProductSet
   */
  public function setAvailableProductSet($enterpriseId, $userId, ProductSet $postBody, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'userId' => $userId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setAvailableProductSet', [$params], ProductSet::class);
  }
  /**
   * Updates the details of an EMM-managed user. Can be used with EMM-managed
   * users only (not Google managed users). Pass the new details in the Users
   * resource in the request body. Only the displayName field can be changed.
   * Other fields must either be unset or have the currently active value.
   * (users.update)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $userId The ID of the user.
   * @param User $postBody
   * @param array $optParams Optional parameters.
   * @return User
   */
  public function update($enterpriseId, $userId, User $postBody, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'userId' => $userId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], User::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Users::class, 'Google_Service_AndroidEnterprise_Resource_Users');
