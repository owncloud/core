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

class Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1CatalogItem extends Google_Collection
{
  protected $collection_key = 'tags';
  protected $categoryHierarchiesType = 'Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1CatalogItemCategoryHierarchy';
  protected $categoryHierarchiesDataType = 'array';
  public $description;
  public $id;
  protected $itemAttributesType = 'Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1FeatureMap';
  protected $itemAttributesDataType = '';
  public $itemGroupId;
  public $languageCode;
  protected $productMetadataType = 'Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1ProductCatalogItem';
  protected $productMetadataDataType = '';
  public $tags;
  public $title;

  /**
   * @param Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1CatalogItemCategoryHierarchy
   */
  public function setCategoryHierarchies($categoryHierarchies)
  {
    $this->categoryHierarchies = $categoryHierarchies;
  }
  /**
   * @return Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1CatalogItemCategoryHierarchy
   */
  public function getCategoryHierarchies()
  {
    return $this->categoryHierarchies;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1FeatureMap
   */
  public function setItemAttributes(Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1FeatureMap $itemAttributes)
  {
    $this->itemAttributes = $itemAttributes;
  }
  /**
   * @return Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1FeatureMap
   */
  public function getItemAttributes()
  {
    return $this->itemAttributes;
  }
  public function setItemGroupId($itemGroupId)
  {
    $this->itemGroupId = $itemGroupId;
  }
  public function getItemGroupId()
  {
    return $this->itemGroupId;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1ProductCatalogItem
   */
  public function setProductMetadata(Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1ProductCatalogItem $productMetadata)
  {
    $this->productMetadata = $productMetadata;
  }
  /**
   * @return Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1ProductCatalogItem
   */
  public function getProductMetadata()
  {
    return $this->productMetadata;
  }
  public function setTags($tags)
  {
    $this->tags = $tags;
  }
  public function getTags()
  {
    return $this->tags;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}
