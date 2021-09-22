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

class ProductShipping extends \Google\Model
{
  public $country;
  public $locationGroupName;
  public $locationId;
  public $maxHandlingTime;
  public $maxTransitTime;
  public $minHandlingTime;
  public $minTransitTime;
  public $postalCode;
  protected $priceType = Price::class;
  protected $priceDataType = '';
  public $region;
  public $service;

  public function setCountry($country)
  {
    $this->country = $country;
  }
  public function getCountry()
  {
    return $this->country;
  }
  public function setLocationGroupName($locationGroupName)
  {
    $this->locationGroupName = $locationGroupName;
  }
  public function getLocationGroupName()
  {
    return $this->locationGroupName;
  }
  public function setLocationId($locationId)
  {
    $this->locationId = $locationId;
  }
  public function getLocationId()
  {
    return $this->locationId;
  }
  public function setMaxHandlingTime($maxHandlingTime)
  {
    $this->maxHandlingTime = $maxHandlingTime;
  }
  public function getMaxHandlingTime()
  {
    return $this->maxHandlingTime;
  }
  public function setMaxTransitTime($maxTransitTime)
  {
    $this->maxTransitTime = $maxTransitTime;
  }
  public function getMaxTransitTime()
  {
    return $this->maxTransitTime;
  }
  public function setMinHandlingTime($minHandlingTime)
  {
    $this->minHandlingTime = $minHandlingTime;
  }
  public function getMinHandlingTime()
  {
    return $this->minHandlingTime;
  }
  public function setMinTransitTime($minTransitTime)
  {
    $this->minTransitTime = $minTransitTime;
  }
  public function getMinTransitTime()
  {
    return $this->minTransitTime;
  }
  public function setPostalCode($postalCode)
  {
    $this->postalCode = $postalCode;
  }
  public function getPostalCode()
  {
    return $this->postalCode;
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
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  public function setService($service)
  {
    $this->service = $service;
  }
  public function getService()
  {
    return $this->service;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProductShipping::class, 'Google_Service_ShoppingContent_ProductShipping');
