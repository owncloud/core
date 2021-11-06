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

class JobQuery extends \Google\Collection
{
  protected $collection_key = 'locationFilters';
  protected $commuteFilterType = CommuteFilter::class;
  protected $commuteFilterDataType = '';
  public $companies;
  public $companyDisplayNames;
  protected $compensationFilterType = CompensationFilter::class;
  protected $compensationFilterDataType = '';
  public $customAttributeFilter;
  public $disableSpellCheck;
  public $employmentTypes;
  public $excludedJobs;
  public $jobCategories;
  public $languageCodes;
  protected $locationFiltersType = LocationFilter::class;
  protected $locationFiltersDataType = 'array';
  protected $publishTimeRangeType = TimestampRange::class;
  protected $publishTimeRangeDataType = '';
  public $query;
  public $queryLanguageCode;

  /**
   * @param CommuteFilter
   */
  public function setCommuteFilter(CommuteFilter $commuteFilter)
  {
    $this->commuteFilter = $commuteFilter;
  }
  /**
   * @return CommuteFilter
   */
  public function getCommuteFilter()
  {
    return $this->commuteFilter;
  }
  public function setCompanies($companies)
  {
    $this->companies = $companies;
  }
  public function getCompanies()
  {
    return $this->companies;
  }
  public function setCompanyDisplayNames($companyDisplayNames)
  {
    $this->companyDisplayNames = $companyDisplayNames;
  }
  public function getCompanyDisplayNames()
  {
    return $this->companyDisplayNames;
  }
  /**
   * @param CompensationFilter
   */
  public function setCompensationFilter(CompensationFilter $compensationFilter)
  {
    $this->compensationFilter = $compensationFilter;
  }
  /**
   * @return CompensationFilter
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
  public function setExcludedJobs($excludedJobs)
  {
    $this->excludedJobs = $excludedJobs;
  }
  public function getExcludedJobs()
  {
    return $this->excludedJobs;
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
   * @param LocationFilter[]
   */
  public function setLocationFilters($locationFilters)
  {
    $this->locationFilters = $locationFilters;
  }
  /**
   * @return LocationFilter[]
   */
  public function getLocationFilters()
  {
    return $this->locationFilters;
  }
  /**
   * @param TimestampRange
   */
  public function setPublishTimeRange(TimestampRange $publishTimeRange)
  {
    $this->publishTimeRange = $publishTimeRange;
  }
  /**
   * @return TimestampRange
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(JobQuery::class, 'Google_Service_CloudTalentSolution_JobQuery');
