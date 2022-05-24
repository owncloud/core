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
  /**
   * @var string
   */
  public $country;
  /**
   * @var string
   */
  public $locationGroupName;
  /**
   * @var string
   */
  public $locationId;
  /**
   * @var string
   */
  public $maxHandlingTime;
  /**
   * @var string
   */
  public $maxTransitTime;
  /**
   * @var string
   */
  public $minHandlingTime;
  /**
   * @var string
   */
  public $minTransitTime;
  /**
   * @var string
   */
  public $postalCode;
  protected $priceType = Price::class;
  protected $priceDataType = '';
  /**
   * @var string
   */
  public $region;
  /**
   * @var string
   */
  public $service;

  /**
   * @param string
   */
  public function setCountry($country)
  {
    $this->country = $country;
  }
  /**
   * @return string
   */
  public function getCountry()
  {
    return $this->country;
  }
  /**
   * @param string
   */
  public function setLocationGroupName($locationGroupName)
  {
    $this->locationGroupName = $locationGroupName;
  }
  /**
   * @return string
   */
  public function getLocationGroupName()
  {
    return $this->locationGroupName;
  }
  /**
   * @param string
   */
  public function setLocationId($locationId)
  {
    $this->locationId = $locationId;
  }
  /**
   * @return string
   */
  public function getLocationId()
  {
    return $this->locationId;
  }
  /**
   * @param string
   */
  public function setMaxHandlingTime($maxHandlingTime)
  {
    $this->maxHandlingTime = $maxHandlingTime;
  }
  /**
   * @return string
   */
  public function getMaxHandlingTime()
  {
    return $this->maxHandlingTime;
  }
  /**
   * @param string
   */
  public function setMaxTransitTime($maxTransitTime)
  {
    $this->maxTransitTime = $maxTransitTime;
  }
  /**
   * @return string
   */
  public function getMaxTransitTime()
  {
    return $this->maxTransitTime;
  }
  /**
   * @param string
   */
  public function setMinHandlingTime($minHandlingTime)
  {
    $this->minHandlingTime = $minHandlingTime;
  }
  /**
   * @return string
   */
  public function getMinHandlingTime()
  {
    return $this->minHandlingTime;
  }
  /**
   * @param string
   */
  public function setMinTransitTime($minTransitTime)
  {
    $this->minTransitTime = $minTransitTime;
  }
  /**
   * @return string
   */
  public function getMinTransitTime()
  {
    return $this->minTransitTime;
  }
  /**
   * @param string
   */
  public function setPostalCode($postalCode)
  {
    $this->postalCode = $postalCode;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setRegion($region)
  {
    $this->region = $region;
  }
  /**
   * @return string
   */
  public function getRegion()
  {
    return $this->region;
  }
  /**
   * @param string
   */
  public function setService($service)
  {
    $this->service = $service;
  }
  /**
   * @return string
   */
  public function getService()
  {
    return $this->service;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProductShipping::class, 'Google_Service_ShoppingContent_ProductShipping');
