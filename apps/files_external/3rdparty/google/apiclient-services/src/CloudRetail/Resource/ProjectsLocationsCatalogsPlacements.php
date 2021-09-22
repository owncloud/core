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
   * {name=projects/locations/global/catalogs/default_catalog/placements} The ID
   * of the Recommendations AI placement. Before you can request predictions from
   * your model, you must create at least one placement for it. For more
   * information, see [Managing placements](https://cloud.google.com/retail
   * /recommendations-ai/docs/manage-placements). The full list of available
   * placements can be seen at https://console.cloud.google.com/recommendation/cat
   * alogs/default_catalog/placements
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
   * Search enabled. Please submit a form [here](https://cloud.google.com/contact)
   * to contact cloud sales if you are interested in using Retail Search.
   * (placements.search)
   *
   * @param string $placement Required. The resource name of the search engine
   * placement, such as `projects/locations/global/catalogs/default_catalog/placem
   * ents/default_search`. This field is used to identify the set of models that
   * will be used to make the search. We currently support one placement with the
   * following ID: * `default_search`.
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
