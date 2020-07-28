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

class Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1ProductDetail extends Google_Model
{
  public $availableQuantity;
  public $currencyCode;
  public $displayPrice;
  public $id;
  protected $itemAttributesType = 'Google_Service_RecommendationsAI_GoogleCloudRecommendationengineV1beta1FeatureMap';
  protected $itemAttributesDataType = '';
  public $originalPrice;
  public $quantity;
  public $stockState;

  public function setAvailableQuantity($availableQuantity)
  {
    $this->availableQuantity = $availableQuantity;
  }
  public function getAvailableQuantity()
  {
    return $this->availableQuantity;
  }
  public function setCurrencyCode($currencyCode)
  {
    $this->currencyCode = $currencyCode;
  }
  public function getCurrencyCode()
  {
    return $this->currencyCode;
  }
  public function setDisplayPrice($displayPrice)
  {
    $this->displayPrice = $displayPrice;
  }
  public function getDisplayPrice()
  {
    return $this->displayPrice;
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
  public function setOriginalPrice($originalPrice)
  {
    $this->originalPrice = $originalPrice;
  }
  public function getOriginalPrice()
  {
    return $this->originalPrice;
  }
  public function setQuantity($quantity)
  {
    $this->quantity = $quantity;
  }
  public function getQuantity()
  {
    return $this->quantity;
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
