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

class Google_Service_Bigquery_QueryTimelineSample extends Google_Model
{
  public $activeUnits;
  public $completedUnits;
  public $elapsedMs;
  public $pendingUnits;
  public $totalSlotMs;

  public function setActiveUnits($activeUnits)
  {
    $this->activeUnits = $activeUnits;
  }
  public function getActiveUnits()
  {
    return $this->activeUnits;
  }
  public function setCompletedUnits($completedUnits)
  {
    $this->completedUnits = $completedUnits;
  }
  public function getCompletedUnits()
  {
    return $this->completedUnits;
  }
  public function setElapsedMs($elapsedMs)
  {
    $this->elapsedMs = $elapsedMs;
  }
  public function getElapsedMs()
  {
    return $this->elapsedMs;
  }
  public function setPendingUnits($pendingUnits)
  {
    $this->pendingUnits = $pendingUnits;
  }
  public function getPendingUnits()
  {
    return $this->pendingUnits;
  }
  public function setTotalSlotMs($totalSlotMs)
  {
    $this->totalSlotMs = $totalSlotMs;
  }
  public function getTotalSlotMs()
  {
    return $this->totalSlotMs;
  }
}
