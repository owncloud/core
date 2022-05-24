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

use Google\Service\AndroidPublisher\ActivateBasePlanRequest;
use Google\Service\AndroidPublisher\DeactivateBasePlanRequest;
use Google\Service\AndroidPublisher\MigrateBasePlanPricesRequest;
use Google\Service\AndroidPublisher\MigrateBasePlanPricesResponse;
use Google\Service\AndroidPublisher\Subscription;

/**
 * The "basePlans" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google\Service\AndroidPublisher(...);
 *   $basePlans = $androidpublisherService->basePlans;
 *  </code>
 */
class MonetizationSubscriptionsBasePlans extends \Google\Service\Resource
{
  /**
   * Activates a base plan. Once activated, base plans will be available to new
   * subscribers. (basePlans.activate)
   *
   * @param string $packageName Required. The parent app (package name) of the
   * base plan to activate.
   * @param string $productId Required. The parent subscription (ID) of the base
   * plan to activate.
   * @param string $basePlanId Required. The unique base plan ID of the base plan
   * to activate.
   * @param ActivateBasePlanRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Subscription
   */
  public function activate($packageName, $productId, $basePlanId, ActivateBasePlanRequest $postBody, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'productId' => $productId, 'basePlanId' => $basePlanId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('activate', [$params], Subscription::class);
  }
  /**
   * Deactivates a base plan. Once deactivated, the base plan will become
   * unavailable to new subscribers, but existing subscribers will maintain their
   * subscription (basePlans.deactivate)
   *
   * @param string $packageName Required. The parent app (package name) of the
   * base plan to deactivate.
   * @param string $productId Required. The parent subscription (ID) of the base
   * plan to deactivate.
   * @param string $basePlanId Required. The unique base plan ID of the base plan
   * to deactivate.
   * @param DeactivateBasePlanRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Subscription
   */
  public function deactivate($packageName, $productId, $basePlanId, DeactivateBasePlanRequest $postBody, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'productId' => $productId, 'basePlanId' => $basePlanId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('deactivate', [$params], Subscription::class);
  }
  /**
   * Deletes a base plan. Can only be done for draft base plans. This action is
   * irreversible. (basePlans.delete)
   *
   * @param string $packageName Required. The parent app (package name) of the
   * base plan to delete.
   * @param string $productId Required. The parent subscription (ID) of the base
   * plan to delete.
   * @param string $basePlanId Required. The unique offer ID of the base plan to
   * delete.
   * @param array $optParams Optional parameters.
   */
  public function delete($packageName, $productId, $basePlanId, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'productId' => $productId, 'basePlanId' => $basePlanId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Migrates subscribers who are receiving an historical subscription price to
   * the currently-offered price for the specified region. Requests will cause
   * price change notifications to be sent to users who are currently receiving an
   * historical price older than the supplied timestamp. Subscribers who do not
   * agree to the new price will have their subscription ended at the next
   * renewal. (basePlans.migratePrices)
   *
   * @param string $packageName Required. Package name of the parent app. Must be
   * equal to the package_name field on the Subscription resource.
   * @param string $productId Required. The ID of the subscription to update. Must
   * be equal to the product_id field on the Subscription resource.
   * @param string $basePlanId Required. The unique base plan ID of the base plan
   * to update prices on.
   * @param MigrateBasePlanPricesRequest $postBody
   * @param array $optParams Optional parameters.
   * @return MigrateBasePlanPricesResponse
   */
  public function migratePrices($packageName, $productId, $basePlanId, MigrateBasePlanPricesRequest $postBody, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'productId' => $productId, 'basePlanId' => $basePlanId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('migratePrices', [$params], MigrateBasePlanPricesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MonetizationSubscriptionsBasePlans::class, 'Google_Service_AndroidPublisher_Resource_MonetizationSubscriptionsBasePlans');
