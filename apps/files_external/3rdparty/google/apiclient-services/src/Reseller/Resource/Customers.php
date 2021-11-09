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

namespace Google\Service\Reseller\Resource;

use Google\Service\Reseller\Customer;

/**
 * The "customers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $resellerService = new Google\Service\Reseller(...);
 *   $customers = $resellerService->customers;
 *  </code>
 */
class Customers extends \Google\Service\Resource
{
  /**
   * Gets a customer account. Use this operation to see a customer account already
   * in your reseller management, or to see the minimal account information for an
   * existing customer that you do not manage. For more information about the API
   * response for existing customers, see [retrieving a customer account](/admin-
   * sdk/reseller/v1/how-tos/manage_customers#get_customer). (customers.get)
   *
   * @param string $customerId This can be either the customer's primary domain
   * name or the customer's unique identifier. If the domain name for a customer
   * changes, the old domain name cannot be used to access the customer, but the
   * customer's unique identifier (as returned by the API) can always be used. We
   * recommend storing the unique identifier in your systems where applicable.
   * @param array $optParams Optional parameters.
   * @return Customer
   */
  public function get($customerId, $optParams = [])
  {
    $params = ['customerId' => $customerId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Customer::class);
  }
  /**
   * Orders a new customer's account. Before ordering a new customer account,
   * establish whether the customer account already exists using the
   * [`customers.get`](/admin-sdk/reseller/v1/reference/customers/get) If the
   * customer account exists as a direct Google account or as a resold customer
   * account from another reseller, use the `customerAuthToken\` as described in
   * [order a resold account for an existing customer](/admin-sdk/reseller/v1/how-
   * tos/manage_customers#create_existing_customer). For more information about
   * ordering a new customer account, see [order a new customer account](/admin-
   * sdk/reseller/v1/how-tos/manage_customers#create_customer). After creating a
   * new customer account, you must provision a user as an administrator. The
   * customer's administrator is required to sign in to the Admin console and sign
   * the G Suite via Reseller agreement to activate the account. Resellers are
   * prohibited from signing the G Suite via Reseller agreement on the customer's
   * behalf. For more information, see [order a new customer account](/admin-
   * sdk/reseller/v1/how-tos/manage_customers#tos). (customers.insert)
   *
   * @param Customer $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customerAuthToken The `customerAuthToken` query string is
   * required when creating a resold account that transfers a direct customer's
   * subscription or transfers another reseller customer's subscription to your
   * reseller management. This is a hexadecimal authentication token needed to
   * complete the subscription transfer. For more information, see the
   * administrator help center.
   * @return Customer
   */
  public function insert(Customer $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Customer::class);
  }
  /**
   * Updates a customer account's settings. This method supports patch semantics.
   * You cannot update `customerType` via the Reseller API, but a `"team"`
   * customer can verify their domain and become `customerType = "domain"`. For
   * more information, see [Verify your domain to unlock Essentials
   * features](https://support.google.com/a/answer/9122284). (customers.patch)
   *
   * @param string $customerId This can be either the customer's primary domain
   * name or the customer's unique identifier. If the domain name for a customer
   * changes, the old domain name cannot be used to access the customer, but the
   * customer's unique identifier (as returned by the API) can always be used. We
   * recommend storing the unique identifier in your systems where applicable.
   * @param Customer $postBody
   * @param array $optParams Optional parameters.
   * @return Customer
   */
  public function patch($customerId, Customer $postBody, $optParams = [])
  {
    $params = ['customerId' => $customerId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Customer::class);
  }
  /**
   * Updates a customer account's settings. You cannot update `customerType` via
   * the Reseller API, but a `"team"` customer can verify their domain and become
   * `customerType = "domain"`. For more information, see [update a customer's
   * settings](/admin-sdk/reseller/v1/how-tos/manage_customers#update_customer).
   * (customers.update)
   *
   * @param string $customerId This can be either the customer's primary domain
   * name or the customer's unique identifier. If the domain name for a customer
   * changes, the old domain name cannot be used to access the customer, but the
   * customer's unique identifier (as returned by the API) can always be used. We
   * recommend storing the unique identifier in your systems where applicable.
   * @param Customer $postBody
   * @param array $optParams Optional parameters.
   * @return Customer
   */
  public function update($customerId, Customer $postBody, $optParams = [])
  {
    $params = ['customerId' => $customerId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Customer::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Customers::class, 'Google_Service_Reseller_Resource_Customers');
