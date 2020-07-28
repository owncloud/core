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

class Google_Service_Dfareporting_ReportPathAttributionCriteria extends Google_Collection
{
  protected $collection_key = 'pathFilters';
  protected $activityFiltersType = 'Google_Service_Dfareporting_DimensionValue';
  protected $activityFiltersDataType = 'array';
  protected $customChannelGroupingType = 'Google_Service_Dfareporting_ChannelGrouping';
  protected $customChannelGroupingDataType = '';
  protected $dateRangeType = 'Google_Service_Dfareporting_DateRange';
  protected $dateRangeDataType = '';
  protected $dimensionsType = 'Google_Service_Dfareporting_SortedDimension';
  protected $dimensionsDataType = 'array';
  protected $floodlightConfigIdType = 'Google_Service_Dfareporting_DimensionValue';
  protected $floodlightConfigIdDataType = '';
  public $metricNames;
  protected $pathFiltersType = 'Google_Service_Dfareporting_PathFilter';
  protected $pathFiltersDataType = 'array';

  /**
   * @param Google_Service_Dfareporting_DimensionValue
   */
  public function setActivityFilters($activityFilters)
  {
    $this->activityFilters = $activityFilters;
  }
  /**
   * @return Google_Service_Dfareporting_DimensionValue
   */
  public function getActivityFilters()
  {
    return $this->activityFilters;
  }
  /**
   * @param Google_Service_Dfareporting_ChannelGrouping
   */
  public function setCustomChannelGrouping(Google_Service_Dfareporting_ChannelGrouping $customChannelGrouping)
  {
    $this->customChannelGrouping = $customChannelGrouping;
  }
  /**
   * @return Google_Service_Dfareporting_ChannelGrouping
   */
  public function getCustomChannelGrouping()
  {
    return $this->customChannelGrouping;
  }
  /**
   * @param Google_Service_Dfareporting_DateRange
   */
  public function setDateRange(Google_Service_Dfareporting_DateRange $dateRange)
  {
    $this->dateRange = $dateRange;
  }
  /**
   * @return Google_Service_Dfareporting_DateRange
   */
  public function getDateRange()
  {
    return $this->dateRange;
  }
  /**
   * @param Google_Service_Dfareporting_SortedDimension
   */
  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  /**
   * @return Google_Service_Dfareporting_SortedDimension
   */
  public function getDimensions()
  {
    return $this->dimensions;
  }
  /**
   * @param Google_Service_Dfareporting_DimensionValue
   */
  public function setFloodlightConfigId(Google_Service_Dfareporting_DimensionValue $floodlightConfigId)
  {
    $this->floodlightConfigId = $floodlightConfigId;
  }
  /**
   * @return Google_Service_Dfareporting_DimensionValue
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
   * @param Google_Service_Dfareporting_PathFilter
   */
  public function setPathFilters($pathFilters)
  {
    $this->pathFilters = $pathFilters;
  }
  /**
   * @return Google_Service_Dfareporting_PathFilter
   */
  public function getPathFilters()
  {
    return $this->pathFilters;
  }
}
