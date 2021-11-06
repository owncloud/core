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

use Google\Service\ShoppingContent\OrderreportsListDisbursementsResponse;
use Google\Service\ShoppingContent\OrderreportsListTransactionsResponse;

/**
 * The "orderreports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google\Service\ShoppingContent(...);
 *   $orderreports = $contentService->orderreports;
 *  </code>
 */
class Orderreports extends \Google\Service\Resource
{
  /**
   * Retrieves a report for disbursements from your Merchant Center account.
   * (orderreports.listdisbursements)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string disbursementEndDate The last date which disbursements
   * occurred. In ISO 8601 format. Default: current date.
   * @opt_param string disbursementStartDate The first date which disbursements
   * occurred. In ISO 8601 format.
   * @opt_param string maxResults The maximum number of disbursements to return in
   * the response, used for paging.
   * @opt_param string pageToken The token returned by the previous request.
   * @return OrderreportsListDisbursementsResponse
   */
  public function listdisbursements($merchantId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId];
    $params = array_merge($params, $optParams);
    return $this->call('listdisbursements', [$params], OrderreportsListDisbursementsResponse::class);
  }
  /**
   * Retrieves a list of transactions for a disbursement from your Merchant Center
   * account. (orderreports.listtransactions)
   *
   * @param string $merchantId The ID of the account that manages the order. This
   * cannot be a multi-client account.
   * @param string $disbursementId The Google-provided ID of the disbursement
   * (found in Wallet).
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults The maximum number of disbursements to return in
   * the response, used for paging.
   * @opt_param string pageToken The token returned by the previous request.
   * @opt_param string transactionEndDate The last date in which transaction
   * occurred. In ISO 8601 format. Default: current date.
   * @opt_param string transactionStartDate The first date in which transaction
   * occurred. In ISO 8601 format.
   * @return OrderreportsListTransactionsResponse
   */
  public function listtransactions($merchantId, $disbursementId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'disbursementId' => $disbursementId];
    $params = array_merge($params, $optParams);
    return $this->call('listtransactions', [$params], OrderreportsListTransactionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Orderreports::class, 'Google_Service_ShoppingContent_Resource_Orderreports');
