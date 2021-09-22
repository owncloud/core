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

namespace Google\Service\RemoteBuildExecution;

class GoogleDevtoolsRemotebuildbotResourceUsage extends \Google\Model
{
  public $cpuUsedPercent;
  protected $diskUsageType = GoogleDevtoolsRemotebuildbotResourceUsageStat::class;
  protected $diskUsageDataType = '';
  protected $memoryUsageType = GoogleDevtoolsRemotebuildbotResourceUsageStat::class;
  protected $memoryUsageDataType = '';
  protected $totalDiskIoStatsType = GoogleDevtoolsRemotebuildbotResourceUsageIOStats::class;
  protected $totalDiskIoStatsDataType = '';

  public function setCpuUsedPercent($cpuUsedPercent)
  {
    $this->cpuUsedPercent = $cpuUsedPercent;
  }
  public function getCpuUsedPercent()
  {
    return $this->cpuUsedPercent;
  }
  /**
   * @param GoogleDevtoolsRemotebuildbotResourceUsageStat
   */
  public function setDiskUsage(GoogleDevtoolsRemotebuildbotResourceUsageStat $diskUsage)
  {
    $this->diskUsage = $diskUsage;
  }
  /**
   * @return GoogleDevtoolsRemotebuildbotResourceUsageStat
   */
  public function getDiskUsage()
  {
    return $this->diskUsage;
  }
  /**
   * @param GoogleDevtoolsRemotebuildbotResourceUsageStat
   */
  public function setMemoryUsage(GoogleDevtoolsRemotebuildbotResourceUsageStat $memoryUsage)
  {
    $this->memoryUsage = $memoryUsage;
  }
  /**
   * @return GoogleDevtoolsRemotebuildbotResourceUsageStat
   */
  public function getMemoryUsage()
  {
    return $this->memoryUsage;
  }
  /**
   * @param GoogleDevtoolsRemotebuildbotResourceUsageIOStats
   */
  public function setTotalDiskIoStats(GoogleDevtoolsRemotebuildbotResourceUsageIOStats $totalDiskIoStats)
  {
    $this->totalDiskIoStats = $totalDiskIoStats;
  }
  /**
   * @return GoogleDevtoolsRemotebuildbotResourceUsageIOStats
   */
  public function getTotalDiskIoStats()
  {
    return $this->totalDiskIoStats;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleDevtoolsRemotebuildbotResourceUsage::class, 'Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildbotResourceUsage');
