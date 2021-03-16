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

class Google_Service_AIPlatformNotebooks_IsInstanceUpgradeableResponse extends Google_Model
{
  public $upgradeImage;
  public $upgradeInfo;
  public $upgradeVersion;
  public $upgradeable;

  public function setUpgradeImage($upgradeImage)
  {
    $this->upgradeImage = $upgradeImage;
  }
  public function getUpgradeImage()
  {
    return $this->upgradeImage;
  }
  public function setUpgradeInfo($upgradeInfo)
  {
    $this->upgradeInfo = $upgradeInfo;
  }
  public function getUpgradeInfo()
  {
    return $this->upgradeInfo;
  }
  public function setUpgradeVersion($upgradeVersion)
  {
    $this->upgradeVersion = $upgradeVersion;
  }
  public function getUpgradeVersion()
  {
    return $this->upgradeVersion;
  }
  public function setUpgradeable($upgradeable)
  {
    $this->upgradeable = $upgradeable;
  }
  public function getUpgradeable()
  {
    return $this->upgradeable;
  }
}
