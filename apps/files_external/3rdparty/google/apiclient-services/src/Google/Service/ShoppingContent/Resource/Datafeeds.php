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
 * The "datafeeds" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $datafeeds = $contentService->datafeeds;
 *  </code>
 */
class Google_Service_ShoppingContent_Resource_Datafeeds extends Google_Service_Resource
{
  /**
   * Deletes, fetches, gets, inserts and updates multiple datafeeds in a single
   * request. (datafeeds.custombatch)
   *
   * @param Google_Service_ShoppingContent_DatafeedsCustomBatchRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_DatafeedsCustomBatchResponse
   */
  public function custombatch(Google_Service_ShoppingContent_DatafeedsCustomBatchRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('custombatch', array($params), "Google_Service_ShoppingContent_DatafeedsCustomBatchResponse");
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
  public function delete($merchantId, $datafeedId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'datafeedId' => $datafeedId);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params));
  }
  /**
   * Invokes a fetch for the datafeed in your Merchant Center account.
   * (datafeeds.fetchnow)
   *
   * @param string $merchantId The ID of the account that manages the datafeed.
   * This account cannot be a multi-client account.
   * @param string $datafeedId The ID of the datafeed to be fetched.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_DatafeedsFetchNowResponse
   */
  public function fetchnow($merchantId, $datafeedId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'datafeedId' => $datafeedId);
    $params = array_merge($params, $optParams);
    return $this->call('fetchnow', array($params), "Google_Service_ShoppingContent_DatafeedsFetchNowResponse");
  }
  /**
   * Retrieves a datafeed configuration from your Merchant Center account.
   * (datafeeds.get)
   *
   * @param string $merchantId The ID of the account that manages the datafeed.
   * This account cannot be a multi-client account.
   * @param string $datafeedId The ID of the datafeed.
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_Datafeed
   */
  public function get($merchantId, $datafeedId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'datafeedId' => $datafeedId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_ShoppingContent_Datafeed");
  }
  /**
   * Registers a datafeed configuration with your Merchant Center account.
   * (datafeeds.insert)
   *
   * @param string $merchantId The ID of the account that manages the datafeed.
   * This account cannot be a multi-client account.
   * @param Google_Service_ShoppingContent_Datafeed $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_Datafeed
   */
  public function insert($merchantId, Google_Service_ShoppingContent_Datafeed $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('insert', array($params), "Google_Service_ShoppingContent_Datafeed");
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
   * @return Google_Service_ShoppingContent_DatafeedsListResponse
   */
  public function listDatafeeds($merchantId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ShoppingContent_DatafeedsListResponse");
  }
  /**
   * Updates a datafeed configuration of your Merchant Center account. Any fields
   * that are not provided are deleted from the resource. (datafeeds.update)
   *
   * @param string $merchantId The ID of the account that manages the datafeed.
   * This account cannot be a multi-client account.
   * @param string $datafeedId The ID of the datafeed.
   * @param Google_Service_ShoppingContent_Datafeed $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_ShoppingContent_Datafeed
   */
  public function update($merchantId, $datafeedId, Google_Service_ShoppingContent_Datafeed $postBody, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'datafeedId' => $datafeedId, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('update', array($params), "Google_Service_ShoppingContent_Datafeed");
  }
}
