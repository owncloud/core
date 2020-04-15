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

class Google_Service_JobService_JobQuery extends Google_Collection
{
  protected $collection_key = 'locationFilters';
  public $categories;
  protected $commuteFilterType = 'Google_Service_JobService_CommutePreference';
  protected $commuteFilterDataType = '';
  public $companyDisplayNames;
  public $companyNames;
  protected $compensationFilterType = 'Google_Service_JobService_CompensationFilter';
  protected $compensationFilterDataType = '';
  public $customAttributeFilter;
  public $disableSpellCheck;
  public $employmentTypes;
  public $languageCodes;
  protected $locationFiltersType = 'Google_Service_JobService_LocationFilter';
  protected $locationFiltersDataType = 'array';
  public $publishDateRange;
  public $query;

  public function setCategories($categories)
  {
    $this->categories = $categories;
  }
  public function getCategories()
  {
    return $this->categories;
  }
  /**
   * @param Google_Service_JobService_CommutePreference
   */
  public function setCommuteFilter(Google_Service_JobService_CommutePreference $commuteFilter)
  {
    $this->commuteFilter = $commuteFilter;
  }
  /**
   * @return Google_Service_JobService_CommutePreference
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
   * @param Google_Service_JobService_CompensationFilter
   */
  public function setCompensationFilter(Google_Service_JobService_CompensationFilter $compensationFilter)
  {
    $this->compensationFilter = $compensationFilter;
  }
  /**
   * @return Google_Service_JobService_CompensationFilter
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
  public function setLanguageCodes($languageCodes)
  {
    $this->languageCodes = $languageCodes;
  }
  public function getLanguageCodes()
  {
    return $this->languageCodes;
  }
  /**
   * @param Google_Service_JobService_LocationFilter
   */
  public function setLocationFilters($locationFilters)
  {
    $this->locationFilters = $locationFilters;
  }
  /**
   * @return Google_Service_JobService_LocationFilter
   */
  public function getLocationFilters()
  {
    return $this->locationFilters;
  }
  public function setPublishDateRange($publishDateRange)
  {
    $this->publishDateRange = $publishDateRange;
  }
  public function getPublishDateRange()
  {
    return $this->publishDateRange;
  }
  public function setQuery($query)
  {
    $this->query = $query;
  }
  public function getQuery()
  {
    return $this->query;
  }
}
