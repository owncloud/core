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

namespace Google\Service\Bigquery;

class QueryTimelineSample extends \Google\Model
{
  /**
   * @var string
   */
  public $activeUnits;
  /**
   * @var string
   */
  public $completedUnits;
  /**
   * @var string
   */
  public $elapsedMs;
  /**
   * @var string
   */
  public $estimatedRunnableUnits;
  /**
   * @var string
   */
  public $pendingUnits;
  /**
   * @var string
   */
  public $totalSlotMs;

  /**
   * @param string
   */
  public function setActiveUnits($activeUnits)
  {
    $this->activeUnits = $activeUnits;
  }
  /**
   * @return string
   */
  public function getActiveUnits()
  {
    return $this->activeUnits;
  }
  /**
   * @param string
   */
  public function setCompletedUnits($completedUnits)
  {
    $this->completedUnits = $completedUnits;
  }
  /**
   * @return string
   */
  public function getCompletedUnits()
  {
    return $this->completedUnits;
  }
  /**
   * @param string
   */
  public function setElapsedMs($elapsedMs)
  {
    $this->elapsedMs = $elapsedMs;
  }
  /**
   * @return string
   */
  public function getElapsedMs()
  {
    return $this->elapsedMs;
  }
  /**
   * @param string
   */
  public function setEstimatedRunnableUnits($estimatedRunnableUnits)
  {
    $this->estimatedRunnableUnits = $estimatedRunnableUnits;
  }
  /**
   * @return string
   */
  public function getEstimatedRunnableUnits()
  {
    return $this->estimatedRunnableUnits;
  }
  /**
   * @param string
   */
  public function setPendingUnits($pendingUnits)
  {
    $this->pendingUnits = $pendingUnits;
  }
  /**
   * @return string
   */
  public function getPendingUnits()
  {
    return $this->pendingUnits;
  }
  /**
   * @param string
   */
  public function setTotalSlotMs($totalSlotMs)
  {
    $this->totalSlotMs = $totalSlotMs;
  }
  /**
   * @return string
   */
  public function getTotalSlotMs()
  {
    return $this->totalSlotMs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QueryTimelineSample::class, 'Google_Service_Bigquery_QueryTimelineSample');
