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

class Google_Service_OnDemandScanning_UpgradeOccurrence extends Google_Model
{
  protected $distributionType = 'Google_Service_OnDemandScanning_UpgradeDistribution';
  protected $distributionDataType = '';
  public $package;
  protected $parsedVersionType = 'Google_Service_OnDemandScanning_Version';
  protected $parsedVersionDataType = '';
  protected $windowsUpdateType = 'Google_Service_OnDemandScanning_WindowsUpdate';
  protected $windowsUpdateDataType = '';

  /**
   * @param Google_Service_OnDemandScanning_UpgradeDistribution
   */
  public function setDistribution(Google_Service_OnDemandScanning_UpgradeDistribution $distribution)
  {
    $this->distribution = $distribution;
  }
  /**
   * @return Google_Service_OnDemandScanning_UpgradeDistribution
   */
  public function getDistribution()
  {
    return $this->distribution;
  }
  public function setPackage($package)
  {
    $this->package = $package;
  }
  public function getPackage()
  {
    return $this->package;
  }
  /**
   * @param Google_Service_OnDemandScanning_Version
   */
  public function setParsedVersion(Google_Service_OnDemandScanning_Version $parsedVersion)
  {
    $this->parsedVersion = $parsedVersion;
  }
  /**
   * @return Google_Service_OnDemandScanning_Version
   */
  public function getParsedVersion()
  {
    return $this->parsedVersion;
  }
  /**
   * @param Google_Service_OnDemandScanning_WindowsUpdate
   */
  public function setWindowsUpdate(Google_Service_OnDemandScanning_WindowsUpdate $windowsUpdate)
  {
    $this->windowsUpdate = $windowsUpdate;
  }
  /**
   * @return Google_Service_OnDemandScanning_WindowsUpdate
   */
  public function getWindowsUpdate()
  {
    return $this->windowsUpdate;
  }
}
