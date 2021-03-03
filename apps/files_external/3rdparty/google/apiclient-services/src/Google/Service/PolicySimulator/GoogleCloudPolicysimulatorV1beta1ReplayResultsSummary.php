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

class Google_Service_PolicySimulator_GoogleCloudPolicysimulatorV1beta1ReplayResultsSummary extends Google_Model
{
  public $differenceCount;
  public $errorCount;
  public $logCount;
  protected $newestDateType = 'Google_Service_PolicySimulator_GoogleTypeDate';
  protected $newestDateDataType = '';
  protected $oldestDateType = 'Google_Service_PolicySimulator_GoogleTypeDate';
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
   * @param Google_Service_PolicySimulator_GoogleTypeDate
   */
  public function setNewestDate(Google_Service_PolicySimulator_GoogleTypeDate $newestDate)
  {
    $this->newestDate = $newestDate;
  }
  /**
   * @return Google_Service_PolicySimulator_GoogleTypeDate
   */
  public function getNewestDate()
  {
    return $this->newestDate;
  }
  /**
   * @param Google_Service_PolicySimulator_GoogleTypeDate
   */
  public function setOldestDate(Google_Service_PolicySimulator_GoogleTypeDate $oldestDate)
  {
    $this->oldestDate = $oldestDate;
  }
  /**
   * @return Google_Service_PolicySimulator_GoogleTypeDate
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
