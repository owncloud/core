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

namespace Google\Service\Dfareporting;

class ReportSchedule extends \Google\Collection
{
  protected $collection_key = 'repeatsOnWeekDays';
  /**
   * @var bool
   */
  public $active;
  /**
   * @var int
   */
  public $every;
  /**
   * @var string
   */
  public $expirationDate;
  /**
   * @var string
   */
  public $repeats;
  /**
   * @var string[]
   */
  public $repeatsOnWeekDays;
  /**
   * @var string
   */
  public $runsOnDayOfMonth;
  /**
   * @var string
   */
  public $startDate;

  /**
   * @param bool
   */
  public function setActive($active)
  {
    $this->active = $active;
  }
  /**
   * @return bool
   */
  public function getActive()
  {
    return $this->active;
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
   * @param string
   */
  public function setExpirationDate($expirationDate)
  {
    $this->expirationDate = $expirationDate;
  }
  /**
   * @return string
   */
  public function getExpirationDate()
  {
    return $this->expirationDate;
  }
  /**
   * @param string
   */
  public function setRepeats($repeats)
  {
    $this->repeats = $repeats;
  }
  /**
   * @return string
   */
  public function getRepeats()
  {
    return $this->repeats;
  }
  /**
   * @param string[]
   */
  public function setRepeatsOnWeekDays($repeatsOnWeekDays)
  {
    $this->repeatsOnWeekDays = $repeatsOnWeekDays;
  }
  /**
   * @return string[]
   */
  public function getRepeatsOnWeekDays()
  {
    return $this->repeatsOnWeekDays;
  }
  /**
   * @param string
   */
  public function setRunsOnDayOfMonth($runsOnDayOfMonth)
  {
    $this->runsOnDayOfMonth = $runsOnDayOfMonth;
  }
  /**
   * @return string
   */
  public function getRunsOnDayOfMonth()
  {
    return $this->runsOnDayOfMonth;
  }
  /**
   * @param string
   */
  public function setStartDate($startDate)
  {
    $this->startDate = $startDate;
  }
  /**
   * @return string
   */
  public function getStartDate()
  {
    return $this->startDate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReportSchedule::class, 'Google_Service_Dfareporting_ReportSchedule');
