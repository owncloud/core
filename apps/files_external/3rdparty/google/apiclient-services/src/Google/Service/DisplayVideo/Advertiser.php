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

class Google_Service_DisplayVideo_Advertiser extends Google_Model
{
  protected $adServerConfigType = 'Google_Service_DisplayVideo_AdvertiserAdServerConfig';
  protected $adServerConfigDataType = '';
  public $advertiserId;
  protected $creativeConfigType = 'Google_Service_DisplayVideo_AdvertiserCreativeConfig';
  protected $creativeConfigDataType = '';
  protected $dataAccessConfigType = 'Google_Service_DisplayVideo_AdvertiserDataAccessConfig';
  protected $dataAccessConfigDataType = '';
  public $displayName;
  public $entityStatus;
  protected $generalConfigType = 'Google_Service_DisplayVideo_AdvertiserGeneralConfig';
  protected $generalConfigDataType = '';
  protected $integrationDetailsType = 'Google_Service_DisplayVideo_IntegrationDetails';
  protected $integrationDetailsDataType = '';
  public $name;
  public $partnerId;
  protected $servingConfigType = 'Google_Service_DisplayVideo_AdvertiserTargetingConfig';
  protected $servingConfigDataType = '';
  public $updateTime;

  /**
   * @param Google_Service_DisplayVideo_AdvertiserAdServerConfig
   */
  public function setAdServerConfig(Google_Service_DisplayVideo_AdvertiserAdServerConfig $adServerConfig)
  {
    $this->adServerConfig = $adServerConfig;
  }
  /**
   * @return Google_Service_DisplayVideo_AdvertiserAdServerConfig
   */
  public function getAdServerConfig()
  {
    return $this->adServerConfig;
  }
  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  /**
   * @param Google_Service_DisplayVideo_AdvertiserCreativeConfig
   */
  public function setCreativeConfig(Google_Service_DisplayVideo_AdvertiserCreativeConfig $creativeConfig)
  {
    $this->creativeConfig = $creativeConfig;
  }
  /**
   * @return Google_Service_DisplayVideo_AdvertiserCreativeConfig
   */
  public function getCreativeConfig()
  {
    return $this->creativeConfig;
  }
  /**
   * @param Google_Service_DisplayVideo_AdvertiserDataAccessConfig
   */
  public function setDataAccessConfig(Google_Service_DisplayVideo_AdvertiserDataAccessConfig $dataAccessConfig)
  {
    $this->dataAccessConfig = $dataAccessConfig;
  }
  /**
   * @return Google_Service_DisplayVideo_AdvertiserDataAccessConfig
   */
  public function getDataAccessConfig()
  {
    return $this->dataAccessConfig;
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
   * @param Google_Service_DisplayVideo_AdvertiserGeneralConfig
   */
  public function setGeneralConfig(Google_Service_DisplayVideo_AdvertiserGeneralConfig $generalConfig)
  {
    $this->generalConfig = $generalConfig;
  }
  /**
   * @return Google_Service_DisplayVideo_AdvertiserGeneralConfig
   */
  public function getGeneralConfig()
  {
    return $this->generalConfig;
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
  public function setPartnerId($partnerId)
  {
    $this->partnerId = $partnerId;
  }
  public function getPartnerId()
  {
    return $this->partnerId;
  }
  /**
   * @param Google_Service_DisplayVideo_AdvertiserTargetingConfig
   */
  public function setServingConfig(Google_Service_DisplayVideo_AdvertiserTargetingConfig $servingConfig)
  {
    $this->servingConfig = $servingConfig;
  }
  /**
   * @return Google_Service_DisplayVideo_AdvertiserTargetingConfig
   */
  public function getServingConfig()
  {
    return $this->servingConfig;
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
