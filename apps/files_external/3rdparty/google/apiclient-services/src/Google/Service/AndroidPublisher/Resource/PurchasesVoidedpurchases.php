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
 * The "voidedpurchases" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google_Service_AndroidPublisher(...);
 *   $voidedpurchases = $androidpublisherService->voidedpurchases;
 *  </code>
 */
class Google_Service_AndroidPublisher_Resource_PurchasesVoidedpurchases extends Google_Service_Resource
{
  /**
   * Lists the purchases that were canceled, refunded or charged-back.
   * (voidedpurchases.listPurchasesVoidedpurchases)
   *
   * @param string $packageName The package name of the application for which
   * voided purchases need to be returned (for example, 'com.some.thing').
   * @param array $optParams Optional parameters.
   *
   * @opt_param string startTime The time, in milliseconds since the Epoch, of the
   * oldest voided purchase that you want to see in the response. The value of
   * this parameter cannot be older than 30 days and is ignored if a pagination
   * token is set. Default value is current time minus 30 days. Note: This filter
   * is applied on the time at which the record is seen as voided by our systems
   * and not the actual voided time returned in the response.
   * @opt_param string startIndex Defines the index of the first element to
   * return. This can only be used if indexed paging is enabled.
   * @opt_param string token Defines the token of the page to return, usually
   * taken from TokenPagination. This can only be used if token paging is enabled.
   * @opt_param string maxResults Defines how many results the list operation
   * should return. The default number depends on the resource collection.
   * @opt_param string endTime The time, in milliseconds since the Epoch, of the
   * newest voided purchase that you want to see in the response. The value of
   * this parameter cannot be greater than the current time and is ignored if a
   * pagination token is set. Default value is current time. Note: This filter is
   * applied on the time at which the record is seen as voided by our systems and
   * not the actual voided time returned in the response.
   * @opt_param int type The type of voided purchases that you want to see in the
   * response. Possible values are: 0. Only voided in-app product purchases will
   * be returned in the response. This is the default value. 1. Both voided in-app
   * purchases and voided subscription purchases will be returned in the response.
   * Note: Before requesting to receive voided subscription purchases, you must
   * switch to use orderId in the response which uniquely identifies one-time
   * purchases and subscriptions. Otherwise, you will receive multiple
   * subscription orders with the same PurchaseToken, because subscription renewal
   * orders share the same PurchaseToken.
   * @return Google_Service_AndroidPublisher_VoidedPurchasesListResponse
   */
  public function listPurchasesVoidedpurchases($packageName, $optParams = array())
  {
    $params = array('packageName' => $packageName);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AndroidPublisher_VoidedPurchasesListResponse");
  }
}
