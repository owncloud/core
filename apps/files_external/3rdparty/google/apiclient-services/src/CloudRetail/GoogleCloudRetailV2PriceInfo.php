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

namespace Google\Service\CloudRetail;

class GoogleCloudRetailV2PriceInfo extends \Google\Model
{
  /**
   * @var float
   */
  public $cost;
  /**
   * @var string
   */
  public $currencyCode;
  /**
   * @var float
   */
  public $originalPrice;
  /**
   * @var float
   */
  public $price;
  /**
   * @var string
   */
  public $priceEffectiveTime;
  /**
   * @var string
   */
  public $priceExpireTime;
  protected $priceRangeType = GoogleCloudRetailV2PriceInfoPriceRange::class;
  protected $priceRangeDataType = '';

  /**
   * @param float
   */
  public function setCost($cost)
  {
    $this->cost = $cost;
  }
  /**
   * @return float
   */
  public function getCost()
  {
    return $this->cost;
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
   * @param float
   */
  public function setPrice($price)
  {
    $this->price = $price;
  }
  /**
   * @return float
   */
  public function getPrice()
  {
    return $this->price;
  }
  /**
   * @param string
   */
  public function setPriceEffectiveTime($priceEffectiveTime)
  {
    $this->priceEffectiveTime = $priceEffectiveTime;
  }
  /**
   * @return string
   */
  public function getPriceEffectiveTime()
  {
    return $this->priceEffectiveTime;
  }
  /**
   * @param string
   */
  public function setPriceExpireTime($priceExpireTime)
  {
    $this->priceExpireTime = $priceExpireTime;
  }
  /**
   * @return string
   */
  public function getPriceExpireTime()
  {
    return $this->priceExpireTime;
  }
  /**
   * @param GoogleCloudRetailV2PriceInfoPriceRange
   */
  public function setPriceRange(GoogleCloudRetailV2PriceInfoPriceRange $priceRange)
  {
    $this->priceRange = $priceRange;
  }
  /**
   * @return GoogleCloudRetailV2PriceInfoPriceRange
   */
  public function getPriceRange()
  {
    return $this->priceRange;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2PriceInfo::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2PriceInfo');
