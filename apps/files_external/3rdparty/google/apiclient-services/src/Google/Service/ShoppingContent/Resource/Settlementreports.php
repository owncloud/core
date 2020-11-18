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
 * The "settlementreports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $settlementreports = $contentService->settlementreports;
 *  </code>
 */
class Google_Service_ShoppingContent_Resource_Settlementreports extends Google_Service_Resource
{
  /**
   * Retrieves a settlement report from your Merchant Center account.
   * (settlementreports.get)
   *
   * @param string $merchantId The Merchant Center account of the settlement
   * report.
   * @param string $settlementId The Google-provided ID of the settlement.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_SettlementReport
   */
  public function get($merchantId, $settlementId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'settlementId' => $settlementId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ShoppingContent_SettlementReport");
  }
  /**
   * Retrieves a list of settlement reports from your Merchant Center account.
   * (settlementreports.listSettlementreports)
   *
   * @param string $merchantId The Merchant Center account to list settlements
   * for.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string pageToken The token returned by the previous request.
   * @opt_param string maxResults The maximum number of settlements to return in
   * the response, used for paging. The default value is 200 returns per page, and
   * the maximum allowed value is 5000 returns per page.
   * @opt_param string transferStartDate Obtains settlements which have
   * transactions after this date (inclusively), in ISO 8601 format.
   * @opt_param string transferEndDate Obtains settlements which have transactions
   * before this date (inclusively), in ISO 8601 format.
   * @return Google_Service_ShoppingContent_SettlementreportsListResponse
   */
  public function listSettlementreports($merchantId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ShoppingContent_SettlementreportsListResponse");
  }
}
