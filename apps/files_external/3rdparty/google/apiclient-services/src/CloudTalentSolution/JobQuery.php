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
  /**
   * @var string[]
   */
  public $companies;
  /**
   * @var string[]
   */
  public $companyDisplayNames;
  protected $compensationFilterType = CompensationFilter::class;
  protected $compensationFilterDataType = '';
  /**
   * @var string
   */
  public $customAttributeFilter;
  /**
   * @var bool
   */
  public $disableSpellCheck;
  /**
   * @var string[]
   */
  public $employmentTypes;
  /**
   * @var string[]
   */
  public $excludedJobs;
  /**
   * @var string[]
   */
  public $jobCategories;
  /**
   * @var string[]
   */
  public $languageCodes;
  protected $locationFiltersType = LocationFilter::class;
  protected $locationFiltersDataType = 'array';
  protected $publishTimeRangeType = TimestampRange::class;
  protected $publishTimeRangeDataType = '';
  /**
   * @var string
   */
  public $query;
  /**
   * @var string
   */
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
  /**
   * @param string[]
   */
  public function setCompanies($companies)
  {
    $this->companies = $companies;
  }
  /**
   * @return string[]
   */
  public function getCompanies()
  {
    return $this->companies;
  }
  /**
   * @param string[]
   */
  public function setCompanyDisplayNames($companyDisplayNames)
  {
    $this->companyDisplayNames = $companyDisplayNames;
  }
  /**
   * @return string[]
   */
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
  /**
   * @param string
   */
  public function setCustomAttributeFilter($customAttributeFilter)
  {
    $this->customAttributeFilter = $customAttributeFilter;
  }
  /**
   * @return string
   */
  public function getCustomAttributeFilter()
  {
    return $this->customAttributeFilter;
  }
  /**
   * @param bool
   */
  public function setDisableSpellCheck($disableSpellCheck)
  {
    $this->disableSpellCheck = $disableSpellCheck;
  }
  /**
   * @return bool
   */
  public function getDisableSpellCheck()
  {
    return $this->disableSpellCheck;
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
   * @param string[]
   */
  public function setExcludedJobs($excludedJobs)
  {
    $this->excludedJobs = $excludedJobs;
  }
  /**
   * @return string[]
   */
  public function getExcludedJobs()
  {
    return $this->excludedJobs;
  }
  /**
   * @param string[]
   */
  public function setJobCategories($jobCategories)
  {
    $this->jobCategories = $jobCategories;
  }
  /**
   * @return string[]
   */
  public function getJobCategories()
  {
    return $this->jobCategories;
  }
  /**
   * @param string[]
   */
  public function setLanguageCodes($languageCodes)
  {
    $this->languageCodes = $languageCodes;
  }
  /**
   * @return string[]
   */
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
  /**
   * @param string
   */
  public function setQuery($query)
  {
    $this->query = $query;
  }
  /**
   * @return string
   */
  public function getQuery()
  {
    return $this->query;
  }
  /**
   * @param string
   */
  public function setQueryLanguageCode($queryLanguageCode)
  {
    $this->queryLanguageCode = $queryLanguageCode;
  }
  /**
   * @return string
   */
  public function getQueryLanguageCode()
  {
    return $this->queryLanguageCode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(JobQuery::class, 'Google_Service_CloudTalentSolution_JobQuery');
