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

namespace Google\Service\Directory\Resource;

use Google\Service\Directory\Customer as CustomerModel;

/**
 * The "customers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adminService = new Google\Service\Directory(...);
 *   $customers = $adminService->customers;
 *  </code>
 */
class Customers extends \Google\Service\Resource
{
  /**
   * Retrieves a customer. (customers.get)
   *
   * @param string $customerKey Id of the customer to be retrieved
   * @param array $optParams Optional parameters.
   * @return Customer
   */
  public function get($customerKey, $optParams = [])
  {
    $params = ['customerKey' => $customerKey];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], CustomerModel::class);
  }
  /**
   * Patches a customer. (customers.patch)
   *
   * @param string $customerKey Id of the customer to be updated
   * @param CustomerModel $postBody
   * @param array $optParams Optional parameters.
   * @return CustomerModel
   */
  public function patch($customerKey, CustomerModel $postBody, $optParams = [])
  {
    $params = ['customerKey' => $customerKey, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], CustomerModel::class);
  }
  /**
   * Updates a customer. (customers.update)
   *
   * @param string $customerKey Id of the customer to be updated
   * @param CustomerModel $postBody
   * @param array $optParams Optional parameters.
   * @return CustomerModel
   */
  public function update($customerKey, CustomerModel $postBody, $optParams = [])
  {
    $params = ['customerKey' => $customerKey, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], CustomerModel::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Customers::class, 'Google_Service_Directory_Resource_Customers');
