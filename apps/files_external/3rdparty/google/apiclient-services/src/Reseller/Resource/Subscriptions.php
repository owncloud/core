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

namespace Google\Service\Reseller\Resource;

use Google\Service\Reseller\ChangePlanRequest;
use Google\Service\Reseller\RenewalSettings;
use Google\Service\Reseller\Seats;
use Google\Service\Reseller\Subscription;
use Google\Service\Reseller\Subscriptions as SubscriptionsModel;

/**
 * The "subscriptions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $resellerService = new Google\Service\Reseller(...);
 *   $subscriptions = $resellerService->subscriptions;
 *  </code>
 */
class Subscriptions extends \Google\Service\Resource
{
  /**
   * Activates a subscription previously suspended by the reseller. If you did not
   * suspend the customer subscription and it is suspended for any other reason,
   * such as for abuse or a pending ToS acceptance, this call will not reactivate
   * the customer subscription. (subscriptions.activate)
   *
   * @param string $customerId This can be either the customer's primary domain
   * name or the customer's unique identifier. If the domain name for a customer
   * changes, the old domain name cannot be used to access the customer, but the
   * customer's unique identifier (as returned by the API) can always be used. We
   * recommend storing the unique identifier in your systems where applicable.
   * @param string $subscriptionId This is a required property. The
   * `subscriptionId` is the subscription identifier and is unique for each
   * customer. Since a `subscriptionId` changes when a subscription is updated, we
   * recommend to not use this ID as a key for persistent data. And the
   * `subscriptionId` can be found using the retrieve all reseller subscriptions
   * method.
   * @param array $optParams Optional parameters.
   * @return Subscription
   */
  public function activate($customerId, $subscriptionId, $optParams = [])
  {
    $params = ['customerId' => $customerId, 'subscriptionId' => $subscriptionId];
    $params = array_merge($params, $optParams);
    return $this->call('activate', [$params], Subscription::class);
  }
  /**
   * Updates a subscription plan. Use this method to update a plan for a 30-day
   * trial or a flexible plan subscription to an annual commitment plan with
   * monthly or yearly payments. How a plan is updated differs depending on the
   * plan and the products. For more information, see the description in [manage
   * subscriptions](/admin-sdk/reseller/v1/how-
   * tos/manage_subscriptions#update_subscription_plan).
   * (subscriptions.changePlan)
   *
   * @param string $customerId This can be either the customer's primary domain
   * name or the customer's unique identifier. If the domain name for a customer
   * changes, the old domain name cannot be used to access the customer, but the
   * customer's unique identifier (as returned by the API) can always be used. We
   * recommend storing the unique identifier in your systems where applicable.
   * @param string $subscriptionId This is a required property. The
   * `subscriptionId` is the subscription identifier and is unique for each
   * customer. Since a `subscriptionId` changes when a subscription is updated, we
   * recommend to not use this ID as a key for persistent data. And the
   * `subscriptionId` can be found using the retrieve all reseller subscriptions
   * method.
   * @param ChangePlanRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Subscription
   */
  public function changePlan($customerId, $subscriptionId, ChangePlanRequest $postBody, $optParams = [])
  {
    $params = ['customerId' => $customerId, 'subscriptionId' => $subscriptionId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('changePlan', [$params], Subscription::class);
  }
  /**
   * Updates a user license's renewal settings. This is applicable for accounts
   * with annual commitment plans only. For more information, see the description
   * in [manage subscriptions](/admin-sdk/reseller/v1/how-
   * tos/manage_subscriptions#update_renewal).
   * (subscriptions.changeRenewalSettings)
   *
   * @param string $customerId This can be either the customer's primary domain
   * name or the customer's unique identifier. If the domain name for a customer
   * changes, the old domain name cannot be used to access the customer, but the
   * customer's unique identifier (as returned by the API) can always be used. We
   * recommend storing the unique identifier in your systems where applicable.
   * @param string $subscriptionId This is a required property. The
   * `subscriptionId` is the subscription identifier and is unique for each
   * customer. Since a `subscriptionId` changes when a subscription is updated, we
   * recommend to not use this ID as a key for persistent data. And the
   * `subscriptionId` can be found using the retrieve all reseller subscriptions
   * method.
   * @param RenewalSettings $postBody
   * @param array $optParams Optional parameters.
   * @return Subscription
   */
  public function changeRenewalSettings($customerId, $subscriptionId, RenewalSettings $postBody, $optParams = [])
  {
    $params = ['customerId' => $customerId, 'subscriptionId' => $subscriptionId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('changeRenewalSettings', [$params], Subscription::class);
  }
  /**
   * Updates a subscription's user license settings. For more information about
   * updating an annual commitment plan or a flexible plan subscription’s
   * licenses, see [Manage Subscriptions](/admin-sdk/reseller/v1/how-
   * tos/manage_subscriptions#update_subscription_seat).
   * (subscriptions.changeSeats)
   *
   * @param string $customerId This can be either the customer's primary domain
   * name or the customer's unique identifier. If the domain name for a customer
   * changes, the old domain name cannot be used to access the customer, but the
   * customer's unique identifier (as returned by the API) can always be used. We
   * recommend storing the unique identifier in your systems where applicable.
   * @param string $subscriptionId This is a required property. The
   * `subscriptionId` is the subscription identifier and is unique for each
   * customer. Since a `subscriptionId` changes when a subscription is updated, we
   * recommend to not use this ID as a key for persistent data. And the
   * `subscriptionId` can be found using the retrieve all reseller subscriptions
   * method.
   * @param Seats $postBody
   * @param array $optParams Optional parameters.
   * @return Subscription
   */
  public function changeSeats($customerId, $subscriptionId, Seats $postBody, $optParams = [])
  {
    $params = ['customerId' => $customerId, 'subscriptionId' => $subscriptionId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('changeSeats', [$params], Subscription::class);
  }
  /**
   * Cancels, suspends, or transfers a subscription to direct.
   * (subscriptions.delete)
   *
   * @param string $customerId This can be either the customer's primary domain
   * name or the customer's unique identifier. If the domain name for a customer
   * changes, the old domain name cannot be used to access the customer, but the
   * customer's unique identifier (as returned by the API) can always be used. We
   * recommend storing the unique identifier in your systems where applicable.
   * @param string $subscriptionId This is a required property. The
   * `subscriptionId` is the subscription identifier and is unique for each
   * customer. Since a `subscriptionId` changes when a subscription is updated, we
   * recommend to not use this ID as a key for persistent data. And the
   * `subscriptionId` can be found using the retrieve all reseller subscriptions
   * method.
   * @param string $deletionType The `deletionType` query string enables the
   * cancellation, downgrade, or suspension of a subscription.
   * @param array $optParams Optional parameters.
   */
  public function delete($customerId, $subscriptionId, $deletionType, $optParams = [])
  {
    $params = ['customerId' => $customerId, 'subscriptionId' => $subscriptionId, 'deletionType' => $deletionType];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Gets a specific subscription. The `subscriptionId` can be found using the
   * [Retrieve all reseller subscriptions](/admin-sdk/reseller/v1/how-
   * tos/manage_subscriptions#get_all_subscriptions) method. For more information
   * about retrieving a specific subscription, see the information descrived in
   * [manage subscriptions](/admin-sdk/reseller/v1/how-
   * tos/manage_subscriptions#get_subscription). (subscriptions.get)
   *
   * @param string $customerId This can be either the customer's primary domain
   * name or the customer's unique identifier. If the domain name for a customer
   * changes, the old domain name cannot be used to access the customer, but the
   * customer's unique identifier (as returned by the API) can always be used. We
   * recommend storing the unique identifier in your systems where applicable.
   * @param string $subscriptionId This is a required property. The
   * `subscriptionId` is the subscription identifier and is unique for each
   * customer. Since a `subscriptionId` changes when a subscription is updated, we
   * recommend to not use this ID as a key for persistent data. And the
   * `subscriptionId` can be found using the retrieve all reseller subscriptions
   * method.
   * @param array $optParams Optional parameters.
   * @return Subscription
   */
  public function get($customerId, $subscriptionId, $optParams = [])
  {
    $params = ['customerId' => $customerId, 'subscriptionId' => $subscriptionId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Subscription::class);
  }
  /**
   * Creates or transfer a subscription. Create a subscription for a customer's
   * account that you ordered using the [Order a new customer account](/admin-
   * sdk/reseller/v1/reference/customers/insert.html) method. For more information
   * about creating a subscription for different payment plans, see [manage
   * subscriptions](/admin-sdk/reseller/v1/how-
   * tos/manage_subscriptions#create_subscription).\ If you did not order the
   * customer's account using the customer insert method, use the customer's
   * `customerAuthToken` when creating a subscription for that customer. If
   * transferring a G Suite subscription with an associated Google Drive or Google
   * Vault subscription, use the [batch operation](/admin-sdk/reseller/v1/how-
   * tos/batch.html) to transfer all of these subscriptions. For more information,
   * see how to [transfer subscriptions](/admin-sdk/reseller/v1/how-
   * tos/manage_subscriptions#transfer_a_subscription). (subscriptions.insert)
   *
   * @param string $customerId This can be either the customer's primary domain
   * name or the customer's unique identifier. If the domain name for a customer
   * changes, the old domain name cannot be used to access the customer, but the
   * customer's unique identifier (as returned by the API) can always be used. We
   * recommend storing the unique identifier in your systems where applicable.
   * @param Subscription $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customerAuthToken The `customerAuthToken` query string is
   * required when creating a resold account that transfers a direct customer's
   * subscription or transfers another reseller customer's subscription to your
   * reseller management. This is a hexadecimal authentication token needed to
   * complete the subscription transfer. For more information, see the
   * administrator help center.
   * @return Subscription
   */
  public function insert($customerId, Subscription $postBody, $optParams = [])
  {
    $params = ['customerId' => $customerId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Subscription::class);
  }
  /**
   * Lists of subscriptions managed by the reseller. The list can be all
   * subscriptions, all of a customer's subscriptions, or all of a customer's
   * transferable subscriptions. Optionally, this method can filter the response
   * by a `customerNamePrefix`. For more information, see [manage subscriptions
   * ](/admin-sdk/reseller/v1/how-tos/manage_subscriptions).
   * (subscriptions.listSubscriptions)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customerAuthToken The `customerAuthToken` query string is
   * required when creating a resold account that transfers a direct customer's
   * subscription or transfers another reseller customer's subscription to your
   * reseller management. This is a hexadecimal authentication token needed to
   * complete the subscription transfer. For more information, see the
   * administrator help center.
   * @opt_param string customerId This can be either the customer's primary domain
   * name or the customer's unique identifier. If the domain name for a customer
   * changes, the old domain name cannot be used to access the customer, but the
   * customer's unique identifier (as returned by the API) can always be used. We
   * recommend storing the unique identifier in your systems where applicable.
   * @opt_param string customerNamePrefix When retrieving all of your
   * subscriptions and filtering for specific customers, you can enter a prefix
   * for a customer name. Using an example customer group that includes
   * `exam.com`, `example20.com` and `example.com`: - `exa` -- Returns all
   * customer names that start with 'exa' which could include `exam.com`,
   * `example20.com`, and `example.com`. A name prefix is similar to using a
   * regular expression's asterisk, exa*. - `example` -- Returns `example20.com`
   * and `example.com`.
   * @opt_param string maxResults When retrieving a large list, the `maxResults`
   * is the maximum number of results per page. The `nextPageToken` value takes
   * you to the next page. The default is 20.
   * @opt_param string pageToken Token to specify next page in the list
   * @return SubscriptionsModel
   */
  public function listSubscriptions($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], SubscriptionsModel::class);
  }
  /**
   * Immediately move a 30-day free trial subscription to a paid service
   * subscription. This method is only applicable if a payment plan has already
   * been set up for the 30-day trial subscription. For more information, see
   * [manage subscriptions](/admin-sdk/reseller/v1/how-
   * tos/manage_subscriptions#paid_service). (subscriptions.startPaidService)
   *
   * @param string $customerId This can be either the customer's primary domain
   * name or the customer's unique identifier. If the domain name for a customer
   * changes, the old domain name cannot be used to access the customer, but the
   * customer's unique identifier (as returned by the API) can always be used. We
   * recommend storing the unique identifier in your systems where applicable.
   * @param string $subscriptionId This is a required property. The
   * `subscriptionId` is the subscription identifier and is unique for each
   * customer. Since a `subscriptionId` changes when a subscription is updated, we
   * recommend to not use this ID as a key for persistent data. And the
   * `subscriptionId` can be found using the retrieve all reseller subscriptions
   * method.
   * @param array $optParams Optional parameters.
   * @return Subscription
   */
  public function startPaidService($customerId, $subscriptionId, $optParams = [])
  {
    $params = ['customerId' => $customerId, 'subscriptionId' => $subscriptionId];
    $params = array_merge($params, $optParams);
    return $this->call('startPaidService', [$params], Subscription::class);
  }
  /**
   * Suspends an active subscription. You can use this method to suspend a paid
   * subscription that is currently in the `ACTIVE` state. * For `FLEXIBLE`
   * subscriptions, billing is paused. * For `ANNUAL_MONTHLY_PAY` or
   * `ANNUAL_YEARLY_PAY` subscriptions: * Suspending the subscription does not
   * change the renewal date that was originally committed to. * A suspended
   * subscription does not renew. If you activate the subscription after the
   * original renewal date, a new annual subscription will be created, starting on
   * the day of activation. We strongly encourage you to suspend subscriptions
   * only for short periods of time as suspensions over 60 days may result in the
   * subscription being cancelled. (subscriptions.suspend)
   *
   * @param string $customerId This can be either the customer's primary domain
   * name or the customer's unique identifier. If the domain name for a customer
   * changes, the old domain name cannot be used to access the customer, but the
   * customer's unique identifier (as returned by the API) can always be used. We
   * recommend storing the unique identifier in your systems where applicable.
   * @param string $subscriptionId This is a required property. The
   * `subscriptionId` is the subscription identifier and is unique for each
   * customer. Since a `subscriptionId` changes when a subscription is updated, we
   * recommend to not use this ID as a key for persistent data. And the
   * `subscriptionId` can be found using the retrieve all reseller subscriptions
   * method.
   * @param array $optParams Optional parameters.
   * @return Subscription
   */
  public function suspend($customerId, $subscriptionId, $optParams = [])
  {
    $params = ['customerId' => $customerId, 'subscriptionId' => $subscriptionId];
    $params = array_merge($params, $optParams);
    return $this->call('suspend', [$params], Subscription::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Subscriptions::class, 'Google_Service_Reseller_Resource_Subscriptions');
