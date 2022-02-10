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
  /**
   * @var string
   */
  public $advertiserId;
  protected $bidStrategyType = BiddingStrategy::class;
  protected $bidStrategyDataType = '';
  protected $budgetType = LineItemBudget::class;
  protected $budgetDataType = '';
  /**
   * @var string
   */
  public $campaignId;
  protected $conversionCountingType = ConversionCountingConfig::class;
  protected $conversionCountingDataType = '';
  /**
   * @var string[]
   */
  public $creativeIds;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $entityStatus;
  /**
   * @var bool
   */
  public $excludeNewExchanges;
  protected $flightType = LineItemFlight::class;
  protected $flightDataType = '';
  protected $frequencyCapType = FrequencyCap::class;
  protected $frequencyCapDataType = '';
  /**
   * @var string
   */
  public $insertionOrderId;
  protected $integrationDetailsType = IntegrationDetails::class;
  protected $integrationDetailsDataType = '';
  /**
   * @var string[]
   */
  public $inventorySourceIds;
  /**
   * @var string
   */
  public $lineItemId;
  /**
   * @var string
   */
  public $lineItemType;
  protected $mobileAppType = MobileApp::class;
  protected $mobileAppDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $pacingType = Pacing::class;
  protected $pacingDataType = '';
  protected $partnerCostsType = PartnerCost::class;
  protected $partnerCostsDataType = 'array';
  protected $partnerRevenueModelType = PartnerRevenueModel::class;
  protected $partnerRevenueModelDataType = '';
  /**
   * @var string
   */
  public $reservationType;
  protected $targetingExpansionType = TargetingExpansionConfig::class;
  protected $targetingExpansionDataType = '';
  /**
   * @var string
   */
  public $updateTime;
  /**
   * @var string[]
   */
  public $warningMessages;

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
  /**
   * @param string
   */
  public function setCampaignId($campaignId)
  {
    $this->campaignId = $campaignId;
  }
  /**
   * @return string
   */
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
  /**
   * @param string[]
   */
  public function setCreativeIds($creativeIds)
  {
    $this->creativeIds = $creativeIds;
  }
  /**
   * @return string[]
   */
  public function getCreativeIds()
  {
    return $this->creativeIds;
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
  public function setEntityStatus($entityStatus)
  {
    $this->entityStatus = $entityStatus;
  }
  /**
   * @return string
   */
  public function getEntityStatus()
  {
    return $this->entityStatus;
  }
  /**
   * @param bool
   */
  public function setExcludeNewExchanges($excludeNewExchanges)
  {
    $this->excludeNewExchanges = $excludeNewExchanges;
  }
  /**
   * @return bool
   */
  public function getExcludeNewExchanges()
  {
    return $this->excludeNewExchanges;
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
  /**
   * @param string
   */
  public function setInsertionOrderId($insertionOrderId)
  {
    $this->insertionOrderId = $insertionOrderId;
  }
  /**
   * @return string
   */
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
  /**
   * @param string[]
   */
  public function setInventorySourceIds($inventorySourceIds)
  {
    $this->inventorySourceIds = $inventorySourceIds;
  }
  /**
   * @return string[]
   */
  public function getInventorySourceIds()
  {
    return $this->inventorySourceIds;
  }
  /**
   * @param string
   */
  public function setLineItemId($lineItemId)
  {
    $this->lineItemId = $lineItemId;
  }
  /**
   * @return string
   */
  public function getLineItemId()
  {
    return $this->lineItemId;
  }
  /**
   * @param string
   */
  public function setLineItemType($lineItemType)
  {
    $this->lineItemType = $lineItemType;
  }
  /**
   * @return string
   */
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
   * @param string
   */
  public function setReservationType($reservationType)
  {
    $this->reservationType = $reservationType;
  }
  /**
   * @return string
   */
  public function getReservationType()
  {
    return $this->reservationType;
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
  /**
   * @param string[]
   */
  public function setWarningMessages($warningMessages)
  {
    $this->warningMessages = $warningMessages;
  }
  /**
   * @return string[]
   */
  public function getWarningMessages()
  {
    return $this->warningMessages;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LineItem::class, 'Google_Service_DisplayVideo_LineItem');
