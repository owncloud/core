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

namespace Google\Service\Contentwarehouse;

class AssistantApiCoreTypesDeviceId extends \Google\Model
{
  /**
   * @var string
   */
  public $agsaClientInstanceId;
  /**
   * @var string
   */
  public $alloDeviceId;
  /**
   * @var string
   */
  public $canonicalDeviceId;
  /**
   * @var string
   */
  public $castDeviceId;
  /**
   * @var string
   */
  public $clientInstanceId;
  /**
   * @var string
   */
  public $connectedDockId;
  protected $deviceConfigType = AssistantApiCoreTypesDeviceConfig::class;
  protected $deviceConfigDataType = '';
  /**
   * @var string
   */
  public $deviceType;
  /**
   * @var string
   */
  public $homeGraphDeviceId;
  /**
   * @var string
   */
  public $libassistantDeviceId;
  /**
   * @var string
   */
  public $multiHotwordArbitrationDeviceId;
  /**
   * @var string
   */
  public $opaIosDeviceId;
  /**
   * @var string
   */
  public $quartzDeviceId;

  /**
   * @param string
   */
  public function setAgsaClientInstanceId($agsaClientInstanceId)
  {
    $this->agsaClientInstanceId = $agsaClientInstanceId;
  }
  /**
   * @return string
   */
  public function getAgsaClientInstanceId()
  {
    return $this->agsaClientInstanceId;
  }
  /**
   * @param string
   */
  public function setAlloDeviceId($alloDeviceId)
  {
    $this->alloDeviceId = $alloDeviceId;
  }
  /**
   * @return string
   */
  public function getAlloDeviceId()
  {
    return $this->alloDeviceId;
  }
  /**
   * @param string
   */
  public function setCanonicalDeviceId($canonicalDeviceId)
  {
    $this->canonicalDeviceId = $canonicalDeviceId;
  }
  /**
   * @return string
   */
  public function getCanonicalDeviceId()
  {
    return $this->canonicalDeviceId;
  }
  /**
   * @param string
   */
  public function setCastDeviceId($castDeviceId)
  {
    $this->castDeviceId = $castDeviceId;
  }
  /**
   * @return string
   */
  public function getCastDeviceId()
  {
    return $this->castDeviceId;
  }
  /**
   * @param string
   */
  public function setClientInstanceId($clientInstanceId)
  {
    $this->clientInstanceId = $clientInstanceId;
  }
  /**
   * @return string
   */
  public function getClientInstanceId()
  {
    return $this->clientInstanceId;
  }
  /**
   * @param string
   */
  public function setConnectedDockId($connectedDockId)
  {
    $this->connectedDockId = $connectedDockId;
  }
  /**
   * @return string
   */
  public function getConnectedDockId()
  {
    return $this->connectedDockId;
  }
  /**
   * @param AssistantApiCoreTypesDeviceConfig
   */
  public function setDeviceConfig(AssistantApiCoreTypesDeviceConfig $deviceConfig)
  {
    $this->deviceConfig = $deviceConfig;
  }
  /**
   * @return AssistantApiCoreTypesDeviceConfig
   */
  public function getDeviceConfig()
  {
    return $this->deviceConfig;
  }
  /**
   * @param string
   */
  public function setDeviceType($deviceType)
  {
    $this->deviceType = $deviceType;
  }
  /**
   * @return string
   */
  public function getDeviceType()
  {
    return $this->deviceType;
  }
  /**
   * @param string
   */
  public function setHomeGraphDeviceId($homeGraphDeviceId)
  {
    $this->homeGraphDeviceId = $homeGraphDeviceId;
  }
  /**
   * @return string
   */
  public function getHomeGraphDeviceId()
  {
    return $this->homeGraphDeviceId;
  }
  /**
   * @param string
   */
  public function setLibassistantDeviceId($libassistantDeviceId)
  {
    $this->libassistantDeviceId = $libassistantDeviceId;
  }
  /**
   * @return string
   */
  public function getLibassistantDeviceId()
  {
    return $this->libassistantDeviceId;
  }
  /**
   * @param string
   */
  public function setMultiHotwordArbitrationDeviceId($multiHotwordArbitrationDeviceId)
  {
    $this->multiHotwordArbitrationDeviceId = $multiHotwordArbitrationDeviceId;
  }
  /**
   * @return string
   */
  public function getMultiHotwordArbitrationDeviceId()
  {
    return $this->multiHotwordArbitrationDeviceId;
  }
  /**
   * @param string
   */
  public function setOpaIosDeviceId($opaIosDeviceId)
  {
    $this->opaIosDeviceId = $opaIosDeviceId;
  }
  /**
   * @return string
   */
  public function getOpaIosDeviceId()
  {
    return $this->opaIosDeviceId;
  }
  /**
   * @param string
   */
  public function setQuartzDeviceId($quartzDeviceId)
  {
    $this->quartzDeviceId = $quartzDeviceId;
  }
  /**
   * @return string
   */
  public function getQuartzDeviceId()
  {
    return $this->quartzDeviceId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiCoreTypesDeviceId::class, 'Google_Service_Contentwarehouse_AssistantApiCoreTypesDeviceId');
