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
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $id;
  protected $itemAttributesType = GoogleCloudRecommendationengineV1beta1FeatureMap::class;
  protected $itemAttributesDataType = '';
  /**
   * @var string
   */
  public $itemGroupId;
  /**
   * @var string
   */
  public $languageCode;
  protected $productMetadataType = GoogleCloudRecommendationengineV1beta1ProductCatalogItem::class;
  protected $productMetadataDataType = '';
  /**
   * @var string[]
   */
  public $tags;
  /**
   * @var string
   */
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
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setItemGroupId($itemGroupId)
  {
    $this->itemGroupId = $itemGroupId;
  }
  /**
   * @return string
   */
  public function getItemGroupId()
  {
    return $this->itemGroupId;
  }
  /**
   * @param string
   */
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string
   */
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
  /**
   * @param string[]
   */
  public function setTags($tags)
  {
    $this->tags = $tags;
  }
  /**
   * @return string[]
   */
  public function getTags()
  {
    return $this->tags;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRecommendationengineV1beta1CatalogItem::class, 'Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1CatalogItem');
