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

class Google_Service_ShoppingContent_TestOrderPickupDetails extends Google_Collection
{
  protected $collection_key = 'pickupPersons';
  public $locationCode;
  protected $pickupLocationAddressType = 'Google_Service_ShoppingContent_TestOrderAddress';
  protected $pickupLocationAddressDataType = '';
  public $pickupLocationType;
  protected $pickupPersonsType = 'Google_Service_ShoppingContent_TestOrderPickupDetailsPickupPerson';
  protected $pickupPersonsDataType = 'array';

  public function setLocationCode($locationCode)
  {
    $this->locationCode = $locationCode;
  }
  public function getLocationCode()
  {
    return $this->locationCode;
  }
  /**
   * @param Google_Service_ShoppingContent_TestOrderAddress
   */
  public function setPickupLocationAddress(Google_Service_ShoppingContent_TestOrderAddress $pickupLocationAddress)
  {
    $this->pickupLocationAddress = $pickupLocationAddress;
  }
  /**
   * @return Google_Service_ShoppingContent_TestOrderAddress
   */
  public function getPickupLocationAddress()
  {
    return $this->pickupLocationAddress;
  }
  public function setPickupLocationType($pickupLocationType)
  {
    $this->pickupLocationType = $pickupLocationType;
  }
  public function getPickupLocationType()
  {
    return $this->pickupLocationType;
  }
  /**
   * @param Google_Service_ShoppingContent_TestOrderPickupDetailsPickupPerson
   */
  public function setPickupPersons($pickupPersons)
  {
    $this->pickupPersons = $pickupPersons;
  }
  /**
   * @return Google_Service_ShoppingContent_TestOrderPickupDetailsPickupPerson
   */
  public function getPickupPersons()
  {
    return $this->pickupPersons;
  }
}
