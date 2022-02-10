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

namespace Google\Service\CloudIdentity;

class GoogleAppsCloudidentityDevicesV1DeviceUser extends \Google\Model
{
  /**
   * @var string
   */
  public $compromisedState;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $firstSyncTime;
  /**
   * @var string
   */
  public $languageCode;
  /**
   * @var string
   */
  public $lastSyncTime;
  /**
   * @var string
   */
  public $managementState;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $passwordState;
  /**
   * @var string
   */
  public $userAgent;
  /**
   * @var string
   */
  public $userEmail;

  /**
   * @param string
   */
  public function setCompromisedState($compromisedState)
  {
    $this->compromisedState = $compromisedState;
  }
  /**
   * @return string
   */
  public function getCompromisedState()
  {
    return $this->compromisedState;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setFirstSyncTime($firstSyncTime)
  {
    $this->firstSyncTime = $firstSyncTime;
  }
  /**
   * @return string
   */
  public function getFirstSyncTime()
  {
    return $this->firstSyncTime;
  }
  /**
   * @param string
   */
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string
   */
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param string
   */
  public function setLastSyncTime($lastSyncTime)
  {
    $this->lastSyncTime = $lastSyncTime;
  }
  /**
   * @return string
   */
  public function getLastSyncTime()
  {
    return $this->lastSyncTime;
  }
  /**
   * @param string
   */
  public function setManagementState($managementState)
  {
    $this->managementState = $managementState;
  }
  /**
   * @return string
   */
  public function getManagementState()
  {
    return $this->managementState;
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
  public function setPasswordState($passwordState)
  {
    $this->passwordState = $passwordState;
  }
  /**
   * @return string
   */
  public function getPasswordState()
  {
    return $this->passwordState;
  }
  /**
   * @param string
   */
  public function setUserAgent($userAgent)
  {
    $this->userAgent = $userAgent;
  }
  /**
   * @return string
   */
  public function getUserAgent()
  {
    return $this->userAgent;
  }
  /**
   * @param string
   */
  public function setUserEmail($userEmail)
  {
    $this->userEmail = $userEmail;
  }
  /**
   * @return string
   */
  public function getUserEmail()
  {
    return $this->userEmail;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsCloudidentityDevicesV1DeviceUser::class, 'Google_Service_CloudIdentity_GoogleAppsCloudidentityDevicesV1DeviceUser');
