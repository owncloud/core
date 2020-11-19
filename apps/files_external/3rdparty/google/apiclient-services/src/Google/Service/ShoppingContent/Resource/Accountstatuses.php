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
 * The "accountstatuses" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $accountstatuses = $contentService->accountstatuses;
 *  </code>
 */
class Google_Service_ShoppingContent_Resource_Accountstatuses extends Google_Service_Resource
{
  /**
   * Retrieves multiple Merchant Center account statuses in a single request.
   * (accountstatuses.custombatch)
   *
   * @param Google_Service_ShoppingContent_AccountstatusesCustomBatchRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_AccountstatusesCustomBatchResponse
   */
  public function custombatch(Google_Service_ShoppingContent_AccountstatusesCustomBatchRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('custombatch', array($params), "Google_Service_ShoppingContent_AccountstatusesCustomBatchResponse");
  }
  /**
   * Retrieves the status of a Merchant Center account. No itemLevelIssues are
   * returned for multi-client accounts. (accountstatuses.get)
   *
   * @param string $merchantId The ID of the managing account. If this parameter
   * is not the same as accountId, then this account must be a multi-client
   * account and `accountId` must be the ID of a sub-account of this account.
   * @param string $accountId The ID of the account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string destinations If set, only issues for the specified
   * destinations are returned, otherwise only issues for the Shopping
   * destination.
   * @return Google_Service_ShoppingContent_AccountStatus
   */
  public function get($merchantId, $accountId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'accountId' => $accountId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ShoppingContent_AccountStatus");
  }
  /**
   * Lists the statuses of the sub-accounts in your Merchant Center account.
   * (accountstatuses.listAccountstatuses)
   *
   * @param string $merchantId The ID of the managing account. This must be a
   * multi-client account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The token returned by the previous request.
   * @opt_param string destinations If set, only issues for the specified
   * destinations are returned, otherwise only issues for the Shopping
   * destination.
   * @opt_param string maxResults The maximum number of account statuses to return
   * in the response, used for paging.
   * @return Google_Service_ShoppingContent_AccountstatusesListResponse
   */
  public function listAccountstatuses($merchantId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ShoppingContent_AccountstatusesListResponse");
  }
}
