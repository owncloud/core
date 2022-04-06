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

class GoogleChromeManagementV1AudioStatusReport extends \Google\Model
{
  /**
   * @var string
   */
  public $inputDevice;
  /**
   * @var int
   */
  public $inputGain;
  /**
   * @var bool
   */
  public $inputMute;
  /**
   * @var string
   */
  public $outputDevice;
  /**
   * @var bool
   */
  public $outputMute;
  /**
   * @var int
   */
  public $outputVolume;
  /**
   * @var string
   */
  public $reportTime;

  /**
   * @param string
   */
  public function setInputDevice($inputDevice)
  {
    $this->inputDevice = $inputDevice;
  }
  /**
   * @return string
   */
  public function getInputDevice()
  {
    return $this->inputDevice;
  }
  /**
   * @param int
   */
  public function setInputGain($inputGain)
  {
    $this->inputGain = $inputGain;
  }
  /**
   * @return int
   */
  public function getInputGain()
  {
    return $this->inputGain;
  }
  /**
   * @param bool
   */
  public function setInputMute($inputMute)
  {
    $this->inputMute = $inputMute;
  }
  /**
   * @return bool
   */
  public function getInputMute()
  {
    return $this->inputMute;
  }
  /**
   * @param string
   */
  public function setOutputDevice($outputDevice)
  {
    $this->outputDevice = $outputDevice;
  }
  /**
   * @return string
   */
  public function getOutputDevice()
  {
    return $this->outputDevice;
  }
  /**
   * @param bool
   */
  public function setOutputMute($outputMute)
  {
    $this->outputMute = $outputMute;
  }
  /**
   * @return bool
   */
  public function getOutputMute()
  {
    return $this->outputMute;
  }
  /**
   * @param int
   */
  public function setOutputVolume($outputVolume)
  {
    $this->outputVolume = $outputVolume;
  }
  /**
   * @return int
   */
  public function getOutputVolume()
  {
    return $this->outputVolume;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromeManagementV1AudioStatusReport::class, 'Google_Service_ChromeManagement_GoogleChromeManagementV1AudioStatusReport');
