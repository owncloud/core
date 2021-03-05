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
 * The "accounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudchannelService = new Google_Service_Cloudchannel(...);
 *   $accounts = $cloudchannelService->accounts;
 *  </code>
 */
class Google_Service_Cloudchannel_Resource_Accounts extends Google_Service_Resource
{
  /**
   * Confirms the existence of Cloud Identity accounts, based on the domain and
   * whether the Cloud Identity accounts are owned by the reseller. Possible Error
   * Codes: * PERMISSION_DENIED: If the reseller account making the request and
   * the reseller account being queried for are different. * INVALID_ARGUMENT:
   * Missing or invalid required parameters in the request. * INVALID_VALUE:
   * Invalid domain value in the request. Return Value: List of
   * CloudIdentityCustomerAccount resources for the domain. List may be empty.
   * Note: in the v1alpha1 version of the API, a NOT_FOUND error is returned if no
   * CloudIdentityCustomerAccount resources match the domain.
   * (accounts.checkCloudIdentityAccountsExist)
   *
   * @param string $parent Required. The resource name of the reseller account.
   * The parent takes the format: accounts/{account_id}
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1CheckCloudIdentityAccountsExistRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1CheckCloudIdentityAccountsExistResponse
   */
  public function checkCloudIdentityAccountsExist($parent, Google_Service_Cloudchannel_GoogleCloudChannelV1CheckCloudIdentityAccountsExistRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('checkCloudIdentityAccountsExist', array($params), "Google_Service_Cloudchannel_GoogleCloudChannelV1CheckCloudIdentityAccountsExistResponse");
  }
  /**
   * Lists service accounts with subscriber privileges on the Cloud Pub/Sub topic
   * created for this Channel Services account. Possible Error Codes: *
   * PERMISSION_DENIED: If the reseller account making the request and the
   * reseller account being provided are different, or if the account is not a
   * super admin. * INVALID_ARGUMENT: Missing or invalid required parameters in
   * the request. * NOT_FOUND: If the topic resource doesn't exist. * INTERNAL:
   * Any non-user error related to a technical issue in the backend. In this case,
   * contact Cloud Channel support. * UNKNOWN: Any non-user error related to a
   * technical issue in the backend. In this case, contact Cloud Channel support.
   * Return Value: List of service email addresses if successful, otherwise error
   * is returned. (accounts.listSubscribers)
   *
   * @param string $account Required. Resource name of the account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of service accounts to
   * return. The service may return fewer than this value. If unspecified, at most
   * 100 service accounts will be returned. The maximum value is 1000; values
   * above 1000 will be coerced to 1000.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * `ListSubscribers` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListSubscribers` must match the
   * call that provided the page token.
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1ListSubscribersResponse
   */
  public function listSubscribers($account, $optParams = array())
  {
    $params = array('account' => $account);
    $params = array_merge($params, $optParams);
    return $this->call('listSubscribers', array($params), "Google_Service_Cloudchannel_GoogleCloudChannelV1ListSubscribersResponse");
  }
  /**
   * List TransferableOffers of a customer based on Cloud Identity ID or Customer
   * Name in the request. This method is used when a reseller gets the entitlement
   * information of a customer that is not owned. The reseller should provide the
   * customer's Cloud Identity ID or Customer Name. Possible Error Codes: *
   * PERMISSION_DENIED: Appears because of one of the following: * If the customer
   * doesn't belong to the reseller and no auth token or invalid auth token is
   * supplied. * If the reseller account making the request and the reseller
   * account being queried for are different. * INVALID_ARGUMENT: Missing or
   * invalid required parameters in the request. Return Value: List of
   * TransferableOffer for the given customer and SKU.
   * (accounts.listTransferableOffers)
   *
   * @param string $parent Required. The resource name of the reseller's account.
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1ListTransferableOffersRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1ListTransferableOffersResponse
   */
  public function listTransferableOffers($parent, Google_Service_Cloudchannel_GoogleCloudChannelV1ListTransferableOffersRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('listTransferableOffers', array($params), "Google_Service_Cloudchannel_GoogleCloudChannelV1ListTransferableOffersResponse");
  }
  /**
   * List TransferableSkus of a customer based on Cloud Identity ID or Customer
   * Name in the request. This method is used when a reseller lists the
   * entitlements information of a customer that is not owned. The reseller should
   * provide the customer's Cloud Identity ID or Customer Name. Possible Error
   * Codes: * PERMISSION_DENIED: Appears because of one of the following - * The
   * customer doesn't belong to the reseller and no auth token. * The supplied
   * auth token is invalid. * The reseller account making the request and the
   * queries reseller account are different. * INVALID_ARGUMENT: Missing or
   * invalid required parameters in the request. Return Value: List of
   * TransferableSku for the given customer. (accounts.listTransferableSkus)
   *
   * @param string $parent Required. The resource name of the reseller's account.
   * The parent takes the format: accounts/{account_id}
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1ListTransferableSkusRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1ListTransferableSkusResponse
   */
  public function listTransferableSkus($parent, Google_Service_Cloudchannel_GoogleCloudChannelV1ListTransferableSkusRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('listTransferableSkus', array($params), "Google_Service_Cloudchannel_GoogleCloudChannelV1ListTransferableSkusResponse");
  }
  /**
   * Registers a service account with subscriber privileges on the Cloud Pub/Sub
   * topic created for this Channel Services account. Once you create a
   * subscriber, you will get the events as per SubscriberEvent Possible Error
   * Codes: * PERMISSION_DENIED: If the reseller account making the request and
   * the reseller account being provided are different, or if the impersonated
   * user is not a super admin. * INVALID_ARGUMENT: Missing or invalid required
   * parameters in the request. * INTERNAL: Any non-user error related to a
   * technical issue in the backend. In this case, contact Cloud Channel support.
   * * UNKNOWN: Any non-user error related to a technical issue in the backend. In
   * this case, contact Cloud Channel support. Return Value: Topic name with
   * service email address registered if successful, otherwise error is returned.
   * (accounts.register)
   *
   * @param string $account Required. Resource name of the account.
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1RegisterSubscriberRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1RegisterSubscriberResponse
   */
  public function register($account, Google_Service_Cloudchannel_GoogleCloudChannelV1RegisterSubscriberRequest $postBody, $optParams = array())
  {
    $params = array('account' => $account, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('register', array($params), "Google_Service_Cloudchannel_GoogleCloudChannelV1RegisterSubscriberResponse");
  }
  /**
   * Unregisters a service account with subscriber privileges on the Cloud Pub/Sub
   * topic created for this Channel Services account. If there are no more service
   * account left with sunbscriber privileges, the topic will be deleted. You can
   * check this by calling ListSubscribers api. Possible Error Codes: *
   * PERMISSION_DENIED: If the reseller account making the request and the
   * reseller account being provided are different, or if the impersonated user is
   * not a super admin. * INVALID_ARGUMENT: Missing or invalid required parameters
   * in the request. * NOT_FOUND: If the topic resource doesn't exist. * INTERNAL:
   * Any non-user error related to a technical issue in the backend. In this case,
   * contact Cloud Channel support. * UNKNOWN: Any non-user error related to a
   * technical issue in the backend. In this case, contact Cloud Channel support.
   * Return Value: Topic name from which service email address has been
   * unregistered if successful, otherwise error is returned. If the service email
   * was already not associated with the topic, the success response will be
   * returned. (accounts.unregister)
   *
   * @param string $account Required. Resource name of the account.
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1UnregisterSubscriberRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1UnregisterSubscriberResponse
   */
  public function unregister($account, Google_Service_Cloudchannel_GoogleCloudChannelV1UnregisterSubscriberRequest $postBody, $optParams = array())
  {
    $params = array('account' => $account, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('unregister', array($params), "Google_Service_Cloudchannel_GoogleCloudChannelV1UnregisterSubscriberResponse");
  }
}
