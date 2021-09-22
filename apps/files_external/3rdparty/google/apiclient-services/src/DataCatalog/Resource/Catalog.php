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

namespace Google\Service\DataCatalog\Resource;

use Google\Service\DataCatalog\GoogleCloudDatacatalogV1SearchCatalogRequest;
use Google\Service\DataCatalog\GoogleCloudDatacatalogV1SearchCatalogResponse;

/**
 * The "catalog" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datacatalogService = new Google\Service\DataCatalog(...);
 *   $catalog = $datacatalogService->catalog;
 *  </code>
 */
class Catalog extends \Google\Service\Resource
{
  /**
   * Searches Data Catalog for multiple resources like entries and tags that match
   * a query. This is a [Custom Method]
   * (https://cloud.google.com/apis/design/custom_methods) that doesn't return all
   * information on a resource, only its ID and high level fields. To get more
   * information, you can subsequently call specific get methods. Note: Data
   * Catalog search queries don't guarantee full recall. Results that match your
   * query might not be returned, even in subsequent result pages. Additionally,
   * returned (and not returned) results can vary if you repeat search queries.
   * For more information, see [Data Catalog search syntax]
   * (https://cloud.google.com/data-catalog/docs/how-to/search-reference).
   * (catalog.search)
   *
   * @param GoogleCloudDatacatalogV1SearchCatalogRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudDatacatalogV1SearchCatalogResponse
   */
  public function search(GoogleCloudDatacatalogV1SearchCatalogRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('search', [$params], GoogleCloudDatacatalogV1SearchCatalogResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Catalog::class, 'Google_Service_DataCatalog_Resource_Catalog');
