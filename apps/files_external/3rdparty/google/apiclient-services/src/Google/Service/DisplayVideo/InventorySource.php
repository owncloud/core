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

class Google_Service_DisplayVideo_InventorySource extends Google_Collection
{
  protected $collection_key = 'creativeConfigs';
  public $commitment;
  protected $creativeConfigsType = 'Google_Service_DisplayVideo_CreativeConfig';
  protected $creativeConfigsDataType = 'array';
  public $dealId;
  public $deliveryMethod;
  public $displayName;
  public $exchange;
  public $inventorySourceId;
  public $inventorySourceType;
  public $name;
  public $publisherName;
  protected $rateDetailsType = 'Google_Service_DisplayVideo_RateDetails';
  protected $rateDetailsDataType = '';
  protected $statusType = 'Google_Service_DisplayVideo_InventorySourceStatus';
  protected $statusDataType = '';
  protected $timeRangeType = 'Google_Service_DisplayVideo_TimeRange';
  protected $timeRangeDataType = '';
  public $updateTime;

  public function setCommitment($commitment)
  {
    $this->commitment = $commitment;
  }
  public function getCommitment()
  {
    return $this->commitment;
  }
  /**
   * @param Google_Service_DisplayVideo_CreativeConfig
   */
  public function setCreativeConfigs($creativeConfigs)
  {
    $this->creativeConfigs = $creativeConfigs;
  }
  /**
   * @return Google_Service_DisplayVideo_CreativeConfig
   */
  public function getCreativeConfigs()
  {
    return $this->creativeConfigs;
  }
  public function setDealId($dealId)
  {
    $this->dealId = $dealId;
  }
  public function getDealId()
  {
    return $this->dealId;
  }
  public function setDeliveryMethod($deliveryMethod)
  {
    $this->deliveryMethod = $deliveryMethod;
  }
  public function getDeliveryMethod()
  {
    return $this->deliveryMethod;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setExchange($exchange)
  {
    $this->exchange = $exchange;
  }
  public function getExchange()
  {
    return $this->exchange;
  }
  public function setInventorySourceId($inventorySourceId)
  {
    $this->inventorySourceId = $inventorySourceId;
  }
  public function getInventorySourceId()
  {
    return $this->inventorySourceId;
  }
  public function setInventorySourceType($inventorySourceType)
  {
    $this->inventorySourceType = $inventorySourceType;
  }
  public function getInventorySourceType()
  {
    return $this->inventorySourceType;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPublisherName($publisherName)
  {
    $this->publisherName = $publisherName;
  }
  public function getPublisherName()
  {
    return $this->publisherName;
  }
  /**
   * @param Google_Service_DisplayVideo_RateDetails
   */
  public function setRateDetails(Google_Service_DisplayVideo_RateDetails $rateDetails)
  {
    $this->rateDetails = $rateDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_RateDetails
   */
  public function getRateDetails()
  {
    return $this->rateDetails;
  }
  /**
   * @param Google_Service_DisplayVideo_InventorySourceStatus
   */
  public function setStatus(Google_Service_DisplayVideo_InventorySourceStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return Google_Service_DisplayVideo_InventorySourceStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param Google_Service_DisplayVideo_TimeRange
   */
  public function setTimeRange(Google_Service_DisplayVideo_TimeRange $timeRange)
  {
    $this->timeRange = $timeRange;
  }
  /**
   * @return Google_Service_DisplayVideo_TimeRange
   */
  public function getTimeRange()
  {
    return $this->timeRange;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}
