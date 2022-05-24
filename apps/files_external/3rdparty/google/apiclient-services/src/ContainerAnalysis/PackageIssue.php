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

class PackageIssue extends \Google\Collection
{
  protected $collection_key = 'fileLocation';
  /**
   * @var string
   */
  public $affectedCpeUri;
  /**
   * @var string
   */
  public $affectedPackage;
  protected $affectedVersionType = Version::class;
  protected $affectedVersionDataType = '';
  /**
   * @var string
   */
  public $effectiveSeverity;
  protected $fileLocationType = GrafeasV1FileLocation::class;
  protected $fileLocationDataType = 'array';
  /**
   * @var bool
   */
  public $fixAvailable;
  /**
   * @var string
   */
  public $fixedCpeUri;
  /**
   * @var string
   */
  public $fixedPackage;
  protected $fixedVersionType = Version::class;
  protected $fixedVersionDataType = '';
  /**
   * @var string
   */
  public $packageType;

  /**
   * @param string
   */
  public function setAffectedCpeUri($affectedCpeUri)
  {
    $this->affectedCpeUri = $affectedCpeUri;
  }
  /**
   * @return string
   */
  public function getAffectedCpeUri()
  {
    return $this->affectedCpeUri;
  }
  /**
   * @param string
   */
  public function setAffectedPackage($affectedPackage)
  {
    $this->affectedPackage = $affectedPackage;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setEffectiveSeverity($effectiveSeverity)
  {
    $this->effectiveSeverity = $effectiveSeverity;
  }
  /**
   * @return string
   */
  public function getEffectiveSeverity()
  {
    return $this->effectiveSeverity;
  }
  /**
   * @param GrafeasV1FileLocation[]
   */
  public function setFileLocation($fileLocation)
  {
    $this->fileLocation = $fileLocation;
  }
  /**
   * @return GrafeasV1FileLocation[]
   */
  public function getFileLocation()
  {
    return $this->fileLocation;
  }
  /**
   * @param bool
   */
  public function setFixAvailable($fixAvailable)
  {
    $this->fixAvailable = $fixAvailable;
  }
  /**
   * @return bool
   */
  public function getFixAvailable()
  {
    return $this->fixAvailable;
  }
  /**
   * @param string
   */
  public function setFixedCpeUri($fixedCpeUri)
  {
    $this->fixedCpeUri = $fixedCpeUri;
  }
  /**
   * @return string
   */
  public function getFixedCpeUri()
  {
    return $this->fixedCpeUri;
  }
  /**
   * @param string
   */
  public function setFixedPackage($fixedPackage)
  {
    $this->fixedPackage = $fixedPackage;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setPackageType($packageType)
  {
    $this->packageType = $packageType;
  }
  /**
   * @return string
   */
  public function getPackageType()
  {
    return $this->packageType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PackageIssue::class, 'Google_Service_ContainerAnalysis_PackageIssue');
