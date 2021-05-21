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
 * The "placements" collection of methods.
 * Typical usage is:
 *  <code>
 *   $recommendationengineService = new Google_Service_RecommendationsAI(...);
 *   $placements = $recommendationengineService->placements;
 *  </code>
 */
class Google_Service_RecommendationsAI_Resource_ProjectsLocationsCatalogsEventStoresPlacements extends Google_Service_Resource
{
  /**
   * Makes a recommendation prediction. If using API Key based authentication, the
   * API Key must be registered using the PredictionApiKeyRegistry service. [Learn
   * more](https://cloud.google.com/recommendations-ai/docs/setting-up#register-
   * key). (placements.predict)
   *
   * @param string $name Required. Full resource name of the format: `{name=projec
   * ts/locations/global/catalogs/default_catalog/eventStores/default_event_store/
   * placements}` The id of the recommendation engine placement. This id is used
   * to identify the set of models that will be used to make the prediction. We
   * currently support three placements with the following IDs by default: *
   * `shopping_cart`: Predicts items frequently bought together with one or more
   * catalog items in the same shopping session. Commonly displayed after `add-to-
   * cart` events, on product detail pages, or on the shopping cart page. *
   * `home_page`: Predicts the next product that a user will most likely engage
   * with or purchase based on the shopping or viewing history of the specified
   * `userId` or `visitorId`. For example - Recommendations for you. *
   * `product_detail`: Predicts the next product that a user will most likely
   * engage with or purchase. The prediction is based on the shopping or viewing
   * history of the specified `userId` or `visitorId` and its relevance to a
   * specified `CatalogItem`. Typically used on product detail pages. For example
   * - More items like this. * `recently_viewed_default`: Returns up to 75 items
   * recently viewed by the specified `userId` or `visitorId`, most recent ones
   * first. Returns nothing if neither of them has viewed any items yet. For
   * example - Recently viewed. The full list of available placements can be seen
   * at https://console.cloud.google.com/recommendation/datafeeds/default_catalog/
   * dashboard
   * @param Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1PredictRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1PredictResponse
   */
  public function predict($name, Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1PredictRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('predict', array($params), "Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1PredictResponse");
  }
}
