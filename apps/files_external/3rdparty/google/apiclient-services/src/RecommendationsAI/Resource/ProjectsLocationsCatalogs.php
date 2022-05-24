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

use Google\Service\RecommendationsAI\GoogleCloudRecommendationengineV1beta1Catalog;
use Google\Service\RecommendationsAI\GoogleCloudRecommendationengineV1beta1ListCatalogsResponse;

/**
 * The "catalogs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $recommendationengineService = new Google\Service\RecommendationsAI(...);
 *   $catalogs = $recommendationengineService->catalogs;
 *  </code>
 */
class ProjectsLocationsCatalogs extends \Google\Service\Resource
{
  /**
   * Lists all the catalog configurations associated with the project.
   * (catalogs.listProjectsLocationsCatalogs)
   *
   * @param string $parent Required. The account resource name with an associated
   * location.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. Maximum number of results to return. If
   * unspecified, defaults to 50. Max allowed value is 1000.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * `ListCatalogs` call. Provide this to retrieve the subsequent page.
   * @return GoogleCloudRecommendationengineV1beta1ListCatalogsResponse
   */
  public function listProjectsLocationsCatalogs($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudRecommendationengineV1beta1ListCatalogsResponse::class);
  }
  /**
   * Updates the catalog configuration. (catalogs.patch)
   *
   * @param string $name The fully qualified resource name of the catalog.
   * @param GoogleCloudRecommendationengineV1beta1Catalog $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Optional. Indicates which fields in the provided
   * 'catalog' to update. If not set, will only update the
   * catalog_item_level_config field. Currently only fields that can be updated
   * are catalog_item_level_config.
   * @return GoogleCloudRecommendationengineV1beta1Catalog
   */
  public function patch($name, GoogleCloudRecommendationengineV1beta1Catalog $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudRecommendationengineV1beta1Catalog::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsCatalogs::class, 'Google_Service_RecommendationsAI_Resource_ProjectsLocationsCatalogs');
