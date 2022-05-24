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

namespace Google\Service\Cloudchannel\Resource;

use Google\Service\Cloudchannel\GoogleCloudChannelV1ListOffersResponse;

/**
 * The "offers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudchannelService = new Google\Service\Cloudchannel(...);
 *   $offers = $cloudchannelService->offers;
 *  </code>
 */
class AccountsOffers extends \Google\Service\Resource
{
  /**
   * Lists the Offers the reseller can sell. Possible error codes: *
   * INVALID_ARGUMENT: Required request parameters are missing or invalid.
   * (offers.listAccountsOffers)
   *
   * @param string $parent Required. The resource name of the reseller account
   * from which to list Offers. Parent uses the format: accounts/{account_id}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. The expression to filter results by name
   * (name of the Offer), sku.name (name of the SKU), or sku.product.name (name of
   * the Product). Example 1: sku.product.name=products/p1 AND
   * sku.name!=products/p1/skus/s1 Example 2: name=accounts/a1/offers/o1
   * @opt_param string languageCode Optional. The BCP-47 language code. For
   * example, "en-US". The response will localize in the corresponding language
   * code, if specified. The default value is "en-US".
   * @opt_param int pageSize Optional. Requested page size. Server might return
   * fewer results than requested. If unspecified, returns at most 500 Offers. The
   * maximum value is 1000; the server will coerce values above 1000.
   * @opt_param string pageToken Optional. A token for a page of results other
   * than the first page.
   * @return GoogleCloudChannelV1ListOffersResponse
   */
  public function listAccountsOffers($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudChannelV1ListOffersResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsOffers::class, 'Google_Service_Cloudchannel_Resource_AccountsOffers');
