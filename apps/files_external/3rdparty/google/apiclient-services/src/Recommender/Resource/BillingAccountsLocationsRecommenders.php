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

namespace Google\Service\Recommender\Resource;

use Google\Service\Recommender\GoogleCloudRecommenderV1RecommenderConfig;

/**
 * The "recommenders" collection of methods.
 * Typical usage is:
 *  <code>
 *   $recommenderService = new Google\Service\Recommender(...);
 *   $recommenders = $recommenderService->recommenders;
 *  </code>
 */
class BillingAccountsLocationsRecommenders extends \Google\Service\Resource
{
  /**
   * Gets the requested Recommender Config. There is only one instance of the
   * config for each Recommender. (recommenders.getConfig)
   *
   * @param string $name Required. Name of the Recommendation Config to get.
   * Acceptable formats: * `projects/[PROJECT_NUMBER]/locations/[LOCATION]/recomme
   * nders/[RECOMMENDER_ID]/config` * `projects/[PROJECT_ID]/locations/[LOCATION]/
   * recommenders/[RECOMMENDER_ID]/config` * `organizations/[ORGANIZATION_ID]/loca
   * tions/[LOCATION]/recommenders/[RECOMMENDER_ID]/config` * `billingAccounts/[BI
   * LLING_ACCOUNT_ID]/locations/[LOCATION]/recommenders/[RECOMMENDER_ID]/config`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudRecommenderV1RecommenderConfig
   */
  public function getConfig($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getConfig', [$params], GoogleCloudRecommenderV1RecommenderConfig::class);
  }
  /**
   * Updates a Recommender Config. This will create a new revision of the config.
   * (recommenders.updateConfig)
   *
   * @param string $name Name of recommender config. Eg, projects/[PROJECT_NUMBER]
   * /locations/[LOCATION]/recommenders/[RECOMMENDER_ID]/config
   * @param GoogleCloudRecommenderV1RecommenderConfig $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The list of fields to be updated.
   * @opt_param bool validateOnly If true, validate the request and preview the
   * change, but do not actually update it.
   * @return GoogleCloudRecommenderV1RecommenderConfig
   */
  public function updateConfig($name, GoogleCloudRecommenderV1RecommenderConfig $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateConfig', [$params], GoogleCloudRecommenderV1RecommenderConfig::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BillingAccountsLocationsRecommenders::class, 'Google_Service_Recommender_Resource_BillingAccountsLocationsRecommenders');
