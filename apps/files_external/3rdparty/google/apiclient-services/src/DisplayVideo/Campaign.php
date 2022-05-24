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

class Campaign extends \Google\Collection
{
  protected $collection_key = 'campaignBudgets';
  /**
   * @var string
   */
  public $advertiserId;
  protected $campaignBudgetsType = CampaignBudget::class;
  protected $campaignBudgetsDataType = 'array';
  protected $campaignFlightType = CampaignFlight::class;
  protected $campaignFlightDataType = '';
  protected $campaignGoalType = CampaignGoal::class;
  protected $campaignGoalDataType = '';
  /**
   * @var string
   */
  public $campaignId;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $entityStatus;
  protected $frequencyCapType = FrequencyCap::class;
  protected $frequencyCapDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $updateTime;

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
   * @param CampaignBudget[]
   */
  public function setCampaignBudgets($campaignBudgets)
  {
    $this->campaignBudgets = $campaignBudgets;
  }
  /**
   * @return CampaignBudget[]
   */
  public function getCampaignBudgets()
  {
    return $this->campaignBudgets;
  }
  /**
   * @param CampaignFlight
   */
  public function setCampaignFlight(CampaignFlight $campaignFlight)
  {
    $this->campaignFlight = $campaignFlight;
  }
  /**
   * @return CampaignFlight
   */
  public function getCampaignFlight()
  {
    return $this->campaignFlight;
  }
  /**
   * @param CampaignGoal
   */
  public function setCampaignGoal(CampaignGoal $campaignGoal)
  {
    $this->campaignGoal = $campaignGoal;
  }
  /**
   * @return CampaignGoal
   */
  public function getCampaignGoal()
  {
    return $this->campaignGoal;
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
class_alias(Campaign::class, 'Google_Service_DisplayVideo_Campaign');
