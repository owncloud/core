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

class Warehouse extends \Google\Model
{
  protected $businessDayConfigType = BusinessDayConfig::class;
  protected $businessDayConfigDataType = '';
  protected $cutoffTimeType = WarehouseCutoffTime::class;
  protected $cutoffTimeDataType = '';
  /**
   * @var string
   */
  public $handlingDays;
  /**
   * @var string
   */
  public $name;
  protected $shippingAddressType = Address::class;
  protected $shippingAddressDataType = '';

  /**
   * @param BusinessDayConfig
   */
  public function setBusinessDayConfig(BusinessDayConfig $businessDayConfig)
  {
    $this->businessDayConfig = $businessDayConfig;
  }
  /**
   * @return BusinessDayConfig
   */
  public function getBusinessDayConfig()
  {
    return $this->businessDayConfig;
  }
  /**
   * @param WarehouseCutoffTime
   */
  public function setCutoffTime(WarehouseCutoffTime $cutoffTime)
  {
    $this->cutoffTime = $cutoffTime;
  }
  /**
   * @return WarehouseCutoffTime
   */
  public function getCutoffTime()
  {
    return $this->cutoffTime;
  }
  /**
   * @param string
   */
  public function setHandlingDays($handlingDays)
  {
    $this->handlingDays = $handlingDays;
  }
  /**
   * @return string
   */
  public function getHandlingDays()
  {
    return $this->handlingDays;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Address
   */
  public function setShippingAddress(Address $shippingAddress)
  {
    $this->shippingAddress = $shippingAddress;
  }
  /**
   * @return Address
   */
  public function getShippingAddress()
  {
    return $this->shippingAddress;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Warehouse::class, 'Google_Service_ShoppingContent_Warehouse');
