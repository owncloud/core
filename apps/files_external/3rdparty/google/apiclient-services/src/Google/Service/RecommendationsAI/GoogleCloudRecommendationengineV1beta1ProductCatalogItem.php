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

class Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1ProductCatalogItem extends Google_Collection
{
  protected $collection_key = 'images';
  public $availableQuantity;
  public $canonicalProductUri;
  public $costs;
  public $currencyCode;
  protected $exactPriceType = 'Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1ProductCatalogItemExactPrice';
  protected $exactPriceDataType = '';
  protected $imagesType = 'Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1Image';
  protected $imagesDataType = 'array';
  protected $priceRangeType = 'Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1ProductCatalogItemPriceRange';
  protected $priceRangeDataType = '';
  public $stockState;

  public function setAvailableQuantity($availableQuantity)
  {
    $this->availableQuantity = $availableQuantity;
  }
  public function getAvailableQuantity()
  {
    return $this->availableQuantity;
  }
  public function setCanonicalProductUri($canonicalProductUri)
  {
    $this->canonicalProductUri = $canonicalProductUri;
  }
  public function getCanonicalProductUri()
  {
    return $this->canonicalProductUri;
  }
  public function setCosts($costs)
  {
    $this->costs = $costs;
  }
  public function getCosts()
  {
    return $this->costs;
  }
  public function setCurrencyCode($currencyCode)
  {
    $this->currencyCode = $currencyCode;
  }
  public function getCurrencyCode()
  {
    return $this->currencyCode;
  }
  /**
   * @param Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1ProductCatalogItemExactPrice
   */
  public function setExactPrice(Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1ProductCatalogItemExactPrice $exactPrice)
  {
    $this->exactPrice = $exactPrice;
  }
  /**
   * @return Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1ProductCatalogItemExactPrice
   */
  public function getExactPrice()
  {
    return $this->exactPrice;
  }
  /**
   * @param Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1Image
   */
  public function setImages($images)
  {
    $this->images = $images;
  }
  /**
   * @return Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1Image
   */
  public function getImages()
  {
    return $this->images;
  }
  /**
   * @param Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1ProductCatalogItemPriceRange
   */
  public function setPriceRange(Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1ProductCatalogItemPriceRange $priceRange)
  {
    $this->priceRange = $priceRange;
  }
  /**
   * @return Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1ProductCatalogItemPriceRange
   */
  public function getPriceRange()
  {
    return $this->priceRange;
  }
  public function setStockState($stockState)
  {
    $this->stockState = $stockState;
  }
  public function getStockState()
  {
    return $this->stockState;
  }
}
