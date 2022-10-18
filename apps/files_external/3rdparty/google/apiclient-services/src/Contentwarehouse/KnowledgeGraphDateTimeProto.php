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

class KnowledgeGraphDateTimeProto extends \Google\Model
{
  /**
   * @var int
   */
  public $days;
  /**
   * @var int
   */
  public $hours;
  /**
   * @var int
   */
  public $microseconds;
  /**
   * @var int
   */
  public $minutes;
  /**
   * @var int
   */
  public $months;
  /**
   * @var int
   */
  public $seconds;
  /**
   * @var string
   */
  public $tzOffset;
  /**
   * @var int
   */
  public $years;

  /**
   * @param int
   */
  public function setDays($days)
  {
    $this->days = $days;
  }
  /**
   * @return int
   */
  public function getDays()
  {
    return $this->days;
  }
  /**
   * @param int
   */
  public function setHours($hours)
  {
    $this->hours = $hours;
  }
  /**
   * @return int
   */
  public function getHours()
  {
    return $this->hours;
  }
  /**
   * @param int
   */
  public function setMicroseconds($microseconds)
  {
    $this->microseconds = $microseconds;
  }
  /**
   * @return int
   */
  public function getMicroseconds()
  {
    return $this->microseconds;
  }
  /**
   * @param int
   */
  public function setMinutes($minutes)
  {
    $this->minutes = $minutes;
  }
  /**
   * @return int
   */
  public function getMinutes()
  {
    return $this->minutes;
  }
  /**
   * @param int
   */
  public function setMonths($months)
  {
    $this->months = $months;
  }
  /**
   * @return int
   */
  public function getMonths()
  {
    return $this->months;
  }
  /**
   * @param int
   */
  public function setSeconds($seconds)
  {
    $this->seconds = $seconds;
  }
  /**
   * @return int
   */
  public function getSeconds()
  {
    return $this->seconds;
  }
  /**
   * @param string
   */
  public function setTzOffset($tzOffset)
  {
    $this->tzOffset = $tzOffset;
  }
  /**
   * @return string
   */
  public function getTzOffset()
  {
    return $this->tzOffset;
  }
  /**
   * @param int
   */
  public function setYears($years)
  {
    $this->years = $years;
  }
  /**
   * @return int
   */
  public function getYears()
  {
    return $this->years;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeGraphDateTimeProto::class, 'Google_Service_Contentwarehouse_KnowledgeGraphDateTimeProto');
