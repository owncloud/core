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

namespace Google\Service\ToolResults;

class PerfEnvironment extends \Google\Model
{
  protected $cpuInfoType = CPUInfo::class;
  protected $cpuInfoDataType = '';
  protected $memoryInfoType = MemoryInfo::class;
  protected $memoryInfoDataType = '';

  /**
   * @param CPUInfo
   */
  public function setCpuInfo(CPUInfo $cpuInfo)
  {
    $this->cpuInfo = $cpuInfo;
  }
  /**
   * @return CPUInfo
   */
  public function getCpuInfo()
  {
    return $this->cpuInfo;
  }
  /**
   * @param MemoryInfo
   */
  public function setMemoryInfo(MemoryInfo $memoryInfo)
  {
    $this->memoryInfo = $memoryInfo;
  }
  /**
   * @return MemoryInfo
   */
  public function getMemoryInfo()
  {
    return $this->memoryInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PerfEnvironment::class, 'Google_Service_ToolResults_PerfEnvironment');
