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

class Google_Service_ShoppingContent_DeliveryTime extends Google_Collection
{
  protected $collection_key = 'warehouseBasedDeliveryTimes';
  protected $cutoffTimeType = 'Google_Service_ShoppingContent_CutoffTime';
  protected $cutoffTimeDataType = '';
  protected $handlingBusinessDayConfigType = 'Google_Service_ShoppingContent_BusinessDayConfig';
  protected $handlingBusinessDayConfigDataType = '';
  protected $holidayCutoffsType = 'Google_Service_ShoppingContent_HolidayCutoff';
  protected $holidayCutoffsDataType = 'array';
  public $maxHandlingTimeInDays;
  public $maxTransitTimeInDays;
  public $minHandlingTimeInDays;
  public $minTransitTimeInDays;
  protected $transitBusinessDayConfigType = 'Google_Service_ShoppingContent_BusinessDayConfig';
  protected $transitBusinessDayConfigDataType = '';
  protected $transitTimeTableType = 'Google_Service_ShoppingContent_TransitTable';
  protected $transitTimeTableDataType = '';
  protected $warehouseBasedDeliveryTimesType = 'Google_Service_ShoppingContent_WarehouseBasedDeliveryTime';
  protected $warehouseBasedDeliveryTimesDataType = 'array';

  /**
   * @param Google_Service_ShoppingContent_CutoffTime
   */
  public function setCutoffTime(Google_Service_ShoppingContent_CutoffTime $cutoffTime)
  {
    $this->cutoffTime = $cutoffTime;
  }
  /**
   * @return Google_Service_ShoppingContent_CutoffTime
   */
  public function getCutoffTime()
  {
    return $this->cutoffTime;
  }
  /**
   * @param Google_Service_ShoppingContent_BusinessDayConfig
   */
  public function setHandlingBusinessDayConfig(Google_Service_ShoppingContent_BusinessDayConfig $handlingBusinessDayConfig)
  {
    $this->handlingBusinessDayConfig = $handlingBusinessDayConfig;
  }
  /**
   * @return Google_Service_ShoppingContent_BusinessDayConfig
   */
  public function getHandlingBusinessDayConfig()
  {
    return $this->handlingBusinessDayConfig;
  }
  /**
   * @param Google_Service_ShoppingContent_HolidayCutoff[]
   */
  public function setHolidayCutoffs($holidayCutoffs)
  {
    $this->holidayCutoffs = $holidayCutoffs;
  }
  /**
   * @return Google_Service_ShoppingContent_HolidayCutoff[]
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
   * @param Google_Service_ShoppingContent_BusinessDayConfig
   */
  public function setTransitBusinessDayConfig(Google_Service_ShoppingContent_BusinessDayConfig $transitBusinessDayConfig)
  {
    $this->transitBusinessDayConfig = $transitBusinessDayConfig;
  }
  /**
   * @return Google_Service_ShoppingContent_BusinessDayConfig
   */
  public function getTransitBusinessDayConfig()
  {
    return $this->transitBusinessDayConfig;
  }
  /**
   * @param Google_Service_ShoppingContent_TransitTable
   */
  public function setTransitTimeTable(Google_Service_ShoppingContent_TransitTable $transitTimeTable)
  {
    $this->transitTimeTable = $transitTimeTable;
  }
  /**
   * @return Google_Service_ShoppingContent_TransitTable
   */
  public function getTransitTimeTable()
  {
    return $this->transitTimeTable;
  }
  /**
   * @param Google_Service_ShoppingContent_WarehouseBasedDeliveryTime[]
   */
  public function setWarehouseBasedDeliveryTimes($warehouseBasedDeliveryTimes)
  {
    $this->warehouseBasedDeliveryTimes = $warehouseBasedDeliveryTimes;
  }
  /**
   * @return Google_Service_ShoppingContent_WarehouseBasedDeliveryTime[]
   */
  public function getWarehouseBasedDeliveryTimes()
  {
    return $this->warehouseBasedDeliveryTimes;
  }
}
