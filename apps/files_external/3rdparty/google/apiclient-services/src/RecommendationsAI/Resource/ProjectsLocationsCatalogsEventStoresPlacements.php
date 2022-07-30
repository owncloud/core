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

use Google\Service\RecommendationsAI\GoogleCloudRecommendationengineV1beta1PredictRequest;
use Google\Service\RecommendationsAI\GoogleCloudRecommendationengineV1beta1PredictResponse;

/**
 * The "placements" collection of methods.
 * Typical usage is:
 *  <code>
 *   $recommendationengineService = new Google\Service\RecommendationsAI(...);
 *   $placements = $recommendationengineService->placements;
 *  </code>
 */
class ProjectsLocationsCatalogsEventStoresPlacements extends \Google\Service\Resource
{
  /**
   * Makes a recommendation prediction. If using API Key based authentication, the
   * API Key must be registered using the PredictionApiKeyRegistry service. [Learn
   * more](https://cloud.google.com/recommendations-ai/docs/setting-up#register-
   * key). (placements.predict)
   *
   * @param string $name
   * @param GoogleCloudRecommendationengineV1beta1PredictRequest $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRecommendationengineV1beta1PredictResponse
   */
  public function predict($name, GoogleCloudRecommendationengineV1beta1PredictRequest $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('predict', [$params], GoogleCloudRecommendationengineV1beta1PredictResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsCatalogsEventStoresPlacements::class, 'Google_Service_RecommendationsAI_Resource_ProjectsLocationsCatalogsEventStoresPlacements');
