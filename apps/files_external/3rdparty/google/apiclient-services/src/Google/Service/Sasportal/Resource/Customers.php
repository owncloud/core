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
 *   $sasportalService = new Google_Service_Sasportal(...);
 *   $customers = $sasportalService->customers;
 *  </code>
 */
class Google_Service_Sasportal_Resource_Customers extends Google_Service_Resource
{
  /**
   * Returns a requested customer. (customers.get)
   *
   * @param string $name Required. The name of the customer.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Sasportal_SasPortalCustomer
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Sasportal_SasPortalCustomer");
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
   * @return Google_Service_Sasportal_SasPortalListCustomersResponse
   */
  public function listCustomers($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Sasportal_SasPortalListCustomersResponse");
  }
  /**
   * Updates an existing customer. (customers.patch)
   *
   * @param string $name Output only. Resource name of the customer.
   * @param Google_Service_Sasportal_SasPortalCustomer $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Fields to be updated.
   * @return Google_Service_Sasportal_SasPortalCustomer
   */
  public function patch($name, Google_Service_Sasportal_SasPortalCustomer $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_Sasportal_SasPortalCustomer");
  }
}
