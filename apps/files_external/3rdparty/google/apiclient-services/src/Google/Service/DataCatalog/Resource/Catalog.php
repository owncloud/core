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
 * The "catalog" collection of methods.
 * Typical usage is:
 *  <code>
 *   $datacatalogService = new Google_Service_DataCatalog(...);
 *   $catalog = $datacatalogService->catalog;
 *  </code>
 */
class Google_Service_DataCatalog_Resource_Catalog extends Google_Service_Resource
{
  /**
   * Searches Data Catalog for multiple resources like entries, tags that match a
   * query. This is a custom method
   * (https://cloud.google.com/apis/design/custom_methods) and does not return the
   * complete resource, only the resource identifier and high level fields.
   * Clients can subsequently call `Get` methods. Note that Data Catalog search
   * queries do not guarantee full recall. Query results that match your query may
   * not be returned, even in subsequent result pages. Also note that results
   * returned (and not returned) can vary across repeated search queries. See
   * [Data Catalog Search Syntax](https://cloud.google.com/data-catalog/docs/how-
   * to/search-reference) for more information. (catalog.search)
   *
   * @param Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1SearchCatalogRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1SearchCatalogResponse
   */
  public function search(Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1SearchCatalogRequest $postBody, $optParams = array())
  {
    $params = array('postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('search', array($params), "Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1SearchCatalogResponse");
  }
}
