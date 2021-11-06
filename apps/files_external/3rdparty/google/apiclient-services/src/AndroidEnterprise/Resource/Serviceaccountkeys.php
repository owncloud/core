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

use Google\Service\AndroidEnterprise\ServiceAccountKey;
use Google\Service\AndroidEnterprise\ServiceAccountKeysListResponse;

/**
 * The "serviceaccountkeys" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidenterpriseService = new Google\Service\AndroidEnterprise(...);
 *   $serviceaccountkeys = $androidenterpriseService->serviceaccountkeys;
 *  </code>
 */
class Serviceaccountkeys extends \Google\Service\Resource
{
  /**
   * Removes and invalidates the specified credentials for the service account
   * associated with this enterprise. The calling service account must have been
   * retrieved by calling Enterprises.GetServiceAccount and must have been set as
   * the enterprise service account by calling Enterprises.SetAccount.
   * (serviceaccountkeys.delete)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $keyId The ID of the key.
   * @param array $optParams Optional parameters.
   */
  public function delete($enterpriseId, $keyId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'keyId' => $keyId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Generates new credentials for the service account associated with this
   * enterprise. The calling service account must have been retrieved by calling
   * Enterprises.GetServiceAccount and must have been set as the enterprise
   * service account by calling Enterprises.SetAccount. Only the type of the key
   * should be populated in the resource to be inserted.
   * (serviceaccountkeys.insert)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param ServiceAccountKey $postBody
   * @param array $optParams Optional parameters.
   * @return ServiceAccountKey
   */
  public function insert($enterpriseId, ServiceAccountKey $postBody, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], ServiceAccountKey::class);
  }
  /**
   * Lists all active credentials for the service account associated with this
   * enterprise. Only the ID and key type are returned. The calling service
   * account must have been retrieved by calling Enterprises.GetServiceAccount and
   * must have been set as the enterprise service account by calling
   * Enterprises.SetAccount. (serviceaccountkeys.listServiceaccountkeys)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param array $optParams Optional parameters.
   * @return ServiceAccountKeysListResponse
   */
  public function listServiceaccountkeys($enterpriseId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ServiceAccountKeysListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Serviceaccountkeys::class, 'Google_Service_AndroidEnterprise_Resource_Serviceaccountkeys');
