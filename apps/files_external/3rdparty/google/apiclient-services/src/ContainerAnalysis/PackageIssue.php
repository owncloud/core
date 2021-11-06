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

namespace Google\Service\ContainerAnalysis;

class PackageIssue extends \Google\Model
{
  protected $affectedLocationType = VulnerabilityLocation::class;
  protected $affectedLocationDataType = '';
  public $effectiveSeverity;
  protected $fixedLocationType = VulnerabilityLocation::class;
  protected $fixedLocationDataType = '';
  public $packageType;
  public $severityName;

  /**
   * @param VulnerabilityLocation
   */
  public function setAffectedLocation(VulnerabilityLocation $affectedLocation)
  {
    $this->affectedLocation = $affectedLocation;
  }
  /**
   * @return VulnerabilityLocation
   */
  public function getAffectedLocation()
  {
    return $this->affectedLocation;
  }
  public function setEffectiveSeverity($effectiveSeverity)
  {
    $this->effectiveSeverity = $effectiveSeverity;
  }
  public function getEffectiveSeverity()
  {
    return $this->effectiveSeverity;
  }
  /**
   * @param VulnerabilityLocation
   */
  public function setFixedLocation(VulnerabilityLocation $fixedLocation)
  {
    $this->fixedLocation = $fixedLocation;
  }
  /**
   * @return VulnerabilityLocation
   */
  public function getFixedLocation()
  {
    return $this->fixedLocation;
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PackageIssue::class, 'Google_Service_ContainerAnalysis_PackageIssue');
