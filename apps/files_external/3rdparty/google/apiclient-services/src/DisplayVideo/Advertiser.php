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

class Advertiser extends \Google\Model
{
  protected $adServerConfigType = AdvertiserAdServerConfig::class;
  protected $adServerConfigDataType = '';
  /**
   * @var string
   */
  public $advertiserId;
  protected $creativeConfigType = AdvertiserCreativeConfig::class;
  protected $creativeConfigDataType = '';
  protected $dataAccessConfigType = AdvertiserDataAccessConfig::class;
  protected $dataAccessConfigDataType = '';
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $entityStatus;
  protected $generalConfigType = AdvertiserGeneralConfig::class;
  protected $generalConfigDataType = '';
  protected $integrationDetailsType = IntegrationDetails::class;
  protected $integrationDetailsDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $partnerId;
  /**
   * @var bool
   */
  public $prismaEnabled;
  protected $servingConfigType = AdvertiserTargetingConfig::class;
  protected $servingConfigDataType = '';
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param AdvertiserAdServerConfig
   */
  public function setAdServerConfig(AdvertiserAdServerConfig $adServerConfig)
  {
    $this->adServerConfig = $adServerConfig;
  }
  /**
   * @return AdvertiserAdServerConfig
   */
  public function getAdServerConfig()
  {
    return $this->adServerConfig;
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
   * @param AdvertiserCreativeConfig
   */
  public function setCreativeConfig(AdvertiserCreativeConfig $creativeConfig)
  {
    $this->creativeConfig = $creativeConfig;
  }
  /**
   * @return AdvertiserCreativeConfig
   */
  public function getCreativeConfig()
  {
    return $this->creativeConfig;
  }
  /**
   * @param AdvertiserDataAccessConfig
   */
  public function setDataAccessConfig(AdvertiserDataAccessConfig $dataAccessConfig)
  {
    $this->dataAccessConfig = $dataAccessConfig;
  }
  /**
   * @return AdvertiserDataAccessConfig
   */
  public function getDataAccessConfig()
  {
    return $this->dataAccessConfig;
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
   * @param AdvertiserGeneralConfig
   */
  public function setGeneralConfig(AdvertiserGeneralConfig $generalConfig)
  {
    $this->generalConfig = $generalConfig;
  }
  /**
   * @return AdvertiserGeneralConfig
   */
  public function getGeneralConfig()
  {
    return $this->generalConfig;
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
  public function setPartnerId($partnerId)
  {
    $this->partnerId = $partnerId;
  }
  /**
   * @return string
   */
  public function getPartnerId()
  {
    return $this->partnerId;
  }
  /**
   * @param bool
   */
  public function setPrismaEnabled($prismaEnabled)
  {
    $this->prismaEnabled = $prismaEnabled;
  }
  /**
   * @return bool
   */
  public function getPrismaEnabled()
  {
    return $this->prismaEnabled;
  }
  /**
   * @param AdvertiserTargetingConfig
   */
  public function setServingConfig(AdvertiserTargetingConfig $servingConfig)
  {
    $this->servingConfig = $servingConfig;
  }
  /**
   * @return AdvertiserTargetingConfig
   */
  public function getServingConfig()
  {
    return $this->servingConfig;
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
class_alias(Advertiser::class, 'Google_Service_DisplayVideo_Advertiser');
