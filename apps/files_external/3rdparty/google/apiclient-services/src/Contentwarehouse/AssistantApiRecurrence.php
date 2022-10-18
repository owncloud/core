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

class AssistantApiRecurrence extends \Google\Collection
{
  protected $collection_key = 'weekOfMonth';
  protected $beginType = AssistantApiDate::class;
  protected $beginDataType = '';
  protected $blacklistedRangesType = AssistantApiRecurrenceDatetimeRange::class;
  protected $blacklistedRangesDataType = 'array';
  /**
   * @var int[]
   */
  public $dayOfMonth;
  /**
   * @var int[]
   */
  public $dayOfWeek;
  protected $endType = AssistantApiDate::class;
  protected $endDataType = '';
  /**
   * @var int
   */
  public $every;
  /**
   * @var int[]
   */
  public $monthOfYear;
  /**
   * @var int
   */
  public $numOccurrences;
  /**
   * @var int[]
   */
  public $weekOfMonth;

  /**
   * @param AssistantApiDate
   */
  public function setBegin(AssistantApiDate $begin)
  {
    $this->begin = $begin;
  }
  /**
   * @return AssistantApiDate
   */
  public function getBegin()
  {
    return $this->begin;
  }
  /**
   * @param AssistantApiRecurrenceDatetimeRange[]
   */
  public function setBlacklistedRanges($blacklistedRanges)
  {
    $this->blacklistedRanges = $blacklistedRanges;
  }
  /**
   * @return AssistantApiRecurrenceDatetimeRange[]
   */
  public function getBlacklistedRanges()
  {
    return $this->blacklistedRanges;
  }
  /**
   * @param int[]
   */
  public function setDayOfMonth($dayOfMonth)
  {
    $this->dayOfMonth = $dayOfMonth;
  }
  /**
   * @return int[]
   */
  public function getDayOfMonth()
  {
    return $this->dayOfMonth;
  }
  /**
   * @param int[]
   */
  public function setDayOfWeek($dayOfWeek)
  {
    $this->dayOfWeek = $dayOfWeek;
  }
  /**
   * @return int[]
   */
  public function getDayOfWeek()
  {
    return $this->dayOfWeek;
  }
  /**
   * @param AssistantApiDate
   */
  public function setEnd(AssistantApiDate $end)
  {
    $this->end = $end;
  }
  /**
   * @return AssistantApiDate
   */
  public function getEnd()
  {
    return $this->end;
  }
  /**
   * @param int
   */
  public function setEvery($every)
  {
    $this->every = $every;
  }
  /**
   * @return int
   */
  public function getEvery()
  {
    return $this->every;
  }
  /**
   * @param int[]
   */
  public function setMonthOfYear($monthOfYear)
  {
    $this->monthOfYear = $monthOfYear;
  }
  /**
   * @return int[]
   */
  public function getMonthOfYear()
  {
    return $this->monthOfYear;
  }
  /**
   * @param int
   */
  public function setNumOccurrences($numOccurrences)
  {
    $this->numOccurrences = $numOccurrences;
  }
  /**
   * @return int
   */
  public function getNumOccurrences()
  {
    return $this->numOccurrences;
  }
  /**
   * @param int[]
   */
  public function setWeekOfMonth($weekOfMonth)
  {
    $this->weekOfMonth = $weekOfMonth;
  }
  /**
   * @return int[]
   */
  public function getWeekOfMonth()
  {
    return $this->weekOfMonth;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiRecurrence::class, 'Google_Service_Contentwarehouse_AssistantApiRecurrence');
