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

class GoogleChromeManagementV1BatterySampleReport extends \Google\Model
{
  /**
   * @var int
   */
  public $chargeRate;
  /**
   * @var string
   */
  public $current;
  /**
   * @var int
   */
  public $dischargeRate;
  /**
   * @var string
   */
  public $remainingCapacity;
  /**
   * @var string
   */
  public $reportTime;
  /**
   * @var string
   */
  public $status;
  /**
   * @var int
   */
  public $temperature;
  /**
   * @var string
   */
  public $voltage;

  /**
   * @param int
   */
  public function setChargeRate($chargeRate)
  {
    $this->chargeRate = $chargeRate;
  }
  /**
   * @return int
   */
  public function getChargeRate()
  {
    return $this->chargeRate;
  }
  /**
   * @param string
   */
  public function setCurrent($current)
  {
    $this->current = $current;
  }
  /**
   * @return string
   */
  public function getCurrent()
  {
    return $this->current;
  }
  /**
   * @param int
   */
  public function setDischargeRate($dischargeRate)
  {
    $this->dischargeRate = $dischargeRate;
  }
  /**
   * @return int
   */
  public function getDischargeRate()
  {
    return $this->dischargeRate;
  }
  /**
   * @param string
   */
  public function setRemainingCapacity($remainingCapacity)
  {
    $this->remainingCapacity = $remainingCapacity;
  }
  /**
   * @return string
   */
  public function getRemainingCapacity()
  {
    return $this->remainingCapacity;
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
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param int
   */
  public function setTemperature($temperature)
  {
    $this->temperature = $temperature;
  }
  /**
   * @return int
   */
  public function getTemperature()
  {
    return $this->temperature;
  }
  /**
   * @param string
   */
  public function setVoltage($voltage)
  {
    $this->voltage = $voltage;
  }
  /**
   * @return string
   */
  public function getVoltage()
  {
    return $this->voltage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromeManagementV1BatterySampleReport::class, 'Google_Service_ChromeManagement_GoogleChromeManagementV1BatterySampleReport');
