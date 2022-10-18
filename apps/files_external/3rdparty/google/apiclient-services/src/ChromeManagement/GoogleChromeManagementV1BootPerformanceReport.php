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

class GoogleChromeManagementV1BootPerformanceReport extends \Google\Model
{
  /**
   * @var string
   */
  public $bootUpDuration;
  /**
   * @var string
   */
  public $bootUpTime;
  /**
   * @var string
   */
  public $reportTime;
  /**
   * @var string
   */
  public $shutdownDuration;
  /**
   * @var string
   */
  public $shutdownReason;
  /**
   * @var string
   */
  public $shutdownTime;

  /**
   * @param string
   */
  public function setBootUpDuration($bootUpDuration)
  {
    $this->bootUpDuration = $bootUpDuration;
  }
  /**
   * @return string
   */
  public function getBootUpDuration()
  {
    return $this->bootUpDuration;
  }
  /**
   * @param string
   */
  public function setBootUpTime($bootUpTime)
  {
    $this->bootUpTime = $bootUpTime;
  }
  /**
   * @return string
   */
  public function getBootUpTime()
  {
    return $this->bootUpTime;
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
  public function setShutdownDuration($shutdownDuration)
  {
    $this->shutdownDuration = $shutdownDuration;
  }
  /**
   * @return string
   */
  public function getShutdownDuration()
  {
    return $this->shutdownDuration;
  }
  /**
   * @param string
   */
  public function setShutdownReason($shutdownReason)
  {
    $this->shutdownReason = $shutdownReason;
  }
  /**
   * @return string
   */
  public function getShutdownReason()
  {
    return $this->shutdownReason;
  }
  /**
   * @param string
   */
  public function setShutdownTime($shutdownTime)
  {
    $this->shutdownTime = $shutdownTime;
  }
  /**
   * @return string
   */
  public function getShutdownTime()
  {
    return $this->shutdownTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromeManagementV1BootPerformanceReport::class, 'Google_Service_ChromeManagement_GoogleChromeManagementV1BootPerformanceReport');
