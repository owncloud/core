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

namespace Google\Service\CloudTalentSolution;

class RequestMetadata extends \Google\Model
{
  /**
   * @var bool
   */
  public $allowMissingIds;
  protected $deviceInfoType = DeviceInfo::class;
  protected $deviceInfoDataType = '';
  /**
   * @var string
   */
  public $domain;
  /**
   * @var string
   */
  public $sessionId;
  /**
   * @var string
   */
  public $userId;

  /**
   * @param bool
   */
  public function setAllowMissingIds($allowMissingIds)
  {
    $this->allowMissingIds = $allowMissingIds;
  }
  /**
   * @return bool
   */
  public function getAllowMissingIds()
  {
    return $this->allowMissingIds;
  }
  /**
   * @param DeviceInfo
   */
  public function setDeviceInfo(DeviceInfo $deviceInfo)
  {
    $this->deviceInfo = $deviceInfo;
  }
  /**
   * @return DeviceInfo
   */
  public function getDeviceInfo()
  {
    return $this->deviceInfo;
  }
  /**
   * @param string
   */
  public function setDomain($domain)
  {
    $this->domain = $domain;
  }
  /**
   * @return string
   */
  public function getDomain()
  {
    return $this->domain;
  }
  /**
   * @param string
   */
  public function setSessionId($sessionId)
  {
    $this->sessionId = $sessionId;
  }
  /**
   * @return string
   */
  public function getSessionId()
  {
    return $this->sessionId;
  }
  /**
   * @param string
   */
  public function setUserId($userId)
  {
    $this->userId = $userId;
  }
  /**
   * @return string
   */
  public function getUserId()
  {
    return $this->userId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RequestMetadata::class, 'Google_Service_CloudTalentSolution_RequestMetadata');
