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

namespace Google\Service\Dfareporting;

class ReportPathToConversionCriteria extends \Google\Collection
{
  protected $collection_key = 'perInteractionDimensions';
  protected $activityFiltersType = DimensionValue::class;
  protected $activityFiltersDataType = 'array';
  protected $conversionDimensionsType = SortedDimension::class;
  protected $conversionDimensionsDataType = 'array';
  protected $customFloodlightVariablesType = SortedDimension::class;
  protected $customFloodlightVariablesDataType = 'array';
  protected $customRichMediaEventsType = DimensionValue::class;
  protected $customRichMediaEventsDataType = 'array';
  protected $dateRangeType = DateRange::class;
  protected $dateRangeDataType = '';
  protected $floodlightConfigIdType = DimensionValue::class;
  protected $floodlightConfigIdDataType = '';
  public $metricNames;
  protected $perInteractionDimensionsType = SortedDimension::class;
  protected $perInteractionDimensionsDataType = 'array';
  protected $reportPropertiesType = ReportPathToConversionCriteriaReportProperties::class;
  protected $reportPropertiesDataType = '';

  /**
   * @param DimensionValue[]
   */
  public function setActivityFilters($activityFilters)
  {
    $this->activityFilters = $activityFilters;
  }
  /**
   * @return DimensionValue[]
   */
  public function getActivityFilters()
  {
    return $this->activityFilters;
  }
  /**
   * @param SortedDimension[]
   */
  public function setConversionDimensions($conversionDimensions)
  {
    $this->conversionDimensions = $conversionDimensions;
  }
  /**
   * @return SortedDimension[]
   */
  public function getConversionDimensions()
  {
    return $this->conversionDimensions;
  }
  /**
   * @param SortedDimension[]
   */
  public function setCustomFloodlightVariables($customFloodlightVariables)
  {
    $this->customFloodlightVariables = $customFloodlightVariables;
  }
  /**
   * @return SortedDimension[]
   */
  public function getCustomFloodlightVariables()
  {
    return $this->customFloodlightVariables;
  }
  /**
   * @param DimensionValue[]
   */
  public function setCustomRichMediaEvents($customRichMediaEvents)
  {
    $this->customRichMediaEvents = $customRichMediaEvents;
  }
  /**
   * @return DimensionValue[]
   */
  public function getCustomRichMediaEvents()
  {
    return $this->customRichMediaEvents;
  }
  /**
   * @param DateRange
   */
  public function setDateRange(DateRange $dateRange)
  {
    $this->dateRange = $dateRange;
  }
  /**
   * @return DateRange
   */
  public function getDateRange()
  {
    return $this->dateRange;
  }
  /**
   * @param DimensionValue
   */
  public function setFloodlightConfigId(DimensionValue $floodlightConfigId)
  {
    $this->floodlightConfigId = $floodlightConfigId;
  }
  /**
   * @return DimensionValue
   */
  public function getFloodlightConfigId()
  {
    return $this->floodlightConfigId;
  }
  public function setMetricNames($metricNames)
  {
    $this->metricNames = $metricNames;
  }
  public function getMetricNames()
  {
    return $this->metricNames;
  }
  /**
   * @param SortedDimension[]
   */
  public function setPerInteractionDimensions($perInteractionDimensions)
  {
    $this->perInteractionDimensions = $perInteractionDimensions;
  }
  /**
   * @return SortedDimension[]
   */
  public function getPerInteractionDimensions()
  {
    return $this->perInteractionDimensions;
  }
  /**
   * @param ReportPathToConversionCriteriaReportProperties
   */
  public function setReportProperties(ReportPathToConversionCriteriaReportProperties $reportProperties)
  {
    $this->reportProperties = $reportProperties;
  }
  /**
   * @return ReportPathToConversionCriteriaReportProperties
   */
  public function getReportProperties()
  {
    return $this->reportProperties;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReportPathToConversionCriteria::class, 'Google_Service_Dfareporting_ReportPathToConversionCriteria');
