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

namespace Google\Service\ChromeManagement;

class GoogleChromeManagementV1MemoryStatusReport extends \Google\Model
{
  /**
   * @var int
   */
  public $pageFaults;
  /**
   * @var string
   */
  public $reportTime;
  /**
   * @var string
   */
  public $sampleFrequency;
  /**
   * @var string
   */
  public $systemRamFreeBytes;

  /**
   * @param int
   */
  public function setPageFaults($pageFaults)
  {
    $this->pageFaults = $pageFaults;
  }
  /**
   * @return int
   */
  public function getPageFaults()
  {
    return $this->pageFaults;
  }
  /**
   * @param string
   */
  public function setReportTime($reportTime)
  {
    $this->reportTime = $reportTime;
  }
  /**
   * @return string
   */
  public function getReportTime()
  {
    return $this->reportTime;
  }
  /**
   * @param string
   */
  public function setSampleFrequency($sampleFrequency)
  {
    $this->sampleFrequency = $sampleFrequency;
  }
  /**
   * @return string
   */
  public function getSampleFrequency()
  {
    return $this->sampleFrequency;
  }
  /**
   * @param string
   */
  public function setSystemRamFreeBytes($systemRamFreeBytes)
  {
    $this->systemRamFreeBytes = $systemRamFreeBytes;
  }
  /**
   * @return string
   */
  public function getSystemRamFreeBytes()
  {
    return $this->systemRamFreeBytes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromeManagementV1MemoryStatusReport::class, 'Google_Service_ChromeManagement_GoogleChromeManagementV1MemoryStatusReport');
