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

class Google_Service_CloudTalentSolution_JobQuery extends Google_Collection
{
  protected $collection_key = 'locationFilters';
  protected $commuteFilterType = 'Google_Service_CloudTalentSolution_CommuteFilter';
  protected $commuteFilterDataType = '';
  public $companyDisplayNames;
  public $companyNames;
  protected $compensationFilterType = 'Google_Service_CloudTalentSolution_CompensationFilter';
  protected $compensationFilterDataType = '';
  public $customAttributeFilter;
  public $disableSpellCheck;
  public $employmentTypes;
  public $jobCategories;
  public $languageCodes;
  protected $locationFiltersType = 'Google_Service_CloudTalentSolution_LocationFilter';
  protected $locationFiltersDataType = 'array';
  protected $publishTimeRangeType = 'Google_Service_CloudTalentSolution_TimestampRange';
  protected $publishTimeRangeDataType = '';
  public $query;
  public $queryLanguageCode;

  /**
   * @param Google_Service_CloudTalentSolution_CommuteFilter
   */
  public function setCommuteFilter(Google_Service_CloudTalentSolution_CommuteFilter $commuteFilter)
  {
    $this->commuteFilter = $commuteFilter;
  }
  /**
   * @return Google_Service_CloudTalentSolution_CommuteFilter
   */
  public function getCommuteFilter()
  {
    return $this->commuteFilter;
  }
  public function setCompanyDisplayNames($companyDisplayNames)
  {
    $this->companyDisplayNames = $companyDisplayNames;
  }
  public function getCompanyDisplayNames()
  {
    return $this->companyDisplayNames;
  }
  public function setCompanyNames($companyNames)
  {
    $this->companyNames = $companyNames;
  }
  public function getCompanyNames()
  {
    return $this->companyNames;
  }
  /**
   * @param Google_Service_CloudTalentSolution_CompensationFilter
   */
  public function setCompensationFilter(Google_Service_CloudTalentSolution_CompensationFilter $compensationFilter)
  {
    $this->compensationFilter = $compensationFilter;
  }
  /**
   * @return Google_Service_CloudTalentSolution_CompensationFilter
   */
  public function getCompensationFilter()
  {
    return $this->compensationFilter;
  }
  public function setCustomAttributeFilter($customAttributeFilter)
  {
    $this->customAttributeFilter = $customAttributeFilter;
  }
  public function getCustomAttributeFilter()
  {
    return $this->customAttributeFilter;
  }
  public function setDisableSpellCheck($disableSpellCheck)
  {
    $this->disableSpellCheck = $disableSpellCheck;
  }
  public function getDisableSpellCheck()
  {
    return $this->disableSpellCheck;
  }
  public function setEmploymentTypes($employmentTypes)
  {
    $this->employmentTypes = $employmentTypes;
  }
  public function getEmploymentTypes()
  {
    return $this->employmentTypes;
  }
  public function setJobCategories($jobCategories)
  {
    $this->jobCategories = $jobCategories;
  }
  public function getJobCategories()
  {
    return $this->jobCategories;
  }
  public function setLanguageCodes($languageCodes)
  {
    $this->languageCodes = $languageCodes;
  }
  public function getLanguageCodes()
  {
    return $this->languageCodes;
  }
  /**
   * @param Google_Service_CloudTalentSolution_LocationFilter
   */
  public function setLocationFilters($locationFilters)
  {
    $this->locationFilters = $locationFilters;
  }
  /**
   * @return Google_Service_CloudTalentSolution_LocationFilter
   */
  public function getLocationFilters()
  {
    return $this->locationFilters;
  }
  /**
   * @param Google_Service_CloudTalentSolution_TimestampRange
   */
  public function setPublishTimeRange(Google_Service_CloudTalentSolution_TimestampRange $publishTimeRange)
  {
    $this->publishTimeRange = $publishTimeRange;
  }
  /**
   * @return Google_Service_CloudTalentSolution_TimestampRange
   */
  public function getPublishTimeRange()
  {
    return $this->publishTimeRange;
  }
  public function setQuery($query)
  {
    $this->query = $query;
  }
  public function getQuery()
  {
    return $this->query;
  }
  public function setQueryLanguageCode($queryLanguageCode)
  {
    $this->queryLanguageCode = $queryLanguageCode;
  }
  public function getQueryLanguageCode()
  {
    return $this->queryLanguageCode;
  }
}
