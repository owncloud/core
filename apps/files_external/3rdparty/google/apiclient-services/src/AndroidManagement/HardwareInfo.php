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

class HardwareInfo extends \Google\Collection
{
  protected $collection_key = 'skinThrottlingTemperatures';
  /**
   * @var float[]
   */
  public $batteryShutdownTemperatures;
  /**
   * @var float[]
   */
  public $batteryThrottlingTemperatures;
  /**
   * @var string
   */
  public $brand;
  /**
   * @var float[]
   */
  public $cpuShutdownTemperatures;
  /**
   * @var float[]
   */
  public $cpuThrottlingTemperatures;
  /**
   * @var string
   */
  public $deviceBasebandVersion;
  /**
   * @var string
   */
  public $enterpriseSpecificId;
  /**
   * @var float[]
   */
  public $gpuShutdownTemperatures;
  /**
   * @var float[]
   */
  public $gpuThrottlingTemperatures;
  /**
   * @var string
   */
  public $hardware;
  /**
   * @var string
   */
  public $manufacturer;
  /**
   * @var string
   */
  public $model;
  /**
   * @var string
   */
  public $serialNumber;
  /**
   * @var float[]
   */
  public $skinShutdownTemperatures;
  /**
   * @var float[]
   */
  public $skinThrottlingTemperatures;

  /**
   * @param float[]
   */
  public function setBatteryShutdownTemperatures($batteryShutdownTemperatures)
  {
    $this->batteryShutdownTemperatures = $batteryShutdownTemperatures;
  }
  /**
   * @return float[]
   */
  public function getBatteryShutdownTemperatures()
  {
    return $this->batteryShutdownTemperatures;
  }
  /**
   * @param float[]
   */
  public function setBatteryThrottlingTemperatures($batteryThrottlingTemperatures)
  {
    $this->batteryThrottlingTemperatures = $batteryThrottlingTemperatures;
  }
  /**
   * @return float[]
   */
  public function getBatteryThrottlingTemperatures()
  {
    return $this->batteryThrottlingTemperatures;
  }
  /**
   * @param string
   */
  public function setBrand($brand)
  {
    $this->brand = $brand;
  }
  /**
   * @return string
   */
  public function getBrand()
  {
    return $this->brand;
  }
  /**
   * @param float[]
   */
  public function setCpuShutdownTemperatures($cpuShutdownTemperatures)
  {
    $this->cpuShutdownTemperatures = $cpuShutdownTemperatures;
  }
  /**
   * @return float[]
   */
  public function getCpuShutdownTemperatures()
  {
    return $this->cpuShutdownTemperatures;
  }
  /**
   * @param float[]
   */
  public function setCpuThrottlingTemperatures($cpuThrottlingTemperatures)
  {
    $this->cpuThrottlingTemperatures = $cpuThrottlingTemperatures;
  }
  /**
   * @return float[]
   */
  public function getCpuThrottlingTemperatures()
  {
    return $this->cpuThrottlingTemperatures;
  }
  /**
   * @param string
   */
  public function setDeviceBasebandVersion($deviceBasebandVersion)
  {
    $this->deviceBasebandVersion = $deviceBasebandVersion;
  }
  /**
   * @return string
   */
  public function getDeviceBasebandVersion()
  {
    return $this->deviceBasebandVersion;
  }
  /**
   * @param string
   */
  public function setEnterpriseSpecificId($enterpriseSpecificId)
  {
    $this->enterpriseSpecificId = $enterpriseSpecificId;
  }
  /**
   * @return string
   */
  public function getEnterpriseSpecificId()
  {
    return $this->enterpriseSpecificId;
  }
  /**
   * @param float[]
   */
  public function setGpuShutdownTemperatures($gpuShutdownTemperatures)
  {
    $this->gpuShutdownTemperatures = $gpuShutdownTemperatures;
  }
  /**
   * @return float[]
   */
  public function getGpuShutdownTemperatures()
  {
    return $this->gpuShutdownTemperatures;
  }
  /**
   * @param float[]
   */
  public function setGpuThrottlingTemperatures($gpuThrottlingTemperatures)
  {
    $this->gpuThrottlingTemperatures = $gpuThrottlingTemperatures;
  }
  /**
   * @return float[]
   */
  public function getGpuThrottlingTemperatures()
  {
    return $this->gpuThrottlingTemperatures;
  }
  /**
   * @param string
   */
  public function setHardware($hardware)
  {
    $this->hardware = $hardware;
  }
  /**
   * @return string
   */
  public function getHardware()
  {
    return $this->hardware;
  }
  /**
   * @param string
   */
  public function setManufacturer($manufacturer)
  {
    $this->manufacturer = $manufacturer;
  }
  /**
   * @return string
   */
  public function getManufacturer()
  {
    return $this->manufacturer;
  }
  /**
   * @param string
   */
  public function setModel($model)
  {
    $this->model = $model;
  }
  /**
   * @return string
   */
  public function getModel()
  {
    return $this->model;
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
  /**
   * @param float[]
   */
  public function setSkinShutdownTemperatures($skinShutdownTemperatures)
  {
    $this->skinShutdownTemperatures = $skinShutdownTemperatures;
  }
  /**
   * @return float[]
   */
  public function getSkinShutdownTemperatures()
  {
    return $this->skinShutdownTemperatures;
  }
  /**
   * @param float[]
   */
  public function setSkinThrottlingTemperatures($skinThrottlingTemperatures)
  {
    $this->skinThrottlingTemperatures = $skinThrottlingTemperatures;
  }
  /**
   * @return float[]
   */
  public function getSkinThrottlingTemperatures()
  {
    return $this->skinThrottlingTemperatures;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HardwareInfo::class, 'Google_Service_AndroidManagement_HardwareInfo');
