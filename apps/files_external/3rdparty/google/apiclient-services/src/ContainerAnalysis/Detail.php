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
  public $affectedCpeUri;
  public $affectedPackage;
  protected $affectedVersionEndType = Version::class;
  protected $affectedVersionEndDataType = '';
  protected $affectedVersionStartType = Version::class;
  protected $affectedVersionStartDataType = '';
  public $description;
  public $fixedCpeUri;
  public $fixedPackage;
  protected $fixedVersionType = Version::class;
  protected $fixedVersionDataType = '';
  public $isObsolete;
  public $packageType;
  public $severityName;
  public $source;
  public $sourceUpdateTime;
  public $vendor;

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
  public function setAffectedVersionEnd(Version $affectedVersionEnd)
  {
    $this->affectedVersionEnd = $affectedVersionEnd;
  }
  /**
   * @return Version
   */
  public function getAffectedVersionEnd()
  {
    return $this->affectedVersionEnd;
  }
  /**
   * @param Version
   */
  public function setAffectedVersionStart(Version $affectedVersionStart)
  {
    $this->affectedVersionStart = $affectedVersionStart;
  }
  /**
   * @return Version
   */
  public function getAffectedVersionStart()
  {
    return $this->affectedVersionStart;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
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
  public function setIsObsolete($isObsolete)
  {
    $this->isObsolete = $isObsolete;
  }
  public function getIsObsolete()
  {
    return $this->isObsolete;
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
