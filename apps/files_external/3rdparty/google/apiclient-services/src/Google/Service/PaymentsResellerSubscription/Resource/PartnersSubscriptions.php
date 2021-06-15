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
 *   $paymentsresellersubscriptionService = new Google_Service_PaymentsResellerSubscription(...);
 *   $subscriptions = $paymentsresellersubscriptionService->subscriptions;
 *  </code>
 */
class Google_Service_PaymentsResellerSubscription_Resource_PartnersSubscriptions extends Google_Service_Resource
{
  /**
   * Used by partners to cancel a subscription service by the end of the current
   * billing cycle for their customers. It should be called directly by the
   * partner using service accounts. (subscriptions.cancel)
   *
   * @param string $name Required. The name of the subscription resource to be
   * cancelled. It will have the format of
   * "partners/{partner_id}/subscriptions/{subscription_id}"
   * @param Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1CancelSubscriptionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1CancelSubscriptionResponse
   */
  public function cancel($name, Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1CancelSubscriptionRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('cancel', array($params), "Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1CancelSubscriptionResponse");
  }
  /**
   * Used by partners to create a subscription for their customers. The created
   * subscription is associated with the end user inferred from the end user
   * credentials. This API must be authorized by the end user using OAuth.
   * (subscriptions.create)
   *
   * @param string $parent Required. The parent resource name, which is the
   * identifier of the partner. It will have the format of
   * "partners/{partner_id}".
   * @param Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1Subscription $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string subscriptionId Required. Identifies the subscription
   * resource on the Partner side. The value is restricted to 63 ASCII characters
   * at the maximum. If a subscription was previously created with the same
   * subscription_id, we will directly return that one.
   * @return Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1Subscription
   */
  public function create($parent, Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1Subscription $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1Subscription");
  }
  /**
   * Used by partners to entitle a previously provisioned subscription to the
   * current end user. The end user identity is inferred from the authorized
   * credential of the request. This API must be authorized by the end user using
   * OAuth. (subscriptions.entitle)
   *
   * @param string $name Required. The name of the subscription resource that is
   * entitled to the current end user. It will have the format of
   * "partners/{partner_id}/subscriptions/{subscription_id}"
   * @param Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1EntitleSubscriptionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1EntitleSubscriptionResponse
   */
  public function entitle($name, Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1EntitleSubscriptionRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('entitle', array($params), "Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1EntitleSubscriptionResponse");
  }
  /**
   * Used by partners to extend a subscription service for their customers. It
   * should be called directly by the partner using service accounts.
   * (subscriptions.extend)
   *
   * @param string $name Required. The name of the subscription resource to be
   * extended. It will have the format of
   * "partners/{partner_id}/subscriptions/{subscription_id}".
   * @param Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1ExtendSubscriptionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1ExtendSubscriptionResponse
   */
  public function extend($name, Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1ExtendSubscriptionRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('extend', array($params), "Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1ExtendSubscriptionResponse");
  }
  /**
   * Used by partners to get a subscription by id. It should be called directly by
   * the partner using service accounts. (subscriptions.get)
   *
   * @param string $name Required. The name of the subscription resource to
   * retrieve. It will have the format of
   * "partners/{partner_id}/subscriptions/{subscription_id}"
   * @param array $optParams Optional parameters.
   * @return Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1Subscription
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1Subscription");
  }
  /**
   * Used by partners to provision a subscription for their customers. This
   * creates a subscription without associating it with the end user account.
   * EntitleSubscription must be called separately using OAuth in order for the
   * end user account to be associated with the subscription. It should be called
   * directly by the partner using service accounts. (subscriptions.provision)
   *
   * @param string $parent Required. The parent resource name, which is the
   * identifier of the partner. It will have the format of
   * "partners/{partner_id}".
   * @param Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1Subscription $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string subscriptionId Required. Identifies the subscription
   * resource on the Partner side. The value is restricted to 63 ASCII characters
   * at the maximum. If a subscription was previously created with the same
   * subscription_id, we will directly return that one.
   * @return Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1Subscription
   */
  public function provision($parent, Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1Subscription $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('provision', array($params), "Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1Subscription");
  }
  /**
   * Used by partners to revoke the pending cancellation of a subscription, which
   * is currently in `STATE_CANCEL_AT_END_OF_CYCLE` state. If the subscription is
   * already cancelled, the request will fail. It should be called directly by the
   * partner using service accounts. (subscriptions.undoCancel)
   *
   * @param string $name Required. The name of the subscription resource whose
   * pending cancellation needs to be undone. It will have the format of
   * "partners/{partner_id}/subscriptions/{subscription_id}"
   * @param Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1UndoCancelSubscriptionRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1UndoCancelSubscriptionResponse
   */
  public function undoCancel($name, Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1UndoCancelSubscriptionRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('undoCancel', array($params), "Google_Service_PaymentsResellerSubscription_GoogleCloudPaymentsResellerSubscriptionV1UndoCancelSubscriptionResponse");
  }
}
