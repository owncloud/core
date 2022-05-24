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
  /**
   * @var string
   */
  public $affectedCpeUri;
  /**
   * @var string
   */
  public $affectedPackage;
  protected $affectedVersionEndType = Version::class;
  protected $affectedVersionEndDataType = '';
  protected $affectedVersionStartType = Version::class;
  protected $affectedVersionStartDataType = '';
  /**
   * @var string
   */
  public $description;
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
   * @var bool
   */
  public $isObsolete;
  /**
   * @var string
   */
  public $packageType;
  /**
   * @var string
   */
  public $severityName;
  /**
   * @var string
   */
  public $source;
  /**
   * @var string
   */
  public $sourceUpdateTime;
  /**
   * @var string
   */
  public $vendor;

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
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
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
   * @param bool
   */
  public function setIsObsolete($isObsolete)
  {
    $this->isObsolete = $isObsolete;
  }
  /**
   * @return bool
   */
  public function getIsObsolete()
  {
    return $this->isObsolete;
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
  /**
   * @param string
   */
  public function setSeverityName($severityName)
  {
    $this->severityName = $severityName;
  }
  /**
   * @return string
   */
  public function getSeverityName()
  {
    return $this->severityName;
  }
  /**
   * @param string
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * @param string
   */
  public function setSourceUpdateTime($sourceUpdateTime)
  {
    $this->sourceUpdateTime = $sourceUpdateTime;
  }
  /**
   * @return string
   */
  public function getSourceUpdateTime()
  {
    return $this->sourceUpdateTime;
  }
  /**
   * @param string
   */
  public function setVendor($vendor)
  {
    $this->vendor = $vendor;
  }
  /**
   * @return string
   */
  public function getVendor()
  {
    return $this->vendor;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Detail::class, 'Google_Service_ContainerAnalysis_Detail');
