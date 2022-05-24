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

namespace Google\Service\AndroidManagement;

class DeviceSettings extends \Google\Model
{
  /**
   * @var bool
   */
  public $adbEnabled;
  /**
   * @var bool
   */
  public $developmentSettingsEnabled;
  /**
   * @var string
   */
  public $encryptionStatus;
  /**
   * @var bool
   */
  public $isDeviceSecure;
  /**
   * @var bool
   */
  public $isEncrypted;
  /**
   * @var bool
   */
  public $unknownSourcesEnabled;
  /**
   * @var bool
   */
  public $verifyAppsEnabled;

  /**
   * @param bool
   */
  public function setAdbEnabled($adbEnabled)
  {
    $this->adbEnabled = $adbEnabled;
  }
  /**
   * @return bool
   */
  public function getAdbEnabled()
  {
    return $this->adbEnabled;
  }
  /**
   * @param bool
   */
  public function setDevelopmentSettingsEnabled($developmentSettingsEnabled)
  {
    $this->developmentSettingsEnabled = $developmentSettingsEnabled;
  }
  /**
   * @return bool
   */
  public function getDevelopmentSettingsEnabled()
  {
    return $this->developmentSettingsEnabled;
  }
  /**
   * @param string
   */
  public function setEncryptionStatus($encryptionStatus)
  {
    $this->encryptionStatus = $encryptionStatus;
  }
  /**
   * @return string
   */
  public function getEncryptionStatus()
  {
    return $this->encryptionStatus;
  }
  /**
   * @param bool
   */
  public function setIsDeviceSecure($isDeviceSecure)
  {
    $this->isDeviceSecure = $isDeviceSecure;
  }
  /**
   * @return bool
   */
  public function getIsDeviceSecure()
  {
    return $this->isDeviceSecure;
  }
  /**
   * @param bool
   */
  public function setIsEncrypted($isEncrypted)
  {
    $this->isEncrypted = $isEncrypted;
  }
  /**
   * @return bool
   */
  public function getIsEncrypted()
  {
    return $this->isEncrypted;
  }
  /**
   * @param bool
   */
  public function setUnknownSourcesEnabled($unknownSourcesEnabled)
  {
    $this->unknownSourcesEnabled = $unknownSourcesEnabled;
  }
  /**
   * @return bool
   */
  public function getUnknownSourcesEnabled()
  {
    return $this->unknownSourcesEnabled;
  }
  /**
   * @param bool
   */
  public function setVerifyAppsEnabled($verifyAppsEnabled)
  {
    $this->verifyAppsEnabled = $verifyAppsEnabled;
  }
  /**
   * @return bool
   */
  public function getVerifyAppsEnabled()
  {
    return $this->verifyAppsEnabled;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeviceSettings::class, 'Google_Service_AndroidManagement_DeviceSettings');
