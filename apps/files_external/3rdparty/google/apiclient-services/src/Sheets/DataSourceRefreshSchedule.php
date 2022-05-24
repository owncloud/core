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

namespace Google\Service\Sheets;

class DataSourceRefreshSchedule extends \Google\Model
{
  protected $dailyScheduleType = DataSourceRefreshDailySchedule::class;
  protected $dailyScheduleDataType = '';
  /**
   * @var bool
   */
  public $enabled;
  protected $monthlyScheduleType = DataSourceRefreshMonthlySchedule::class;
  protected $monthlyScheduleDataType = '';
  protected $nextRunType = Interval::class;
  protected $nextRunDataType = '';
  /**
   * @var string
   */
  public $refreshScope;
  protected $weeklyScheduleType = DataSourceRefreshWeeklySchedule::class;
  protected $weeklyScheduleDataType = '';

  /**
   * @param DataSourceRefreshDailySchedule
   */
  public function setDailySchedule(DataSourceRefreshDailySchedule $dailySchedule)
  {
    $this->dailySchedule = $dailySchedule;
  }
  /**
   * @return DataSourceRefreshDailySchedule
   */
  public function getDailySchedule()
  {
    return $this->dailySchedule;
  }
  /**
   * @param bool
   */
  public function setEnabled($enabled)
  {
    $this->enabled = $enabled;
  }
  /**
   * @return bool
   */
  public function getEnabled()
  {
    return $this->enabled;
  }
  /**
   * @param DataSourceRefreshMonthlySchedule
   */
  public function setMonthlySchedule(DataSourceRefreshMonthlySchedule $monthlySchedule)
  {
    $this->monthlySchedule = $monthlySchedule;
  }
  /**
   * @return DataSourceRefreshMonthlySchedule
   */
  public function getMonthlySchedule()
  {
    return $this->monthlySchedule;
  }
  /**
   * @param Interval
   */
  public function setNextRun(Interval $nextRun)
  {
    $this->nextRun = $nextRun;
  }
  /**
   * @return Interval
   */
  public function getNextRun()
  {
    return $this->nextRun;
  }
  /**
   * @param string
   */
  public function setRefreshScope($refreshScope)
  {
    $this->refreshScope = $refreshScope;
  }
  /**
   * @return string
   */
  public function getRefreshScope()
  {
    return $this->refreshScope;
  }
  /**
   * @param DataSourceRefreshWeeklySchedule
   */
  public function setWeeklySchedule(DataSourceRefreshWeeklySchedule $weeklySchedule)
  {
    $this->weeklySchedule = $weeklySchedule;
  }
  /**
   * @return DataSourceRefreshWeeklySchedule
   */
  public function getWeeklySchedule()
  {
    return $this->weeklySchedule;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DataSourceRefreshSchedule::class, 'Google_Service_Sheets_DataSourceRefreshSchedule');
