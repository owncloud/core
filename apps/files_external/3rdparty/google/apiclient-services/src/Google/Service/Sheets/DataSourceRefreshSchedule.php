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

class Google_Service_Sheets_DataSourceRefreshSchedule extends Google_Model
{
  protected $dailyScheduleType = 'Google_Service_Sheets_DataSourceRefreshDailySchedule';
  protected $dailyScheduleDataType = '';
  public $enabled;
  protected $monthlyScheduleType = 'Google_Service_Sheets_DataSourceRefreshMonthlySchedule';
  protected $monthlyScheduleDataType = '';
  protected $nextRunType = 'Google_Service_Sheets_Interval';
  protected $nextRunDataType = '';
  public $refreshScope;
  protected $weeklyScheduleType = 'Google_Service_Sheets_DataSourceRefreshWeeklySchedule';
  protected $weeklyScheduleDataType = '';

  /**
   * @param Google_Service_Sheets_DataSourceRefreshDailySchedule
   */
  public function setDailySchedule(Google_Service_Sheets_DataSourceRefreshDailySchedule $dailySchedule)
  {
    $this->dailySchedule = $dailySchedule;
  }
  /**
   * @return Google_Service_Sheets_DataSourceRefreshDailySchedule
   */
  public function getDailySchedule()
  {
    return $this->dailySchedule;
  }
  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }
  public function getEnabled()
  {
    return $this->enabled;
  }
  /**
   * @param Google_Service_Sheets_DataSourceRefreshMonthlySchedule
   */
  public function setMonthlySchedule(Google_Service_Sheets_DataSourceRefreshMonthlySchedule $monthlySchedule)
  {
    $this->monthlySchedule = $monthlySchedule;
  }
  /**
   * @return Google_Service_Sheets_DataSourceRefreshMonthlySchedule
   */
  public function getMonthlySchedule()
  {
    return $this->monthlySchedule;
  }
  /**
   * @param Google_Service_Sheets_Interval
   */
  public function setNextRun(Google_Service_Sheets_Interval $nextRun)
  {
    $this->nextRun = $nextRun;
  }
  /**
   * @return Google_Service_Sheets_Interval
   */
  public function getNextRun()
  {
    return $this->nextRun;
  }
  public function setRefreshScope($refreshScope)
  {
    $this->refreshScope = $refreshScope;
  }
  public function getRefreshScope()
  {
    return $this->refreshScope;
  }
  /**
   * @param Google_Service_Sheets_DataSourceRefreshWeeklySchedule
   */
  public function setWeeklySchedule(Google_Service_Sheets_DataSourceRefreshWeeklySchedule $weeklySchedule)
  {
    $this->weeklySchedule = $weeklySchedule;
  }
  /**
   * @return Google_Service_Sheets_DataSourceRefreshWeeklySchedule
   */
  public function getWeeklySchedule()
  {
    return $this->weeklySchedule;
  }
}
