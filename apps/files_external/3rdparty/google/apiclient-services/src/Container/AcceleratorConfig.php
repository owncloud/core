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

namespace Google\Service\Container;

class AcceleratorConfig extends \Google\Model
{
  /**
   * @var string
   */
  public $acceleratorCount;
  /**
   * @var string
   */
  public $acceleratorType;
  /**
   * @var string
   */
  public $gpuPartitionSize;
  protected $gpuSharingConfigType = GPUSharingConfig::class;
  protected $gpuSharingConfigDataType = '';

  /**
   * @param string
   */
  public function setAcceleratorCount($acceleratorCount)
  {
    $this->acceleratorCount = $acceleratorCount;
  }
  /**
   * @return string
   */
  public function getAcceleratorCount()
  {
    return $this->acceleratorCount;
  }
  /**
   * @param string
   */
  public function setAcceleratorType($acceleratorType)
  {
    $this->acceleratorType = $acceleratorType;
  }
  /**
   * @return string
   */
  public function getAcceleratorType()
  {
    return $this->acceleratorType;
  }
  /**
   * @param string
   */
  public function setGpuPartitionSize($gpuPartitionSize)
  {
    $this->gpuPartitionSize = $gpuPartitionSize;
  }
  /**
   * @return string
   */
  public function getGpuPartitionSize()
  {
    return $this->gpuPartitionSize;
  }
  /**
   * @param GPUSharingConfig
   */
  public function setGpuSharingConfig(GPUSharingConfig $gpuSharingConfig)
  {
    $this->gpuSharingConfig = $gpuSharingConfig;
  }
  /**
   * @return GPUSharingConfig
   */
  public function getGpuSharingConfig()
  {
    return $this->gpuSharingConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AcceleratorConfig::class, 'Google_Service_Container_AcceleratorConfig');
