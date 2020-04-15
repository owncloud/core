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

class Google_Service_ContainerAnalysis_Detail extends Google_Model
{
  public $cpeUri;
  public $description;
  protected $fixedLocationType = 'Google_Service_ContainerAnalysis_VulnerabilityLocation';
  protected $fixedLocationDataType = '';
  public $isObsolete;
  protected $maxAffectedVersionType = 'Google_Service_ContainerAnalysis_Version';
  protected $maxAffectedVersionDataType = '';
  protected $minAffectedVersionType = 'Google_Service_ContainerAnalysis_Version';
  protected $minAffectedVersionDataType = '';
  public $package;
  public $packageType;
  public $severityName;

  public function setCpeUri($cpeUri)
  {
    $this->cpeUri = $cpeUri;
  }
  public function getCpeUri()
  {
    return $this->cpeUri;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_ContainerAnalysis_VulnerabilityLocation
   */
  public function setFixedLocation(Google_Service_ContainerAnalysis_VulnerabilityLocation $fixedLocation)
  {
    $this->fixedLocation = $fixedLocation;
  }
  /**
   * @return Google_Service_ContainerAnalysis_VulnerabilityLocation
   */
  public function getFixedLocation()
  {
    return $this->fixedLocation;
  }
  public function setIsObsolete($isObsolete)
  {
    $this->isObsolete = $isObsolete;
  }
  public function getIsObsolete()
  {
    return $this->isObsolete;
  }
  /**
   * @param Google_Service_ContainerAnalysis_Version
   */
  public function setMaxAffectedVersion(Google_Service_ContainerAnalysis_Version $maxAffectedVersion)
  {
    $this->maxAffectedVersion = $maxAffectedVersion;
  }
  /**
   * @return Google_Service_ContainerAnalysis_Version
   */
  public function getMaxAffectedVersion()
  {
    return $this->maxAffectedVersion;
  }
  /**
   * @param Google_Service_ContainerAnalysis_Version
   */
  public function setMinAffectedVersion(Google_Service_ContainerAnalysis_Version $minAffectedVersion)
  {
    $this->minAffectedVersion = $minAffectedVersion;
  }
  /**
   * @return Google_Service_ContainerAnalysis_Version
   */
  public function getMinAffectedVersion()
  {
    return $this->minAffectedVersion;
  }
  public function setPackage($package)
  {
    $this->package = $package;
  }
  public function getPackage()
  {
    return $this->package;
  }
  public function setPackageType($packageType)
  {
    $this->packageType = $packageType;
  }
  public function getPackageType()
  {
    return $this->packageType;
  }
  public function setSeverityName($severityName)
  {
    $this->severityName = $severityName;
  }
  public function getSeverityName()
  {
    return $this->severityName;
  }
}
