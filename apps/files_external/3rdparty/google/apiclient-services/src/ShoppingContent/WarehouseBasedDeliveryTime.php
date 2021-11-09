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
  public $carrier;
  public $carrierService;
  public $originAdministrativeArea;
  public $originCity;
  public $originCountry;
  public $originPostalCode;
  public $originStreetAddress;
  public $warehouseName;

  public function setCarrier($carrier)
  {
    $this->carrier = $carrier;
  }
  public function getCarrier()
  {
    return $this->carrier;
  }
  public function setCarrierService($carrierService)
  {
    $this->carrierService = $carrierService;
  }
  public function getCarrierService()
  {
    return $this->carrierService;
  }
  public function setOriginAdministrativeArea($originAdministrativeArea)
  {
    $this->originAdministrativeArea = $originAdministrativeArea;
  }
  public function getOriginAdministrativeArea()
  {
    return $this->originAdministrativeArea;
  }
  public function setOriginCity($originCity)
  {
    $this->originCity = $originCity;
  }
  public function getOriginCity()
  {
    return $this->originCity;
  }
  public function setOriginCountry($originCountry)
  {
    $this->originCountry = $originCountry;
  }
  public function getOriginCountry()
  {
    return $this->originCountry;
  }
  public function setOriginPostalCode($originPostalCode)
  {
    $this->originPostalCode = $originPostalCode;
  }
  public function getOriginPostalCode()
  {
    return $this->originPostalCode;
  }
  public function setOriginStreetAddress($originStreetAddress)
  {
    $this->originStreetAddress = $originStreetAddress;
  }
  public function getOriginStreetAddress()
  {
    return $this->originStreetAddress;
  }
  public function setWarehouseName($warehouseName)
  {
    $this->warehouseName = $warehouseName;
  }
  public function getWarehouseName()
  {
    return $this->warehouseName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(WarehouseBasedDeliveryTime::class, 'Google_Service_ShoppingContent_WarehouseBasedDeliveryTime');
