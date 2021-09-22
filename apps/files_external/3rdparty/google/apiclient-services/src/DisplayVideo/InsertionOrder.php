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

class InsertionOrder extends \Google\Collection
{
  protected $collection_key = 'partnerCosts';
  public $advertiserId;
  protected $bidStrategyType = BiddingStrategy::class;
  protected $bidStrategyDataType = '';
  protected $budgetType = InsertionOrderBudget::class;
  protected $budgetDataType = '';
  public $campaignId;
  public $displayName;
  public $entityStatus;
  protected $frequencyCapType = FrequencyCap::class;
  protected $frequencyCapDataType = '';
  public $insertionOrderId;
  public $insertionOrderType;
  protected $integrationDetailsType = IntegrationDetails::class;
  protected $integrationDetailsDataType = '';
  public $name;
  protected $pacingType = Pacing::class;
  protected $pacingDataType = '';
  protected $partnerCostsType = PartnerCost::class;
  protected $partnerCostsDataType = 'array';
  protected $performanceGoalType = PerformanceGoal::class;
  protected $performanceGoalDataType = '';
  public $updateTime;

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
   * @param InsertionOrderBudget
   */
  public function setBudget(InsertionOrderBudget $budget)
  {
    $this->budget = $budget;
  }
  /**
   * @return InsertionOrderBudget
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
  public function setInsertionOrderType($insertionOrderType)
  {
    $this->insertionOrderType = $insertionOrderType;
  }
  public function getInsertionOrderType()
  {
    return $this->insertionOrderType;
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
   * @param PerformanceGoal
   */
  public function setPerformanceGoal(PerformanceGoal $performanceGoal)
  {
    $this->performanceGoal = $performanceGoal;
  }
  /**
   * @return PerformanceGoal
   */
  public function getPerformanceGoal()
  {
    return $this->performanceGoal;
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
class_alias(InsertionOrder::class, 'Google_Service_DisplayVideo_InsertionOrder');
