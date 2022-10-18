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

namespace Google\Service\Cloudchannel\Resource;

use Google\Service\Cloudchannel\GoogleCloudChannelV1CheckCloudIdentityAccountsExistRequest;
use Google\Service\Cloudchannel\GoogleCloudChannelV1CheckCloudIdentityAccountsExistResponse;
use Google\Service\Cloudchannel\GoogleCloudChannelV1ListSubscribersResponse;
use Google\Service\Cloudchannel\GoogleCloudChannelV1ListTransferableOffersRequest;
use Google\Service\Cloudchannel\GoogleCloudChannelV1ListTransferableOffersResponse;
use Google\Service\Cloudchannel\GoogleCloudChannelV1ListTransferableSkusRequest;
use Google\Service\Cloudchannel\GoogleCloudChannelV1ListTransferableSkusResponse;
use Google\Service\Cloudchannel\GoogleCloudChannelV1RegisterSubscriberRequest;
use Google\Service\Cloudchannel\GoogleCloudChannelV1RegisterSubscriberResponse;
use Google\Service\Cloudchannel\GoogleCloudChannelV1UnregisterSubscriberRequest;
use Google\Service\Cloudchannel\GoogleCloudChannelV1UnregisterSubscriberResponse;

/**
 * The "accounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudchannelService = new Google\Service\Cloudchannel(...);
 *   $accounts = $cloudchannelService->accounts;
 *  </code>
 */
class Accounts extends \Google\Service\Resource
{
  /**
   * Confirms the existence of Cloud Identity accounts based on the domain and if
   * the Cloud Identity accounts are owned by the reseller. Possible error codes:
   * * PERMISSION_DENIED: The reseller account making the request is different
   * from the reseller account in the API request. * INVALID_ARGUMENT: Required
   * request parameters are missing or invalid. * INVALID_VALUE: Invalid domain
   * value in the request. Return value: A list of CloudIdentityCustomerAccount
   * resources for the domain (may be empty) Note: in the v1alpha1 version of the
   * API, a NOT_FOUND error returns if no CloudIdentityCustomerAccount resources
   * match the domain. (accounts.checkCloudIdentityAccountsExist)
   *
   * @param string $parent Required. The reseller account's resource name. Parent
   * uses the format: accounts/{account_id}
   * @param GoogleCloudChannelV1CheckCloudIdentityAccountsExistRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudChannelV1CheckCloudIdentityAccountsExistResponse
   */
  public function checkCloudIdentityAccountsExist($parent, GoogleCloudChannelV1CheckCloudIdentityAccountsExistRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('checkCloudIdentityAccountsExist', [$params], GoogleCloudChannelV1CheckCloudIdentityAccountsExistResponse::class);
  }
  /**
   * Lists service accounts with subscriber privileges on the Cloud Pub/Sub topic
   * created for this Channel Services account. Possible error codes: *
   * PERMISSION_DENIED: The reseller account making the request and the provided
   * reseller account are different, or the impersonated user is not a super
   * admin. * INVALID_ARGUMENT: Required request parameters are missing or
   * invalid. * NOT_FOUND: The topic resource doesn't exist. * INTERNAL: Any non-
   * user error related to a technical issue in the backend. Contact Cloud Channel
   * support. * UNKNOWN: Any non-user error related to a technical issue in the
   * backend. Contact Cloud Channel support. Return value: A list of service email
   * addresses. (accounts.listSubscribers)
   *
   * @param string $account Required. Resource name of the account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of service accounts to
   * return. The service may return fewer than this value. If unspecified, returns
   * at most 100 service accounts. The maximum value is 1000; the server will
   * coerce values above 1000.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * `ListSubscribers` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListSubscribers` must match the
   * call that provided the page token.
   * @return GoogleCloudChannelV1ListSubscribersResponse
   */
  public function listSubscribers($account, $optParams = [])
  {
    $params = ['account' => $account];
    $params = array_merge($params, $optParams);
    return $this->call('listSubscribers', [$params], GoogleCloudChannelV1ListSubscribersResponse::class);
  }
  /**
   * List TransferableOffers of a customer based on Cloud Identity ID or Customer
   * Name in the request. Use this method when a reseller gets the entitlement
   * information of an unowned customer. The reseller should provide the
   * customer's Cloud Identity ID or Customer Name. Possible error codes: *
   * PERMISSION_DENIED: * The customer doesn't belong to the reseller and has no
   * auth token. * The customer provided incorrect reseller information when
   * generating auth token. * The reseller account making the request is different
   * from the reseller account in the query. * INVALID_ARGUMENT: Required request
   * parameters are missing or invalid. Return value: List of TransferableOffer
   * for the given customer and SKU. (accounts.listTransferableOffers)
   *
   * @param string $parent Required. The resource name of the reseller's account.
   * @param GoogleCloudChannelV1ListTransferableOffersRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudChannelV1ListTransferableOffersResponse
   */
  public function listTransferableOffers($parent, GoogleCloudChannelV1ListTransferableOffersRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('listTransferableOffers', [$params], GoogleCloudChannelV1ListTransferableOffersResponse::class);
  }
  /**
   * List TransferableSkus of a customer based on the Cloud Identity ID or
   * Customer Name in the request. Use this method to list the entitlements
   * information of an unowned customer. You should provide the customer's Cloud
   * Identity ID or Customer Name. Possible error codes: * PERMISSION_DENIED: *
   * The customer doesn't belong to the reseller and has no auth token. * The
   * supplied auth token is invalid. * The reseller account making the request is
   * different from the reseller account in the query. * INVALID_ARGUMENT:
   * Required request parameters are missing or invalid. Return value: A list of
   * the customer's TransferableSku. (accounts.listTransferableSkus)
   *
   * @param string $parent Required. The reseller account's resource name. Parent
   * uses the format: accounts/{account_id}
   * @param GoogleCloudChannelV1ListTransferableSkusRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudChannelV1ListTransferableSkusResponse
   */
  public function listTransferableSkus($parent, GoogleCloudChannelV1ListTransferableSkusRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('listTransferableSkus', [$params], GoogleCloudChannelV1ListTransferableSkusResponse::class);
  }
  /**
   * Registers a service account with subscriber privileges on the Cloud Pub/Sub
   * topic for this Channel Services account. After you create a subscriber, you
   * get the events through SubscriberEvent Possible error codes: *
   * PERMISSION_DENIED: The reseller account making the request and the provided
   * reseller account are different, or the impersonated user is not a super
   * admin. * INVALID_ARGUMENT: Required request parameters are missing or
   * invalid. * INTERNAL: Any non-user error related to a technical issue in the
   * backend. Contact Cloud Channel support. * UNKNOWN: Any non-user error related
   * to a technical issue in the backend. Contact Cloud Channel support. Return
   * value: The topic name with the registered service email address.
   * (accounts.register)
   *
   * @param string $account Required. Resource name of the account.
   * @param GoogleCloudChannelV1RegisterSubscriberRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudChannelV1RegisterSubscriberResponse
   */
  public function register($account, GoogleCloudChannelV1RegisterSubscriberRequest $postBody, $optParams = [])
  {
    $params = ['account' => $account, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('register', [$params], GoogleCloudChannelV1RegisterSubscriberResponse::class);
  }
  /**
   * Unregisters a service account with subscriber privileges on the Cloud Pub/Sub
   * topic created for this Channel Services account. If there are no service
   * accounts left with subscriber privileges, this deletes the topic. You can
   * call ListSubscribers to check for these accounts. Possible error codes: *
   * PERMISSION_DENIED: The reseller account making the request and the provided
   * reseller account are different, or the impersonated user is not a super
   * admin. * INVALID_ARGUMENT: Required request parameters are missing or
   * invalid. * NOT_FOUND: The topic resource doesn't exist. * INTERNAL: Any non-
   * user error related to a technical issue in the backend. Contact Cloud Channel
   * support. * UNKNOWN: Any non-user error related to a technical issue in the
   * backend. Contact Cloud Channel support. Return value: The topic name that
   * unregistered the service email address. Returns a success response if the
   * service email address wasn't registered with the topic. (accounts.unregister)
   *
   * @param string $account Required. Resource name of the account.
   * @param GoogleCloudChannelV1UnregisterSubscriberRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudChannelV1UnregisterSubscriberResponse
   */
  public function unregister($account, GoogleCloudChannelV1UnregisterSubscriberRequest $postBody, $optParams = [])
  {
    $params = ['account' => $account, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('unregister', [$params], GoogleCloudChannelV1UnregisterSubscriberResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Accounts::class, 'Google_Service_Cloudchannel_Resource_Accounts');
