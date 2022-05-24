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

namespace Google\Service\Dataflow;

class ResourceUtilizationReport extends \Google\Collection
{
  protected $collection_key = 'memoryInfo';
  protected $containersType = ResourceUtilizationReport::class;
  protected $containersDataType = 'map';
  protected $cpuTimeType = CPUTime::class;
  protected $cpuTimeDataType = 'array';
  protected $memoryInfoType = MemInfo::class;
  protected $memoryInfoDataType = 'array';

  /**
   * @param ResourceUtilizationReport[]
   */
  public function setContainers($containers)
  {
    $this->containers = $containers;
  }
  /**
   * @return ResourceUtilizationReport[]
   */
  public function getContainers()
  {
    return $this->containers;
  }
  /**
   * @param CPUTime[]
   */
  public function setCpuTime($cpuTime)
  {
    $this->cpuTime = $cpuTime;
  }
  /**
   * @return CPUTime[]
   */
  public function getCpuTime()
  {
    return $this->cpuTime;
  }
  /**
   * @param MemInfo[]
   */
  public function setMemoryInfo($memoryInfo)
  {
    $this->memoryInfo = $memoryInfo;
  }
  /**
   * @return MemInfo[]
   */
  public function getMemoryInfo()
  {
    return $this->memoryInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResourceUtilizationReport::class, 'Google_Service_Dataflow_ResourceUtilizationReport');
