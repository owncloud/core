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

class ReportFloodlightCriteria extends \Google\Collection
{
  protected $collection_key = 'metricNames';
  protected $customRichMediaEventsType = DimensionValue::class;
  protected $customRichMediaEventsDataType = 'array';
  protected $dateRangeType = DateRange::class;
  protected $dateRangeDataType = '';
  protected $dimensionFiltersType = DimensionValue::class;
  protected $dimensionFiltersDataType = 'array';
  protected $dimensionsType = SortedDimension::class;
  protected $dimensionsDataType = 'array';
  protected $floodlightConfigIdType = DimensionValue::class;
  protected $floodlightConfigIdDataType = '';
  public $metricNames;
  protected $reportPropertiesType = ReportFloodlightCriteriaReportProperties::class;
  protected $reportPropertiesDataType = '';

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
   * @param DimensionValue[]
   */
  public function setDimensionFilters($dimensionFilters)
  {
    $this->dimensionFilters = $dimensionFilters;
  }
  /**
   * @return DimensionValue[]
   */
  public function getDimensionFilters()
  {
    return $this->dimensionFilters;
  }
  /**
   * @param SortedDimension[]
   */
  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  /**
   * @return SortedDimension[]
   */
  public function getDimensions()
  {
    return $this->dimensions;
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
   * @param ReportFloodlightCriteriaReportProperties
   */
  public function setReportProperties(ReportFloodlightCriteriaReportProperties $reportProperties)
  {
    $this->reportProperties = $reportProperties;
  }
  /**
   * @return ReportFloodlightCriteriaReportProperties
   */
  public function getReportProperties()
  {
    return $this->reportProperties;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReportFloodlightCriteria::class, 'Google_Service_Dfareporting_ReportFloodlightCriteria');
