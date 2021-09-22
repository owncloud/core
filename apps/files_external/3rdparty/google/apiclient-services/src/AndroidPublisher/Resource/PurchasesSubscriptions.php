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

namespace Google\Service\AndroidPublisher\Resource;

use Google\Service\AndroidPublisher\SubscriptionPurchase;
use Google\Service\AndroidPublisher\SubscriptionPurchasesAcknowledgeRequest;
use Google\Service\AndroidPublisher\SubscriptionPurchasesDeferRequest;
use Google\Service\AndroidPublisher\SubscriptionPurchasesDeferResponse;

/**
 * The "subscriptions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google\Service\AndroidPublisher(...);
 *   $subscriptions = $androidpublisherService->subscriptions;
 *  </code>
 */
class PurchasesSubscriptions extends \Google\Service\Resource
{
  /**
   * Acknowledges a subscription purchase. (subscriptions.acknowledge)
   *
   * @param string $packageName The package name of the application for which this
   * subscription was purchased (for example, 'com.some.thing').
   * @param string $subscriptionId The purchased subscription ID (for example,
   * 'monthly001').
   * @param string $token The token provided to the user's device when the
   * subscription was purchased.
   * @param SubscriptionPurchasesAcknowledgeRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function acknowledge($packageName, $subscriptionId, $token, SubscriptionPurchasesAcknowledgeRequest $postBody, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'subscriptionId' => $subscriptionId, 'token' => $token, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('acknowledge', [$params]);
  }
  /**
   * Cancels a user's subscription purchase. The subscription remains valid until
   * its expiration time. (subscriptions.cancel)
   *
   * @param string $packageName The package name of the application for which this
   * subscription was purchased (for example, 'com.some.thing').
   * @param string $subscriptionId The purchased subscription ID (for example,
   * 'monthly001').
   * @param string $token The token provided to the user's device when the
   * subscription was purchased.
   * @param array $optParams Optional parameters.
   */
  public function cancel($packageName, $subscriptionId, $token, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'subscriptionId' => $subscriptionId, 'token' => $token];
    $params = array_merge($params, $optParams);
    return $this->call('cancel', [$params]);
  }
  /**
   * Defers a user's subscription purchase until a specified future expiration
   * time. (subscriptions.defer)
   *
   * @param string $packageName The package name of the application for which this
   * subscription was purchased (for example, 'com.some.thing').
   * @param string $subscriptionId The purchased subscription ID (for example,
   * 'monthly001').
   * @param string $token The token provided to the user's device when the
   * subscription was purchased.
   * @param SubscriptionPurchasesDeferRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SubscriptionPurchasesDeferResponse
   */
  public function defer($packageName, $subscriptionId, $token, SubscriptionPurchasesDeferRequest $postBody, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'subscriptionId' => $subscriptionId, 'token' => $token, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('defer', [$params], SubscriptionPurchasesDeferResponse::class);
  }
  /**
   * Checks whether a user's subscription purchase is valid and returns its expiry
   * time. (subscriptions.get)
   *
   * @param string $packageName The package name of the application for which this
   * subscription was purchased (for example, 'com.some.thing').
   * @param string $subscriptionId The purchased subscription ID (for example,
   * 'monthly001').
   * @param string $token The token provided to the user's device when the
   * subscription was purchased.
   * @param array $optParams Optional parameters.
   * @return SubscriptionPurchase
   */
  public function get($packageName, $subscriptionId, $token, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'subscriptionId' => $subscriptionId, 'token' => $token];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], SubscriptionPurchase::class);
  }
  /**
   * Refunds a user's subscription purchase, but the subscription remains valid
   * until its expiration time and it will continue to recur.
   * (subscriptions.refund)
   *
   * @param string $packageName The package name of the application for which this
   * subscription was purchased (for example, 'com.some.thing').
   * @param string $subscriptionId "The purchased subscription ID (for example,
   * 'monthly001').
   * @param string $token The token provided to the user's device when the
   * subscription was purchased.
   * @param array $optParams Optional parameters.
   */
  public function refund($packageName, $subscriptionId, $token, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'subscriptionId' => $subscriptionId, 'token' => $token];
    $params = array_merge($params, $optParams);
    return $this->call('refund', [$params]);
  }
  /**
   * Refunds and immediately revokes a user's subscription purchase. Access to the
   * subscription will be terminated immediately and it will stop recurring.
   * (subscriptions.revoke)
   *
   * @param string $packageName The package name of the application for which this
   * subscription was purchased (for example, 'com.some.thing').
   * @param string $subscriptionId The purchased subscription ID (for example,
   * 'monthly001').
   * @param string $token The token provided to the user's device when the
   * subscription was purchased.
   * @param array $optParams Optional parameters.
   */
  public function revoke($packageName, $subscriptionId, $token, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'subscriptionId' => $subscriptionId, 'token' => $token];
    $params = array_merge($params, $optParams);
    return $this->call('revoke', [$params]);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PurchasesSubscriptions::class, 'Google_Service_AndroidPublisher_Resource_PurchasesSubscriptions');
