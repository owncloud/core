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
  public $availability;
  public $instoreProductLocation;
  public $kind;
  public $pickupMethod;
  public $pickupSla;
  protected $priceType = Price::class;
  protected $priceDataType = '';
  public $quantity;
  protected $salePriceType = Price::class;
  protected $salePriceDataType = '';
  public $salePriceEffectiveDate;
  public $storeCode;

  public function setAvailability($availability)
  {
    $this->availability = $availability;
  }
  public function getAvailability()
  {
    return $this->availability;
  }
  public function setInstoreProductLocation($instoreProductLocation)
  {
    $this->instoreProductLocation = $instoreProductLocation;
  }
  public function getInstoreProductLocation()
  {
    return $this->instoreProductLocation;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setPickupMethod($pickupMethod)
  {
    $this->pickupMethod = $pickupMethod;
  }
  public function getPickupMethod()
  {
    return $this->pickupMethod;
  }
  public function setPickupSla($pickupSla)
  {
    $this->pickupSla = $pickupSla;
  }
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
  public function setQuantity($quantity)
  {
    $this->quantity = $quantity;
  }
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
  public function setSalePriceEffectiveDate($salePriceEffectiveDate)
  {
    $this->salePriceEffectiveDate = $salePriceEffectiveDate;
  }
  public function getSalePriceEffectiveDate()
  {
    return $this->salePriceEffectiveDate;
  }
  public function setStoreCode($storeCode)
  {
    $this->storeCode = $storeCode;
  }
  public function getStoreCode()
  {
    return $this->storeCode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LocalInventory::class, 'Google_Service_ShoppingContent_LocalInventory');
