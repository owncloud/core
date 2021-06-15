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

class Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildbotResourceUsage extends Google_Model
{
  public $cpuUsedPercent;
  protected $diskUsageType = 'Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildbotResourceUsageStat';
  protected $diskUsageDataType = '';
  protected $memoryUsageType = 'Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildbotResourceUsageStat';
  protected $memoryUsageDataType = '';
  protected $totalDiskIoStatsType = 'Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildbotResourceUsageIOStats';
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
   * @param Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildbotResourceUsageStat
   */
  public function setDiskUsage(Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildbotResourceUsageStat $diskUsage)
  {
    $this->diskUsage = $diskUsage;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildbotResourceUsageStat
   */
  public function getDiskUsage()
  {
    return $this->diskUsage;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildbotResourceUsageStat
   */
  public function setMemoryUsage(Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildbotResourceUsageStat $memoryUsage)
  {
    $this->memoryUsage = $memoryUsage;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildbotResourceUsageStat
   */
  public function getMemoryUsage()
  {
    return $this->memoryUsage;
  }
  /**
   * @param Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildbotResourceUsageIOStats
   */
  public function setTotalDiskIoStats(Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildbotResourceUsageIOStats $totalDiskIoStats)
  {
    $this->totalDiskIoStats = $totalDiskIoStats;
  }
  /**
   * @return Google_Service_RemoteBuildExecution_GoogleDevtoolsRemotebuildbotResourceUsageIOStats
   */
  public function getTotalDiskIoStats()
  {
    return $this->totalDiskIoStats;
  }
}
