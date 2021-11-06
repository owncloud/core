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

class GoogleCloudRecommendationengineV1beta1CatalogItem extends \Google\Collection
{
  protected $collection_key = 'tags';
  protected $categoryHierarchiesType = GoogleCloudRecommendationengineV1beta1CatalogItemCategoryHierarchy::class;
  protected $categoryHierarchiesDataType = 'array';
  public $description;
  public $id;
  protected $itemAttributesType = GoogleCloudRecommendationengineV1beta1FeatureMap::class;
  protected $itemAttributesDataType = '';
  public $itemGroupId;
  public $languageCode;
  protected $productMetadataType = GoogleCloudRecommendationengineV1beta1ProductCatalogItem::class;
  protected $productMetadataDataType = '';
  public $tags;
  public $title;

  /**
   * @param GoogleCloudRecommendationengineV1beta1CatalogItemCategoryHierarchy[]
   */
  public function setCategoryHierarchies($categoryHierarchies)
  {
    $this->categoryHierarchies = $categoryHierarchies;
  }
  /**
   * @return GoogleCloudRecommendationengineV1beta1CatalogItemCategoryHierarchy[]
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
   * @param GoogleCloudRecommendationengineV1beta1FeatureMap
   */
  public function setItemAttributes(GoogleCloudRecommendationengineV1beta1FeatureMap $itemAttributes)
  {
    $this->itemAttributes = $itemAttributes;
  }
  /**
   * @return GoogleCloudRecommendationengineV1beta1FeatureMap
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
   * @param GoogleCloudRecommendationengineV1beta1ProductCatalogItem
   */
  public function setProductMetadata(GoogleCloudRecommendationengineV1beta1ProductCatalogItem $productMetadata)
  {
    $this->productMetadata = $productMetadata;
  }
  /**
   * @return GoogleCloudRecommendationengineV1beta1ProductCatalogItem
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRecommendationengineV1beta1CatalogItem::class, 'Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1CatalogItem');
