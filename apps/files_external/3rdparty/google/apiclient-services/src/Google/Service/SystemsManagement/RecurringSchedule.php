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

class Google_Service_SystemsManagement_RecurringSchedule extends Google_Model
{
  public $endTime;
  public $frequency;
  public $lastExecuteTime;
  protected $monthlyType = 'Google_Service_SystemsManagement_MonthlySchedule';
  protected $monthlyDataType = '';
  public $nextExecuteTime;
  public $startTime;
  protected $timeOfDayType = 'Google_Service_SystemsManagement_TimeOfDay';
  protected $timeOfDayDataType = '';
  protected $timeZoneType = 'Google_Service_SystemsManagement_TimeZone';
  protected $timeZoneDataType = '';
  protected $weeklyType = 'Google_Service_SystemsManagement_WeeklySchedule';
  protected $weeklyDataType = '';

  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setFrequency($frequency)
  {
    $this->frequency = $frequency;
  }
  public function getFrequency()
  {
    return $this->frequency;
  }
  public function setLastExecuteTime($lastExecuteTime)
  {
    $this->lastExecuteTime = $lastExecuteTime;
  }
  public function getLastExecuteTime()
  {
    return $this->lastExecuteTime;
  }
  /**
   * @param Google_Service_SystemsManagement_MonthlySchedule
   */
  public function setMonthly(Google_Service_SystemsManagement_MonthlySchedule $monthly)
  {
    $this->monthly = $monthly;
  }
  /**
   * @return Google_Service_SystemsManagement_MonthlySchedule
   */
  public function getMonthly()
  {
    return $this->monthly;
  }
  public function setNextExecuteTime($nextExecuteTime)
  {
    $this->nextExecuteTime = $nextExecuteTime;
  }
  public function getNextExecuteTime()
  {
    return $this->nextExecuteTime;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param Google_Service_SystemsManagement_TimeOfDay
   */
  public function setTimeOfDay(Google_Service_SystemsManagement_TimeOfDay $timeOfDay)
  {
    $this->timeOfDay = $timeOfDay;
  }
  /**
   * @return Google_Service_SystemsManagement_TimeOfDay
   */
  public function getTimeOfDay()
  {
    return $this->timeOfDay;
  }
  /**
   * @param Google_Service_SystemsManagement_TimeZone
   */
  public function setTimeZone(Google_Service_SystemsManagement_TimeZone $timeZone)
  {
    $this->timeZone = $timeZone;
  }
  /**
   * @return Google_Service_SystemsManagement_TimeZone
   */
  public function getTimeZone()
  {
    return $this->timeZone;
  }
  /**
   * @param Google_Service_SystemsManagement_WeeklySchedule
   */
  public function setWeekly(Google_Service_SystemsManagement_WeeklySchedule $weekly)
  {
    $this->weekly = $weekly;
  }
  /**
   * @return Google_Service_SystemsManagement_WeeklySchedule
   */
  public function getWeekly()
  {
    return $this->weekly;
  }
}
