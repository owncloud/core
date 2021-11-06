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

namespace Google\Service\PolicySimulator;

class GoogleCloudPolicysimulatorV1ReplayResultsSummary extends \Google\Model
{
  public $differenceCount;
  public $errorCount;
  public $logCount;
  protected $newestDateType = GoogleTypeDate::class;
  protected $newestDateDataType = '';
  protected $oldestDateType = GoogleTypeDate::class;
  protected $oldestDateDataType = '';
  public $unchangedCount;

  public function setDifferenceCount($differenceCount)
  {
    $this->differenceCount = $differenceCount;
  }
  public function getDifferenceCount()
  {
    return $this->differenceCount;
  }
  public function setErrorCount($errorCount)
  {
    $this->errorCount = $errorCount;
  }
  public function getErrorCount()
  {
    return $this->errorCount;
  }
  public function setLogCount($logCount)
  {
    $this->logCount = $logCount;
  }
  public function getLogCount()
  {
    return $this->logCount;
  }
  /**
   * @param GoogleTypeDate
   */
  public function setNewestDate(GoogleTypeDate $newestDate)
  {
    $this->newestDate = $newestDate;
  }
  /**
   * @return GoogleTypeDate
   */
  public function getNewestDate()
  {
    return $this->newestDate;
  }
  /**
   * @param GoogleTypeDate
   */
  public function setOldestDate(GoogleTypeDate $oldestDate)
  {
    $this->oldestDate = $oldestDate;
  }
  /**
   * @return GoogleTypeDate
   */
  public function getOldestDate()
  {
    return $this->oldestDate;
  }
  public function setUnchangedCount($unchangedCount)
  {
    $this->unchangedCount = $unchangedCount;
  }
  public function getUnchangedCount()
  {
    return $this->unchangedCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudPolicysimulatorV1ReplayResultsSummary::class, 'Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1ReplayResultsSummary');
