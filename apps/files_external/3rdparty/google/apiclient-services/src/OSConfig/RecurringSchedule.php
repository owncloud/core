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

namespace Google\Service\OSConfig;

class RecurringSchedule extends \Google\Model
{
  /**
   * @var string
   */
  public $endTime;
  /**
   * @var string
   */
  public $frequency;
  /**
   * @var string
   */
  public $lastExecuteTime;
  protected $monthlyType = MonthlySchedule::class;
  protected $monthlyDataType = '';
  /**
   * @var string
   */
  public $nextExecuteTime;
  /**
   * @var string
   */
  public $startTime;
  protected $timeOfDayType = TimeOfDay::class;
  protected $timeOfDayDataType = '';
  protected $timeZoneType = TimeZone::class;
  protected $timeZoneDataType = '';
  protected $weeklyType = WeeklySchedule::class;
  protected $weeklyDataType = '';

  /**
   * @param string
   */
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return string
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param string
   */
  public function setFrequency($frequency)
  {
    $this->frequency = $frequency;
  }
  /**
   * @return string
   */
  public function getFrequency()
  {
    return $this->frequency;
  }
  /**
   * @param string
   */
  public function setLastExecuteTime($lastExecuteTime)
  {
    $this->lastExecuteTime = $lastExecuteTime;
  }
  /**
   * @return string
   */
  public function getLastExecuteTime()
  {
    return $this->lastExecuteTime;
  }
  /**
   * @param MonthlySchedule
   */
  public function setMonthly(MonthlySchedule $monthly)
  {
    $this->monthly = $monthly;
  }
  /**
   * @return MonthlySchedule
   */
  public function getMonthly()
  {
    return $this->monthly;
  }
  /**
   * @param string
   */
  public function setNextExecuteTime($nextExecuteTime)
  {
    $this->nextExecuteTime = $nextExecuteTime;
  }
  /**
   * @return string
   */
  public function getNextExecuteTime()
  {
    return $this->nextExecuteTime;
  }
  /**
   * @param string
   */
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return string
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param TimeOfDay
   */
  public function setTimeOfDay(TimeOfDay $timeOfDay)
  {
    $this->timeOfDay = $timeOfDay;
  }
  /**
   * @return TimeOfDay
   */
  public function getTimeOfDay()
  {
    return $this->timeOfDay;
  }
  /**
   * @param TimeZone
   */
  public function setTimeZone(TimeZone $timeZone)
  {
    $this->timeZone = $timeZone;
  }
  /**
   * @return TimeZone
   */
  public function getTimeZone()
  {
    return $this->timeZone;
  }
  /**
   * @param WeeklySchedule
   */
  public function setWeekly(WeeklySchedule $weekly)
  {
    $this->weekly = $weekly;
  }
  /**
   * @return WeeklySchedule
   */
  public function getWeekly()
  {
    return $this->weekly;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RecurringSchedule::class, 'Google_Service_OSConfig_RecurringSchedule');
