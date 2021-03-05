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

class Google_Service_ShoppingContent_DateTime extends Google_Model
{
  public $day;
  public $hours;
  public $minutes;
  public $month;
  public $nanos;
  public $seconds;
  protected $timeZoneType = 'Google_Service_ShoppingContent_TimeZone';
  protected $timeZoneDataType = '';
  public $utcOffset;
  public $year;

  public function setDay($day)
  {
    $this->day = $day;
  }
  public function getDay()
  {
    return $this->day;
  }
  public function setHours($hours)
  {
    $this->hours = $hours;
  }
  public function getHours()
  {
    return $this->hours;
  }
  public function setMinutes($minutes)
  {
    $this->minutes = $minutes;
  }
  public function getMinutes()
  {
    return $this->minutes;
  }
  public function setMonth($month)
  {
    $this->month = $month;
  }
  public function getMonth()
  {
    return $this->month;
  }
  public function setNanos($nanos)
  {
    $this->nanos = $nanos;
  }
  public function getNanos()
  {
    return $this->nanos;
  }
  public function setSeconds($seconds)
  {
    $this->seconds = $seconds;
  }
  public function getSeconds()
  {
    return $this->seconds;
  }
  /**
   * @param Google_Service_ShoppingContent_TimeZone
   */
  public function setTimeZone(Google_Service_ShoppingContent_TimeZone $timeZone)
  {
    $this->timeZone = $timeZone;
  }
  /**
   * @return Google_Service_ShoppingContent_TimeZone
   */
  public function getTimeZone()
  {
    return $this->timeZone;
  }
  public function setUtcOffset($utcOffset)
  {
    $this->utcOffset = $utcOffset;
  }
  public function getUtcOffset()
  {
    return $this->utcOffset;
  }
  public function setYear($year)
  {
    $this->year = $year;
  }
  public function getYear()
  {
    return $this->year;
  }
}
