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
  public $cpuAveragePercent;
  public $cpuMaxPercent;
  public $diskIoRateAverageKbps;
  public $diskIoRateMaxKbps;
  public $memoryAveragePercent;
  public $memoryMaxPercent;
  public $networkThroughputAverageKbps;
  public $networkThroughputMaxKbps;

  public function setCpuAveragePercent($cpuAveragePercent)
  {
    $this->cpuAveragePercent = $cpuAveragePercent;
  }
  public function getCpuAveragePercent()
  {
    return $this->cpuAveragePercent;
  }
  public function setCpuMaxPercent($cpuMaxPercent)
  {
    $this->cpuMaxPercent = $cpuMaxPercent;
  }
  public function getCpuMaxPercent()
  {
    return $this->cpuMaxPercent;
  }
  public function setDiskIoRateAverageKbps($diskIoRateAverageKbps)
  {
    $this->diskIoRateAverageKbps = $diskIoRateAverageKbps;
  }
  public function getDiskIoRateAverageKbps()
  {
    return $this->diskIoRateAverageKbps;
  }
  public function setDiskIoRateMaxKbps($diskIoRateMaxKbps)
  {
    $this->diskIoRateMaxKbps = $diskIoRateMaxKbps;
  }
  public function getDiskIoRateMaxKbps()
  {
    return $this->diskIoRateMaxKbps;
  }
  public function setMemoryAveragePercent($memoryAveragePercent)
  {
    $this->memoryAveragePercent = $memoryAveragePercent;
  }
  public function getMemoryAveragePercent()
  {
    return $this->memoryAveragePercent;
  }
  public function setMemoryMaxPercent($memoryMaxPercent)
  {
    $this->memoryMaxPercent = $memoryMaxPercent;
  }
  public function getMemoryMaxPercent()
  {
    return $this->memoryMaxPercent;
  }
  public function setNetworkThroughputAverageKbps($networkThroughputAverageKbps)
  {
    $this->networkThroughputAverageKbps = $networkThroughputAverageKbps;
  }
  public function getNetworkThroughputAverageKbps()
  {
    return $this->networkThroughputAverageKbps;
  }
  public function setNetworkThroughputMaxKbps($networkThroughputMaxKbps)
  {
    $this->networkThroughputMaxKbps = $networkThroughputMaxKbps;
  }
  public function getNetworkThroughputMaxKbps()
  {
    return $this->networkThroughputMaxKbps;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VmUtilizationMetrics::class, 'Google_Service_VMMigrationService_VmUtilizationMetrics');
