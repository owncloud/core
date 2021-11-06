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

use Google\Service\AndroidProvisioningPartner\CustomerListDpcsResponse;

/**
 * The "dpcs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androiddeviceprovisioningService = new Google\Service\AndroidProvisioningPartner(...);
 *   $dpcs = $androiddeviceprovisioningService->dpcs;
 *  </code>
 */
class CustomersDpcs extends \Google\Service\Resource
{
  /**
   * Lists the DPCs (device policy controllers) that support zero-touch
   * enrollment. (dpcs.listCustomersDpcs)
   *
   * @param string $parent Required. The customer that can use the DPCs in
   * configurations. An API resource name in the format `customers/[CUSTOMER_ID]`.
   * @param array $optParams Optional parameters.
   * @return CustomerListDpcsResponse
   */
  public function listCustomersDpcs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], CustomerListDpcsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomersDpcs::class, 'Google_Service_AndroidProvisioningPartner_Resource_CustomersDpcs');
