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

class LineItem extends \Google\Collection
{
  protected $collection_key = 'warningMessages';
  public $advertiserId;
  protected $bidStrategyType = BiddingStrategy::class;
  protected $bidStrategyDataType = '';
  protected $budgetType = LineItemBudget::class;
  protected $budgetDataType = '';
  public $campaignId;
  protected $conversionCountingType = ConversionCountingConfig::class;
  protected $conversionCountingDataType = '';
  public $creativeIds;
  public $displayName;
  public $entityStatus;
  protected $flightType = LineItemFlight::class;
  protected $flightDataType = '';
  protected $frequencyCapType = FrequencyCap::class;
  protected $frequencyCapDataType = '';
  public $insertionOrderId;
  protected $integrationDetailsType = IntegrationDetails::class;
  protected $integrationDetailsDataType = '';
  public $inventorySourceIds;
  public $lineItemId;
  public $lineItemType;
  protected $mobileAppType = MobileApp::class;
  protected $mobileAppDataType = '';
  public $name;
  protected $pacingType = Pacing::class;
  protected $pacingDataType = '';
  protected $partnerCostsType = PartnerCost::class;
  protected $partnerCostsDataType = 'array';
  protected $partnerRevenueModelType = PartnerRevenueModel::class;
  protected $partnerRevenueModelDataType = '';
  protected $targetingExpansionType = TargetingExpansionConfig::class;
  protected $targetingExpansionDataType = '';
  public $updateTime;
  public $warningMessages;

  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  /**
   * @param BiddingStrategy
   */
  public function setBidStrategy(BiddingStrategy $bidStrategy)
  {
    $this->bidStrategy = $bidStrategy;
  }
  /**
   * @return BiddingStrategy
   */
  public function getBidStrategy()
  {
    return $this->bidStrategy;
  }
  /**
   * @param LineItemBudget
   */
  public function setBudget(LineItemBudget $budget)
  {
    $this->budget = $budget;
  }
  /**
   * @return LineItemBudget
   */
  public function getBudget()
  {
    return $this->budget;
  }
  public function setCampaignId($campaignId)
  {
    $this->campaignId = $campaignId;
  }
  public function getCampaignId()
  {
    return $this->campaignId;
  }
  /**
   * @param ConversionCountingConfig
   */
  public function setConversionCounting(ConversionCountingConfig $conversionCounting)
  {
    $this->conversionCounting = $conversionCounting;
  }
  /**
   * @return ConversionCountingConfig
   */
  public function getConversionCounting()
  {
    return $this->conversionCounting;
  }
  public function setCreativeIds($creativeIds)
  {
    $this->creativeIds = $creativeIds;
  }
  public function getCreativeIds()
  {
    return $this->creativeIds;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setEntityStatus($entityStatus)
  {
    $this->entityStatus = $entityStatus;
  }
  public function getEntityStatus()
  {
    return $this->entityStatus;
  }
  /**
   * @param LineItemFlight
   */
  public function setFlight(LineItemFlight $flight)
  {
    $this->flight = $flight;
  }
  /**
   * @return LineItemFlight
   */
  public function getFlight()
  {
    return $this->flight;
  }
  /**
   * @param FrequencyCap
   */
  public function setFrequencyCap(FrequencyCap $frequencyCap)
  {
    $this->frequencyCap = $frequencyCap;
  }
  /**
   * @return FrequencyCap
   */
  public function getFrequencyCap()
  {
    return $this->frequencyCap;
  }
  public function setInsertionOrderId($insertionOrderId)
  {
    $this->insertionOrderId = $insertionOrderId;
  }
  public function getInsertionOrderId()
  {
    return $this->insertionOrderId;
  }
  /**
   * @param IntegrationDetails
   */
  public function setIntegrationDetails(IntegrationDetails $integrationDetails)
  {
    $this->integrationDetails = $integrationDetails;
  }
  /**
   * @return IntegrationDetails
   */
  public function getIntegrationDetails()
  {
    return $this->integrationDetails;
  }
  public function setInventorySourceIds($inventorySourceIds)
  {
    $this->inventorySourceIds = $inventorySourceIds;
  }
  public function getInventorySourceIds()
  {
    return $this->inventorySourceIds;
  }
  public function setLineItemId($lineItemId)
  {
    $this->lineItemId = $lineItemId;
  }
  public function getLineItemId()
  {
    return $this->lineItemId;
  }
  public function setLineItemType($lineItemType)
  {
    $this->lineItemType = $lineItemType;
  }
  public function getLineItemType()
  {
    return $this->lineItemType;
  }
  /**
   * @param MobileApp
   */
  public function setMobileApp(MobileApp $mobileApp)
  {
    $this->mobileApp = $mobileApp;
  }
  /**
   * @return MobileApp
   */
  public function getMobileApp()
  {
    return $this->mobileApp;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Pacing
   */
  public function setPacing(Pacing $pacing)
  {
    $this->pacing = $pacing;
  }
  /**
   * @return Pacing
   */
  public function getPacing()
  {
    return $this->pacing;
  }
  /**
   * @param PartnerCost[]
   */
  public function setPartnerCosts($partnerCosts)
  {
    $this->partnerCosts = $partnerCosts;
  }
  /**
   * @return PartnerCost[]
   */
  public function getPartnerCosts()
  {
    return $this->partnerCosts;
  }
  /**
   * @param PartnerRevenueModel
   */
  public function setPartnerRevenueModel(PartnerRevenueModel $partnerRevenueModel)
  {
    $this->partnerRevenueModel = $partnerRevenueModel;
  }
  /**
   * @return PartnerRevenueModel
   */
  public function getPartnerRevenueModel()
  {
    return $this->partnerRevenueModel;
  }
  /**
   * @param TargetingExpansionConfig
   */
  public function setTargetingExpansion(TargetingExpansionConfig $targetingExpansion)
  {
    $this->targetingExpansion = $targetingExpansion;
  }
  /**
   * @return TargetingExpansionConfig
   */
  public function getTargetingExpansion()
  {
    return $this->targetingExpansion;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  public function setWarningMessages($warningMessages)
  {
    $this->warningMessages = $warningMessages;
  }
  public function getWarningMessages()
  {
    return $this->warningMessages;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LineItem::class, 'Google_Service_DisplayVideo_LineItem');
