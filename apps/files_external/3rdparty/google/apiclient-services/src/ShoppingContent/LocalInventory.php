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

namespace Google\Service\ShoppingContent;

class LocalInventory extends \Google\Model
{
  /**
   * @var string
   */
  public $availability;
  /**
   * @var string
   */
  public $instoreProductLocation;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $pickupMethod;
  /**
   * @var string
   */
  public $pickupSla;
  protected $priceType = Price::class;
  protected $priceDataType = '';
  /**
   * @var string
   */
  public $quantity;
  protected $salePriceType = Price::class;
  protected $salePriceDataType = '';
  /**
   * @var string
   */
  public $salePriceEffectiveDate;
  /**
   * @var string
   */
  public $storeCode;

  /**
   * @param string
   */
  public function setAvailability($availability)
  {
    $this->availability = $availability;
  }
  /**
   * @return string
   */
  public function getAvailability()
  {
    return $this->availability;
  }
  /**
   * @param string
   */
  public function setInstoreProductLocation($instoreProductLocation)
  {
    $this->instoreProductLocation = $instoreProductLocation;
  }
  /**
   * @return string
   */
  public function getInstoreProductLocation()
  {
    return $this->instoreProductLocation;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setPickupMethod($pickupMethod)
  {
    $this->pickupMethod = $pickupMethod;
  }
  /**
   * @return string
   */
  public function getPickupMethod()
  {
    return $this->pickupMethod;
  }
  /**
   * @param string
   */
  public function setPickupSla($pickupSla)
  {
    $this->pickupSla = $pickupSla;
  }
  /**
   * @return string
   */
  public function getPickupSla()
  {
    return $this->pickupSla;
  }
  /**
   * @param Price
   */
  public function setPrice(Price $price)
  {
    $this->price = $price;
  }
  /**
   * @return Price
   */
  public function getPrice()
  {
    return $this->price;
  }
  /**
   * @param string
   */
  public function setQuantity($quantity)
  {
    $this->quantity = $quantity;
  }
  /**
   * @return string
   */
  public function getQuantity()
  {
    return $this->quantity;
  }
  /**
   * @param Price
   */
  public function setSalePrice(Price $salePrice)
  {
    $this->salePrice = $salePrice;
  }
  /**
   * @return Price
   */
  public function getSalePrice()
  {
    return $this->salePrice;
  }
  /**
   * @param string
   */
  public function setSalePriceEffectiveDate($salePriceEffectiveDate)
  {
    $this->salePriceEffectiveDate = $salePriceEffectiveDate;
  }
  /**
   * @return string
   */
  public function getSalePriceEffectiveDate()
  {
    return $this->salePriceEffectiveDate;
  }
  /**
   * @param string
   */
  public function setStoreCode($storeCode)
  {
    $this->storeCode = $storeCode;
  }
  /**
   * @return string
   */
  public function getStoreCode()
  {
    return $this->storeCode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LocalInventory::class, 'Google_Service_ShoppingContent_LocalInventory');
