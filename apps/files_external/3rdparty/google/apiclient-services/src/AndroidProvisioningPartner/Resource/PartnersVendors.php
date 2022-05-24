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

use Google\Service\AndroidProvisioningPartner\ListVendorsResponse;

/**
 * The "vendors" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androiddeviceprovisioningService = new Google\Service\AndroidProvisioningPartner(...);
 *   $vendors = $androiddeviceprovisioningService->vendors;
 *  </code>
 */
class PartnersVendors extends \Google\Service\Resource
{
  /**
   * Lists the vendors of the partner. (vendors.listPartnersVendors)
   *
   * @param string $parent Required. The resource name in the format
   * `partners/[PARTNER_ID]`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of results to be returned.
   * @opt_param string pageToken A token identifying a page of results returned by
   * the server.
   * @return ListVendorsResponse
   */
  public function listPartnersVendors($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListVendorsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PartnersVendors::class, 'Google_Service_AndroidProvisioningPartner_Resource_PartnersVendors');
