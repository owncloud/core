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

class Google_Service_DisplayVideo_Campaign extends Google_Model
{
  public $advertiserId;
  protected $campaignFlightType = 'Google_Service_DisplayVideo_CampaignFlight';
  protected $campaignFlightDataType = '';
  protected $campaignGoalType = 'Google_Service_DisplayVideo_CampaignGoal';
  protected $campaignGoalDataType = '';
  public $campaignId;
  public $displayName;
  public $entityStatus;
  protected $frequencyCapType = 'Google_Service_DisplayVideo_FrequencyCap';
  protected $frequencyCapDataType = '';
  public $name;
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
   * @param Google_Service_DisplayVideo_CampaignFlight
   */
  public function setCampaignFlight(Google_Service_DisplayVideo_CampaignFlight $campaignFlight)
  {
    $this->campaignFlight = $campaignFlight;
  }
  /**
   * @return Google_Service_DisplayVideo_CampaignFlight
   */
  public function getCampaignFlight()
  {
    return $this->campaignFlight;
  }
  /**
   * @param Google_Service_DisplayVideo_CampaignGoal
   */
  public function setCampaignGoal(Google_Service_DisplayVideo_CampaignGoal $campaignGoal)
  {
    $this->campaignGoal = $campaignGoal;
  }
  /**
   * @return Google_Service_DisplayVideo_CampaignGoal
   */
  public function getCampaignGoal()
  {
    return $this->campaignGoal;
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
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
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
