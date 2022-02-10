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

namespace Google\Service\Dfareporting;

class InventoryItem extends \Google\Collection
{
  protected $collection_key = 'adSlots';
  /**
   * @var string
   */
  public $accountId;
  protected $adSlotsType = AdSlot::class;
  protected $adSlotsDataType = 'array';
  /**
   * @var string
   */
  public $advertiserId;
  /**
   * @var string
   */
  public $contentCategoryId;
  /**
   * @var string
   */
  public $estimatedClickThroughRate;
  /**
   * @var string
   */
  public $estimatedConversionRate;
  /**
   * @var string
   */
  public $id;
  /**
   * @var bool
   */
  public $inPlan;
  /**
   * @var string
   */
  public $kind;
  protected $lastModifiedInfoType = LastModifiedInfo::class;
  protected $lastModifiedInfoDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $negotiationChannelId;
  /**
   * @var string
   */
  public $orderId;
  /**
   * @var string
   */
  public $placementStrategyId;
  protected $pricingType = Pricing::class;
  protected $pricingDataType = '';
  /**
   * @var string
   */
  public $projectId;
  /**
   * @var string
   */
  public $rfpId;
  /**
   * @var string
   */
  public $siteId;
  /**
   * @var string
   */
  public $subaccountId;
  /**
   * @var string
   */
  public $type;

  /**
   * @param string
   */
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  /**
   * @return string
   */
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param AdSlot[]
   */
  public function setAdSlots($adSlots)
  {
    $this->adSlots = $adSlots;
  }
  /**
   * @return AdSlot[]
   */
  public function getAdSlots()
  {
    return $this->adSlots;
  }
  /**
   * @param string
   */
  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  /**
   * @return string
   */
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  /**
   * @param string
   */
  public function setContentCategoryId($contentCategoryId)
  {
    $this->contentCategoryId = $contentCategoryId;
  }
  /**
   * @return string
   */
  public function getContentCategoryId()
  {
    return $this->contentCategoryId;
  }
  /**
   * @param string
   */
  public function setEstimatedClickThroughRate($estimatedClickThroughRate)
  {
    $this->estimatedClickThroughRate = $estimatedClickThroughRate;
  }
  /**
   * @return string
   */
  public function getEstimatedClickThroughRate()
  {
    return $this->estimatedClickThroughRate;
  }
  /**
   * @param string
   */
  public function setEstimatedConversionRate($estimatedConversionRate)
  {
    $this->estimatedConversionRate = $estimatedConversionRate;
  }
  /**
   * @return string
   */
  public function getEstimatedConversionRate()
  {
    return $this->estimatedConversionRate;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param bool
   */
  public function setInPlan($inPlan)
  {
    $this->inPlan = $inPlan;
  }
  /**
   * @return bool
   */
  public function getInPlan()
  {
    return $this->inPlan;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param LastModifiedInfo
   */
  public function setLastModifiedInfo(LastModifiedInfo $lastModifiedInfo)
  {
    $this->lastModifiedInfo = $lastModifiedInfo;
  }
  /**
   * @return LastModifiedInfo
   */
  public function getLastModifiedInfo()
  {
    return $this->lastModifiedInfo;
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
  public function setNegotiationChannelId($negotiationChannelId)
  {
    $this->negotiationChannelId = $negotiationChannelId;
  }
  /**
   * @return string
   */
  public function getNegotiationChannelId()
  {
    return $this->negotiationChannelId;
  }
  /**
   * @param string
   */
  public function setOrderId($orderId)
  {
    $this->orderId = $orderId;
  }
  /**
   * @return string
   */
  public function getOrderId()
  {
    return $this->orderId;
  }
  /**
   * @param string
   */
  public function setPlacementStrategyId($placementStrategyId)
  {
    $this->placementStrategyId = $placementStrategyId;
  }
  /**
   * @return string
   */
  public function getPlacementStrategyId()
  {
    return $this->placementStrategyId;
  }
  /**
   * @param Pricing
   */
  public function setPricing(Pricing $pricing)
  {
    $this->pricing = $pricing;
  }
  /**
   * @return Pricing
   */
  public function getPricing()
  {
    return $this->pricing;
  }
  /**
   * @param string
   */
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  /**
   * @return string
   */
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param string
   */
  public function setRfpId($rfpId)
  {
    $this->rfpId = $rfpId;
  }
  /**
   * @return string
   */
  public function getRfpId()
  {
    return $this->rfpId;
  }
  /**
   * @param string
   */
  public function setSiteId($siteId)
  {
    $this->siteId = $siteId;
  }
  /**
   * @return string
   */
  public function getSiteId()
  {
    return $this->siteId;
  }
  /**
   * @param string
   */
  public function setSubaccountId($subaccountId)
  {
    $this->subaccountId = $subaccountId;
  }
  /**
   * @return string
   */
  public function getSubaccountId()
  {
    return $this->subaccountId;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InventoryItem::class, 'Google_Service_Dfareporting_InventoryItem');
