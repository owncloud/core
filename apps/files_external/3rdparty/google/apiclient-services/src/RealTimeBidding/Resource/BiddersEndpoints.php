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

use Google\Service\RealTimeBidding\Endpoint;
use Google\Service\RealTimeBidding\ListEndpointsResponse;

/**
 * The "endpoints" collection of methods.
 * Typical usage is:
 *  <code>
 *   $realtimebiddingService = new Google\Service\RealTimeBidding(...);
 *   $endpoints = $realtimebiddingService->endpoints;
 *  </code>
 */
class BiddersEndpoints extends \Google\Service\Resource
{
  /**
   * Gets a bidder endpoint by its name. (endpoints.get)
   *
   * @param string $name Required. Name of the bidder endpoint to get. Format:
   * `bidders/{bidderAccountId}/endpoints/{endpointId}`
   * @param array $optParams Optional parameters.
   * @return Endpoint
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Endpoint::class);
  }
  /**
   * Lists all the bidder's endpoints. (endpoints.listBiddersEndpoints)
   *
   * @param string $parent Required. Name of the bidder whose endpoints will be
   * listed. Format: `bidders/{bidderAccountId}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of endpoints to return. If
   * unspecified, at most 100 endpoints will be returned. The maximum value is
   * 500; values above 500 will be coerced to 500.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. This value is received from a previous `ListEndpoints` call in
   * ListEndpointsResponse.nextPageToken.
   * @return ListEndpointsResponse
   */
  public function listBiddersEndpoints($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListEndpointsResponse::class);
  }
  /**
   * Updates a bidder's endpoint. (endpoints.patch)
   *
   * @param string $name Output only. Name of the endpoint resource that must
   * follow the pattern `bidders/{bidderAccountId}/endpoints/{endpointId}`, where
   * {bidderAccountId} is the account ID of the bidder who operates this endpoint,
   * and {endpointId} is a unique ID assigned by the server.
   * @param Endpoint $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Field mask to use for partial in-place updates.
   * @return Endpoint
   */
  public function patch($name, Endpoint $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Endpoint::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BiddersEndpoints::class, 'Google_Service_RealTimeBidding_Resource_BiddersEndpoints');
