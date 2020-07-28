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

class Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1Catalog extends Google_Model
{
  protected $catalogItemLevelConfigType = 'Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1CatalogItemLevelConfig';
  protected $catalogItemLevelConfigDataType = '';
  public $defaultEventStoreId;
  public $displayName;
  public $name;

  /**
   * @param Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1CatalogItemLevelConfig
   */
  public function setCatalogItemLevelConfig(Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1CatalogItemLevelConfig $catalogItemLevelConfig)
  {
    $this->catalogItemLevelConfig = $catalogItemLevelConfig;
  }
  /**
   * @return Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1CatalogItemLevelConfig
   */
  public function getCatalogItemLevelConfig()
  {
    return $this->catalogItemLevelConfig;
  }
  public function setDefaultEventStoreId($defaultEventStoreId)
  {
    $this->defaultEventStoreId = $defaultEventStoreId;
  }
  public function getDefaultEventStoreId()
  {
    return $this->defaultEventStoreId;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}
