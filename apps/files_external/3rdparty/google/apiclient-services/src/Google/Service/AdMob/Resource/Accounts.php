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
 *   $admobService = new Google_Service_AdMob(...);
 *   $accounts = $admobService->accounts;
 *  </code>
 */
class Google_Service_AdMob_Resource_Accounts extends Google_Service_Resource
{
  /**
   * Gets information about the specified AdMob publisher account. (accounts.get)
   *
   * @param string $name Resource name of the publisher account to retrieve.
   * Example: accounts/pub-9876543210987654
   * @param array $optParams Optional parameters.
   * @return Google_Service_AdMob_PublisherAccount
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AdMob_PublisherAccount");
  }
  /**
   * Lists the AdMob publisher account accessible with the client credential.
   * Currently, all credentials have access to at most one AdMob account.
   * (accounts.listAccounts)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The value returned by the last
   * `ListPublisherAccountsResponse`; indicates that this is a continuation of a
   * prior `ListPublisherAccounts` call, and that the system should return the
   * next page of data.
   * @opt_param int pageSize Maximum number of accounts to return.
   * @return Google_Service_AdMob_ListPublisherAccountsResponse
   */
  public function listAccounts($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AdMob_ListPublisherAccountsResponse");
  }
}
