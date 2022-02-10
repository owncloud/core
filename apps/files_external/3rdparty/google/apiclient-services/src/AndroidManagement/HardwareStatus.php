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

namespace Google\Service\AndroidManagement;

class HardwareStatus extends \Google\Collection
{
  protected $collection_key = 'skinTemperatures';
  /**
   * @var float[]
   */
  public $batteryTemperatures;
  /**
   * @var float[]
   */
  public $cpuTemperatures;
  /**
   * @var float[]
   */
  public $cpuUsages;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var float[]
   */
  public $fanSpeeds;
  /**
   * @var float[]
   */
  public $gpuTemperatures;
  /**
   * @var float[]
   */
  public $skinTemperatures;

  /**
   * @param float[]
   */
  public function setBatteryTemperatures($batteryTemperatures)
  {
    $this->batteryTemperatures = $batteryTemperatures;
  }
  /**
   * @return float[]
   */
  public function getBatteryTemperatures()
  {
    return $this->batteryTemperatures;
  }
  /**
   * @param float[]
   */
  public function setCpuTemperatures($cpuTemperatures)
  {
    $this->cpuTemperatures = $cpuTemperatures;
  }
  /**
   * @return float[]
   */
  public function getCpuTemperatures()
  {
    return $this->cpuTemperatures;
  }
  /**
   * @param float[]
   */
  public function setCpuUsages($cpuUsages)
  {
    $this->cpuUsages = $cpuUsages;
  }
  /**
   * @return float[]
   */
  public function getCpuUsages()
  {
    return $this->cpuUsages;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param float[]
   */
  public function setFanSpeeds($fanSpeeds)
  {
    $this->fanSpeeds = $fanSpeeds;
  }
  /**
   * @return float[]
   */
  public function getFanSpeeds()
  {
    return $this->fanSpeeds;
  }
  /**
   * @param float[]
   */
  public function setGpuTemperatures($gpuTemperatures)
  {
    $this->gpuTemperatures = $gpuTemperatures;
  }
  /**
   * @return float[]
   */
  public function getGpuTemperatures()
  {
    return $this->gpuTemperatures;
  }
  /**
   * @param float[]
   */
  public function setSkinTemperatures($skinTemperatures)
  {
    $this->skinTemperatures = $skinTemperatures;
  }
  /**
   * @return float[]
   */
  public function getSkinTemperatures()
  {
    return $this->skinTemperatures;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HardwareStatus::class, 'Google_Service_AndroidManagement_HardwareStatus');
