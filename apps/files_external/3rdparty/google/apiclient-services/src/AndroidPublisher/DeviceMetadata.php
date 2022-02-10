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

namespace Google\Service\AndroidPublisher;

class DeviceMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $cpuMake;
  /**
   * @var string
   */
  public $cpuModel;
  /**
   * @var string
   */
  public $deviceClass;
  /**
   * @var int
   */
  public $glEsVersion;
  /**
   * @var string
   */
  public $manufacturer;
  /**
   * @var string
   */
  public $nativePlatform;
  /**
   * @var string
   */
  public $productName;
  /**
   * @var int
   */
  public $ramMb;
  /**
   * @var int
   */
  public $screenDensityDpi;
  /**
   * @var int
   */
  public $screenHeightPx;
  /**
   * @var int
   */
  public $screenWidthPx;

  /**
   * @param string
   */
  public function setCpuMake($cpuMake)
  {
    $this->cpuMake = $cpuMake;
  }
  /**
   * @return string
   */
  public function getCpuMake()
  {
    return $this->cpuMake;
  }
  /**
   * @param string
   */
  public function setCpuModel($cpuModel)
  {
    $this->cpuModel = $cpuModel;
  }
  /**
   * @return string
   */
  public function getCpuModel()
  {
    return $this->cpuModel;
  }
  /**
   * @param string
   */
  public function setDeviceClass($deviceClass)
  {
    $this->deviceClass = $deviceClass;
  }
  /**
   * @return string
   */
  public function getDeviceClass()
  {
    return $this->deviceClass;
  }
  /**
   * @param int
   */
  public function setGlEsVersion($glEsVersion)
  {
    $this->glEsVersion = $glEsVersion;
  }
  /**
   * @return int
   */
  public function getGlEsVersion()
  {
    return $this->glEsVersion;
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
  public function setNativePlatform($nativePlatform)
  {
    $this->nativePlatform = $nativePlatform;
  }
  /**
   * @return string
   */
  public function getNativePlatform()
  {
    return $this->nativePlatform;
  }
  /**
   * @param string
   */
  public function setProductName($productName)
  {
    $this->productName = $productName;
  }
  /**
   * @return string
   */
  public function getProductName()
  {
    return $this->productName;
  }
  /**
   * @param int
   */
  public function setRamMb($ramMb)
  {
    $this->ramMb = $ramMb;
  }
  /**
   * @return int
   */
  public function getRamMb()
  {
    return $this->ramMb;
  }
  /**
   * @param int
   */
  public function setScreenDensityDpi($screenDensityDpi)
  {
    $this->screenDensityDpi = $screenDensityDpi;
  }
  /**
   * @return int
   */
  public function getScreenDensityDpi()
  {
    return $this->screenDensityDpi;
  }
  /**
   * @param int
   */
  public function setScreenHeightPx($screenHeightPx)
  {
    $this->screenHeightPx = $screenHeightPx;
  }
  /**
   * @return int
   */
  public function getScreenHeightPx()
  {
    return $this->screenHeightPx;
  }
  /**
   * @param int
   */
  public function setScreenWidthPx($screenWidthPx)
  {
    $this->screenWidthPx = $screenWidthPx;
  }
  /**
   * @return int
   */
  public function getScreenWidthPx()
  {
    return $this->screenWidthPx;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeviceMetadata::class, 'Google_Service_AndroidPublisher_DeviceMetadata');
