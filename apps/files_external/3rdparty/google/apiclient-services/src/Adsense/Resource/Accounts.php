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

namespace Google\Service\Adsense\Resource;

use Google\Service\Adsense\Account;
use Google\Service\Adsense\ListAccountsResponse;
use Google\Service\Adsense\ListChildAccountsResponse;

/**
 * The "accounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adsenseService = new Google\Service\Adsense(...);
 *   $accounts = $adsenseService->accounts;
 *  </code>
 */
class Accounts extends \Google\Service\Resource
{
  /**
   * Gets information about the selected AdSense account. (accounts.get)
   *
   * @param string $name Required. Account to get information about. Format:
   * accounts/{account}
   * @param array $optParams Optional parameters.
   * @return Account
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Account::class);
  }
  /**
   * Lists all accounts available to this user. (accounts.listAccounts)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of accounts to include in the
   * response, used for paging. If unspecified, at most 10000 accounts will be
   * returned. The maximum value is 10000; values above 10000 will be coerced to
   * 10000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListAccounts` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListAccounts` must match the
   * call that provided the page token.
   * @return ListAccountsResponse
   */
  public function listAccounts($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListAccountsResponse::class);
  }
  /**
   * Lists all accounts directly managed by the given AdSense account.
   * (accounts.listChildAccounts)
   *
   * @param string $parent Required. The parent account, which owns the child
   * accounts. Format: accounts/{account}
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of accounts to include in the
   * response, used for paging. If unspecified, at most 10000 accounts will be
   * returned. The maximum value is 10000; values above 10000 will be coerced to
   * 10000.
   * @opt_param string pageToken A page token, received from a previous
   * `ListAccounts` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListAccounts` must match the
   * call that provided the page token.
   * @return ListChildAccountsResponse
   */
  public function listChildAccounts($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('listChildAccounts', [$params], ListChildAccountsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Accounts::class, 'Google_Service_Adsense_Resource_Accounts');
