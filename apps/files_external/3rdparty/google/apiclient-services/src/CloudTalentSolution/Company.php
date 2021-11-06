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

namespace Google\Service\CloudTalentSolution;

class Company extends \Google\Collection
{
  protected $collection_key = 'keywordSearchableJobCustomAttributes';
  public $careerSiteUri;
  protected $derivedInfoType = CompanyDerivedInfo::class;
  protected $derivedInfoDataType = '';
  public $displayName;
  public $eeoText;
  public $externalId;
  public $headquartersAddress;
  public $hiringAgency;
  public $imageUri;
  public $keywordSearchableJobCustomAttributes;
  public $name;
  public $size;
  public $suspended;
  public $websiteUri;

  public function setCareerSiteUri($careerSiteUri)
  {
    $this->careerSiteUri = $careerSiteUri;
  }
  public function getCareerSiteUri()
  {
    return $this->careerSiteUri;
  }
  /**
   * @param CompanyDerivedInfo
   */
  public function setDerivedInfo(CompanyDerivedInfo $derivedInfo)
  {
    $this->derivedInfo = $derivedInfo;
  }
  /**
   * @return CompanyDerivedInfo
   */
  public function getDerivedInfo()
  {
    return $this->derivedInfo;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setEeoText($eeoText)
  {
    $this->eeoText = $eeoText;
  }
  public function getEeoText()
  {
    return $this->eeoText;
  }
  public function setExternalId($externalId)
  {
    $this->externalId = $externalId;
  }
  public function getExternalId()
  {
    return $this->externalId;
  }
  public function setHeadquartersAddress($headquartersAddress)
  {
    $this->headquartersAddress = $headquartersAddress;
  }
  public function getHeadquartersAddress()
  {
    return $this->headquartersAddress;
  }
  public function setHiringAgency($hiringAgency)
  {
    $this->hiringAgency = $hiringAgency;
  }
  public function getHiringAgency()
  {
    return $this->hiringAgency;
  }
  public function setImageUri($imageUri)
  {
    $this->imageUri = $imageUri;
  }
  public function getImageUri()
  {
    return $this->imageUri;
  }
  public function setKeywordSearchableJobCustomAttributes($keywordSearchableJobCustomAttributes)
  {
    $this->keywordSearchableJobCustomAttributes = $keywordSearchableJobCustomAttributes;
  }
  public function getKeywordSearchableJobCustomAttributes()
  {
    return $this->keywordSearchableJobCustomAttributes;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setSize($size)
  {
    $this->size = $size;
  }
  public function getSize()
  {
    return $this->size;
  }
  public function setSuspended($suspended)
  {
    $this->suspended = $suspended;
  }
  public function getSuspended()
  {
    return $this->suspended;
  }
  public function setWebsiteUri($websiteUri)
  {
    $this->websiteUri = $websiteUri;
  }
  public function getWebsiteUri()
  {
    return $this->websiteUri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Company::class, 'Google_Service_CloudTalentSolution_Company');
