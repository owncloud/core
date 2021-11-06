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

use Google\Service\ShoppingContent\SearchRequest;
use Google\Service\ShoppingContent\SearchResponse;

/**
 * The "reports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google\Service\ShoppingContent(...);
 *   $reports = $contentService->reports;
 *  </code>
 */
class Reports extends \Google\Service\Resource
{
  /**
   * Retrieves merchant performance mertrics matching the search query and
   * optionally segmented by selected dimensions. (reports.search)
   *
   * @param string $merchantId Required. Id of the merchant making the call. Must
   * be a standalone account or an MCA subaccount.
   * @param SearchRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SearchResponse
   */
  public function search($merchantId, SearchRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('search', [$params], SearchResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Reports::class, 'Google_Service_ShoppingContent_Resource_Reports');
