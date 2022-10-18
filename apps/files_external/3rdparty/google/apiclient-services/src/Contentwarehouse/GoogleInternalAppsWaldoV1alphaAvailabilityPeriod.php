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

class GoogleInternalAppsWaldoV1alphaAvailabilityPeriod extends \Google\Model
{
  /**
   * @var int
   */
  public $dayOfWeek;
  /**
   * @var int
   */
  public $periodEndMinutes;
  /**
   * @var int
   */
  public $periodStartMinutes;

  /**
   * @param int
   */
  public function setDayOfWeek($dayOfWeek)
  {
    $this->dayOfWeek = $dayOfWeek;
  }
  /**
   * @return int
   */
  public function getDayOfWeek()
  {
    return $this->dayOfWeek;
  }
  /**
   * @param int
   */
  public function setPeriodEndMinutes($periodEndMinutes)
  {
    $this->periodEndMinutes = $periodEndMinutes;
  }
  /**
   * @return int
   */
  public function getPeriodEndMinutes()
  {
    return $this->periodEndMinutes;
  }
  /**
   * @param int
   */
  public function setPeriodStartMinutes($periodStartMinutes)
  {
    $this->periodStartMinutes = $periodStartMinutes;
  }
  /**
   * @return int
   */
  public function getPeriodStartMinutes()
  {
    return $this->periodStartMinutes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleInternalAppsWaldoV1alphaAvailabilityPeriod::class, 'Google_Service_Contentwarehouse_GoogleInternalAppsWaldoV1alphaAvailabilityPeriod');
