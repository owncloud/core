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
 * The "endpoints" collection of methods.
 * Typical usage is:
 *  <code>
 *   $realtimebiddingService = new Google_Service_RealTimeBidding(...);
 *   $endpoints = $realtimebiddingService->endpoints;
 *  </code>
 */
class Google_Service_RealTimeBidding_Resource_BiddersEndpoints extends Google_Service_Resource
{
  /**
   * Gets a bidder endpoint by its name. (endpoints.get)
   *
   * @param string $name Required. Name of the bidder endpoint to get. Format:
   * `bidders/{bidderAccountId}/endpoints/{endpointId}`
   * @param array $optParams Optional parameters.
   * @return Google_Service_RealTimeBidding_Endpoint
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_RealTimeBidding_Endpoint");
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
   * @return Google_Service_RealTimeBidding_ListEndpointsResponse
   */
  public function listBiddersEndpoints($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_RealTimeBidding_ListEndpointsResponse");
  }
}
