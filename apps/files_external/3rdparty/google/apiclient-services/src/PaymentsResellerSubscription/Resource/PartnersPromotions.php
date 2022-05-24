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

use Google\Service\PaymentsResellerSubscription\GoogleCloudPaymentsResellerSubscriptionV1FindEligiblePromotionsRequest;
use Google\Service\PaymentsResellerSubscription\GoogleCloudPaymentsResellerSubscriptionV1FindEligiblePromotionsResponse;
use Google\Service\PaymentsResellerSubscription\GoogleCloudPaymentsResellerSubscriptionV1ListPromotionsResponse;

/**
 * The "promotions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $paymentsresellersubscriptionService = new Google\Service\PaymentsResellerSubscription(...);
 *   $promotions = $paymentsresellersubscriptionService->promotions;
 *  </code>
 */
class PartnersPromotions extends \Google\Service\Resource
{
  /**
   * To find eligible promotions for the current user. The API requires user
   * authorization via OAuth. The user is inferred from the authenticated OAuth
   * credential. (promotions.findEligible)
   *
   * @param string $parent Required. The parent, the partner that can resell.
   * Format: partners/{partner}
   * @param GoogleCloudPaymentsResellerSubscriptionV1FindEligiblePromotionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudPaymentsResellerSubscriptionV1FindEligiblePromotionsResponse
   */
  public function findEligible($parent, GoogleCloudPaymentsResellerSubscriptionV1FindEligiblePromotionsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('findEligible', [$params], GoogleCloudPaymentsResellerSubscriptionV1FindEligiblePromotionsResponse::class);
  }
  /**
   * To retrieve the promotions, such as free trial, that can be used by the
   * partner. It should be autenticated with a service account.
   * (promotions.listPartnersPromotions)
   *
   * @param string $parent Required. The parent, the partner that can resell.
   * Format: partners/{partner}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Specifies the filters for the promotion
   * results. The syntax defined in the EBNF grammar:
   * https://google.aip.dev/assets/misc/ebnf-filtering.txt. An error will be
   * thrown if the specified parameter(s) is not supported. Currently, it can only
   * be used by Youtube partners. Allowed parameters are: - region_codes: "US" -
   * zip_code: "94043" - eligibility_id: "2022H1Campaign" Multiple parameters can
   * be specified, for example: "region_codes=US zip_code=94043
   * eligibility_id=2022H1Campaign"
   * @opt_param int pageSize Optional. The maximum number of promotions to return.
   * The service may return fewer than this value. If unspecified, at most 50
   * products will be returned. The maximum value is 1000; values above 1000 will
   * be coerced to 1000.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * `ListPromotions` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListPromotions` must match the
   * call that provided the page token.
   * @return GoogleCloudPaymentsResellerSubscriptionV1ListPromotionsResponse
   */
  public function listPartnersPromotions($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudPaymentsResellerSubscriptionV1ListPromotionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PartnersPromotions::class, 'Google_Service_PaymentsResellerSubscription_Resource_PartnersPromotions');
