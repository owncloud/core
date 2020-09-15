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
 * The "predictionApiKeyRegistrations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $recommendationengineService = new Google_Service_RecommendationsAI(...);
 *   $predictionApiKeyRegistrations = $recommendationengineService->predictionApiKeyRegistrations;
 *  </code>
 */
class Google_Service_RecommendationsAI_Resource_ProjectsLocationsCatalogsEventStoresPredictionApiKeyRegistrations extends Google_Service_Resource
{
  /**
   * Register an API key for use with predict method.
   * (predictionApiKeyRegistrations.create)
   *
   * @param string $parent Required. The parent resource path. "projects/locations
   * /global/catalogs/default_catalog/eventStores/default_event_store".
   * @param Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1CreatePredictionApiKeyRegistrationRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1PredictionApiKeyRegistration
   */
  public function create($parent, Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1CreatePredictionApiKeyRegistrationRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1PredictionApiKeyRegistration");
  }
  /**
   * Unregister an apiKey from using for predict method.
   * (predictionApiKeyRegistrations.delete)
   *
   * @param string $name Required. The API key to unregister including full
   * resource path. "projects/locations/global/catalogs/default_catalog/eventStore
   * s/default_event_store/predictionApiKeyRegistrations/"
   * @param array $optParams Optional parameters.
   * @return Google_Service_RecommendationsAI_GoogleProtobufEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_RecommendationsAI_GoogleProtobufEmpty");
  }
  /**
   * List the registered apiKeys for use with predict method. (predictionApiKeyReg
   * istrations.listProjectsLocationsCatalogsEventStoresPredictionApiKeyRegistrati
   * ons)
   *
   * @param string $parent Required. The parent placement resource name such as "p
   * rojects/1234/locations/global/catalogs/default_catalog/eventStores/default_ev
   * ent_store"
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. Maximum number of results to return per
   * page. If unset, the service will choose a reasonable default.
   * @opt_param string pageToken Optional. The previous
   * `ListPredictionApiKeyRegistration.nextPageToken`.
   * @return Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1ListPredictionApiKeyRegistrationsResponse
   */
  public function listProjectsLocationsCatalogsEventStoresPredictionApiKeyRegistrations($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1ListPredictionApiKeyRegistrationsResponse");
  }
}
