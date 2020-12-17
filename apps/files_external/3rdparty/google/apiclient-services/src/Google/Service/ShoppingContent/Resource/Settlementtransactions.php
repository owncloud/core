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
 * The "settlementtransactions" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $settlementtransactions = $contentService->settlementtransactions;
 *  </code>
 */
class Google_Service_ShoppingContent_Resource_Settlementtransactions extends Google_Service_Resource
{
  /**
   * Retrieves a list of transactions for the settlement.
   * (settlementtransactions.listSettlementtransactions)
   *
   * @param string $merchantId The Merchant Center account to list transactions
   * for.
   * @param string $settlementId The Google-provided ID of the settlement.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults The maximum number of transactions to return in
   * the response, used for paging. The default value is 200 transactions per
   * page, and the maximum allowed value is 5000 transactions per page.
   * @opt_param string pageToken The token returned by the previous request.
   * @opt_param string transactionIds The list of transactions to return. If not
   * set, all transactions will be returned.
   * @return Google_Service_ShoppingContent_SettlementtransactionsListResponse
   */
  public function listSettlementtransactions($merchantId, $settlementId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'settlementId' => $settlementId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ShoppingContent_SettlementtransactionsListResponse");
  }
}
