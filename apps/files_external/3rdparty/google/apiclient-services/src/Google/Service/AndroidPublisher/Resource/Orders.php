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
 * The "orders" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google_Service_AndroidPublisher(...);
 *   $orders = $androidpublisherService->orders;
 *  </code>
 */
class Google_Service_AndroidPublisher_Resource_Orders extends Google_Service_Resource
{
  /**
   * Refund a user's subscription or in-app purchase order. (orders.refund)
   *
   * @param string $packageName The package name of the application for which this
   * subscription or in-app item was purchased (for example, 'com.some.thing').
   * @param string $orderId The order ID provided to the user when the
   * subscription or in-app order was purchased.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool revoke Whether to revoke the purchased item. If set to true,
   * access to the subscription or in-app item will be terminated immediately. If
   * the item is a recurring subscription, all future payments will also be
   * terminated. Consumed in-app items need to be handled by developer's app.
   * (optional)
   */
  public function refund($packageName, $orderId, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'orderId' => $orderId);
    $params = array_merge($params, $optParams);
    return $this->call('refund', array($params));
  }
}
