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

namespace Google\Service\AndroidProvisioningPartner\Resource;

use Google\Service\AndroidProvisioningPartner\CustomerListCustomersResponse;

/**
 * The "customers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androiddeviceprovisioningService = new Google\Service\AndroidProvisioningPartner(...);
 *   $customers = $androiddeviceprovisioningService->customers;
 *  </code>
 */
class Customers extends \Google\Service\Resource
{
  /**
   * Lists the user's customer accounts. (customers.listCustomers)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of customers to show in a page of
   * results. A number between 1 and 100 (inclusive).
   * @opt_param string pageToken A token specifying which result page to return.
   * This field has custom validations in ListCustomersRequestValidator
   * @return CustomerListCustomersResponse
   */
  public function listCustomers($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], CustomerListCustomersResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Customers::class, 'Google_Service_AndroidProvisioningPartner_Resource_Customers');
