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

use Google\Service\AndroidEnterprise\ManagedConfiguration;
use Google\Service\AndroidEnterprise\ManagedConfigurationsForUserListResponse;

/**
 * The "managedconfigurationsforuser" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidenterpriseService = new Google\Service\AndroidEnterprise(...);
 *   $managedconfigurationsforuser = $androidenterpriseService->managedconfigurationsforuser;
 *  </code>
 */
class Managedconfigurationsforuser extends \Google\Service\Resource
{
  /**
   * Removes a per-user managed configuration for an app for the specified user.
   * (managedconfigurationsforuser.delete)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $userId The ID of the user.
   * @param string $managedConfigurationForUserId The ID of the managed
   * configuration (a product ID), e.g. "app:com.google.android.gm".
   * @param array $optParams Optional parameters.
   */
  public function delete($enterpriseId, $userId, $managedConfigurationForUserId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'userId' => $userId, 'managedConfigurationForUserId' => $managedConfigurationForUserId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Retrieves details of a per-user managed configuration for an app for the
   * specified user. (managedconfigurationsforuser.get)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $userId The ID of the user.
   * @param string $managedConfigurationForUserId The ID of the managed
   * configuration (a product ID), e.g. "app:com.google.android.gm".
   * @param array $optParams Optional parameters.
   * @return ManagedConfiguration
   */
  public function get($enterpriseId, $userId, $managedConfigurationForUserId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'userId' => $userId, 'managedConfigurationForUserId' => $managedConfigurationForUserId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], ManagedConfiguration::class);
  }
  /**
   * Lists all the per-user managed configurations for the specified user. Only
   * the ID is set.
   * (managedconfigurationsforuser.listManagedconfigurationsforuser)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $userId The ID of the user.
   * @param array $optParams Optional parameters.
   * @return ManagedConfigurationsForUserListResponse
   */
  public function listManagedconfigurationsforuser($enterpriseId, $userId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'userId' => $userId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ManagedConfigurationsForUserListResponse::class);
  }
  /**
   * Adds or updates the managed configuration settings for an app for the
   * specified user. If you support the Managed configurations iframe, you can
   * apply managed configurations to a user by specifying an mcmId and its
   * associated configuration variables (if any) in the request. Alternatively,
   * all EMMs can apply managed configurations by passing a list of managed
   * properties. (managedconfigurationsforuser.update)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $userId The ID of the user.
   * @param string $managedConfigurationForUserId The ID of the managed
   * configuration (a product ID), e.g. "app:com.google.android.gm".
   * @param ManagedConfiguration $postBody
   * @param array $optParams Optional parameters.
   * @return ManagedConfiguration
   */
  public function update($enterpriseId, $userId, $managedConfigurationForUserId, ManagedConfiguration $postBody, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'userId' => $userId, 'managedConfigurationForUserId' => $managedConfigurationForUserId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], ManagedConfiguration::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Managedconfigurationsforuser::class, 'Google_Service_AndroidEnterprise_Resource_Managedconfigurationsforuser');
