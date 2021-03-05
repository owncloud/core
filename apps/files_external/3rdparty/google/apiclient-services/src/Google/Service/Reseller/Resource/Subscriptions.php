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
 * The "subscriptions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $resellerService = new Google_Service_Reseller(...);
 *   $subscriptions = $resellerService->subscriptions;
 *  </code>
 */
class Google_Service_Reseller_Resource_Subscriptions extends Google_Service_Resource
{
  /**
   * Activates a subscription previously suspended by the reseller. If you did not
   * suspend the customer subscription and it is suspended for any other reason,
   * such as for abuse or a pending ToS acceptance, this call will not reactivate
   * the customer subscription. (subscriptions.activate)
   *
   * @param string $customerId Either the customer's primary domain name or the
   * customer's unique identifier. If using the domain name, we do not recommend
   * using a `customerId` as a key for persistent data. If the domain name for a
   * `customerId` is changed, the Google system automatically updates.
   * @param string $subscriptionId This is a required property. The
   * `subscriptionId` is the subscription identifier and is unique for each
   * customer. Since a `subscriptionId` changes when a subscription is updated, we
   * recommend to not use this ID as a key for persistent data. And the
   * `subscriptionId` can be found using the retrieve all reseller subscriptions
   * method.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Reseller_Subscription
   */
  public function activate($customerId, $subscriptionId, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'subscriptionId' => $subscriptionId);
    $params = array_merge($params, $optParams);
    return $this->call('activate', array($params), "Google_Service_Reseller_Subscription");
  }
  /**
   * Update a subscription plan. Use this method to update a plan for a 30-day
   * trial or a flexible plan subscription to an annual commitment plan with
   * monthly or yearly payments. How a plan is updated differs depending on the
   * plan and the products. For more information, see the description in [manage
   * subscriptions](/admin-sdk/reseller/v1/how-
   * tos/manage_subscriptions#update_subscription_plan).
   * (subscriptions.changePlan)
   *
   * @param string $customerId Either the customer's primary domain name or the
   * customer's unique identifier. If using the domain name, we do not recommend
   * using a `customerId` as a key for persistent data. If the domain name for a
   * `customerId` is changed, the Google system automatically updates.
   * @param string $subscriptionId This is a required property. The
   * `subscriptionId` is the subscription identifier and is unique for each
   * customer. Since a `subscriptionId` changes when a subscription is updated, we
   * recommend to not use this ID as a key for persistent data. And the
   * `subscriptionId` can be found using the retrieve all reseller subscriptions
   * method.
   * @param Google_Service_Reseller_ChangePlanRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Reseller_Subscription
   */
  public function changePlan($customerId, $subscriptionId, Google_Service_Reseller_ChangePlanRequest $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'subscriptionId' => $subscriptionId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('changePlan', array($params), "Google_Service_Reseller_Subscription");
  }
  /**
   * Update a user license's renewal settings. This is applicable for accounts
   * with annual commitment plans only. For more information, see the description
   * in [manage subscriptions](/admin-sdk/reseller/v1/how-
   * tos/manage_subscriptions#update_renewal).
   * (subscriptions.changeRenewalSettings)
   *
   * @param string $customerId Either the customer's primary domain name or the
   * customer's unique identifier. If using the domain name, we do not recommend
   * using a `customerId` as a key for persistent data. If the domain name for a
   * `customerId` is changed, the Google system automatically updates.
   * @param string $subscriptionId This is a required property. The
   * `subscriptionId` is the subscription identifier and is unique for each
   * customer. Since a `subscriptionId` changes when a subscription is updated, we
   * recommend to not use this ID as a key for persistent data. And the
   * `subscriptionId` can be found using the retrieve all reseller subscriptions
   * method.
   * @param Google_Service_Reseller_RenewalSettings $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Reseller_Subscription
   */
  public function changeRenewalSettings($customerId, $subscriptionId, Google_Service_Reseller_RenewalSettings $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'subscriptionId' => $subscriptionId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('changeRenewalSettings', array($params), "Google_Service_Reseller_Subscription");
  }
  /**
   * Update a subscription's user license settings. For more information about
   * updating an annual commitment plan or a flexible plan subscription’s
   * licenses, see [Manage Subscriptions](/admin-sdk/reseller/v1/how-
   * tos/manage_subscriptions#update_subscription_seat).
   * (subscriptions.changeSeats)
   *
   * @param string $customerId Either the customer's primary domain name or the
   * customer's unique identifier. If using the domain name, we do not recommend
   * using a `customerId` as a key for persistent data. If the domain name for a
   * `customerId` is changed, the Google system automatically updates.
   * @param string $subscriptionId This is a required property. The
   * `subscriptionId` is the subscription identifier and is unique for each
   * customer. Since a `subscriptionId` changes when a subscription is updated, we
   * recommend to not use this ID as a key for persistent data. And the
   * `subscriptionId` can be found using the retrieve all reseller subscriptions
   * method.
   * @param Google_Service_Reseller_Seats $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Reseller_Subscription
   */
  public function changeSeats($customerId, $subscriptionId, Google_Service_Reseller_Seats $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'subscriptionId' => $subscriptionId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('changeSeats', array($params), "Google_Service_Reseller_Subscription");
  }
  /**
   * Cancel, suspend, or transfer a subscription to direct. (subscriptions.delete)
   *
   * @param string $customerId Either the customer's primary domain name or the
   * customer's unique identifier. If using the domain name, we do not recommend
   * using a `customerId` as a key for persistent data. If the domain name for a
   * `customerId` is changed, the Google system automatically updates.
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
  public function delete($customerId, $subscriptionId, $deletionType, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'subscriptionId' => $subscriptionId, 'deletionType' => $deletionType);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Get a specific subscription. The `subscriptionId` can be found using the
   * [Retrieve all reseller subscriptions](/admin-sdk/reseller/v1/how-
   * tos/manage_subscriptions#get_all_subscriptions) method. For more information
   * about retrieving a specific subscription, see the information descrived in
   * [manage subscriptions](/admin-sdk/reseller/v1/how-
   * tos/manage_subscriptions#get_subscription). (subscriptions.get)
   *
   * @param string $customerId Either the customer's primary domain name or the
   * customer's unique identifier. If using the domain name, we do not recommend
   * using a `customerId` as a key for persistent data. If the domain name for a
   * `customerId` is changed, the Google system automatically updates.
   * @param string $subscriptionId This is a required property. The
   * `subscriptionId` is the subscription identifier and is unique for each
   * customer. Since a `subscriptionId` changes when a subscription is updated, we
   * recommend to not use this ID as a key for persistent data. And the
   * `subscriptionId` can be found using the retrieve all reseller subscriptions
   * method.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Reseller_Subscription
   */
  public function get($customerId, $subscriptionId, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'subscriptionId' => $subscriptionId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Reseller_Subscription");
  }
  /**
   * Create or transfer a subscription. Create a subscription for a customer's
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
   * @param string $customerId Either the customer's primary domain name or the
   * customer's unique identifier. If using the domain name, we do not recommend
   * using a `customerId` as a key for persistent data. If the domain name for a
   * `customerId` is changed, the Google system automatically updates.
   * @param Google_Service_Reseller_Subscription $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string customerAuthToken The `customerAuthToken` query string is
   * required when creating a resold account that transfers a direct customer's
   * subscription or transfers another reseller customer's subscription to your
   * reseller management. This is a hexadecimal authentication token needed to
   * complete the subscription transfer. For more information, see the
   * administrator help center.
   * @return Google_Service_Reseller_Subscription
   */
  public function insert($customerId, Google_Service_Reseller_Subscription $postBody, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_Reseller_Subscription");
  }
  /**
   * List of subscriptions managed by the reseller. The list can be all
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
   * @opt_param string customerId Either the customer's primary domain name or the
   * customer's unique identifier. If using the domain name, we do not recommend
   * using a `customerId` as a key for persistent data. If the domain name for a
   * `customerId` is changed, the Google system automatically updates.
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
   * @return Google_Service_Reseller_Subscriptions
   */
  public function listSubscriptions($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Reseller_Subscriptions");
  }
  /**
   * Immediately move a 30-day free trial subscription to a paid service
   * subscription. This method is only applicable if a payment plan has already
   * been set up for the 30-day trial subscription. For more information, see
   * [manage subscriptions](/admin-sdk/reseller/v1/how-
   * tos/manage_subscriptions#paid_service). (subscriptions.startPaidService)
   *
   * @param string $customerId Either the customer's primary domain name or the
   * customer's unique identifier. If using the domain name, we do not recommend
   * using a `customerId` as a key for persistent data. If the domain name for a
   * `customerId` is changed, the Google system automatically updates.
   * @param string $subscriptionId This is a required property. The
   * `subscriptionId` is the subscription identifier and is unique for each
   * customer. Since a `subscriptionId` changes when a subscription is updated, we
   * recommend to not use this ID as a key for persistent data. And the
   * `subscriptionId` can be found using the retrieve all reseller subscriptions
   * method.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Reseller_Subscription
   */
  public function startPaidService($customerId, $subscriptionId, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'subscriptionId' => $subscriptionId);
    $params = array_merge($params, $optParams);
    return $this->call('startPaidService', array($params), "Google_Service_Reseller_Subscription");
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
   * @param string $customerId Either the customer's primary domain name or the
   * customer's unique identifier. If using the domain name, we do not recommend
   * using a `customerId` as a key for persistent data. If the domain name for a
   * `customerId` is changed, the Google system automatically updates.
   * @param string $subscriptionId This is a required property. The
   * `subscriptionId` is the subscription identifier and is unique for each
   * customer. Since a `subscriptionId` changes when a subscription is updated, we
   * recommend to not use this ID as a key for persistent data. And the
   * `subscriptionId` can be found using the retrieve all reseller subscriptions
   * method.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Reseller_Subscription
   */
  public function suspend($customerId, $subscriptionId, $optParams = array())
  {
    $params = array('customerId' => $customerId, 'subscriptionId' => $subscriptionId);
    $params = array_merge($params, $optParams);
    return $this->call('suspend', array($params), "Google_Service_Reseller_Subscription");
  }
}
