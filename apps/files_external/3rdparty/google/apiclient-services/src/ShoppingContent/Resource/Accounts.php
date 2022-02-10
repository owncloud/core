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

namespace Google\Service\ShoppingContent\Resource;

use Google\Service\ShoppingContent\Account;
use Google\Service\ShoppingContent\AccountsAuthInfoResponse;
use Google\Service\ShoppingContent\AccountsClaimWebsiteResponse;
use Google\Service\ShoppingContent\AccountsCustomBatchRequest;
use Google\Service\ShoppingContent\AccountsCustomBatchResponse;
use Google\Service\ShoppingContent\AccountsLinkRequest;
use Google\Service\ShoppingContent\AccountsLinkResponse;
use Google\Service\ShoppingContent\AccountsListLinksResponse;
use Google\Service\ShoppingContent\AccountsListResponse;
use Google\Service\ShoppingContent\AccountsUpdateLabelsRequest;
use Google\Service\ShoppingContent\AccountsUpdateLabelsResponse;
use Google\Service\ShoppingContent\RequestPhoneVerificationRequest;
use Google\Service\ShoppingContent\RequestPhoneVerificationResponse;
use Google\Service\ShoppingContent\VerifyPhoneNumberRequest;
use Google\Service\ShoppingContent\VerifyPhoneNumberResponse;

/**
 * The "accounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google\Service\ShoppingContent(...);
 *   $accounts = $contentService->accounts;
 *  </code>
 */
class Accounts extends \Google\Service\Resource
{
  /**
   * Returns information about the authenticated user. (accounts.authinfo)
   *
   * @param array $optParams Optional parameters.
   * @return AccountsAuthInfoResponse
   */
  public function authinfo($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('authinfo', [$params], AccountsAuthInfoResponse::class);
  }
  /**
   * Claims the website of a Merchant Center sub-account. (accounts.claimwebsite)
   *
   * @param string $merchantId The ID of the managing account. If this parameter
   * is not the same as accountId, then this account must be a multi-client
   * account and `accountId` must be the ID of a sub-account of this account.
   * @param string $accountId The ID of the account whose website is claimed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool overwrite Only available to selected merchants, for example
   * multi-client accounts (MCAs) and their sub-accounts. When set to `True`, this
   * flag removes any existing claim on the requested website and replaces it with
   * a claim from the account that makes the request.
   * @return AccountsClaimWebsiteResponse
   */
  public function claimwebsite($merchantId, $accountId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'accountId' => $accountId];
    $params = array_merge($params, $optParams);
    return $this->call('claimwebsite', [$params], AccountsClaimWebsiteResponse::class);
  }
  /**
   * Retrieves, inserts, updates, and deletes multiple Merchant Center
   * (sub-)accounts in a single request. (accounts.custombatch)
   *
   * @param AccountsCustomBatchRequest $postBody
   * @param array $optParams Optional parameters.
   * @return AccountsCustomBatchResponse
   */
  public function custombatch(AccountsCustomBatchRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('custombatch', [$params], AccountsCustomBatchResponse::class);
  }
  /**
   * Deletes a Merchant Center sub-account. (accounts.delete)
   *
   * @param string $merchantId The ID of the managing account. This must be a
   * multi-client account, and accountId must be the ID of a sub-account of this
   * account.
   * @param string $accountId The ID of the account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool force Flag to delete sub-accounts with products. The default
   * value is false.
   */
  public function delete($merchantId, $accountId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'accountId' => $accountId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Retrieves a Merchant Center account. (accounts.get)
   *
   * @param string $merchantId The ID of the managing account. If this parameter
   * is not the same as accountId, then this account must be a multi-client
   * account and `accountId` must be the ID of a sub-account of this account.
   * @param string $accountId The ID of the account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string view Controls which fields will be populated. Acceptable
   * values are: "merchant" and "css". The default value is "merchant".
   * @return Account
   */
  public function get($merchantId, $accountId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'accountId' => $accountId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Account::class);
  }
  /**
   * Creates a Merchant Center sub-account. (accounts.insert)
   *
   * @param string $merchantId The ID of the managing account. This must be a
   * multi-client account.
   * @param Account $postBody
   * @param array $optParams Optional parameters.
   * @return Account
   */
  public function insert($merchantId, Account $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Account::class);
  }
  /**
   * Performs an action on a link between two Merchant Center accounts, namely
   * accountId and linkedAccountId. (accounts.link)
   *
   * @param string $merchantId The ID of the managing account. If this parameter
   * is not the same as accountId, then this account must be a multi-client
   * account and `accountId` must be the ID of a sub-account of this account.
   * @param string $accountId The ID of the account that should be linked.
   * @param AccountsLinkRequest $postBody
   * @param array $optParams Optional parameters.
   * @return AccountsLinkResponse
   */
  public function link($merchantId, $accountId, AccountsLinkRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'accountId' => $accountId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('link', [$params], AccountsLinkResponse::class);
  }
  /**
   * Lists the sub-accounts in your Merchant Center account.
   * (accounts.listAccounts)
   *
   * @param string $merchantId The ID of the managing account. This must be a
   * multi-client account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string label If view is set to "css", only return accounts that
   * are assigned label with given ID.
   * @opt_param string maxResults The maximum number of accounts to return in the
   * response, used for paging.
   * @opt_param string name If set, only the accounts with the given name (case
   * sensitive) will be returned.
   * @opt_param string pageToken The token returned by the previous request.
   * @opt_param string view Controls which fields will be populated. Acceptable
   * values are: "merchant" and "css". The default value is "merchant".
   * @return AccountsListResponse
   */
  public function listAccounts($merchantId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], AccountsListResponse::class);
  }
  /**
   * Returns the list of accounts linked to your Merchant Center account.
   * (accounts.listlinks)
   *
   * @param string $merchantId The ID of the managing account. If this parameter
   * is not the same as accountId, then this account must be a multi-client
   * account and `accountId` must be the ID of a sub-account of this account.
   * @param string $accountId The ID of the account for which to list links.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults The maximum number of links to return in the
   * response, used for pagination. The minimum allowed value is 5 results per
   * page. If provided value is lower than 5, it will be automatically increased
   * to 5.
   * @opt_param string pageToken The token returned by the previous request.
   * @return AccountsListLinksResponse
   */
  public function listlinks($merchantId, $accountId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'accountId' => $accountId];
    $params = array_merge($params, $optParams);
    return $this->call('listlinks', [$params], AccountsListLinksResponse::class);
  }
  /**
   * Request verification code to start phone verification.
   * (accounts.requestphoneverification)
   *
   * @param string $merchantId Required. The ID of the managing account. If this
   * parameter is not the same as accountId, then this account must be a multi-
   * client account and accountId must be the ID of a sub-account of this account.
   * @param string $accountId Required. The ID of the account.
   * @param RequestPhoneVerificationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return RequestPhoneVerificationResponse
   */
  public function requestphoneverification($merchantId, $accountId, RequestPhoneVerificationRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'accountId' => $accountId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('requestphoneverification', [$params], RequestPhoneVerificationResponse::class);
  }
  /**
   * Updates a Merchant Center account. Any fields that are not provided are
   * deleted from the resource. (accounts.update)
   *
   * @param string $merchantId The ID of the managing account. If this parameter
   * is not the same as accountId, then this account must be a multi-client
   * account and `accountId` must be the ID of a sub-account of this account.
   * @param string $accountId The ID of the account.
   * @param Account $postBody
   * @param array $optParams Optional parameters.
   * @return Account
   */
  public function update($merchantId, $accountId, Account $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'accountId' => $accountId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Account::class);
  }
  /**
   * Updates labels that are assigned to the Merchant Center account by CSS user.
   * (accounts.updatelabels)
   *
   * @param string $merchantId The ID of the managing account.
   * @param string $accountId The ID of the account whose labels are updated.
   * @param AccountsUpdateLabelsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return AccountsUpdateLabelsResponse
   */
  public function updatelabels($merchantId, $accountId, AccountsUpdateLabelsRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'accountId' => $accountId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updatelabels', [$params], AccountsUpdateLabelsResponse::class);
  }
  /**
   * Validates verification code to verify phone number for the account. If
   * successful this will overwrite the value of
   * `accounts.businessinformation.phoneNumber`. Only verified phone number will
   * replace an existing verified phone number. (accounts.verifyphonenumber)
   *
   * @param string $merchantId Required. The ID of the managing account. If this
   * parameter is not the same as accountId, then this account must be a multi-
   * client account and accountId must be the ID of a sub-account of this account.
   * @param string $accountId Required. The ID of the account.
   * @param VerifyPhoneNumberRequest $postBody
   * @param array $optParams Optional parameters.
   * @return VerifyPhoneNumberResponse
   */
  public function verifyphonenumber($merchantId, $accountId, VerifyPhoneNumberRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'accountId' => $accountId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('verifyphonenumber', [$params], VerifyPhoneNumberResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Accounts::class, 'Google_Service_ShoppingContent_Resource_Accounts');
