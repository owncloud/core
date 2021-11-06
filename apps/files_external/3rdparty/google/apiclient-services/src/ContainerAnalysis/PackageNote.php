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

class PackageNote extends \Google\Collection
{
  protected $collection_key = 'filesLicenseInfo';
  public $analyzed;
  public $attribution;
  public $checksum;
  public $copyright;
  public $detailedDescription;
  public $downloadLocation;
  protected $externalRefsType = ExternalRef::class;
  protected $externalRefsDataType = 'array';
  public $filesLicenseInfo;
  public $homePage;
  public $licenseDeclared;
  public $originator;
  public $summaryDescription;
  public $supplier;
  public $title;
  public $verificationCode;
  public $version;

  public function setAnalyzed($analyzed)
  {
    $this->analyzed = $analyzed;
  }
  public function getAnalyzed()
  {
    return $this->analyzed;
  }
  public function setAttribution($attribution)
  {
    $this->attribution = $attribution;
  }
  public function getAttribution()
  {
    return $this->attribution;
  }
  public function setChecksum($checksum)
  {
    $this->checksum = $checksum;
  }
  public function getChecksum()
  {
    return $this->checksum;
  }
  public function setCopyright($copyright)
  {
    $this->copyright = $copyright;
  }
  public function getCopyright()
  {
    return $this->copyright;
  }
  public function setDetailedDescription($detailedDescription)
  {
    $this->detailedDescription = $detailedDescription;
  }
  public function getDetailedDescription()
  {
    return $this->detailedDescription;
  }
  public function setDownloadLocation($downloadLocation)
  {
    $this->downloadLocation = $downloadLocation;
  }
  public function getDownloadLocation()
  {
    return $this->downloadLocation;
  }
  /**
   * @param ExternalRef[]
   */
  public function setExternalRefs($externalRefs)
  {
    $this->externalRefs = $externalRefs;
  }
  /**
   * @return ExternalRef[]
   */
  public function getExternalRefs()
  {
    return $this->externalRefs;
  }
  public function setFilesLicenseInfo($filesLicenseInfo)
  {
    $this->filesLicenseInfo = $filesLicenseInfo;
  }
  public function getFilesLicenseInfo()
  {
    return $this->filesLicenseInfo;
  }
  public function setHomePage($homePage)
  {
    $this->homePage = $homePage;
  }
  public function getHomePage()
  {
    return $this->homePage;
  }
  public function setLicenseDeclared($licenseDeclared)
  {
    $this->licenseDeclared = $licenseDeclared;
  }
  public function getLicenseDeclared()
  {
    return $this->licenseDeclared;
  }
  public function setOriginator($originator)
  {
    $this->originator = $originator;
  }
  public function getOriginator()
  {
    return $this->originator;
  }
  public function setSummaryDescription($summaryDescription)
  {
    $this->summaryDescription = $summaryDescription;
  }
  public function getSummaryDescription()
  {
    return $this->summaryDescription;
  }
  public function setSupplier($supplier)
  {
    $this->supplier = $supplier;
  }
  public function getSupplier()
  {
    return $this->supplier;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setVerificationCode($verificationCode)
  {
    $this->verificationCode = $verificationCode;
  }
  public function getVerificationCode()
  {
    return $this->verificationCode;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PackageNote::class, 'Google_Service_ContainerAnalysis_PackageNote');
