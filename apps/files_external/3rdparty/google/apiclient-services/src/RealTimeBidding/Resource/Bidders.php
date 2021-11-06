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

use Google\Service\RealTimeBidding\Bidder;
use Google\Service\RealTimeBidding\ListBiddersResponse;

/**
 * The "bidders" collection of methods.
 * Typical usage is:
 *  <code>
 *   $realtimebiddingService = new Google\Service\RealTimeBidding(...);
 *   $bidders = $realtimebiddingService->bidders;
 *  </code>
 */
class Bidders extends \Google\Service\Resource
{
  /**
   * Gets a bidder account by its name. (bidders.get)
   *
   * @param string $name Required. Name of the bidder to get. Format:
   * `bidders/{bidderAccountId}`
   * @param array $optParams Optional parameters.
   * @return Bidder
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Bidder::class);
  }
  /**
   * Lists all the bidder accounts that belong to the caller.
   * (bidders.listBidders)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of bidders to return. If
   * unspecified, at most 100 bidders will be returned. The maximum value is 500;
   * values above 500 will be coerced to 500.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. This value is received from a previous `ListBidders` call in
   * ListBiddersResponse.nextPageToken.
   * @return ListBiddersResponse
   */
  public function listBidders($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListBiddersResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Bidders::class, 'Google_Service_RealTimeBidding_Resource_Bidders');
