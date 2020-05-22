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

class Google_Service_ShoppingContent_LocalInventory extends Google_Model
{
  public $availability;
  public $instoreProductLocation;
  public $kind;
  public $pickupMethod;
  public $pickupSla;
  protected $priceType = 'Google_Service_ShoppingContent_Price';
  protected $priceDataType = '';
  public $quantity;
  protected $salePriceType = 'Google_Service_ShoppingContent_Price';
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
   * @param Google_Service_ShoppingContent_Price
   */
  public function setPrice(Google_Service_ShoppingContent_Price $price)
  {
    $this->price = $price;
  }
  /**
   * @return Google_Service_ShoppingContent_Price
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
   * @param Google_Service_ShoppingContent_Price
   */
  public function setSalePrice(Google_Service_ShoppingContent_Price $salePrice)
  {
    $this->salePrice = $salePrice;
  }
  /**
   * @return Google_Service_ShoppingContent_Price
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
