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

class Google_Service_JobService_Company extends Google_Collection
{
  protected $collection_key = 'keywordSearchableCustomFields';
  public $careerPageLink;
  protected $companyInfoSourcesType = 'Google_Service_JobService_CompanyInfoSource';
  protected $companyInfoSourcesDataType = 'array';
  public $companySize;
  public $disableLocationOptimization;
  public $displayName;
  public $distributorBillingCompanyId;
  public $distributorCompanyId;
  public $eeoText;
  public $hiringAgency;
  public $hqLocation;
  public $imageUrl;
  public $keywordSearchableCustomAttributes;
  public $keywordSearchableCustomFields;
  public $name;
  protected $structuredCompanyHqLocationType = 'Google_Service_JobService_JobLocation';
  protected $structuredCompanyHqLocationDataType = '';
  public $suspended;
  public $title;
  public $website;

  public function setCareerPageLink($careerPageLink)
  {
    $this->careerPageLink = $careerPageLink;
  }
  public function getCareerPageLink()
  {
    return $this->careerPageLink;
  }
  /**
   * @param Google_Service_JobService_CompanyInfoSource
   */
  public function setCompanyInfoSources($companyInfoSources)
  {
    $this->companyInfoSources = $companyInfoSources;
  }
  /**
   * @return Google_Service_JobService_CompanyInfoSource
   */
  public function getCompanyInfoSources()
  {
    return $this->companyInfoSources;
  }
  public function setCompanySize($companySize)
  {
    $this->companySize = $companySize;
  }
  public function getCompanySize()
  {
    return $this->companySize;
  }
  public function setDisableLocationOptimization($disableLocationOptimization)
  {
    $this->disableLocationOptimization = $disableLocationOptimization;
  }
  public function getDisableLocationOptimization()
  {
    return $this->disableLocationOptimization;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setDistributorBillingCompanyId($distributorBillingCompanyId)
  {
    $this->distributorBillingCompanyId = $distributorBillingCompanyId;
  }
  public function getDistributorBillingCompanyId()
  {
    return $this->distributorBillingCompanyId;
  }
  public function setDistributorCompanyId($distributorCompanyId)
  {
    $this->distributorCompanyId = $distributorCompanyId;
  }
  public function getDistributorCompanyId()
  {
    return $this->distributorCompanyId;
  }
  public function setEeoText($eeoText)
  {
    $this->eeoText = $eeoText;
  }
  public function getEeoText()
  {
    return $this->eeoText;
  }
  public function setHiringAgency($hiringAgency)
  {
    $this->hiringAgency = $hiringAgency;
  }
  public function getHiringAgency()
  {
    return $this->hiringAgency;
  }
  public function setHqLocation($hqLocation)
  {
    $this->hqLocation = $hqLocation;
  }
  public function getHqLocation()
  {
    return $this->hqLocation;
  }
  public function setImageUrl($imageUrl)
  {
    $this->imageUrl = $imageUrl;
  }
  public function getImageUrl()
  {
    return $this->imageUrl;
  }
  public function setKeywordSearchableCustomAttributes($keywordSearchableCustomAttributes)
  {
    $this->keywordSearchableCustomAttributes = $keywordSearchableCustomAttributes;
  }
  public function getKeywordSearchableCustomAttributes()
  {
    return $this->keywordSearchableCustomAttributes;
  }
  public function setKeywordSearchableCustomFields($keywordSearchableCustomFields)
  {
    $this->keywordSearchableCustomFields = $keywordSearchableCustomFields;
  }
  public function getKeywordSearchableCustomFields()
  {
    return $this->keywordSearchableCustomFields;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_JobService_JobLocation
   */
  public function setStructuredCompanyHqLocation(Google_Service_JobService_JobLocation $structuredCompanyHqLocation)
  {
    $this->structuredCompanyHqLocation = $structuredCompanyHqLocation;
  }
  /**
   * @return Google_Service_JobService_JobLocation
   */
  public function getStructuredCompanyHqLocation()
  {
    return $this->structuredCompanyHqLocation;
  }
  public function setSuspended($suspended)
  {
    $this->suspended = $suspended;
  }
  public function getSuspended()
  {
    return $this->suspended;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setWebsite($website)
  {
    $this->website = $website;
  }
  public function getWebsite()
  {
    return $this->website;
  }
}
