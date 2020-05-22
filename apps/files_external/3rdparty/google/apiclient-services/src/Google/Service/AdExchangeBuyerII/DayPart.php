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

class Google_Service_AdExchangeBuyerII_DayPart extends Google_Model
{
  public $dayOfWeek;
  protected $endTimeType = 'Google_Service_AdExchangeBuyerII_TimeOfDay';
  protected $endTimeDataType = '';
  protected $startTimeType = 'Google_Service_AdExchangeBuyerII_TimeOfDay';
  protected $startTimeDataType = '';

  public function setDayOfWeek($dayOfWeek)
  {
    $this->dayOfWeek = $dayOfWeek;
  }
  public function getDayOfWeek()
  {
    return $this->dayOfWeek;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_TimeOfDay
   */
  public function setEndTime(Google_Service_AdExchangeBuyerII_TimeOfDay $endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_TimeOfDay
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_TimeOfDay
   */
  public function setStartTime(Google_Service_AdExchangeBuyerII_TimeOfDay $startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_TimeOfDay
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
}
