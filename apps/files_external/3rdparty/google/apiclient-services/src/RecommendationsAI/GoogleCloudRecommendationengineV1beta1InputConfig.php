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

class GoogleCloudRecommendationengineV1beta1InputConfig extends \Google\Model
{
  protected $bigQuerySourceType = GoogleCloudRecommendationengineV1beta1BigQuerySource::class;
  protected $bigQuerySourceDataType = '';
  protected $catalogInlineSourceType = GoogleCloudRecommendationengineV1beta1CatalogInlineSource::class;
  protected $catalogInlineSourceDataType = '';
  protected $gcsSourceType = GoogleCloudRecommendationengineV1beta1GcsSource::class;
  protected $gcsSourceDataType = '';
  protected $userEventInlineSourceType = GoogleCloudRecommendationengineV1beta1UserEventInlineSource::class;
  protected $userEventInlineSourceDataType = '';

  /**
   * @param GoogleCloudRecommendationengineV1beta1BigQuerySource
   */
  public function setBigQuerySource(GoogleCloudRecommendationengineV1beta1BigQuerySource $bigQuerySource)
  {
    $this->bigQuerySource = $bigQuerySource;
  }
  /**
   * @return GoogleCloudRecommendationengineV1beta1BigQuerySource
   */
  public function getBigQuerySource()
  {
    return $this->bigQuerySource;
  }
  /**
   * @param GoogleCloudRecommendationengineV1beta1CatalogInlineSource
   */
  public function setCatalogInlineSource(GoogleCloudRecommendationengineV1beta1CatalogInlineSource $catalogInlineSource)
  {
    $this->catalogInlineSource = $catalogInlineSource;
  }
  /**
   * @return GoogleCloudRecommendationengineV1beta1CatalogInlineSource
   */
  public function getCatalogInlineSource()
  {
    return $this->catalogInlineSource;
  }
  /**
   * @param GoogleCloudRecommendationengineV1beta1GcsSource
   */
  public function setGcsSource(GoogleCloudRecommendationengineV1beta1GcsSource $gcsSource)
  {
    $this->gcsSource = $gcsSource;
  }
  /**
   * @return GoogleCloudRecommendationengineV1beta1GcsSource
   */
  public function getGcsSource()
  {
    return $this->gcsSource;
  }
  /**
   * @param GoogleCloudRecommendationengineV1beta1UserEventInlineSource
   */
  public function setUserEventInlineSource(GoogleCloudRecommendationengineV1beta1UserEventInlineSource $userEventInlineSource)
  {
    $this->userEventInlineSource = $userEventInlineSource;
  }
  /**
   * @return GoogleCloudRecommendationengineV1beta1UserEventInlineSource
   */
  public function getUserEventInlineSource()
  {
    return $this->userEventInlineSource;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRecommendationengineV1beta1InputConfig::class, 'Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1InputConfig');
