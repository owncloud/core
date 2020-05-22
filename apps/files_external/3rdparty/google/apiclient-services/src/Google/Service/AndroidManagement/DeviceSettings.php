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

class Google_Service_AndroidManagement_DeviceSettings extends Google_Model
{
  public $adbEnabled;
  public $developmentSettingsEnabled;
  public $encryptionStatus;
  public $isDeviceSecure;
  public $isEncrypted;
  public $unknownSourcesEnabled;
  public $verifyAppsEnabled;

  public function setAdbEnabled($adbEnabled)
  {
    $this->adbEnabled = $adbEnabled;
  }
  public function getAdbEnabled()
  {
    return $this->adbEnabled;
  }
  public function setDevelopmentSettingsEnabled($developmentSettingsEnabled)
  {
    $this->developmentSettingsEnabled = $developmentSettingsEnabled;
  }
  public function getDevelopmentSettingsEnabled()
  {
    return $this->developmentSettingsEnabled;
  }
  public function setEncryptionStatus($encryptionStatus)
  {
    $this->encryptionStatus = $encryptionStatus;
  }
  public function getEncryptionStatus()
  {
    return $this->encryptionStatus;
  }
  public function setIsDeviceSecure($isDeviceSecure)
  {
    $this->isDeviceSecure = $isDeviceSecure;
  }
  public function getIsDeviceSecure()
  {
    return $this->isDeviceSecure;
  }
  public function setIsEncrypted($isEncrypted)
  {
    $this->isEncrypted = $isEncrypted;
  }
  public function getIsEncrypted()
  {
    return $this->isEncrypted;
  }
  public function setUnknownSourcesEnabled($unknownSourcesEnabled)
  {
    $this->unknownSourcesEnabled = $unknownSourcesEnabled;
  }
  public function getUnknownSourcesEnabled()
  {
    return $this->unknownSourcesEnabled;
  }
  public function setVerifyAppsEnabled($verifyAppsEnabled)
  {
    $this->verifyAppsEnabled = $verifyAppsEnabled;
  }
  public function getVerifyAppsEnabled()
  {
    return $this->verifyAppsEnabled;
  }
}
