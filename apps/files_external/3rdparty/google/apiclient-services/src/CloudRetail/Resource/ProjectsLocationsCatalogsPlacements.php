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

namespace Google\Service\CloudRetail\Resource;

use Google\Service\CloudRetail\GoogleCloudRetailV2PredictRequest;
use Google\Service\CloudRetail\GoogleCloudRetailV2PredictResponse;
use Google\Service\CloudRetail\GoogleCloudRetailV2SearchRequest;
use Google\Service\CloudRetail\GoogleCloudRetailV2SearchResponse;

/**
 * The "placements" collection of methods.
 * Typical usage is:
 *  <code>
 *   $retailService = new Google\Service\CloudRetail(...);
 *   $placements = $retailService->placements;
 *  </code>
 */
class ProjectsLocationsCatalogsPlacements extends \Google\Service\Resource
{
  /**
   * Makes a recommendation prediction. (placements.predict)
   *
   * @param string $placement Required. Full resource name of the format:
   * {name=projects/locations/global/catalogs/default_catalog/servingConfigs} or
   * {name=projects/locations/global/catalogs/default_catalog/placements}. We
   * recommend using the `servingConfigs` resource. `placements` is a legacy
   * resource. The ID of the Recommendations AI serving config or placement.
   * Before you can request predictions from your model, you must create at least
   * one serving config or placement for it. For more information, see [Managing
   * serving configurations]. (https://cloud.google.com/retail/docs/manage-
   * configs). The full list of available serving configs can be seen at
   * https://console.cloud.google.com/ai/retail/catalogs/default_catalog/configs
   * @param GoogleCloudRetailV2PredictRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRetailV2PredictResponse
   */
  public function predict($placement, GoogleCloudRetailV2PredictRequest $postBody, $optParams = [])
  {
    $params = ['placement' => $placement, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('predict', [$params], GoogleCloudRetailV2PredictResponse::class);
  }
  /**
   * Performs a search. This feature is only available for users who have Retail
   * Search enabled. Please enable Retail Search on Cloud Console before using
   * this feature. (placements.search)
   *
   * @param string $placement Required. The resource name of the Retail Search
   * serving config, such as `projects/locations/global/catalogs/default_catalog/s
   * ervingConfigs/default_serving_config` or the name of the legacy placement
   * resource, such as `projects/locations/global/catalogs/default_catalog/placeme
   * nts/default_search`. This field is used to identify the serving configuration
   * name and the set of models that will be used to make the search.
   * @param GoogleCloudRetailV2SearchRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRetailV2SearchResponse
   */
  public function search($placement, GoogleCloudRetailV2SearchRequest $postBody, $optParams = [])
  {
    $params = ['placement' => $placement, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('search', [$params], GoogleCloudRetailV2SearchResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsCatalogsPlacements::class, 'Google_Service_CloudRetail_Resource_ProjectsLocationsCatalogsPlacements');
