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

namespace Google\Service\VMMigrationService;

class VmUtilizationMetrics extends \Google\Model
{
  /**
   * @var int
   */
  public $cpuAveragePercent;
  /**
   * @var int
   */
  public $cpuMaxPercent;
  /**
   * @var string
   */
  public $diskIoRateAverageKbps;
  /**
   * @var string
   */
  public $diskIoRateMaxKbps;
  /**
   * @var int
   */
  public $memoryAveragePercent;
  /**
   * @var int
   */
  public $memoryMaxPercent;
  /**
   * @var string
   */
  public $networkThroughputAverageKbps;
  /**
   * @var string
   */
  public $networkThroughputMaxKbps;

  /**
   * @param int
   */
  public function setCpuAveragePercent($cpuAveragePercent)
  {
    $this->cpuAveragePercent = $cpuAveragePercent;
  }
  /**
   * @return int
   */
  public function getCpuAveragePercent()
  {
    return $this->cpuAveragePercent;
  }
  /**
   * @param int
   */
  public function setCpuMaxPercent($cpuMaxPercent)
  {
    $this->cpuMaxPercent = $cpuMaxPercent;
  }
  /**
   * @return int
   */
  public function getCpuMaxPercent()
  {
    return $this->cpuMaxPercent;
  }
  /**
   * @param string
   */
  public function setDiskIoRateAverageKbps($diskIoRateAverageKbps)
  {
    $this->diskIoRateAverageKbps = $diskIoRateAverageKbps;
  }
  /**
   * @return string
   */
  public function getDiskIoRateAverageKbps()
  {
    return $this->diskIoRateAverageKbps;
  }
  /**
   * @param string
   */
  public function setDiskIoRateMaxKbps($diskIoRateMaxKbps)
  {
    $this->diskIoRateMaxKbps = $diskIoRateMaxKbps;
  }
  /**
   * @return string
   */
  public function getDiskIoRateMaxKbps()
  {
    return $this->diskIoRateMaxKbps;
  }
  /**
   * @param int
   */
  public function setMemoryAveragePercent($memoryAveragePercent)
  {
    $this->memoryAveragePercent = $memoryAveragePercent;
  }
  /**
   * @return int
   */
  public function getMemoryAveragePercent()
  {
    return $this->memoryAveragePercent;
  }
  /**
   * @param int
   */
  public function setMemoryMaxPercent($memoryMaxPercent)
  {
    $this->memoryMaxPercent = $memoryMaxPercent;
  }
  /**
   * @return int
   */
  public function getMemoryMaxPercent()
  {
    return $this->memoryMaxPercent;
  }
  /**
   * @param string
   */
  public function setNetworkThroughputAverageKbps($networkThroughputAverageKbps)
  {
    $this->networkThroughputAverageKbps = $networkThroughputAverageKbps;
  }
  /**
   * @return string
   */
  public function getNetworkThroughputAverageKbps()
  {
    return $this->networkThroughputAverageKbps;
  }
  /**
   * @param string
   */
  public function setNetworkThroughputMaxKbps($networkThroughputMaxKbps)
  {
    $this->networkThroughputMaxKbps = $networkThroughputMaxKbps;
  }
  /**
   * @return string
   */
  public function getNetworkThroughputMaxKbps()
  {
    return $this->networkThroughputMaxKbps;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VmUtilizationMetrics::class, 'Google_Service_VMMigrationService_VmUtilizationMetrics');
