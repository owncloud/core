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

class Google_Service_AdMob_MediationReportSpec extends Google_Collection
{
  protected $collection_key = 'sortConditions';
  protected $dateRangeType = 'Google_Service_AdMob_DateRange';
  protected $dateRangeDataType = '';
  protected $dimensionFiltersType = 'Google_Service_AdMob_MediationReportSpecDimensionFilter';
  protected $dimensionFiltersDataType = 'array';
  public $dimensions;
  protected $localizationSettingsType = 'Google_Service_AdMob_LocalizationSettings';
  protected $localizationSettingsDataType = '';
  public $maxReportRows;
  public $metrics;
  protected $sortConditionsType = 'Google_Service_AdMob_MediationReportSpecSortCondition';
  protected $sortConditionsDataType = 'array';
  public $timeZone;

  /**
   * @param Google_Service_AdMob_DateRange
   */
  public function setDateRange(Google_Service_AdMob_DateRange $dateRange)
  {
    $this->dateRange = $dateRange;
  }
  /**
   * @return Google_Service_AdMob_DateRange
   */
  public function getDateRange()
  {
    return $this->dateRange;
  }
  /**
   * @param Google_Service_AdMob_MediationReportSpecDimensionFilter[]
   */
  public function setDimensionFilters($dimensionFilters)
  {
    $this->dimensionFilters = $dimensionFilters;
  }
  /**
   * @return Google_Service_AdMob_MediationReportSpecDimensionFilter[]
   */
  public function getDimensionFilters()
  {
    return $this->dimensionFilters;
  }
  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  public function getDimensions()
  {
    return $this->dimensions;
  }
  /**
   * @param Google_Service_AdMob_LocalizationSettings
   */
  public function setLocalizationSettings(Google_Service_AdMob_LocalizationSettings $localizationSettings)
  {
    $this->localizationSettings = $localizationSettings;
  }
  /**
   * @return Google_Service_AdMob_LocalizationSettings
   */
  public function getLocalizationSettings()
  {
    return $this->localizationSettings;
  }
  public function setMaxReportRows($maxReportRows)
  {
    $this->maxReportRows = $maxReportRows;
  }
  public function getMaxReportRows()
  {
    return $this->maxReportRows;
  }
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param Google_Service_AdMob_MediationReportSpecSortCondition[]
   */
  public function setSortConditions($sortConditions)
  {
    $this->sortConditions = $sortConditions;
  }
  /**
   * @return Google_Service_AdMob_MediationReportSpecSortCondition[]
   */
  public function getSortConditions()
  {
    return $this->sortConditions;
  }
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  public function getTimeZone()
  {
    return $this->timeZone;
  }
}
