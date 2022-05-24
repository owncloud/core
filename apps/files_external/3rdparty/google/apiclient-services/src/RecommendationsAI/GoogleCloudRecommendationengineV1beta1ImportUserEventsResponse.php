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

namespace Google\Service\RecommendationsAI;

class GoogleCloudRecommendationengineV1beta1ImportUserEventsResponse extends \Google\Collection
{
  protected $collection_key = 'errorSamples';
  protected $errorSamplesType = GoogleRpcStatus::class;
  protected $errorSamplesDataType = 'array';
  protected $errorsConfigType = GoogleCloudRecommendationengineV1beta1ImportErrorsConfig::class;
  protected $errorsConfigDataType = '';
  protected $importSummaryType = GoogleCloudRecommendationengineV1beta1UserEventImportSummary::class;
  protected $importSummaryDataType = '';

  /**
   * @param GoogleRpcStatus[]
   */
  public function setErrorSamples($errorSamples)
  {
    $this->errorSamples = $errorSamples;
  }
  /**
   * @return GoogleRpcStatus[]
   */
  public function getErrorSamples()
  {
    return $this->errorSamples;
  }
  /**
   * @param GoogleCloudRecommendationengineV1beta1ImportErrorsConfig
   */
  public function setErrorsConfig(GoogleCloudRecommendationengineV1beta1ImportErrorsConfig $errorsConfig)
  {
    $this->errorsConfig = $errorsConfig;
  }
  /**
   * @return GoogleCloudRecommendationengineV1beta1ImportErrorsConfig
   */
  public function getErrorsConfig()
  {
    return $this->errorsConfig;
  }
  /**
   * @param GoogleCloudRecommendationengineV1beta1UserEventImportSummary
   */
  public function setImportSummary(GoogleCloudRecommendationengineV1beta1UserEventImportSummary $importSummary)
  {
    $this->importSummary = $importSummary;
  }
  /**
   * @return GoogleCloudRecommendationengineV1beta1UserEventImportSummary
   */
  public function getImportSummary()
  {
    return $this->importSummary;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRecommendationengineV1beta1ImportUserEventsResponse::class, 'Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1ImportUserEventsResponse');
