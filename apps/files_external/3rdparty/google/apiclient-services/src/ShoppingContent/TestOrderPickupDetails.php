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

class TestOrderPickupDetails extends \Google\Collection
{
  protected $collection_key = 'pickupPersons';
  /**
   * @var string
   */
  public $locationCode;
  protected $pickupLocationAddressType = TestOrderAddress::class;
  protected $pickupLocationAddressDataType = '';
  /**
   * @var string
   */
  public $pickupLocationType;
  protected $pickupPersonsType = TestOrderPickupDetailsPickupPerson::class;
  protected $pickupPersonsDataType = 'array';

  /**
   * @param string
   */
  public function setLocationCode($locationCode)
  {
    $this->locationCode = $locationCode;
  }
  /**
   * @return string
   */
  public function getLocationCode()
  {
    return $this->locationCode;
  }
  /**
   * @param TestOrderAddress
   */
  public function setPickupLocationAddress(TestOrderAddress $pickupLocationAddress)
  {
    $this->pickupLocationAddress = $pickupLocationAddress;
  }
  /**
   * @return TestOrderAddress
   */
  public function getPickupLocationAddress()
  {
    return $this->pickupLocationAddress;
  }
  /**
   * @param string
   */
  public function setPickupLocationType($pickupLocationType)
  {
    $this->pickupLocationType = $pickupLocationType;
  }
  /**
   * @return string
   */
  public function getPickupLocationType()
  {
    return $this->pickupLocationType;
  }
  /**
   * @param TestOrderPickupDetailsPickupPerson[]
   */
  public function setPickupPersons($pickupPersons)
  {
    $this->pickupPersons = $pickupPersons;
  }
  /**
   * @return TestOrderPickupDetailsPickupPerson[]
   */
  public function getPickupPersons()
  {
    return $this->pickupPersons;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TestOrderPickupDetails::class, 'Google_Service_ShoppingContent_TestOrderPickupDetails');
