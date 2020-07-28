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

class Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1InputConfig extends Google_Model
{
  protected $bigQuerySourceType = 'Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1BigQuerySource';
  protected $bigQuerySourceDataType = '';
  protected $catalogInlineSourceType = 'Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1CatalogInlineSource';
  protected $catalogInlineSourceDataType = '';
  protected $gcsSourceType = 'Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1GcsSource';
  protected $gcsSourceDataType = '';
  protected $userEventInlineSourceType = 'Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1UserEventInlineSource';
  protected $userEventInlineSourceDataType = '';

  /**
   * @param Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1BigQuerySource
   */
  public function setBigQuerySource(Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1BigQuerySource $bigQuerySource)
  {
    $this->bigQuerySource = $bigQuerySource;
  }
  /**
   * @return Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1BigQuerySource
   */
  public function getBigQuerySource()
  {
    return $this->bigQuerySource;
  }
  /**
   * @param Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1CatalogInlineSource
   */
  public function setCatalogInlineSource(Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1CatalogInlineSource $catalogInlineSource)
  {
    $this->catalogInlineSource = $catalogInlineSource;
  }
  /**
   * @return Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1CatalogInlineSource
   */
  public function getCatalogInlineSource()
  {
    return $this->catalogInlineSource;
  }
  /**
   * @param Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1GcsSource
   */
  public function setGcsSource(Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1GcsSource $gcsSource)
  {
    $this->gcsSource = $gcsSource;
  }
  /**
   * @return Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1GcsSource
   */
  public function getGcsSource()
  {
    return $this->gcsSource;
  }
  /**
   * @param Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1UserEventInlineSource
   */
  public function setUserEventInlineSource(Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1UserEventInlineSource $userEventInlineSource)
  {
    $this->userEventInlineSource = $userEventInlineSource;
  }
  /**
   * @return Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1UserEventInlineSource
   */
  public function getUserEventInlineSource()
  {
    return $this->userEventInlineSource;
  }
}
