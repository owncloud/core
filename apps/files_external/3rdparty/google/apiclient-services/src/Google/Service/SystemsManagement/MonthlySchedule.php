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

class Google_Service_SystemsManagement_MonthlySchedule extends Google_Model
{
  public $monthDay;
  protected $weekDayOfMonthType = 'Google_Service_SystemsManagement_WeekDayOfMonth';
  protected $weekDayOfMonthDataType = '';

  public function setMonthDay($monthDay)
  {
    $this->monthDay = $monthDay;
  }
  public function getMonthDay()
  {
    return $this->monthDay;
  }
  /**
   * @param Google_Service_SystemsManagement_WeekDayOfMonth
   */
  public function setWeekDayOfMonth(Google_Service_SystemsManagement_WeekDayOfMonth $weekDayOfMonth)
  {
    $this->weekDayOfMonth = $weekDayOfMonth;
  }
  /**
   * @return Google_Service_SystemsManagement_WeekDayOfMonth
   */
  public function getWeekDayOfMonth()
  {
    return $this->weekDayOfMonth;
  }
}
