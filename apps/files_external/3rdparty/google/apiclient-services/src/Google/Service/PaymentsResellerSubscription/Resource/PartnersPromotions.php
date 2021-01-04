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
 * The "promotions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $paymentsresellersubscriptionService = new Google_Service_PaymentsResellerSubscription(...);
 *   $promotions = $paymentsresellersubscriptionService->promotions;
 *  </code>
 */
class Google_Service_PaymentsResellerSubscription_Resource_PartnersPromotions extends Google_Service_Resource
{
  /**
   * Used by partners to list promotions, such as free trial, that can be applied
   * on subscriptions. It should be called directly by the partner using service
   * accounts. (promotions.listPartnersPromotions)
   *
   * @param string $parent Required. The parent, the partner that can resell.
   * Format: partners/{partner}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Specifies the filters for the promotion
   * results. The syntax defined in the EBNF grammar:
   * https://google.aip.dev/assets/misc/ebnf-filtering.txt. Examples: -
   * applicable_products: "sku1" - region_codes: "US" - applicable_products:
   * "sku1" AND region_codes: "US"
   * @opt_param int pageSize Optional. The maximum number of promotions to return.
   * The service may return fewer than this value. If unspecified, at most 50
   * products will be returned. The maximum value is 1000; values above 1000 will
   * be coerced to 1000.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * `ListPromotions` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListPromotions` must match the
   * call that provided the page token.
   * @return Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1ListPromotionsResponse
   */
  public function listPartnersPromotions($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1ListPromotionsResponse");
  }
}
