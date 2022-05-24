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

namespace Google\Service\ShoppingContent;

class DatafeedFetchSchedule extends \Google\Model
{
  /**
   * @var string
   */
  public $dayOfMonth;
  /**
   * @var string
   */
  public $fetchUrl;
  /**
   * @var string
   */
  public $hour;
  /**
   * @var string
   */
  public $minuteOfHour;
  /**
   * @var string
   */
  public $password;
  /**
   * @var bool
   */
  public $paused;
  /**
   * @var string
   */
  public $timeZone;
  /**
   * @var string
   */
  public $username;
  /**
   * @var string
   */
  public $weekday;

  /**
   * @param string
   */
  public function setDayOfMonth($dayOfMonth)
  {
    $this->dayOfMonth = $dayOfMonth;
  }
  /**
   * @return string
   */
  public function getDayOfMonth()
  {
    return $this->dayOfMonth;
  }
  /**
   * @param string
   */
  public function setFetchUrl($fetchUrl)
  {
    $this->fetchUrl = $fetchUrl;
  }
  /**
   * @return string
   */
  public function getFetchUrl()
  {
    return $this->fetchUrl;
  }
  /**
   * @param string
   */
  public function setHour($hour)
  {
    $this->hour = $hour;
  }
  /**
   * @return string
   */
  public function getHour()
  {
    return $this->hour;
  }
  /**
   * @param string
   */
  public function setMinuteOfHour($minuteOfHour)
  {
    $this->minuteOfHour = $minuteOfHour;
  }
  /**
   * @return string
   */
  public function getMinuteOfHour()
  {
    return $this->minuteOfHour;
  }
  /**
   * @param string
   */
  public function setPassword($password)
  {
    $this->password = $password;
  }
  /**
   * @return string
   */
  public function getPassword()
  {
    return $this->password;
  }
  /**
   * @param bool
   */
  public function setPaused($paused)
  {
    $this->paused = $paused;
  }
  /**
   * @return bool
   */
  public function getPaused()
  {
    return $this->paused;
  }
  /**
   * @param string
   */
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  /**
   * @return string
   */
  public function getTimeZone()
  {
    return $this->timeZone;
  }
  /**
   * @param string
   */
  public function setUsername($username)
  {
    $this->username = $username;
  }
  /**
   * @return string
   */
  public function getUsername()
  {
    return $this->username;
  }
  /**
   * @param string
   */
  public function setWeekday($weekday)
  {
    $this->weekday = $weekday;
  }
  /**
   * @return string
   */
  public function getWeekday()
  {
    return $this->weekday;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DatafeedFetchSchedule::class, 'Google_Service_ShoppingContent_DatafeedFetchSchedule');
