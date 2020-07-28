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

class Google_Service_DisplayVideo_Partner extends Google_Model
{
  protected $adServerConfigType = 'Google_Service_DisplayVideo_PartnerAdServerConfig';
  protected $adServerConfigDataType = '';
  protected $dataAccessConfigType = 'Google_Service_DisplayVideo_PartnerDataAccessConfig';
  protected $dataAccessConfigDataType = '';
  public $displayName;
  public $entityStatus;
  protected $exchangeConfigType = 'Google_Service_DisplayVideo_ExchangeConfig';
  protected $exchangeConfigDataType = '';
  protected $generalConfigType = 'Google_Service_DisplayVideo_PartnerGeneralConfig';
  protected $generalConfigDataType = '';
  public $name;
  public $partnerId;
  public $updateTime;

  /**
   * @param Google_Service_DisplayVideo_PartnerAdServerConfig
   */
  public function setAdServerConfig(Google_Service_DisplayVideo_PartnerAdServerConfig $adServerConfig)
  {
    $this->adServerConfig = $adServerConfig;
  }
  /**
   * @return Google_Service_DisplayVideo_PartnerAdServerConfig
   */
  public function getAdServerConfig()
  {
    return $this->adServerConfig;
  }
  /**
   * @param Google_Service_DisplayVideo_PartnerDataAccessConfig
   */
  public function setDataAccessConfig(Google_Service_DisplayVideo_PartnerDataAccessConfig $dataAccessConfig)
  {
    $this->dataAccessConfig = $dataAccessConfig;
  }
  /**
   * @return Google_Service_DisplayVideo_PartnerDataAccessConfig
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
   * @param Google_Service_DisplayVideo_ExchangeConfig
   */
  public function setExchangeConfig(Google_Service_DisplayVideo_ExchangeConfig $exchangeConfig)
  {
    $this->exchangeConfig = $exchangeConfig;
  }
  /**
   * @return Google_Service_DisplayVideo_ExchangeConfig
   */
  public function getExchangeConfig()
  {
    return $this->exchangeConfig;
  }
  /**
   * @param Google_Service_DisplayVideo_PartnerGeneralConfig
   */
  public function setGeneralConfig(Google_Service_DisplayVideo_PartnerGeneralConfig $generalConfig)
  {
    $this->generalConfig = $generalConfig;
  }
  /**
   * @return Google_Service_DisplayVideo_PartnerGeneralConfig
   */
  public function getGeneralConfig()
  {
    return $this->generalConfig;
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
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}
