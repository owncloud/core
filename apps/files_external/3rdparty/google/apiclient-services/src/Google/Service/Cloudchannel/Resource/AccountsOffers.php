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
 * The "offers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudchannelService = new Google_Service_Cloudchannel(...);
 *   $offers = $cloudchannelService->offers;
 *  </code>
 */
class Google_Service_Cloudchannel_Resource_AccountsOffers extends Google_Service_Resource
{
  /**
   * Lists the Offers the reseller can sell. Possible Error Codes: *
   * INVALID_ARGUMENT: Missing or invalid required parameters in the request.
   * (offers.listAccountsOffers)
   *
   * @param string $parent Required. The resource name of the reseller account
   * from which to list Offers. The parent takes the format:
   * accounts/{account_id}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. The expression to filter results by name
   * (name of the Offer), sku.name (name of the SKU) or sku.product.name (name of
   * the Product). Example 1: sku.product.name=products/p1 AND
   * sku.name!=products/p1/skus/s1 Example 2: name=accounts/a1/offers/o1
   * @opt_param string languageCode Optional. The BCP-47 language code, such as
   * "en-US". If specified, the response will be localized to the corresponding
   * language code. Default is "en-US".
   * @opt_param int pageSize Optional. Requested page size. Server might return
   * fewer results than requested. If unspecified, at most 500 Offers will be
   * returned. The maximum value is 1000; values above 1000 will be coerced to
   * 1000.
   * @opt_param string pageToken Optional. A token identifying a page of results,
   * if other than the first one.
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1ListOffersResponse
   */
  public function listAccountsOffers($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Cloudchannel_GoogleCloudChannelV1ListOffersResponse");
  }
}
