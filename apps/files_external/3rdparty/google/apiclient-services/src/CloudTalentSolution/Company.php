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
  /**
   * @var string
   */
  public $careerSiteUri;
  protected $derivedInfoType = CompanyDerivedInfo::class;
  protected $derivedInfoDataType = '';
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $eeoText;
  /**
   * @var string
   */
  public $externalId;
  /**
   * @var string
   */
  public $headquartersAddress;
  /**
   * @var bool
   */
  public $hiringAgency;
  /**
   * @var string
   */
  public $imageUri;
  /**
   * @var string[]
   */
  public $keywordSearchableJobCustomAttributes;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $size;
  /**
   * @var bool
   */
  public $suspended;
  /**
   * @var string
   */
  public $websiteUri;

  /**
   * @param string
   */
  public function setCareerSiteUri($careerSiteUri)
  {
    $this->careerSiteUri = $careerSiteUri;
  }
  /**
   * @return string
   */
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
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setEeoText($eeoText)
  {
    $this->eeoText = $eeoText;
  }
  /**
   * @return string
   */
  public function getEeoText()
  {
    return $this->eeoText;
  }
  /**
   * @param string
   */
  public function setExternalId($externalId)
  {
    $this->externalId = $externalId;
  }
  /**
   * @return string
   */
  public function getExternalId()
  {
    return $this->externalId;
  }
  /**
   * @param string
   */
  public function setHeadquartersAddress($headquartersAddress)
  {
    $this->headquartersAddress = $headquartersAddress;
  }
  /**
   * @return string
   */
  public function getHeadquartersAddress()
  {
    return $this->headquartersAddress;
  }
  /**
   * @param bool
   */
  public function setHiringAgency($hiringAgency)
  {
    $this->hiringAgency = $hiringAgency;
  }
  /**
   * @return bool
   */
  public function getHiringAgency()
  {
    return $this->hiringAgency;
  }
  /**
   * @param string
   */
  public function setImageUri($imageUri)
  {
    $this->imageUri = $imageUri;
  }
  /**
   * @return string
   */
  public function getImageUri()
  {
    return $this->imageUri;
  }
  /**
   * @param string[]
   */
  public function setKeywordSearchableJobCustomAttributes($keywordSearchableJobCustomAttributes)
  {
    $this->keywordSearchableJobCustomAttributes = $keywordSearchableJobCustomAttributes;
  }
  /**
   * @return string[]
   */
  public function getKeywordSearchableJobCustomAttributes()
  {
    return $this->keywordSearchableJobCustomAttributes;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setSize($size)
  {
    $this->size = $size;
  }
  /**
   * @return string
   */
  public function getSize()
  {
    return $this->size;
  }
  /**
   * @param bool
   */
  public function setSuspended($suspended)
  {
    $this->suspended = $suspended;
  }
  /**
   * @return bool
   */
  public function getSuspended()
  {
    return $this->suspended;
  }
  /**
   * @param string
   */
  public function setWebsiteUri($websiteUri)
  {
    $this->websiteUri = $websiteUri;
  }
  /**
   * @return string
   */
  public function getWebsiteUri()
  {
    return $this->websiteUri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Company::class, 'Google_Service_CloudTalentSolution_Company');
