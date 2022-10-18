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

namespace Google\Service\Contentwarehouse;

class GeostoreTimeEndpointProto extends \Google\Model
{
  /**
   * @var int
   */
  public $day;
  /**
   * @var string
   */
  public $dayType;
  /**
   * @var int
   */
  public $hour;
  /**
   * @var int
   */
  public $minute;
  /**
   * @var string
   */
  public $month;
  /**
   * @var int
   */
  public $second;
  /**
   * @var int
   */
  public $week;
  /**
   * @var string
   */
  public $weekType;
  /**
   * @var int
   */
  public $year;

  /**
   * @param int
   */
  public function setDay($day)
  {
    $this->day = $day;
  }
  /**
   * @return int
   */
  public function getDay()
  {
    return $this->day;
  }
  /**
   * @param string
   */
  public function setDayType($dayType)
  {
    $this->dayType = $dayType;
  }
  /**
   * @return string
   */
  public function getDayType()
  {
    return $this->dayType;
  }
  /**
   * @param int
   */
  public function setHour($hour)
  {
    $this->hour = $hour;
  }
  /**
   * @return int
   */
  public function getHour()
  {
    return $this->hour;
  }
  /**
   * @param int
   */
  public function setMinute($minute)
  {
    $this->minute = $minute;
  }
  /**
   * @return int
   */
  public function getMinute()
  {
    return $this->minute;
  }
  /**
   * @param string
   */
  public function setMonth($month)
  {
    $this->month = $month;
  }
  /**
   * @return string
   */
  public function getMonth()
  {
    return $this->month;
  }
  /**
   * @param int
   */
  public function setSecond($second)
  {
    $this->second = $second;
  }
  /**
   * @return int
   */
  public function getSecond()
  {
    return $this->second;
  }
  /**
   * @param int
   */
  public function setWeek($week)
  {
    $this->week = $week;
  }
  /**
   * @return int
   */
  public function getWeek()
  {
    return $this->week;
  }
  /**
   * @param string
   */
  public function setWeekType($weekType)
  {
    $this->weekType = $weekType;
  }
  /**
   * @return string
   */
  public function getWeekType()
  {
    return $this->weekType;
  }
  /**
   * @param int
   */
  public function setYear($year)
  {
    $this->year = $year;
  }
  /**
   * @return int
   */
  public function getYear()
  {
    return $this->year;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeostoreTimeEndpointProto::class, 'Google_Service_Contentwarehouse_GeostoreTimeEndpointProto');
