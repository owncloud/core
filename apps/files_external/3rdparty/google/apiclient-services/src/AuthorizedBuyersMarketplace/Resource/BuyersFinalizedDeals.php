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

use Google\Service\AuthorizedBuyersMarketplace\AddCreativeRequest;
use Google\Service\AuthorizedBuyersMarketplace\FinalizedDeal;
use Google\Service\AuthorizedBuyersMarketplace\ListFinalizedDealsResponse;
use Google\Service\AuthorizedBuyersMarketplace\PauseFinalizedDealRequest;
use Google\Service\AuthorizedBuyersMarketplace\ResumeFinalizedDealRequest;
use Google\Service\AuthorizedBuyersMarketplace\SetReadyToServeRequest;

/**
 * The "finalizedDeals" collection of methods.
 * Typical usage is:
 *  <code>
 *   $authorizedbuyersmarketplaceService = new Google\Service\AuthorizedBuyersMarketplace(...);
 *   $finalizedDeals = $authorizedbuyersmarketplaceService->finalizedDeals;
 *  </code>
 */
class BuyersFinalizedDeals extends \Google\Service\Resource
{
  /**
   * Add creative to be used in the bidding process for a finalized deal. For
   * programmatic guaranteed deals, it's recommended that you associate at least
   * one approved creative with the deal before calling SetReadyToServe, to help
   * reduce the number of bid responses filtered because they don't contain
   * approved creatives. Creatives successfully added to a deal can be found in
   * the Realtime-bidding Creatives API creative.deal_ids. This method only
   * applies to programmatic guaranteed deals. Maximum number of 1000 creatives
   * can be added to a finalized deal. (finalizedDeals.addCreative)
   *
   * @param string $deal Required. Name of the finalized deal in the format of:
   * `buyers/{accountId}/finalizedDeals/{dealId}`
   * @param AddCreativeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return FinalizedDeal
   */
  public function addCreative($deal, AddCreativeRequest $postBody, $optParams = [])
  {
    $params = ['deal' => $deal, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addCreative', [$params], FinalizedDeal::class);
  }
  /**
   * Gets a finalized deal given its name. (finalizedDeals.get)
   *
   * @param string $name Required. Format:
   * `buyers/{accountId}/finalizedDeals/{dealId}`
   * @param array $optParams Optional parameters.
   * @return FinalizedDeal
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], FinalizedDeal::class);
  }
  /**
   * Lists finalized deals. Use the URL path
   * "/v1/buyers/{accountId}/finalizedDeals" to list finalized deals for the
   * current buyer and its clients. Bidders can use the URL path
   * "/v1/bidders/{accountId}/finalizedDeals" to list finalized deals for the
   * bidder, its buyers and all their clients.
   * (finalizedDeals.listBuyersFinalizedDeals)
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
  public function listBuyersFinalizedDeals($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListFinalizedDealsResponse::class);
  }
  /**
   * Pauses serving of the given finalized deal. This call only pauses the serving
   * status, and does not affect other fields of the finalized deal. Calling this
   * method for an already paused deal has no effect. This method only applies to
   * programmatic guaranteed deals. (finalizedDeals.pause)
   *
   * @param string $name Required. Format:
   * `buyers/{accountId}/finalizedDeals/{dealId}`
   * @param PauseFinalizedDealRequest $postBody
   * @param array $optParams Optional parameters.
   * @return FinalizedDeal
   */
  public function pause($name, PauseFinalizedDealRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('pause', [$params], FinalizedDeal::class);
  }
  /**
   * Resumes serving of the given finalized deal. Calling this method for an
   * running deal has no effect. If a deal is initially paused by the seller,
   * calling this method will not resume serving of the deal until the seller also
   * resumes the deal. This method only applies to programmatic guaranteed deals.
   * (finalizedDeals.resume)
   *
   * @param string $name Required. Format:
   * `buyers/{accountId}/finalizedDeals/{dealId}`
   * @param ResumeFinalizedDealRequest $postBody
   * @param array $optParams Optional parameters.
   * @return FinalizedDeal
   */
  public function resume($name, ResumeFinalizedDealRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('resume', [$params], FinalizedDeal::class);
  }
  /**
   * Sets the given finalized deal as ready to serve. By default, deals are ready
   * to serve as soon as they're finalized. A bidder can opt out of this feature
   * by asking to be included in an allowlist. Once opted out, finalized deals
   * belonging to the bidder and its child seats will not start serving until this
   * method is called. This method is useful to the bidders who prefer to not
   * receive bid requests before the creative is ready. This method only applies
   * to programmatic guaranteed deals. (finalizedDeals.setReadyToServe)
   *
   * @param string $deal Required. Format:
   * `buyers/{accountId}/finalizedDeals/{dealId}`
   * @param SetReadyToServeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return FinalizedDeal
   */
  public function setReadyToServe($deal, SetReadyToServeRequest $postBody, $optParams = [])
  {
    $params = ['deal' => $deal, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('setReadyToServe', [$params], FinalizedDeal::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BuyersFinalizedDeals::class, 'Google_Service_AuthorizedBuyersMarketplace_Resource_BuyersFinalizedDeals');
