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

class WarehouseBasedDeliveryTime extends \Google\Model
{
  /**
   * @var string
   */
  public $carrier;
  /**
   * @var string
   */
  public $carrierService;
  /**
   * @var string
   */
  public $originAdministrativeArea;
  /**
   * @var string
   */
  public $originCity;
  /**
   * @var string
   */
  public $originCountry;
  /**
   * @var string
   */
  public $originPostalCode;
  /**
   * @var string
   */
  public $originStreetAddress;
  /**
   * @var string
   */
  public $warehouseName;

  /**
   * @param string
   */
  public function setCarrier($carrier)
  {
    $this->carrier = $carrier;
  }
  /**
   * @return string
   */
  public function getCarrier()
  {
    return $this->carrier;
  }
  /**
   * @param string
   */
  public function setCarrierService($carrierService)
  {
    $this->carrierService = $carrierService;
  }
  /**
   * @return string
   */
  public function getCarrierService()
  {
    return $this->carrierService;
  }
  /**
   * @param string
   */
  public function setOriginAdministrativeArea($originAdministrativeArea)
  {
    $this->originAdministrativeArea = $originAdministrativeArea;
  }
  /**
   * @return string
   */
  public function getOriginAdministrativeArea()
  {
    return $this->originAdministrativeArea;
  }
  /**
   * @param string
   */
  public function setOriginCity($originCity)
  {
    $this->originCity = $originCity;
  }
  /**
   * @return string
   */
  public function getOriginCity()
  {
    return $this->originCity;
  }
  /**
   * @param string
   */
  public function setOriginCountry($originCountry)
  {
    $this->originCountry = $originCountry;
  }
  /**
   * @return string
   */
  public function getOriginCountry()
  {
    return $this->originCountry;
  }
  /**
   * @param string
   */
  public function setOriginPostalCode($originPostalCode)
  {
    $this->originPostalCode = $originPostalCode;
  }
  /**
   * @return string
   */
  public function getOriginPostalCode()
  {
    return $this->originPostalCode;
  }
  /**
   * @param string
   */
  public function setOriginStreetAddress($originStreetAddress)
  {
    $this->originStreetAddress = $originStreetAddress;
  }
  /**
   * @return string
   */
  public function getOriginStreetAddress()
  {
    return $this->originStreetAddress;
  }
  /**
   * @param string
   */
  public function setWarehouseName($warehouseName)
  {
    $this->warehouseName = $warehouseName;
  }
  /**
   * @return string
   */
  public function getWarehouseName()
  {
    return $this->warehouseName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WarehouseBasedDeliveryTime::class, 'Google_Service_ShoppingContent_WarehouseBasedDeliveryTime');
