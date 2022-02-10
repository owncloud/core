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

namespace Google\Service\DoubleClickBidManager;

class QuerySchedule extends \Google\Model
{
  /**
   * @var string
   */
  public $endTimeMs;
  /**
   * @var string
   */
  public $frequency;
  /**
   * @var int
   */
  public $nextRunMinuteOfDay;
  /**
   * @var string
   */
  public $nextRunTimezoneCode;
  /**
   * @var string
   */
  public $startTimeMs;

  /**
   * @param string
   */
  public function setEndTimeMs($endTimeMs)
  {
    $this->endTimeMs = $endTimeMs;
  }
  /**
   * @return string
   */
  public function getEndTimeMs()
  {
    return $this->endTimeMs;
  }
  /**
   * @param string
   */
  public function setFrequency($frequency)
  {
    $this->frequency = $frequency;
  }
  /**
   * @return string
   */
  public function getFrequency()
  {
    return $this->frequency;
  }
  /**
   * @param int
   */
  public function setNextRunMinuteOfDay($nextRunMinuteOfDay)
  {
    $this->nextRunMinuteOfDay = $nextRunMinuteOfDay;
  }
  /**
   * @return int
   */
  public function getNextRunMinuteOfDay()
  {
    return $this->nextRunMinuteOfDay;
  }
  /**
   * @param string
   */
  public function setNextRunTimezoneCode($nextRunTimezoneCode)
  {
    $this->nextRunTimezoneCode = $nextRunTimezoneCode;
  }
  /**
   * @return string
   */
  public function getNextRunTimezoneCode()
  {
    return $this->nextRunTimezoneCode;
  }
  /**
   * @param string
   */
  public function setStartTimeMs($startTimeMs)
  {
    $this->startTimeMs = $startTimeMs;
  }
  /**
   * @return string
   */
  public function getStartTimeMs()
  {
    return $this->startTimeMs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QuerySchedule::class, 'Google_Service_DoubleClickBidManager_QuerySchedule');
