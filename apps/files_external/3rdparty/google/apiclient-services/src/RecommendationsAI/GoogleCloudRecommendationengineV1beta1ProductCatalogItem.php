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

class GoogleCloudRecommendationengineV1beta1ProductCatalogItem extends \Google\Collection
{
  protected $collection_key = 'images';
  /**
   * @var string
   */
  public $availableQuantity;
  /**
   * @var string
   */
  public $canonicalProductUri;
  /**
   * @var float[]
   */
  public $costs;
  /**
   * @var string
   */
  public $currencyCode;
  protected $exactPriceType = GoogleCloudRecommendationengineV1beta1ProductCatalogItemExactPrice::class;
  protected $exactPriceDataType = '';
  protected $imagesType = GoogleCloudRecommendationengineV1beta1Image::class;
  protected $imagesDataType = 'array';
  protected $priceRangeType = GoogleCloudRecommendationengineV1beta1ProductCatalogItemPriceRange::class;
  protected $priceRangeDataType = '';
  /**
   * @var string
   */
  public $stockState;

  /**
   * @param string
   */
  public function setAvailableQuantity($availableQuantity)
  {
    $this->availableQuantity = $availableQuantity;
  }
  /**
   * @return string
   */
  public function getAvailableQuantity()
  {
    return $this->availableQuantity;
  }
  /**
   * @param string
   */
  public function setCanonicalProductUri($canonicalProductUri)
  {
    $this->canonicalProductUri = $canonicalProductUri;
  }
  /**
   * @return string
   */
  public function getCanonicalProductUri()
  {
    return $this->canonicalProductUri;
  }
  /**
   * @param float[]
   */
  public function setCosts($costs)
  {
    $this->costs = $costs;
  }
  /**
   * @return float[]
   */
  public function getCosts()
  {
    return $this->costs;
  }
  /**
   * @param string
   */
  public function setCurrencyCode($currencyCode)
  {
    $this->currencyCode = $currencyCode;
  }
  /**
   * @return string
   */
  public function getCurrencyCode()
  {
    return $this->currencyCode;
  }
  /**
   * @param GoogleCloudRecommendationengineV1beta1ProductCatalogItemExactPrice
   */
  public function setExactPrice(GoogleCloudRecommendationengineV1beta1ProductCatalogItemExactPrice $exactPrice)
  {
    $this->exactPrice = $exactPrice;
  }
  /**
   * @return GoogleCloudRecommendationengineV1beta1ProductCatalogItemExactPrice
   */
  public function getExactPrice()
  {
    return $this->exactPrice;
  }
  /**
   * @param GoogleCloudRecommendationengineV1beta1Image[]
   */
  public function setImages($images)
  {
    $this->images = $images;
  }
  /**
   * @return GoogleCloudRecommendationengineV1beta1Image[]
   */
  public function getImages()
  {
    return $this->images;
  }
  /**
   * @param GoogleCloudRecommendationengineV1beta1ProductCatalogItemPriceRange
   */
  public function setPriceRange(GoogleCloudRecommendationengineV1beta1ProductCatalogItemPriceRange $priceRange)
  {
    $this->priceRange = $priceRange;
  }
  /**
   * @return GoogleCloudRecommendationengineV1beta1ProductCatalogItemPriceRange
   */
  public function getPriceRange()
  {
    return $this->priceRange;
  }
  /**
   * @param string
   */
  public function setStockState($stockState)
  {
    $this->stockState = $stockState;
  }
  /**
   * @return string
   */
  public function getStockState()
  {
    return $this->stockState;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRecommendationengineV1beta1ProductCatalogItem::class, 'Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1ProductCatalogItem');
