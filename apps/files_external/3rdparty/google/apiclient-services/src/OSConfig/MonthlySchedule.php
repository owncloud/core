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

class MonthlySchedule extends \Google\Model
{
  /**
   * @var int
   */
  public $monthDay;
  protected $weekDayOfMonthType = WeekDayOfMonth::class;
  protected $weekDayOfMonthDataType = '';

  /**
   * @param int
   */
  public function setMonthDay($monthDay)
  {
    $this->monthDay = $monthDay;
  }
  /**
   * @return int
   */
  public function getMonthDay()
  {
    return $this->monthDay;
  }
  /**
   * @param WeekDayOfMonth
   */
  public function setWeekDayOfMonth(WeekDayOfMonth $weekDayOfMonth)
  {
    $this->weekDayOfMonth = $weekDayOfMonth;
  }
  /**
   * @return WeekDayOfMonth
   */
  public function getWeekDayOfMonth()
  {
    return $this->weekDayOfMonth;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MonthlySchedule::class, 'Google_Service_OSConfig_MonthlySchedule');
