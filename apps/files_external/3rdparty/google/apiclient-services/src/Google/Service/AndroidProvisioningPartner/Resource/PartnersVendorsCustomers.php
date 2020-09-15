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
 *   $androiddeviceprovisioningService = new Google_Service_AndroidProvisioningPartner(...);
 *   $customers = $androiddeviceprovisioningService->customers;
 *  </code>
 */
class Google_Service_AndroidProvisioningPartner_Resource_PartnersVendorsCustomers extends Google_Service_Resource
{
  /**
   * Lists the customers of the vendor. (customers.listPartnersVendorsCustomers)
   *
   * @param string $parent Required. The resource name in the format
   * `partners/[PARTNER_ID]/vendors/[VENDOR_ID]`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of results to be returned.
   * @opt_param string pageToken A token identifying a page of results returned by
   * the server.
   * @return Google_Service_AndroidProvisioningPartner_ListVendorCustomersResponse
   */
  public function listPartnersVendorsCustomers($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AndroidProvisioningPartner_ListVendorCustomersResponse");
  }
}
