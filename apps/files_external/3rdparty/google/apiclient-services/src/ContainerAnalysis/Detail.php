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

class Detail extends \Google\Model
{
  public $cpeUri;
  public $description;
  protected $fixedLocationType = VulnerabilityLocation::class;
  protected $fixedLocationDataType = '';
  public $isObsolete;
  protected $maxAffectedVersionType = Version::class;
  protected $maxAffectedVersionDataType = '';
  protected $minAffectedVersionType = Version::class;
  protected $minAffectedVersionDataType = '';
  public $package;
  public $packageType;
  public $severityName;
  public $source;
  public $sourceUpdateTime;
  public $vendor;

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
  public function setIsObsolete($isObsolete)
  {
    $this->isObsolete = $isObsolete;
  }
  public function getIsObsolete()
  {
    return $this->isObsolete;
  }
  /**
   * @param Version
   */
  public function setMaxAffectedVersion(Version $maxAffectedVersion)
  {
    $this->maxAffectedVersion = $maxAffectedVersion;
  }
  /**
   * @return Version
   */
  public function getMaxAffectedVersion()
  {
    return $this->maxAffectedVersion;
  }
  /**
   * @param Version
   */
  public function setMinAffectedVersion(Version $minAffectedVersion)
  {
    $this->minAffectedVersion = $minAffectedVersion;
  }
  /**
   * @return Version
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
  public function setSource($source)
  {
    $this->source = $source;
  }
  public function getSource()
  {
    return $this->source;
  }
  public function setSourceUpdateTime($sourceUpdateTime)
  {
    $this->sourceUpdateTime = $sourceUpdateTime;
  }
  public function getSourceUpdateTime()
  {
    return $this->sourceUpdateTime;
  }
  public function setVendor($vendor)
  {
    $this->vendor = $vendor;
  }
  public function getVendor()
  {
    return $this->vendor;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Detail::class, 'Google_Service_ContainerAnalysis_Detail');
