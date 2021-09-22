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

namespace Google\Service\DisplayVideo;

class InventorySource extends \Google\Collection
{
  protected $collection_key = 'creativeConfigs';
  public $commitment;
  protected $creativeConfigsType = CreativeConfig::class;
  protected $creativeConfigsDataType = 'array';
  public $dealId;
  public $deliveryMethod;
  public $displayName;
  public $exchange;
  public $inventorySourceId;
  public $inventorySourceType;
  public $name;
  public $publisherName;
  protected $rateDetailsType = RateDetails::class;
  protected $rateDetailsDataType = '';
  protected $statusType = InventorySourceStatus::class;
  protected $statusDataType = '';
  protected $timeRangeType = TimeRange::class;
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
   * @param CreativeConfig[]
   */
  public function setCreativeConfigs($creativeConfigs)
  {
    $this->creativeConfigs = $creativeConfigs;
  }
  /**
   * @return CreativeConfig[]
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
   * @param RateDetails
   */
  public function setRateDetails(RateDetails $rateDetails)
  {
    $this->rateDetails = $rateDetails;
  }
  /**
   * @return RateDetails
   */
  public function getRateDetails()
  {
    return $this->rateDetails;
  }
  /**
   * @param InventorySourceStatus
   */
  public function setStatus(InventorySourceStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return InventorySourceStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param TimeRange
   */
  public function setTimeRange(TimeRange $timeRange)
  {
    $this->timeRange = $timeRange;
  }
  /**
   * @return TimeRange
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InventorySource::class, 'Google_Service_DisplayVideo_InventorySource');
