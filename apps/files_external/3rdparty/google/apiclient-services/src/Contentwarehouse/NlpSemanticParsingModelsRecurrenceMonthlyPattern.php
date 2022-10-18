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

class NlpSemanticParsingModelsRecurrenceMonthlyPattern extends \Google\Collection
{
  protected $collection_key = 'monthDay';
  /**
   * @var bool
   */
  public $lastDay;
  /**
   * @var bool
   */
  public $lastWeek;
  /**
   * @var int[]
   */
  public $monthDay;
  /**
   * @var string
   */
  public $weekDay;
  /**
   * @var int
   */
  public $weekDayNumber;

  /**
   * @param bool
   */
  public function setLastDay($lastDay)
  {
    $this->lastDay = $lastDay;
  }
  /**
   * @return bool
   */
  public function getLastDay()
  {
    return $this->lastDay;
  }
  /**
   * @param bool
   */
  public function setLastWeek($lastWeek)
  {
    $this->lastWeek = $lastWeek;
  }
  /**
   * @return bool
   */
  public function getLastWeek()
  {
    return $this->lastWeek;
  }
  /**
   * @param int[]
   */
  public function setMonthDay($monthDay)
  {
    $this->monthDay = $monthDay;
  }
  /**
   * @return int[]
   */
  public function getMonthDay()
  {
    return $this->monthDay;
  }
  /**
   * @param string
   */
  public function setWeekDay($weekDay)
  {
    $this->weekDay = $weekDay;
  }
  /**
   * @return string
   */
  public function getWeekDay()
  {
    return $this->weekDay;
  }
  /**
   * @param int
   */
  public function setWeekDayNumber($weekDayNumber)
  {
    $this->weekDayNumber = $weekDayNumber;
  }
  /**
   * @return int
   */
  public function getWeekDayNumber()
  {
    return $this->weekDayNumber;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingModelsRecurrenceMonthlyPattern::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsRecurrenceMonthlyPattern');
