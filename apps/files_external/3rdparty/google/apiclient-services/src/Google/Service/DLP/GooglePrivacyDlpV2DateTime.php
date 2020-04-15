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

class Google_Service_DLP_GooglePrivacyDlpV2DateTime extends Google_Model
{
  protected $dateType = 'Google_Service_DLP_GoogleTypeDate';
  protected $dateDataType = '';
  public $dayOfWeek;
  protected $timeType = 'Google_Service_DLP_GoogleTypeTimeOfDay';
  protected $timeDataType = '';
  protected $timeZoneType = 'Google_Service_DLP_GooglePrivacyDlpV2TimeZone';
  protected $timeZoneDataType = '';

  /**
   * @param Google_Service_DLP_GoogleTypeDate
   */
  public function setDate(Google_Service_DLP_GoogleTypeDate $date)
  {
    $this->date = $date;
  }
  /**
   * @return Google_Service_DLP_GoogleTypeDate
   */
  public function getDate()
  {
    return $this->date;
  }
  public function setDayOfWeek($dayOfWeek)
  {
    $this->dayOfWeek = $dayOfWeek;
  }
  public function getDayOfWeek()
  {
    return $this->dayOfWeek;
  }
  /**
   * @param Google_Service_DLP_GoogleTypeTimeOfDay
   */
  public function setTime(Google_Service_DLP_GoogleTypeTimeOfDay $time)
  {
    $this->time = $time;
  }
  /**
   * @return Google_Service_DLP_GoogleTypeTimeOfDay
   */
  public function getTime()
  {
    return $this->time;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2TimeZone
   */
  public function setTimeZone(Google_Service_DLP_GooglePrivacyDlpV2TimeZone $timeZone)
  {
    $this->timeZone = $timeZone;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2TimeZone
   */
  public function getTimeZone()
  {
    return $this->timeZone;
  }
}
