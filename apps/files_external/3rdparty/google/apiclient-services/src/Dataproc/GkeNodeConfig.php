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

namespace Google\Service\Dataproc;

class GkeNodeConfig extends \Google\Collection
{
  protected $collection_key = 'accelerators';
  protected $acceleratorsType = GkeNodePoolAcceleratorConfig::class;
  protected $acceleratorsDataType = 'array';
  /**
   * @var int
   */
  public $localSsdCount;
  /**
   * @var string
   */
  public $machineType;
  /**
   * @var string
   */
  public $minCpuPlatform;
  /**
   * @var bool
   */
  public $preemptible;
  /**
   * @var bool
   */
  public $spot;

  /**
   * @param GkeNodePoolAcceleratorConfig[]
   */
  public function setAccelerators($accelerators)
  {
    $this->accelerators = $accelerators;
  }
  /**
   * @return GkeNodePoolAcceleratorConfig[]
   */
  public function getAccelerators()
  {
    return $this->accelerators;
  }
  /**
   * @param int
   */
  public function setLocalSsdCount($localSsdCount)
  {
    $this->localSsdCount = $localSsdCount;
  }
  /**
   * @return int
   */
  public function getLocalSsdCount()
  {
    return $this->localSsdCount;
  }
  /**
   * @param string
   */
  public function setMachineType($machineType)
  {
    $this->machineType = $machineType;
  }
  /**
   * @return string
   */
  public function getMachineType()
  {
    return $this->machineType;
  }
  /**
   * @param string
   */
  public function setMinCpuPlatform($minCpuPlatform)
  {
    $this->minCpuPlatform = $minCpuPlatform;
  }
  /**
   * @return string
   */
  public function getMinCpuPlatform()
  {
    return $this->minCpuPlatform;
  }
  /**
   * @param bool
   */
  public function setPreemptible($preemptible)
  {
    $this->preemptible = $preemptible;
  }
  /**
   * @return bool
   */
  public function getPreemptible()
  {
    return $this->preemptible;
  }
  /**
   * @param bool
   */
  public function setSpot($spot)
  {
    $this->spot = $spot;
  }
  /**
   * @return bool
   */
  public function getSpot()
  {
    return $this->spot;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GkeNodeConfig::class, 'Google_Service_Dataproc_GkeNodeConfig');
