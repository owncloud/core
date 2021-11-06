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

namespace Google\Service\RecommendationsAI\Resource;

use Google\Service\RecommendationsAI\GoogleCloudRecommendationengineV1beta1CatalogItem;
use Google\Service\RecommendationsAI\GoogleCloudRecommendationengineV1beta1ImportCatalogItemsRequest;
use Google\Service\RecommendationsAI\GoogleCloudRecommendationengineV1beta1ListCatalogItemsResponse;
use Google\Service\RecommendationsAI\GoogleLongrunningOperation;
use Google\Service\RecommendationsAI\GoogleProtobufEmpty;

/**
 * The "catalogItems" collection of methods.
 * Typical usage is:
 *  <code>
 *   $recommendationengineService = new Google\Service\RecommendationsAI(...);
 *   $catalogItems = $recommendationengineService->catalogItems;
 *  </code>
 */
class ProjectsLocationsCatalogsCatalogItems extends \Google\Service\Resource
{
  /**
   * Creates a catalog item. (catalogItems.create)
   *
   * @param string $parent Required. The parent catalog resource name, such as
   * `projects/locations/global/catalogs/default_catalog`.
   * @param GoogleCloudRecommendationengineV1beta1CatalogItem $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRecommendationengineV1beta1CatalogItem
   */
  public function create($parent, GoogleCloudRecommendationengineV1beta1CatalogItem $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudRecommendationengineV1beta1CatalogItem::class);
  }
  /**
   * Deletes a catalog item. (catalogItems.delete)
   *
   * @param string $name Required. Full resource name of catalog item, such as `pr
   * ojects/locations/global/catalogs/default_catalog/catalogItems/some_catalog_it
   * em_id`.
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Gets a specific catalog item. (catalogItems.get)
   *
   * @param string $name Required. Full resource name of catalog item, such as `pr
   * ojects/locations/global/catalogs/default_catalog/catalogitems/some_catalog_it
   * em_id`.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRecommendationengineV1beta1CatalogItem
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudRecommendationengineV1beta1CatalogItem::class);
  }
  /**
   * Bulk import of multiple catalog items. Request processing may be synchronous.
   * No partial updating supported. Non-existing items will be created.
   * Operation.response is of type ImportResponse. Note that it is possible for a
   * subset of the items to be successfully updated. (catalogItems.import)
   *
   * @param string $parent Required.
   * `projects/1234/locations/global/catalogs/default_catalog` If no updateMask is
   * specified, requires catalogItems.create permission. If updateMask is
   * specified, requires catalogItems.update permission.
   * @param GoogleCloudRecommendationengineV1beta1ImportCatalogItemsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   */
  public function import($parent, GoogleCloudRecommendationengineV1beta1ImportCatalogItemsRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('import', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Gets a list of catalog items.
   * (catalogItems.listProjectsLocationsCatalogsCatalogItems)
   *
   * @param string $parent Required. The parent catalog resource name, such as
   * `projects/locations/global/catalogs/default_catalog`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. A filter to apply on the list results.
   * @opt_param int pageSize Optional. Maximum number of results to return per
   * page. If zero, the service will choose a reasonable default.
   * @opt_param string pageToken Optional. The previous
   * ListCatalogItemsResponse.next_page_token.
   * @return GoogleCloudRecommendationengineV1beta1ListCatalogItemsResponse
   */
  public function listProjectsLocationsCatalogsCatalogItems($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudRecommendationengineV1beta1ListCatalogItemsResponse::class);
  }
  /**
   * Updates a catalog item. Partial updating is supported. Non-existing items
   * will be created. (catalogItems.patch)
   *
   * @param string $name Required. Full resource name of catalog item, such as `pr
   * ojects/locations/global/catalogs/default_catalog/catalogItems/some_catalog_it
   * em_id`.
   * @param GoogleCloudRecommendationengineV1beta1CatalogItem $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Optional. Indicates which fields in the provided
   * 'item' to update. If not set, will by default update all fields.
   * @return GoogleCloudRecommendationengineV1beta1CatalogItem
   */
  public function patch($name, GoogleCloudRecommendationengineV1beta1CatalogItem $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudRecommendationengineV1beta1CatalogItem::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsCatalogsCatalogItems::class, 'Google_Service_RecommendationsAI_Resource_ProjectsLocationsCatalogsCatalogItems');
