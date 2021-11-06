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

use Google\Service\AndroidProvisioningPartner\Company;
use Google\Service\AndroidProvisioningPartner\CreateCustomerRequest;
use Google\Service\AndroidProvisioningPartner\ListCustomersResponse;

/**
 * The "customers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androiddeviceprovisioningService = new Google\Service\AndroidProvisioningPartner(...);
 *   $customers = $androiddeviceprovisioningService->customers;
 *  </code>
 */
class PartnersCustomers extends \Google\Service\Resource
{
  /**
   * Creates a customer for zero-touch enrollment. After the method returns
   * successfully, admin and owner roles can manage devices and EMM configs by
   * calling API methods or using their zero-touch enrollment portal. The customer
   * receives an email that welcomes them to zero-touch enrollment and explains
   * how to sign into the portal. (customers.create)
   *
   * @param string $parent Required. The parent resource ID in the format
   * `partners/[PARTNER_ID]` that identifies the reseller.
   * @param CreateCustomerRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Company
   */
  public function create($parent, CreateCustomerRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Company::class);
  }
  /**
   * Lists the customers that are enrolled to the reseller identified by the
   * `partnerId` argument. This list includes customers that the reseller created
   * and customers that enrolled themselves using the portal.
   * (customers.listPartnersCustomers)
   *
   * @param string $partnerId Required. The ID of the reseller partner.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of results to be returned. If not
   * specified or 0, all the records are returned.
   * @opt_param string pageToken A token identifying a page of results returned by
   * the server.
   * @return ListCustomersResponse
   */
  public function listPartnersCustomers($partnerId, $optParams = [])
  {
    $params = ['partnerId' => $partnerId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListCustomersResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PartnersCustomers::class, 'Google_Service_AndroidProvisioningPartner_Resource_PartnersCustomers');
