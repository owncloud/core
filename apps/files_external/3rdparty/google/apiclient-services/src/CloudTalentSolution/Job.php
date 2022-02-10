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

class Job extends \Google\Collection
{
  protected $collection_key = 'jobBenefits';
  /**
   * @var string[]
   */
  public $addresses;
  protected $applicationInfoType = ApplicationInfo::class;
  protected $applicationInfoDataType = '';
  /**
   * @var string
   */
  public $company;
  /**
   * @var string
   */
  public $companyDisplayName;
  protected $compensationInfoType = CompensationInfo::class;
  protected $compensationInfoDataType = '';
  protected $customAttributesType = CustomAttribute::class;
  protected $customAttributesDataType = 'map';
  /**
   * @var string[]
   */
  public $degreeTypes;
  /**
   * @var string
   */
  public $department;
  protected $derivedInfoType = JobDerivedInfo::class;
  protected $derivedInfoDataType = '';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string[]
   */
  public $employmentTypes;
  /**
   * @var string
   */
  public $incentives;
  /**
   * @var string[]
   */
  public $jobBenefits;
  /**
   * @var string
   */
  public $jobEndTime;
  /**
   * @var string
   */
  public $jobLevel;
  /**
   * @var string
   */
  public $jobStartTime;
  /**
   * @var string
   */
  public $languageCode;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $postingCreateTime;
  /**
   * @var string
   */
  public $postingExpireTime;
  /**
   * @var string
   */
  public $postingPublishTime;
  /**
   * @var string
   */
  public $postingRegion;
  /**
   * @var string
   */
  public $postingUpdateTime;
  protected $processingOptionsType = ProcessingOptions::class;
  protected $processingOptionsDataType = '';
  /**
   * @var int
   */
  public $promotionValue;
  /**
   * @var string
   */
  public $qualifications;
  /**
   * @var string
   */
  public $requisitionId;
  /**
   * @var string
   */
  public $responsibilities;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $visibility;

  /**
   * @param string[]
   */
  public function setAddresses($addresses)
  {
    $this->addresses = $addresses;
  }
  /**
   * @return string[]
   */
  public function getAddresses()
  {
    return $this->addresses;
  }
  /**
   * @param ApplicationInfo
   */
  public function setApplicationInfo(ApplicationInfo $applicationInfo)
  {
    $this->applicationInfo = $applicationInfo;
  }
  /**
   * @return ApplicationInfo
   */
  public function getApplicationInfo()
  {
    return $this->applicationInfo;
  }
  /**
   * @param string
   */
  public function setCompany($company)
  {
    $this->company = $company;
  }
  /**
   * @return string
   */
  public function getCompany()
  {
    return $this->company;
  }
  /**
   * @param string
   */
  public function setCompanyDisplayName($companyDisplayName)
  {
    $this->companyDisplayName = $companyDisplayName;
  }
  /**
   * @return string
   */
  public function getCompanyDisplayName()
  {
    return $this->companyDisplayName;
  }
  /**
   * @param CompensationInfo
   */
  public function setCompensationInfo(CompensationInfo $compensationInfo)
  {
    $this->compensationInfo = $compensationInfo;
  }
  /**
   * @return CompensationInfo
   */
  public function getCompensationInfo()
  {
    return $this->compensationInfo;
  }
  /**
   * @param CustomAttribute[]
   */
  public function setCustomAttributes($customAttributes)
  {
    $this->customAttributes = $customAttributes;
  }
  /**
   * @return CustomAttribute[]
   */
  public function getCustomAttributes()
  {
    return $this->customAttributes;
  }
  /**
   * @param string[]
   */
  public function setDegreeTypes($degreeTypes)
  {
    $this->degreeTypes = $degreeTypes;
  }
  /**
   * @return string[]
   */
  public function getDegreeTypes()
  {
    return $this->degreeTypes;
  }
  /**
   * @param string
   */
  public function setDepartment($department)
  {
    $this->department = $department;
  }
  /**
   * @return string
   */
  public function getDepartment()
  {
    return $this->department;
  }
  /**
   * @param JobDerivedInfo
   */
  public function setDerivedInfo(JobDerivedInfo $derivedInfo)
  {
    $this->derivedInfo = $derivedInfo;
  }
  /**
   * @return JobDerivedInfo
   */
  public function getDerivedInfo()
  {
    return $this->derivedInfo;
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
   * @param string[]
   */
  public function setEmploymentTypes($employmentTypes)
  {
    $this->employmentTypes = $employmentTypes;
  }
  /**
   * @return string[]
   */
  public function getEmploymentTypes()
  {
    return $this->employmentTypes;
  }
  /**
   * @param string
   */
  public function setIncentives($incentives)
  {
    $this->incentives = $incentives;
  }
  /**
   * @return string
   */
  public function getIncentives()
  {
    return $this->incentives;
  }
  /**
   * @param string[]
   */
  public function setJobBenefits($jobBenefits)
  {
    $this->jobBenefits = $jobBenefits;
  }
  /**
   * @return string[]
   */
  public function getJobBenefits()
  {
    return $this->jobBenefits;
  }
  /**
   * @param string
   */
  public function setJobEndTime($jobEndTime)
  {
    $this->jobEndTime = $jobEndTime;
  }
  /**
   * @return string
   */
  public function getJobEndTime()
  {
    return $this->jobEndTime;
  }
  /**
   * @param string
   */
  public function setJobLevel($jobLevel)
  {
    $this->jobLevel = $jobLevel;
  }
  /**
   * @return string
   */
  public function getJobLevel()
  {
    return $this->jobLevel;
  }
  /**
   * @param string
   */
  public function setJobStartTime($jobStartTime)
  {
    $this->jobStartTime = $jobStartTime;
  }
  /**
   * @return string
   */
  public function getJobStartTime()
  {
    return $this->jobStartTime;
  }
  /**
   * @param string
   */
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  /**
   * @return string
   */
  public function getLanguageCode()
  {
    return $this->languageCode;
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
  public function setPostingCreateTime($postingCreateTime)
  {
    $this->postingCreateTime = $postingCreateTime;
  }
  /**
   * @return string
   */
  public function getPostingCreateTime()
  {
    return $this->postingCreateTime;
  }
  /**
   * @param string
   */
  public function setPostingExpireTime($postingExpireTime)
  {
    $this->postingExpireTime = $postingExpireTime;
  }
  /**
   * @return string
   */
  public function getPostingExpireTime()
  {
    return $this->postingExpireTime;
  }
  /**
   * @param string
   */
  public function setPostingPublishTime($postingPublishTime)
  {
    $this->postingPublishTime = $postingPublishTime;
  }
  /**
   * @return string
   */
  public function getPostingPublishTime()
  {
    return $this->postingPublishTime;
  }
  /**
   * @param string
   */
  public function setPostingRegion($postingRegion)
  {
    $this->postingRegion = $postingRegion;
  }
  /**
   * @return string
   */
  public function getPostingRegion()
  {
    return $this->postingRegion;
  }
  /**
   * @param string
   */
  public function setPostingUpdateTime($postingUpdateTime)
  {
    $this->postingUpdateTime = $postingUpdateTime;
  }
  /**
   * @return string
   */
  public function getPostingUpdateTime()
  {
    return $this->postingUpdateTime;
  }
  /**
   * @param ProcessingOptions
   */
  public function setProcessingOptions(ProcessingOptions $processingOptions)
  {
    $this->processingOptions = $processingOptions;
  }
  /**
   * @return ProcessingOptions
   */
  public function getProcessingOptions()
  {
    return $this->processingOptions;
  }
  /**
   * @param int
   */
  public function setPromotionValue($promotionValue)
  {
    $this->promotionValue = $promotionValue;
  }
  /**
   * @return int
   */
  public function getPromotionValue()
  {
    return $this->promotionValue;
  }
  /**
   * @param string
   */
  public function setQualifications($qualifications)
  {
    $this->qualifications = $qualifications;
  }
  /**
   * @return string
   */
  public function getQualifications()
  {
    return $this->qualifications;
  }
  /**
   * @param string
   */
  public function setRequisitionId($requisitionId)
  {
    $this->requisitionId = $requisitionId;
  }
  /**
   * @return string
   */
  public function getRequisitionId()
  {
    return $this->requisitionId;
  }
  /**
   * @param string
   */
  public function setResponsibilities($responsibilities)
  {
    $this->responsibilities = $responsibilities;
  }
  /**
   * @return string
   */
  public function getResponsibilities()
  {
    return $this->responsibilities;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param string
   */
  public function setVisibility($visibility)
  {
    $this->visibility = $visibility;
  }
  /**
   * @return string
   */
  public function getVisibility()
  {
    return $this->visibility;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Job::class, 'Google_Service_CloudTalentSolution_Job');
