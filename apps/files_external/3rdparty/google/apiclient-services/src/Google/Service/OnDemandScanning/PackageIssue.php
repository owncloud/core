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

class Google_Service_OnDemandScanning_PackageIssue extends Google_Model
{
  public $affectedCpeUri;
  public $affectedPackage;
  protected $affectedVersionType = 'Google_Service_OnDemandScanning_Version';
  protected $affectedVersionDataType = '';
  public $fixAvailable;
  public $fixedCpeUri;
  public $fixedPackage;
  protected $fixedVersionType = 'Google_Service_OnDemandScanning_Version';
  protected $fixedVersionDataType = '';

  public function setAffectedCpeUri($affectedCpeUri)
  {
    $this->affectedCpeUri = $affectedCpeUri;
  }
  public function getAffectedCpeUri()
  {
    return $this->affectedCpeUri;
  }
  public function setAffectedPackage($affectedPackage)
  {
    $this->affectedPackage = $affectedPackage;
  }
  public function getAffectedPackage()
  {
    return $this->affectedPackage;
  }
  /**
   * @param Google_Service_OnDemandScanning_Version
   */
  public function setAffectedVersion(Google_Service_OnDemandScanning_Version $affectedVersion)
  {
    $this->affectedVersion = $affectedVersion;
  }
  /**
   * @return Google_Service_OnDemandScanning_Version
   */
  public function getAffectedVersion()
  {
    return $this->affectedVersion;
  }
  public function setFixAvailable($fixAvailable)
  {
    $this->fixAvailable = $fixAvailable;
  }
  public function getFixAvailable()
  {
    return $this->fixAvailable;
  }
  public function setFixedCpeUri($fixedCpeUri)
  {
    $this->fixedCpeUri = $fixedCpeUri;
  }
  public function getFixedCpeUri()
  {
    return $this->fixedCpeUri;
  }
  public function setFixedPackage($fixedPackage)
  {
    $this->fixedPackage = $fixedPackage;
  }
  public function getFixedPackage()
  {
    return $this->fixedPackage;
  }
  /**
   * @param Google_Service_OnDemandScanning_Version
   */
  public function setFixedVersion(Google_Service_OnDemandScanning_Version $fixedVersion)
  {
    $this->fixedVersion = $fixedVersion;
  }
  /**
   * @return Google_Service_OnDemandScanning_Version
   */
  public function getFixedVersion()
  {
    return $this->fixedVersion;
  }
}
