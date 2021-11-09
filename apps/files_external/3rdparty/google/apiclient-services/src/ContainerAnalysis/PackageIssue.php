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
  public $affectedCpeUri;
  public $affectedPackage;
  protected $affectedVersionType = Version::class;
  protected $affectedVersionDataType = '';
  public $effectiveSeverity;
  public $fixAvailable;
  public $fixedCpeUri;
  public $fixedPackage;
  protected $fixedVersionType = Version::class;
  protected $fixedVersionDataType = '';
  public $packageType;

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
   * @param Version
   */
  public function setAffectedVersion(Version $affectedVersion)
  {
    $this->affectedVersion = $affectedVersion;
  }
  /**
   * @return Version
   */
  public function getAffectedVersion()
  {
    return $this->affectedVersion;
  }
  public function setEffectiveSeverity($effectiveSeverity)
  {
    $this->effectiveSeverity = $effectiveSeverity;
  }
  public function getEffectiveSeverity()
  {
    return $this->effectiveSeverity;
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
   * @param Version
   */
  public function setFixedVersion(Version $fixedVersion)
  {
    $this->fixedVersion = $fixedVersion;
  }
  /**
   * @return Version
   */
  public function getFixedVersion()
  {
    return $this->fixedVersion;
  }
  public function setPackageType($packageType)
  {
    $this->packageType = $packageType;
  }
  public function getPackageType()
  {
    return $this->packageType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PackageIssue::class, 'Google_Service_ContainerAnalysis_PackageIssue');
