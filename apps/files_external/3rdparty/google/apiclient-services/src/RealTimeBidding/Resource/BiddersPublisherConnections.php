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

namespace Google\Service\RealTimeBidding\Resource;

use Google\Service\RealTimeBidding\BatchApprovePublisherConnectionsRequest;
use Google\Service\RealTimeBidding\BatchApprovePublisherConnectionsResponse;
use Google\Service\RealTimeBidding\BatchRejectPublisherConnectionsRequest;
use Google\Service\RealTimeBidding\BatchRejectPublisherConnectionsResponse;
use Google\Service\RealTimeBidding\ListPublisherConnectionsResponse;
use Google\Service\RealTimeBidding\PublisherConnection;

/**
 * The "publisherConnections" collection of methods.
 * Typical usage is:
 *  <code>
 *   $realtimebiddingService = new Google\Service\RealTimeBidding(...);
 *   $publisherConnections = $realtimebiddingService->publisherConnections;
 *  </code>
 */
class BiddersPublisherConnections extends \Google\Service\Resource
{
  /**
   * Batch approves multiple publisher connections.
   * (publisherConnections.batchApprove)
   *
   * @param string $parent Required. The bidder for whom publisher connections
   * will be approved. Format: `bidders/{bidder}` where `{bidder}` is the account
   * ID of the bidder.
   * @param BatchApprovePublisherConnectionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchApprovePublisherConnectionsResponse
   */
  public function batchApprove($parent, BatchApprovePublisherConnectionsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchApprove', [$params], BatchApprovePublisherConnectionsResponse::class);
  }
  /**
   * Batch rejects multiple publisher connections.
   * (publisherConnections.batchReject)
   *
   * @param string $parent Required. The bidder for whom publisher connections
   * will be rejected. Format: `bidders/{bidder}` where `{bidder}` is the account
   * ID of the bidder.
   * @param BatchRejectPublisherConnectionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchRejectPublisherConnectionsResponse
   */
  public function batchReject($parent, BatchRejectPublisherConnectionsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchReject', [$params], BatchRejectPublisherConnectionsResponse::class);
  }
  /**
   * Gets a publisher connection. (publisherConnections.get)
   *
   * @param string $name Required. Name of the publisher whose connection
   * information is to be retrieved. In the pattern
   * `bidders/{bidder}/publisherConnections/{publisher}` where `{bidder}` is the
   * account ID of the bidder, and `{publisher}` is the ads.txt/app-ads.txt
   * publisher ID. See publisherConnection.name.
   * @param array $optParams Optional parameters.
   * @return PublisherConnection
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], PublisherConnection::class);
  }
  /**
   * Lists publisher connections for a given bidder.
   * (publisherConnections.listBiddersPublisherConnections)
   *
   * @param string $parent Required. Name of the bidder for which publishers have
   * initiated connections. The pattern for this resource is `bidders/{bidder}`
   * where `{bidder}` represents the account ID of the bidder.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Query string to filter publisher connections.
   * Connections can be filtered by `displayName`, `publisherPlatform`, and
   * `biddingState`. If no filter is specified, all publisher connections will be
   * returned. Example: 'displayName="Great Publisher*" AND
   * publisherPlatform=ADMOB AND biddingState != PENDING' See
   * https://google.aip.dev/160 for more information about filtering syntax.
   * @opt_param string orderBy Order specification by which results should be
   * sorted. If no sort order is specified, the results will be returned in an
   * arbitrary order. Currently results can be sorted by `createTime`. Example:
   * 'createTime DESC'.
   * @opt_param int pageSize Requested page size. The server may return fewer
   * results than requested (due to timeout constraint) even if more are available
   * via another call. If unspecified, the server will pick an appropriate
   * default. Acceptable values are 1 to 5000, inclusive.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of
   * ListPublisherConnectionsResponse.nextPageToken returned from the previous
   * call to the 'ListPublisherConnections' method.
   * @return ListPublisherConnectionsResponse
   */
  public function listBiddersPublisherConnections($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListPublisherConnectionsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BiddersPublisherConnections::class, 'Google_Service_RealTimeBidding_Resource_BiddersPublisherConnections');
