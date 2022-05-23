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

use Google\Service\AndroidPublisher\ArchiveSubscriptionRequest;
use Google\Service\AndroidPublisher\ListSubscriptionsResponse;
use Google\Service\AndroidPublisher\Subscription;

/**
 * The "subscriptions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google\Service\AndroidPublisher(...);
 *   $subscriptions = $androidpublisherService->subscriptions;
 *  </code>
 */
class MonetizationSubscriptions extends \Google\Service\Resource
{
  /**
   * Archives a subscription. Can only be done if at least one base plan was
   * active in the past, and no base plan is available for new or existing
   * subscribers currently. This action is irreversible, and the subscription ID
   * will remain reserved. (subscriptions.archive)
   *
   * @param string $packageName Required. The parent app (package name) of the app
   * of the subscription to delete.
   * @param string $productId Required. The unique product ID of the subscription
   * to delete.
   * @param ArchiveSubscriptionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Subscription
   */
  public function archive($packageName, $productId, ArchiveSubscriptionRequest $postBody, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'productId' => $productId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('archive', [$params], Subscription::class);
  }
  /**
   * Creates a new subscription. Newly added base plans will remain in draft state
   * until activated. (subscriptions.create)
   *
   * @param string $packageName Required. The parent app (package name) for which
   * the subscription should be created. Must be equal to the package_name field
   * on the Subscription resource.
   * @param Subscription $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string productId Required. The ID to use for the subscription. For
   * the requirements on this format, see the documentation of the product_id
   * field on the Subscription resource.
   * @opt_param string regionsVersion.version Required. A string representing
   * version of the available regions being used for the specified resource.
   * @return Subscription
   */
  public function create($packageName, Subscription $postBody, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Subscription::class);
  }
  /**
   * Deletes a subscription. A subscription can only be deleted if it has never
   * had a base plan published. (subscriptions.delete)
   *
   * @param string $packageName Required. The parent app (package name) of the app
   * of the subscription to delete.
   * @param string $productId Required. The unique product ID of the subscription
   * to delete.
   * @param array $optParams Optional parameters.
   */
  public function delete($packageName, $productId, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'productId' => $productId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Reads a single subscription. (subscriptions.get)
   *
   * @param string $packageName Required. The parent app (package name) of the
   * subscription to get.
   * @param string $productId Required. The unique product ID of the subscription
   * to get.
   * @param array $optParams Optional parameters.
   * @return Subscription
   */
  public function get($packageName, $productId, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'productId' => $productId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Subscription::class);
  }
  /**
   * Lists all subscriptions under a given app.
   * (subscriptions.listMonetizationSubscriptions)
   *
   * @param string $packageName Required. The parent app (package name) for which
   * the subscriptions should be read.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of subscriptions to return. The
   * service may return fewer than this value. If unspecified, at most 50
   * subscriptions will be returned. The maximum value is 1000; values above 1000
   * will be coerced to 1000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListSubscriptions` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListSubscriptions` must match
   * the call that provided the page token.
   * @opt_param bool showArchived Whether archived subscriptions should be
   * included in the response. Defaults to false.
   * @return ListSubscriptionsResponse
   */
  public function listMonetizationSubscriptions($packageName, $optParams = [])
  {
    $params = ['packageName' => $packageName];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListSubscriptionsResponse::class);
  }
  /**
   * Updates an existing subscription. (subscriptions.patch)
   *
   * @param string $packageName Immutable. Package name of the parent app.
   * @param string $productId Immutable. Unique product ID of the product. Unique
   * within the parent app. Product IDs must be composed of lower-case letters
   * (a-z), numbers (0-9), underscores (_) and dots (.). It must start with a
   * lower-case letter or number, and be between 1 and 40 (inclusive) characters
   * in length.
   * @param Subscription $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string regionsVersion.version Required. A string representing
   * version of the available regions being used for the specified resource.
   * @opt_param string updateMask Required. The list of fields to be updated.
   * @return Subscription
   */
  public function patch($packageName, $productId, Subscription $postBody, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'productId' => $productId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Subscription::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MonetizationSubscriptions::class, 'Google_Service_AndroidPublisher_Resource_MonetizationSubscriptions');
