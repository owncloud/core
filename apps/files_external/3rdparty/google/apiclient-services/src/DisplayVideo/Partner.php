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

class Partner extends \Google\Model
{
  protected $adServerConfigType = PartnerAdServerConfig::class;
  protected $adServerConfigDataType = '';
  protected $dataAccessConfigType = PartnerDataAccessConfig::class;
  protected $dataAccessConfigDataType = '';
  public $displayName;
  public $entityStatus;
  protected $exchangeConfigType = ExchangeConfig::class;
  protected $exchangeConfigDataType = '';
  protected $generalConfigType = PartnerGeneralConfig::class;
  protected $generalConfigDataType = '';
  public $name;
  public $partnerId;
  public $updateTime;

  /**
   * @param PartnerAdServerConfig
   */
  public function setAdServerConfig(PartnerAdServerConfig $adServerConfig)
  {
    $this->adServerConfig = $adServerConfig;
  }
  /**
   * @return PartnerAdServerConfig
   */
  public function getAdServerConfig()
  {
    return $this->adServerConfig;
  }
  /**
   * @param PartnerDataAccessConfig
   */
  public function setDataAccessConfig(PartnerDataAccessConfig $dataAccessConfig)
  {
    $this->dataAccessConfig = $dataAccessConfig;
  }
  /**
   * @return PartnerDataAccessConfig
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
   * @param ExchangeConfig
   */
  public function setExchangeConfig(ExchangeConfig $exchangeConfig)
  {
    $this->exchangeConfig = $exchangeConfig;
  }
  /**
   * @return ExchangeConfig
   */
  public function getExchangeConfig()
  {
    return $this->exchangeConfig;
  }
  /**
   * @param PartnerGeneralConfig
   */
  public function setGeneralConfig(PartnerGeneralConfig $generalConfig)
  {
    $this->generalConfig = $generalConfig;
  }
  /**
   * @return PartnerGeneralConfig
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Partner::class, 'Google_Service_DisplayVideo_Partner');
