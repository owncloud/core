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

/**
 * The "customers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $resellerService = new Google_Service_Reseller(...);
 *   $customers = $resellerService->customers;
 *  </code>
 */
class Google_Service_Reseller_Resource_Customers extends Google_Service_Resource
{
  /**
   * Get a customer account. Use this operation to see a customer account already
   * in your reseller management, or to see the minimal account information for an
   * existing customer that you do not manage. For more information about the API
   * response for existing customers, see [retrieving a customer account](/admin-
   * sdk/reseller/v1/how-tos/manage_customers#get_customer). (customers.get)
   *
   * @param string $customerId Either the customer's primary domain name or the
   * customer's unique identifier. If using the domain name, we do not recommend
   * using a `customerId` as a key for persistent data. If the domain name for a
   * `customerId` is changed, the Google system automatically updates.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Reseller_Customer
   */
  public function get($customerId, $optParams = array())
  {
    $params = array('customerId' => $customerId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Reseller_Customer");
  }
  /**
   * Order a new customer's account. Before ordering a new customer account,
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
   * @param Google_Service_Reseller_Customer $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customerAuthToken The `customerAuthToken` query string is
   * required when creating a resold account that transfers a direct customer's
   * subscription or transfers another reseller customer's subscription to your
   * reseller management. This is a hexadecimal authentication token needed to
   * complete the subscription transfer. For more information, see the
   * administrator help center.
   * @return Google_Service_Reseller_Customer
   */
  public function insert(Google_Service_Reseller_Customer $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Reseller_Customer");
  }
  /**
   * Update a customer account's settings. This method supports patch semantics.
   * (customers.patch)
   *
   * @param string $customerId Either the customer's primary domain name or the
   * customer's unique identifier. If using the domain name, we do not recommend
   * using a `customerId` as a key for persistent data. If the domain name for a
   * `customerId` is changed, the Google system automatically updates.
   * @param Google_Service_Reseller_Customer $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Reseller_Customer
   */
  public function patch($customerId, Google_Service_Reseller_Customer $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Reseller_Customer");
  }
  /**
   * Update a customer account's settings. For more information, see [update a
   * customer's settings](/admin-sdk/reseller/v1/how-
   * tos/manage_customers#update_customer). (customers.update)
   *
   * @param string $customerId Either the customer's primary domain name or the
   * customer's unique identifier. If using the domain name, we do not recommend
   * using a `customerId` as a key for persistent data. If the domain name for a
   * `customerId` is changed, the Google system automatically updates.
   * @param Google_Service_Reseller_Customer $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Reseller_Customer
   */
  public function update($customerId, Google_Service_Reseller_Customer $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_Reseller_Customer");
  }
}
