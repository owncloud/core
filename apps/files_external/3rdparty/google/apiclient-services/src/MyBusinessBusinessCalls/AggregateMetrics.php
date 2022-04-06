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

namespace Google\Service\MyBusinessBusinessCalls;

class AggregateMetrics extends \Google\Collection
{
  protected $collection_key = 'weekdayMetrics';
  /**
   * @var int
   */
  public $answeredCallsCount;
  protected $endDateType = Date::class;
  protected $endDateDataType = '';
  protected $hourlyMetricsType = HourlyMetrics::class;
  protected $hourlyMetricsDataType = 'array';
  /**
   * @var int
   */
  public $missedCallsCount;
  protected $startDateType = Date::class;
  protected $startDateDataType = '';
  protected $weekdayMetricsType = WeekDayMetrics::class;
  protected $weekdayMetricsDataType = 'array';

  /**
   * @param int
   */
  public function setAnsweredCallsCount($answeredCallsCount)
  {
    $this->answeredCallsCount = $answeredCallsCount;
  }
  /**
   * @return int
   */
  public function getAnsweredCallsCount()
  {
    return $this->answeredCallsCount;
  }
  /**
   * @param Date
   */
  public function setEndDate(Date $endDate)
  {
    $this->endDate = $endDate;
  }
  /**
   * @return Date
   */
  public function getEndDate()
  {
    return $this->endDate;
  }
  /**
   * @param HourlyMetrics[]
   */
  public function setHourlyMetrics($hourlyMetrics)
  {
    $this->hourlyMetrics = $hourlyMetrics;
  }
  /**
   * @return HourlyMetrics[]
   */
  public function getHourlyMetrics()
  {
    return $this->hourlyMetrics;
  }
  /**
   * @param int
   */
  public function setMissedCallsCount($missedCallsCount)
  {
    $this->missedCallsCount = $missedCallsCount;
  }
  /**
   * @return int
   */
  public function getMissedCallsCount()
  {
    return $this->missedCallsCount;
  }
  /**
   * @param Date
   */
  public function setStartDate(Date $startDate)
  {
    $this->startDate = $startDate;
  }
  /**
   * @return Date
   */
  public function getStartDate()
  {
    return $this->startDate;
  }
  /**
   * @param WeekDayMetrics[]
   */
  public function setWeekdayMetrics($weekdayMetrics)
  {
    $this->weekdayMetrics = $weekdayMetrics;
  }
  /**
   * @return WeekDayMetrics[]
   */
  public function getWeekdayMetrics()
  {
    return $this->weekdayMetrics;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AggregateMetrics::class, 'Google_Service_MyBusinessBusinessCalls_AggregateMetrics');
