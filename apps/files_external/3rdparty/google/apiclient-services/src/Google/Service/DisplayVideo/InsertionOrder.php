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

class Google_Service_DisplayVideo_InsertionOrder extends Google_Collection
{
  protected $collection_key = 'partnerCosts';
  public $advertiserId;
  protected $bidStrategyType = 'Google_Service_DisplayVideo_BiddingStrategy';
  protected $bidStrategyDataType = '';
  protected $budgetType = 'Google_Service_DisplayVideo_InsertionOrderBudget';
  protected $budgetDataType = '';
  public $campaignId;
  public $displayName;
  public $entityStatus;
  protected $frequencyCapType = 'Google_Service_DisplayVideo_FrequencyCap';
  protected $frequencyCapDataType = '';
  public $insertionOrderId;
  protected $integrationDetailsType = 'Google_Service_DisplayVideo_IntegrationDetails';
  protected $integrationDetailsDataType = '';
  public $name;
  protected $pacingType = 'Google_Service_DisplayVideo_Pacing';
  protected $pacingDataType = '';
  protected $partnerCostsType = 'Google_Service_DisplayVideo_PartnerCost';
  protected $partnerCostsDataType = 'array';
  protected $performanceGoalType = 'Google_Service_DisplayVideo_PerformanceGoal';
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
   * @param Google_Service_DisplayVideo_BiddingStrategy
   */
  public function setBidStrategy(Google_Service_DisplayVideo_BiddingStrategy $bidStrategy)
  {
    $this->bidStrategy = $bidStrategy;
  }
  /**
   * @return Google_Service_DisplayVideo_BiddingStrategy
   */
  public function getBidStrategy()
  {
    return $this->bidStrategy;
  }
  /**
   * @param Google_Service_DisplayVideo_InsertionOrderBudget
   */
  public function setBudget(Google_Service_DisplayVideo_InsertionOrderBudget $budget)
  {
    $this->budget = $budget;
  }
  /**
   * @return Google_Service_DisplayVideo_InsertionOrderBudget
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
   * @param Google_Service_DisplayVideo_FrequencyCap
   */
  public function setFrequencyCap(Google_Service_DisplayVideo_FrequencyCap $frequencyCap)
  {
    $this->frequencyCap = $frequencyCap;
  }
  /**
   * @return Google_Service_DisplayVideo_FrequencyCap
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
   * @param Google_Service_DisplayVideo_IntegrationDetails
   */
  public function setIntegrationDetails(Google_Service_DisplayVideo_IntegrationDetails $integrationDetails)
  {
    $this->integrationDetails = $integrationDetails;
  }
  /**
   * @return Google_Service_DisplayVideo_IntegrationDetails
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
   * @param Google_Service_DisplayVideo_Pacing
   */
  public function setPacing(Google_Service_DisplayVideo_Pacing $pacing)
  {
    $this->pacing = $pacing;
  }
  /**
   * @return Google_Service_DisplayVideo_Pacing
   */
  public function getPacing()
  {
    return $this->pacing;
  }
  /**
   * @param Google_Service_DisplayVideo_PartnerCost
   */
  public function setPartnerCosts($partnerCosts)
  {
    $this->partnerCosts = $partnerCosts;
  }
  /**
   * @return Google_Service_DisplayVideo_PartnerCost
   */
  public function getPartnerCosts()
  {
    return $this->partnerCosts;
  }
  /**
   * @param Google_Service_DisplayVideo_PerformanceGoal
   */
  public function setPerformanceGoal(Google_Service_DisplayVideo_PerformanceGoal $performanceGoal)
  {
    $this->performanceGoal = $performanceGoal;
  }
  /**
   * @return Google_Service_DisplayVideo_PerformanceGoal
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
