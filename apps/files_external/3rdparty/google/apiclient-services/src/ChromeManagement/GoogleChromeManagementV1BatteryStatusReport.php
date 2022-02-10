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

class GoogleChromeManagementV1BatteryStatusReport extends \Google\Collection
{
  protected $collection_key = 'sample';
  /**
   * @var string
   */
  public $batteryHealth;
  /**
   * @var int
   */
  public $cycleCount;
  /**
   * @var string
   */
  public $fullChargeCapacity;
  /**
   * @var string
   */
  public $reportTime;
  protected $sampleType = GoogleChromeManagementV1BatterySampleReport::class;
  protected $sampleDataType = 'array';
  /**
   * @var string
   */
  public $serialNumber;

  /**
   * @param string
   */
  public function setBatteryHealth($batteryHealth)
  {
    $this->batteryHealth = $batteryHealth;
  }
  /**
   * @return string
   */
  public function getBatteryHealth()
  {
    return $this->batteryHealth;
  }
  /**
   * @param int
   */
  public function setCycleCount($cycleCount)
  {
    $this->cycleCount = $cycleCount;
  }
  /**
   * @return int
   */
  public function getCycleCount()
  {
    return $this->cycleCount;
  }
  /**
   * @param string
   */
  public function setFullChargeCapacity($fullChargeCapacity)
  {
    $this->fullChargeCapacity = $fullChargeCapacity;
  }
  /**
   * @return string
   */
  public function getFullChargeCapacity()
  {
    return $this->fullChargeCapacity;
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
   * @param GoogleChromeManagementV1BatterySampleReport[]
   */
  public function setSample($sample)
  {
    $this->sample = $sample;
  }
  /**
   * @return GoogleChromeManagementV1BatterySampleReport[]
   */
  public function getSample()
  {
    return $this->sample;
  }
  /**
   * @param string
   */
  public function setSerialNumber($serialNumber)
  {
    $this->serialNumber = $serialNumber;
  }
  /**
   * @return string
   */
  public function getSerialNumber()
  {
    return $this->serialNumber;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromeManagementV1BatteryStatusReport::class, 'Google_Service_ChromeManagement_GoogleChromeManagementV1BatteryStatusReport');
