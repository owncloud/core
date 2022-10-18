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

namespace Google\Service\Directory;

class OsUpdateStatus extends \Google\Model
{
  /**
   * @var string
   */
  public $rebootTime;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $targetKioskAppVersion;
  /**
   * @var string
   */
  public $targetOsVersion;
  /**
   * @var string
   */
  public $updateCheckTime;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setRebootTime($rebootTime)
  {
    $this->rebootTime = $rebootTime;
  }
  /**
   * @return string
   */
  public function getRebootTime()
  {
    return $this->rebootTime;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setTargetKioskAppVersion($targetKioskAppVersion)
  {
    $this->targetKioskAppVersion = $targetKioskAppVersion;
  }
  /**
   * @return string
   */
  public function getTargetKioskAppVersion()
  {
    return $this->targetKioskAppVersion;
  }
  /**
   * @param string
   */
  public function setTargetOsVersion($targetOsVersion)
  {
    $this->targetOsVersion = $targetOsVersion;
  }
  /**
   * @return string
   */
  public function getTargetOsVersion()
  {
    return $this->targetOsVersion;
  }
  /**
   * @param string
   */
  public function setUpdateCheckTime($updateCheckTime)
  {
    $this->updateCheckTime = $updateCheckTime;
  }
  /**
   * @return string
   */
  public function getUpdateCheckTime()
  {
    return $this->updateCheckTime;
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
class_alias(OsUpdateStatus::class, 'Google_Service_Directory_OsUpdateStatus');
