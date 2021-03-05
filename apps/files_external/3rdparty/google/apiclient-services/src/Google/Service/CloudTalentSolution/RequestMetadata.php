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

class Google_Service_CloudTalentSolution_RequestMetadata extends Google_Model
{
  public $allowMissingIds;
  protected $deviceInfoType = 'Google_Service_CloudTalentSolution_DeviceInfo';
  protected $deviceInfoDataType = '';
  public $domain;
  public $sessionId;
  public $userId;

  public function setAllowMissingIds($allowMissingIds)
  {
    $this->allowMissingIds = $allowMissingIds;
  }
  public function getAllowMissingIds()
  {
    return $this->allowMissingIds;
  }
  /**
   * @param Google_Service_CloudTalentSolution_DeviceInfo
   */
  public function setDeviceInfo(Google_Service_CloudTalentSolution_DeviceInfo $deviceInfo)
  {
    $this->deviceInfo = $deviceInfo;
  }
  /**
   * @return Google_Service_CloudTalentSolution_DeviceInfo
   */
  public function getDeviceInfo()
  {
    return $this->deviceInfo;
  }
  public function setDomain($domain)
  {
    $this->domain = $domain;
  }
  public function getDomain()
  {
    return $this->domain;
  }
  public function setSessionId($sessionId)
  {
    $this->sessionId = $sessionId;
  }
  public function getSessionId()
  {
    return $this->sessionId;
  }
  public function setUserId($userId)
  {
    $this->userId = $userId;
  }
  public function getUserId()
  {
    return $this->userId;
  }
}
