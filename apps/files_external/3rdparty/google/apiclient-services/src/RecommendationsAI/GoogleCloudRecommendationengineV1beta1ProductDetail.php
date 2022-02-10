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

class GoogleCloudRecommendationengineV1beta1ProductDetail extends \Google\Model
{
  /**
   * @var int
   */
  public $availableQuantity;
  /**
   * @var string
   */
  public $currencyCode;
  /**
   * @var float
   */
  public $displayPrice;
  /**
   * @var string
   */
  public $id;
  protected $itemAttributesType = GoogleCloudRecommendationengineV1beta1FeatureMap::class;
  protected $itemAttributesDataType = '';
  /**
   * @var float
   */
  public $originalPrice;
  /**
   * @var int
   */
  public $quantity;
  /**
   * @var string
   */
  public $stockState;

  /**
   * @param int
   */
  public function setAvailableQuantity($availableQuantity)
  {
    $this->availableQuantity = $availableQuantity;
  }
  /**
   * @return int
   */
  public function getAvailableQuantity()
  {
    return $this->availableQuantity;
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
   * @param float
   */
  public function setDisplayPrice($displayPrice)
  {
    $this->displayPrice = $displayPrice;
  }
  /**
   * @return float
   */
  public function getDisplayPrice()
  {
    return $this->displayPrice;
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
   * @param float
   */
  public function setOriginalPrice($originalPrice)
  {
    $this->originalPrice = $originalPrice;
  }
  /**
   * @return float
   */
  public function getOriginalPrice()
  {
    return $this->originalPrice;
  }
  /**
   * @param int
   */
  public function setQuantity($quantity)
  {
    $this->quantity = $quantity;
  }
  /**
   * @return int
   */
  public function getQuantity()
  {
    return $this->quantity;
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
class_alias(GoogleCloudRecommendationengineV1beta1ProductDetail::class, 'Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1ProductDetail');
