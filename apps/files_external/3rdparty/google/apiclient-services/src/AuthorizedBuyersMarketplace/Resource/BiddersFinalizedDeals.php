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

namespace Google\Service\AuthorizedBuyersMarketplace\Resource;

use Google\Service\AuthorizedBuyersMarketplace\ListFinalizedDealsResponse;

/**
 * The "finalizedDeals" collection of methods.
 * Typical usage is:
 *  <code>
 *   $authorizedbuyersmarketplaceService = new Google\Service\AuthorizedBuyersMarketplace(...);
 *   $finalizedDeals = $authorizedbuyersmarketplaceService->finalizedDeals;
 *  </code>
 */
class BiddersFinalizedDeals extends \Google\Service\Resource
{
  /**
   * Lists finalized deals. Use the URL path
   * "/v1/buyers/{accountId}/finalizedDeals" to list finalized deals for the
   * current buyer and its clients. Bidders can use the URL path
   * "/v1/bidders/{accountId}/finalizedDeals" to list finalized deals for the
   * bidder, its buyers and all their clients.
   * (finalizedDeals.listBiddersFinalizedDeals)
   *
   * @param string $parent Required. The buyer to list the finalized deals for, in
   * the format: `buyers/{accountId}`. When used to list finalized deals for a
   * bidder, its buyers and clients, in the format `bidders/{accountId}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional query string using the [Cloud API list
   * filtering syntax](https://developers.google.com/authorized-
   * buyers/apis/guides/v2/list-filters) Supported columns for filtering are: *
   * deal.displayName * deal.dealType * deal.createTime * deal.updateTime *
   * deal.flightStartTime * deal.flightEndTime * dealServingStatus
   * @opt_param string orderBy An optional query string to sort finalized deals
   * using the [Cloud API sorting
   * syntax](https://cloud.google.com/apis/design/design_patterns#sorting_order).
   * If no sort order is specified, results will be returned in an arbitrary
   * order. Supported columns for sorting are: * deal.displayName *
   * deal.createTime * deal.updateTime * deal.flightStartTime * deal.flightEndTime
   * * rtbMetrics.bidRequests7Days * rtbMetrics.bids7Days *
   * rtbMetrics.adImpressions7Days * rtbMetrics.bidRate7Days *
   * rtbMetrics.filteredBidRate7Days * rtbMetrics.mustBidRateCurrentMonth Example:
   * 'deal.displayName, deal.updateTime desc'
   * @opt_param int pageSize Requested page size. The server may return fewer
   * results than requested. If requested more than 500, the server will return
   * 500 results per page. If unspecified, the server will pick a default page
   * size of 100.
   * @opt_param string pageToken The page token as returned from
   * ListFinalizedDealsResponse.
   * @return ListFinalizedDealsResponse
   */
  public function listBiddersFinalizedDeals($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListFinalizedDealsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BiddersFinalizedDeals::class, 'Google_Service_AuthorizedBuyersMarketplace_Resource_BiddersFinalizedDeals');
