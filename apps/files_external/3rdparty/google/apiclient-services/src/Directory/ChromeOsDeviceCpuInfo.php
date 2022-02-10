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

namespace Google\Service\Directory;

class ChromeOsDeviceCpuInfo extends \Google\Collection
{
  protected $collection_key = 'logicalCpus';
  /**
   * @var string
   */
  public $architecture;
  protected $logicalCpusType = ChromeOsDeviceCpuInfoLogicalCpus::class;
  protected $logicalCpusDataType = 'array';
  /**
   * @var int
   */
  public $maxClockSpeedKhz;
  /**
   * @var string
   */
  public $model;

  /**
   * @param string
   */
  public function setArchitecture($architecture)
  {
    $this->architecture = $architecture;
  }
  /**
   * @return string
   */
  public function getArchitecture()
  {
    return $this->architecture;
  }
  /**
   * @param ChromeOsDeviceCpuInfoLogicalCpus[]
   */
  public function setLogicalCpus($logicalCpus)
  {
    $this->logicalCpus = $logicalCpus;
  }
  /**
   * @return ChromeOsDeviceCpuInfoLogicalCpus[]
   */
  public function getLogicalCpus()
  {
    return $this->logicalCpus;
  }
  /**
   * @param int
   */
  public function setMaxClockSpeedKhz($maxClockSpeedKhz)
  {
    $this->maxClockSpeedKhz = $maxClockSpeedKhz;
  }
  /**
   * @return int
   */
  public function getMaxClockSpeedKhz()
  {
    return $this->maxClockSpeedKhz;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChromeOsDeviceCpuInfo::class, 'Google_Service_Directory_ChromeOsDeviceCpuInfo');
