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

namespace Google\Service\MyBusinessBusinessCalls;

class HourlyMetrics extends \Google\Model
{
  /**
   * @var int
   */
  public $hour;
  /**
   * @var int
   */
  public $missedCallsCount;

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
  public function setMissedCallsCount($missedCallsCount)
  {
    $this->missedCallsCount = $missedCallsCount;
  }
  /**
   * @return int
   */
  public function getMissedCallsCount()
  {
    return $this->missedCallsCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HourlyMetrics::class, 'Google_Service_MyBusinessBusinessCalls_HourlyMetrics');
