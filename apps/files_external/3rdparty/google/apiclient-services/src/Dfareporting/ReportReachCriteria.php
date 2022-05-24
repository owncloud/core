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

class ReportReachCriteria extends \Google\Collection
{
  protected $collection_key = 'reachByFrequencyMetricNames';
  protected $activitiesType = Activities::class;
  protected $activitiesDataType = '';
  protected $customRichMediaEventsType = CustomRichMediaEvents::class;
  protected $customRichMediaEventsDataType = '';
  protected $dateRangeType = DateRange::class;
  protected $dateRangeDataType = '';
  protected $dimensionFiltersType = DimensionValue::class;
  protected $dimensionFiltersDataType = 'array';
  protected $dimensionsType = SortedDimension::class;
  protected $dimensionsDataType = 'array';
  /**
   * @var bool
   */
  public $enableAllDimensionCombinations;
  /**
   * @var string[]
   */
  public $metricNames;
  /**
   * @var string[]
   */
  public $reachByFrequencyMetricNames;

  /**
   * @param Activities
   */
  public function setActivities(Activities $activities)
  {
    $this->activities = $activities;
  }
  /**
   * @return Activities
   */
  public function getActivities()
  {
    return $this->activities;
  }
  /**
   * @param CustomRichMediaEvents
   */
  public function setCustomRichMediaEvents(CustomRichMediaEvents $customRichMediaEvents)
  {
    $this->customRichMediaEvents = $customRichMediaEvents;
  }
  /**
   * @return CustomRichMediaEvents
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
   * @param bool
   */
  public function setEnableAllDimensionCombinations($enableAllDimensionCombinations)
  {
    $this->enableAllDimensionCombinations = $enableAllDimensionCombinations;
  }
  /**
   * @return bool
   */
  public function getEnableAllDimensionCombinations()
  {
    return $this->enableAllDimensionCombinations;
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
   * @param string[]
   */
  public function setReachByFrequencyMetricNames($reachByFrequencyMetricNames)
  {
    $this->reachByFrequencyMetricNames = $reachByFrequencyMetricNames;
  }
  /**
   * @return string[]
   */
  public function getReachByFrequencyMetricNames()
  {
    return $this->reachByFrequencyMetricNames;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReportReachCriteria::class, 'Google_Service_Dfareporting_ReportReachCriteria');
