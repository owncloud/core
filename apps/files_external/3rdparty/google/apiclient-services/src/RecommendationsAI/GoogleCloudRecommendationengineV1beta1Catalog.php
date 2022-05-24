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

class GoogleCloudRecommendationengineV1beta1Catalog extends \Google\Model
{
  protected $catalogItemLevelConfigType = GoogleCloudRecommendationengineV1beta1CatalogItemLevelConfig::class;
  protected $catalogItemLevelConfigDataType = '';
  /**
   * @var string
   */
  public $defaultEventStoreId;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $name;

  /**
   * @param GoogleCloudRecommendationengineV1beta1CatalogItemLevelConfig
   */
  public function setCatalogItemLevelConfig(GoogleCloudRecommendationengineV1beta1CatalogItemLevelConfig $catalogItemLevelConfig)
  {
    $this->catalogItemLevelConfig = $catalogItemLevelConfig;
  }
  /**
   * @return GoogleCloudRecommendationengineV1beta1CatalogItemLevelConfig
   */
  public function getCatalogItemLevelConfig()
  {
    return $this->catalogItemLevelConfig;
  }
  /**
   * @param string
   */
  public function setDefaultEventStoreId($defaultEventStoreId)
  {
    $this->defaultEventStoreId = $defaultEventStoreId;
  }
  /**
   * @return string
   */
  public function getDefaultEventStoreId()
  {
    return $this->defaultEventStoreId;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRecommendationengineV1beta1Catalog::class, 'Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1Catalog');
