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
  protected $collection_key = 'readPartnerIds';
  /**
   * @var string
   */
  public $commitment;
  protected $creativeConfigsType = CreativeConfig::class;
  protected $creativeConfigsDataType = 'array';
  /**
   * @var string
   */
  public $dealId;
  /**
   * @var string
   */
  public $deliveryMethod;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $exchange;
  /**
   * @var string
   */
  public $guaranteedOrderId;
  /**
   * @var string
   */
  public $inventorySourceId;
  /**
   * @var string
   */
  public $inventorySourceProductType;
  /**
   * @var string
   */
  public $inventorySourceType;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $publisherName;
  protected $rateDetailsType = RateDetails::class;
  protected $rateDetailsDataType = '';
  /**
   * @var string[]
   */
  public $readAdvertiserIds;
  /**
   * @var string[]
   */
  public $readPartnerIds;
  protected $readWriteAccessorsType = InventorySourceAccessors::class;
  protected $readWriteAccessorsDataType = '';
  protected $statusType = InventorySourceStatus::class;
  protected $statusDataType = '';
  /**
   * @var string
   */
  public $subSitePropertyId;
  protected $timeRangeType = TimeRange::class;
  protected $timeRangeDataType = '';
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setCommitment($commitment)
  {
    $this->commitment = $commitment;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setDealId($dealId)
  {
    $this->dealId = $dealId;
  }
  /**
   * @return string
   */
  public function getDealId()
  {
    return $this->dealId;
  }
  /**
   * @param string
   */
  public function setDeliveryMethod($deliveryMethod)
  {
    $this->deliveryMethod = $deliveryMethod;
  }
  /**
   * @return string
   */
  public function getDeliveryMethod()
  {
    return $this->deliveryMethod;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setExchange($exchange)
  {
    $this->exchange = $exchange;
  }
  /**
   * @return string
   */
  public function getExchange()
  {
    return $this->exchange;
  }
  /**
   * @param string
   */
  public function setGuaranteedOrderId($guaranteedOrderId)
  {
    $this->guaranteedOrderId = $guaranteedOrderId;
  }
  /**
   * @return string
   */
  public function getGuaranteedOrderId()
  {
    return $this->guaranteedOrderId;
  }
  /**
   * @param string
   */
  public function setInventorySourceId($inventorySourceId)
  {
    $this->inventorySourceId = $inventorySourceId;
  }
  /**
   * @return string
   */
  public function getInventorySourceId()
  {
    return $this->inventorySourceId;
  }
  /**
   * @param string
   */
  public function setInventorySourceProductType($inventorySourceProductType)
  {
    $this->inventorySourceProductType = $inventorySourceProductType;
  }
  /**
   * @return string
   */
  public function getInventorySourceProductType()
  {
    return $this->inventorySourceProductType;
  }
  /**
   * @param string
   */
  public function setInventorySourceType($inventorySourceType)
  {
    $this->inventorySourceType = $inventorySourceType;
  }
  /**
   * @return string
   */
  public function getInventorySourceType()
  {
    return $this->inventorySourceType;
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
   * @param string
   */
  public function setPublisherName($publisherName)
  {
    $this->publisherName = $publisherName;
  }
  /**
   * @return string
   */
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
   * @param string[]
   */
  public function setReadAdvertiserIds($readAdvertiserIds)
  {
    $this->readAdvertiserIds = $readAdvertiserIds;
  }
  /**
   * @return string[]
   */
  public function getReadAdvertiserIds()
  {
    return $this->readAdvertiserIds;
  }
  /**
   * @param string[]
   */
  public function setReadPartnerIds($readPartnerIds)
  {
    $this->readPartnerIds = $readPartnerIds;
  }
  /**
   * @return string[]
   */
  public function getReadPartnerIds()
  {
    return $this->readPartnerIds;
  }
  /**
   * @param InventorySourceAccessors
   */
  public function setReadWriteAccessors(InventorySourceAccessors $readWriteAccessors)
  {
    $this->readWriteAccessors = $readWriteAccessors;
  }
  /**
   * @return InventorySourceAccessors
   */
  public function getReadWriteAccessors()
  {
    return $this->readWriteAccessors;
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
   * @param string
   */
  public function setSubSitePropertyId($subSitePropertyId)
  {
    $this->subSitePropertyId = $subSitePropertyId;
  }
  /**
   * @return string
   */
  public function getSubSitePropertyId()
  {
    return $this->subSitePropertyId;
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
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InventorySource::class, 'Google_Service_DisplayVideo_InventorySource');
