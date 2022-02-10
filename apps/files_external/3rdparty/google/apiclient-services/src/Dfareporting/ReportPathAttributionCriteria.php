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

class ReportPathAttributionCriteria extends \Google\Collection
{
  protected $collection_key = 'pathFilters';
  protected $activityFiltersType = DimensionValue::class;
  protected $activityFiltersDataType = 'array';
  protected $customChannelGroupingType = ChannelGrouping::class;
  protected $customChannelGroupingDataType = '';
  protected $dateRangeType = DateRange::class;
  protected $dateRangeDataType = '';
  protected $dimensionsType = SortedDimension::class;
  protected $dimensionsDataType = 'array';
  protected $floodlightConfigIdType = DimensionValue::class;
  protected $floodlightConfigIdDataType = '';
  /**
   * @var string[]
   */
  public $metricNames;
  protected $pathFiltersType = PathFilter::class;
  protected $pathFiltersDataType = 'array';

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
   * @param ChannelGrouping
   */
  public function setCustomChannelGrouping(ChannelGrouping $customChannelGrouping)
  {
    $this->customChannelGrouping = $customChannelGrouping;
  }
  /**
   * @return ChannelGrouping
   */
  public function getCustomChannelGrouping()
  {
    return $this->customChannelGrouping;
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
  /**
   * @param string[]
   */
  public function setMetricNames($metricNames)
  {
    $this->metricNames = $metricNames;
  }
  /**
   * @return string[]
   */
  public function getMetricNames()
  {
    return $this->metricNames;
  }
  /**
   * @param PathFilter[]
   */
  public function setPathFilters($pathFilters)
  {
    $this->pathFilters = $pathFilters;
  }
  /**
   * @return PathFilter[]
   */
  public function getPathFilters()
  {
    return $this->pathFilters;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReportPathAttributionCriteria::class, 'Google_Service_Dfareporting_ReportPathAttributionCriteria');
