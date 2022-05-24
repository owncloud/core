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

namespace Google\Service\AdMob\Resource;

use Google\Service\AdMob\ListPublisherAccountsResponse;
use Google\Service\AdMob\PublisherAccount;

/**
 * The "accounts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $admobService = new Google\Service\AdMob(...);
 *   $accounts = $admobService->accounts;
 *  </code>
 */
class Accounts extends \Google\Service\Resource
{
  /**
   * Gets information about the specified AdMob publisher account. (accounts.get)
   *
   * @param string $name Resource name of the publisher account to retrieve.
   * Example: accounts/pub-9876543210987654
   * @param array $optParams Optional parameters.
   * @return PublisherAccount
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], PublisherAccount::class);
  }
  /**
   * Lists the AdMob publisher account that was most recently signed in to from
   * the AdMob UI. For more information, see
   * https://support.google.com/admob/answer/10243672. (accounts.listAccounts)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of accounts to return.
   * @opt_param string pageToken The value returned by the last
   * `ListPublisherAccountsResponse`; indicates that this is a continuation of a
   * prior `ListPublisherAccounts` call, and that the system should return the
   * next page of data.
   * @return ListPublisherAccountsResponse
   */
  public function listAccounts($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListPublisherAccountsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Accounts::class, 'Google_Service_AdMob_Resource_Accounts');
