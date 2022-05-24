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

use Google\Service\ShoppingContent\Datafeed;
use Google\Service\ShoppingContent\DatafeedsCustomBatchRequest;
use Google\Service\ShoppingContent\DatafeedsCustomBatchResponse;
use Google\Service\ShoppingContent\DatafeedsFetchNowResponse;
use Google\Service\ShoppingContent\DatafeedsListResponse;

/**
 * The "datafeeds" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google\Service\ShoppingContent(...);
 *   $datafeeds = $contentService->datafeeds;
 *  </code>
 */
class Datafeeds extends \Google\Service\Resource
{
  /**
   * Deletes, fetches, gets, inserts and updates multiple datafeeds in a single
   * request. (datafeeds.custombatch)
   *
   * @param DatafeedsCustomBatchRequest $postBody
   * @param array $optParams Optional parameters.
   * @return DatafeedsCustomBatchResponse
   */
  public function custombatch(DatafeedsCustomBatchRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('custombatch', [$params], DatafeedsCustomBatchResponse::class);
  }
  /**
   * Deletes a datafeed configuration from your Merchant Center account.
   * (datafeeds.delete)
   *
   * @param string $merchantId The ID of the account that manages the datafeed.
   * This account cannot be a multi-client account.
   * @param string $datafeedId The ID of the datafeed.
   * @param array $optParams Optional parameters.
   */
  public function delete($merchantId, $datafeedId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'datafeedId' => $datafeedId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Invokes a fetch for the datafeed in your Merchant Center account. If you need
   * to call this method more than once per day, we recommend you use the Products
   * service to update your product data. (datafeeds.fetchnow)
   *
   * @param string $merchantId The ID of the account that manages the datafeed.
   * This account cannot be a multi-client account.
   * @param string $datafeedId The ID of the datafeed to be fetched.
   * @param array $optParams Optional parameters.
   * @return DatafeedsFetchNowResponse
   */
  public function fetchnow($merchantId, $datafeedId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'datafeedId' => $datafeedId];
    $params = array_merge($params, $optParams);
    return $this->call('fetchnow', [$params], DatafeedsFetchNowResponse::class);
  }
  /**
   * Retrieves a datafeed configuration from your Merchant Center account.
   * (datafeeds.get)
   *
   * @param string $merchantId The ID of the account that manages the datafeed.
   * This account cannot be a multi-client account.
   * @param string $datafeedId The ID of the datafeed.
   * @param array $optParams Optional parameters.
   * @return Datafeed
   */
  public function get($merchantId, $datafeedId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'datafeedId' => $datafeedId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Datafeed::class);
  }
  /**
   * Registers a datafeed configuration with your Merchant Center account.
   * (datafeeds.insert)
   *
   * @param string $merchantId The ID of the account that manages the datafeed.
   * This account cannot be a multi-client account.
   * @param Datafeed $postBody
   * @param array $optParams Optional parameters.
   * @return Datafeed
   */
  public function insert($merchantId, Datafeed $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('insert', [$params], Datafeed::class);
  }
  /**
   * Lists the configurations for datafeeds in your Merchant Center account.
   * (datafeeds.listDatafeeds)
   *
   * @param string $merchantId The ID of the account that manages the datafeeds.
   * This account cannot be a multi-client account.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string maxResults The maximum number of products to return in the
   * response, used for paging.
   * @opt_param string pageToken The token returned by the previous request.
   * @return DatafeedsListResponse
   */
  public function listDatafeeds($merchantId, $optParams = [])
  {
    $params = ['merchantId' => $merchantId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], DatafeedsListResponse::class);
  }
  /**
   * Updates a datafeed configuration of your Merchant Center account. Any fields
   * that are not provided are deleted from the resource. (datafeeds.update)
   *
   * @param string $merchantId The ID of the account that manages the datafeed.
   * This account cannot be a multi-client account.
   * @param string $datafeedId The ID of the datafeed.
   * @param Datafeed $postBody
   * @param array $optParams Optional parameters.
   * @return Datafeed
   */
  public function update($merchantId, $datafeedId, Datafeed $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'datafeedId' => $datafeedId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('update', [$params], Datafeed::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Datafeeds::class, 'Google_Service_ShoppingContent_Resource_Datafeeds');
