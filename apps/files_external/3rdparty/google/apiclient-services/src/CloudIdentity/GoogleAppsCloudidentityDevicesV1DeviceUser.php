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
  public $compromisedState;
  public $createTime;
  public $firstSyncTime;
  public $languageCode;
  public $lastSyncTime;
  public $managementState;
  public $name;
  public $passwordState;
  public $userAgent;
  public $userEmail;

  public function setCompromisedState($compromisedState)
  {
    $this->compromisedState = $compromisedState;
  }
  public function getCompromisedState()
  {
    return $this->compromisedState;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setFirstSyncTime($firstSyncTime)
  {
    $this->firstSyncTime = $firstSyncTime;
  }
  public function getFirstSyncTime()
  {
    return $this->firstSyncTime;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  public function setLastSyncTime($lastSyncTime)
  {
    $this->lastSyncTime = $lastSyncTime;
  }
  public function getLastSyncTime()
  {
    return $this->lastSyncTime;
  }
  public function setManagementState($managementState)
  {
    $this->managementState = $managementState;
  }
  public function getManagementState()
  {
    return $this->managementState;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPasswordState($passwordState)
  {
    $this->passwordState = $passwordState;
  }
  public function getPasswordState()
  {
    return $this->passwordState;
  }
  public function setUserAgent($userAgent)
  {
    $this->userAgent = $userAgent;
  }
  public function getUserAgent()
  {
    return $this->userAgent;
  }
  public function setUserEmail($userEmail)
  {
    $this->userEmail = $userEmail;
  }
  public function getUserEmail()
  {
    return $this->userEmail;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsCloudidentityDevicesV1DeviceUser::class, 'Google_Service_CloudIdentity_GoogleAppsCloudidentityDevicesV1DeviceUser');
