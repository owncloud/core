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

class DeliveryTime extends \Google\Collection
{
  protected $collection_key = 'warehouseBasedDeliveryTimes';
  protected $cutoffTimeType = CutoffTime::class;
  protected $cutoffTimeDataType = '';
  protected $handlingBusinessDayConfigType = BusinessDayConfig::class;
  protected $handlingBusinessDayConfigDataType = '';
  protected $holidayCutoffsType = HolidayCutoff::class;
  protected $holidayCutoffsDataType = 'array';
  public $maxHandlingTimeInDays;
  public $maxTransitTimeInDays;
  public $minHandlingTimeInDays;
  public $minTransitTimeInDays;
  protected $transitBusinessDayConfigType = BusinessDayConfig::class;
  protected $transitBusinessDayConfigDataType = '';
  protected $transitTimeTableType = TransitTable::class;
  protected $transitTimeTableDataType = '';
  protected $warehouseBasedDeliveryTimesType = WarehouseBasedDeliveryTime::class;
  protected $warehouseBasedDeliveryTimesDataType = 'array';

  /**
   * @param CutoffTime
   */
  public function setCutoffTime(CutoffTime $cutoffTime)
  {
    $this->cutoffTime = $cutoffTime;
  }
  /**
   * @return CutoffTime
   */
  public function getCutoffTime()
  {
    return $this->cutoffTime;
  }
  /**
   * @param BusinessDayConfig
   */
  public function setHandlingBusinessDayConfig(BusinessDayConfig $handlingBusinessDayConfig)
  {
    $this->handlingBusinessDayConfig = $handlingBusinessDayConfig;
  }
  /**
   * @return BusinessDayConfig
   */
  public function getHandlingBusinessDayConfig()
  {
    return $this->handlingBusinessDayConfig;
  }
  /**
   * @param HolidayCutoff[]
   */
  public function setHolidayCutoffs($holidayCutoffs)
  {
    $this->holidayCutoffs = $holidayCutoffs;
  }
  /**
   * @return HolidayCutoff[]
   */
  public function getHolidayCutoffs()
  {
    return $this->holidayCutoffs;
  }
  public function setMaxHandlingTimeInDays($maxHandlingTimeInDays)
  {
    $this->maxHandlingTimeInDays = $maxHandlingTimeInDays;
  }
  public function getMaxHandlingTimeInDays()
  {
    return $this->maxHandlingTimeInDays;
  }
  public function setMaxTransitTimeInDays($maxTransitTimeInDays)
  {
    $this->maxTransitTimeInDays = $maxTransitTimeInDays;
  }
  public function getMaxTransitTimeInDays()
  {
    return $this->maxTransitTimeInDays;
  }
  public function setMinHandlingTimeInDays($minHandlingTimeInDays)
  {
    $this->minHandlingTimeInDays = $minHandlingTimeInDays;
  }
  public function getMinHandlingTimeInDays()
  {
    return $this->minHandlingTimeInDays;
  }
  public function setMinTransitTimeInDays($minTransitTimeInDays)
  {
    $this->minTransitTimeInDays = $minTransitTimeInDays;
  }
  public function getMinTransitTimeInDays()
  {
    return $this->minTransitTimeInDays;
  }
  /**
   * @param BusinessDayConfig
   */
  public function setTransitBusinessDayConfig(BusinessDayConfig $transitBusinessDayConfig)
  {
    $this->transitBusinessDayConfig = $transitBusinessDayConfig;
  }
  /**
   * @return BusinessDayConfig
   */
  public function getTransitBusinessDayConfig()
  {
    return $this->transitBusinessDayConfig;
  }
  /**
   * @param TransitTable
   */
  public function setTransitTimeTable(TransitTable $transitTimeTable)
  {
    $this->transitTimeTable = $transitTimeTable;
  }
  /**
   * @return TransitTable
   */
  public function getTransitTimeTable()
  {
    return $this->transitTimeTable;
  }
  /**
   * @param WarehouseBasedDeliveryTime[]
   */
  public function setWarehouseBasedDeliveryTimes($warehouseBasedDeliveryTimes)
  {
    $this->warehouseBasedDeliveryTimes = $warehouseBasedDeliveryTimes;
  }
  /**
   * @return WarehouseBasedDeliveryTime[]
   */
  public function getWarehouseBasedDeliveryTimes()
  {
    return $this->warehouseBasedDeliveryTimes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeliveryTime::class, 'Google_Service_ShoppingContent_DeliveryTime');
