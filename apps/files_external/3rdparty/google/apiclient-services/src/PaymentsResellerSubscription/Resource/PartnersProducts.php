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

namespace Google\Service\PaymentsResellerSubscription\Resource;

use Google\Service\PaymentsResellerSubscription\GoogleCloudPaymentsResellerSubscriptionV1ListProductsResponse;

/**
 * The "products" collection of methods.
 * Typical usage is:
 *  <code>
 *   $paymentsresellersubscriptionService = new Google\Service\PaymentsResellerSubscription(...);
 *   $products = $paymentsresellersubscriptionService->products;
 *  </code>
 */
class PartnersProducts extends \Google\Service\Resource
{
  /**
   * To retrieve the products that can be resold by the partner. It should be
   * autenticated with a service account. (products.listPartnersProducts)
   *
   * @param string $parent Required. The parent, the partner that can resell.
   * Format: partners/{partner}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Specifies the filters for the product
   * results. The syntax is defined in https://google.aip.dev/160 with the
   * following caveats: - Only the following features are supported: - Logical
   * operator `AND` - Comparison operator `=` (no wildcards `*`) - Traversal
   * operator `.` - Has operator `:` (no wildcards `*`) - Only the following
   * fields are supported: - `regionCodes` - `youtubePayload.partnerEligibilityId`
   * - `youtubePayload.postalCode` - Unless explicitly mentioned above, other
   * features are not supported. Example: `regionCodes:US AND
   * youtubePayload.postalCode=94043 AND youtubePayload.partnerEligibilityId
   * =eligibility-id`
   * @opt_param int pageSize Optional. The maximum number of products to return.
   * The service may return fewer than this value. If unspecified, at most 50
   * products will be returned. The maximum value is 1000; values above 1000 will
   * be coerced to 1000.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * `ListProducts` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListProducts` must match the
   * call that provided the page token.
   * @return GoogleCloudPaymentsResellerSubscriptionV1ListProductsResponse
   */
  public function listPartnersProducts($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudPaymentsResellerSubscriptionV1ListProductsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PartnersProducts::class, 'Google_Service_PaymentsResellerSubscription_Resource_PartnersProducts');
