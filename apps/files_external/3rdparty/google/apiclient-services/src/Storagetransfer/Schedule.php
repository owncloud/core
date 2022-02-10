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

namespace Google\Service\Storagetransfer;

class Schedule extends \Google\Model
{
  protected $endTimeOfDayType = TimeOfDay::class;
  protected $endTimeOfDayDataType = '';
  /**
   * @var string
   */
  public $repeatInterval;
  protected $scheduleEndDateType = Date::class;
  protected $scheduleEndDateDataType = '';
  protected $scheduleStartDateType = Date::class;
  protected $scheduleStartDateDataType = '';
  protected $startTimeOfDayType = TimeOfDay::class;
  protected $startTimeOfDayDataType = '';

  /**
   * @param TimeOfDay
   */
  public function setEndTimeOfDay(TimeOfDay $endTimeOfDay)
  {
    $this->endTimeOfDay = $endTimeOfDay;
  }
  /**
   * @return TimeOfDay
   */
  public function getEndTimeOfDay()
  {
    return $this->endTimeOfDay;
  }
  /**
   * @param string
   */
  public function setRepeatInterval($repeatInterval)
  {
    $this->repeatInterval = $repeatInterval;
  }
  /**
   * @return string
   */
  public function getRepeatInterval()
  {
    return $this->repeatInterval;
  }
  /**
   * @param Date
   */
  public function setScheduleEndDate(Date $scheduleEndDate)
  {
    $this->scheduleEndDate = $scheduleEndDate;
  }
  /**
   * @return Date
   */
  public function getScheduleEndDate()
  {
    return $this->scheduleEndDate;
  }
  /**
   * @param Date
   */
  public function setScheduleStartDate(Date $scheduleStartDate)
  {
    $this->scheduleStartDate = $scheduleStartDate;
  }
  /**
   * @return Date
   */
  public function getScheduleStartDate()
  {
    return $this->scheduleStartDate;
  }
  /**
   * @param TimeOfDay
   */
  public function setStartTimeOfDay(TimeOfDay $startTimeOfDay)
  {
    $this->startTimeOfDay = $startTimeOfDay;
  }
  /**
   * @return TimeOfDay
   */
  public function getStartTimeOfDay()
  {
    return $this->startTimeOfDay;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Schedule::class, 'Google_Service_Storagetransfer_Schedule');
