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
 *   $mybusinessaccountmanagementService = new Google_Service_MyBusinessAccountManagement(...);
 *   $accounts = $mybusinessaccountmanagementService->accounts;
 *  </code>
 */
class Google_Service_MyBusinessAccountManagement_Resource_Accounts extends Google_Service_Resource
{
  /**
   * Creates an account with the specified name and type under the given parent. -
   * Personal accounts and Organizations cannot be created. - User Groups cannot
   * be created with a Personal account as primary owner. - Location Groups cannot
   * be created with a primary owner of a Personal account if the Personal account
   * is in an Organization. - Location Groups cannot own Location Groups.
   * (accounts.create)
   *
   * @param Google_Service_MyBusinessAccountManagement_Account $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusinessAccountManagement_Account
   */
  public function create(Google_Service_MyBusinessAccountManagement_Account $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_MyBusinessAccountManagement_Account");
  }
  /**
   * Gets the specified account. Returns `NOT_FOUND` if the account does not exist
   * or if the caller does not have access rights to it. (accounts.get)
   *
   * @param string $name Required. The name of the account to fetch.
   * @param array $optParams Optional parameters.
   * @return Google_Service_MyBusinessAccountManagement_Account
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_MyBusinessAccountManagement_Account");
  }
  /**
   * Lists all of the accounts for the authenticated user. This includes all
   * accounts that the user owns, as well as any accounts for which the user has
   * management rights. (accounts.listAccounts)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. A filter constraining the accounts to
   * return. The response includes only entries that match the filter. If `filter`
   * is empty, then no constraints are applied and all accounts (paginated) are
   * retrieved for the requested account. For example, a request with the filter
   * `type=USER_GROUP` will only return user groups. The `type` field is the only
   * supported filter.
   * @opt_param int pageSize Optional. How many accounts to fetch per page. The
   * minimum supported page_size is 2. The default and maximum is 20.
   * @opt_param string pageToken Optional. If specified, the next page of accounts
   * is retrieved. The `pageToken` is returned when a call to `accounts.list`
   * returns more results than can fit into the requested page size.
   * @opt_param string parentAccount Optional. The resource name of the account
   * for which the list of directly accessible accounts is to be retrieved. This
   * only makes sense for Organizations and User Groups. If empty, will return
   * `ListAccounts` for the authenticated user. `accounts/{account_id}`.
   * @return Google_Service_MyBusinessAccountManagement_ListAccountsResponse
   */
  public function listAccounts($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_MyBusinessAccountManagement_ListAccountsResponse");
  }
  /**
   * Updates the specified business account. Personal accounts cannot be updated
   * using this method. (accounts.patch)
   *
   * @param string $name Immutable. The resource name, in the format
   * `accounts/{account_id}`.
   * @param Google_Service_MyBusinessAccountManagement_Account $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. The specific fields that should be
   * updated. The only editable field is `accountName`.
   * @opt_param bool validateOnly Optional. If true, the request is validated
   * without actually updating the account.
   * @return Google_Service_MyBusinessAccountManagement_Account
   */
  public function patch($name, Google_Service_MyBusinessAccountManagement_Account $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_MyBusinessAccountManagement_Account");
  }
}
