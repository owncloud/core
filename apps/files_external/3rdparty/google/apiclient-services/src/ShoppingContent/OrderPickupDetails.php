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

class OrderPickupDetails extends \Google\Collection
{
  protected $collection_key = 'collectors';
  protected $addressType = OrderAddress::class;
  protected $addressDataType = '';
  protected $collectorsType = OrderPickupDetailsCollector::class;
  protected $collectorsDataType = 'array';
  /**
   * @var string
   */
  public $locationId;
  /**
   * @var string
   */
  public $pickupType;

  /**
   * @param OrderAddress
   */
  public function setAddress(OrderAddress $address)
  {
    $this->address = $address;
  }
  /**
   * @return OrderAddress
   */
  public function getAddress()
  {
    return $this->address;
  }
  /**
   * @param OrderPickupDetailsCollector[]
   */
  public function setCollectors($collectors)
  {
    $this->collectors = $collectors;
  }
  /**
   * @return OrderPickupDetailsCollector[]
   */
  public function getCollectors()
  {
    return $this->collectors;
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
  public function setPickupType($pickupType)
  {
    $this->pickupType = $pickupType;
  }
  /**
   * @return string
   */
  public function getPickupType()
  {
    return $this->pickupType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrderPickupDetails::class, 'Google_Service_ShoppingContent_OrderPickupDetails');
