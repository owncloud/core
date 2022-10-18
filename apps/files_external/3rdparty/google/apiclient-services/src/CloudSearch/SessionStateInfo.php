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

namespace Google\Service\CloudSearch;

class SessionStateInfo extends \Google\Model
{
  protected $ackInfoType = AckInfo::class;
  protected $ackInfoDataType = '';
  protected $languageConfigType = LanguageConfig::class;
  protected $languageConfigDataType = '';
  /**
   * @var string
   */
  public $lastActorDeviceId;
  /**
   * @var string
   */
  public $maxEndTime;
  /**
   * @var string
   */
  public $sessionState;
  /**
   * @var string
   */
  public $sessionStopReason;

  /**
   * @param AckInfo
   */
  public function setAckInfo(AckInfo $ackInfo)
  {
    $this->ackInfo = $ackInfo;
  }
  /**
   * @return AckInfo
   */
  public function getAckInfo()
  {
    return $this->ackInfo;
  }
  /**
   * @param LanguageConfig
   */
  public function setLanguageConfig(LanguageConfig $languageConfig)
  {
    $this->languageConfig = $languageConfig;
  }
  /**
   * @return LanguageConfig
   */
  public function getLanguageConfig()
  {
    return $this->languageConfig;
  }
  /**
   * @param string
   */
  public function setLastActorDeviceId($lastActorDeviceId)
  {
    $this->lastActorDeviceId = $lastActorDeviceId;
  }
  /**
   * @return string
   */
  public function getLastActorDeviceId()
  {
    return $this->lastActorDeviceId;
  }
  /**
   * @param string
   */
  public function setMaxEndTime($maxEndTime)
  {
    $this->maxEndTime = $maxEndTime;
  }
  /**
   * @return string
   */
  public function getMaxEndTime()
  {
    return $this->maxEndTime;
  }
  /**
   * @param string
   */
  public function setSessionState($sessionState)
  {
    $this->sessionState = $sessionState;
  }
  /**
   * @return string
   */
  public function getSessionState()
  {
    return $this->sessionState;
  }
  /**
   * @param string
   */
  public function setSessionStopReason($sessionStopReason)
  {
    $this->sessionStopReason = $sessionStopReason;
  }
  /**
   * @return string
   */
  public function getSessionStopReason()
  {
    return $this->sessionStopReason;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SessionStateInfo::class, 'Google_Service_CloudSearch_SessionStateInfo');
