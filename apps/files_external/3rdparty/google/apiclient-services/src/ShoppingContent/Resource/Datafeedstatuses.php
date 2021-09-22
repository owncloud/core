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

use Google\Service\ShoppingContent\DatafeedStatus;
use Google\Service\ShoppingContent\DatafeedstatusesCustomBatchRequest;
use Google\Service\ShoppingContent\DatafeedstatusesCustomBatchResponse;
use Google\Service\ShoppingContent\DatafeedstatusesListResponse;

/**
 * The "datafeedstatuses" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google\Service\ShoppingContent(...);
 *   $datafeedstatuses = $contentService->datafeedstatuses;
 *  </code>
 */
class Datafeedstatuses extends \Google\Service\Resource
{
  /**
   * Gets multiple Merchant Center datafeed statuses in a single request.
   * (datafeedstatuses.custombatch)
   *
   * @param DatafeedstatusesCustomBatchRequest $postBody
   * @param array $optParams Optional parameters.
   * @return DatafeedstatusesCustomBatchResponse
   */
  public function custombatch(DatafeedstatusesCustomBatchRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('custombatch', [$params], DatafeedstatusesCustomBatchResponse::class);
  }
  /**
   * Retrieves the status of a datafeed from your Merchant Center account.
   * (datafeedstatuses.get)
   *
   * @param string $merchantId The ID of the account that manages the datafeed.
   * This account cannot be a multi-client account.
   * @param string $datafeedId The ID of the datafeed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string country The country for which to get the datafeed status.
   * If this parameter is provided then language must also be provided. Note that
   * this parameter is required for feeds targeting multiple countries and
   * languages, since a feed may have a different status for each target.
   * @opt_param string language The language for which to get the datafeed status.
   * If this parameter is provided then country must also be provided. Note that
   * this parameter is required for feeds targeting multiple countries and
   * languages, since a feed may have a different status for each target.
   * @return DatafeedStatus
   */
  public function get($merchantId, $datafeedId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'datafeedId' => $datafeedId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], DatafeedStatus::class);
  }
  /**
   * Lists the statuses of the datafeeds in your Merchant Center account.
   * (datafeedstatuses.listDatafeedstatuses)
   *
   * @param string $merchantId The ID of the account that manages the datafeeds.
   * This account cannot be a multi-client account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults The maximum number of products to return in the
   * response, used for paging.
   * @opt_param string pageToken The token returned by the previous request.
   * @return DatafeedstatusesListResponse
   */
  public function listDatafeedstatuses($merchantId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], DatafeedstatusesListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Datafeedstatuses::class, 'Google_Service_ShoppingContent_Resource_Datafeedstatuses');
