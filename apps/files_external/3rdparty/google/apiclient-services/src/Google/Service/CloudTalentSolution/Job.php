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

class Google_Service_CloudTalentSolution_Job extends Google_Collection
{
  protected $collection_key = 'jobBenefits';
  public $addresses;
  protected $applicationInfoType = 'Google_Service_CloudTalentSolution_ApplicationInfo';
  protected $applicationInfoDataType = '';
  public $companyDisplayName;
  public $companyName;
  protected $compensationInfoType = 'Google_Service_CloudTalentSolution_CompensationInfo';
  protected $compensationInfoDataType = '';
  protected $customAttributesType = 'Google_Service_CloudTalentSolution_CustomAttribute';
  protected $customAttributesDataType = 'map';
  public $degreeTypes;
  public $department;
  protected $derivedInfoType = 'Google_Service_CloudTalentSolution_JobDerivedInfo';
  protected $derivedInfoDataType = '';
  public $description;
  public $employmentTypes;
  public $incentives;
  public $jobBenefits;
  public $jobEndTime;
  public $jobLevel;
  public $jobStartTime;
  public $languageCode;
  public $name;
  public $postingCreateTime;
  public $postingExpireTime;
  public $postingPublishTime;
  public $postingRegion;
  public $postingUpdateTime;
  protected $processingOptionsType = 'Google_Service_CloudTalentSolution_ProcessingOptions';
  protected $processingOptionsDataType = '';
  public $promotionValue;
  public $qualifications;
  public $requisitionId;
  public $responsibilities;
  public $title;
  public $visibility;

  public function setAddresses($addresses)
  {
    $this->addresses = $addresses;
  }
  public function getAddresses()
  {
    return $this->addresses;
  }
  /**
   * @param Google_Service_CloudTalentSolution_ApplicationInfo
   */
  public function setApplicationInfo(Google_Service_CloudTalentSolution_ApplicationInfo $applicationInfo)
  {
    $this->applicationInfo = $applicationInfo;
  }
  /**
   * @return Google_Service_CloudTalentSolution_ApplicationInfo
   */
  public function getApplicationInfo()
  {
    return $this->applicationInfo;
  }
  public function setCompanyDisplayName($companyDisplayName)
  {
    $this->companyDisplayName = $companyDisplayName;
  }
  public function getCompanyDisplayName()
  {
    return $this->companyDisplayName;
  }
  public function setCompanyName($companyName)
  {
    $this->companyName = $companyName;
  }
  public function getCompanyName()
  {
    return $this->companyName;
  }
  /**
   * @param Google_Service_CloudTalentSolution_CompensationInfo
   */
  public function setCompensationInfo(Google_Service_CloudTalentSolution_CompensationInfo $compensationInfo)
  {
    $this->compensationInfo = $compensationInfo;
  }
  /**
   * @return Google_Service_CloudTalentSolution_CompensationInfo
   */
  public function getCompensationInfo()
  {
    return $this->compensationInfo;
  }
  /**
   * @param Google_Service_CloudTalentSolution_CustomAttribute
   */
  public function setCustomAttributes($customAttributes)
  {
    $this->customAttributes = $customAttributes;
  }
  /**
   * @return Google_Service_CloudTalentSolution_CustomAttribute
   */
  public function getCustomAttributes()
  {
    return $this->customAttributes;
  }
  public function setDegreeTypes($degreeTypes)
  {
    $this->degreeTypes = $degreeTypes;
  }
  public function getDegreeTypes()
  {
    return $this->degreeTypes;
  }
  public function setDepartment($department)
  {
    $this->department = $department;
  }
  public function getDepartment()
  {
    return $this->department;
  }
  /**
   * @param Google_Service_CloudTalentSolution_JobDerivedInfo
   */
  public function setDerivedInfo(Google_Service_CloudTalentSolution_JobDerivedInfo $derivedInfo)
  {
    $this->derivedInfo = $derivedInfo;
  }
  /**
   * @return Google_Service_CloudTalentSolution_JobDerivedInfo
   */
  public function getDerivedInfo()
  {
    return $this->derivedInfo;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEmploymentTypes($employmentTypes)
  {
    $this->employmentTypes = $employmentTypes;
  }
  public function getEmploymentTypes()
  {
    return $this->employmentTypes;
  }
  public function setIncentives($incentives)
  {
    $this->incentives = $incentives;
  }
  public function getIncentives()
  {
    return $this->incentives;
  }
  public function setJobBenefits($jobBenefits)
  {
    $this->jobBenefits = $jobBenefits;
  }
  public function getJobBenefits()
  {
    return $this->jobBenefits;
  }
  public function setJobEndTime($jobEndTime)
  {
    $this->jobEndTime = $jobEndTime;
  }
  public function getJobEndTime()
  {
    return $this->jobEndTime;
  }
  public function setJobLevel($jobLevel)
  {
    $this->jobLevel = $jobLevel;
  }
  public function getJobLevel()
  {
    return $this->jobLevel;
  }
  public function setJobStartTime($jobStartTime)
  {
    $this->jobStartTime = $jobStartTime;
  }
  public function getJobStartTime()
  {
    return $this->jobStartTime;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPostingCreateTime($postingCreateTime)
  {
    $this->postingCreateTime = $postingCreateTime;
  }
  public function getPostingCreateTime()
  {
    return $this->postingCreateTime;
  }
  public function setPostingExpireTime($postingExpireTime)
  {
    $this->postingExpireTime = $postingExpireTime;
  }
  public function getPostingExpireTime()
  {
    return $this->postingExpireTime;
  }
  public function setPostingPublishTime($postingPublishTime)
  {
    $this->postingPublishTime = $postingPublishTime;
  }
  public function getPostingPublishTime()
  {
    return $this->postingPublishTime;
  }
  public function setPostingRegion($postingRegion)
  {
    $this->postingRegion = $postingRegion;
  }
  public function getPostingRegion()
  {
    return $this->postingRegion;
  }
  public function setPostingUpdateTime($postingUpdateTime)
  {
    $this->postingUpdateTime = $postingUpdateTime;
  }
  public function getPostingUpdateTime()
  {
    return $this->postingUpdateTime;
  }
  /**
   * @param Google_Service_CloudTalentSolution_ProcessingOptions
   */
  public function setProcessingOptions(Google_Service_CloudTalentSolution_ProcessingOptions $processingOptions)
  {
    $this->processingOptions = $processingOptions;
  }
  /**
   * @return Google_Service_CloudTalentSolution_ProcessingOptions
   */
  public function getProcessingOptions()
  {
    return $this->processingOptions;
  }
  public function setPromotionValue($promotionValue)
  {
    $this->promotionValue = $promotionValue;
  }
  public function getPromotionValue()
  {
    return $this->promotionValue;
  }
  public function setQualifications($qualifications)
  {
    $this->qualifications = $qualifications;
  }
  public function getQualifications()
  {
    return $this->qualifications;
  }
  public function setRequisitionId($requisitionId)
  {
    $this->requisitionId = $requisitionId;
  }
  public function getRequisitionId()
  {
    return $this->requisitionId;
  }
  public function setResponsibilities($responsibilities)
  {
    $this->responsibilities = $responsibilities;
  }
  public function getResponsibilities()
  {
    return $this->responsibilities;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setVisibility($visibility)
  {
    $this->visibility = $visibility;
  }
  public function getVisibility()
  {
    return $this->visibility;
  }
}
