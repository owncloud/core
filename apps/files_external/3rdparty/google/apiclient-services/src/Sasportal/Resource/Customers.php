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

namespace Google\Service\Sasportal\Resource;

use Google\Service\Sasportal\SasPortalCustomer;
use Google\Service\Sasportal\SasPortalListCustomersResponse;

/**
 * The "customers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $sasportalService = new Google\Service\Sasportal(...);
 *   $customers = $sasportalService->customers;
 *  </code>
 */
class Customers extends \Google\Service\Resource
{
  /**
   * Returns a requested customer. (customers.get)
   *
   * @param string $name Required. The name of the customer.
   * @param array $optParams Optional parameters.
   * @return SasPortalCustomer
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], SasPortalCustomer::class);
  }
  /**
   * Returns a list of requested customers. (customers.listCustomers)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of customers to return in the
   * response.
   * @opt_param string pageToken A pagination token returned from a previous call
   * to ListCustomers that indicates where this listing should continue from.
   * @return SasPortalListCustomersResponse
   */
  public function listCustomers($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], SasPortalListCustomersResponse::class);
  }
  /**
   * Updates an existing customer. (customers.patch)
   *
   * @param string $name Output only. Resource name of the customer.
   * @param SasPortalCustomer $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Fields to be updated.
   * @return SasPortalCustomer
   */
  public function patch($name, SasPortalCustomer $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], SasPortalCustomer::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Customers::class, 'Google_Service_Sasportal_Resource_Customers');
